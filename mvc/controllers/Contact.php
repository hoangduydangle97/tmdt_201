<?php
class Contact extends Controller{
    public function action(){
        setcookie('path', 'contact');
        $category_list = $this->model("Category");
        $this->view("Master1", array(
            "page"=>"contact",
            "category_list"=>$category_list->get_all_categories()
        ));
    }
}
?>