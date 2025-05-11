<?php
class Order_Model {
    // 🔒 Variables privadas
    private $connection;

    private $idUser;
    private $email;     // User's email

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

    // Set the user's email.
    public function setEmail($email) {
      $this->email = $email;
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
            // Buscar idUser usando el email almacenado en $this->email
            $sqlUser = $this->connection->getConnection()->prepare("SELECT idUser FROM Users WHERE email = :email
            ");
            $sqlUser->bindParam(':email', $this->email, PDO::PARAM_STR);
            $sqlUser->execute();
            $user = $sqlUser->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                throw new Exception("No se encontró un usuario con el email proporcionado.");
            }

            // Asignar el idUser recuperado
            $this->idUser = $user['idUser'];


            // Insertar la orden
            $sql = $this->connection->getConnection()->prepare("INSERT INTO `Orders` (`idUser`, `date_time`, `status`)
                VALUES (:idUser, :order_date, :status, :total)
            ");


            $sql->bindParam(':idUser', $this->idUser, PDO::PARAM_INT);
            $sql->bindParam(':order_date', $this->order_date, PDO::PARAM_STR);
            $sql->bindParam(':status', $this->status, PDO::PARAM_STR);
            $sql->execute();

            $lastId = $this->connection->getConnection()->lastInsertId();
            $this->connection->closeConnection();

            return $lastId;
        } catch (PDOException $e) {
            echo "Error PDO: " . $e->getMessage(); // útil para debug
            return false;
        }
    }

}
?>
