<?php
class Placeorder extends Controller{
    protected $item_object;
    protected $category_object;
    protected $order_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->category_object = $this->model("Category");
        $this->order_object = $this->model("Order");
    }

    public function action(){
        $num_orders = 0;
        if(isset($_SESSION['username'])){
            $num_orders = $this->order_object->get_num_orders($_SESSION['username']);
        }
        $this->view("Master1", array(
            "page"=>"home",
            "total"=>$this->item_object->get_total(),
            "num_orders"=>$num_orders,
            "category_list"=>$this->category_object->get_all_categories(),
            "latest_item_list"=>$this->item_object->get_latest_items(),
            "featured_category_list"=>$this->item_object->get_featured_categories(),
            "featured_item_list"=>$this->item_object->get_featured_items(),
            "top_rated_item_list"=>$this->item_object->get_top_rated_items(),
            "top_review_item_list"=>$this->item_object->get_top_review_items()
        ));
    }

    public function success(){
        $num_orders = 0;
        if(isset($_SESSION['username'])){
            $num_orders = $this->order_object->get_num_orders($_SESSION['username']);
        }
        $this->view("Master1", array(
            "page"=>"success",
            "total"=>$this->item_object->get_total(),
            "num_orders"=>$num_orders
        ));
    }

    public function fail(){
        $num_orders = 0;
        if(isset($_SESSION['username'])){
            $num_orders = $this->order_object->get_num_orders($_SESSION['username']);
        }
        $this->view("Master1", array(
            "page"=>"fail",
            "total"=>$this->item_object->get_total(),
            "num_orders"=>$num_orders
        ));
    }
}
?>