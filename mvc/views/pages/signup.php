<form class="login100-form validate-form" method="POST" 
    action="http://localhost/tmdt_201/signup/insert_user" enctype="multipart/form-data">
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

    <!--<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
        <span class="label-input100">Confirm password</span>
        <input class="input100" type="password" id="confirm" placeholder="Enter your password again">
        <span class="focus-input100"></span>
    </div>-->

    <div class="wrap-input100 validate-input m-b-18" data-validate = "Email is required">
        <span class="label-input100">Email</span>
        <input class="input100" type="email" name="email" placeholder="Enter your email">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input m-b-18" data-validate = "Firstname is required">
        <span class="label-input100">First Name</span>
        <input class="input100" type="text" name="fname" placeholder="Enter your firstname">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input m-b-18" data-validate = "Lastname is required">
        <span class="label-input100">Last Name</span>
        <input class="input100" type="text" name="lname" placeholder="Enter your lastname">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 m-b-26">
        <span class="label-input100">Avatar</span>
        <input class="input100" type="file" name="avatar" accept=".png, .jpg, .jpeg">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 m-b-18">
        <span class="label-input100">Birthday</span>
        <input class="input100" type="date" name="bday">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 m-b-18">
        <span class="label-input100">Address</span>
        <input class="input100" type="text" name="addr" placeholder="Enter your address">
        <span class="focus-input100"></span>
    </div>

    <div class="container-login100-form-btn">
        <input class="login100-form-btn btn-login" type="submit" name="btn-login" value="Create your account">
    </div>
</form>