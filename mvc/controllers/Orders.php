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
            "order_list"=>$this->order_object->get_undone_order_list()
        ));
    }

    public function change_status_order(){
        $this->order_object->change_status();
    }

    public function done(){
        $this->view("Master1", array(
            "cms"=>true,
            "page"=>"doneorder",
            "order_list"=>$this->order_object->get_done_order_list()
        ));
    }
}
?>