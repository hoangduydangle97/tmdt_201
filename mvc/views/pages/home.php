    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="section-title">
                <h2>Best Sellers</h2>
            </div>
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/tmdt_201/public/master1/img/categories/cat-1.jpg">
                            <h5><a href="#">Fresh Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/tmdt_201/public/master1/img/categories/cat-2.jpg">
                            <h5><a href="#">Dried Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/tmdt_201/public/master1/img/categories/cat-3.jpg">
                            <h5><a href="#">Vegetables</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/tmdt_201/public/master1/img/categories/cat-4.jpg">
                            <h5><a href="#">Fruit Juice</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="/tmdt_201/public/master1/img/categories/cat-5.jpg">
                            <h5><a href="#">Fresh Meat</a></h5>
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
                        <div class="featured__item__pic set-bg" data-setbg="/tmdt_201/public/master1/img/product/<?php echo $featured_item_list[$row]->avatar_item; ?>.jpg">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6>
                                <a href="http://localhost/tmdt_201/shop/detail/<?php echo $featured_item_list[$row]->id_item;?>" class="language-option">
                                    <?php echo $featured_item_list[$row]->name_item;?>
                                </a>
                            </h6>
                            <h5>$30.00</h5>
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
                        <img src="/tmdt_201/public/master1/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="/tmdt_201/public/master1/img/banner/banner-2.jpg" alt="">
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
                                        <img src="/tmdt_201/public/master1/img/product/<?php echo $latest_item_list[$row]->avatar_item; ?>.jpg" alt="" style="width: 110px; height: 110px;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $latest_item_list[$row]->name_item;?></h6>
                                        <span>$30.00</span>
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
                                        <img src="/tmdt_201/public/master1/img/product/<?php echo $top_rated_item_list[$row]->avatar_item; ?>.jpg" alt="" style="width: 110px; height: 110px;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $top_rated_item_list[$row]->name_item;?></h6>
                                        <span>$30.00</span>
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
                                        <img src="/tmdt_201/public/master1/img/product/<?php echo $top_review_item_list[$row]->avatar_item; ?>.jpg" alt="" style="width: 110px; height: 110px;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $top_review_item_list[$row]->name_item;?></h6>
                                        <span>$30.00</span>
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