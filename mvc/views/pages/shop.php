    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="http://localhost/tmdt_201/home">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <?php $latest_item_list = json_decode($data["latest_item_list"]);
                                    $size_latest_item_list = count($latest_item_list);
                                    for($row = 0; $row < $size_latest_item_list; $row++){
                                    if($row % 3 == 0){
                                    ?>
                                    <div class="latest-prdouct__slider__item">
                                    <?php }?>
                                        <a href="http://localhost/tmdt_201/shop/detail/<?php echo $latest_item_list[$row]->id_item;?>" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="/tmdt_201/public/master1/img/product/<?php echo $latest_item_list[$row]->avatar_item; ?>.jpg" alt="" style="width: 110px;">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6><?php echo $latest_item_list[$row]->name_item;?></h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <?php if($row % 3 == 2){ ?>
                                    </div>
                                    <?php }}?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="/tmdt_201/public/master1/img/product/discount/pd-1.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Raisin’n’nuts</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="/tmdt_201/public/master1/img/product/discount/pd-2.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Vegetables</span>
                                            <h5><a href="#">Vegetables’package</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="/tmdt_201/public/master1/img/product/discount/pd-3.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Mixed Fruitss</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="/tmdt_201/public/master1/img/product/discount/pd-4.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Raisin’n’nuts</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="/tmdt_201/public/master1/img/product/discount/pd-5.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Raisin’n’nuts</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="/tmdt_201/public/master1/img/product/discount/pd-6.jpg">
                                            <div class="product__discount__percent">-20%</div>
                                            <ul class="product__item__pic__hover">
                                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span>Dried Fruit</span>
                                            <h5><a href="#">Raisin’n’nuts</a></h5>
                                            <div class="product__item__price">$30.00 <span>$36.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="section-title product__discount__title">
                            <h2 id="scroll-pos">
                            <?php
                            if(!isset($data['name_category'])){
                                echo 'All of products';
                            }
                            else{
                                echo json_decode($data['name_category'])->name_category;
                            }
                            ?>
                            </h2>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="filter__found">
                                    <?php $item_list = json_decode($data['item_list']); 
                                    $size_item_list = count($item_list);
                                    ?>
                                    <h6><span><?php echo json_decode($data['num_items']); ?></span> products found</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php for($row = 0; $row < $size_item_list; $row++){ ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="/tmdt_201/public/master1/img/product/<?php echo $item_list[$row]->avatar_item; ?>.jpg">
                                    <ul class="product__item__pic__hover">
                                        <?php $username = isset($_SESSION['username'])?$_SESSION['username']:'none'; 
                                        $selected = false;
                                        if(isset($_COOKIE)){
                                            foreach($_COOKIE as $key => $val){
                                                if($key == "selected-".$item_list[$row]->id_item){
                                                    $selected = true;
                                                }
                                            }
                                        }
                                        ?>
                                        <li>
                                            <a onclick="SetCart('<?php echo $item_list[$row]->id_item;?>','<?php echo $username;?>', this)"> 
                                                <i class="fa fa-shopping-cart"></i>
                                                <i class="fa fa-check-circle selected" <?php echo $selected == true?'':'hidden'?>></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>
                                        <a href="http://localhost/tmdt_201/shop/detail/<?php echo $item_list[$row]->id_item;?>" class="language-option">
                                            <?php echo $item_list[$row]->name_item;?>
                                        </a>
                                    </h6>
                                    <h5>$<?php echo $item_list[$row]->price_item;?></h5>
                                    <div>
                                        <?php $average_rating = $item_list[$row]->average_rating;?>
                                        <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 0 && $average_rating < 0.3) || $average_rating == 0)?'fa-star-o':(($average_rating >= 0.3 && $average_rating < 0.7)?'fa-star-half-o':'fa-star');?>"></i>
                                        <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 1 && $average_rating < 1.3) || $average_rating <= 1)?'fa-star-o':(($average_rating >= 1.3 && $average_rating < 1.7)?'fa-star-half-o':'fa-star');?>"></i>
                                        <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 2 && $average_rating < 2.3) || $average_rating <= 2)?'fa-star-o':(($average_rating >= 2.3 && $average_rating < 2.7)?'fa-star-half-o':'fa-star');?>"></i>
                                        <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 3 && $average_rating < 3.3) || $average_rating <= 3)?'fa-star-o':(($average_rating >= 3.3 && $average_rating < 3.7)?'fa-star-half-o':'fa-star');?>"></i>
                                        <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 4 && $average_rating < 4.3) || $average_rating <= 4)?'fa-star-o':(($average_rating >= 4.3 && $average_rating < 4.7)?'fa-star-half-o':'fa-star');?>"></i>
                                        <span>(<?php echo $item_list[$row]->num_review;?> reviews)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <div class="product__pagination">
                    <?php
                    $num_pages = json_decode($data['num_pages']);
                    $page_no = json_decode($data['page_no']);
                    $category = $data['category'];
                    for($i = 1; $i <= $num_pages; $i++){
                    ?>
                        <a href="http://localhost/tmdt_201/shop/<?php echo $category == 'all'?'page':'category/'.$category; ?>/<?php echo $i; ?>" <?php echo $page_no == $i?'class="active"':''; ?>><?php echo $i; ?></a>
                    <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->