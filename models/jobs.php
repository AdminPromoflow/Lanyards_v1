<?php
class Job_Model {
    // 🔒 Variables privadas
    private $connection;

    private $name;
    private $description;
    private $price_per_unit;
    private $amount;
    private $total;
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
                    `notes`, `idOrder`, `idExtras`, `idClip`, `idPriceAmount`, `newColour`
                ) VALUES (
                    :name, :description, :price_per_unit, :amount, :total,
                    :notes, :idOrder, :idExtras, :idClip, :idPriceAmount, :newColour
                )
            ");

            $sql->bindParam(':name', $this->name, PDO::PARAM_STR);
            $sql->bindParam(':description', $this->description, PDO::PARAM_STR);
            $sql->bindParam(':price_per_unit', $this->price_per_unit);
            $sql->bindParam(':amount', $this->amount);
            $sql->bindParam(':total', $this->total);
            $sql->bindParam(':notes', $this->notes, PDO::PARAM_STR);
            $sql->bindParam(':newColour', $this->newColour, PDO::PARAM_STR);
            $sql->bindParam(':idOrder', $this->idOrder, PDO::PARAM_INT);
            $sql->bindParam(':idExtras', $this->idExtras, PDO::PARAM_STR);
            $sql->bindParam(':idClip', $this->idClip, PDO::PARAM_INT);
            $sql->bindParam(':idPriceAmount', $this->idPriceAmount, PDO::PARAM_INT);

            $result = $sql->execute();
            $this->connection->closeConnection();

            return $result;
        } catch (PDOException $e) {
            echo json_encode([
                'error' => 'Job creation failed',
                'pdo_message' => $e->getMessage(),
                'params' => [
                    'name' => $this->name,
                    'description' => $this->description,
                    'price_per_unit' => $this->price_per_unit,
                    'amount' => $this->amount,
                    'total' => $this->total,
                    'notes' => $this->notes,
                    'newColour' => $this->newColour,
                    'idOrder' => $this->idOrder,
                    'idExtras' => $this->idExtras,
                    'idClip' => $this->idClip,
                    'idPriceAmount' => $this->idPriceAmount
                ]
            ]);
            return false;
        }
    }

    public function createJobWithId() {
        try {
            $conn = $this->connection->getConnection();
            $sql = $conn->prepare("
                INSERT INTO `Jobs` (
                    `name`, `description`, `price_per_unit`, `amount`, `total`,
                    `notes`, `idOrder`, `idExtras`, `idClip`, `idPriceAmount`, `newColour`
                ) VALUES (
                    :name, :description, :price_per_unit, :amount, :total,
                    :notes, :idOrder, :idExtras, :idClip, :idPriceAmount, :newColour
                )
            ");

            $sql->bindParam(':name', $this->name, PDO::PARAM_STR);
            $sql->bindParam(':description', $this->description, PDO::PARAM_STR);
            $sql->bindParam(':price_per_unit', $this->price_per_unit);
            $sql->bindParam(':amount', $this->amount);
            $sql->bindParam(':total', $this->total);
            $sql->bindParam(':notes', $this->notes, PDO::PARAM_STR);
            $sql->bindParam(':newColour', $this->newColour, PDO::PARAM_STR);
            $sql->bindParam(':idOrder', $this->idOrder, PDO::PARAM_INT);
            $sql->bindParam(':idExtras', $this->idExtras, PDO::PARAM_STR);
            $sql->bindParam(':idClip', $this->idClip, PDO::PARAM_INT);
            $sql->bindParam(':idPriceAmount', $this->idPriceAmount, PDO::PARAM_INT);

            $sql->execute();

            $lastId = $conn->lastInsertId();
            $this->connection->closeConnection();

            return [
                'success' => true,
                'idJob' => (int)$lastId
            ];
        } catch (PDOException $e) {
            return [
                'success' => false,
                'error' => 'Job creation failed',
                'pdo_message' => $e->getMessage()
            ];
        }
    }

    public function getJobsByOrder() {
        try {
            $sql = $this->connection->getConnection()->prepare("SELECT Jobs.*
            FROM Jobs
            INNER JOIN Orders ON Jobs.idOrder = Orders.idOrder
            WHERE Jobs.idOrder = :idOrder
            AND Orders.status = 'pending'
            ");


            $sql->bindParam(':idOrder', $this->idOrder, PDO::PARAM_INT);
            $sql->execute();
            $jobs = $sql->fetchAll(PDO::FETCH_ASSOC);
            $this->connection->closeConnection();
            return $jobs;
        } catch (PDOException $e) {
            echo "Error in the query: " . $e->getMessage();
            throw new Exception("Error retrieving jobs for the order.");
        }
    }

    public function deleteJobById() {
        try {
            $sql = $this->connection->getConnection()->prepare("DELETE FROM `Jobs` WHERE `idJobs` = :idJob");
            $sql->bindParam(':idJob', $this->idJob, PDO::PARAM_INT);
            $sql->execute();
            $this->connection->closeConnection();
            return true;
        } catch (PDOException $e) {
            echo "Error in the query: " . $e->getMessage();
            throw new Exception("Error deleting the job.");
        }
    }

    public function getJobByidJob() {
        try {
            $sql = $this->connection->getConnection()->prepare("SELECT * FROM `Jobs` WHERE `idJobs` = :idJob");
            $sql->bindParam(':idJob', $this->idJob, PDO::PARAM_INT);
            $sql->execute();
            $result = $sql->fetch(PDO::FETCH_ASSOC); // Obtener un solo registro como arreglo asociativo
            $this->connection->closeConnection();
            return $result; // Devuelve el job encontrado
        } catch (PDOException $e) {
            echo "Error in the query: " . $e->getMessage();
            throw new Exception("Error retrieving the job.");
        }
    }

}
?>
