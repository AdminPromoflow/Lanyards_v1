<?php
class Database {

  // Database connection parameters
  private $servername;
  private $dbname;
  private $username;
  private $password;
  private $connection;
  private static $connections = [];

  // Constructor to establish a database connection
   public function __construct() {

        $settings = self::loadSettings(__DIR__ . '/database.local.php');
        $this->servername = $settings['host'];
        $this->dbname = $settings['name'];
        $this->username = $settings['user'];
        $this->password = $settings['password'];

        try {
            $dsn = "mysql:host={$this->servername};dbname={$this->dbname};charset=utf8mb4";
            $key = hash('sha256', serialize([$dsn, $this->username, $this->password]));
            // The catalogue creates many Database wrappers. Share one PDO for
            // the same credentials, even when a model releases its wrapper.
            if (!isset(self::$connections[$key])) {
                self::$connections[$key] = new PDO($dsn, $this->username, $this->password, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    // Reuse the worker's connection across HTTP requests too.
                    PDO::ATTR_PERSISTENT => true,
                ]);
            }
            $this->connection = self::$connections[$key];
        } catch (PDOException $e) {
            // Keep connection details out of the response while allowing callers
            // to handle an unavailable database gracefully.
            // PDO's full message can contain connection details. Log only
            // diagnostic codes so hosting failures can be identified safely.
            error_log('Database connection failed. ' . json_encode([
                'sqlstate' => $e->errorInfo[0] ?? (string) $e->getCode(),
                'driver_code' => $e->errorInfo[1] ?? null,
                'reason' => self::connectionFailureReason($e),
                'mysql_driver_available' => in_array('mysql', PDO::getAvailableDrivers(), true),
                'local_config_present' => is_file(__DIR__ . '/database.local.php'),
            ]));
            $this->connection = null;
        }
    }

    private static function connectionFailureReason(PDOException $error) {
        // Only return fixed labels, never the exception's connection details.
        foreach ([
            'Operation not permitted' => 'operation_not_permitted',
            'No such file or directory' => 'socket_not_found',
            'Connection refused' => 'connection_refused',
            'Connection timed out' => 'connection_timeout',
            'php_network_getaddresses' => 'hostname_resolution_failed',
            'Access denied' => 'access_denied',
        ] as $message => $reason) {
            if (stripos($error->getMessage(), $message) !== false) {
                return $reason;
            }
        }
        return 'unclassified';
    }

    private static function loadSettings($localFile) {
        // Hosting-specific credentials stay outside Git and survive deployments.
        $settings = [
            'host' => 'localhost',
            'name' => 'u273173398_Lanyards',
            'user' => 'root',
            'password' => '',
        ];
        if (is_file($localFile)) {
            $local = require $localFile;
            if (!is_array($local)) {
                throw new RuntimeException('Invalid local database configuration.');
            }
            $settings = array_replace($settings, $local);
        }
        foreach (['host', 'name', 'user', 'password'] as $key) {
            $value = getenv('LANYARDS_DB_' . strtoupper($key));
            if ($value !== false && ($value !== '' || $key === 'password')) {
                $settings[$key] = $value;
            }
        }
        return $settings;
    }

    // Method to get the database connection
    public function getConnection() {
        return $this->connection;
    }

    // Release this wrapper. Other models in this request share the PDO;
    // PHP manages the persistent connection when the request ends.
    public function closeConnection() {
        $this->connection = null;
    }
}
 ?>
