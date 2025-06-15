<?php
class Image_Model {
    // 🔒 Variables privadas
    private $connection;

    private $timesImage;
    private $imageSize;
    private $idJob;
    private $spaceBetweenImage;
    private $imageRotation;
    private $spaceAlongLanyard;
    private $linkImage;
    private $imagePosition;

    // 🧱 Constructor
    public function __construct($connection) {
        $this->connection = $connection;
    }

    // 🛠️ Setters
    public function setTimesImage($timesImage) {
        $this->timesImage = $timesImage;
    }

    public function setIdJob($idJob) {
        $this->idJob = $idJob;
    }

    public function setImageSize($imageSize) {
        $this->imageSize = $imageSize;
    }

    public function setSpaceBetweenImage($spaceBetweenImage) {
        $this->spaceBetweenImage = $spaceBetweenImage;
    }

    public function setImageRotation($imageRotation) {
        $this->imageRotation = $imageRotation;
    }

    public function setSpaceAlongLanyard($spaceAlongLanyard) {
        $this->spaceAlongLanyard = $spaceAlongLanyard;
    }

    public function setLinkImage($linkImage) {
        $this->linkImage = $linkImage;
    }

    public function setImagePosition($imagePosition) {
        $this->imagePosition = $imagePosition;
    }


    public function createImage() {
        try {
            $sql = $this->connection->getConnection()->prepare("
                INSERT INTO `Image` (
                    `idJobs`, `timesImage`, `imageSize`, `spaceBetweenImage`,
                    `imageRotation`, `spaceAlongLanyard`, `linkImage`, `imagePosition`
                )
                VALUES (
                    :idJobs, :timesImage, :imageSize, :spaceBetweenImage,
                    :imageRotation, :spaceAlongLanyard, :linkImage, :imagePosition
                )
            ");

            $sql->bindParam(':idJobs', $this->idJob, PDO::PARAM_INT);
            $sql->bindParam(':timesImage', $this->timesImage, PDO::PARAM_INT);
            $sql->bindParam(':imageSize', $this->imageSize, PDO::PARAM_STR);
            $sql->bindParam(':spaceBetweenImage', $this->spaceBetweenImage, PDO::PARAM_STR);
            $sql->bindParam(':imageRotation', $this->imageRotation, PDO::PARAM_INT);
            $sql->bindParam(':spaceAlongLanyard', $this->spaceAlongLanyard, PDO::PARAM_STR);
            $sql->bindParam(':linkImage', $this->linkImage, PDO::PARAM_STR);
            $sql->bindParam(':imagePosition', $this->imagePosition, PDO::PARAM_STR);

            $sql->execute();

            $this->connection->closeConnection();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }














}
?>
