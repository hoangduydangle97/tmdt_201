<?php
class Logout extends Controller{
    public function action(){
        if($_SESSION['role'] == 1 && isset($_SESSION['cms'])){
            $url = '/tmdt_201/home';
        }
        else{
            $url = $_SESSION['path'];
        }
        session_unset();
        header("location: http://localhost".$url);
    }
}
?>