<?php
class Admin extends Controller{
    protected $item_object;
    protected $category_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->category_object = $this->model("Category");
    }

    public function action(){
        if(!isset($_SESSION['cms'])){
            $_SESSION['cms'] = true;
        }
        $this->view("Master1", array(
            "page"=>"admin"
        ));
    }
}
?>