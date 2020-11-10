<?php
class Manageorder extends Controller{
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
        $username = '';
        if(isset($_SESSION['username'])){
            $username = $_SESSION['username'];
            $num_orders = $this->order_object->get_num_orders($username);
        }
        $this->view("Master1", array(
            "page"=>"manageorder",
            "total"=>$this->item_object->get_total(),
            "num_orders"=>$num_orders,
            "category_list"=>$this->category_object->get_all_categories(),
            "order_list"=>$this->order_object->get_order_user($username)
        ));
    }

    public function detail($id){
        $num_orders = 0;
        if(isset($_SESSION['username'])){
            $num_orders = $this->order_object->get_num_orders($_SESSION['username']);
        }
        $this->view("Master1", array(
            "page"=>"detailorder",
            "total"=>$this->item_object->get_total(),
            "num_orders"=>$num_orders,
            "category_list"=>$this->category_object->get_all_categories(),
            "order_list"=>$this->order_object->get_order_item($id),
            "total_order"=>$this->order_object->get_total_order($id)
        ));
    }
}
?>