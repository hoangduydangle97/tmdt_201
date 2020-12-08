<?php
class Login extends Controller{
    protected $user_object;

    final public function __construct(){
        $this->user_object = $this->model("User");
    }

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
        $hashed_password = json_decode($this->user_object->get_password_user($username))->password_user;
        if($hashed_password){
            $check = json_decode($this->user_object->check_password($password, $hashed_password));
        }
        if($check){
            $_SESSION['username'] = $username;
            $_SESSION['role'] = intval(json_decode($this->user_object->get_role_user($username))->role_user);
            if($_SESSION['path'] == ''){
                header("location: http://localhost/tmdt_201/".$_SESSION['path']);
            }
            else{
                header("location: http://localhost".$_SESSION['path']);
            }
        }
        else{
            $_SESSION['error'] = [true, 'Username or Password is wrong!'];
            header('location: http://localhost/tmdt_201/login');
        }
    }
}
?>