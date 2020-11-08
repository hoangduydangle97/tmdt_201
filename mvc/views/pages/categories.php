    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/images/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Categories</h2>
                        <div class="breadcrumb__option">
                            <a href="http://localhost/tmdt_201/product">Product</a>
                            <span>Categories</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <div class="card shadow my-4">
        <div class="card-header py-3 text-center">
            <h4 class="m-0 font-weight-bold text-primary">List of categories</h4>
        </div>
        <div class="card-body">
            <div class="text-right">
                <button type="button" class="btn btn-primary mb-3" onclick="changeClick('create-category')">
                    <i class="fa fa-plus-square"></i> Create a new category
                </button>
            </div>
            <?php if(isset($_SESSION['error'])){
                if($_SESSION['error'] != false){?>
            <div class="container <?php echo $_SESSION['error'][0] == false?'text-success':'text-danger';?> text-center mb-3 error-info">
            <i class="fa fa-info-circle"></i> <?php echo $_SESSION['error'][1];?> <i class="fa fa-times category-btn" onclick="$('.error-info').attr('hidden', true)"></i>
            </div>
            <?php }
            $_SESSION['error'] = false;
            }?>
            <form class="container py-5 form-category" method="POST" hidden>
                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name<span class="text-danger">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Category name" required disabled>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-primary mr-4" id="submit">
                        <input type="reset" class="btn btn-warning mr-4" value="Reset">
                        <button type="button" class="btn btn-danger" onclick="changeClick('cancel-create-category')">
                            <i class="fa fa-times"></i> Cancel
                        </button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Action</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Date created</th>
                            <th>Lastest updated</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $category_list = json_decode($data["category_list"]);
                        for($row = 0; $row < count($category_list); $row++){
                        ?>
                        <tr>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item category-btn" 
                                            onclick="changeClick('update-category', '<?php echo $category_list[$row]->id_category;?>', '<?php echo $category_list[$row]->name_category;?>')">
                                            <i class="fa fa-edit"></i> Modify
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/tmdt_201/product/categories/delete/<?php echo $category_list[$row]->id_category;?>">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"><?php echo $category_list[$row]->id_category;?></td>
                            <td class="align-middle"><?php echo $category_list[$row]->name_category;?></td>
                            <td class="align-middle"><?php echo date_format(date_create($category_list[$row]->date_created_category), 'H:i:s \- d/m/Y');?></td>
                            <td class="align-middle"><?php echo date_format(date_create($category_list[$row]->latest_date_updated_category), 'H:i:s \- d/m/Y');?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>