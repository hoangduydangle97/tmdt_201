<?php
class User extends Database{
    public function get_password_user($username){
        $sql = "SELECT password_user FROM user WHERE username_user='".$username."';";
        $sql_result = mysqli_query($this->conn, $sql);
        $result = false;
        if($sql_result){
            $result = mysqli_fetch_assoc($sql_result);
        }
        return json_encode($result);
    }

    public function get_role_user($username){
        $sql = "SELECT role_user FROM user WHERE username_user='".$username."';";
        $sql_result = mysqli_query($this->conn, $sql);
        $result = false;
        if($sql_result){
            $result = mysqli_fetch_assoc($sql_result);
        }
        return json_encode($result);
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
        $sql = "SELECT username_user, fname_user, lname_user, bday_user,".
        " avatar_user, address_user, email_user, role_user".
        " FROM user WHERE username_user='".$username."';";
        $sql_result = mysqli_query($this->conn, $sql);
        $result = false;
        if($sql_result){
            $result = mysqli_fetch_assoc($sql_result);
        }
        return json_encode($result);
    }

    public function insert_user($role){
        $username = $_POST['username'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $bday = $_POST['bday'];
        $addr = $_POST['addr'];
        $email = $_POST['email'];

        $avatar = '/tmdt_201/public/master1/img/user/';
        $avatar_name = $_FILES['avatar']['name'];
        $avatar_tmp = $_FILES['avatar']['tmp_name'];
        $target_dir = '';

        if($bday != ''){
            $bday = "'".$bday."'";
        }
        else{
            $bday = 'NULL';
        }

        if($addr != ''){
            $addr = "'".$addr."'";
        }
        else{
            $addr = 'NULL';
        }

        if($email != ''){
            $email = "'".$email."'";
        }
        else{
            $email = 'NULL';
        }

        if($avatar_name != ''){
            $target_dir = "./public/master1/img/user/".$username;
            mkdir($target_dir, 0700, true);
            move_uploaded_file($avatar_tmp, $target_dir."/".$avatar_name);
            $avatar = "'".$avatar.$avatar_name."'";
        }
        else{
            $avatar = "'".$avatar."default-avatar.jpg'";
        }

        $sql = "INSERT INTO user(username_user, password_user, fname_user,". 
        " lname_user, bday_user, avatar_user, address_user, email_user, role_user)".
        " VALUES ('".$username."', '".$password."', '".$fname."', '".$lname."', ".$bday.
        ", ".$avatar.", ".$addr.", ".$email.", '".$role."')";

        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            header("location: http://localhost/tmdt_201/login");
        }
        else{
            header("location: http://localhost/tmdt_201/signup");
        }
    }
}
?>