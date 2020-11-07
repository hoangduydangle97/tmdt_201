<?php
class Product extends Controller{
    protected $item_object;
    protected $category_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->category_object = $this->model("Category");
    }

    public function action(){
        $this->view("Master1", array(
            "cms"=>true,
            "page"=>"product",
            "item_list"=>$this->item_object->get_all_items()
        ));
    }

    public function create(){
        $this->view("Master1", array(
            "cms"=>true,
            "page"=>"create",
            "category_list"=>$this->category_object->get_all_categories()
        ));
    }
}
?>