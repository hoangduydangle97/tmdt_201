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

    public function check_password($password, $hashed_password){
        if(password_verify($password, $hashed_password)){
            return json_encode(true);
        }

        return json_encode(false);
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
}
?>