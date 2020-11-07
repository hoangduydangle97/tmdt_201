    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/images/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Update</h2>
                        <div class="breadcrumb__option">
                            <a href="http://localhost/tmdt_201/product">Product</a>
                            <span>Update</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <?php $item_object = json_decode($data["item"]);?>
    <form class="container py-5">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" 
                    placeholder="Product name" value="<?php echo $item_object->name_item; ?>">
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
                <select name="category" id="category" onchange="changeOption(this.value)">
                    <?php $category_list = json_decode($data["category_list"]);
                    for($row = 0; $row < count($category_list); $row++){
                        $name_category = $category_list[$row]->name_category;
                    ?>
                    <option value="<?php echo $category_list[$row]->id_category; ?>" <?php echo $category == $name_category?'selected':''; ?>>
                        <?php echo $name_category; ?>
                    </option>
                    <?php }?>
                    <option value="new">New ...</option>
                </select>
            </div>
        </div>
        <div class="form-group row new-category" hidden>
            <label for="new-category" class="col-sm-2 col-form-label">-> New Category</label>
            <div class="col-sm-10">
                <input type="text" name="new-category" class="form-control" id="new-category" placeholder="New category">
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
