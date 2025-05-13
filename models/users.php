<?php
class Users {
  // Private variables
  private $connection; // The database connection
  private $name;      // User's name
  private $email;     // User's email
  private $password;  // User's password
  private $recovery_token;  // User's password
  private $signup_category;  // User's password

  // Constructor that initializes the connection.
  function __construct($connection) {
    $this->connection = $connection;
  }

  public function setRecoveryToken($recovery_token) {
      $this->recovery_token = $recovery_token;
  }

  public function setSignupCategory($signup_category) {
      $this->signup_category = $signup_category;
  }

  // Set the user's name
  public function setName($name) {
    $this->name = $name;
  }

  // Set the user's email.
  public function setEmail($email) {
    $this->email = $email;
  }

  /** Set the user's password.
  *
  * @param password  the password.
  *
  **/
  public function setPassword($password) {
    $this->password = $password;
  }

  /*
   * Check if a user with the given email already exists in the database.
   */
   public function checkIfUserExistsByEmail() {
       try {
           // Prepare the SQL query with placeholders
           $sql = $this->connection->getConnection()->prepare("SELECT COUNT(*) as userCount FROM `Users` WHERE `email` = :email");

           // Bind the email parameter
           $sql->bindParam(':email', $this->email, PDO::PARAM_STR);

           // Execute the query
           $sql->execute();

           // Fetch the user count
           $result = $sql->fetch(PDO::FETCH_ASSOC);

           // Check if the count is greater than 0
           return isset($result['userCount']) && $result['userCount'] > 0;
       } catch (PDOException $e) {
           // Handle any exceptions and provide an error message
           error_log("Database query error: " . $e->getMessage());
           throw new Exception("Error in the user verification query.");
       }
   }

  /*
   * Check if a user with the given email already exists in the database.
   */
   public function getPasswordUserByEmail() {
       try {
           // Prepare the SQL query with placeholders
           $sql = $this->connection->getConnection()->prepare("SELECT `password` FROM `Users` WHERE `email` = :email");

           // Bind the email parameter
           $sql->bindParam(':email', $this->email, PDO::PARAM_STR);

           // Execute the query
           $sql->execute();

           // Fetch the password
           $password = $sql->fetchColumn(); // Retrieve the password as a single value

           // Close the database connection
           $this->connection->closeConnection();

           return $password;

       } catch (PDOException $e) {
           // Handle any exceptions and provide an error message
           echo "Error in the query: " . $e->getMessage();
           throw new Exception("Error in the user verification query.");
       }
   }

  /*
   * Create a new user with the provided name, email, and password.
   */
   public function createUser() {
       try {
           $sql = $this->connection->getConnection()->prepare("INSERT INTO `Users` (`name`, `email`, `password`, `signup_category`) VALUES (:name, :email, :password, :signup_category)");

           $sql->bindParam(':name', $this->name, PDO::PARAM_STR);
           $sql->bindParam(':email', $this->email, PDO::PARAM_STR);
           $sql->bindParam(':password', $this->password, PDO::PARAM_STR);
           $sql->bindParam(':signup_category', $this->signup_category, PDO::PARAM_STR);

           $sql->execute();

           $this->connection->closeConnection();
           return true;
       } catch (PDOException $e) {
           return false;
       }
   }


    public function insertRecoveryToken() {
      try {
          // Prepare the SQL query with placeholders.
          $sql = $this->connection->getConnection()->prepare(
              "INSERT INTO Password_Recovery_Tokens (token, creation_date, expiration_date, idUser)
               VALUES (:token, NOW(), DATE_ADD(NOW(), INTERVAL 15 MINUTE),
                       (SELECT idUser FROM Users WHERE email = :email))"
          );

          // Bind parameters.
          $sql->bindParam(':token', $this->recovery_token, PDO::PARAM_STR);
          $sql->bindParam(':email', $this->email, PDO::PARAM_STR);

          // Execute the query
          $sql->execute();

          // Close the database connection
          $this->connection->closeConnection();

          // Return true if the operation was successful
          return true;
      } catch(PDOException $e) {
          // Handle any exceptions and provide an error message
          echo "Error in the query: " . $e->getMessage();

          // Return false if there was an error
          return false;
      }
  }

  public function updateUserPasswordWithTokenCheck() {

      try {
          // Prepare the SQL query with placeholders
          $sql = $this->connection->getConnection()->prepare(
              "UPDATE Users
                INNER JOIN Password_Recovery_Tokens
                ON Password_Recovery_Tokens.idUser = Users.idUser
                SET Users.password = :password,
                    Password_Recovery_Tokens.used = 1
                WHERE Users.email = :email
                AND Password_Recovery_Tokens.token = :token
                AND TIMESTAMPDIFF(SECOND, Password_Recovery_Tokens.creation_date, Password_Recovery_Tokens.expiration_date) < 3600;"
          );

          // Bind parameters
          $sql->bindParam(':password', $this->password, PDO::PARAM_STR);
          $sql->bindParam(':email', $this->email, PDO::PARAM_STR);
          $sql->bindParam(':token', $this->recovery_token, PDO::PARAM_STR);

          // Execute the query
          $sql->execute();

          // Check if any rows were affected
          if ($sql->rowCount() > 0) {
              // Close the database connection
              $this->connection->closeConnection();
              // Return true if the operation was successful
              return true;
          } else {
              // Close the database connection
              $this->connection->closeConnection();
              // Return false if no rows were updated
              return false;
          }
      } catch (PDOException $e) {
          // Handle any exceptions and provide an error message
          echo "Error in the query: " . $e->getMessage();
          // Return false if there was an error
          return false;
      }
  }




    /*
   * Get a list of all customers from the database.
   *
   * @return array An array of customer data, or an empty array if no customers are found.
   */
  public function getAllLanyardCustomers(){
      try {
          // Prepare the SQL query to select all customers
          $sql = $this->connection->getConnection()->prepare("SELECT `nameUser`, `emailUser` FROM `Users`");

          // Execute the query
          $sql->execute();

          // Fetch all customer data
          $customers = $sql->fetchAll(PDO::FETCH_ASSOC);

          return $customers;
      } catch(PDOException $e) {
          // Handle any exceptions and provide an error message
          echo "Error in the query: " . $e->getMessage();
          throw new Exception("Error in the customer retrieval query.");
      }
  }

}
?>
