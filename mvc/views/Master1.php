<!DOCTYPE html>
<html lang="zxx">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Ogani">
        <meta name="keywords" content="Ogani, unica, creative, html">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ogani | <?php echo ucfirst($data['page']);?></title>

        <!-- Google Font -->
        <link rel="stylesheet" href="/tmdt_201/public/master1/css/google-font.css" type="text/css">

        <!-- Css Styles -->
        <link rel="stylesheet" href="/tmdt_201/public/master1/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="/tmdt_201/public/master1/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="/tmdt_201/public/master1/css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="/tmdt_201/public/master1/css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="/tmdt_201/public/master1/css/jquery-ui.min.css" type="text/css">
        <link rel="stylesheet" href="/tmdt_201/public/master1/css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="/tmdt_201/public/master1/css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="/tmdt_201/public/master1/css/dataTables.bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="/tmdt_201/public/master1/css/style.css" type="text/css">
        <style>
            .language-option, .item-cart {
                transition: 0.3s;
            }

            .item-cart {
                color: #252525;
            }

            .language-option:hover, .item-cart:hover {
                color: #7fad39;
                text-decoration: underline;
            }
            .product__pagination a.active, .blog__pagination a.active {
                background: #7fad39;
                border-color: #7fad39;
                color: #ffffff;
            }

            .star-rating, .star-rating-disabled, .star-rating-modify {
                line-height:32px;
                font-size:1.25em;
            }

            .star-rating .fa-star:hover, .star-rating-modify .fa-star:hover {
                cursor: pointer;
            }

            .star-rating .fa-star, .star-rating-disabled .fa-star, .star-rating-modify .fa-star {
                color: #EDBB0E;
            }

            #back-to-top-btn, #cart-btn, #home-btn {
                display: inline-block;
                background-color: #FF9800;
                width: 50px;
                height: 50px;
                text-align: center;
                border-radius: 4px;
                position: fixed;
                bottom: 30px;
                right: 30px;
                transition: background-color .3s, 
                            opacity .5s, visibility .5s;
                opacity: 0;
                visibility: hidden;
                z-index: 1000;
            }

            #cart-btn {
                background-color: dodgerblue;
                bottom: 100px;
            }

            #home-btn {
                background-color: red;
                bottom: 170px;
            }
            
            #back-to-top-btn::after {
                content: "\f077";
                font-family: FontAwesome;
                font-weight: normal;
                font-style: normal;
                font-size: 2em;
                line-height: 50px;
                color: #fff;
            }

            #cart-btn i, #home-btn i {
                font-family: FontAwesome;
                font-size: 1.5em;
                line-height: 50px;
                color: #fff;
            }

            #cart-btn span {
                height: 18px;
                width: 18px;
                background: green;
                font-size: 15px;
                color: #ffffff;
                line-height: 18px;
                text-align: center;
                font-weight: 700;
                display: inline-block;
                border-radius: 50%;
                position: absolute;
                top: 5px;
                right: 8px;
            }

            #back-to-top-btn:hover {
                cursor: pointer;
                background-color: #333;
            }

            #cart-btn:hover, #home-btn:hover {
                cursor: pointer;
                background-color: #333;
            }

            #back-to-top-btn:active {
                background-color: #555;
            }

            #back-to-top-btn.show, #cart-btn.show, #home-btn.show {
                opacity: 1;
                visibility: visible;
            }

            .review-option:hover:not([disabled]) {
                cursor: pointer;
                background-color: lightgray;
            }

            .dropdown-item:hover {
                color: white;
                background-color: #007bff;
            }
        </style>
    </head>

    <body>
        <!-- Page Preloder -->
        <div id="preloder">
            <div class="loader"></div>
        </div>

        <!-- Back to Top Button -->
        <a id="back-to-top-btn"></a>

        <!-- Cart Button -->
        <?php if(isset($_SESSION['cms'])){?>
            <a href="http://localhost/tmdt_201/order" id="cart-btn" class="rounded-circle">
            <i class="fa fa-cart-arrow-down"></i>
            <span class="selected-product">0</span>
        </a>
        <?php }
        else{?>
        <a href="http://localhost/tmdt_201/cart" id="cart-btn" class="rounded-circle">
            <i class="fa fa-shopping-cart"></i>
            <span class="selected-product">0</span>
        </a>
        <?php }?>

        <!-- Home Button -->
        <?php if(isset($_SESSION['cms'])){?>
        <a href="http://localhost/tmdt_201/admin" id="home-btn" class="rounded-circle">
            <i class="fa fa-user-secret"></i>
        </a>
        <?php }
        else{?>
        <a href="http://localhost/tmdt_201/home" id="home-btn" class="rounded-circle">
            <i class="fa fa-home"></i>
        </a>
        <?php }?>

        <!-- Humberger Begin -->
        <div class="humberger__menu__overlay"></div>
        <div class="humberger__menu__wrapper">
            <div class="humberger__menu__logo">
                <a href="#"><img src="/tmdt_201/public/master1/images/logo.png" alt="logo"></a>
            </div>
            <div class="humberger__menu__cart">
                <ul>
                    <li><a href="#"><i class="fa fa-gift"></i> <span>0</span></a></li>
                    <li><a href="http://localhost/tmdt_201/cart"><i class="fa fa-shopping-cart"></i> <span class="selected-product">0</span></a></li>
                </ul>
                <div class="header__cart__price">Total: <span>$150.00</span></div>
            </div>
            <div class="humberger__menu__widget">
                <div class="header__top__right__language mb-2">
                    <img src="/tmdt_201/public/master1/images/language.png" alt="language">
                    <div>English</div>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="#">Spanish</a></li>
                        <li><a href="#">English</a></li>
                    </ul>
                </div>
                <?php if(isset($_SESSION['username'])){?>
                <div class="header__top__right__auth">
                    <i class="fa fa-user"></i> 
                    <div><?php echo $_SESSION['username']; ?></div>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li>
                            <a href="#" class="language-option">
                                <i class="fa fa-user"></i> Profile
                            </a>
                        </li>
                        <li>
                            <a href="http://localhost/tmdt_201/logout" class="language-option">
                            <i class="fa fa-sign-out"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
                <?php }
                else{?>
                <div class="header__top__right__auth">
                    <div>Login/Sign up</div>
                    <span class="arrow_carrot-down"></span>
                        <ul>
                            <li>
                                <a href="http://localhost/tmdt_201/login" class="language-option">
                                    <i class="fa fa-sign-in"></i> Login
                                </a>
                            </li>
                            <li>
                                <a href="http://localhost/tmdt_201/signup" class="language-option">
                                    <i class="fa fa-user-plus"></i> Sign up
                                </a>
                            </li>
                        </ul>
                </div>
                <?php }?>
            </div>
            <nav class="humberger__menu__nav mobile-menu">
                <ul>
                    <li <?php if($data["page"] == "home"){ ?>class="active"<?php }?>><a href="http://localhost/tmdt_201/home">Home</a></li>
                    <?php if(!isset($_SESSION['cms'])){?>
                    <li <?php if($data["page"] == "shop" || $data["page"] == "detail"){ ?>class="active"<?php }?>><a href="http://localhost/tmdt_201/shop">Shop</a></li>
                    <li <?php if($data["page"] == "cart"){ ?>class="active"<?php }?>><a href="http://localhost/tmdt_201/cart">Cart</a></li>
                    <li <?php if($data["page"] == "contact"){ ?>class="active"<?php }?>><a href="http://localhost/tmdt_201/contact">Contact</a></li>
                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1){?>
                    <li <?php if($data["page"] == "admin"){ ?>class="active"<?php }?>><a href="http://localhost/tmdt_201/admin">Cms</a></li>
                    <?php }}
                    else{
                    ?>
                    <li <?php if($data["page"] == "admin"){ ?>class="active"<?php }?>><a href="http://localhost/tmdt_201/admin">Admin</a></li>
                    <li <?php if($data["page"] == "product"){ ?>class="active"<?php }?>><a href="http://localhost/tmdt_201/product">Product</a></li>
                    <li <?php if($data["page"] == "order"){ ?>class="active"<?php }?>><a href="http://localhost/tmdt_201/order">Order</a></li>
                    <?php }?>
                </ul>
            </nav>
            <div id="mobile-menu-wrap"></div>
            <div class="header__top__right__social">
                <a href="#" class="language-option"><i class="fa fa-facebook"></i></a>
                <a href="#" class="language-option"><i class="fa fa-twitter"></i></a>
                <a href="#" class="language-option"><i class="fa fa-youtube"></i></a>
            </div>
            <div class="humberger__menu__contact">
                <ul>
                    <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                    <li>Free Shipping for all Order of $99</li>
                </ul>
            </div>
        </div>
        <!-- Humberger End -->

        <!-- Header Section Begin -->
        <header class="header">
            <div class="header__top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="header__top__left">
                                <ul>
                                    <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                    <li>Free Shipping for all Order of $99</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="header__top__right">
                                <div class="header__top__right__social">
                                    <a href="#" class="language-option"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="language-option"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="language-option"><i class="fa fa-youtube"></i></a>
                                </div>
                                <div class="header__top__right__language">
                                    <img src="/tmdt_201/public/master1/images/language.png" alt="language">
                                    <div>English</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li><a href="#" class="language-option">Spanish</a></li>
                                        <li><a href="#" class="language-option">English</a></li>
                                    </ul>
                                </div>
                                <?php if(isset($_SESSION['username'])){?>
                                <div class="header__top__right__auth">
                                    <i class="fa fa-user"></i> 
                                    <div><?php echo $_SESSION['username']; ?></div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li>
                                            <a href="#" class="language-option">
                                                <i class="fa fa-user"></i> Profile
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://localhost/tmdt_201/logout" class="language-option">
                                                <i class="fa fa-sign-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <?php }
                                else{?>
                                <div class="header__top__right__auth">
                                    <div>Login/Sign up</div>
                                    <span class="arrow_carrot-down"></span>
                                    <ul>
                                        <li>
                                            <a href="http://localhost/tmdt_201/login" class="language-option">
                                                <i class="fa fa-sign-in"></i> Login
                                            </a>
                                        </li>
                                        <li>
                                            <a href="http://localhost/tmdt_201/signup" class="language-option">
                                                <i class="fa fa-user-plus"></i> Sign up
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="header__logo">
                            <a href="http://localhost/tmdt_201/home"><img src="/tmdt_201/public/master1/images/logo.png" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <nav class="header__menu">
                            <ul>
                                <li <?php if($data["page"] == "home"){ ?>class="active"<?php }?>><a href="http://localhost/tmdt_201/home">Home</a></li>
                                <?php if(!isset($_SESSION['cms'])){?>
                                <li <?php if($data["page"] == "shop" || $data["page"] == "detail"){ ?>class="active"<?php }?>><a href="http://localhost/tmdt_201/shop">Shop</a></li>
                                <li <?php if($data["page"] == "cart"){ ?>class="active"<?php }?>><a href="http://localhost/tmdt_201/cart">Cart</a></li>
                                <li <?php if($data["page"] == "contact"){ ?>class="active"<?php }?>><a href="http://localhost/tmdt_201/contact">Contact</a></li>
                                <?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1){?>
                                <li <?php if($data["page"] == "admin"){ ?>class="active"<?php }?>><a href="http://localhost/tmdt_201/admin">Cms</a></li>
                                <?php }}
                                else{
                                ?>
                                <li <?php if($data["page"] == "admin"){ ?>class="active"<?php }?>><a href="http://localhost/tmdt_201/admin">Admin</a></li>
                                <li <?php if($data["page"] == "product"){ ?>class="active"<?php }?>><a href="http://localhost/tmdt_201/product">Product</a></li>
                                <li <?php if($data["page"] == "order"){ ?>class="active"<?php }?>><a href="http://localhost/tmdt_201/order">Order</a></li>
                                <?php }?>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-3">
                        <div class="header__cart">
                            <?php if(!isset($_SESSION['cms'])){?>
                            <ul>
                                <li><a href="#"><i class="fa fa-gift"></i> <span>0</span></a></li>
                                <li><a href="http://localhost/tmdt_201/cart"><i class="fa fa-shopping-cart"></i> <span class="selected-product">0</span></a></li>
                            </ul>
                            <div class="header__cart__price">Total: <span>$150.00</span></div>
                            <?php }
                            else{?>
                            <ul>
                                <li><a href="#"><i class="fa fa-info-circle"></i> <span>0</span></a></li>
                                <li><a href="http://localhost/tmdt_201/order"><i class="fa fa-cart-arrow-down"></i> <span>0</span></a></li>
                            </ul>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div class="humberger__open">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </header>
        <!-- Header Section End -->

        <!-- Hero Section Begin -->
        <?php if(isset($data['category_list'])){?>
        <section class="hero<?php echo $data["page"] == "home"?'':' hero-normal'; ?>">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="hero__categories">
                            <div class="hero__categories__all">
                                <i class="fa fa-bars"></i>
                                <span>All categories</span>
                            </div>
                            <ul>
                                <?php $category_list = json_decode($data["category_list"]);
                                for($row = 0; $row < count($category_list); $row++){
                                ?>
                                <li><a href="http://localhost/tmdt_201/shop/category/<?php echo $category_list[$row]->id_category; ?>" class="language-option"><?php echo $category_list[$row]->name_category; ?></a></li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="hero__search">
                            <div class="hero__search__form">
                                <form action="#">
                                    <div class="hero__search__categories">
                                        Filter
                                        <span class="arrow_carrot-down"></span>
                                    </div>
                                    <input type="text" placeholder="What do you need?">
                                    <button type="submit" class="site-btn">SEARCH</button>
                                </form>
                            </div>
                            <div class="hero__search__phone">
                                <div class="hero__search__phone__icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="hero__search__phone__text">
                                    <h5>+84 123.456.78</h5>
                                    <span>support 24/7 time</span>
                                </div>
                            </div>
                        </div>
                        <?php if($data["page"] == "home"){?>
                        <div class="hero__item set-bg" data-setbg="/tmdt_201/public/master1/images/hero/banner.jpg">
                            <div class="hero__text">
                                <span>FRESH FRUIT</span>
                                <h2>Vegetables <br />100% Organic</h2>
                                <p>Free Pickup and Delivery Available</p>
                                <a href="#" class="primary-btn">SHOP NOW</a>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </section>
        <?php }?>
        <!-- Hero Section End -->

        <?php
        require_once "./mvc/views/pages/".$data["page"].".php";
        ?>

        <!-- Footer Section Begin -->
        <footer class="footer spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer__about">
                            <div class="footer__about__logo">
                                <a href="http://localhost/tmdt_201/home"><img src="/tmdt_201/public/master1/images/logo.png" alt="logo"></a>
                            </div>
                            <ul>
                                <li>Address: 123 Ly Thuong Kiet, Ward 14, District 10, TPHCM</li>
                                <li>Phone: +84 123.456.78</li>
                                <li>Email: hello@colorlib.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                        <div class="footer__widget">
                            <h6>Useful Links</h6>
                            <ul>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">About Our Shop</a></li>
                                <li><a href="#">Secure Shopping</a></li>
                                <li><a href="#">Delivery infomation</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Our Sitemap</a></li>
                            </ul>
                            <ul>
                                <li><a href="#">Who We Are</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Projects</a></li>
                                <li><a href="#">Contact</a></li>
                                <li><a href="#">Innovation</a></li>
                                <li><a href="#">Testimonials</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="footer__widget">
                            <h6>Join Our Newsletter Now</h6>
                            <p>Get E-mail updates about our latest shop and special offers.</p>
                            <form action="#">
                                <input type="text" placeholder="Enter your mail">
                                <button type="submit" class="site-btn">Subscribe</button>
                            </form>
                            <div class="footer__widget__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer__copyright">
                            <div class="footer__copyright__text">
                                <p>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </p>
                            </div>
                            <div class="footer__copyright__payment"><img src="/tmdt_201/public/master1/images/payment-item.png" alt="payment-item"></div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Section End -->

        <!-- Js Plugins -->
        <script src="/tmdt_201/public/master1/js/jquery-3.3.1.min.js"></script>
        <script src="/tmdt_201/public/master1/js/popper.min.js"></script>
        <script src="/tmdt_201/public/master1/js/bootstrap.min.js"></script>
        <script src="/tmdt_201/public/master1/js/jquery.nice-select.min.js"></script>
        <script src="/tmdt_201/public/master1/js/jquery-ui.min.js"></script>
        <script src="/tmdt_201/public/master1/js/jquery.slicknav.js"></script>
        <script src="/tmdt_201/public/master1/js/mixitup.min.js"></script>
        <script src="/tmdt_201/public/master1/js/owl.carousel.min.js"></script>
        <script src="/tmdt_201/public/master1/js/moment.js"></script>
        <script src="/tmdt_201/public/master1/js/jquery.dataTables.min.js"></script>
        <script src="/tmdt_201/public/master1/js/datetime-moment.js"></script>
        <script src="/tmdt_201/public/master1/js/dataTables.bootstrap.min.js"></script>
        <script src="/tmdt_201/public/master1/js/main.js"></script>

    </body>

</html>