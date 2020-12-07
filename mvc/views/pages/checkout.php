    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/images/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Check out</h2>
                        <div class="breadcrumb__option">
                            <a href="http://localhost/tmdt_201/cart">Cart</a>
                            <span>Check out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <?php if(isset($_SESSION['error'])){
                if($_SESSION['error'] != false){?>
            <div class="container <?php echo $_SESSION['error'][0] == false?'text-success':'text-danger';?> text-center mb-3 error-info">
            <i class="fa fa-info-circle"></i> <?php echo $_SESSION['error'][1];?> <i class="fa fa-times category-btn" onclick="$('.error-info').attr('hidden', true)"></i>
            </div>
            <?php }
            $_SESSION['error'] = false;
            }?>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form method="POST" action="/tmdt_201/cart/create_order">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <?php if($data['user_info'] != null){
                            $user_info = json_decode($data['user_info']);
                            ?>
                            <input type="hidden" name="username" value="<?php echo $user_info->username_user;?>">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>First Name: <b><?php echo $user_info->fname_user;?></b></p>
                                        <input type="hidden" name="fname" value="<?php echo $user_info->fname_user;?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name: <b><?php echo $user_info->lname_user;?></b></p>
                                        <input type="hidden" name="lname" value="<?php echo $user_info->lname_user;?>">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address: <b><?php echo $user_info->address_user;?></b></p>
                                <input type="hidden" name="address" value="<?php echo $user_info->address_user;?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone: <b><?php echo $user_info->phone_user;?></b></p>
                                        <input type="hidden" name="phone" value="<?php echo $user_info->phone_user;?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email: <b><?php echo $user_info->email_user;?></b></p>
                                        <input type="hidden" name="email" value="<?php echo $user_info->email_user;?>">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes:</p>
                                <input type="text" name="note" placeholder="Notes about your order, e.g. special notes for delivery. (limit 100 characters)" maxlength="100">
                            </div>
                            <?php }
                            else{?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>First Name<span>*</span></p>
                                        <input type="text" placeholder="Your first name" name="fname" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" placeholder="Your last name" name="lname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <div class="row mb-4">
                                    <div class="col-6">
                                        Address<span>*</span>
                                        <span class="spinner-border text-primary loading-ajax d-none"></span>
                                    </div>
                                    <div class="col-6 text-right">
                                        Expected Delivery Time:
                                        <b class="expected-time">
                                        <?php $expected_time = json_decode($data['expected-time']);
                                        echo date_format(date_create($expected_time), 'd/m/Y');
                                        ?>
                                        </b>
                                        <input type="hidden" id="expected-input" name="expected-time" value="<?php echo date_format(date_create($expected_time), 'd/m/Y');?>">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-4">
                                        <select class="form-control select-checkout" id="province" onchange="provinceChange()">
                                            <?php $province_list = json_decode($data['province_list']);
                                            foreach($province_list as $value){
                                            ?>
                                            <option value="<?php echo $value->id; ?>">
                                                <?php echo $value->name; ?>
                                            </option>
                                            <?php }?>
                                        </select>
                                        <input type="hidden" id="province-input" name="province" value="<?php echo $province_list[0]->name;?>">
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control select-checkout" id="district" onchange="districtChange()">
                                            <?php $district_list = json_decode($data['district_list']);
                                            foreach($district_list as $value){
                                            ?>
                                            <option value="<?php echo $value->DistrictID; ?>">
                                                <?php echo $value->DistrictName; ?>
                                            </option>
                                            <?php }?>
                                        </select>
                                        <input type="hidden" id="district-input" name="district" value="<?php echo $district_list[0]->DistrictName;?>">
                                    </div>
                                    <div class="col-lg-4">
                                        <select class="form-control select-checkout" id="ward" onchange="wardChange()">
                                            <?php $ward_list = json_decode($data['ward_list']);
                                            foreach($ward_list as $value){
                                            ?>
                                            <option value="<?php echo $value->WardCode; ?>">
                                                <?php echo $value->WardName; ?>
                                            </option>
                                            <?php }?>
                                        </select>
                                        <input type="hidden" id="ward-input" name="ward" value="<?php echo $ward_list[0]->WardName;?>">
                                    </div>
                                </div>
                                <input type="text" placeholder="Your house number and street" name="address" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="tel" placeholder="Your phone number" name="phone" pattern="[0-9]{10}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" placeholder="Your email" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes</p>
                                <input type="text" name="note" placeholder="Notes about your order, e.g. special notes for delivery. (limit 100 characters)" maxlength="100">
                            </div>
                            <?php }?>
                            <h4 class="payment-vnpay d-none">Payment via VNPay</h4>
                            <div class="row payment-vnpay d-none">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Bank/Credit/Wallet<span>*</span></p>
                                        <select name="bank_code" id="bank_code" class="form-control select-checkout">
                                            <option value="NCB">Ngân hàng NCB</option>
                                            <option value="AGRIBANK">Ngân hàng Agribank</option>
                                            <option value="SCB">Ngân hàng SCB</option>
                                            <option value="SACOMBANK">Ngân hàng SacomBank</option>
                                            <option value="EXIMBANK">Ngân hàng EximBank</option>
                                            <option value="MSBANK">Ngân hàng MSBANK</option>
                                            <option value="NAMABANK">Ngân hàng NamABank</option>
                                            <option value="VNMART">Ví điện tử VnMart</option>
                                            <option value="VIETINBANK">Ngân hàng Vietinbank</option>
                                            <option value="VIETCOMBANK">Ngân hàng VCB</option>
                                            <option value="HDBANK">Ngân hàng HDBank</option>
                                            <option value="DONGABANK">Ngân hàng Dong A</option>
                                            <option value="TPBANK">Ngân hàng TPBank</option>
                                            <option value="OJB">Ngân hàng OceanBank</option>
                                            <option value="BIDV">Ngân hàng BIDV</option>
                                            <option value="TECHCOMBANK">Ngân hàng Techcombank</option>
                                            <option value="VPBANK">Ngân hàng VPBank</option>
                                            <option value="MBBANK">Ngân hàng MBBank</option>
                                            <option value="ACB">Ngân hàng ACB</option>
                                            <option value="OCB">Ngân hàng OCB</option>
                                            <option value="IVB">Ngân hàng IVB</option>
                                            <option value="VISA"> Thanh toan qua VISA/MASTER</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Language<span>*</span></p>
                                        <select name="language" id="language" class="form-control select-checkout">
                                            <option value="vn">Tiếng Việt</option>
                                            <option value="en">English</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    <?php $item_list = json_decode($data['item_list']);
                                    $order_item_list = [];
                                    $size_list = count($item_list);
                                    $sub_total = 0;
                                    for($row = 0; $row < $size_list; $row++){
                                        $item_total = $item_list[$row]->price_item * $item_list[$row]->quantity;
                                        $sub_total += $item_total;
                                        $order_item_list[] = ['id_item'=>$item_list[$row]->id_item, 
                                                                'name_item'=>$item_list[$row]->name_item, 
                                                                'quantity'=>$item_list[$row]->quantity, 
                                                                'total_item'=>$item_total];
                                    ?>
                                    <li><?php echo $item_list[$row]->name_item; ?> <span><?php echo number_format($item_total, 0);?> <u style="font-weight: 400;">đ</u></span></li>
                                    <?php }
                                    $_SESSION['order-item-list'] = json_encode($order_item_list);
                                    ?>
                                </ul>
                                <?php $shipping_fee = $data['shipping_fee']; 
                                $free_shipping = 0;
                                ?>
                                <div class="d-none" id="weight-total"><?php echo number_format($data['weight_total'], 0) ;?></div>
                                <div class="checkout__order__subtotal">Subtotal <span class="sub-total"><?php echo number_format($sub_total, 0);?> <u style="font-weight: 400;">đ</u></span></div>
                                <div class="checkout__order__total">Shipping <span class="text-success shipping-fee">+ <?php echo number_format($data['shipping_fee'], 0) ;?> <u style="font-weight: 400;">đ</u></span></div>
                                <input type="hidden" name="shipping-order" value="<?php echo $shipping_fee;?>">
                                <?php if($sub_total >= 299000){
                                    $shipping_fee = 0;
                                    $free_shipping = 1;
                                }?>
                                <div class="checkout__order__total">Free Shipping <span class="text-primary"><?php echo $free_shipping == 0?'Not Apply':'Apply';?></span></div>
                                <input type="hidden" name="free-shipping-order" value="<?php echo $free_shipping;?>">
                                <div class="checkout__order__total">Total <span class="total"><?php echo number_format($sub_total + $shipping_fee, 0);?> <u style="font-weight: 400;">đ</u></span></div>
                                <input type="hidden" name="total-order" value="<?php echo $sub_total + $shipping_fee;?>">
                                <div class="checkout__order__products">Payment</div>
                                <div>
                                    <label for="cod">
                                        <input type="radio" id="cod" value="cod" name="payment" checked> COD (Cash on delivery)
                                    </label>
                                </div>
                                <div>
                                    <label for="vnpay">
                                        <input type="radio" id="vnpay" value="vnpay" name="payment"> VNPay
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->