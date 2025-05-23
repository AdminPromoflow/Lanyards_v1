<?php
class Job_Model {
    // 🔒 Variables privadas
    private $connection;

    private $name;
    private $description;
    private $price_per_unit;
    private $amount;
    private $total;
    private $link_pdf;
    private $notes;
    private $idOrder;
    private $idJob;
    private $idExtras;
    private $idClip;
    private $idPriceAmount;
    private $newColour;


    // 🧱 Constructor
    function __construct($connection) {
        $this->connection = $connection;
    }

    // 🛠️ Setters
    public function setName($name) {
        $this->name = $name;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setPricePerUnit($price_per_unit) {
        $this->price_per_unit = $price_per_unit;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    public function setLinkPdf($link_pdf) {
        $this->link_pdf = $link_pdf;
    }

    public function setNotes($notes) {
        $this->notes = $notes;
    }

    public function setIdOrder($idOrder) {
        $this->idOrder = $idOrder;
    }

    public function setIdJob($idJob) {
        $this->idJob = $idJob;
    }

    public function setIdExtras($idExtras) {
        $this->idExtras = $idExtras;
    }

    public function setNewColour($newColour) {
        $this->newColour = $newColour;
    }

    public function setIdClip($idClip) {
        $this->idClip = $idClip;
    }

    public function setIdPriceAmount($idPriceAmount) {
        $this->idPriceAmount = $idPriceAmount;
    }

    // ✅ Método para crear un Job
    public function createJob() {
      try {
          $sql = $this->connection->getConnection()->prepare("
              INSERT INTO `Jobs` (
                  `name`, `description`, `price_per_unit`, `amount`, `total`,
                  `link_pdf`, `notes`, `idOrder`, `idExtras`, `idClip`, `idPriceAmount`, `newColour`
              ) VALUES (
                  :name, :description, :price_per_unit, :amount, :total,
                  :link_pdf, :notes, :idOrder, :idExtras, :idClip, :idPriceAmount, :newColour
              )
          ");

          $sql->bindParam(':name', $this->name, PDO::PARAM_STR);
          $sql->bindParam(':description', $this->description, PDO::PARAM_STR);
          $sql->bindParam(':price_per_unit', $this->price_per_unit);
          $sql->bindParam(':amount', $this->amount);
          $sql->bindParam(':total', $this->total);
          $sql->bindParam(':link_pdf', $this->link_pdf, PDO::PARAM_STR);
          $sql->bindParam(':notes', $this->notes, PDO::PARAM_STR);
          $sql->bindParam(':newColour', $this->newColour, PDO::PARAM_STR);
          $sql->bindParam(':idOrder', $this->idOrder, PDO::PARAM_INT);
          $sql->bindParam(':idExtras', $this->idExtras, PDO::PARAM_STR);
          $sql->bindParam(':idClip', $this->idClip, PDO::PARAM_INT);
          $sql->bindParam(':idPriceAmount', $this->idPriceAmount, PDO::PARAM_INT);

          $result = $sql->execute();
          $this->connection->closeConnection();

          return $result; // will be true if insert succeeded, false otherwise
      } catch (PDOException $e) {
          return false; // Or log the error as needed
      }
  }
  public function getJobsByOrder() {
      try {


          // Preparar la consulta SQL con placeholder
          $sql = $this->connection->getConnection()->prepare("SELECT * FROM `Jobs` WHERE `idOrder` = :idOrder");

          // Enlazar el parámetro de la sesión
          $sql->bindParam(':idOrder', $this->idOrder, PDO::PARAM_INT);

          // Ejecutar la consulta
          $sql->execute();

          // Obtener todos los trabajos asociados al pedido
          $jobs = $sql->fetchAll(PDO::FETCH_ASSOC);



          // Cerrar la conexión
          $this->connection->closeConnection();

          // Retornar los trabajos
          return $jobs;

      } catch (PDOException $e) {
          echo "Error in the query: " . $e->getMessage();
          throw new Exception("Error retrieving jobs for the order.");
      }
  }





  public function deleteJobById() {
    try {

        // Preparar la consulta SQL con placeholder
        $sql = $this->connection->getConnection()->prepare("DELETE FROM `Jobs` WHERE `idJobs` = :idJob");

        // Enlazar el parámetro
        $sql->bindParam(':idJob', $this->idJob, PDO::PARAM_INT);

        // Ejecutar la consulta
        $sql->execute();

        // Cerrar la conexión
        $this->connection->closeConnection();

        // Confirmar eliminación
        return true;

    } catch (PDOException $e) {
        echo "Error in the query: " . $e->getMessage();
        throw new Exception("Error deleting the job.");
    }
}



}
?>
