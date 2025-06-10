<?php
    class Searchs {
      private $conn;
      private $word;

      function __construct($conn) {
          $this->conn = $conn;
      }
      function setWord($word){
        $this->word  = $word;
      }
      function searchPage(){
        try{
          $sql = $this->conn->conn()->query("SELECT `title`, `text`, `link` FROM `Searchs` WHERE `text` LIKE '%" . $this->word . "%'");

         $data = $sql->fetchAll(PDO::FETCH_ASSOC);
         $this->conn->close();
         return $data;
           }
         catch(PDOException $e){
             echo $query . "<br>" . $e->getMessage();
           }
      }
}
?>
