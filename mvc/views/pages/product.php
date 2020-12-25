    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/images/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Product</h2>
                        <div class="breadcrumb__option">
                            <a href="http://localhost/tmdt_201/admin">Admin</a>
                            <span>Product</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <div class="card shadow my-4">
        <div class="card-header py-3 text-center">
            <h4 class="m-0 font-weight-bold text-primary">List of products</h4>
        </div>
        <div class="card-body">
            <div class="text-right">
                <button type="button" class="btn btn-primary mb-3 mr-3" onclick="directToCreate('create')">
                    <i class="fa fa-plus-square"></i> Create a new product
                </button>
                <button type="button" class="btn btn-primary mb-3" onclick="directToCreate('categories')">
                    <i class="fa fa-tasks"></i> Manage categories
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
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Action</th>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>Detail-1</th>
                            <th>Detail-2</th>
                            <th>Detail-3</th>
                            <th>Description</th>
                            <th>Price ($)</th>
                            <th>Availability</th>
                            <th>Weight (lb)</th>
                            <th>Sale off (%)</th>
                            <th>Featured</th>
                            <th>Number purchased</th>
                            <th>Date created</th>
                            <th>Lastest updated</th>
                            <th>Category</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $item_list = json_decode($data['item_list']); 
                        $size_list = count($item_list);
                        for($row = 0; $row < $size_list; $row++){
                        ?>
                        <tr>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="/tmdt_201/list-product/update/<?php echo $item_list[$row]->id_item;?>">
                                            <i class="fa fa-edit"></i> Modify
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/tmdt_201/list-product/delete/<?php echo $item_list[$row]->id_item;?>">
                                            <i class="fa fa-trash"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="align-middle"><?php echo $item_list[$row]->id_item;?></td>
                            <td class="align-middle"><?php echo $item_list[$row]->name_item;?></td>
                            <td class="align-middle">
                                <a class="popover-hover" data-toggle="popover-hover" data-img="/tmdt_201/<?php echo $item_list[$row]->avatar_item;?>">
                                    <?php echo $item_list[$row]->avatar_item;?>
                                </a>
                            </td>
                            <td class="align-middle">
                                <a class="popover-hover" data-toggle="popover-hover" data-img="/tmdt_201/<?php echo $item_list[$row]->detail_item_1;?>">
                                    <?php echo $item_list[$row]->detail_item_1;?>
                                </a>
                            </td>
                            <td class="align-middle">
                                <a class="popover-hover" data-toggle="popover-hover" data-img="/tmdt_201/<?php echo $item_list[$row]->detail_item_2;?>">
                                    <?php echo $item_list[$row]->detail_item_2;?>
                                </a>
                            </td>
                            <td class="align-middle">
                                <a class="popover-hover" data-toggle="popover-hover" data-img="/tmdt_201/<?php echo $item_list[$row]->detail_item_3;?>">
                                    <?php echo $item_list[$row]->detail_item_3;?>
                                </a>
                            </td>
                            <td class="align-middle"><?php echo $item_list[$row]->description_item;?></td>
                            <td class="align-middle"><?php echo $item_list[$row]->price_item;?></td>
                            <td class="align-middle"><?php echo $item_list[$row]->availability_item;?></td>
                            <td class="align-middle"><?php echo $item_list[$row]->weight_item;?></td>
                            <td class="align-middle"><?php echo $item_list[$row]->sale_off_item;?></td>
                            <td class="align-middle"><?php echo $item_list[$row]->featured;?></td>
                            <td class="align-middle"><?php echo $item_list[$row]->num_purchased;?></td>
                            <td class="align-middle"><?php echo date_format(date_create($item_list[$row]->date_created_item), 'H:i:s \- d/m/Y');?></td>
                            <td class="align-middle"><?php echo date_format(date_create($item_list[$row]->latest_date_updated_item), 'H:i:s \- d/m/Y');?></td>
                            <td class="align-middle"><?php echo $item_list[$row]->name_category;?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>