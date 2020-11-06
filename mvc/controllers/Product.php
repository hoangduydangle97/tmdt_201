<?php
class Product extends Controller{
    protected $item_object;
    protected $category_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
    }

    public function action(){
        $this->view("Master1", array(
            "cms"=>true,
            "page"=>"product",
            "item_list"=>$this->item_object->get_all_items()
        ));
    }
}
?>