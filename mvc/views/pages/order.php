    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/images/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Order</h2>
                        <div class="breadcrumb__option">
                            <a href="http://localhost/tmdt_201/admin">Admin</a>
                            <span>Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <div class="card shadow my-4">
        <div class="card-header py-3 text-center">
            <h4 class="m-0 font-weight-bold text-primary">List of orders</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Action</th>
                            <th>Id</th>
                            <th>Firstname user</th>
                            <th>Lastname user</th>
                            <th>Address user</th>
                            <th>Phone user</th>
                            <th>Email user</th>
                            <th>Username user</th>
                            <th>Note</th>
                            <th>Total ($)</th>
                            <th>Time Created</th>
                            <th>Time Confirmed</th>
                            <th>Time Process Done</th>
                            <th>Time Delivered</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $order_list = json_decode($data['order_user_list']); 
                        $size_list = count($order_list);
                        for($row = 0; $row < $size_list; $row++){
                            $status = $order_list[$row]->status_order;
                        ?>
                        <tr>
                            <td class="text-center">
                                <button type="button" class="btn <?php echo $status == 'Not confirmed'?'btn-danger':($status == 'Confirmed'?'btn-warning':'btn-success'); ?>">
                                    <?php
                                    if($status == 'Not confirmed'){
                                        echo 'Confirm';
                                    }
                                    else if($status == 'Confirmed'){
                                        echo 'Done';
                                    }
                                    else if($status == 'Done'){
                                        echo 'Deliveried';
                                    }
                                    ?>
                                </button>
                            </td>
                            <td class="align-middle">
                                <a class="item-cart" href="/tmdt_201/manageorder/detail/<?php echo $order_list[$row]->id_order;?>">
                                    <?php echo $order_list[$row]->id_order;?>
                                </a>
                            </td>
                            <td class="align-middle"><?php echo $order_list[$row]->fname_user_order;?></td>
                            <td class="align-middle"><?php echo $order_list[$row]->lname_user_order;?></td>
                            <td class="align-middle"><?php echo $order_list[$row]->address_user_order;?></td>
                            <td class="align-middle"><?php echo $order_list[$row]->phone_user_order;?></td>
                            <td class="align-middle"><?php echo $order_list[$row]->email_user_order;?></td>
                            <td class="align-middle">
                                <?php echo $order_list[$row]->username_user_order == null?'<i>NULL</i>':$order_list[$row]->username_user_order;?>
                            </td>
                            <td class="align-middle">
                                <?php echo $order_list[$row]->note_order == null?'<i>NULL</i>':$order_list[$row]->note_order;?>
                            </td>
                            <td class="align-middle"><?php echo $order_list[$row]->total_order;?></td>
                            <td class="align-middle"><?php echo date_format(date_create($order_list[$row]->date_order), 'H:i:s \- d/m/Y');?></td>
                            <td class="align-middle">
                                <?php 
                                if($order_list[$row]->date_confirmed == null){
                                    echo '<i>NULL</i>';
                                }
                                else{
                                    echo date_format(date_create($order_list[$row]->date_confirmed), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle">
                                <?php 
                                if($order_list[$row]->date_prepared == null){
                                    echo '<i>NULL</i>';
                                }
                                else{
                                    echo date_format(date_create($order_list[$row]->date_prepared), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle">
                                <?php 
                                if($order_list[$row]->date_delivered == null){
                                    echo '<i>NULL</i>';
                                }
                                else{
                                    echo date_format(date_create($order_list[$row]->date_delivered), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>