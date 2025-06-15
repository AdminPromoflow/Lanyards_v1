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

    public function createText() {
        try {
            $sql = $this->connection->getConnection()->prepare("
                INSERT INTO `Text` (
                    `idJobs`, `contentText`, `timesText`, `spaceBetweenText`,
                    `spaceAlongLanyard`, `colourText`, `fontFamilyText`, `sizeText`,
                    `boldText`, `italicText`, `underlineText`, `textPosition`
                )
                VALUES (
                    :idJobs, :contentText, :timesText, :spaceBetweenText,
                    :spaceAlongLanyard, :colourText, :fontFamilyText, :sizeText,
                    :boldText, :italicText, :underlineText, :textPosition
                )
            ");

            $sql->bindParam(':idJobs', $this->idJob, PDO::PARAM_INT);
            $sql->bindParam(':contentText', $this->contentText, PDO::PARAM_STR);
            $sql->bindParam(':timesText', $this->timesText, PDO::PARAM_INT);
            $sql->bindParam(':spaceBetweenText', $this->spaceBetweenText, PDO::PARAM_STR);
            $sql->bindParam(':spaceAlongLanyard', $this->spaceAlongLanyard, PDO::PARAM_STR);
            $sql->bindParam(':colourText', $this->colourText, PDO::PARAM_STR);
            $sql->bindParam(':fontFamilyText', $this->fontFamilyText, PDO::PARAM_STR);
            $sql->bindParam(':sizeText', $this->sizeText, PDO::PARAM_STR);
            $sql->bindParam(':boldText', $this->boldText, PDO::PARAM_BOOL);
            $sql->bindParam(':italicText', $this->italicText, PDO::PARAM_BOOL);
            $sql->bindParam(':underlineText', $this->underlineText, PDO::PARAM_BOOL);
            $sql->bindParam(':textPosition', $this->textPosition, PDO::PARAM_STR);

            $sql->execute();

            $this->connection->closeConnection();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }




}
?>
