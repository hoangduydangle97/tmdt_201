<?php
class Cart extends Controller{
    protected $item_object;
    protected $category_object;
    protected $user_object;
    protected $order_object;
    protected $service_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->category_object = $this->model("Category");
        $this->user_object = $this->model("User");
        $this->order_object = $this->model("Order");
        $this->service_object = $this->model("Service");
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
        $weight_total = 0;
        $user_info = null;
        if(isset($_COOKIE)){
            foreach($_COOKIE as $key => $val){
                $pos = strpos($key, 'selected-');
                if($pos === 0){
                    $arr_cookie[str_replace('selected-', '', $key)] = $val;
                    $weight_total += $val;
                }
            }
        }
        ksort($arr_cookie);
        $weight_total = number_format($weight_total, 2) * 1000;
        if(isset($_SESSION['username'])){
            $user_info = $this->user_object->get_info_user($_SESSION['username']);
        }
        $province_list = $this->service_object->get_province();
        $district_list = $this->service_object->get_district(json_decode($province_list)[0]->id);
        $ward_list = $this->service_object->get_ward(json_decode($district_list)[0]->DistrictID);
        $shipping_fee = $this->service_object->get_shipping_fee(json_decode($district_list)[0]->DistrictID, json_decode($ward_list)[0]->WardCode, $weight_total);
        $this->view("Master1", array(
            "page"=>"checkout",
            "total"=>$this->item_object->get_total(),
            "num_orders"=>$num_orders,
            "province_list"=>$province_list,
            "district_list"=>$district_list,
            "ward_list"=>$ward_list,
            "shipping_fee"=>$shipping_fee,
            "weight_total"=>$weight_total,
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