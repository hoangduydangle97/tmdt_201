<?php
class Cart extends Controller{
    protected $item_object;
    protected $category_object;
    protected $user_object;
    protected $order_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->category_object = $this->model("Category");
        $this->user_object = $this->model("User");
        $this->order_object = $this->model("Order");
    }

    public function action(){
        $num_orders = 0;
        if(isset($_SESSION['username'])){
            $num_orders = $this->order_object->get_num_orders($_SESSION['username']);
        }
        $arr_cookie = [];
        if(isset($_COOKIE)){
            foreach($_COOKIE as $key => $val){
                $pos = strpos($key, 'selected-');
                if($pos === 0){
                    $arr_cookie[str_replace('selected-', '', $key)] = $val;
                }
            }
        }
        ksort($arr_cookie);
        $this->view("Master1", array(
            "page"=>"cart",
            "total"=>$this->item_object->get_total(),
            "num_orders"=>$num_orders,
            "category_list"=>$this->category_object->get_all_categories(),
            "item_list"=>$this->item_object->get_item_list($arr_cookie)
        ));
    }

    public function checkout(){
        $num_orders = 0;
        if(isset($_SESSION['username'])){
            $num_orders = $this->order_object->get_num_orders($_SESSION['username']);
        }
        $arr_cookie = [];
        $user_info = null;
        if(isset($_COOKIE)){
            foreach($_COOKIE as $key => $val){
                $pos = strpos($key, 'selected-');
                if($pos === 0){
                    $arr_cookie[str_replace('selected-', '', $key)] = $val;
                }
            }
        }
        ksort($arr_cookie);
        if(isset($_SESSION['username'])){
            $user_info = $this->user_object->get_info_user($_SESSION['username']);
        }
        $this->view("Master1", array(
            "page"=>"checkout",
            "total"=>$this->item_object->get_total(),
            "num_orders"=>$num_orders,
            "category_list"=>$this->category_object->get_all_categories(),
            "item_list"=>$this->item_object->get_item_list($arr_cookie),
            "user_info"=>$user_info
        ));
    }

    public function create_order(){
        echo $_POST['payment'];
        $payment = $_POST['payment'];
        if($payment == 'cod'){
            $this->order_object->insert();
        }
        else if($payment == 'vnpay'){
            echo 'Proccessing ...';
        }
    }
}
?>