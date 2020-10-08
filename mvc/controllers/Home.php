<?php
class Home extends Controller{
    public function action(){
        $category = $this->model("Category");
        $this->view("Master1", array(
            "page"=>"home",
            "category"=>$category->getCategories()
        ));
    }
}
?>