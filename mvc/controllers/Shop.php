<?php
class Shop extends Controller{
    public function action(){
        $item = $this->model("Item");
        $category = $this->model("Category");
        $this->view("Master1", array(
            "page"=>"shop",
            "item"=>$item->getItems(),
            "category"=>$category->getCategories()
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