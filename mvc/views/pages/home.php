    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="section-title">
                <h2>Best Sellers</h2>
            </div>
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/tmdt_201/public/master1/images/categories/cat-1.jpg">
                            <h5>
                                <a href="#">Fresh Fruit</a>
                                (2 purchased)
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/tmdt_201/public/master1/images/categories/cat-2.jpg">
                            <h5>
                                <a href="#">Dried Fruit</a>
                                (2 purchased)
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/tmdt_201/public/master1/images/categories/cat-3.jpg">
                            <h5>
                                <a href="#">Vegetables</a>
                                (2 purchased)
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/tmdt_201/public/master1/images/categories/cat-4.jpg">
                            <h5>
                                <a href="#">Fruit Juice</a>
                                (2 purchased)
                            </h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/tmdt_201/public/master1/images/categories/cat-5.jpg">
                            <h5>
                                <a href="#">Fresh Meat</a>
                                (2 purchased)
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Products</h2>
                    </div>
                    <?php $featured_category_list = json_decode($data['featured_category_list']);
                    $size_list = count($featured_category_list);
                    ?>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <?php for($row = 0; $row < $size_list; $row++){?>
                            <li data-filter=".<?php echo $featured_category_list[$row]->category_item;?>">
                                <?php echo $featured_category_list[$row]->name_category;?>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php $featured_item_list = json_decode($data['featured_item_list']);
                $size_list = count($featured_item_list);
                for($row = 0; $row < $size_list; $row++){
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo $featured_item_list[$row]->category_item;?>">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="/tmdt_201/<?php echo $featured_item_list[$row]->avatar_item; ?>">
                            <ul class="featured__item__pic__hover">
                                <?php $username = isset($_SESSION['username'])?$_SESSION['username']:'none'; 
                                $selected = false;
                                if(isset($_COOKIE)){
                                    foreach($_COOKIE as $key => $val){
                                        if($key == "selected-".$featured_item_list[$row]->id_item){
                                            $selected = true;
                                        }
                                    }
                                }
                                ?>
                                <li>
                                    <a onclick="SetCart('<?php echo $featured_item_list[$row]->id_item;?>','<?php echo $username;?>')"> 
                                        <i class="fa fa-shopping-cart"></i>
                                        <i class="fa fa-check-circle selected <?php echo $featured_item_list[$row]->id_item;?>" <?php echo $selected == true?'':'hidden'?>></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6>
                                <a href="http://localhost/tmdt_201/shop/detail/<?php echo $featured_item_list[$row]->id_item;?>" class="language-option">
                                    <?php echo $featured_item_list[$row]->name_item;?>
                                </a>
                            </h6>
                            <h5><?php echo number_format($featured_item_list[$row]->price_item, 0);?> <u style="font-weight: 400;">đ</u></h5>
                            <div>
                                <?php $average_rating = $featured_item_list[$row]->average_rating;?>
                                <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 0 && $average_rating < 0.3) || $average_rating == 0)?'fa-star-o':(($average_rating >= 0.3 && $average_rating < 0.7)?'fa-star-half-o':'fa-star');?>"></i>
                                <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 1 && $average_rating < 1.3) || $average_rating <= 1)?'fa-star-o':(($average_rating >= 1.3 && $average_rating < 1.7)?'fa-star-half-o':'fa-star');?>"></i>
                                <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 2 && $average_rating < 2.3) || $average_rating <= 2)?'fa-star-o':(($average_rating >= 2.3 && $average_rating < 2.7)?'fa-star-half-o':'fa-star');?>"></i>
                                <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 3 && $average_rating < 3.3) || $average_rating <= 3)?'fa-star-o':(($average_rating >= 3.3 && $average_rating < 3.7)?'fa-star-half-o':'fa-star');?>"></i>
                                <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 4 && $average_rating < 4.3) || $average_rating <= 4)?'fa-star-o':(($average_rating >= 4.3 && $average_rating < 4.7)?'fa-star-half-o':'fa-star');?>"></i>
                                <span>(<?php echo $featured_item_list[$row]->num_review;?> reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="/tmdt_201/public/master1/images/banner/banner-1.jpg" alt="banner-1">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="/tmdt_201/public/master1/images/banner/banner-2.jpg" alt="banner-2">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <?php $latest_item_list = json_decode($data["latest_item_list"]);
                            $size_list = count($latest_item_list);
                            for($row = 0; $row < $size_list; $row++){
                                if($row % 3 == 0){
                            ?>
                            <div class="latest-prdouct__slider__item">
                            <?php }?>
                                <a href="http://localhost/tmdt_201/shop/detail/<?php echo $latest_item_list[$row]->id_item;?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/tmdt_201/<?php echo $latest_item_list[$row]->avatar_item; ?>" 
                                            alt="<?php echo $latest_item_list[$row]->id_item;?>" style="width: 110px; height: 110px;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $latest_item_list[$row]->name_item;?></h6>
                                        <span><?php echo number_format($latest_item_list[$row]->price_item, 0);?>đ</span>
                                        <span style="font-weight: normal;"><?php echo date_format(date_create($latest_item_list[$row]->date_created_item), '\(d/m/Y\)');?></span>
                                    </div>
                                </a>
                            <?php if($row % 3 == 2 || ($row == $size_list - 1 && $row % 3 < 2)){ ?>
                            </div>
                            <?php }}?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <?php $top_rated_item_list = json_decode($data["top_rated_item_list"]);
                            $size_list = count($top_rated_item_list);
                            for($row = 0; $row < $size_list; $row++){
                                if($row % 3 == 0){
                            ?>
                            <div class="latest-prdouct__slider__item">
                            <?php }?>
                                <a href="http://localhost/tmdt_201/shop/detail/<?php echo $top_rated_item_list[$row]->id_item;?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/tmdt_201/<?php echo $top_rated_item_list[$row]->avatar_item; ?>" 
                                            alt="<?php echo $top_rated_item_list[$row]->id_item;?>" style="width: 110px; height: 110px;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $top_rated_item_list[$row]->name_item;?></h6>
                                        <span><?php echo number_format($top_rated_item_list[$row]->price_item, 0);?>đ</span>
                                        <?php $average_rating = $top_rated_item_list[$row]->average_rating;?>
                                        <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 0 && $average_rating < 0.3) || $average_rating == 0)?'fa-star-o':(($average_rating >= 0.3 && $average_rating < 0.7)?'fa-star-half-o':'fa-star');?>"></i>
                                        <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 1 && $average_rating < 1.3) || $average_rating <= 1)?'fa-star-o':(($average_rating >= 1.3 && $average_rating < 1.7)?'fa-star-half-o':'fa-star');?>"></i>
                                        <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 2 && $average_rating < 2.3) || $average_rating <= 2)?'fa-star-o':(($average_rating >= 2.3 && $average_rating < 2.7)?'fa-star-half-o':'fa-star');?>"></i>
                                        <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 3 && $average_rating < 3.3) || $average_rating <= 3)?'fa-star-o':(($average_rating >= 3.3 && $average_rating < 3.7)?'fa-star-half-o':'fa-star');?>"></i>
                                        <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 4 && $average_rating < 4.3) || $average_rating <= 4)?'fa-star-o':(($average_rating >= 4.3 && $average_rating < 4.7)?'fa-star-half-o':'fa-star');?>"></i>
                                    </div>
                                </a>
                            <?php if($row % 3 == 2 || ($row == $size_list - 1 && $row % 3 < 2)){ ?>
                            </div>
                            <?php }}?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <?php $top_review_item_list = json_decode($data["top_review_item_list"]);
                            $size_list = count($top_review_item_list);
                            for($row = 0; $row < $size_list; $row++){
                                if($row % 3 == 0){
                            ?>
                            <div class="latest-prdouct__slider__item">
                            <?php }?>
                                <a href="http://localhost/tmdt_201/shop/detail/<?php echo $top_review_item_list[$row]->id_item;?>" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="/tmdt_201/<?php echo $top_review_item_list[$row]->avatar_item; ?>" 
                                            alt="<?php echo $top_review_item_list[$row]->id_item;?>" style="width: 110px; height: 110px;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $top_review_item_list[$row]->name_item;?></h6>
                                        <span><?php echo number_format($top_review_item_list[$row]->price_item, 0);?>đ</span>
                                        <span style="font-weight: normal;">(<?php echo $top_review_item_list[$row]->num_review;?> reviews)</span>
                                    </div>
                                </a>
                            <?php if($row % 3 == 2 || ($row == $size_list - 1 && $row % 3 < 2)){ ?>
                            </div>
                            <?php }}?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->