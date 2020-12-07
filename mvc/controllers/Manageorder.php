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
            "page"=>"manageorder",
            "total"=>$this->item_object->get_total(),
            "num_orders"=>$num_orders,
            "category_list"=>$this->category_object->get_all_categories(),
            "order_list"=>$this->order_object->get_order_user($username),
            "item_cart_list"=>$this->item_object->get_item_list($arr_cookie)
        ));
    }

    public function detail($id){
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
            "page"=>"detailorder",
            "total"=>$this->item_object->get_total(),
            "num_orders"=>$num_orders,
            "order_info"=>$this->order_object->get_order_by_id($id),
            "category_list"=>$this->category_object->get_all_categories(),
            "order_list"=>$this->order_object->get_order_item($id),
            "item_cart_list"=>$this->item_object->get_item_list($arr_cookie)
        ));
    }
}
?>