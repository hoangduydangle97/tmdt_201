    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/images/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Detail Order</h2>
                        <div class="breadcrumb__option">
                            <a href="http://localhost/tmdt_201/manageorder">Manage Order</a>
                            <span>Detail Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
        <?php $order_info = json_decode($data['order_info']);
        $order_list = json_decode($data['order_list']);
        $size_list = count($order_list);
        if($size_list == 0){
            echo '<h4 class="font-italic text-center">It is not found your order.</h4>';
        }
        else{
        ?>
            <div class="container mb-2" style="font-size: 1.2em;">
                ID Order: <b><?php echo $order_info->id_order; ?></b>
            </div>
            <div class="container mb-2" style="font-size: 1.2em;">
                Date Created: <?php echo date_format(date_create($order_info->date_order), 'H:i:s \- d/m/Y'); ?>
            </div>
            <div class="container mb-2" style="font-size: 1.2em;">
                Payment: <?php echo $order_info->payment_order == 'cod'?'COD':'VNPay'; ?>
            </div>
            <div class="container mb-2" style="font-size: 1.2em;">
                Status: <b><?php echo $order_info->status_order; ?></b>
            </div>
            <div class="container mb-5" style="font-size: 1.2em;">
                Tracking: <?php echo $order_info->tracking_order == null?'<i>No Info</i>':$order_info->tracking_order; ?>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products Detail</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Unit</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                for($row = 0; $row < $size_list; $row++){                              
                                ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="/tmdt_201/<?php echo $order_list[$row]->avatar_item; ?>" 
                                            alt="" width=100 height=100>
                                        <h5>
                                            <a href="http://localhost/tmdt_201/shop/detail/<?php echo $order_list[$row]->id_item;?>"
                                                class="item-cart">
                                                <?php echo $order_list[$row]->name_item; ?>
                                            </a>
                                        </h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?php echo number_format($order_list[$row]->price_item, 0); ?> <u style="font-weight: 400;">đ</u>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <b><?php echo $order_list[$row]->quantity_item; ?></b>
                                    </td>
                                    <td class="shoping__cart__price">kg</td>
                                    <td class="shoping__cart__total">
                                        <?php echo number_format($order_list[$row]->total_item, 0); ?> <u style="font-weight: 400;">đ</u>
                                    </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="/tmdt_201/shop" class="primary-btn cart-btn text-primary">CONTINUE SHOPPING</a>
                        <a href="/tmdt_201/manageorder" class="primary-btn cart-btn cart-btn-right text-success"><span class="icon_loading"></span>
                            Back to Manage Order</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Order Detail</h5>
                        <ul>
                            <li>Shipping <span style="font-size: 16px;"><?php echo number_format($order_info->shipping_order, 0);?> <u style="font-weight: 400;">đ</u></span></li>
                            <li>Free Shipping <span style="font-size: 16px;"><?php echo $order_info->free_shipping == 0?'Not Apply':'Apply';?></span></li>
                            <li>Coupon <span style="font-size: 16px;">Not Apply</span></li>
                            <li>Total <span style="font-size: 16px;"><?php echo number_format($order_info->total_order, 0);?> <u style="font-weight: 400;">đ</u></span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>User Detail</h5>
                        <ul>
                            <li>Name <span style="font-size: 16px;"><?php echo $order_info->fname_user_order.' '.$order_info->lname_user_order; ?></span></li>
                            <li>Address <span style="font-size: 16px;"><?php echo $order_info->address_user_order; ?></span></li>
                            <li>Phone <span style="font-size: 16px;"><?php echo $order_info->phone_user_order; ?></span></li>
                            <li>Email <span style="font-size: 16px;"><?php echo $order_info->email_user_order; ?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12 mb-2"> 
                    <b>Other info</b>
                </div>       
                <div class="col-12 table-responsive-lg">
                    <table class="table table-bordered text-nowrap">
                        <thead class="thead-light">
                            <tr>
                                <th class="text-center">Date Confirmed</th>
                                <th class="text-center">Date Confirm Prepared</th>
                                <th class="text-center">Date Confirm Delivered</th>
                                <th class="text-center">Date Request Return</th>
                                <th class="text-center">Date Confirm Request Return</th>
                                <th class="text-center">Date Confirm Returned</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td class="align-middle text-center">
                                <?php 
                                if($order_info->date_confirmed == null){
                                    echo '<i>No Info</i>';
                                }
                                else{
                                    echo date_format(date_create($order_info->date_confirmed), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle text-center">
                                <?php 
                                if($order_info->date_prepared == null){
                                    echo '<i>No Info</i>';
                                }
                                else{
                                    echo date_format(date_create($order_info->date_prepared), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle text-center">
                                <?php 
                                if($order_info->date_delivered == null){
                                    echo '<i>No Info</i>';
                                }
                                else{
                                    echo date_format(date_create($order_info->date_delivered), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle text-center">
                                <?php 
                                if($order_info->date_request == null){
                                    echo '<i>No Info</i>';
                                }
                                else{
                                    echo date_format(date_create($order_info->date_request), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle text-center">
                                <?php 
                                if($order_info->date_confirm_request == null){
                                    echo '<i>No Info</i>';
                                }
                                else{
                                    echo date_format(date_create($order_info->date_confirm_request), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle text-center">
                                <?php 
                                if($order_info->date_returned == null){
                                    echo '<i>No Info</i>';
                                }
                                else{
                                    echo date_format(date_create($order_info->date_returned), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php }?>
        </div>
    </section>
    <!-- Shoping Cart Section End -->