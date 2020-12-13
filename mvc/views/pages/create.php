    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/images/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Create Product</h2>
                        <div class="breadcrumb__option">
                            <a href="http://localhost/tmdt_201/product">Product</a>
                            <span>Create Product</span>
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
    }?>
    <form class="container py-5" enctype="multipart/form-data" 
        method="POST" action="http://localhost/tmdt_201/product/insert_product">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name<span class="text-danger">*</span></label>
            <div class="col-sm-10">
                <input type="text" name="name" class="form-control" id="name" placeholder="Product name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" id="description" rows="3" placeholder="Product description"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select name="category" id="category">
                    <?php $category_list = json_decode($data["category_list"]);
                    for($row = 0; $row < count($category_list); $row++){
                    ?>
                    <option value="<?php echo $category_list[$row]->id_category; ?>"><?php echo $category_list[$row]->name_category; ?></option>
                    <?php }?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="avatar" class="col-sm-2 col-form-label">Avatar</label>
            <div class="col-sm-10">
                <input type="file" name="avatar" id="avatar" accept=".png, .jpg, .jpeg" 
                    onchange="showPreview(this, 'avatar-preview-container', 'avatar-preview')">
                <span class="d-none" id="avatar-preview-container">
                    <i>Selected Avatar:</i>
                    <img scr="#" id="avatar-preview" style="width:100px; height:100px;">
                </span>
            </div>
        </div>
        <div class="form-group row">
            <label for="detail-1" class="col-sm-2 col-form-label">Detail-1</label>
            <div class="col-sm-10">
                <input type="file" name="detail-1" id="detail-1" accept=".png, .jpg, .jpeg" 
                    onchange="showPreview(this, 'detail-1-preview-container', 'detail-1-preview')">
                <span class="d-none" id="detail-1-preview-container">
                    <i>Selected Detail-1:</i> 
                    <img scr="#" id="detail-1-preview" style="width:100px; height:100px;">
                </span>
            </div>
        </div>
        <div class="form-group row">
            <label for="detail-2" class="col-sm-2 col-form-label">Detail-2</label>
            <div class="col-sm-10">
                <input type="file" name="detail-2" id="detail-2" accept=".png, .jpg, .jpeg" 
                    onchange="showPreview(this, 'detail-2-preview-container', 'detail-2-preview')">
                <span class="d-none" id="detail-2-preview-container">
                    <i>Selected Detail-2:</i> 
                    <img scr="#" id="detail-2-preview" style="width:100px; height:100px;">
                </span>
            </div>
        </div>
        <div class="form-group row">
            <label for="detail-3" class="col-sm-2 col-form-label">Detail-3</label>
            <div class="col-sm-10">
                <input type="file" name="detail-3" id="detail-3" accept=".png, .jpg, .jpeg" 
                    onchange="showPreview(this, 'detail-3-preview-container', 'detail-3-preview')">
                <span class="d-none" id="detail-3-preview-container">
                    <i>Selected Detail-3:</i>
                    <img scr="#" id="detail-3-preview" style="width:100px; height:100px;">
                </span>
            </div>
        </div>
        <div class="form-group row">
            <label for="price" class="col-sm-2 col-form-label">Price (đ)</label>
            <div class="col-sm-10">
                <input type="number" name="price" id="price" min="0" max="100" step="0.01" value="10.00">
            </div>
        </div>
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Availability</legend>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="availability" id="availability-yes" value="1" checked>
                        <label class="form-check-label" for="availability-yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="availability" id="availability-no" value="0">
                        <label class="form-check-label" for="availability-no">No</label>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-group row">
            <label for="weight" class="col-sm-2 col-form-label">Weight (kg)</label>
            <div class="col-sm-10">
                <input type="number" name="weight" id="weight" min="0" max="50" step="0.01" value="1.00">
            </div>
        </div>
        <div class="form-group row">
            <label for="sale-off" class="col-sm-2 col-form-label">Sale off (%)</label>
            <div class="col-sm-10">
                <input type="number" name="sale-off" id="sale-off" min="0" max="100" step="0.1" value="50.0">
            </div>
        </div>
        <fieldset class="form-group">
            <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Featured</legend>
                <div class="col-sm-10">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="featured" id="featured-yes" value="1">
                        <label class="form-check-label" for="featured-yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="featured" id="featured-no" value="0" checked>
                        <label class="form-check-label" for="featured-no">No</label>
                    </div>
                </div>
            </div>
        </fieldset>
        <div class="form-group row">
            <div class="col-sm-10">
                <input type="submit" class="btn btn-primary mr-4" value="Create product">
                <input type="reset" class="btn btn-warning" value="Reset">
            </div>
        </div>
    </form>
