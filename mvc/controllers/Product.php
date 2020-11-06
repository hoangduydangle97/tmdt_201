<?php
class Product extends Controller{
    protected $item_object;
    protected $category_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
    }

    public function action(){
        if(!isset($_SESSION['cms'])){
            $_SESSION['cms'] = true;
        }
        $this->view("Master1", array(
            "page"=>"product",
            "item_list"=>$this->item_object->get_all_items()
        ));
    }
}
?>