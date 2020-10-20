<?php
class Blog extends Controller{
    public function action(){
        setcookie('path', 'blog');
        $category_list = $this->model("Category");
        $this->view("Master1", array(
            "page"=>"blog",
            "category_list"=>$category_list->get_all_categories()
        ));
    }
}
?>