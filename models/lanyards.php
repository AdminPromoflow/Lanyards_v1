<?php
class Lanyards {
  // Private variables
  private $connection; // The database connection
  private $material;

  // Constructor that initializes the connection.
  function __construct($connection) {
    $this->connection = $connection;
  }

  // Set the user's name
  public function setMaterial($material) {

    $this->material = $material;

  }

    /*
   * Get a list of all Materia's lanyards from the database.
   *
   * @return array An array of customer data, or an empty array if no customers are found.
   */
  public function getAllLanyardMaterials() {
      try {
          // Prepare the SQL query to select all customers
          $sql = $this->connection->getConnection()->prepare("SELECT DISTINCT `material`, `linkImg`, `description` FROM `Lanyards` ");

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

  public function getMaterials(){
      try {
          // Prepare the SQL query to select all customers
          $sql = $this->connection->getConnection()->prepare("SELECT  `material`, `linkImg`, `description` FROM `Lanyards` ");


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
  public function getLanyardDataByMaterial() {
      try {
          // Prepare the SQL query with a safe parameter
          $sql = $this->connection->getConnection()->prepare("
              SELECT
                  L.material,
                  LT.type AS lanyardType,
                  LT.price AS lanyardPrice,
                  W.width,
                  C.name AS clipName,
                  C.price AS clipPrice,
                  S.noSides AS side,
                  NC.option AS colourOption,
                  A.`min-amount` AS minAmount,
                  A.`max-amount` AS maxAmount,
                  A.price AS amountPrice
              FROM `Lanyards` L
              LEFT JOIN `LanyardTypes` LT ON L.idLanyard = LT.idLanyard
              LEFT JOIN `Width` W ON L.idLanyard = W.idLanyard
              LEFT JOIN `SidePrinted` S ON W.idWidth = S.idWidth
              LEFT JOIN `Clips` C ON W.idWidth = C.idWidth
              LEFT JOIN `noColours` NC ON S.idSidePrinted = NC.idSidePrinted
              LEFT JOIN `Amount` A ON NC.idNoColour = A.idNoColour
              WHERE L.material = :material
              ORDER BY LT.type, W.width, C.name, S.noSides, NC.option, A.`min-amount`
          ");

          // Bind the class variable $this->material to the SQL parameter
          $sql->bindParam(':material', $this->material, PDO::PARAM_STR);

          // Execute the query
          $sql->execute();

          // Fetch all results as an associative array
          $result = $sql->fetchAll(PDO::FETCH_ASSOC);

          // Process the results into a structured JSON format
          return $result;

      } catch (PDOException $e) {
          // Handle exceptions and errors
          echo "Query error: " . $e->getMessage();
          throw new Exception("Error retrieving JSON data by material.");
      }
  }


  public function getInfoMaterials() {
      try {

          // Prepare the SQL query with placeholders
          $sql = $this->connection->getConnection()->prepare("SELECT *   FROM `Lanyards` WHERE `material`  =  :material");

          // Bind the email parameter
          $sql->bindParam(':material', $this->material, PDO::PARAM_STR);
        //  echo json_encode($this->material);exit;

          // Execute the query
          $sql->execute();

          // Fetch the password
          $response = $sql->fetch(); // Retrieve the password as a single value

          // Close the database connection
          $this->connection->closeConnection();

          return $response;

      } catch (PDOException $e) {
          // Handle any exceptions and provide an error message
          echo "Error in the query: " . $e->getMessage();
          throw new Exception("Error in the user verification query.");
      }
  }

}
?>
