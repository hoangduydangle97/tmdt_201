<?php
class Ajax extends Controller{
    protected $service_object;

    final public function __construct(){
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
}
?>