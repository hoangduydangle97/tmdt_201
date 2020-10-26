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
                            <?php echo $data['page'] == 'login'?'LOGIN':'SIGN UP';?>
                        </span>
                        <div>
                            <a href="http://localhost/tmdt_201/home" class="return-home">Return home</a>
                        </div>
                    </div>

                    <?php
                    require_once "./mvc/views/pages/".$data["page"].".php";
                    ?>

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