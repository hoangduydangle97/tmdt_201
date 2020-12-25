<?php
class Admin extends Controller{
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
                $this->view("Master1", array(
                    "cms"=>true,
                    "page"=>"admin",
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