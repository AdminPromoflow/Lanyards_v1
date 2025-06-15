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
















}
?>
