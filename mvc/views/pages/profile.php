    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/images/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Profile</h2>
                        <div class="breadcrumb__option">
                            <a href="http://localhost/tmdt_201/home">Home</a>
                            <span>Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <?php $user_info = json_decode($data['user_info']); ?>
    <div class="container my-5">
        <div class="row my-5">
            <div class="col-12 text-center user-info">
                <b>Avatar</b>
            </div>
            <div class="col-12 text-center">
                <img src="/tmdt_201/<?php echo $user_info->avatar_user; ?>" style="width: 200px; height: 200px;">
            </div>
        </div>
        <div class="row">
            <div class="col-6 text-right pr-5">
                <div class="user-info">
                    <b>Username:</b> <?php echo $user_info->username_user; ?>
                </div>
                <div class="user-info">
                    <b>Firstname:</b> <?php echo $user_info->fname_user; ?>
                </div>
                <div class="user-info">
                    <b>Lastname:</b> <?php echo $user_info->lname_user; ?>
                </div>
                <div class="user-info">
                    <b>Birthday:</b> <?php echo date_format(date_create($user_info->bday_user), 'd/m/Y'); ?>
                </div>
            </div>
            <div class="col-6 pl-5">
                <div class="user-info">
                    <b>Address:</b> <?php echo $user_info->address_user; ?>
                </div>
                <div class="user-info">
                    <b>Phone:</b> <?php echo $user_info->phone_user; ?>
                </div>
                <div class="user-info">
                    <b>Email:</b> <?php echo $user_info->email_user; ?>
                </div>
                <div class="user-info">
                    <b>Role:</b> <?php echo $user_info->role_user == 0?'User':'Admin'; ?>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="col-12 text-center">
                <button type="button" class="btn btn-primary user-info" onclick="goToManageOrders()"">
                    <i class="fa fa-arrow-right"></i> Your orders
                </button>
            </div>
        </div>
    </div>