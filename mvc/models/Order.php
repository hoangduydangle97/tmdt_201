<?php
class Order extends Database{
    public function get_order_user($username){
        $sql = "SELECT * FROM order_user WHERE username_user_order='".$username."';";
        $array_result = array();
        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            while($row = mysqli_fetch_assoc($sql_result)){
                $array_result[] = $row;
            }
        }
        return json_encode($array_result);
    }

    public function get_order_user_list(){
        $sql = "SELECT * FROM order_user;";
        $array_result = array();
        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            while($row = mysqli_fetch_assoc($sql_result)){
                $array_result[] = $row;
            }
        }
        return json_encode($array_result);
    }

    public function get_order_item($id){
        $sql = "SELECT id_item, avatar_item, t1.name_item, price_item,".
        " quantity_item, total_item FROM (SELECT * FROM `order_item` WHERE id_order='".$id."')".
        " t1 LEFT JOIN item t2 ON t1.name_item=t2.name_item;";
        $array_result = array();
        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            while($row = mysqli_fetch_assoc($sql_result)){
                $array_result[] = $row;
            }
        }
        return json_encode($array_result);
    }

    public function get_num_orders($username){
        $sql = "SELECT id_order FROM order_user WHERE username_user_order='".$username."' AND status_order='Not Confirmed';";
        $sql_result = mysqli_query($this->conn, $sql);
        $num_orders = 0;
        if($sql_result){
            $num_orders = mysqli_num_rows($sql_result);
        }
        return json_encode($num_orders);
    }

    public function get_total_order($id){
        $sql = "SELECT total_order FROM order_user WHERE id_order='".$id."';";
        $sql_result = mysqli_query($this->conn, $sql);
        $total_order = 0;
        if($sql_result){
            $num_orders = mysqli_fetch_assoc($sql_result)['total_order'];
        }
        return json_encode($num_orders);
    }

    public function insert(){
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $address = trim($_POST['address']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);
        $note = trim($_POST['note']);

        $check_empty = $fname == '' || $lname == '' || $address == '' || $phone == '' || $email == '';

        if($check_empty){
            $_SESSION['error'] = [true, '(*) fields must be at least 1 character!'];
            header("location: http://localhost/tmdt_201/cart/checkout");
        }
        else{
            $id = md5(time() . mt_rand(1, 1000000));
            $total_order = $_POST['total-order'];
            $payment = $_POST['payment'];

            if(isset($_SESSION['order-item-list'])){
                $order_item_list = json_decode($_SESSION['order-item-list']);
            }

            $username = '';

            if(isset($_POST['username'])){
                $username = trim($_POST['username']);
            }

            if($username != ''){
                $username = "'".$username."'";
            }
            else{
                $username = 'NULL';
            }

            if($note != ''){
                $note = "'".$note."'";
            }
            else{
                $note = 'NULL';
            }

            $sql = "INSERT INTO order_user(id_order, fname_user_order, lname_user_order,".
            " address_user_order, phone_user_order, email_user_order, username_user_order,".
            " note_order, total_order, date_order) VALUES ('".$id."', '".$fname."', '".$lname."',".
            " '".$address."', '".$phone."', '".$email."', ".$username.", ".$note.", '".$total_order."',".
            " CURRENT_TIMESTAMP());";

            $sql_result = mysqli_query($this->conn, $sql);
            if($sql_result){
                $check = false;
                $_SESSION['order_item_list'] = [];
                for($row = 0; $row < count($order_item_list); $row++){
                    $sql = "INSERT INTO order_item(id_order, name_item, quantity_item, total_item) VALUES".
                    " ('".$id."', '".$order_item_list[$row]->name_item."', '".$order_item_list[$row]->quantity."',".
                    " '".$order_item_list[$row]->total_item."')";
                    $sql_result = mysqli_query($this->conn, $sql);
                    if($sql_result){
                        $check = true;
                        $_SESSION['order_item_list'][] = $order_item_list[$row]->id_item;
                    }
                    else{
                        $check = false;
                    }
                }
                if($check){
                    $_SESSION['id_order'] = $id;
                    $_SESSION['order-item-list'] = false;
                    header("location: http://localhost/tmdt_201/placeorder/success");
                }
                else{
                    header("location: http://localhost/tmdt_201/placeorder/fail");
                } 
            }
            else{
                header("location: http://localhost/tmdt_201/placeorder/fail");
            } 
        }
    }
}
?>