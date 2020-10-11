<?php
class Item extends Database{
    private $num_per_page = 6;
    private $page_no = 1;

    public function get_items_per_page(){
        $from = ($this->page_no - 1)*$this->num_per_page;
        $sql = "SELECT item.*, category.name_category".
        " FROM item LEFT JOIN category ON item.category_item=category.id_category".
        " LIMIT ".$from.", ".$this->num_per_page.";";
        $array_result = array();
        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            while($row = mysqli_fetch_assoc($sql_result)){
                $array_result[] = $row;
            }
        }
        return json_encode($array_result);
    }

    public function set_page_no($page_no){
        $this->page_no = $page_no;
    }

    public function get_page_no(){
        return $this->page_no;
    }

    public function get_num_items(){
        $sql = "SELECT id_item FROM item;";
        $sql_result = mysqli_query($this->conn, $sql);
        $num_items = 0;
        if($sql_result){
            $num_items = mysqli_num_rows($sql_result);
        }
        return json_encode($num_items);
    }

    public function get_num_pages(){
        $sql = "SELECT id_item FROM item;";
        $sql_result = mysqli_query($this->conn, $sql);
        $num_items = 0;
        $num_pages = 0;
        if($sql_result){
            $num_items = mysqli_num_rows($sql_result);
            $num_pages = ceil($num_items/$this->num_per_page);
        }
        return json_encode($num_pages);
    }

    public function get_item($item){
        $sql = "SELECT item.*, category.name_category".
        " FROM item LEFT JOIN category ON item.category_item=category.id_category".
        " WHERE id_item='".$item."';";
        $sql_result = mysqli_query($this->conn, $sql);
        $result = false;
        if($sql_result){
            $result = mysqli_fetch_assoc($sql_result);
        }
        return json_encode($result);
    }

    public function get_latest_items(){
        $sql = "SELECT item.*, category.name_category".
        " FROM item LEFT JOIN category ON item.category_item=category.id_category".
        " ORDER BY date_created_item DESC LIMIT 6";
        $array_result = array();
        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            while($row = mysqli_fetch_assoc($sql_result)){
                $array_result[] = $row;
            }
        }
        return json_encode($array_result);
    }
}
?>