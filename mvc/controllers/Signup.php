<?php
class Signup extends Controller{
    public function action(){
        $this->view("Master2", array(
            "page"=>"signup"
        ));
    }
}
?>