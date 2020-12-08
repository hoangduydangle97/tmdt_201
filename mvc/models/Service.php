<?php
class Service extends Database{
    public function get_province(){
        $province = array(
            array(
                'name' => 'Hồ Chí Minh',
                'id' => '202'
            ),
            array(
                'name' => 'Long An',
                'id' => '211'
            ),
            array(
                'name' => 'Tiền Giang',
                'id' => '212'
            ),
        );
        return json_encode($province);
    }

    public function get_province_id($province_name){
        $curl = curl_init();
        $header = array(
            'Content-Type: application/json',
            'Token: 637d1bc6-2c00-11eb-a18f-227f832b612c'
        );
        $option = array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/province',
            CURLOPT_HTTPHEADER => $header
        );
        curl_setopt_array($curl, $option);
        $res = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($res); 
        if($result->code == 200){
            foreach($result->data as $value){
                if($value->ProvinceName == $province_name){
                    return $value->ProvinceID;
                }
            }
            return 'Error';
        }
    }

    public function get_district($province_id){
        $province = strval($province_id);
        $curl = curl_init();
        $header = array(
            'Content-Type: application/json',
            'Token: 637d1bc6-2c00-11eb-a18f-227f832b612c'
        );
        $option = array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/district?province_id='.$province_id,
            CURLOPT_HTTPHEADER => $header
        );
        curl_setopt_array($curl, $option);
        $res = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($res);
        if($result->code == 200){
            return json_encode($result->data);
        }
    }

    public function get_district_id($district_name, $province_id){
        $district_list = json_decode($this->get_district($province_id));
        foreach($district_list as $value){
            if($value->DistrictName == $district_name){
                return $value->DistrictID;
            }
        }
        return 'Error';
    }

    public function get_ward($district_id){
        $district_id = strval($district_id);
        $curl = curl_init();
        $header = array(
            'Content-Type: application/json',
            'Token: 637d1bc6-2c00-11eb-a18f-227f832b612c'
        );
        $option = array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'https://dev-online-gateway.ghn.vn/shiip/public-api/master-data/ward?district_id='.$district_id,
            CURLOPT_HTTPHEADER => $header
        );
        curl_setopt_array($curl, $option);
        $res = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($res);
        if($result->code == 200){
            return json_encode($result->data);
        }
        else{
            return json_encode('Error');
        }
    }

    public function get_ward_code($ward_name, $district_id){
        $ward_list = json_decode($this->get_ward($district_id));
        foreach($ward_list as $value){
            if($value->WardName == $ward_name){
                return $value->WardCode;
            }
        }
        return 'Error';
    }

    public function get_shipping_fee($to_district_id, $to_ward_code, $weight){
        $header = array(
            'Content-Type: application/json',
            'Token: 637d1bc6-2c00-11eb-a18f-227f832b612c',
            'ShopId: 76253'
        );
        $data = array(
            "service_id" => 53320,
            "from_district_id" => 1452,
            "to_district_id" => intval($to_district_id),
            "to_ward_code" => strval($to_ward_code),
            "height" => 0,
            "length" => 0,
            "weight" => intval($weight),
            "width" => 0,
            "insurance_value" => 2000000,
            "coupon" => null
        );
        $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        $curl = curl_init();
        $option = array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_URL => 'https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee',
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_POSTFIELDS => $data
        );
        curl_setopt_array($curl, $option);
        $res = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($res);
        if($result->code == 200){
            return json_encode($result->data->total);
        }
        else{
            return json_encode('Error');
        }
    }

    public function get_expected_time($to_district_id, $to_ward_code){
        $header = array(
            'Content-Type: application/json',
            'Token: 637d1bc6-2c00-11eb-a18f-227f832b612c',
            'ShopId: 76253'
        );
        
        $data = array(
            "service_id" => 53320,
            "from_district_id" => 1452,
            "from_ward_code" => "21014",
            "to_district_id" => intval($to_district_id),
            "to_ward_code" => strval($to_ward_code)
        );
        $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        $curl = curl_init();
        $option = array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_URL => 'https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/leadtime',
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_POSTFIELDS => $data
        );
        curl_setopt_array($curl, $option);
        $res = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($res);
        if($result->code == 200){
            $data = $result->data;
            $second = $data->leadtime - $data->order_date;
            $start_time = date("Y-m-d H:i:s");
            $expected_time = date('Y-m-d',strtotime('+'.$second.' seconds',strtotime($start_time)));
            return json_encode($expected_time);
        }
        else{
            return json_encode('Error');
        }
    }

    public function get_code_address($address){
        $address= explode(', ', $address);
        array_splice($address, 0, 1);
        $province_name = $address[2];
        $district_name = $address[1];
        $ward_name = $address[0];
        $province_id = $this->get_province_id($province_name);
        $district_id = $this->get_district_id($district_name, $province_id);
        $ward_code = $this->get_ward_code($ward_name, $district_id);
        $arr = array(
            "ProvinceID" => $province_id,
            "DistrictID" => $district_id,
            "WardCode" => $ward_code
        );
        return json_encode($arr);
    }
}
?>