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
        <?php $order_list = json_decode($data['order_list']);
        $size_list = count($order_list);
        if($size_list == 0){
            echo '<h4 class="font-italic text-center">There is no any products in your order.</h4>';
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
                                        $<?php echo $order_list[$row]->price_item; ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <b><?php echo $order_list[$row]->quantity_item; ?></b>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php echo $order_list[$row]->total_item; ?>
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
                        <h5>Order Total</h5>
                        <ul>
                            <li>Total <span class="total">$<?php echo json_decode($data['total_order']);?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </section>
    <!-- Shoping Cart Section End -->