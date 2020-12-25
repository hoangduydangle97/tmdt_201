    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/images/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Detail Order</h2>
                        <div class="breadcrumb__option">
                            <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1){?>
                                <a href="http://localhost/tmdt_201/list-order">Order</a>
                            <?php }
                            else{?>
                                <a href="http://localhost/tmdt_201/manage-order">Manage Order</a>
                            <?php }?>
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
                Date Created: <?php echo date_format(date_create($order_info->date_created), 'H:i:s \- d/m/Y'); ?>
            </div>
            <div class="container mb-2" style="font-size: 1.2em;">
                Payment: <?php echo $order_info->payment_order == 'cod'?'COD':'VNPay'; ?>
            </div>
            <div class="container mb-2" style="font-size: 1.2em;">
                Status: <b><span id="status-order"><?php echo $order_info->status_order; ?></span></b>
            </div>
            <div class="container mb-5" style="font-size: 1.2em;">
                Tracking: <?php echo $order_info->tracking_order == null?'<i>No Info</i>':$order_info->tracking_order; ?>
            </div>
            <?php $status = $order_info->status_order;
            if($status == 'Canceled'){?>
            <div class="container mb-5 text-danger" style="font-size: 1.2em;">
                <div>
                    <i class="fa fa-info-circle"></i>
                    <?php echo $order_info->cancel_role == 0?'You canceled this order.':'This order was canceled.' ;?>
                </div>
                <div>
                    Reason: <i><?php echo $order_info->cancel_reason ;?></i>
                </div>
                <div>
                    Date Canceled: <?php echo date_format(date_create($order_info->date_canceled), 'H:i:s \- d/m/Y') ;?>
                </div>
            </div>
            <?php } 
            elseif(isset($_SESSION['role']) && $_SESSION['role'] == 1){
            $btn = json_decode($this->order_object->get_status_btn($status)); ?>
            <div class="container mb-5" id="ajax-return" style="font-size: 1.2em;">
                <button type="button" id="<?php echo $order_info->id_order; ?>" class="btn <?php echo $btn->style; ?>" 
                    onclick="changeStatusOrder(<?php echo "'".$status."'"; ?>, <?php echo "'".$order_info->id_order."'"; ?>, <?php echo "'".$btn->style."'"; ?>)">
                    <?php echo $btn->content; ?>
                </button>
                <button type="button" class="btn btn-dark ml-5" data-toggle="modal" data-target="#cancel-modal">
                    <i class="fa fa-times-circle"></i> Cancel
                </button>
                <div class="spinner-border text-primary d-none" id="spinner-<?php echo $order_info->id_order; ?>"></div>
            </div>
            <?php }
            else{
                if($status == 'Not Confirmed'){?>
            <div class="container mb-5" id="ajax-return" style="font-size: 1.2em;">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#cancel-modal">
                    <i class="fa fa-times-circle"></i> Cancel
                </button>
            </div>
            <?php }
                elseif($status == 'Delivered'){
                $date_current = new DateTime();
                $date_delivered = date_create($order_info->date_delivered);
                $interval = $date_current->diff($date_delivered);
                if($interval->d < 2 || ($interval->d == 2 && $interval->s == 0)){
            ?>
            <div class="container mb-5" id="ajax-return" style="font-size: 1.2em;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#return-modal">
                    Request Return
                </button>
            </div>
            <?php }}
                elseif($status == 'Requesting Return'){
            ?>
            <div class="container mb-5 text-danger" style="font-size: 1.2em;">
                <i class="fa fa-info-circle"></i>
                You requested to return this order. We'll contact you soon.
            </div>
            <?php }}?>
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
                        <a href="/tmdt_201/manage-order" class="primary-btn cart-btn cart-btn-right text-success"><span class="icon_loading"></span>
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
                            <td class="align-middle text-center" id="date-confirmed">
                                <?php 
                                if($order_info->date_confirmed == null){
                                    echo '<i>No Info</i>';
                                }
                                else{
                                    echo date_format(date_create($order_info->date_confirmed), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle text-center" id="date-prepared">
                                <?php 
                                if($order_info->date_prepared == null){
                                    echo '<i>No Info</i>';
                                }
                                else{
                                    echo date_format(date_create($order_info->date_prepared), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle text-center" id="date-delivered">
                                <?php 
                                if($order_info->date_delivered == null){
                                    echo '<i>No Info</i>';
                                }
                                else{
                                    echo date_format(date_create($order_info->date_delivered), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle text-center" id="date-request">
                                <?php 
                                if($order_info->date_request == null){
                                    echo '<i>No Info</i>';
                                }
                                else{
                                    echo date_format(date_create($order_info->date_request), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle text-center" id="date-confirm-request">
                                <?php 
                                if($order_info->date_confirm_request == null){
                                    echo '<i>No Info</i>';
                                }
                                else{
                                    echo date_format(date_create($order_info->date_confirm_request), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle text-center" id="date-return">
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

    <?php if($order_info->status_order == 'Not Confirmed' || (isset($_SESSION['role']) && $_SESSION['role'] == 1)){?>
    <!-- Cancel Modal -->
    <div class="modal fade" id="cancel-modal" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-info">
                        <i class="fa fa-times-circle"></i>
                        Cancel Order
                    </h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div>
                        You've just selected to cancel your order <b>'<?php echo $order_info->id_order; ?>'</b>
                    </div>
                    <br>
                    <div>
                        Please let us know your reason
                    </div>
                    <div class="form-group" id="cancel-reason">
                        <textarea class="form-control" rows="3" id="cancel-reason-content" name="cancel-reason" maxlength="100" placeholder="Your reason"></textarea>
                    </div>
                </div>                                                                  
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" id="confirm-btn" class="btn btn-primary" 
                        onclick="changeToCanceled('<?php echo $order_info->id_order; ?>', <?php echo $_SESSION['role'] == 1?1:0; ?>)">
                        <i class="fa fa-check-circle"></i> Confirm
                    </button>
                    <div class="spinner-border text-primary d-none mr-5" id="spinner"></div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-close"></i> Cancel
                    </button>
                </div>                                                                  
            </div>
        </div>
    </div>
    <?php }
    elseif($order_info->status_order == 'Delivered'){?>
    <!-- Return Modal -->
    <div class="modal fade" id="return-modal" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-info">
                        <i class="fa fa-info-circle"></i>
                        Request Return
                    </h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div>
                        You've just requested to return your order <b>'<?php echo $order_info->id_order; ?>'</b>
                    </div>
                    <br>
                    <div>
                        Please let us know your reason
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="reason" value="not-described" checked>The product is not described correctly
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="reason" value="damaged-product">Damaged product
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="reason" value="packing-torned">The packaging is torn
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="reason" value="other-reason">Other
                        </label>
                    </div>
                    <div class="form-group d-none" id="other-reason">
                        <textarea class="form-control" rows="3" id="other-reason-content" name="other-reason" maxlength="100" placeholder="Your reason"></textarea>
                    </div>
                </div>                                                                  
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" id="confirm-btn" class="btn btn-primary" onclick="changeToRequesting('<?php echo $order_info->id_order; ?>')">
                        <i class="fa fa-check-circle"></i> Confirm
                    </button>
                    <div class="spinner-border text-primary d-none mr-5" id="spinner"></div>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-close"></i> Cancel
                    </button>
                </div>                                                                  
            </div>
        </div>
    </div>
    <?php }?>