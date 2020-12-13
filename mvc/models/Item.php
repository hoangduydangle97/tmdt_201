<?php
class Item extends Database{
    private $num_per_page = 6;
    private $page_no = 1;

    public function get_all_items_per_page(){
        $from = ($this->page_no - 1)*$this->num_per_page;
        $sql = "SELECT id_item, name_item, avatar_item, price_item, average_rating, num_review".
        " FROM item t1 LEFT JOIN top_item t2 ON t1.id_item=t2.id_item_top".
        " LIMIT ".$from.", ".$this->num_per_page.";";
        return $this->query_return_arr($sql);
    }

    public function get_all_items(){
        $from = ($this->page_no - 1)*$this->num_per_page;
        $sql = "SELECT t3.*, t4.average_rating, t4.num_review".
        " FROM (SELECT t1.*, t2.name_category FROM item t1 LEFT".
        " JOIN category t2 ON t1.category_item=t2.id_category) t3".
        " LEFT JOIN top_item t4 ON t3.id_item=t4.id_item_top;";
        return $this->query_return_arr($sql);
    }

    public function set_page_no($page_no){
        $this->page_no = (int)$page_no;
    }

    public function get_page_no(){
        return $this->page_no;
    }

    public function get_num_all_items(){
        $sql = "SELECT id_item FROM item;";
        return $this->query_return_num_rows($sql);
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
        return $this->query_return_row($sql);
    }

    public function get_item_list($arr){
        $item_list = [];
        foreach($arr as $key => $val){
            $item = json_decode($this->get_item($key), true);
            $item['quantity'] = $val;
            $item_list[] = $item;
        }
        return json_encode($item_list);
    }

    public function get_best_seller(){
        $sql = "SELECT id_item, name_item, avatar_item, num_purchased".
        " FROM item WHERE num_purchased > 0 ORDER BY num_purchased DESC LIMIT 6";
        return $this->query_return_arr($sql);
    }

    public function get_latest_items(){
        $sql = "SELECT item.*, category.name_category".
        " FROM item LEFT JOIN category ON item.category_item=category.id_category".
        " ORDER BY date_created_item DESC LIMIT 6;";
        return $this->query_return_arr($sql);
    }

    public function get_sale_off_items(){
        $sql = "SELECT t1.*, t2.name_category FROM (SELECT * FROM `item` HAVING".
        " sale_off_item > 0) t1 LEFT JOIN category t2 ON t1.category_item=t2.id_category;";
        return $this->query_return_arr($sql);
    }

    public function get_items_from_category_per_page($category){
        $from = ($this->page_no - 1)*$this->num_per_page;
        $sql = "SELECT id_item, name_item, avatar_item, price_item, average_rating, num_review".
        " FROM (SELECT * FROM item t1 LEFT JOIN category t2 ON t1.category_item=t2.id_category".
        " WHERE category_item='".$category."') t3 LEFT JOIN top_item t4 ON t3.id_item=t4.id_item_top".
        " LIMIT ".$from.", ".$this->num_per_page.";";
        return $this->query_return_arr($sql);
    }

    public function get_num_category_items($category){
        $sql = "SELECT id_item FROM item WHERE category_item='".$category."';";
        return $this->query_return_num_rows($sql);
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
        $sql = "SELECT average_rating FROM top_item WHERE id_item_top='".$item."'";
        $sql_result = mysqli_query($this->conn, $sql);
        $result = false;
        if($sql_result){
            $result = floatval(mysqli_fetch_assoc($sql_result)['average_rating']);
        }
        return json_encode($result);
    }

    public function get_top_rated_items(){
        $sql = "SELECT id_item, name_item, avatar_item, price_item, average_rating". 
        " FROM (SELECT * FROM top_item t1 LEFT JOIN".
        " item t2 ON t1.id_item_top=t2.id_item HAVING".
        " average_rating > 0 ORDER BY average_rating DESC LIMIT 6) t3";
        return $this->query_return_arr($sql);
    }

    public function get_top_review_items(){
        $sql = "SELECT id_item, name_item, avatar_item, price_item, num_review". 
        " FROM (SELECT * FROM top_item t1 LEFT JOIN".
        " item t2 ON t1.id_item_top=t2.id_item HAVING".
        " num_review > 0 ORDER BY num_review DESC LIMIT 6) t3";
        return $this->query_return_arr($sql);
    }

    public function get_category_item($item){
        $sql = "SELECT category_item FROM item WHERE id_item='".$item."';";
        $sql_result = mysqli_query($this->conn, $sql);
        $category = '';
        if($sql_result){
            $category = mysqli_fetch_assoc($sql_result);
        }
        return json_encode($category);
    }

    public function get_related_items($item){
        $category = json_decode($this->get_category_item($item))->category_item;
        $sql = "SELECT id_item, name_item, avatar_item, price_item, average_rating,".
        " num_review FROM item t1 LEFT JOIN top_item t2 on t1.id_item=t2.id_item_top".
        " WHERE category_item='".$category."' AND NOT id_item='".$item."' ORDER BY".
        " average_rating DESC LIMIT 4";
        return $this->query_return_arr($sql);
    }

    public function get_featured_items(){
        $sql = "SELECT id_item, name_item, avatar_item, price_item,".
        " average_rating, num_review, category_item FROM item t1".
        " LEFT JOIN top_item t2 ON t1.id_item=t2.id_item_top WHERE featured='1';";
        return $this->query_return_arr($sql);
    }

    public function get_featured_categories(){
        $sql = "SELECT DISTINCT category_item, name_category FROM item t1".
        " LEFT JOIN category t2 ON t1.category_item=t2.id_category WHERE featured='1';";
        return $this->query_return_arr($sql);
    }

    public function iu_product($params){
        $current_id = '';
        if(isset($_POST['current-id'])){
            $current_id = $_POST['current-id'];
        }

        $name = trim($_POST['name']);
        if($name == ''){
            $_SESSION['error'] = [true, 'Name must be at least 1 character!'];
            if($params == 'insert'){
                header("location: http://localhost/tmdt_201/product/create");
            }
            else if($params == 'update'){
                header("location: http://localhost/tmdt_201/product/update/".$current_id);
            }
        }
        else{
            $id_item = str_replace(' ', '-', strtolower($name));
            $description = trim($_POST['description']);
            $category = $_POST['category'];
            $price = $_POST['price'];
            $availability = $_POST['availability'];
            $weight = $_POST['weight'];
            $sale_off = $_POST['sale-off'];
            $featured = $_POST['featured'];
            $avatar = 'public/images/uploads/products/'.$id_item.'/avatar/';
            $detail = 'public/images/uploads/products/'.$id_item.'/details/';
            $default = 'public/images/uploads/products/';
            $sql = '';
            $detail_1 = '';
            $detail_2 = '';
            $detail_3 = '';
            $current_avatar = '';
            $current_detail_1 = '';
            $current_detail_2 = '';
            $current_detail_3 = '';

            if(isset($_POST['current-avatar'])){
                $current_avatar = $_POST['current-avatar'];
            }

            if(isset($_POST['current-detail-1'])){
                $current_detail_1 = $_POST['current-detail-1'];
            }

            if(isset($_POST['current-detail-2'])){
                $current_detail_2 = $_POST['current-detail-2'];
            }

            if(isset($_POST['current-detail-3'])){
                $current_detail_3 = $_POST['current-detail-3'];
            }

            $avatar_name = $_FILES['avatar']['name'];
            $avatar_tmp = $_FILES['avatar']['tmp_name'];

            $detail_1_name = $_FILES['detail-1']['name'];
            $detail_1_tmp = $_FILES['detail-1']['tmp_name'];

            $detail_2_name = $_FILES['detail-2']['name'];
            $detail_2_tmp = $_FILES['detail-2']['tmp_name'];

            $detail_3_name = $_FILES['detail-3']['name'];
            $detail_3_tmp = $_FILES['detail-3']['tmp_name'];

            $target_dir = "./public/images/uploads/products/".$id_item;
            if(!file_exists($target_dir)){
                mkdir($target_dir, 0700, true);
            }
            $avatar_dir = "./public/images/uploads/products/".$id_item."/avatar";
            if(!file_exists($avatar_dir)){
                mkdir($avatar_dir, 0700, true);
            }
            $detail_dir = "./public/images/uploads/products/".$id_item."/details";
            if(!file_exists($detail_dir)){
                mkdir($detail_dir, 0700, true);
            }

            if($description != ''){
                $description = "'".$description."'";
            }
            else{
                $description = 'NULL';
            }

            if($avatar_name != ''){
                move_uploaded_file($avatar_tmp, $avatar_dir."/".$avatar_name);
                $avatar = "'".$avatar.$avatar_name."'";
            }
            else{
                if($params == 'insert'){
                    $avatar = "'".$default."default-item.jpg'";
                }
                else if($params == 'update'){
                    $avatar = "'".$current_avatar."'";
                }
            }

            if($detail_1_name != ''){
                move_uploaded_file($detail_1_tmp, $detail_dir."/detail-1-".$detail_1_name);
                $detail_1 = "'".$detail."detail-1-".$detail_1_name."'";
            }
            else{
                if($params == 'insert'){
                    $detail_1 = "'".$default."default-item.jpg'";
                }
                else if($params == 'update'){
                    $detail_1 = "'".$current_detail_1."'";
                }
            }

            if($detail_2_name != ''){
                move_uploaded_file($detail_2_tmp, $detail_dir."/detail-2-".$detail_2_name);
                $detail_2 = "'".$detail."detail-2-".$detail_2_name."'";
            }
            else{
                if($params == 'insert'){
                    $detail_2 = "'".$default."default-item.jpg'";
                }
                else if($params == 'update'){
                    $detail_2 = "'".$current_detail_2."'";
                }
            }

            if($detail_3_name != ''){
                move_uploaded_file($detail_3_tmp, $detail_dir."/detail-3-".$detail_3_name);
                $detail_3 = "'".$detail."detail-3-".$detail_3_name."'";
            }
            else{
                if($params == 'insert'){
                    $detail_3 = "'".$default."default-item.jpg'";
                }
                else if($params == 'update'){
                    $detail_3 = "'".$current_detail_3."'";
                }
            }

            if($params == 'insert'){
                $sql = "INSERT INTO item(id_item, name_item, avatar_item, detail_item_1, detail_item_2,". 
                " detail_item_3, description_item, price_item, availability_item, weight_item, sale_off_item,".
                " featured, date_created_item, latest_date_updated_item, category_item) VALUES".
                " ('".$id_item."', '".$name."', ".$avatar.", ".$detail_1.", ".$detail_2.", ".$detail_3.", ".$description.",".
                " '".$price."', '".$availability."', '".$weight."', '".$sale_off."', '".$featured."',".
                " CURRENT_TIMESTAMP(), CURRENT_TIMESTAMP(), '".$category."');";
            }
            else if($params == 'update'){
                $sql = "UPDATE item SET id_item='".$id_item."', name_item='".$name."', avatar_item=".$avatar.",".
                " detail_item_1=".$detail_1.", detail_item_2=".$detail_2.", detail_item_3=".$detail_3.",".
                " description_item=".$description.", price_item='".$price."', availability_item='".$availability."',".
                " weight_item='".$weight."', sale_off_item='".$sale_off."', featured='".$featured."',".
                " latest_date_updated_item=CURRENT_TIMESTAMP(), category_item='".$category."' WHERE id_item='".$current_id."';";
            }

            $sql_result = mysqli_query($this->conn, $sql);
            if($sql_result){
                if($params == 'insert'){
                    $_SESSION['error'] = [false, 'Create successfully!'];
                }
                else if($params == 'update'){
                    $_SESSION['error'] = [false, 'Update successfully!'];
                }
                header("location: http://localhost/tmdt_201/product");
            }
            else{
                $_SESSION['error'] = [true, 'Name may be duplicated or server error!'];
                if($params == 'insert'){
                    header("location: http://localhost/tmdt_201/product/create");
                }
                else if($params == 'update'){
                    header("location: http://localhost/tmdt_201/product/update/".$current_id);
                }
            }
        }  
    }

    public function delete_folder($str){
        // Check for files 
        if (is_file($str)) { 
            // If it is file then remove by using unlink function 
            return unlink($str); 
        } 
        // If it is a directory
        elseif (is_dir($str)) { 
            // Get the list of the files in this directory 
            $scan = glob(rtrim($str, '/').'/*'); 
            // Loop through the list of files 
            foreach($scan as $index=>$path) { 
                // Call recursive function 
                $this->delete_folder($path); 
            }  
            // Remove the directory itself 
            return @rmdir($str); 
        } 
    }

    public function delete_product($item){
        $id_item = $item->id_item;
        $sql = "DELETE FROM item WHERE id_item='".$id_item."';";
        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            $path = './public/images/uploads/products/'.$id_item;
            echo $path;
            $this->delete_folder($path);
            $_SESSION['error'] = [false, 'Delete successfully!'];
            header("location: http://localhost/tmdt_201/product");
        }
        else{
            $_SESSION['error'] = [true, 'Server error!'];
            header("location: http://localhost/tmdt_201/product");
        }   
    }

    public function get_total(){
        $arr_cookie = [];
        if(isset($_COOKIE)){
            foreach($_COOKIE as $key => $val){
                $pos = strpos($key, 'selected-');
                if($pos === 0){
                    $arr_cookie[str_replace('selected-', '', $key)] = $val;
                }
            }
        }
        ksort($arr_cookie);
        $item_list = json_decode($this->get_item_list($arr_cookie));
        $sub_total = 0;
        for($row = 0; $row < count($item_list); $row++){
            $item_total = $item_list[$row]->price_item * $item_list[$row]->quantity;
            $sub_total += $item_total;
        }
        return json_encode(number_format($sub_total, 0));
    }
}
?>