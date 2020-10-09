<?php
class Blog extends Controller{
    public function action(){
        $category_list = $this->model("Category");
        $this->view("Master1", array(
            "page"=>"blog",
            "category_list"=>$category_list->getCategories()
        ));
    }
}
?>