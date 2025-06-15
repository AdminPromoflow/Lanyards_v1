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
}
?>
