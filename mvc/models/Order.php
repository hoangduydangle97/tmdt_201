<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "./PHPMailer/src/PHPMailer.php";
require_once "./PHPMailer/src/SMTP.php";
require_once "./PHPMailer/src/Exception.php";

class Order extends Database{
    public function get_order_user($username){
        $sql = "SELECT * FROM order_user WHERE username_user_order='".$username."';";
        return $this->query_return_arr($sql);
    }

    public function get_order_by_id($id){
        $sql = "SELECT * FROM order_user WHERE id_order='".$id."';";
        return $this->query_return_row($sql);
    }

    public function get_undone_order_list(){
        $sql = "SELECT * FROM order_user WHERE NOT status_order='Delivered' AND NOT status_order='Returned';";
        return $this->query_return_arr($sql);
    }

    public function get_done_order_list(){
        $sql = "SELECT * FROM order_user WHERE status_order='Delivered' OR status_order='Returned';";
        return $this->query_return_arr($sql);
    }

    public function get_order_item($id){
        $sql = "SELECT id_item, avatar_item, t1.name_item, price_item,".
        " quantity_item, total_item FROM (SELECT * FROM `order_item` WHERE id_order='".$id."')".
        " t1 LEFT JOIN item t2 ON t1.name_item=t2.name_item;";
        return $this->query_return_arr($sql);
    }

    public function get_num_orders($username){
        $sql = "SELECT id_order FROM order_user WHERE username_user_order='".$username."' AND".
        " (NOT status_order='Delivered' AND NOT status_order='Returned');";
        return $this->query_return_num_rows($sql);
    }

    public function update_paid_status($id){
        $sql = "UPDATE order_user SET paid_order = 1 WHERE id_order='".$id."';";
        $sql_result = mysqli_query($this->conn, $sql);
        $result = false;
        if($sql_result){
            $result = true;
        }
        return $result;
    }

    public function get_status_btn($status, $id = null, $param = null){
        $content = '';
        $style = '';
        if($id != null && $param != null){
            $date = $this->get_date_order($id, $param);
        }
        switch($status){
            case 'Not Confirmed':
                $content = 'Confirm Order';
                $style = 'btn-danger';
                break;
            case 'Processing':
                $content = 'Confirm Prepared';
                $style = 'btn-warning';
                break;
            case 'Delivering':
                $content = 'Confirm Delivered';
                $style = 'btn-success';
                break;
            case 'Requesting Return':
                $content = 'Confirm Return';
                $style = 'btn-secondary';
                break;
            case 'Returning':
                $content = 'Confirm Returned';
                $style = 'btn-primary';
                break;
            default:
                $content = 'delivered';
                $style = 'none';
        }
        if($id != null && $param != null){
            $btn = array(
                "content" => $content,
                "style" => $style,
                "date" => $date
            );
        }
        else{
            $btn = array(
                "content" => $content,
                "style" => $style
            );
        }
        return json_encode($btn);
    }

    public function change_status(){
        $id = $_POST['id'];
        $expected_status = $_POST['expected_status'];
        $date = '';
        switch($expected_status){
            case 'Processing':
                $date = 'confirmed';
                break;
            case 'Delivering':
                $date = 'prepared';
                break;
            case 'Delivered':
                $date = 'delivered';
                break;
            case 'Returning':
                $date = 'confirm_request';
                break;
            default:
                $date = 'returned';
                break;
        }
        $btn = array();
        $sql = "UPDATE order_user SET status_order='".$expected_status."',".
        " date_".$date."=CURRENT_TIMESTAMP() WHERE id_order='".$id."';";
        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            echo $this->get_status_btn($expected_status, $id, $date);
        }
    }

    public function get_date_order($id, $param){
        $date = 'date_'.$param;
        $sql = "SELECT ".$date." FROM order_user WHERE id_order='".$id."';";
        $result = json_decode($this->query_return_row($sql))->$date;
        return date_format(date_create($result), 'H:i:s \- d/m/Y');
    }

    public function change_requesting(){
        $id = $_POST['id'];
        $reason = $_POST['reason'];
        $sql = "UPDATE order_user SET status_order='Requesting Return', return_reason='".$reason."',".
        " date_request=CURRENT_TIMESTAMP() WHERE id_order='".$id."';";
        $sql_result = mysqli_query($this->conn, $sql);
        if($sql_result){
            $result = array(
                'res' => "You requested to return this order. We'll contact you soon.",
                'status' => 'Requesting Return',
                'date' => $this->get_date_order($id, 'request')
            );
            echo json_encode($result);
        }
    }

    public function insert(){
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $address = trim($_POST['address']);
        $phone = trim($_POST['phone']);
        $email = trim($_POST['email']);
        $note = trim($_POST['note']);
        $province = '';
        $district = '';
        $ward = '';

        if(isset($_POST['province'])){
            $province = ', '.$_POST['province'];
        }

        if(isset($_POST['district'])){
            $district = ', '.$_POST['district'];
        }

        if(isset($_POST['ward'])){
            $ward = ', '.$_POST['ward'];
        }

        $check_empty = $fname == '' || $lname == '' || $address == '' || $phone == '' || $email == '';

        if($check_empty){
            $_SESSION['error'] = [true, '(*) fields must be at least 1 character!'];
            header("location: http://localhost/tmdt_201/cart/checkout");
        }
        else{
            $id = md5(time() . mt_rand(1, 1000000));
            $shipping = trim($_POST['shipping-order']);
            $free_shipping = trim($_POST['free-shipping-order']);
            $total_order = $_POST['total-order'];
            $payment = $_POST['payment'];
            $address .= $ward.$district.$province;

            if(isset($_SESSION['order-item-list'])){
                $order_item_list = json_decode($_SESSION['order-item-list']);
            }

            $username = '';

            if(isset($_POST['username'])){
                $username = trim($_POST['username']);
            }

            if($username != ''){
                $username = "'".$username."'";
            }
            else{
                $username = 'NULL';
            }

            if($note != ''){
                $note = "'".$note."'";
            }
            else{
                $note = 'NULL';
            }

            $sql = "INSERT INTO order_user(id_order, fname_user_order, lname_user_order,".
            " address_user_order, phone_user_order, email_user_order, username_user_order,".
            " note_order, shipping_order, free_shipping, total_order, date_created, payment_order)".
            " VALUES ('".$id."', '".$fname."', '".$lname."', '".$address."', '".$phone."', '".$email.
            "', ".$username.", ".$note.", '".$shipping."', '".$free_shipping."', '".$total_order."',".
            " CURRENT_TIMESTAMP(), '".$payment."');";

            $sql_result = mysqli_query($this->conn, $sql);
            if($sql_result){
                $check = false;
                $_SESSION['order_item_list'] = [];
                for($row = 0; $row < count($order_item_list); $row++){
                    $sql = "INSERT INTO order_item(id_order, name_item, quantity_item, total_item) VALUES".
                    " ('".$id."', '".$order_item_list[$row]->name_item."', '".$order_item_list[$row]->quantity."',".
                    " '".$order_item_list[$row]->total_item."')";
                    $sql_result = mysqli_query($this->conn, $sql);
                    if($sql_result){
                        $check = true;
                        $_SESSION['order_item_list'][] = $order_item_list[$row]->id_item;
                    }
                    else{
                        $check = false;
                    }
                }
                if($check){
                    $_SESSION['id_order'] = $id;
                    $_SESSION['order-item-list'] = false;
                    $payment = $payment == 'cod'?'Cash on delivery (COD)':'VNPay';
                    if($_POST['payment'] == 'cod'){
                        if($note == 'NULL'){
                            $note = "There isn't any note";
                        }
                        else{
                            $note = str_replace("'", '', $note);
                        }
                        $data_email = array(
                            "user" => array(
                                "fname" => $fname,
                                "lname" => $lname,
                                "address" => $address,
                                "phone" => $phone,
                                "email" => $email
                            ),
                            "order" => array(
                                "id" => $id,
                                "date" => $this->get_date_order($id, 'created'),
                                "payment" => $payment,
                                "item_list" => json_decode($this->get_order_item($id), true),
                                "note" => $note,
                                "shipping" => $shipping,
                                "free_shipping" => $free_shipping,
                                "total" => $total_order
                            )
                        );
                        if($this->send_mail($data_email)){
                            header("location: http://localhost/tmdt_201/place-order/success/".$id);
                        }
                    }
                    elseif($_POST['payment'] == 'vnpay'){
                        $data_vnp = array(
                            "bank_code" => $_POST['bank_code'],
                            "language" => $_POST['language'],
                            "amount" => $total_order,
                            "id" => $id
                        );
                        $this->vnpay_create($data_vnp);
                    }
                }
                else{
                    header("location: http://localhost/tmdt_201/place-order/fail");
                } 
            }
            else{
                header("location: http://localhost/tmdt_201/place-order/fail");
            }
        }
    }

   /*public function get_date_create_order($id){
        $sql = "SELECT date_created FROM order_user WHERE id_order='".$id."';";
        return $this->query_return_row($sql);
    }*/

    public function get_content_email($data){
        $header = array(
            'Content-Type: application/json'
        );
        $data = json_encode($data, JSON_UNESCAPED_UNICODE);
        $curl = curl_init();
        $option = array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_URL => 'http://localhost/tmdt_201/cart/email',
            CURLOPT_HTTPHEADER => $header,
            CURLOPT_POSTFIELDS => $data
        );
        curl_setopt_array($curl, $option);
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
    }

    public function send_mail($data){
        require_once("./mvc/models/ConfigEmail.php");
        $mail = new PHPMailer(true);

        //Server settings
        $mail->SMTPDebug = 0;                                       // Unable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $organi_email;                          // SMTP username
        $mail->Password   = $organi_password;                       // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom($organi_email, 'OrganiShop');
        $mail->addAddress($data['user']['email'], 'User');          // Add a recipient

        // Content
        $mail->isHTML(true);                                        // Set email format to HTML
        $mail->Subject = $organi_subject;
        $mail->msgHTML($this->get_content_email($data), './public/images/email');
        $mail->AltBody = $organi_alt;

        if($mail->send()){
            return true;
        }
        else{
            return false;
        } 
    }

    public function vnpay_create($data){
        require_once("./mvc/models/ConfigVNPay.php");

        $vnp_TxnRef = $data['id']; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toan don hang';
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $data['amount'] * 100;
        $vnp_Locale = $data['language'];
        $vnp_BankCode = $data['bank_code'];
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
        // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        header('location: '.$vnp_Url);
    }

    public function vnpay_return(){
        require_once("./mvc/models/ConfigVNPay.php");

        $inputData = array();
        $returnData = array();
        $data = $_GET;
        foreach ($data as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHashType']);
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . $key . "=" . $value;
            } else {
                $hashData = $hashData . $key . "=" . $value;
                $i = 1;
            }
        }
        $vnpTranId = $inputData['vnp_TransactionNo']; //Mã giao dịch tại VNPAY
        $vnp_BankCode = $inputData['vnp_BankCode']; //Ngân hàng thanh toán
        //$secureHash = md5($vnp_HashSecret . $hashData);
        $secureHash = hash('sha256',$vnp_HashSecret . $hashData);
        $orderId = $inputData['vnp_TxnRef'];

        try {
            //Check Orderid    
            //Kiểm tra checksum của dữ liệu
            if ($secureHash == $vnp_SecureHash) {
                //Lấy thông tin đơn hàng lưu trong Database và kiểm tra trạng thái của đơn hàng, mã đơn hàng là: $orderId            
                //Việc kiểm tra trạng thái của đơn hàng giúp hệ thống không xử lý trùng lặp, xử lý nhiều lần một giao dịch
                //Giả sử: $order = mysqli_fetch_assoc($result);
                $order = json_decode($this->get_order_by_id($orderId));
                if ($order != NULL) {
                    if ($order->paid_order == 0) {
                        if ($inputData['vnp_ResponseCode'] == '00') {
                            if($this->update_paid_status($orderId)){
                                $data_vnp = array(
                                    "vnp_TxnRef" => $orderId,
                                    "vnp_ResponseCode" => $inputData['vnp_ResponseCode'],
                                    "vnp_TransactionNo" => $inputData['vnp_TransactionNo'],
                                    "vnp_PayDate" => $inputData['vnp_PayDate'],
                                    "vnp_OrderInfo" => $inputData['vnp_OrderInfo'],
                                    "vnp_BankTranNo" => $inputData['vnp_BankTranNo'],
                                    "vnp_BankCode" => $inputData['vnp_BankCode'],
                                    "vnp_Amount" => $inputData['vnp_Amount'],
                                    "vnp_SecureHash" => $vnp_SecureHash
                                );
                                if($this->update_vnpay_info($data)){
                                    $returnData['RspCode'] = '00';
                                    $returnData['Message'] = 'Confirm Success';
                                    $returnData['TxnRef'] = $orderId;
                                }
                                else{
                                    $returnData['RspCode'] = '50';
                                    $returnData['Message'] = 'Server Error';
                                }
                            }
                            else{
                                $returnData['RspCode'] = '50';
                                $returnData['Message'] = 'Server Error';
                            }
                        }               
                    } else {
                        $returnData['RspCode'] = '02';
                        $returnData['Message'] = 'Order already confirmed';
                    }
                } else {
                    $returnData['RspCode'] = '01';
                    $returnData['Message'] = 'Order not found';
                }
            } else {
                $returnData['RspCode'] = '97';
                $returnData['Message'] = 'Invalid checksum';
            }
        } catch (Exception $e) {
            $returnData['RspCode'] = '99';
            $returnData['Message'] = 'Unknow error';
        }
        //Trả lại VNPAY theo định dạng JSON
        return json_encode($returnData);
    }

    public function update_vnpay_info($data){
        $txn_ref = $data['vnp_TxnRef'];
        $res_code = $data['vnp_ResponseCode'];
        $trans_no = $data['vnp_TransactionNo'];
        $pay_date = $data['vnp_PayDate'];
        $order_info = $data['vnp_OrderInfo'];
        $bank_trans_no = $data['vnp_BankTranNo'];
        $bank_code = $data['vnp_BankCode'];
        $amount = $data['vnp_Amount'];
        $secure_hash = $data['vnp_SecureHash'];
        $sql = "INSERT INTO order_vnpay(vnp_TxnRef, vnp_ResponseCode, vnp_TransactionNo,".
        " vnp_PayDate, vnp_OrderInfo, vnp_BankTranNo, vnp_BankCode, vnp_Amount, vnp_SecureHash)".
        " VALUES ('".$txn_ref."', '".$res_code."', '".$trans_no."', '".$pay_date."', '".$order_info.
        "','".$bank_trans_no."', '".$bank_code."', '".$amount."', '".$secure_hash."');";

        $sql_result = mysqli_query($this->conn, $sql);
        $result = false;
        if($sql_result){
            $result = true;
        }
        return $result;
    }

    public function get_vnpay_info($id){
        $sql = "SELECT * FROM order_vnpay WHERE vnp_TxnRef='".$id."';";
        return $this->query_return_row($sql);
    }
}
?>