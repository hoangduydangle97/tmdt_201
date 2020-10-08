<?php
class Blog extends Controller{
    public function action(){
        $category = $this->model("Category");
        $this->view("Master1", array(
            "page"=>"blog",
            "category"=>$category->getCategories()
        ));
    }
}
?>