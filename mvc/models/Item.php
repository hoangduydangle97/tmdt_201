<?php
class Item extends Database{
    public function getItems(){
        $sql = "SELECT item.*, category.name_category".
        " FROM item LEFT JOIN category ON item.category_item=category.id_category".
        " WHERE name_category='Fruit'";
        return mysqli_query($this->conn, $sql);
    }
}
?>