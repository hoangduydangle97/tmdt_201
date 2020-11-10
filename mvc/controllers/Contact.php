<?php
class Contact extends Controller{
    protected $category_object;
    protected $order_object;

    final public function __construct(){
        $this->category_object = $this->model("Category");
        $this->order_object = $this->model("Order");
    }

    public function action(){
        $num_orders = 0;
        if(isset($_SESSION['username'])){
            $num_orders = $this->order_object->get_num_orders($_SESSION['username']);
        }
        $this->view("Master1", array(
            "page"=>"contact",
            "total"=>$this->item_object->get_total(),
            "num_orders"=>$num_orders,
            "category_list"=>$this->category_object->get_all_categories()
        ));
    }
}
?>