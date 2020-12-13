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
            <div class="text-right">
                <button type="button" class="btn btn-primary mb-3" onclick="directToLookUp()">
                    <i class="fa fa-eye"></i> See the done orders
                </button>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover text-nowrap" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr class="text-center">
                            <th>Action</th>
                            <th>Id</th>
                            <th>Status</th>
                            <th>Firstname User</th>
                            <th>Lastname User</th>
                            <th>Address User</th>
                            <th>Phone User</th>
                            <th>Email User</th>
                            <th>Username User</th>
                            <th>Note</th>
                            <th>Shipping</th>
                            <th>Free Shipping</th>
                            <th>Total (đ)</th>
                            <th>Payment</th>
                            <th>Date Created</th>
                            <th>Date Confirmed</th>
                            <th>Date Confirm Prepared</th>
                            <th>Date Confirm Delivered</th>
                            <th>Date Request Return</th>
                            <th>Date Confirm Request Return</th>
                            <th>Date Confirm Returned</th>
                            <th>Tracking Code</th>
                            <th>Return Reason</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $order_list = json_decode($data['order_list']); 
                        foreach($order_list as $value){
                            $status = $value->status_order;
                        ?>
                        <tr id="tr-<?php echo $value->id_order;?>">
                            <td class="text-center">
                                <?php $btn = json_decode($this->order_object->get_status_btn($status)); ?>
                                <button type="button" id="<?php echo $value->id_order; ?>" class="btn <?php echo $btn->style; ?>" 
                                    onclick="changeStatusOrder(<?php echo "'".$status."'"; ?>, <?php echo "'".$value->id_order."'"; ?>, <?php echo "'".$btn->style."'"; ?>)">
                                    <?php echo $btn->content; ?>
                                </button>
                                <div class="spinner-border text-primary d-none" id="spinner-<?php echo $value->id_order; ?>"></div>
                            </td>
                            <td class="align-middle">
                                <a class="item-cart" href="/tmdt_201/manageorder/detail/<?php echo $value->id_order; ?>">
                                    <?php echo $value->id_order;?>
                                </a>
                            </td>
                            <td class="align-middle"><?php echo $value->status_order;?></td>
                            <td class="align-middle"><?php echo $value->fname_user_order;?></td>
                            <td class="align-middle"><?php echo $value->lname_user_order;?></td>
                            <td class="align-middle"><?php echo $value->address_user_order;?></td>
                            <td class="align-middle"><?php echo $value->phone_user_order;?></td>
                            <td class="align-middle"><?php echo $value->email_user_order;?></td>
                            <td class="align-middle">
                                <?php echo $value->username_user_order == null?'<i>NULL</i>':$value->username_user_order;?>
                            </td>
                            <td class="align-middle">
                                <?php echo $value->note_order == null?'<i>NULL</i>':$value->note_order;?>
                            </td>
                            <td class="align-middle"><?php echo number_format($value->shipping_order, 0);?></td>
                            <td class="align-middle"><?php echo $value->free_shipping == 0?'Not Apply':'Apply';?></td>
                            <td class="align-middle"><?php echo number_format($value->total_order, 0);?></td>
                            <td class="align-middle"><?php echo $value->payment_order == 'cod'?'COD':'VNPay';?></td>
                            <td class="align-middle"><?php echo date_format(date_create($value->date_order), 'H:i:s \- d/m/Y');?></td>
                            <td class="align-middle">
                                <?php 
                                if($value->date_confirmed == null){
                                    echo '<i>NULL</i>';
                                }
                                else{
                                    echo date_format(date_create($value->date_confirmed), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle">
                                <?php 
                                if($value->date_prepared == null){
                                    echo '<i>NULL</i>';
                                }
                                else{
                                    echo date_format(date_create($value->date_prepared), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle">
                                <?php 
                                if($value->date_delivered == null){
                                    echo '<i>NULL</i>';
                                }
                                else{
                                    echo date_format(date_create($value->date_delivered), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle">
                                <?php 
                                if($value->date_request == null){
                                    echo '<i>NULL</i>';
                                }
                                else{
                                    echo date_format(date_create($value->date_request), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle">
                                <?php 
                                if($value->date_confirm_request == null){
                                    echo '<i>NULL</i>';
                                }
                                else{
                                    echo date_format(date_create($value->date_confirm_request), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle">
                                <?php 
                                if($value->date_returned == null){
                                    echo '<i>NULL</i>';
                                }
                                else{
                                    echo date_format(date_create($value->date_returned), 'H:i:s \- d/m/Y');
                                }
                                ?>
                            </td>
                            <td class="align-middle">
                                <?php 
                                if($value->tracking_order == null){
                                    echo '<i>NULL</i>';
                                }
                                else{
                                    echo $value->tracking_order;
                                }
                                ?>
                            </td>
                            <td class="align-middle">
                                <?php 
                                if($value->return_reason == null){
                                    echo '<i>NULL</i>';
                                }
                                else{
                                    echo $value->return_reason;
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