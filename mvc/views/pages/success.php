    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/tmdt_201/public/master1/images/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Success</h2>
                        <div class="breadcrumb__option">
                            <a href="http://localhost/tmdt_201/home">Home</a>
                            <span>Place order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <div class="container my-5">
        <h4 class="text-center text-success">
            <i class="fa fa-info-circle"></i> Your order is created seccessfully!
        </h4>
        <h4 class="text-center my-5">Id of your order is: <u><b><?php echo isset($_SESSION['id_order'])?$_SESSION['id_order']:'';?></b></u>, please use this id to check the status of your order by searching for it on <b>SEARCH BAR</b>!<h4>
        <h4 class="text-center my-5 text-info">
            <i class="fa fa-handshake-o"></i> Thank you very much for selecting our company! <i class="fa fa-thumbs-up"></i>
        </h4>
    </div>