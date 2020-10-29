<?php
class Home extends Controller{
    protected $item_object;
    protected $category_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->category_object = $this->model("Category");
    }

    public function action(){
        $this->view("Master1", array(
            "page"=>"home",
            "category_list"=>$this->category_object->get_all_categories(),
            "latest_item_list"=>$this->item_object->get_latest_items(),
            "top_rated_item_list"=>$this->item_object->get_top_rated_items()
        ));
    }
}
?>