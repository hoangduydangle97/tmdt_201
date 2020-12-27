<?php
class Ajax extends Controller{
    protected $service_object;
    protected $item_object;

    final public function __construct(){
        $this->item_object = $this->model("Item");
        $this->service_object = $this->model("Service");
    }

    public function province(){
        $province_id = $_POST['id'];
        $weight_total = $_POST['weight'];
        $district_list = json_decode($this->service_object->get_district($province_id));
        $ward_list = json_decode($this->service_object->get_ward($district_list[0]->DistrictID));
        $shipping_fee = $this->service_object->get_shipping_fee($district_list[0]->DistrictID, $ward_list[0]->WardCode, $weight_total);
        $expected_time = json_decode($this->service_object->get_expected_time($district_list[0]->DistrictID, $ward_list[0]->WardCode));
        echo json_encode(array($district_list, $ward_list, $shipping_fee, $expected_time), JSON_UNESCAPED_UNICODE);
    }

    public function district(){
        $district_id = $_POST['id'];
        $weight_total = $_POST['weight'];
        $ward_list = json_decode($this->service_object->get_ward($district_id));
        $shipping_fee = $this->service_object->get_shipping_fee($district_id, $ward_list[0]->WardCode, $weight_total);
        $expected_time = json_decode($this->service_object->get_expected_time($district_id, $ward_list[0]->WardCode));
        echo json_encode(array($ward_list, $shipping_fee, $expected_time), JSON_UNESCAPED_UNICODE);
    }

    public function ward(){
        $district_id = $_POST['district_id'];
        $ward_id = $_POST['ward_id'];
        $weight_total = $_POST['weight'];
        $shipping_fee = $this->service_object->get_shipping_fee($district_id, $ward_id, $weight_total);
        $expected_time = json_decode($this->service_object->get_expected_time($district_id, $ward_id));
        echo json_encode(array($shipping_fee, $expected_time));
    }

    public function fast_cart(){
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
        $this->view("/pages/fast_cart", array(
            "item_cart_list"=>$this->item_object->get_item_list($arr_cookie)
        ));
    }
}
?>