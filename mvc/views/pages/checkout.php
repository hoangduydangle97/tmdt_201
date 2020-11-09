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
                                        <input type="text" name="fname" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="lname" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Address" class="checkout__input__add" name="address" required>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="tel" name="phone" pattern="[0-9]{10}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="email" name="email" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes</p>
                                <input type="text" name="note" placeholder="Notes about your order, e.g. special notes for delivery. (limit 100 characters)" maxlength="100">
                            </div>
                            <?php }?>
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
                                    <li><?php echo $item_list[$row]->name_item; ?> <span>$<?php echo number_format($item_total, 2);?></span></li>
                                    <?php }
                                    $_SESSION['order-item-list'] = json_encode($order_item_list);
                                    ?>
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>$<?php echo number_format($sub_total, 2);?></span></div>
                                <div class="checkout__order__total">Total <span>$<?php echo number_format($sub_total, 2);?></span></div>
                                <input type="hidden" name="total-order" value="<?php echo number_format($sub_total, 2);?>">
                                <div class="">
                                    <label for="cod">
                                        <input type="radio" id="cod" value="cod" name="payment" checked> Cash on delivery (COD)
                                    </label>
                                </div>
                                <div class="">
                                    <label for="momo">
                                        <input type="radio" id="momo" value="momo" name="payment"> Momo Payment
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