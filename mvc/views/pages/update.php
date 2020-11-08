    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/images/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Update Product</h2>
                        <div class="breadcrumb__option">
                            <a href="http://localhost/tmdt_201/product">Product</a>
                            <span>Update Product</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <?php if(isset($_SESSION['error'])){
        if($_SESSION['error'] != false){?>
    <div class="container <?php echo $_SESSION['error'][0] == false?'text-success':'text-danger';?> text-center mt-3 error-info">
        <i class="fa fa-info-circle"></i> <?php echo $_SESSION['error'][1];?> <i class="fa fa-times category-btn" onclick="$('.error-info').attr('hidden', true)"></i>
    </div>
    <?php }
    $_SESSION['error'] = false;
    }
    $item_object = json_decode($data["item"]);?>
    <form class="container py-5" enctype="multipart/form-data" 
        method="POST" action="http://localhost/tmdt_201/product/update_product">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" 
                    placeholder="Product name" value="<?php echo $item_object->name_item; ?>" required>
                <input type="hidden" name="current-id" value="<?php echo $item_object->id_item; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" 
                id="description" rows="3" placeholder="Product description"><?php echo $item_object->description_item; ?></textarea>
            </div>
        </div>
        <?php $category = $item_object->name_category; ?>
        <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select name="category" id="category">
                    <?php $category_list = json_decode($data["category_list"]);
                    for($row = 0; $row < count($category_list); $row++){
                        $name_category = $category_list[$row]->name_category;
                    ?>
                    <option value="<?php echo $category_list[$row]->id_category; ?>" <?php echo $category == $name_category?'selected':''; ?>>
                        <?php echo $name_category; ?>
                    </option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
            <div class="col-sm-10">
                <input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg">
                <input type='hidden' name="current-avatar" value="<?php echo $item_object->avatar_item; ?>">
                <div class="d-sm-inline-block mt-2">
                    <u>Current avatar:</u>
                    <img src="/tmdt_201/<?php echo $item_object->avatar_item; ?>" style="width:100px; height:100px;">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="detail-1" class="col-sm-2 col-form-label">Detail-1</label>
            <div class="col-sm-10">
                <input type="file" name="detail-1" id="detail-1" accept=".png, .jpg, .jpeg">
                <div class="d-sm-inline-block mt-2">
                    <u>Current detail-1:</u>
                    <img src="/tmdt_201/<?php echo $item_object->detail_item_1; ?>" style="width:100px; height:100px;">
                    <input type='hidden' name="current-detail-1" value="<?php echo $item_object->detail_item_1; ?>">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="detail-2" class="col-sm-2 col-form-label">Detail-2</label>
            <div class="col-sm-10">
                <input type="file" name="detail-2" id="detail-2" accept=".png, .jpg, .jpeg">
                <div class="d-sm-inline-block mt-2">
                    <u>Current detail-2:</u>
                    <img src="/tmdt_201/<?php echo $item_object->detail_item_2; ?>" style="width:100px; height:100px;">
                    <input type='hidden' name="current-detail-2" value="<?php echo $item_object->detail_item_2; ?>">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="detail-3" class="col-sm-2 col-form-label">Detail-3</label>
            <div class="col-sm-10">
                <input type="file" name="detail-3" id="detail-3" accept=".png, .jpg, .jpeg">
                <div class="d-sm-inline-block mt-2">
                    <u>Current detail-3:</u>
                    <img src="/tmdt_201/<?php echo $item_object->detail_item_3; ?>" style="width:100px; height:100px;">
                    <input type='hidden' name="current-detail-3" value="<?php echo $item_object->detail_item_3; ?>">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price ($)</label>
            <div class="col-sm-10">
                <input type="number" name="price" id="price" min="0" max="100" 
                    step="0.01" value="<?php echo $item_object->price_item; ?>">
            </div>
        </div>
        <?php $availability = intval($item_object->availability_item); ?>
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Availability</legend>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="availability" id="availability-yes" value="yes"
                            <?php echo $availability == 1?'checked':''?>>
                        <label class="form-check-label" for="availability-yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="availability" id="availability-no" value="no"
                            <?php echo $availability == 0?'checked':''?>>
                        <label class="form-check-label" for="availability-no">No</label>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-group row">
            <label for="weight" class="col-sm-2 col-form-label">Weight (lb)</label>
            <div class="col-sm-10">
                <input type="number" name="weight" id="weight" min="0" max="50" 
                    step="0.01" value="<?php echo $item_object->weight_item; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="sale-off" class="col-sm-2 col-form-label">Sale off (%)</label>
            <div class="col-sm-10">
                <input type="number" name="sale-off" id="sale-off" min="0" max="100" 
                    step="0.1" value="<?php echo $item_object->sale_off_item; ?>">
            </div>
        </div>
        <?php $featured = intval($item_object->featured); ?>
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Featured</legend>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="featured" id="featured-yes" value="yes"
                            <?php echo $featured == 1?'checked':''?>>
                        <label class="form-check-label" for="featured-yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="featured" id="featured-no" value="no"
                            <?php echo $featured == 0?'checked':''?>>
                        <label class="form-check-label" for="featured-no">No</label>
                    </div>
                </div>
            </div>
        </fieldset>
        <?php $best_seller = intval($item_object->best_seller_item); ?>
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Best Seller</legend>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="best-seller" id="best-seller-yes" value="yes"
                            <?php echo $best_seller == 1?'checked':''?>>
                        <label class="form-check-label" for="best-seller-yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="best-seller" id="best-seller-no" value="no" 
                            <?php echo $best_seller == 0?'checked':''?>>
                        <label class="form-check-label" for="best-seller-no">No</label>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary mr-4" value="Update product">
                <input type="reset" class="btn btn-warning" value="Reset">
            </div>
        </div>
    </form>
