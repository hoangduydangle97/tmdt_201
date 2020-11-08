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
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Address" class="checkout__input__add">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Order notes</p>
                                <input type="text"
                                    placeholder="Notes about your order, e.g. special notes for delivery.">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    <?php $item_list = json_decode($data['item_list']);
                                    $size_list = count($item_list);
                                    $sub_total = 0;
                                    for($row = 0; $row < $size_list; $row++){
                                        $item_total = $item_list[$row]->price_item * $item_list[$row]->quantity;
                                        $sub_total += $item_total;
                                    ?>
                                    <li><?php echo $item_list[$row]->name_item; ?> <span>$<?php echo number_format($item_total, 2);?></span></li>
                                    <?php }?>
                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span>$<?php echo number_format($sub_total, 2);?></span></div>
                                <div class="checkout__order__total">Total <span>$<?php echo number_format($sub_total, 2);?></span></div>
                                <div class="">
                                    <label for="payment">
                                        <input type="radio" id="cod" name="payment"> Cash on delivery (COD)
                                    </label>
                                </div>
                                <div class="">
                                    <label for="paypal">
                                        <input type="radio" id="mono" name="payment"> Momo Payment
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