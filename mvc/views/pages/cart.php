    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/images/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="http://localhost/tmdt_201/home">Home</a>
                            <span>Cart</span>
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
        <?php $item_list = json_decode($data['item_list']);
        $size_list = count($item_list);
        if($size_list == 0){
            echo '<h4 class="font-italic text-center">There is no any products in your cart.</h4>';
        }
        else{
        ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sub_total = 0;
                                for($row = 0; $row < $size_list; $row++){                              
                                ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="/tmdt_201/public/master1/img/product/<?php echo $item_list[$row]->avatar_item; ?>.jpg" 
                                            alt="" width=100 height=100>
                                        <h5>
                                            <a href="http://localhost/tmdt_201/shop/detail/<?php echo $item_list[$row]->id_item;?>"
                                                class="item-cart">
                                                <?php echo $item_list[$row]->name_item; ?>
                                            </a>
                                        </h5>
                                    </td>
                                    <td class="shoping__cart__price" id="<?php echo $item_list[$row]->id_item; ?>">
                                        $<?php echo $item_list[$row]->price_item; ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <?php $username = isset($_SESSION['username'])?$_SESSION['username']:'none'; ?>
                                                <input type="hidden" class="hidden-input id_item" value="<?php echo $item_list[$row]->id_item; ?>">
                                                <input type="hidden" class="hidden-input username" value="<?php echo $username; ?>">
                                                <input type="text" class="text-input" id="<?php echo $item_list[$row]->id_item; ?>" value="<?php echo $item_list[$row]->quantity; ?>" readonly>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total" id="<?php echo $item_list[$row]->id_item; ?>">
                                        $<?php $item_total = $item_list[$row]->price_item * $item_list[$row]->quantity;
                                        $sub_total += $item_total;
                                        echo $item_total;
                                        ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close" onclick="deleteCookie('<?php echo $item_list[$row]->id_item; ?>', '<?php echo $username; ?>')"></span>
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
                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span class="sub-total">$<?php echo $sub_total;?></span></li>
                            <li>Total <span class="total">$<?php echo $sub_total;?></span></li>
                        </ul>
                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </section>
    <!-- Shoping Cart Section End -->