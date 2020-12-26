<?php
class User extends Database{
    public function get_password_user($username){
        $sql = "SELECT password_user FROM user WHERE username_user='".$username."';";
        return $this->query_return_row($sql);
    }

    public function get_role_user($username){
        $sql = "SELECT role_user FROM user WHERE username_user='".$username."';";
        return $this->query_return_row($sql);
    }

    public function check_password($password, $hashed_password){
        if(password_verify($password, $hashed_password)){
            return json_encode(true);
        }
        return json_encode(false);
    }

    public function check_username($username){
        $sql = "SELECT username_user FROM user WHERE username_user='".$username."'";
        $sql_result = mysqli_query($this->conn, $sql);
        $result = false;
        if($sql_result){
            if(mysqli_num_rows($sql_result) > 0){
                $result = true;
            }
        }
        echo json_encode($result);
    }

    public function get_info_user($username){
        $sql = "SELECT * FROM user WHERE username_user='".$username."';";
        return $this->query_return_row($sql);
    }

    public function insert_user($role){
        $username = trim($_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $bday = trim($_POST['bday']);
        $addr = trim($_POST['addr']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $province = '';
        $district = '';
        $ward = '';

        if(isset($_POST['province'])){
            $province = ', '.$_POST['province'];
        }

        if(isset($_POST['district'])){
            $district = ', '.$_POST['district'];
        }

        if(isset($_POST['ward'])){
            $ward = ', '.$_POST['ward'];
        }

        $addr .= $ward.$district.$province;

        $avatar = 'public/images/uploads/user/';
        $avatar_name = $_FILES['avatar']['name'];
        $avatar_tmp = $_FILES['avatar']['tmp_name'];
        $target_dir = '';

        if($bday != ''){
            $bday = "'".$bday."'";
        }
        else{
            $bday = 'NULL';
        }

        if($avatar_name != ''){
            $target_dir = "./public/images/uploads/user/".$username;
            mkdir($target_dir, 0700, true);
            move_uploaded_file($avatar_tmp, $target_dir."/".$avatar_name);
            $avatar = "'".$avatar.$avatar_name."'";
        }
        else{
            $avatar = "'".$avatar."default-avatar.jpg'";
        }

        $sql = "INSERT INTO user(username_user, password_user, fname_user, lname_user,".
        " bday_user, avatar_user, address_user, phone_user, email_user, role_user)".
        " VALUES ('".$username."', '".$password."', '".$fname."', '".$lname."', ".$bday.
        ", ".$avatar.", '".$addr."', '".$phone."', '".$email."', '".$role."')";

        echo $sql;

        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            $_SESSION['error'] = [false, 'Create successfully! Login to continue!'];
            header("location: http://localhost/tmdt_201/login");
        }
        else{
            $_SESSION['error'] = [true, 'There may be errors, please check your input again!'];
            header("location: http://localhost/tmdt_201/sign-up");
        }
    }
}
?>