<?php
class Home extends Controller{
    public function action(){
        $this->view("Master1", array(
            "page"=>"home"
        ));
    }
}
?>