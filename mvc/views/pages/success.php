    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/images/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Success</h2>
                        <div class="breadcrumb__option">
                            <a href="http://localhost/tmdt_201/home">Home</a>
                            <span>Place order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <div class="container my-5">
        <h4 class="text-center text-success mb-5">
            <i class="fa fa-info-circle"></i> Your order is created seccessfully!
        </h4>
        <?php
        $order_info = json_decode($data['order_info']);
        $item_order_list = json_decode($data['item_order_list']);
        $vnpay_info = json_decode($data['vnpay_info']);
        ?>
        <h4 class="text-center my-5">Id of your order is: <u><b><?php echo $order_info->id_order; ?></b></u>, please use this id to check the status of your order by searching for it on <b>SEARCH BAR</b>!<h4>
        <h4 class="text-center my-5 text-info">
            This following invoice has just sent to your email that is "<?php echo $order_info->email_user_order; ?>" as well.</i>
        </h4>
        <div class="container bg-light">
            <div class="container text-center py-2">
                <h5>Your Invoice</h5>
            </div>
            <div class="container w-75 bg-white py-3">
                <?php
                if($vnpay_info){
                ?>
                <div class="container text-center py-2">
                    <img src="/tmdt_201/public/images/email/vnpay-logo.jpg" alt="vnpay-logo" style="width: 210px; height: 120px;">
                </div>
                <h5 class="text-center">VNPay Response</h5>
                <div class="container w-75 py-2">
                    <div class="row">
                        <div class="col-4">
                            Ma don hang:
                        </div>
                        <div class="col-8 text-right">
                            <?php echo $vnpay_info->vnp_TxnRef; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            So tien:
                        </div>
                        <div class="col-8 text-right">
                            <?php echo $vnpay_info->vnp_Amount/100; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            Noi dung thanh toan:
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php echo $vnpay_info->vnp_OrderInfo; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            Ma GD tai VNPAY:
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php echo $vnpay_info->vnp_TransactionNo; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            Ma Ngan hang:
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php echo $vnpay_info->vnp_BankCode; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            Thoi gian thanh toan:
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php echo $vnpay_info->vnp_PayDate; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            Ket qua:
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php $res_code = $vnpay_info->vnp_ResponseCode;
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
                <div class="container text-center py-2">
                    <img src="/tmdt_201/public/images/email/logo.jpg" alt="logo">
                </div>
                <h3 class="text-center">Thank you for your business</h3>
                <br>
                <h4 class="text-center">Your Order</h4>
                <div class="text-secondary text-center">
                    <div>ID: <b><?php echo $order_info->id_order; ?></b></div>
                    <div>Date created: <?php echo date_format(date_create($order_info->date_created), 'H:i:s \- d/m/Y'); ?></div>
                    <div>Payment method: <b><?php echo $order_info->payment_order == 'cod'?'Cash on delivery (COD)':'VNPay'; ?></b></div>
                    <div>Note: * <b><i><?php echo $order_info->note_order;?></i></b> *</div>
                </div>
                <br>
                <div class="container w-75 table-responsive-md">
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
                            foreach($item_order_list as $value){
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
                                <td><b>+ <?php echo number_format($order_info->shipping_order, 0); ?></b></td>
                            </tr>
                            <tr class="text-danger font-italic">
                                <td>*</td>
                                <td colspan="4"><b>Free Shipping</b></td>
                                <td class="text-warning"><b><?php echo $order_info->free_shipping == 0?'Not Apply':'Apply';?></b></td>
                            </tr>
                            <tr class="text-secondary font-italic">
                                <td>*</td>
                                <td colspan="4"><b>Coupon</b></td>
                                <td class="text-secondary"><b>Not Apply</b></td>
                            </tr>
                            <tr class="font-weight-bold">
                                <td>*</td>
                                <td colspan="4">Total</td>
                                <td><?php echo number_format($order_info->total_order, 0); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <br>
                <h4 class="text-center">Your Details</h4>
                <div class="container w-75 py-2">
                    <div class="row">
                        <div class="col-4">
                            Name
                        </div>
                        <div class="col-8 text-right">
                            <?php echo $order_info->fname_user_order.' '.$order_info->lname_user_order; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            Address
                        </div>
                        <div class="col-8 text-right">
                            <?php echo $order_info->address_user_order; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            Phone
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php echo $order_info->phone_user_order; ?>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-5 col-4">
                            Email
                        </div>
                        <div class="col-sm-7 col-8 text-right">
                            <?php echo $order_info->email_user_order; ?>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="container text-center py-2 text-secondary">
                <div>Powered by Organi Shop</div>
            </div>
        </div>
    </div>