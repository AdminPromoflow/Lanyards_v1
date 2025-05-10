<?php
class Order_Model {
    // 🔒 Variables privadas
    private $connection;

    private $idUser;
    private $order_date;
    private $status;
    private $total;

    // 🧱 Constructor
    function __construct($connection) {
        $this->connection = $connection;
    }

    // 🛠️ Setters
    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }

    public function setOrderDate($order_date) {
        $this->order_date = $order_date;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    // ✅ Crear una orden y devolver su ID
    public function createOrder() {
        try {
            $sql = $this->connection->getConnection()->prepare("
                INSERT INTO `Orders` (`idUser`, `order_date`, `status`, `total`)
                VALUES (:idUser, :order_date, :status, :total)
            ");

            $sql->bindParam(':idUser', $this->idUser, PDO::PARAM_INT);
            $sql->bindParam(':order_date', $this->order_date, PDO::PARAM_STR);
            $sql->bindParam(':status', $this->status, PDO::PARAM_STR);
            $sql->bindParam(':total', $this->total);

            $sql->execute();

            // Obtener el ID de la orden recién creada
            $lastId = $this->connection->getConnection()->lastInsertId();


            $this->connection->closeConnection();
            return $lastId;
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
