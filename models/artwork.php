<?php
class Artwork_Model {
    // 🔒 Variables privadas
    private $connection;

    private $idJob;
    private $linkImageLeft;
    private $linkImageRight;

    // 🧱 Constructor
    public function __construct($connection) {
        $this->connection = $connection;
    }

    // 🛠️ Setters
    public function setIdJob($idJob) {
        $this->idJob = $idJob;
    }

    public function setLinkImageLeft($linkImageLeft) {
        $this->linkImageLeft = $linkImageLeft;
    }

    public function setLinkImageRight($linkImageRight) {
        $this->linkImageRight = $linkImageRight;
    }

    public function createArtwork() {

    //  echo json_encode("ay".$this->linkImageLeft.$this->linkImageRight);exit;

        try {
            $sql = $this->connection->getConnection()->prepare("INSERT INTO `Artwork` (`idJobs`, `linkRightImage`, `linkLeftImage`)
                VALUES (:idJobs, :linkRightImage, :linkLeftImage)
            ");

            $sql->bindParam(':idJobs', $this->idJob, PDO::PARAM_INT);
            $sql->bindParam(':linkRightImage', $this->linkImageRight, PDO::PARAM_STR);
            $sql->bindParam(':linkLeftImage', $this->linkImageLeft, PDO::PARAM_STR);

            $sql->execute();

            $this->connection->closeConnection();
            return true;
        } catch (PDOException $e) {
            echo json_encode([
                'success' => false,
                'error' => $e->getMessage(),
                'idJobs' => $this->idJob,
                'linkRightImage' => $this->linkRightImage,
                'linkLeftImage' => $this->linkLeftImage
            ]);
            return false;
        }
    }



}
?>
