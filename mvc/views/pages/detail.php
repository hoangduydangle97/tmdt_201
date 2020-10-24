    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <?php $item_object = json_decode($data["item"]); ?>
                        <h2><?php echo $item_object->name_category; ?></h2>
                        <div class="breadcrumb__option">
                            <a href="http://localhost/tmdt_201/home">Home</a>
                            <a href="http://localhost/tmdt_201/shop/<?php echo $item_object->category_item; ?>"><?php echo $item_object->name_category; ?></a>
                            <span><?php echo $item_object->name_item; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="/tmdt_201/public/master1/img/product/details/product-details-1.jpg" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="/tmdt_201/public/master1/img/product/details/product-details-2.jpg"
                                src="/tmdt_201/public/master1/img/product/details/thumb-1.jpg" alt="">
                            <img data-imgbigurl="/tmdt_201/public/master1/img/product/details/product-details-3.jpg"
                                src="/tmdt_201/public/master1/img/product/details/thumb-2.jpg" alt="">
                            <img data-imgbigurl="/tmdt_201/public/master1/img/product/details/product-details-5.jpg"
                                src="/tmdt_201/public/master1/img/product/details/thumb-3.jpg" alt="">
                            <img data-imgbigurl="/tmdt_201/public/master1/img/product/details/product-details-4.jpg"
                                src="/tmdt_201/public/master1/img/product/details/thumb-4.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $item_object->name_item; ?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div>
                        <div class="product__details__price">$50.00</div>
                        <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam
                            vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet
                            quam vehicula elementum sed sit amet dui. Proin eget tortor risus.</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" readonly>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="primary-btn">ADD TO CARD</a>
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Availability</b> 
                                <span>
                                    <?php echo $item_object->availability_item == 1?"In Stock":"Out of Stock"?>
                                </span>
                            </li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span>0.5 kg</span></li>
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-youtube"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Reviews <span>(1)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus. Vivamus
                                        suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam sit amet quam
                                        vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur arcu erat,
                                        accumsan id imperdiet et, porttitor at sem. Praesent sapien massa, convallis a
                                        pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula
                                        elementum sed sit amet dui. Vestibulum ante ipsum primis in faucibus orci luctus
                                        et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam
                                        vel, ullamcorper sit amet ligula. Proin eget tortor risus.</p>
                                        <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                                        Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Sed
                                        porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum
                                        sed sit amet dui. Proin eget tortor risus.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                                        Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                                        Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                                        sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                                        eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                                        Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                                        sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                                        diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                                        ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                                        Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                                        Proin eget tortor risus.</p>
                                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <div class="row mb-4">
                                        <div class="col-3 col-md-2 col-lg-1">
                                            <img src="/tmdt_201/public/master1/img/user/hoangduydangle.jpg">
                                        </div>
                                        <div class="col-9 col-md-10 col-lg-11">
                                            <div class="container pl-0 mb-2">
                                                <div class="row">
                                                    <div class="col-10">
                                                        @hoangduydangle | Hoangduy Dangle | at 23:20 on 2020/10/22
                                                    </div>
                                                    <div class="col-2" style="text-align: right;">
                                                        <button class="border-0 review-option" data-toggle="dropdown">
                                                            <i class="fa fa-ellipsis-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <button class="dropdown-item" type="button" data-toggle="modal" data-target="#modify-modal" id="modify-btn">Modify</button>
                                                            <div class="dropdown-divider"></div>
                                                            <button class="dropdown-item" type="button" data-toggle="modal" data-target="#delete-modal">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container pl-0 mb-2">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="star-rating-disabled mb-2">
                                                            <span class="fa fa-star" data-rating="1"></span>
                                                            <span class="fa fa-star" data-rating="2"></span>
                                                            <span class="fa fa-star" data-rating="3"></span>
                                                            <span class="fa fa-star" data-rating="4"></span>
                                                            <span class="fa fa-star-o" data-rating="5"></span>
                                                            <span class="level-rating-disabled" id="level-rating-1"> - Good!</span>
                                                            <input type="hidden" name="rating-value" id="rating-value-1" value="4">
                                                        </div>
                                                        <div class="container py-3 bg-light border border-secondary rounded" id="comment-1">Apples are good!</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-3 col-md-2 col-lg-1">
                                            <img src="/tmdt_201/public/master1/img/user/hoangduydangle.jpg">
                                        </div>
                                        <div class="col-9 col-md-10 col-lg-11">
                                            <div class="container pl-0 mb-2">
                                                @hoangduydangle | Hoangduy Dangle | at 23:20 on 2020/10/22
                                            </div>
                                            <div class="container pl-0 mb-2">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="star-rating-disabled mb-2">
                                                            <span class="fa fa-star" data-rating="1"></span>
                                                            <span class="fa fa-star" data-rating="2"></span>
                                                            <span class="fa fa-star" data-rating="3"></span>
                                                            <span class="fa fa-star" data-rating="4"></span>
                                                            <span class="fa fa-star-o" data-rating="5"></span>
                                                            <span class="level-rating-disabled"> - Good!</span>
                                                            <input type="hidden" name="rating-value" class="rating-value" value="4">
                                                        </div>
                                                        <div class="container py-3 bg-light border border-secondary rounded">
                                                            Apples are good!
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $user = json_decode($data['user']);
                                    if($user != null){                            
                                    ?>
                                    <hr>
                                    <div class="row">
                                        <div class="col-3 col-md-2 col-lg-1">
                                            <img src="<?php echo $user->avatar_user;?>">
                                        </div>
                                        <div class="col-9 col-md-10 col-lg-11">
                                            <div class="container pl-0 mb-2">
                                                @<?php echo $user->username_user;?> | <?php echo $user->fname_user; ?> <?php echo $user->lname_user;?>
                                            </div>
                                            <form method="POST">
                                                <div class="container pl-0 mb-2">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="star-rating">
                                                                <span class="fa fa-star-o" data-rating="1"></span>
                                                                <span class="fa fa-star-o" data-rating="2"></span>
                                                                <span class="fa fa-star-o" data-rating="3"></span>
                                                                <span class="fa fa-star-o" data-rating="4"></span>
                                                                <span class="fa fa-star-o" data-rating="5"></span>
                                                                <span class="level-rating"></span>
                                                                <input type="hidden" name="rating-value" class="rating-value" value="4">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="5" cols="10" placeholder="Leave your comment ..." id="create-comment" name="comment"></textarea>
                                                </div>
                                                <input type="submit" class="btn btn-primary mr-3" name="submit" value="Add review">
                                                <input type="reset" class="btn btn-warning reset-btn" name="reset" value="Reset">
                                            </form>
                                        </div>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="#">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="#">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="#">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="#">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Crab Pool Security</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    <!-- Delete Modal -->
    <div class="modal fade" id="delete-modal" data-backdrop="static">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-warning">
                        <i class="fa fa-exclamation-triangle"></i>
                        Warning!
                    </h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    Your review will be deleted. Are you sure?
                </div>                                                                  
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>                                                                 
            </div>
        </div>
    </div>

    <!-- Modify Modal -->
    <div class="modal fade" id="modify-modal" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-success">
                        <i class="fa fa-pencil"></i>
                        Modify
                    </h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-3 col-md-2 col-lg-1">
                            <img src="/tmdt_201/public/master1/img/user/hoangduydangle.jpg">
                        </div>
                        <div class="col-9 col-md-10 col-lg-11">
                            <div class="container pl-0 mb-2">
                                @hoangduydangle | Hoangduy Dangle
                            </div>
                            <form method="POST">
                                <div class="container pl-0 mb-2">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="star-rating-modify">
                                                <span class="fa fa-star-o" data-rating="1"></span>
                                                <span class="fa fa-star-o" data-rating="2"></span>
                                                <span class="fa fa-star-o" data-rating="3"></span>
                                                <span class="fa fa-star-o" data-rating="4"></span>
                                                <span class="fa fa-star-o" data-rating="5"></span>
                                                <span class="level-rating-modify"></span>
                                                <input type="hidden" name="rating-value" class="rating-value-modify" value="4">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" cols="10" placeholder="Leave your comment ..." id="modify-comment" name="comment"></textarea>
                                </div>
                                <input type="submit" class="btn btn-primary mr-3" name="submit" value="Update review">
                                <input type="reset" class="btn btn-warning reset-btn-modify" name="reset" value="Reset">
                            </form>
                        </div>
                    </div>
                </div>                                                                  
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>                                                                 
            </div>
        </div>
    </div>