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

        // XAMPP defaults keep local development working. Production can
        // provide its own credentials without storing secrets in the code.
        $this->servername = getenv('LANYARDS_DB_HOST') ?: 'localhost';
        $this->dbname = getenv('LANYARDS_DB_NAME') ?: 'u273173398_Lanyards';
        $this->username = getenv('LANYARDS_DB_USER') ?: 'root';
        $this->password = getenv('LANYARDS_DB_PASSWORD') ?: '';

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
