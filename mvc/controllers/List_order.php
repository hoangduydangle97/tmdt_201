<?php
class ListOrder extends Controller{
    protected $item_object;
    protected $category_object;
    protected $order_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->category_object = $this->model("Category");
        $this->order_object = $this->model("Order");
    }

    public function action(){
        if(isset($_SESSION['role'])){
            if($_SESSION['role'] == 0){
                header('location: http://localhost/tmdt_201/not-allowed');
            }
            else{
                $order_list = $this->order_object->get_undone_order_list();
                $this->view("Master1", array(
                    "cms"=>true,
                    "page"=>"order",
                    "order_list"=>$order_list,
                    "num_orders"=>count(json_decode($order_list))
                ));
            }
        }
        else{
            header('location: http://localhost/tmdt_201/login');
        }
    }

    public function change_status_order(){
        $this->order_object->change_status();
    }

    public function change_requesting_order(){
        $this->order_object->change_requesting();
    }

    public function done(){
        if(isset($_SESSION['role'])){
            if($_SESSION['role'] == 0){
                header('location: http://localhost/tmdt_201/not-allowed');
            }
            else{
                $this->view("Master1", array(
                    "cms"=>true,
                    "page"=>"done_order",
                    "order_list"=>$this->order_object->get_done_order_list(),
                    "num_orders"=>count(json_decode($this->order_object->get_undone_order_list()))
                ));
            }
        }
        else{
            header('location: http://localhost/tmdt_201/login');
        }
    }
}
?>