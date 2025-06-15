<?php
class Text_Model {
    // 🔒 Variables privadas
    private $connection;

    private $contentText;
    private $timesText;
    private $spaceBetweenText;
    private $spaceAlongLanyard;
    private $colourText;
    private $fontFamilyText;
    private $sizeText;
    private $boldText;
    private $italicText;
    private $underlineText;
    private $textPosition;
    private $idJob;


    // 🧱 Constructor
    public function __construct($connection) {
        $this->connection = $connection;
    }

    // 🛠️ Setters
    public function setContentText($contentText) {
        $this->contentText = $contentText;
    }

    public function setIdJob($idJob) {
        $this->idJob = $idJob;
    }

    public function setTimesText($timesText) {
        $this->timesText = $timesText;
    }

    public function setSpaceBetweenText($spaceBetweenText) {
        $this->spaceBetweenText = $spaceBetweenText;
    }

    public function setSpaceAlongLanyard($spaceAlongLanyard) {
        $this->spaceAlongLanyard = $spaceAlongLanyard;
    }

    public function setColourText($colourText) {
        $this->colourText = $colourText;
    }

    public function setFontFamilyText($fontFamilyText) {
        $this->fontFamilyText = $fontFamilyText;
    }

    public function setSizeText($sizeText) {
        $this->sizeText = $sizeText;
    }

    public function setBoldText($boldText) {
        $this->boldText = $boldText;
    }

    public function setItalicText($italicText) {
        $this->italicText = $italicText;
    }

    public function setUnderlineText($underlineText) {
        $this->underlineText = $underlineText;
    }

    public function setTextPosition($textPosition) {
        $this->textPosition = $textPosition;
    }




















}
?>
