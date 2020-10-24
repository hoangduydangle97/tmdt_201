<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Organi | <?php echo ucfirst($data['page']);?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="/tmdt_201/public/master2/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/tmdt_201/public/master2/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/tmdt_201/public/master2/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/tmdt_201/public/master2/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/tmdt_201/public/master2/vendor/animate/animate.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="/tmdt_201/public/master2/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/tmdt_201/public/master2/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/tmdt_201/public/master2/vendor/select2/select2.min.css">
    <!--===============================================================================================-->	
        <link rel="stylesheet" type="text/css" href="/tmdt_201/public/master2/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
        <link rel="stylesheet" type="text/css" href="/tmdt_201/public/master2/css/util.css">
        <link rel="stylesheet" type="text/css" href="/tmdt_201/public/master2/css/main.css">
    <!--===============================================================================================-->
    <style>
        .return-home {
            color: white;
            font-size: 0.8em;
        }

        .return-home:hover {
            text-decoration: underline;
            color: yellow;
        }

        .btn-login {
            cursor: pointer;
        }

        .sign-up {
            color: blue;
        }

        .sign-up:hover {
            color: orange;
            text-decoration: underline;
        }
    </style>
    </head>
    <body>
        <div class="limiter">
            <div class="container-login100">
                <div class="wrap-login100">
                    <div class="login100-form-title" style="background-image: url(/tmdt_201/public/master2/images/bg-01.jpg);">
                        <span class="login100-form-title-1">
                            Sign In
                        </span>
                        <div>
                            <a href="http://localhost/tmdt_201/home" class="return-home">Return home</a>
                        </div>
                    </div>

                    <form class="login100-form validate-form" method="POST" action="http://localhost/tmdt_201/login/check_login">
                        <?php if(isset($_SESSION['error']) && $_SESSION['error'] == true){?>
                        <div class="container text-danger">
                            * Username or password is wrong!
                        </div>
                        <?php 
                        $_SESSION['error'] = false;
                        }?>
                        <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                            <span class="label-input100">Username</span>
                            <input class="input100" type="text" name="username" placeholder="Enter username">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                            <span class="label-input100">Password</span>
                            <input class="input100" type="password" name="password" placeholder="Enter password">
                            <span class="focus-input100"></span>
                        </div>

                        <div class="flex-sb-m w-full p-b-30">
                            <div class="contact100-form-checkbox">
                                <span class="txt1">Create an account? </span>
                                <a href="#" class="txt1">
                                    <span class="sign-up">Sign up</span>
                                </a>
                            </div>

                            <div>
                                <a href="#" class="txt1">
                                    Forgot Password?
                                </a>
                            </div>
                        </div>

                        <div class="container-login100-form-btn">
                            <input class="login100-form-btn btn-login" type="submit" name="btn-login" value="Login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    <!--===============================================================================================-->
        <script src="/tmdt_201/public/master2/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
        <script src="/tmdt_201/public/master2/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
        <script src="/tmdt_201/public/master2/vendor/bootstrap/js/popper.js"></script>
        <script src="/tmdt_201/public/master2/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
        <script src="/tmdt_201/public/master2/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
        <script src="/tmdt_201/public/master2/vendor/daterangepicker/moment.min.js"></script>
        <script src="/tmdt_201/public/master2/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
        <script src="/tmdt_201/public/master2/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
        <script src="/tmdt_201/public/master2/js/main.js"></script>
    </body>
</html>