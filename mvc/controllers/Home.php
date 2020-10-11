<?php
class Home extends Controller{
    public function action(){
        $category_list = $this->model("Category");
        $latest_item_list = $this->model("Item");
        $this->view("Master1", array(
            "page"=>"home",
            "category_list"=>$category_list->get_all_categories(),
            "latest_item_list"=>$latest_item_list->get_latest_items()
        ));
    }
}
?>