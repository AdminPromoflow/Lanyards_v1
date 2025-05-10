<?php
class AmountModel {
    // Private variables
    private $connection; // The database connection
    private $noSides;
    private $width;
    private $material;
    private $noColour;
    private $minAmount;
    private $description;

    /**
     * Constructor
     * @param PDO $connection
     */
    public function __construct($connection) {
        $this->connection = $connection;
    }

    // Setters
    public function setMaterial($material) {
        $this->material = $material;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function setNoSides($noSides) {
        $this->noSides = $noSides;
    }

    public function setNoColour($noColour) {
        $this->noColour = $noColour;
    }

    public function setMinAmount($minAmount) {
        $this->minAmount = $minAmount;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * Get all amount ranges by noColour
     */
    public function getAllAmountByNoColour() {
        try {
            $sql = $this->connection->prepare("
                SELECT
                    Amount.`min-amount` AS min_amount,
                    Amount.`max-amount` AS max_amount,
                    Amount.price,
                    Lanyards.material
                FROM Lanyards
                JOIN Width ON Lanyards.idLanyard = Width.idLanyard
                JOIN SidePrinted ON Width.idWidth = SidePrinted.idWidth
                JOIN noColours ON SidePrinted.idSidePrinted = noColours.idSidePrinted
                JOIN Amount ON noColours.idNoColour = Amount.idNoColour
                WHERE
                    Lanyards.material = :material AND
                    Width.width = :width AND
                    SidePrinted.noSides = :noSides AND
                    noColours.option = :noColours
                ORDER BY Amount.`min-amount` ASC
            ");

            $sql->bindParam(':material', $this->material);
            $sql->bindParam(':width', $this->width);
            $sql->bindParam(':noSides', $this->noSides);
            $sql->bindParam(':noColours', $this->noColour);

            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            throw new Exception("Error in getAllAmountByNoColour: " . $e->getMessage());
        }
    }

    /**
     * Get all prices of a material with current configuration
     */
    public function getAllPriceOfWidth() {
        try {
            $sql = $this->connection->prepare("
                SELECT
                    Width.width,
                    Width.imgLink,
                    Amount.price
                FROM Lanyards
                JOIN Width ON Lanyards.idLanyard = Width.idLanyard
                JOIN SidePrinted ON Width.idWidth = SidePrinted.idWidth
                JOIN noColours ON SidePrinted.idSidePrinted = noColours.idSidePrinted
                JOIN Amount ON noColours.idNoColour = Amount.idNoColour
                WHERE
                    Lanyards.material = :material AND
                    SidePrinted.noSides = :noSides AND
                    noColours.option = :noColours AND
                    Amount.`min-amount` = :minAmount
                ORDER BY Amount.`min-amount` ASC
            ");

            $sql->bindParam(':material', $this->material);
            $sql->bindParam(':noSides', $this->noSides);
            $sql->bindParam(':noColours', $this->noColour);
            $sql->bindParam(':minAmount', $this->minAmount);

            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            throw new Exception("Error in getAllPriceOfWidth: " . $e->getMessage());
        }
    }

    /**
     * Get unit price of a specific configuration
     */
    public function getUnitPriceOfMaterial() {
        try {
            $sql = $this->connection->prepare("
                SELECT
                    Width.width,
                    Width.imgLink,
                    Amount.price
                FROM Lanyards
                JOIN Width ON Lanyards.idLanyard = Width.idLanyard
                JOIN SidePrinted ON Width.idWidth = SidePrinted.idWidth
                JOIN noColours ON SidePrinted.idSidePrinted = noColours.idSidePrinted
                JOIN Amount ON noColours.idNoColour = Amount.idNoColour
                WHERE
                    Lanyards.material = :material AND
                    Width.width = :width AND
                    SidePrinted.noSides = :noSides AND
                    noColours.option = :noColours AND
                    Amount.`min-amount` = :minAmount
                ORDER BY Amount.`min-amount` ASC
            ");

            $sql->bindParam(':material', $this->material);
            $sql->bindParam(':width', $this->width);
            $sql->bindParam(':noSides', $this->noSides);
            $sql->bindParam(':noColours', $this->noColour);
            $sql->bindParam(':minAmount', $this->minAmount);

            $sql->execute();
            return $sql->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            throw new Exception("Error in getUnitPriceOfMaterial: " . $e->getMessage());
        }
    }
}
?>
