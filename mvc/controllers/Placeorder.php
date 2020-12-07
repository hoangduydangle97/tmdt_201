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
            "page"=>"home",
            "total"=>$this->item_object->get_total(),
            "num_orders"=>$num_orders,
            "item_cart_list"=>$this->item_object->get_item_list($arr_cookie),
            "category_list"=>$this->category_object->get_all_categories(),
            "latest_item_list"=>$this->item_object->get_latest_items(),
            "featured_category_list"=>$this->item_object->get_featured_categories(),
            "featured_item_list"=>$this->item_object->get_featured_items(),
            "top_rated_item_list"=>$this->item_object->get_top_rated_items(),
            "top_review_item_list"=>$this->item_object->get_top_review_items()
        ));
    }

    public function success($id){
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
            "page"=>"success",
            "total"=>$this->item_object->get_total(),
            "num_orders"=>$num_orders,
            "item_cart_list"=>$this->item_object->get_item_list($arr_cookie),
            "order_info"=>$this->order_object->get_order_by_id($id),
            "item_order_list"=>$this->order_object->get_order_item($id),
            "vnpay_info"=>$this->order_object->get_vnpay_info($id)
        ));
    }

    public function fail(){
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
            "page"=>"fail",
            "total"=>$this->item_object->get_total(),
            "num_orders"=>$num_orders,
            "item_cart_list"=>$this->item_object->get_item_list($arr_cookie)
        ));
    }
}
?>