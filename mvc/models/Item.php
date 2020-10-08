<?php
class Item extends Database{
    public function getItems(){
        $sql = "SELECT item.*, category.name_category".
        " FROM item LEFT JOIN category ON item.category_item=category.id_category;";
        return mysqli_query($this->conn, $sql);
    }

    public function getItem($item){
        $sql = "SELECT item.*, category.name_category".
        " FROM item LEFT JOIN category ON item.category_item=category.id_category".
        " WHERE id_item='".$item."';";
        return mysqli_fetch_array(mysqli_query($this->conn, $sql));
    }

    public function getMaxId(){
        $sql = "SELECT MAX(id_item) AS max_id FROM item;";
        return mysqli_query($this->conn, $sql);
    }
}
?>