<?php
class Shop extends Controller{
    public function action(){
        $item_list = $this->model("Item");
        $category_list = $this->model("Category");
        $this->view("Master1", array(
            "page"=>"shop",
            "category"=>"all",
            "item_list"=>$item_list->get_all_items_per_page(),
            "category_list"=>$category_list->get_all_categories(),
            "latest_item_list"=>$item_list->get_latest_items(),
            "num_items"=>$item_list->get_num_all_items(),
            "num_pages"=>$item_list->get_num_all_pages(),
            "page_no"=>$item_list->get_page_no()
        ));
    }

    public function page($params){
        $item_list = $this->model("Item");
        $item_list->set_page_no($params);
        $category_list = $this->model("Category");
        $this->view("Master1", array(
            "page"=>"shop",
            "category"=>"all",
            "item_list"=>$item_list->get_all_items_per_page(),
            "category_list"=>$category_list->get_all_categories(),
            "latest_item_list"=>$item_list->get_latest_items(),
            "num_items"=>$item_list->get_num_all_items(),
            "num_pages"=>$item_list->get_num_all_pages(),
            "page_no"=>$item_list->get_page_no()
        ));
    }

    public function detail($params){
        $item = $this->model("Item");
        $category = $this->model("Category");
        $this->view("Master1", array(
            "page"=>"detail",
            "item"=>$item->get_item($params),
            "category"=>$category->get_all_categories()
        ));
    }

    public function category($params){
        $item_list = $this->model("Item");
        $category_list = $this->model("Category");
        $this->view("Master1", array(
            "page"=>"shop",
            "category"=>$params,
            "name_category"=>$item_list->get_name_category($params),
            "item_list"=>$item_list->get_items_from_category_per_page($params),
            "category_list"=>$category_list->get_all_categories(),
            "latest_item_list"=>$item_list->get_latest_items(),
            "num_items"=>$item_list->get_num_category_items($params),
            "num_pages"=>$item_list->get_num_category_pages($params),
            "page_no"=>$item_list->get_page_no()
        ));
    }

    public function category_page($category, $params){
        $item_list = $this->model("Item");
        $item_list->set_page_no($params);
        $category_list = $this->model("Category");
        $this->view("Master1", array(
            "page"=>"shop",
            "category"=>$category,
            "name_category"=>$item_list->get_name_category($category),
            "item_list"=>$item_list->get_items_from_category_per_page($category),
            "category_list"=>$category_list->get_all_categories(),
            "latest_item_list"=>$item_list->get_latest_items(),
            "num_items"=>$item_list->get_num_category_items($category),
            "num_pages"=>$item_list->get_num_category_pages($category),
            "page_no"=>$item_list->get_page_no()
        ));
    }
}
?>