<?php
class Logout extends Controller{
    public function action(){
        $url = $_SESSION['path'];
        session_unset();
        header("location: http://localhost".$url);
    }
}
?>