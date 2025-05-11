<?php
class Clips_Models {
  // Private variables
  private $connection; // The database connection
  private $width;
  private $material;
  private $description;


  // Constructor that initializes the connection.
  function __construct($connection) {
    $this->connection = $connection;
  }

  function setMaterial($material){
    $this->material = $material;
  }

  // Set the user's name
  public function setWidth($width) {
    $this->width = $width;
  }
  public function setDescription($description) {
      $this->description = $description;
  }



  public function getAllClipsByWidth() {
    try {

        // Prepare the SQL query with placeholders
        $sql = $this->connection->getConnection()->prepare("SELECT Clips.`name`, Clips.`imgLinkOneEnd`, Clips.`imgLinkTwoEnd`, Clips.`price`
                    FROM `Lanyards`
                    JOIN `Width` ON `Lanyards`.`idLanyard` = `Width`.`idLanyard`
                    JOIN `Clips` ON `Width`.`idWidth` = `Clips`.`idWidth`
                    WHERE `Width`.`width` = :width
                    AND `Lanyards`.`material` = :material
                    ORDER BY Clips.`price` ASC;
                    ");

        // Bind the email parameter
        $sql->bindParam(':material', $this->material, PDO::PARAM_STR);
        $sql->bindParam(':width', $this->width, PDO::PARAM_STR);
      //  echo json_encode($this->width);exit;

        // Execute the query
        $sql->execute();

        // Fetch the password
        $response = $sql->fetchAll(PDO::FETCH_ASSOC);

        // Close the database connection
        $this->connection->closeConnection();
        return $response;

    } catch (PDOException $e) {
        // Handle any exceptions and provide an error message
        echo "Error in the query: " . $e->getMessage();
        throw new Exception("Error in the user verification query.");
    }
  }
  public function getClipIdByDescription() {
      try {
          // Preparar la consulta SQL
          $sql = $this->connection->getConnection()->prepare("
              SELECT c.idClip
              FROM Clips c
              JOIN Width w ON c.idWidth = w.idWidth
              JOIN Lanyards l ON w.idLanyard = l.idLanyard
              WHERE w.width = :width
                AND l.material = :material
                AND c.name = :clip
              LIMIT 1
          ");

          // Acceder a las propiedades del objeto global $description
          $sql->bindParam(':width', $this->description->width->value, PDO::PARAM_STR);
          $sql->bindParam(':material', $this->description->material->type, PDO::PARAM_STR);
          $sql->bindParam(':clip', $this->description->clip->type, PDO::PARAM_STR);

          // Ejecutar la consulta
          $sql->execute();

          // Obtener el resultado
          $result = $sql->fetch(PDO::FETCH_ASSOC);

          // Cerrar la conexión
          $this->connection->closeConnection();

          // Retornar el idClip si se encuentra, de lo contrario null
          return $result ? $result['idClip'] : null;
      } catch (PDOException $e) {
          echo "Error en la consulta: " . $e->getMessage();
          throw new Exception("Error en la consulta para obtener el idClip.");
      }
  }


    /*
   * Get a list of all Materia's lanyards from the database.
   *
   * @return array An array of customer data, or an empty array if no customers are found.
   */




}
?>
