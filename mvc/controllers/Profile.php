<?php
class Profile extends Controller{
    protected $item_object;
    protected $category_object;
    protected $order_object;
    protected $user_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->category_object = $this->model("Category");
        $this->order_object = $this->model("Order");
        $this->user_object = $this->model("User");
    }

    public function action(){
        if(isset($_SESSION['username'])){
            $num_orders = $this->order_object->get_num_orders($_SESSION['username']);
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
                "page"=>"profile",
                "total"=>$this->item_object->get_total(),
                "num_orders"=>$num_orders,
                "item_cart_list"=>$this->item_object->get_item_list($arr_cookie),
                "category_list"=>$this->category_object->get_all_categories(),
                "user_info"=>$this->user_object->get_info_user($_SESSION['username'])
            ));
        }
        else{
            header('location: http://localhost/tmdt_201/login');
        }
    }
}
?>