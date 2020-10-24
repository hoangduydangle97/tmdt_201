<?php
class Login extends Controller{
    public function action(){
        $this->view("Master2", array(
            "page"=>"login"
        ));
    }

    public function check_login(){
        $username = '';
        $password = '';
        $check = false;
        if(isset($_POST['btn-login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
        }
        $user = $this->model("User");
        $hashed_password = json_decode($user->get_password_user($username))->password_user;
        if($hashed_password){
            $check = json_decode($user->check_password($password, $hashed_password));
        }
        if($check){
            $_SESSION['username'] = $username;
            header("location: http://localhost".$_SESSION['path']);
        }
        else{
            $_SESSION['error'] = true;
            header('location: http://localhost/tmdt_201/login');
        }
    }
}
?>