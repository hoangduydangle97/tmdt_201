<?php
class Category extends Database{
    public function get_all_categories(){
        $sql = "SELECT * FROM category";
        return $this->query_return_arr($sql);
    }

    public function iu_category($params){
        $name = trim($_POST['name']);

        if($name == ''){
            $_SESSION['error'] = [true, 'Name must be at least 1 character!'];
            header("location: http://localhost/tmdt_201/product/categories");
        }
        else{
            $id = str_replace(' ', '-', strtolower($name));
            $current_id = '';

            if(isset($_POST['current-id'])){
                $current_id = $_POST['current-id'];
            }

            if($params == 'insert'){
                $sql = "INSERT INTO category(id_category, name_category, date_created_category,".
                " latest_date_updated_category) VALUES ('".$id."', '".$name."', CURRENT_TIMESTAMP(),".
                " CURRENT_TIMESTAMP());";
            }
            else if($params == 'update'){
                $sql = "UPDATE category SET id_category='".$id."', name_category='".$name."',".
                " latest_date_updated_category=CURRENT_TIMESTAMP() WHERE id_category='".$current_id."';";
            }

            $sql_result = mysqli_query($this->conn, $sql);
            if($sql_result){
                if($params == 'insert'){
                    $_SESSION['error'] = [false, 'Create successfully!'];
                }
                else if($params == 'update'){
                    $_SESSION['error'] = [false, 'Update successfully!'];
                }
                header("location: http://localhost/tmdt_201/product/categories");
            }
            else{
                $_SESSION['error'] = [true, 'Name may be duplicated or server error!'];
                header("location: http://localhost/tmdt_201/product/categories");
            }
        }
    }

    public function delete_category($id){
        $sql = "DELETE FROM category WHERE id_category='".$id."';";
        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            $_SESSION['error'] = [false, 'Delete successfully!'];
            header("location: http://localhost/tmdt_201/product/categories");
        }
        else{
            $_SESSION['error'] = [true, 'Server error!'];
            header("location: http://localhost/tmdt_201/product/categories");
        } 
    }
}
?>