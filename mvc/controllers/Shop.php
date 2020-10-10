<?php
class Shop extends Controller{
    public function action(){
        $item_list = $this->model("Item");
        $category_list = $this->model("Category");
        $this->view("Master1", array(
            "page"=>"shop",
            "item_list"=>$item_list->getItems(),
            "category_list"=>$category_list->getCategories(),
            "latest_item_list"=>$item_list->getLatestItems()
        ));
    }

    public function detail($params){
        $item = $this->model("Item");
        $category = $this->model("Category");
        $this->view("Master1", array(
            "page"=>"detail",
            "item"=>$item->getItem($params),
            "category"=>$category->getCategories()
        ));
    }
}
?>