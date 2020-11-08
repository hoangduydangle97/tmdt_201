<form class="login100-form validate-form" method="POST" action="http://localhost/tmdt_201/login/login">
    <?php if(isset($_SESSION['error'])){
        if($_SESSION['error'] != false){?>
    <div class="container <?php echo $_SESSION['error'][0] == false?'text-success':'text-danger';?> text-center mt-3 error-info">
        <i class="fa fa-info-circle"></i> <?php echo $_SESSION['error'][1];?> <i class="fa fa-times category-btn" onclick="$('.error-info').attr('hidden', true)"></i>
    </div>
    <?php }
    $_SESSION['error'] = false;
    }?>
    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
        <span class="label-input100">Username</span>
        <input class="input100" type="text" name="username" placeholder="Enter your username">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
        <span class="label-input100">Password</span>
        <input class="input100" type="password" name="password" placeholder="Enter your password">
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