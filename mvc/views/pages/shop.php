    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/images/breadcrumb.jpg">
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
                                                <span><?php echo number_format($latest_item_list[$row]->price_item, 0);?> <u style="font-weight: 400;">đ</u></span>
                                                <span style="font-weight: normal;"><?php echo date_format(date_create($latest_item_list[$row]->date_created_item), '\(d/m/Y\)');?></span>
                                            </div>
                                        </a>
                                    <?php if($row % 3 == 2 || ($row == $size_list - 1 && $row % 3 < 2)){ ?>
                                    </div>
                                    <?php }}?>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Top Rateds</h4>
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
                                                <span><?php echo number_format($top_rated_item_list[$row]->price_item, 0);?> <u style="font-weight: 400;">đ</u></span>
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
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Top Reviews</h4>
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
                                                <span><?php echo number_format($top_review_item_list[$row]->price_item, 0);?> <u style="font-weight: 400;">đ</u></span>
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
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Sale Off</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                <?php $sale_off_item_list = json_decode($data['sale_off_item_list']); 
                                $size_list = count($sale_off_item_list);
                                for($row = 0; $row < $size_list; $row++){
                                    $off = $sale_off_item_list[$row]->sale_off_item;
                                    $price = $sale_off_item_list[$row]->price_item;
                                    $price_off = number_format((1 - $off / 100) * $price, 0);
                                ?>
                                <div class="col-lg-4">
                                    <div class="product__discount__item">
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="/tmdt_201/<?php echo $sale_off_item_list[$row]->avatar_item; ?>">
                                            <div class="product__discount__percent">-<?php echo $off;?>%</div>
                                            <ul class="product__item__pic__hover">
                                                <?php $username = isset($_SESSION['username'])?$_SESSION['username']:'none'; 
                                                $selected = false;
                                                if(isset($_COOKIE)){
                                                    foreach($_COOKIE as $key => $val){
                                                        if($key == "selected-".$sale_off_item_list[$row]->id_item){
                                                            $selected = true;
                                                        }
                                                    }
                                                }
                                                ?>
                                                <li>
                                                    <a onclick="SetCart('<?php echo $sale_off_item_list[$row]->id_item;?>','<?php echo $username;?>')"> 
                                                        <i class="fa fa-shopping-cart"></i>
                                                        <i class="fa fa-check-circle selected <?php echo $sale_off_item_list[$row]->id_item;?>" <?php echo $selected == true?'':'hidden'?>></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span><?php echo $sale_off_item_list[$row]->name_category;?></span>
                                            <h5>
                                                <a href="http://localhost/tmdt_201/shop/detail/<?php echo $sale_off_item_list[$row]->id_item;?>" class="language-option">
                                                    <?php echo $sale_off_item_list[$row]->name_item;?>
                                                </a>
                                            </h5>
                                            <div class="product__item__price"><?php echo $price_off;?> <u style="font-weight: 400;">đ</u> <span><?php echo number_format($price, 0);?> <u style="font-weight: 400;">đ</u></span></div>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
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
                                    $size_list = count($item_list);
                                    ?>
                                    <h6><span><?php echo json_decode($data['num_items']); ?></span> products found</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php for($row = 0; $row < $size_list; $row++){ ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="/tmdt_201/<?php echo $item_list[$row]->avatar_item; ?>">
                                    <ul class="product__item__pic__hover">
                                        <?php $selected = false;
                                        if(isset($_COOKIE)){
                                            foreach($_COOKIE as $key => $val){
                                                if($key == "selected-".$item_list[$row]->id_item){
                                                    $selected = true;
                                                }
                                            }
                                        }
                                        ?>
                                        <li>
                                            <a onclick="SetCart('<?php echo $item_list[$row]->id_item;?>')"> 
                                                <i class="fa fa-shopping-cart"></i>
                                                <i class="fa fa-check-circle selected <?php echo $item_list[$row]->id_item;?>" <?php echo $selected == true?'':'hidden'?>></i>
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
                                    <h5><?php echo number_format($item_list[$row]->price_item, 0);?> <u style="font-weight: 400;">đ</u></h5>
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