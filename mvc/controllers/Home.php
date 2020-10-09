<?php
class Home extends Controller{
    public function action(){
        $category_list = $this->model("Category");
        $latest_item_list = $this->model("Item");
        $this->view("Master1", array(
            "page"=>"home",
            "category_list"=>$category_list->getCategories(),
            "latest_item_list"=>$latest_item_list->getLatestItems()
        ));
    }
}
?>