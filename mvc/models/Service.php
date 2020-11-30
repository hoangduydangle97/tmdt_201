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
    }
}
?>