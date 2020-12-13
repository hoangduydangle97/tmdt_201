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
        $user_expected_time = null;
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
            $user_code_address = json_decode($this->service_object->get_code_address(json_decode($user_info)->address_user));
            $user_expected_time = $this->service_object->get_expected_time($user_code_address->DistrictID, $user_code_address->WardCode);
        }
        $province_list = $this->service_object->get_province();
        $district_list = $this->service_object->get_district(json_decode($province_list)[0]->id);
        $ward_list = $this->service_object->get_ward(json_decode($district_list)[0]->DistrictID);
        $shipping_fee = $this->service_object->get_shipping_fee(json_decode($district_list)[0]->DistrictID, json_decode($ward_list)[0]->WardCode, $weight_total);
        $expected_time = $this->service_object->get_expected_time(json_decode($district_list)[0]->DistrictID, json_decode($ward_list)[0]->WardCode);
        $this->view("Master1", array(
            "page"=>"checkout",
            "total"=>$this->item_object->get_total(),
            "num_orders"=>$num_orders,
            "province_list"=>$province_list,
            "district_list"=>$district_list,
            "ward_list"=>$ward_list,
            "shipping_fee"=>$shipping_fee,
            "expected_time"=>$expected_time,
            "weight_total"=>$weight_total,
            "category_list"=>$this->category_object->get_all_categories(),
            "item_list"=>$this->item_object->get_item_list($arr_cookie),
            "user_info"=>$user_info,
            "user_expected_time"=>$user_expected_time
        ));
    }

    public function create_order(){
        $this->order_object->insert();
    }

    public function email(){
        $this->view("Invoice", array(
            "page" => "email"
        ));
    }

    public function vnpay_return(){
        $result = json_decode($this->order_object->vnpay_return());
        if($result->RspCode == '00'){
            $order_info = json_decode($this->order_object->get_order_by_id($result->TxnRef));
            $item_order_list = json_decode($this->order_object->get_order_item($result->TxnRef));
            $vnpay_info = json_decode($this->order_object->get_vnpay_info($result->TxnRef));
            if($order_info->note_order == 'NULL'){
                $order_info->note_order = "There isn't any note";
            }
            $data_email = array(
                "user" => array(
                    "fname" => $order_info->fname_user_order,
                    "lname" => $order_info->lname_user_order,
                    "address" => $order_info->address_user_order,
                    "phone" => $order_info->phone_user_order,
                    "email" => $order_info->email_user_order
                ),
                "order" => array(
                    "id" => $order_info->id_order,
                    "date" => $order_info->date_order,
                    "payment" => $order_info->payment_order,
                    "item_list" => $item_order_list,
                    "note" => $order_info->note_order,
                    "shipping" => $order_info->shipping_order,
                    "free_shipping" => $order_info->free_shipping,
                    "total" => $order_info->total_order
                ),
                "vnpay" => array(
                    "vnp_TxnRef" => $vnpay_info->vnp_TxnRef,
                    "vnp_ResponseCode" => $vnpay_info->vnp_ResponseCode,
                    "vnp_TransactionNo" => $vnpay_info->vnp_TransactionNo,
                    "vnp_PayDate" => $vnpay_info->vnp_PayDate,
                    "vnp_OrderInfo" => $vnpay_info->vnp_OrderInfo,
                    "vnp_BankTranNo" => $vnpay_info->vnp_BankTranNo,
                    "vnp_BankCode" => $vnpay_info->vnp_BankCode,
                    "vnp_Amount" => $vnpay_info->vnp_Amount/100,
                    "vnp_SecureHash" => $vnpay_info->vnp_SecureHash
                )
            );
            if($this->order_object->send_mail($data_email)){
                header('location: http://localhost/tmdt_201/placeorder/success/'.$result->TxnRef);
            }
        }
        else{
            echo $result->RspCode.', '.$result->Message;
        }
    }

    public function test(){
        $id = '03223284805f5150e8bc508c38ededb8';
        var_dump($this->order_object->get_date_request($id));
    }
}
?>