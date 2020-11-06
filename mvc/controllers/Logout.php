<?php
class Logout extends Controller{
    public function action(){
        $url = $_SESSION['role'] == 1?'/tmdt_201/home':$_SESSION['path'];
        session_unset();
        header("location: http://localhost".$url);
    }
}
?>