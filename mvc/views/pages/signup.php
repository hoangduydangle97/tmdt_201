<form class="login100-form validate-form" method="POST" 
    action="http://localhost/tmdt_201/sign-up/insert_user" enctype="multipart/form-data">
    <?php if(isset($_SESSION['error'])){
        if($_SESSION['error'] != false){?>
    <div class="container <?php echo $_SESSION['error'][0] == false?'text-success':'text-danger';?> text-center mt-3 error-info">
        <i class="fa fa-info-circle"></i> <?php echo $_SESSION['error'][1];?> <i class="fa fa-times category-btn" onclick="$('.error-info').attr('hidden', true)"></i>
    </div>
    <?php }
    $_SESSION['error'] = false;
    }?>
    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
        <span class="label-input100">Username<span class="text-danger">*</span></span>
        <input class="input100" type="text" name="username" placeholder="Enter your username">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
        <span class="label-input100">Password<span class="text-danger">*</span></span>
        <input class="input100" type="password" name="password" placeholder="Enter your password">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input m-b-18" data-validate = "Phone is required">
        <span class="label-input100">Phone<span class="text-danger">*</span></span>
        <input class="input100" type="tel" name="phone" placeholder="Format: 0123456789 (10 digits)"
            pattern="[0-9]{10}">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input m-b-18" data-validate = "Email is required">
        <span class="label-input100">Email<span class="text-danger">*</span></span>
        <input class="input100" type="email" name="email" placeholder="Enter your email">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input m-b-18" data-validate = "Firstname is required">
        <span class="label-input100">Firstname<span class="text-danger">*</span></span>
        <input class="input100" type="text" name="fname" placeholder="Enter your firstname">
        <span class="focus-input100"></span>
    </div>

    <div class="wrap-input100 validate-input m-b-18" data-validate = "Lastname is required">
        <span class="label-input100">Lastname<span class="text-danger">*</span></span>
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

    <div class="wrap-input100 validate-input m-b-18" data-validate = "Address is required">
        <span class="label-input100">Address<span class="text-danger">*</span></span>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <select class="form-control select-checkout" id="province" onchange="provinceChange()">
                        <?php $province_list = json_decode($data['province_list']);
                        foreach($province_list as $value){
                        ?>
                        <option value="<?php echo $value->id; ?>">
                            <?php echo $value->name; ?>
                        </option>
                        <?php }?>
                    </select>
                    <input type="hidden" id="province-input" name="province" value="<?php echo $province_list[0]->name;?>">
                </div>
                <div class="col-4">
                    <select class="form-control select-checkout" id="district" onchange="districtChange()">
                        <?php $district_list = json_decode($data['district_list']);
                        foreach($district_list as $value){
                        ?>
                        <option value="<?php echo $value->DistrictID; ?>">
                            <?php echo $value->DistrictName; ?>
                        </option>
                        <?php }?>
                    </select>
                    <input type="hidden" id="district-input" name="district" value="<?php echo $district_list[0]->DistrictName;?>">
                </div>
                <div class="col-4">
                    <select class="form-control select-checkout" id="ward" onchange="wardChange()">
                        <?php $ward_list = json_decode($data['ward_list']);
                        foreach($ward_list as $value){
                        ?>
                        <option value="<?php echo $value->WardCode; ?>">
                            <?php echo $value->WardName; ?>
                        </option>
                        <?php }?>
                    </select>
                    <input type="hidden" id="ward-input" name="ward" value="<?php echo $ward_list[0]->WardName;?>">
                </div>
            </div>
        </div>
        <input class="input100" type="text" name="addr" placeholder="Your house number and street">
        <span class="focus-input100"></span>
    </div>

    <div class="mb-4 text-primary loading-ajax d-none">Loading ...</div>

    <div class="container-login100-form-btn">
        <input class="login100-form-btn btn-login" type="submit" name="btn-login" value="Create your account">
    </div>
</form>