<?php
class Blog extends Controller{
    public function action(){
        $this->view("Master1", array(
            "page"=>"blog"
        ));
    }
}
?>