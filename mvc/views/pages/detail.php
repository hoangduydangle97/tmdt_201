    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/images/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <?php $item_object = json_decode($data["item"]); ?>
                        <h2><?php echo $item_object->name_item; ?></h2>
                        <div class="breadcrumb__option">
                            <a href="http://localhost/tmdt_201/home">Home</a>
                            <a href="http://localhost/tmdt_201/shop/category/<?php echo $item_object->category_item; ?>"><?php echo $item_object->name_category; ?></a>
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
                                src="/tmdt_201/<?php echo $item_object->avatar_item; ?>" alt="<?php echo $item_object->id_item; ?>">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img data-imgbigurl="/tmdt_201/<?php echo $item_object->detail_item_1; ?>"
                                src="/tmdt_201/<?php echo $item_object->detail_item_1; ?>" alt="<?php echo $item_object->id_item; ?>">
                            <img data-imgbigurl="/tmdt_201/<?php echo $item_object->detail_item_2; ?>"
                                src="/tmdt_201/<?php echo $item_object->detail_item_2; ?>" alt="detail-1-<?php echo $item_object->id_item; ?>">
                            <img data-imgbigurl="/tmdt_201/<?php echo $item_object->detail_item_3; ?>"
                                src="/tmdt_201/<?php echo $item_object->detail_item_3; ?>" alt="detail-2-<?php echo $item_object->id_item; ?>">
                            <img data-imgbigurl="/tmdt_201/<?php echo $item_object->avatar_item; ?>"
                                src="/tmdt_201/<?php echo $item_object->avatar_item; ?>" alt="detail-3-<?php echo $item_object->id_item; ?>">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?php echo $item_object->name_item; ?></h3>
                        <?php $review_list = json_decode($data['review_list']);
                        $size_list = count($review_list);
                        $average_rating = json_decode($data['average_rating']);
                        ?>
                        <div class="product__details__rating">
                            <i class="fa <?php echo (($average_rating > 0 && $average_rating < 0.3) || $average_rating == 0)?'fa-star-o':(($average_rating >= 0.3 && $average_rating < 0.7)?'fa-star-half-o':'fa-star');?>"></i>
                            <i class="fa <?php echo (($average_rating > 1 && $average_rating < 1.3) || $average_rating <= 1)?'fa-star-o':(($average_rating >= 1.3 && $average_rating < 1.7)?'fa-star-half-o':'fa-star');?>"></i>
                            <i class="fa <?php echo (($average_rating > 2 && $average_rating < 2.3) || $average_rating <= 2)?'fa-star-o':(($average_rating >= 2.3 && $average_rating < 2.7)?'fa-star-half-o':'fa-star');?>"></i>
                            <i class="fa <?php echo (($average_rating > 3 && $average_rating < 3.3) || $average_rating <= 3)?'fa-star-o':(($average_rating >= 3.3 && $average_rating < 3.7)?'fa-star-half-o':'fa-star');?>"></i>
                            <i class="fa <?php echo (($average_rating > 4 && $average_rating < 4.3) || $average_rating <= 4)?'fa-star-o':(($average_rating >= 4.3 && $average_rating < 4.7)?'fa-star-half-o':'fa-star');?>"></i>
                            <span>(<?php echo $size_list; ?> reviews)</span>
                        </div>
                        <div class="product__details__price">$<?php echo number_format($item_object->price_item, 2);?></div>
                        <p>Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vestibulum ac diam sit amet quam
                            vehicula elementum sed sit amet dui. Sed porttitor lectus nibh. Vestibulum ac diam sit amet
                            quam vehicula elementum sed sit amet dui. Proin eget tortor risus.</p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty"> 
                                    <input type="hidden" class="hidden-input id_item" value="<?php echo $item_object->id_item; ?>">
                                    <input type="hidden" class="hidden-input username" value="<?php echo $username; ?>">
                                    <?php $input_value = 1;
                                    if(isset($_COOKIE)){
                                        foreach($_COOKIE as $key => $val){
                                            if($key == "selected-".$item_object->id_item){
                                                $input_value = $val;
                                            }
                                        }
                                    }
                                    ?>
                                    <input type="text" class="text-input" id="<?php echo $item_object->id_item; ?>" value="<?php echo $input_value; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn primary-btn text-light" id="add-to-card-btn" 
                                onclick="SetCart('<?php echo $item_object->id_item; ?>')"
                                data-toggle="modal" data-target="#info-modal">
                            ADD TO CARD
                        </button>
                        <ul>
                            <li><b>Availability</b> 
                                <span>
                                    <?php echo $item_object->availability_item == 1?"In Stock":"Out of Stock"?>
                                </span>
                            </li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            <li><b>Weight</b> <span><?php echo $item_object->weight_item; ?> lb</span></li>
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
                        <?php $check_review = isset($_SESSION['review']) && $_SESSION['review'] == true;?>
                        <ul class="nav nav-tabs" <?php if($check_review){echo 'id="scroll-pos-review"'; $_SESSION['review'] = false;}?> role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="false">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                    aria-selected="false">Information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="true">Reviews <span>(<?php echo $size_list; ?>)</span></a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" id="tabs-1" role="tabpanel">
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
                            <div class="tab-pane active" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <?php
                                    for($row = 0; $row < $size_list; $row++){
                                        $id_review = $review_list[$row]->username_user_rating." ".
                                        $review_list[$row]->id_item_rating." ".
                                        $review_list[$row]->date_rating;
                                        $id_review = str_replace(' ', '-', $id_review);
                                        $level_rating = "level-rating-".$id_review;
                                        $rating_value = "rating-value-".$id_review;
                                        $comment = "comment-".$id_review;
                                        $rating = $review_list[$row]->rating;
                                        $level_rating_content = '';
                                        $level_rating_color = '';
                                        switch($rating){
                                            case 1:
                                                $level_rating_content = " - Very Bad!";
                                                $level_rating_color = "red";
                                                break;
                                            case 2:
                                                $level_rating_content = " - Bad!";
                                                $level_rating_color = "orange";
                                                break;
                                            case 3:
                                                $level_rating_content = " - OK!";
                                                $level_rating_color = "darkmagenta";
                                                break;
                                            case 4:
                                                $level_rating_content = " - Good!";
                                                $level_rating_color = "blue";
                                                break;
                                            case 5:
                                                $level_rating_content = " - Very Good!";
                                                $level_rating_color = "limegreen";
                                                break;
                                    }
                                    $func_modify = "SetContentModify('".$review_list[$row]->username_user_rating."', '".
                                    $review_list[$row]->fname_user."', '".$review_list[$row]->lname_user."', '".
                                    $level_rating_content."', '".$level_rating_color."', '".$rating."', '".
                                    $review_list[$row]->avatar_user."', '".str_replace("'", "\\'",$review_list[$row]->review)."', '".
                                    $review_list[$row]->id_item_rating."', '".$review_list[$row]->date_rating."')";

                                    $func_delete = "SetContentDelete('".$review_list[$row]->username_user_rating."', '".
                                    $review_list[$row]->id_item_rating."', '".$review_list[$row]->date_rating."')";
                                    ?>
                                    <div class="row mb-4">
                                        <div class="col-3 col-md-2 col-lg-1">
                                            <img src="/tmdt_201/<?php echo $review_list[$row]->avatar_user;?>"
                                                alt="<?php echo $review_list[$row]->username_user_rating;?>">
                                        </div>
                                        <div class="col-9 col-md-10 col-lg-11">
                                            <div class="container pl-0 mb-2">
                                                <div class="row">
                                                    <div class="col-10">
                                                        <?php echo "<b>@".$review_list[$row]->username_user_rating."</b> | <i>".
                                                        $review_list[$row]->fname_user." ".$review_list[$row]->lname_user."</i> | ".
                                                        date_format(date_create($review_list[$row]->date_rating), '\a\t H:i:s \o\n d/m/Y');
                                                        ?>
                                                    </div>
                                                    <div class="col-2" style="text-align: right;">
                                                        <?php 
                                                        $disabled = '';
                                                        if(!isset($_SESSION['username']) || 
                                                            (isset($_SESSION['username']) 
                                                            && $_SESSION['username'] != $review_list[$row]->username_user_rating)){
                                                                $disabled = 'disabled';
                                                            }
                                                        ?>
                                                        <button class="border-0 review-option" data-toggle="dropdown" <?php echo $disabled;?>>
                                                            <i class="fa fa-ellipsis-h"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <button class="dropdown-item" type="button" data-toggle="modal" data-target="#modify-modal" 
                                                            id="modify-btn" onclick="<?php echo $func_modify;?>">
                                                                Modify
                                                            </button>
                                                            <div class="dropdown-divider"></div>
                                                            <button class="dropdown-item" type="button" data-toggle="modal" data-target="#delete-modal"
                                                            onclick="<?php echo $func_delete;?>">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="container pl-0 mb-2">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="star-rating-disabled mb-2">
                                                            <span class="fa <?php echo $rating > 0?'fa-star':'fa-star-o';?>" data-rating="1"></span>
                                                            <span class="fa <?php echo $rating > 1?'fa-star':'fa-star-o';?>" data-rating="2"></span>
                                                            <span class="fa <?php echo $rating > 2?'fa-star':'fa-star-o';?>" data-rating="3"></span>
                                                            <span class="fa <?php echo $rating > 3?'fa-star':'fa-star-o';?>" data-rating="4"></span>
                                                            <span class="fa <?php echo $rating > 4?'fa-star':'fa-star-o';?>" data-rating="5"></span>
                                                            <span class="level-rating-disabled" id="<?php echo $level_rating;?>" style="color: <?php echo $level_rating_color;?>;"> 
                                                                <?php echo $level_rating_content;?>
                                                            </span>
                                                            <input type="hidden" name="rating-value" id="<?php echo $rating_value;?>" value="<?php echo $rating;?>">
                                                        </div>
                                                        <div class="container py-3 bg-light border border-secondary rounded" id="<?php echo $comment;?>">
                                                        <?php echo $review_list[$row]->review == ''?'<i>No comment.</i>':$review_list[$row]->review;?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php }
                                    $user = json_decode($data['user']);
                                    if($user != null){                            
                                    ?>
                                    <hr>
                                    <div class="row">
                                        <div class="col-3 col-md-2 col-lg-1">
                                            <img src="/tmdt_201/<?php echo $user->avatar_user;?>"
                                                alt="<?php echo $user->username_user;?>">
                                        </div>
                                        <div class="col-9 col-md-10 col-lg-11">
                                            <div class="container pl-0 mb-2">
                                                <b>@<?php echo $user->username_user;?></b> | <?php echo $user->fname_user; ?> <?php echo $user->lname_user;?>
                                            </div>
                                            <form action="http://localhost/tmdt_201/shop/review/insert" method="POST">
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
                                                                <input type="hidden" name="rating" class="rating-value" value="4">
                                                                <input type="hidden" name="username" value="<?php echo $user->username_user;?>">
                                                                <input type="hidden" name="item" value="<?php echo $item_object->id_item;?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="5" cols="10" placeholder="Leave your comment ..." maxlength="200" id="create-comment" name="comment"></textarea>
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
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $related_item_list = json_decode($data['related_item_list']);
                $size_list = count($related_item_list);
                if($size_list == 0){
                ?>
                <h4 class="font-italic mx-auto">There is no any related products.</h4>
                <?php }
                else{
                    for($row = 0; $row < $size_list; $row++){
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="/tmdt_201/<?php echo $related_item_list[$row]->avatar_item; ?>">
                            <ul class="product__item__pic__hover">
                                <?php  
                                $selected = false;
                                if(isset($_COOKIE)){
                                    foreach($_COOKIE as $key => $val){
                                        if($key == "selected-".$related_item_list[$row]->id_item){
                                            $selected = true;
                                        }
                                    }
                                }
                                ?>
                                <li>
                                    <a onclick="SetCart('<?php echo $related_item_list[$row]->id_item;?>')"> 
                                        <i class="fa fa-shopping-cart"></i>
                                        <i class="fa fa-check-circle selected <?php echo $related_item_list[$row]->id_item;?>" <?php echo $selected == true?'':'hidden'?>></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6>
                                <a href="http://localhost/tmdt_201/shop/detail/<?php echo $related_item_list[$row]->id_item;?>" class="language-option">
                                    <?php echo $related_item_list[$row]->name_item;?>
                                </a>
                            </h6>
                            <h5>$<?php echo $related_item_list[$row]->price_item;?></h5>
                            <div>
                                <?php $average_rating = $related_item_list[$row]->average_rating;?>
                                <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 0 && $average_rating < 0.3) || $average_rating == 0)?'fa-star-o':(($average_rating >= 0.3 && $average_rating < 0.7)?'fa-star-half-o':'fa-star');?>"></i>
                                <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 1 && $average_rating < 1.3) || $average_rating <= 1)?'fa-star-o':(($average_rating >= 1.3 && $average_rating < 1.7)?'fa-star-half-o':'fa-star');?>"></i>
                                <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 2 && $average_rating < 2.3) || $average_rating <= 2)?'fa-star-o':(($average_rating >= 2.3 && $average_rating < 2.7)?'fa-star-half-o':'fa-star');?>"></i>
                                <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 3 && $average_rating < 3.3) || $average_rating <= 3)?'fa-star-o':(($average_rating >= 3.3 && $average_rating < 3.7)?'fa-star-half-o':'fa-star');?>"></i>
                                <i style="color: #EDBB0E;" class="fa <?php echo (($average_rating > 4 && $average_rating < 4.3) || $average_rating <= 4)?'fa-star-o':(($average_rating >= 4.3 && $average_rating < 4.7)?'fa-star-half-o':'fa-star');?>"></i>
                                <span>(<?php echo $related_item_list[$row]->num_review;?> reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }}?>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->

    <!-- Info Modal -->
    <div class="modal fade" id="info-modal" data-backdrop="static">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-info">
                        <i class="fa fa-info-circle"></i>
                        Info!
                    </h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    You just add '<?php echo $item_object->name_item; ?>' into your cart
                </div>                                                                  
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="location.href=&quot;http://localhost/tmdt_201/cart&quot;">
                        <i class="fa fa-arrow-right"></i> To your cart
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-close"></i> Cancel
                    </button>
                </div>                                                                  
            </div>
        </div>
    </div>

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
                <form class="modal-footer" action="http://localhost/tmdt_201/shop/review/delete" method="POST">
                    <input type="hidden" name="username" id="username-value-delete">
                    <input type="hidden" name="item" id="item-value-delete">
                    <input type="hidden" name="date" id="date-value-delete">
                    <button type="submit" class="btn btn-primary">OK</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-close"></i> Cancel
                    </button>
                </form>                                                                 
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
                            <img src="#" id="avatar">
                        </div>
                        <div class="col-9 col-md-10 col-lg-11">
                            <div class="container pl-0 mb-2">
                                @<span id="username"></span> | <span id="fname"></span> <span id="lname"></span>
                            </div>
                            <form action="http://localhost/tmdt_201/shop/review/update" method="POST">
                                <div class="container pl-0 mb-2">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="star-rating-modify">
                                                <span class="fa fa-star-o" data-rating="1" id="r-1"></span>
                                                <span class="fa fa-star-o" data-rating="2" id="r-2"></span>
                                                <span class="fa fa-star-o" data-rating="3" id="r-3"></span>
                                                <span class="fa fa-star-o" data-rating="4" id="r-4"></span>
                                                <span class="fa fa-star-o" data-rating="5" id="r-5"></span>
                                                <span class="level-rating-modify"></span>
                                                <input type="hidden" name="rating" class="rating-value-modify" value="4">
                                                <input type="hidden" name="username" class="username-value-modify">
                                                <input type="hidden" name="item" class="item-value-modify">
                                                <input type="hidden" name="date" class="date-value-modify">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" cols="10" placeholder="Leave your comment ..." maxlength="200" id="modify-comment" name="comment"></textarea>
                                </div>
                                <input type="submit" class="btn btn-primary mr-3" name="submit" value="Update review">
                                <input type="reset" class="btn btn-warning reset-btn-modify" name="reset" value="Reset">
                            </form>
                        </div>
                    </div>
                </div>                                                                  
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-close"></i> Cancel
                    </button>
                </div>                                                                 
            </div>
        </div>
    </div>