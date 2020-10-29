<?php
class Item extends Database{
    private $num_per_page = 6;
    private $page_no = 1;

    public function get_all_items_per_page(){
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
        $this->page_no = (int)$page_no;
    }

    public function get_page_no(){
        return $this->page_no;
    }

    public function get_num_all_items(){
        $sql = "SELECT id_item FROM item;";
        $sql_result = mysqli_query($this->conn, $sql);
        $num_items = 0;
        if($sql_result){
            $num_items = mysqli_num_rows($sql_result);
        }
        return json_encode($num_items);
    }

    public function get_num_all_pages(){
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
        " ORDER BY date_created_item DESC LIMIT 6;";
        $array_result = array();
        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            while($row = mysqli_fetch_assoc($sql_result)){
                $array_result[] = $row;
            }
        }
        return json_encode($array_result);
    }

    public function get_items_from_category_per_page($category){
        $from = ($this->page_no - 1)*$this->num_per_page;
        $sql = "SELECT item.*, category.name_category".
        " FROM item LEFT JOIN category ON item.category_item=category.id_category".
        " WHERE category_item='".$category."'".
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

    public function get_num_category_items($category){
        $sql = "SELECT id_item FROM item WHERE category_item='".$category."';";
        $sql_result = mysqli_query($this->conn, $sql);
        $num_items = 0;
        if($sql_result){
            $num_items = mysqli_num_rows($sql_result);
        }
        return json_encode($num_items);
    }

    public function get_num_category_pages($category){
        $sql = "SELECT id_item FROM item WHERE category_item='".$category."';";
        $sql_result = mysqli_query($this->conn, $sql);
        $num_items = 0;
        $num_pages = 0;
        if($sql_result){
            $num_items = mysqli_num_rows($sql_result);
            $num_pages = ceil($num_items/$this->num_per_page);
        }
        return json_encode($num_pages);
    }

    public function get_name_category($category){
        $sql = "SELECT name_category FROM category WHERE id_category='".$category."';";
        $sql_result = mysqli_query($this->conn, $sql);
        $name_category = '';
        if($sql_result){
            $name_category = mysqli_fetch_assoc($sql_result);
        }
        return json_encode($name_category);
    }

    public function get_average_rated_item($item){
        $sql = "SELECT AVG(rating) AS average_rating FROM rating_user_item WHERE id_item_rating='".$item."'";
        $sql_result = mysqli_query($this->conn, $sql);
        $result = false;
        if($sql_result){
            $result = mysqli_fetch_assoc($sql_result);
            if($result["average_rating"] == null){
                $result["average_rating"] = 0;
            }
        }
        return json_encode($result["average_rating"]);
    }

    public function get_top_rated_items(){
        $sql = "SELECT id_item, name_item, avatar_item FROM item";
        $array_result = array();
        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            while($row = mysqli_fetch_assoc($sql_result)){
                $rating = floatval(json_decode($this->get_average_rated_item($row['id_item'])));
                if($rating >= 4){
                    $array_result[] = $row;
                }
            }
        }
        return json_encode($array_result);
    }
}
?>