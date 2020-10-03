<?php
class Contact extends Controller{
    public function action(){
        $this->view("Master1", array(
            "page"=>"contact"
        ));
    }
}
?>