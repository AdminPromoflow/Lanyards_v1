<?php
class Database {

  // Database connection parameters
  private $servername;
  private $dbname;
  private $username;
  private $password;
  private $connection;

  // Constructor to establish a database connection
   public function __construct() {

        $settings = self::loadSettings(__DIR__ . '/database.local.php');
        $this->servername = $settings['host'];
        $this->dbname = $settings['name'];
        $this->username = $settings['user'];
        $this->password = $settings['password'];

        try {
            // Create a PDO connection
            $dsn = "mysql:host={$this->servername};dbname={$this->dbname};charset=utf8mb4";
            $this->connection = new PDO($dsn, $this->username, $this->password);

            // Set PDO error mode to exception for better error handling
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Keep connection details out of the response while allowing callers
            // to handle an unavailable database gracefully.
            error_log('Database connection failed.');
            $this->connection = null;
        }
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

    // Method to close the database connection
    public function closeConnection() {
        $this->connection = null;
    }
}
 ?>
