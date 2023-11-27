<?php
class Kategori {
    private $conn;
    public function __construct($db){
        $this->conn = $db;
    }

    public function getAllCategories(){
        $query = "SELECT * FROM kategori";
        $result = mysqli_query($this->conn, $query);
        return $result;
    }

}
?>
