<?php
class Contact extends Controller{
    public function action(){
        $category = $this->model("Category");
        $this->view("Master1", array(
            "page"=>"contact",
            "category"=>$category->getCategories()
        ));
    }
}
?>