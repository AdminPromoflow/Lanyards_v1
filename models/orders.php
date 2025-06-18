<?php
class Order_Model {
    // 🔒 Variables privadas
    private $connection;

    private $idUser;
    private $email;
    private $idOrder;

    private $order_date;
    private $status;
    private $total;
    private $shippingDays;

    private $subtotal;
    private $tax;
    private $shippingPrice;

    // 🧱 Constructor
    function __construct($connection) {
        $this->connection = $connection;
    }

    // 🛠️ Setters
    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }
    public function setIdOrder($idOrder) {
        $this->idOrder = $idOrder;
    }

    public function setShippingDays($shippingDays) {
        $this->shippingDays = $shippingDays;
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

    // 📌 NUEVOS SETTERS
   public function setSubtotal($subtotal) {
       $this->subtotal = $subtotal;
   }

   public function setTax($tax) {
       $this->tax = $tax;
   }

   public function setShippingPrice($shippingPrice) {
       $this->shippingPrice = $shippingPrice;
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
                VALUES (:idUser, :order_date, :status)
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



    public function updateOrder() {
        try {
            // Obtener idUser por email
            $sqlUser = $this->connection->getConnection()->prepare("SELECT idUser FROM Users WHERE email = :email");
            $sqlUser->bindParam(':email', $this->email, PDO::PARAM_STR);
            $sqlUser->execute();
            $user = $sqlUser->fetch(PDO::FETCH_ASSOC);



            if (!$user) {
                throw new Exception("No se encontró un usuario con el email proporcionado.");
            }

            $this->idUser = $user['idUser'];

            // ✅ Solo actualizar shipping_price, subtotal, tax y total
            $sql = $this->connection->getConnection()->prepare("UPDATE Orders
                SET
                    subtotal = :subtotal,
                    tax = :tax,
                    shippingDays = :shippingDays,
                    shipping_price = :shipping_price,
                    total = :total
                WHERE idUser = :idUser AND status = 'pending'
            ");



            $sql->bindParam(':subtotal', $this->subtotal, PDO::PARAM_STR);
            $sql->bindParam(':tax', $this->tax, PDO::PARAM_STR);
            $sql->bindParam(':shipping_price', $this->shippingPrice, PDO::PARAM_STR);
            $sql->bindParam(':shippingDays', $this->shippingDays, PDO::PARAM_STR);


            $sql->bindParam(':total', $this->total, PDO::PARAM_STR);
            $sql->bindParam(':idUser', $this->idUser, PDO::PARAM_INT);

            $sql->execute();



            $updatedRows = $sql->rowCount();
            $this->connection->closeConnection();


            if ($updatedRows > 0) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error PDO en updateOrder: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Error en updateOrder: " . $e->getMessage();
            return false;
        }
    }


    public function updateOrderStatus() {
        try {
            $sql = $this->connection->getConnection()->prepare("UPDATE Orders
                SET status = :status
                WHERE idOrder = :idOrder
            ");

            $sql->bindParam(':status', $this->status, PDO::PARAM_STR);
            $sql->bindParam(':idOrder', $this->idOrder, PDO::PARAM_INT);

            $sql->execute();

            $updatedRows = $sql->rowCount();
            $this->connection->closeConnection();

            if ($updatedRows > 0) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error PDO en updateOrderStatus: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Error en updateOrderStatus: " . $e->getMessage();
            return false;
        }
    }



    public function getOrderDetails() {
        try {
            $conn = $this->connection->getConnection();

            $sql = $conn->prepare("SELECT o.*
                FROM Orders o
                INNER JOIN Users u ON o.idUser = u.idUser
                WHERE u.email = :email AND o.status = 'pending'
                LIMIT 1
            ");

            $sql->bindParam(':email', $this->email, PDO::PARAM_STR);
            $sql->execute();

            $order = $sql->fetch(PDO::FETCH_ASSOC);

            $this->connection->closeConnection();

            return $order ?: false;

        } catch (PDOException $e) {
            echo "Error al obtener la orden: " . $e->getMessage();
            return false;
        }
    }

    public function hasProcessingOrder() {
        try {
            $conn = $this->connection->getConnection();

            $sql = $conn->prepare("SELECT 1
                FROM Orders
                WHERE idOrder = :idOrder AND status = 'processing'
                LIMIT 1
            ");

            $sql->bindParam(':idOrder', $this->idOrder, PDO::PARAM_INT);
            $sql->execute();

            $exists = $sql->fetch(PDO::FETCH_ASSOC);

            $this->connection->closeConnection();

            return $exists ? true : false;

        } catch (PDOException $e) {
            echo "Error al verificar orden en procesamiento: " . $e->getMessage();
            return false;
        }
    }

    public function getOrderByIdOrder() {
        try {
            $conn = $this->connection->getConnection();

            $sql = $conn->prepare("SELECT *
                FROM Orders
                WHERE idOrder = :idOrder
                LIMIT 1
            ");

            $sql->bindParam(':idOrder', $this->idOrder, PDO::PARAM_INT);
            $sql->execute();

            $result = $sql->fetch(PDO::FETCH_ASSOC);

            $this->connection->closeConnection();

            return $result;

        } catch (PDOException $e) {
            echo "Error al verificar orden en procesamiento: " . $e->getMessage();
            return false;
        }
    }






    public function getOrderIdByUser() {
        try {
            if (session_status() !== PHP_SESSION_ACTIVE) {
                session_start();
            }

            if (!isset($_SESSION['email'])) {
                throw new Exception("Email not found in session.");
            }

            $email = $_SESSION['email'];
            $conn = $this->connection->getConnection();



            // Consulta combinada para obtener idOrder desde el email directamente
            $sql = $conn->prepare("SELECT o.idOrder
                 FROM Orders o
                 INNER JOIN Users u ON o.idUser = u.idUser
                 WHERE u.email = :email
                 AND o.status = 'pending'
                 LIMIT 1"
            );

            $sql->bindParam(':email', $email, PDO::PARAM_STR);
            $sql->execute();

            $idOrder = $sql->fetchColumn();


            $this->connection->closeConnection();



            return $idOrder ?: false;

        } catch (PDOException $e) {
            error_log("DB Error in getOrderIdByUser: " . $e->getMessage());
            throw new Exception("Error retrieving order by user.");
        }
    }


    public function updateShippingDays() {
        try {
            // Buscar idUser usando el email almacenado
            $sqlUser = $this->connection->getConnection()->prepare("SELECT idUser FROM Users WHERE email = :email");
            $sqlUser->bindParam(':email', $this->email, PDO::PARAM_STR);
            $sqlUser->execute();
            $user = $sqlUser->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                throw new Exception("No se encontró un usuario con el email proporcionado.");
            }

            $this->idUser = $user['idUser'];

            // Actualizar el campo shippingDays en la orden con estado 'pending'
            $sql = $this->connection->getConnection()->prepare("UPDATE Orders
                SET shippingDays = :shippingDays
                WHERE idUser = :idUser AND status = 'pending'
            ");

            $sql->bindParam(':shippingDays', $this->shippingDays, PDO::PARAM_INT);
            $sql->bindParam(':idUser', $this->idUser, PDO::PARAM_INT);
            $sql->execute();

            $updatedRows = $sql->rowCount(); // cantidad de filas afectadas
            $this->connection->closeConnection();

            if ($updatedRows > 0) {
                return true;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error PDO: " . $e->getMessage();
            return false;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }




}
?>
