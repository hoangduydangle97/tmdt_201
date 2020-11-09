    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/images/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Manage Order</h2>
                        <div class="breadcrumb__option">
                            <a href="http://localhost/tmdt_201/home">Home</a>
                            <span>Manage Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <div class="card shadow my-4">
        <div class="card-header py-3 text-center">
            <h4 class="m-0 font-weight-bold text-primary">List of your orders</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Status</th>
                            <th>Id</th>
                            <th>Total ($)</th>
                            <th>Date Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $order_list = json_decode($data['order_list']); 
                        $size_list = count($order_list);
                        for($row = 0; $row < $size_list; $row++){
                        ?>
                        <tr>
                            <td class="align-middle"><?php echo $order_list[$row]->status_order;?></td>
                            <td class="align-middle">
                                <a class="item-cart" href="/tmdt_201/manageorder/detail/<?php echo $order_list[$row]->id_order;?>">
                                    <?php echo $order_list[$row]->id_order;?>
                                </a>
                            </td>
                            <td class="align-middle"><?php echo $order_list[$row]->total_order;?></td>
                            <td class="align-middle"><?php echo date_format(date_create($order_list[$row]->date_order), 'H:i:s \- d/m/Y');?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>