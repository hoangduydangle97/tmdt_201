<?php
class Contact extends Controller{
    protected $category_object;

    final public function __construct(){
        $this->category_object = $this->model("Category");
    }

    public function action(){
        $this->view("Master1", array(
            "page"=>"contact",
            "total"=>$this->item_object->get_total(),
            "category_list"=>$this->category_object->get_all_categories()
        ));
    }
}
?>