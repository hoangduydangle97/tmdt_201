<?php
class Category extends Database{
    public function getCategories(){
        $sql = "SELECT name_category FROM category";
        return mysqli_query($this->conn, $sql);
    }
}
?>