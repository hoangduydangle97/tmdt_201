<?php
class Signup extends Controller{
    protected $user_object;

    final public function __construct(){
        $this->user_object = $this->model("User");
    }

    public function action(){
        $this->view("Master2", array(
            "page"=>"signup"
        ));
    }

    public function insert_user(){
        $this->user_object->insert_user();
    }

    public function check_username($username){
        $this->user_object->check_username($username);
    }
}
?>