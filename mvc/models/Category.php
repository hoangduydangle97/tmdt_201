<?php
class Category extends Database{
    public function get_all_categories(){
        $sql = "SELECT name_category FROM category";
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