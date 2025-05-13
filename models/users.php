<?php
class Users {
  // Private variables
  private $connection;
  private $name;
  private $email;
  private $password;
  private $recovery_token;
  private $signup_category;

  function __construct($connection) {
    $this->connection = $connection;
  }

  public function setRecoveryToken($recovery_token) {
    $this->recovery_token = $recovery_token;
  }

  public function setSignupCategory($signup_category) {
    $this->signup_category = $signup_category;
  }

  public function setName($name) {
    $this->name = $name;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function checkIfUserExistsByEmail() {
    try {
      $sql = $this->connection->getConnection()->prepare(
        "SELECT COUNT(*) as userCount FROM `Users` WHERE `email` = :email"
      );
      $sql->bindParam(':email', $this->email, PDO::PARAM_STR);
      $sql->execute();
      $result = $sql->fetch(PDO::FETCH_ASSOC);
      return isset($result['userCount']) && $result['userCount'] > 0;
    } catch (PDOException $e) {
      error_log("Database query error: " . $e->getMessage());
      throw new Exception("Error in the user verification query.");
    }
  }

  public function getOrderIdByUser2() {
    try {
      if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
      }

      if (!isset($_SESSION['email'])) {
        throw new Exception("No email in session.");
      }

      $sql = $this->connection->getConnection()->prepare(
        "SELECT o.idOrder
         FROM Users u
         INNER JOIN Orders o ON u.idUser = o.idUser
         WHERE u.email = :email
         LIMIT 1"
      );

      $sql->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
      $sql->execute();
      $idOrder = $sql->fetchColumn();

      return $idOrder ?: false;
    } catch (Exception $e) {
      echo json_encode([
        "status" => false,
        "error" => $e->getMessage()
      ]);
      exit;
    }
  }

  public function createUser() {
    try {
      $sql = $this->connection->getConnection()->prepare(
        "INSERT INTO `Users` (`name`, `email`, `password`, `signup_category`)
         VALUES (:name, :email, :password, :signup_category)"
      );

      $sql->bindParam(':name', $this->name, PDO::PARAM_STR);
      $sql->bindParam(':email', $this->email, PDO::PARAM_STR);
      $sql->bindParam(':password', $this->password, PDO::PARAM_STR);
      $sql->bindParam(':signup_category', $this->signup_category, PDO::PARAM_STR);

      $sql->execute();
      $this->connection->closeConnection();
      return true;
    } catch (PDOException $e) {
      error_log("Error creating user: " . $e->getMessage());
      return false;
    }
  }

  public function insertRecoveryToken() {
    try {
      $sql = $this->connection->getConnection()->prepare(
        "INSERT INTO Password_Recovery_Tokens (token, creation_date, expiration_date, idUser)
         VALUES (:token, NOW(), DATE_ADD(NOW(), INTERVAL 15 MINUTE),
                (SELECT idUser FROM Users WHERE email = :email))"
      );

      $sql->bindParam(':token', $this->recovery_token, PDO::PARAM_STR);
      $sql->bindParam(':email', $this->email, PDO::PARAM_STR);

      $sql->execute();
      $this->connection->closeConnection();
      return true;
    } catch(PDOException $e) {
      error_log("Recovery token error: " . $e->getMessage());
      return false;
    }
  }

  public function updateUserPasswordWithTokenCheck() {
    try {
      $sql = $this->connection->getConnection()->prepare(
        "UPDATE Users
         INNER JOIN Password_Recovery_Tokens
         ON Password_Recovery_Tokens.idUser = Users.idUser
         SET Users.password = :password,
             Password_Recovery_Tokens.used = 1
         WHERE Users.email = :email
           AND Password_Recovery_Tokens.token = :token
           AND Password_Recovery_Tokens.used = 0
           AND Password_Recovery_Tokens.expiration_date > NOW()"
      );

      $sql->bindParam(':password', $this->password, PDO::PARAM_STR);
      $sql->bindParam(':email', $this->email, PDO::PARAM_STR);
      $sql->bindParam(':token', $this->recovery_token, PDO::PARAM_STR);

      $sql->execute();
      $this->connection->closeConnection();

      return $sql->rowCount() > 0;
    } catch (PDOException $e) {
      error_log("Password update error: " . $e->getMessage());
      return false;
    }
  }

  public function getAllLanyardCustomers(){
    try {
      $sql = $this->connection->getConnection()->prepare(
        "SELECT `nameUser`, `emailUser` FROM `Users`"
      );

      $sql->execute();
      $customers = $sql->fetchAll(PDO::FETCH_ASSOC);
      return $customers;
    } catch(PDOException $e) {
      error_log("Customer query error: " . $e->getMessage());
      throw new Exception("Error in the customer retrieval query.");
    }
  }
}
?>
