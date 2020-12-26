<?php
class SignUp extends Controller{
    protected $user_object;
    protected $service_object;

    final public function __construct(){
        $this->user_object = $this->model("User");
        $this->service_object = $this->model("Service");
    }

    public function action(){
        $province_list = $this->service_object->get_province();
        $district_list = $this->service_object->get_district(json_decode($province_list)[0]->id);
        $ward_list = $this->service_object->get_ward(json_decode($district_list)[0]->DistrictID);
        $expected_time = $this->service_object->get_expected_time(json_decode($district_list)[0]->DistrictID, json_decode($ward_list)[0]->WardCode);
        $this->view("Master2", array(
            "page"=>"signup",
            "province_list"=>$province_list,
            "district_list"=>$district_list,
            "ward_list"=>$ward_list
        ));
    }

    public function insert_user(){
        $role = 0;
        $this->user_object->insert_user($role);
    }

    public function check_username($username){
        $this->user_object->check_username($username);
    }
}
?>