<?php
    require_once __DIR__."/../conf.php";
    class Book {

        public $conn;
        public $row;
        public $row2;

        public function __construct()
        {   
            $this->conn = DB::connect();
            $this->row = "";
            $this->row2 = "";
        }
        
        public function load($id) {
            $sql = "SELECT * FROM `book` WHERE `id` = " . $id;
            $sql2 = "SELECT * FROM `author` WHERE `id` = " . $id;
            $link = $this->conn;
            $result = $link->query($sql);
            $result2 = $link->query($sql2);
            while ($rows = $result->fetch_assoc()) {
                while ($rows2 = $result2->fetch_assoc()) {
                    $this->row2 = $rows2;
                }  
                $this->row = $rows;
                return ($this);
            }    
        }

        public function getTitle() {
            echo $this->row["name"];
        }

        public function getDescription() {
            echo $this->row["description"];
        }

        public function getArticle() {
            echo "<p>" . 
            "ID Knihy: " . $this->row["id"] ."<br>" . 
            "Název knihy: " . $this->row["name"] . "<br>" .
            "Autor: " . $this->row2["firstname"] . " " . $this->row2["surname"]. "<br>" .
            "Rok: " . $this->row["year"] . "<br>" . 
            "Rok Vydání : " . $this->row["published"] . "<br>" .
            "Jazyk: " . $this->row["language"] . "<br>" .
            "ISBN: " . $this->row["isbn"] . "<br>" . 
            "Pages: " . $this->row["pages"] . "<br>" . 
            "</p>";
        }
}
?>