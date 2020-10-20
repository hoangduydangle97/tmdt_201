<?php
class Logout extends Controller{
    public function action(){
        session_unset();
        header('location: http://localhost/tmdt_201/home');
    }
}
?>