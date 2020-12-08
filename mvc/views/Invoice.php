<?php
$data = json_decode(file_get_contents('php://input'));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            *, ::after, ::before {
                box-sizing: border-box;
            }

            html {
                font-family: sans-serif;
                line-height: 1.15;
                -webkit-text-size-adjust: 100%;
                -webkit-tap-highlight-color: transparent;
            }

            body {
                margin: 0;
                font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #212529;
                text-align: left;
                background-color: #fff;
            }

            .container {
                width:100%;
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
            }

            .w-x {
                width: 85%;
            }

            @media (min-width: 576px){
                .container {
                    max-width: 540px;
                }
            }

            @media (min-width: 768px){
                .container {
                    max-width: 720px;
                }

                .w-x {
                    width: 75%!important;
                }
            }

            @media (min-width: 992px){
                .container {
                    max-width: 960px;
                }
            }

            @media (min-width: 1200px){
                .container {
                    max-width: 1140px;
                }
            }

            .bg-light {
                background-color:#f8f9fa!important;
            }

            .bg-white {
                background-color:#fff!important;
            }

            .text-center {
                text-align: center!important;
            }

            .text-right {
                text-align: right!important;
            }

            .text-secondary {
                color:#6c757d!important
            }

            .text-primary {
                color: #007bff!important;
            }

            .text-danger {
                color:#dc3545!important;
            }

            .text-success {
                color:#28a745!important;
            }

            .text-warning {
                color:#ffc107!important;
            }

            .py-2 {
                padding-top: .5rem;
                padding-bottom: .5rem;
            }

            .py-3 {
                padding-top: 1rem;
                padding-bottom: 1rem;
            }

            img {
                vertical-align: middle;
                border-style: none;
            }

            .font-italic {
                font-style: italic!important;
            }

            .font-weight-bold {
                font-weight: 700!important;
            }

            h4 {
                font-size: 1.5em;
                margin-top: 0;
                margin-bottom: .5rem;
                font-weight: 500;
                line-height: 1.2;
            }

            h5 {
                font-size: 1.25rem;
                margin-top: 0;
                margin-bottom: .5rem;
                font-weight: 500;
                line-height: 1.2;
            }

            hr {
                margin-top: 1rem;
                margin-bottom: 1rem;
                border: 0;
                border-top: 1px solid rgba(0,0,0,.1);
                box-sizing: content-box;
                height: 0;
                overflow: visible;
            }

            .small {
                font-size: 80%;
                font-weight: 400;
            }

            .row {
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: wrap;
                flex-wrap: wrap;
                margin-right: -15px;
                margin-left: -15px;
            }

            .col-4, .col-8, .col-sm-5, .col-sm-7 {
                position: relative;
                width: 100%;
                padding-right: 15px;
                padding-left: 15px;
            }

            .col-4 {
                -ms-flex: 0 0 33.333333%;
                flex: 0 0 33.333333%;
                max-width: 33.333333%;
            }

            .col-8 {
                -ms-flex: 0 0 66.666667%;
                flex: 0 0 66.666667%;
                max-width: 66.666667%;
            }

            .col-sm-5 {
                -ms-flex: 0 0 41.666667%;
                flex: 0 0 41.666667%;
                max-width: 41.666667%;
            }

            .col-sm-7 {
                -ms-flex: 0 0 58.333333%;
                flex: 0 0 58.333333%;
                max-width: 58.333333%;
            }

            .table-responsive-md {
                display: block;
                width: 100%;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
            }

            .table {
                width: 100%;
                margin-bottom: 1rem;
                color:#212529;
                border-collapse: collapse;
            }

            .table td,.table th {
                padding: .75rem;
                vertical-align: top;
                border-top: 1px solid #dee2e6;
            }

            .table thead th {
                vertical-align: bottom;
                border-bottom: 2px solid #dee2e6;
            }

            .table tbody+tbody {
                border-top: 2px solid #dee2e6;
            }

            .table-hover tbody tr:hover {
                color:#212529;
                background-color:rgba(0,0,0,.075);
            }

            .table-striped tbody tr:nth-of-type(odd) {
                background-color:rgba(0,0,0,.05);
            }

            a {
                color: #007bff;
                text-decoration: none;
                background-color: transparent;
            }
        </style>
    </head>
    <body>
        <div class="container bg-light">
            <div class="container text-center py-2">
                Invoice from Organi Shop
            </div>
            <div class="container w-x bg-white py-3">
                <div class="container text-center py-2">
                    <img src="/logo.jpg" alt="logo">
                </div>
                <div class="container text-center text-secondary py-2 small">
                    Hi,
                    <span><?php echo $data->user->fname.' '.$data->user->lname;?></span>!
                </div>
                <div class="container text-center text-secondary py-2 small">
                    We've just received your order with your email is
                    <span><?php echo $data->user->email;?></span>
                </div>
                <h4 class="text-center">Thank you for your business</h4>
                <br>
                <h5 class="text-center">Your Order</h5>
                <div class="text-secondary text-center small">
                    <div>ID: <b><?php echo $data->order->id;?></b></div>
                    <div>Date created: <?php echo $data->order->date;?></div>
                    <div>Payment method: <b><?php echo $data->order->payment;?></b></div>
                    <div>Note: * <b><i><?php echo $data->order->note;?></i></b> *</div>
                </div>
                <br>
                <div class="container table-responsive-md w-x small">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Unit</th>
                                <th>Cost (<u>đ</u>)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach($data->order->item_list as $value){
                            ?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td><?php echo $value->name_item;?></td>
                                <td><?php echo number_format($value->price_item, 0);?></td>
                                <td><?php echo $value->quantity_item;?></td>
                                <td>kg</td>
                                <td><?php echo number_format($value->total_item, 0);?></td>
                            </tr>
                            <?php 
                            $i++;
                            }?>
                            <tr class="text-primary font-italic">
                                <td>*</td>
                                <td colspan="4"><b>Shipping fee</b></td>
                                <td class="text-success"><b>+ <?php echo number_format($data->order->shipping, 0);?></b></td>
                            </tr>
                            <tr class="text-danger font-italic">
                                <td>*</td>
                                <td colspan="4"><b>Free Shipping</b></td>
                                <td class="text-warning"><b><?php echo $data->order->free_shipping == 0?'Not Apply':'Apply';?></b></td>
                            </tr>
                            <tr class="text-secondary font-italic">
                                <td>*</td>
                                <td colspan="4"><b>Coupon</b></td>
                                <td class="text-secondary"><b>Not Apply</b></td>
                            </tr>
                            <tr class="font-weight-bold">
                                <td>*</td>
                                <td colspan="4">Total</td>
                                <td><?php echo number_format($data->order->total, 0);?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <h5 class="text-center">Your Details</h5>
                <div class="container w-x small py-2">
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            <b>Name</b>
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php echo $data->user->fname.' '.$data->user->lname;?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            <b>Address</b>
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php echo $data->user->address;?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            <b>Phone</b>
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php echo $data->user->phone;?>
                        </div>
                    </div>
                    <hr>
                </div>
                <br>
                <?php
                if(isset($data->vnpay)){
                ?>
                <div class="container text-center py-2">
                    <img src="/vnpay-logo.jpg" alt="vnpay-logo" style="width: 210px; height: 120px;">
                </div>
                <h5 class="text-center">VNPay Response</h5>
                <div class="container w-x small py-2">
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            Ma don hang:
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php echo $data->vnpay->vnp_TxnRef; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            So tien:
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php echo $data->vnpay->vnp_Amount; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            Noi dung thanh toan:
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php echo $data->vnpay->vnp_OrderInfo; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            Ma GD tai VNPAY:
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php echo $data->vnpay->vnp_TransactionNo; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            Ma Ngan hang:
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php echo $data->vnpay->vnp_BankCode; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            Thoi gian thanh toan:
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php echo $data->vnpay->vnp_PayDate; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            Ket qua:
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php $res_code = $data->vnpay->vnp_ResponseCode;
                            if($res_code == '00'){
                                echo 'GD Thanh cong';
                            }
                            else{
                                echo 'GD Khong Thanh cong';
                            }
                            ?>
                        </div>
                    </div>
                    <hr>
                </div>
                <br>
                <?php }?>
                <div class="text-center">If you have any questions, please <a href="http://localhost/tmdt_201/contact">contact us</a> and we'll be happy to help.</div>
            </div>
            <div class="container text-center py-2 small text-secondary">
                <div>268, Ly Thuong Kiet, Ward 14, District 10, HCMC</div>
                <div>Powered by Organi Shop</div>
            </div>
        </div>
    </body>
</html>