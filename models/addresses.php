<?php
class Addresses_Model {
    private $connection;

    private $address1 = [];
    private $address2 = [];
    private $userEmail;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function setAddress1(array $data) {
        $this->address1 = [
            'first_name' => $data['first_name'] ?? null,
            'last_name' => $data['last_name'] ?? null,
            'company_name' => $data['company_name'] ?? null,
            'phone' => $data['phone'] ?? null,
            'country' => $data['country'] ?? null,
            'state' => $data['state'] ?? null,
            'town_city' => $data['town_city'] ?? null,
            'street_address_1' => $data['street_address_1'] ?? null,
            'postcode' => $data['postcode'] ?? null,
            'email_address' => $data['email_address'] ?? null,
        ];
    }

    public function setAddress2(array $data) {
        $this->address2 = [
            'first_name' => $data['first_name'] ?? null,
            'last_name' => $data['last_name'] ?? null,
            'company_name' => $data['company_name'] ?? null,
            'phone' => $data['phone'] ?? null,
            'country' => $data['country'] ?? null,
            'state' => $data['state'] ?? null,
            'town_city' => $data['town_city'] ?? null,
            'street_address_1' => $data['street_address_1'] ?? null,
            'postcode' => $data['postcode'] ?? null,
            'email_address' => $data['email_address'] ?? null,
        ];
    }

    public function setUserEmail($email) {
        $this->userEmail = $email;
    }

    public function createProvidedInformation() {
        try {
            $conn = $this->connection->getConnection();

            // 1. Obtener idUser a partir del email
            $stmt = $conn->prepare("SELECT idUser FROM Users WHERE email = :email LIMIT 1");
            $stmt->bindParam(':email', $this->userEmail, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                throw new Exception("Usuario no encontrado con el email: " . $this->userEmail);
            }

            $idUser = $user['idUser'];

            // 2. Preparar statement para inserción en Addresses
            $sql = $conn->prepare("INSERT INTO `Addresses` (
                    `first_name`, `last_name`, `company_name`, `phone`, `country`,
                    `state`, `town_city`, `street_address_1`, `postcode`, `email_address`, `idUser`
                ) VALUES (
                    :first_name, :last_name, :company_name, :phone, :country,
                    :state, :town_city, :street_address_1, :postcode, :email_address, :idUser
                )
            ");

            // Insertar address1
            if (!empty($this->address1)) {
                $sql->bindParam(':first_name', $this->address1['first_name'], PDO::PARAM_STR);
                $sql->bindParam(':last_name', $this->address1['last_name'], PDO::PARAM_STR);
                $sql->bindParam(':company_name', $this->address1['company_name'], PDO::PARAM_STR);
                $sql->bindParam(':phone', $this->address1['phone'], PDO::PARAM_STR);
                $sql->bindParam(':country', $this->address1['country'], PDO::PARAM_STR);
                $sql->bindParam(':state', $this->address1['state'], PDO::PARAM_STR);
                $sql->bindParam(':town_city', $this->address1['town_city'], PDO::PARAM_STR);
                $sql->bindParam(':street_address_1', $this->address1['street_address_1'], PDO::PARAM_STR);
                $sql->bindParam(':postcode', $this->address1['postcode'], PDO::PARAM_STR);
                $sql->bindParam(':email_address', $this->address1['email_address'], PDO::PARAM_STR);
                $sql->bindParam(':idUser', $idUser, PDO::PARAM_INT);
                $sql->execute();
            }

            // Insertar address2 si existe
            if (!empty($this->address2)) {
                $sql->bindParam(':first_name', $this->address2['first_name'], PDO::PARAM_STR);
                $sql->bindParam(':last_name', $this->address2['last_name'], PDO::PARAM_STR);
                $sql->bindParam(':company_name', $this->address2['company_name'], PDO::PARAM_STR);
                $sql->bindParam(':phone', $this->address2['phone'], PDO::PARAM_STR);
                $sql->bindParam(':country', $this->address2['country'], PDO::PARAM_STR);
                $sql->bindParam(':state', $this->address2['state'], PDO::PARAM_STR);
                $sql->bindParam(':town_city', $this->address2['town_city'], PDO::PARAM_STR);
                $sql->bindParam(':street_address_1', $this->address2['street_address_1'], PDO::PARAM_STR);
                $sql->bindParam(':postcode', $this->address2['postcode'], PDO::PARAM_STR);
                $sql->bindParam(':email_address', $this->address2['email_address'], PDO::PARAM_STR);
                $sql->bindParam(':idUser', $idUser, PDO::PARAM_INT);
                $sql->execute();
            }

            $this->connection->closeConnection();
            return true;
        } catch (Exception $e) {
            error_log("Error inserting addresses: " . $e->getMessage());
            return false;
        }
    }

    public function deleteAddressesByEmail() {
        try {
            $conn = $this->connection->getConnection();

            // 1. Buscar idUser por email
            $stmt = $conn->prepare("SELECT idUser FROM Users WHERE email = :email LIMIT 1");
            $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$user) {
                throw new Exception("Usuario no encontrado con el email: " . $this->email);
            }

            $idUser = $user['idUser'];

            // 2. Eliminar direcciones por idUser
            $delete = $conn->prepare("DELETE FROM Addresses WHERE idUser = :idUser");
            $delete->bindParam(':idUser', $idUser, PDO::PARAM_INT);
            $delete->execute();

            $this->connection->closeConnection();
            return true;
        } catch (Exception $e) {
            error_log("Error al eliminar direcciones: " . $e->getMessage());
            return false;
        }
    }

}
?>
