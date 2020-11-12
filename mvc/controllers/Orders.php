<?php
class Orders extends Controller{
    protected $item_object;
    protected $category_object;
    protected $order_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->category_object = $this->model("Category");
        $this->order_object = $this->model("Order");
    }

    public function action(){
        $this->view("Master1", array(
            "cms"=>true,
            "page"=>"order",
            "order_list"=>$this->order_object->get_not_confirmed_order_list(),
            "order_user_list"=>$this->order_object->get_order_user_list()
        ));
    }
}
?>