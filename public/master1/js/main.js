/*  ---------------------------------------------------
    Template Name: Ogani
    Description:  Ogani eCommerce  HTML Template
    Author: Colorlib
    Author URI: https://colorlib.com
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");

        /*------------------
            Gallery filter
        --------------------*/
        $('.featured__controls li').on('click', function () {
            $('.featured__controls li').removeClass('active');
            $(this).addClass('active');
        });
        if ($('.featured__filter').length > 0) {
            var containerEl = document.querySelector('.featured__filter');
            var mixer = mixitup(containerEl);
        }

        var path = location.pathname;
        var last_path = path.charAt(path.length - 1);
        var check_path = path.indexOf('category');
        if((last_path != '' && !isNaN(Number(last_path))) || check_path != -1){
            if(path.indexOf('manageorder') == -1){
                $('html, body').animate({
                    scrollTop: $('#scroll-pos').offset().top
                }, 'slow');
            }
        }

        var scroll_pos = document.getElementById('scroll-pos-review');
        if(scroll_pos){
            $('html, body').animate({
                scrollTop: $('#scroll-pos-review').offset().top
            }, 'slow');
        }

        $.fn.dataTable.moment('HH:mm:ss - DD/MM/YYYY');
        if(path == '/tmdt_201/product'){
            $('#dataTable').DataTable({
                "aaSorting": [],
                "columnDefs": [{
                    orderable: false,
                    targets: [0, 3, 4, 5, 6]
                }],
                "fnDrawCallback": function () {
                    $('[data-toggle="popover-hover"]').popover({
                        html: true,
                        trigger: 'hover',
                        placement: 'right',
                        content: function () { return '<img src="' + $(this).data('img') + '" />'; }
                    });
                },
                "scrollX": true,
                "scrollY": 400
            });
        }
        else if(path == '/tmdt_201/orders'){
            $('#dataTable').DataTable({
                "aaSorting": [],
                "order": [[ 14, "asc" ]],
                "columnDefs": [{
                    targets: 0
                }],
                "scrollX": true,
                "scrollY": 400
            });
        }
        else{
            $('#dataTable').DataTable({
                "aaSorting": [],
                "columnDefs": [{
                    orderable: false,
                    targets: 0
                }],
                "scrollX": true,
                "scrollY": 400
            });
        }

        if(checkCookie('sum')){
            $('.selected-product').html(getCookie('sum'));
        }
        else{
            $('.selected-product').html(0);
        }
    
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Humberger Menu
    $(".humberger__open").on('click', function () {
        $(".humberger__menu__wrapper").addClass("show__humberger__menu__wrapper");
        $(".humberger__menu__overlay").addClass("active");
        $("body").addClass("over_hid");
    });

    $(".humberger__menu__overlay").on('click', function () {
        $(".humberger__menu__wrapper").removeClass("show__humberger__menu__wrapper");
        $(".humberger__menu__overlay").removeClass("active");
        $("body").removeClass("over_hid");
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*-----------------------
        Categories Slider
    ------------------------*/
    $(".categories__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 4,
        dots: false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {

            0: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 3,
            },

            992: {
                items: 4,
            }
        }
    });


    $('.hero__categories__all').on('click', function(){
        $('.hero__categories ul').slideToggle(400);
    });

    /*--------------------------
        Latest Product Slider
    ----------------------------*/
    $(".latest-product__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: ["<span class='fa fa-angle-left'><span/>", "<span class='fa fa-angle-right'><span/>"],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true
    });

    /*-----------------------------
        Product Discount Slider
    -------------------------------*/
    $(".product__discount__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 3,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {

            320: {
                items: 1,
            },

            480: {
                items: 2,
            },

            768: {
                items: 2,
            },

            992: {
                items: 3,
            }
        }
    });

    /*---------------------------------
        Product Details Pic Slider
    ----------------------------------*/
    $(".product__details__pic__slider").owlCarousel({
        loop: true,
        margin: 20,
        items: 4,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true
    });

    /*-----------------------
		Price Range Slider
	------------------------ */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data('min'),
        maxPrice = rangeSlider.data('max');
    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minPrice, maxPrice],
        slide: function (event, ui) {
            minamount.val('$' + ui.values[0]);
            maxamount.val('$' + ui.values[1]);
        }
    });
    minamount.val('$' + rangeSlider.slider("values", 0));
    maxamount.val('$' + rangeSlider.slider("values", 1));

    /*--------------------------
        Select
    ----------------------------*/
    //$("select").niceSelect();

    /*------------------
		Single Product
	--------------------*/
    $('.product__details__pic__slider img').on('click', function () {

        var imgurl = $(this).data('imgbigurl');
        var bigImg = $('.product__details__pic__item--large').attr('src');
        if (imgurl != bigImg) {
            $('.product__details__pic__item--large').attr({
                src: imgurl
            });
        }
    });

    /*-------------------
		Quantity change
	--------------------- */
    var proQty = $('.pro-qty');
    proQty.prepend('<button class="dec qtybtn border-0 bg-transparent" type="button">-</button>');
    proQty.append('<button class="inc qtybtn border-0 bg-transparent" type="button">+</button>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var $input = $button.parent().find('.hidden-input');
        var oldValue = $button.parent().find('.text-input').val();
        if ($button.hasClass('inc')) {
            var newVal = (parseFloat(oldValue) + 0.05).toFixed(2);
        } else {
            // Don't allow decrementing below one
            if (oldValue > 0.1) {
                var newVal = (parseFloat(oldValue) - 0.05).toFixed(2);
            } else {
                newVal = 0.1.toFixed(2);
            }
        }
        $button.parent().find('.text-input').val(newVal);
        SetCart($input.filter(".id_item").val());
    });

    /*-------------------
		Star rating
	--------------------- */
    var $star_rating = $('.star-rating .fa');
    //var $star_rating_disabled = $('.star-rating-disabled .fa');
    var $level_rating = " - Good!";
    var $level_rating_color = "blue";
    var $reset_button = $('.reset-btn');
    var SetRatingStar = function() {
        return $star_rating.each(function() {
            if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
                return $(this).removeClass('fa-star-o').addClass('fa-star');
            } 
            else {
                return $(this).removeClass('fa-star').addClass('fa-star-o');
            }
        });
    };

    $star_rating.on('mouseenter', function() {
        $star_rating.siblings('input.rating-value').val($(this).data('rating'));
        switch($(this).data('rating')){
            case 1:
                $level_rating = " - Very Bad!";
                $level_rating_color = "red";
                break;
            case 2:
                $level_rating = " - Bad!";
                $level_rating_color = "orange";
                break;
            case 3:
                $level_rating = " - OK!";
                $level_rating_color = "darkmagenta";
                break;
            case 4:
                $level_rating = " - Good!";
                $level_rating_color = "blue";
                break;
            case 5:
                $level_rating = " - Very Good!";
                $level_rating_color = "limegreen";
                break;
        }
        $('.level-rating').html($level_rating).css("color", $level_rating_color);
        return SetRatingStar();
    });

    $('.level-rating').html($level_rating).css("color", $level_rating_color);
    SetRatingStar();
    $reset_button.on('click', function() {
        $star_rating.siblings('input.rating-value').val(4);
        SetRatingStar();
        $level_rating = " - Good!";
        $level_rating_color = "blue";
        $('.level-rating').html($level_rating).css("color", $level_rating_color);
    });

    /*-----------------------
		Back to Top Button
    ------------------------- */
    var btn = $('#back-to-top-btn');
    var cart_btn = $('#cart-btn');
    var home_btn = $('#home-btn');
    $(window).scroll(function() {
        if ($(window).scrollTop() > 400) {
            btn.addClass('show');
            cart_btn.addClass('show');
            home_btn.addClass('show');
    } 
    else {
        btn.removeClass('show');
        cart_btn.removeClass('show');
        home_btn.removeClass('show');
    }
    });
    btn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
    });

    /*-------------
		Modify
    --------------- */
    var $star_rating_modify = $('.star-rating-modify .fa');
    var $level_rating_modify = '';
    var $level_rating_color_modify = '';
    var $reset_button_modify = $('.reset-btn-modify');
    var SetRatingStarModify = function() {
        return $star_rating_modify.each(function() {
            if (parseInt($star_rating_modify.siblings('input.rating-value-modify').val()) >= parseInt($(this).data('rating'))) {
                return $(this).removeClass('fa-star-o').addClass('fa-star');
            } 
            else {
                return $(this).removeClass('fa-star').addClass('fa-star-o');
            }
        });
    };

    $star_rating_modify.on('mouseenter', function() {
        $star_rating_modify.siblings('input.rating-value-modify').val($(this).data('rating'));
        switch($(this).data('rating')){
            case 1:
                $level_rating_modify = " - Very Bad!";
                $level_rating_color_modify = "red";
                break;
            case 2:
                $level_rating_modify = " - Bad!";
                $level_rating_color_modify = "orange";
                break;
            case 3:
                $level_rating_modify = " - OK!";
                $level_rating_color_modify = "darkmagenta";
                break;
            case 4:
                $level_rating_modify = " - Good!";
                $level_rating_color_modify = "blue";
                break;
            case 5:
                $level_rating_modify = " - Very Good!";
                $level_rating_color_modify = "limegreen";
                break;
        }
        $('.level-rating-modify').html($level_rating_modify).css("color", $level_rating_color_modify);
        return SetRatingStarModify();
    });

    $('.level-rating-modify').html($level_rating_modify).css("color", $level_rating_color_modify);
    SetRatingStarModify();
    $reset_button_modify.on('click', function() {
        $star_rating_modify.siblings('input.rating-value-modify').val(4);
        SetRatingStarModify();
        $level_rating_modify = " - Good!";
        $level_rating_color_modify = "blue";
        $('.level-rating-modify').html($level_rating_modify).css("color", $level_rating_color_modify);
    });
})(jQuery);

function SetContentModify(username, fname, lname, lvcontent, lvcolor, rating, avatar, content, item, date){
    $('#username').html(username);
    $('#fname').html(fname);
    $('#lname').html(lname);
    $('#avatar').attr('src', '/tmdt_201/' + avatar);
    $('#modify-comment').val(content);
    $('.star-rating-modify input.username-value-modify').val(username);
    $('.star-rating-modify input.rating-value-modify').val(rating);
    $('.star-rating-modify input.item-value-modify').val(item);
    $('.star-rating-modify input.date-value-modify').val(date);
    $('.star-rating-modify span.level-rating-modify').text(lvcontent).css('color', lvcolor);
    $('.star-rating-modify span#r-1').removeClass('fa-star').addClass('fa-star-o');
    $('.star-rating-modify span#r-2').removeClass('fa-star').addClass('fa-star-o');
    $('.star-rating-modify span#r-3').removeClass('fa-star').addClass('fa-star-o');
    $('.star-rating-modify span#r-4').removeClass('fa-star').addClass('fa-star-o');
    $('.star-rating-modify span#r-5').removeClass('fa-star').addClass('fa-star-o');
    if(rating > 0){
        $('.star-rating-modify span#r-1').removeClass('fa-star-o').addClass('fa-star');
    }
    if(rating > 1){
        $('.star-rating-modify span#r-2').removeClass('fa-star-o').addClass('fa-star');
    }
    if(rating > 2){
        $('.star-rating-modify span#r-3').removeClass('fa-star-o').addClass('fa-star');
    }
    if(rating > 3){
        $('.star-rating-modify span#r-4').removeClass('fa-star-o').addClass('fa-star');
    }
    if(rating > 4){
        $('.star-rating-modify span#r-5').removeClass('fa-star-o').addClass('fa-star');
    }
}

function SetContentDelete(username, item, date){
    $('#username-value-delete').val(username);
    $('#item-value-delete').val(item);
    $('#date-value-delete').val(date);
}

function setCookie(cname, cvalue, exdays) {
    var expires = "expires="+ exdays;
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function deleteCookie(id_item, username) {
    var cname = "selected-" + id_item;
    document.cookie = cname + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/";
    var cookie = document.cookie;
    var sum = (cookie.match(/selected-/g) || []).length;
    setCookie('sum', sum, getCookie('expires'));
    location.reload();
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function checkCookie(cname) {
    var value = getCookie(cname);
    if (value != "") {
        return true;
    } 
    else {
        return false;
    }
}

function SetCart(id_item){
    var cvalue = $('.pro-qty .text-input').filter('#'+id_item).val();
    if(cvalue === undefined){
        if(checkCookie('selected-' + id_item)){
            cvalue = getCookie('selected-' + id_item);
        }
        else{
            cvalue = 1;
        }
    }
    if(checkCookie(id_item) == false){
        var cname = "selected-" + id_item;
        if(checkCookie('sum') == false){
            var d = new Date();
            var exdays = 1;
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = d.toUTCString();
            setCookie('expires', expires, expires);
            setCookie(cname, cvalue, expires);
            var cookie = document.cookie;
            var sum = (cookie.match(/selected-/g) || []).length;
            setCookie('sum', sum, expires);
        }
        else{
            setCookie(cname, cvalue, getCookie('expires'));
            var cookie = document.cookie;
            var sum = (cookie.match(/selected-/g) || []).length;
            setCookie('sum', sum, getCookie('expires'));
        }
    }
    $('.selected-product').html(getCookie('sum'));
    var total = 0;
    var price_item = parseInt($('.price-item').filter('#' + id_item).text().trim().slice(0, -2).replace(',',''));
    var quantity_item = $('.quantity-item').filter('#' + id_item);
    var total_items = $('.total-item');
    quantity_item.html(cvalue.toString());
    total_items.filter('#' + id_item).html((price_item * cvalue).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' <u style="font-weight: 400;">đ</u>');
    var i = 0;
    while(i < total_items.length){
        total = total + parseInt(total_items[i].textContent.trim().slice(0, -2).replace(',',''));
        i++;
    }
    $('.sub-total').html(total.toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' <u style="font-weight: 400;">đ</u>');
    $('.total').each(function(){
        $(this).html(total.toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' <u style="font-weight: 400;">đ</u>');
    });
    $('.selected.' + id_item).removeAttr("hidden");
}

function directToCreate(params){
    if(params == 'create'){
        location.href = '/tmdt_201/product/create';
    }
    else if(params == 'categories'){
        location.href = '/tmdt_201/product/categories';
    }
}

function directToLookUp(){
    location.href = '/tmdt_201/orders/done';
}

function directToOrders(){
    location.href = '/tmdt_201/orders';
}

function changeClick(val, id = null, name = null){
    if(val == 'create-category'){
        $('.form-category').removeAttr('hidden').attr('action', 'http://localhost/tmdt_201/product/categories/create'); 
        $('#name').removeAttr('disabled');
        $('#submit').val('Create category');
    }
    else if(val == 'cancel-create-category'){
        $('.form-category').attr('hidden', true).removeAttr('action'); 
        $('#name').attr('disabled', true);
    }
    else if(val == 'update-category'){
        $('.form-category').removeAttr('hidden').attr('action', 'http://localhost/tmdt_201/product/categories/update/' + id); 
        $('#name').removeAttr('disabled').val(name).after('<input type="hidden" name="current-id" value="' + id + '">');
        $('#submit').val('Update category');
    }
}

function convertDate(date){
    var year = date.substr(0, 4);
    var month = date.substr(5, 2);
    var day = date.substr(8, 2);
    return day + '/' + month + '/' + year;
}

function provinceChange(){
    $('.loading-ajax').removeClass('d-none');
    var value_option = $('#province option:selected').text().trim();
    $('#province-input').val(value_option);
    var province_id = $('#province').val();
    var weight_total = parseInt($('#weight-total').text().replace(',',''));
    $.post(
        'http://localhost/tmdt_201/ajax/province',
        {
            id: province_id,
            weight: weight_total
        },
        function(result, status){
            if(status == 'success'){
                result = JSON.parse(result);
                var district_list = result[0];
                var district_html_list = '';
                var ward_list = result[1];
                var ward_html_list = '';
                var shipping_fee = parseInt(result[2]);
                var expected_time = convertDate(result[3]);
                var sub_total = parseInt($('.sub-total').text().replace(',',''));
                $.each(district_list, function(index, value){
                    var district_id = value['DistrictID'];
                    var district_name = value['DistrictName'];
                    district_html_list += '<option value="' + district_id + '">' + district_name +'</option>'
                });
                $.each(ward_list, function(index, value){
                    var ward_code = value['WardCode'];
                    var ward_name = value['WardName'];
                    ward_html_list += '<option value="' + ward_code + '">' + ward_name +'</option>'
                });
                $('#district').html(district_html_list);
                $('#ward').html(ward_html_list);
                value_option = $('#district option:selected').text().trim();
                $('#district-input').val(value_option);
                value_option = $('#ward option:selected').text().trim();
                $('#ward-input').val(value_option);
                $('.shipping-fee').html('+ ' + shipping_fee.toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' <u style="font-weight: 400;">đ</u>');
                if(sub_total >= 290000){
                    shipping_fee = 0;
                }
                $('.total').html((sub_total + shipping_fee).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' <u style="font-weight: 400;">đ</u>');
                $('.expected-time').html(expected_time);
                $('#expected-input').val(expected_time);
                $('.loading-ajax').addClass('d-none');
            }
        },
        'html'
    );
}

function districtChange(){
    $('.loading-ajax').removeClass('d-none');
    var value_option = $('#district option:selected').text().trim();
    $('#district-input').val(value_option);
    var district_id = $('#district').val();
    var weight_total = parseInt($('#weight-total').text().replace(',',''));
    $.post(
        'http://localhost/tmdt_201/ajax/district',
        {
            id: district_id,
            weight: weight_total
        },
        function(result, status){
            if(status == 'success'){
                result = JSON.parse(result);
                var ward_list = result[0];
                var ward_html_list = '';
                var shipping_fee = parseInt(result[1]);
                var expected_time = convertDate(result[2]);
                var sub_total = parseInt($('.sub-total').text().replace(',',''));
                $.each(ward_list, function(index, value){
                    var ward_code = value['WardCode'];
                    var ward_name = value['WardName'];
                    ward_html_list += '<option value="' + ward_code + '">' + ward_name +'</option>'
                });
                $('#ward').html(ward_html_list);
                value_option = $('#ward option:selected').text().trim();
                $('#ward-input').val(value_option);
                $('.shipping-fee').html('+ ' + shipping_fee.toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' <u style="font-weight: 400;">đ</u>');
                if(sub_total >= 290000){
                    shipping_fee = 0;
                }
                $('.total').html((sub_total + shipping_fee).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' <u style="font-weight: 400;">đ</u>');
                $('.expected-time').html(expected_time);
                $('#expected-input').val(expected_time);
                $('.loading-ajax').addClass('d-none');
            }
        },
        'html'
    );
}

function wardChange(){
    $('.loading-ajax').removeClass('d-none');
    var value_option = $('#ward option:selected').text().trim();
    $('#ward-input').val(value_option);
    var district_id = $('#district').val();
    var ward_id = $('#ward').val();
    var weight_total = parseInt($('#weight-total').text().replace(',',''));
    $.post(
        'http://localhost/tmdt_201/ajax/ward',
        {
            district_id: district_id,
            ward_id: ward_id,
            weight: weight_total
        },
        function(result, status){
            if(status == 'success'){
                result = JSON.parse(result);
                var shipping_fee = parseInt(result[0]);
                var expected_time = convertDate(result[1]);
                var sub_total = parseInt($('.sub-total').text().replace(',',''));
                $('.shipping-fee').html('+ ' + shipping_fee.toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' <u style="font-weight: 400;">đ</u>');
                if(sub_total >= 290000){
                    shipping_fee = 0;
                }
                $('.total').html((sub_total + shipping_fee).toFixed(0).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") + ' <u style="font-weight: 400;">đ</u>');
                $('.expected-time').html(expected_time);
                $('#expected-input').val(expected_time);
                $('.loading-ajax').addClass('d-none');
            }
        },
        'html'
    );
}

$('input:radio[name="payment"]').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == 'vnpay') {
            $('.payment-vnpay').removeClass('d-none');
        }
        else{
            $('.payment-vnpay').addClass('d-none');
        }
});

function changeStatusOrder(status, id, style){
    var btn = $('#' + id);
    var spinner = $('#spinner-' + id).removeClass('d-none');
    btn.addClass('d-none')
    spinner.removeClass('d-none');
    var expected_status = '';
    switch(status){
        case 'Not Confirmed':
            expected_status = 'Processing';
            break;
        case 'Processing':
            expected_status = 'Delivering';
            break;
        case 'Delivering':
            expected_status = 'Delivered';
            break;
        case 'Requesting Return':
            expected_status = 'Returning';
            break;
        default:
            expected_status = 'Returned';
            break;
    }
    $.post(
        'http://localhost/tmdt_201/orders/change_status_order',
        {
            id: id,
            expected_status: expected_status
        },
        function(result, status){
            if(status == 'success'){
                if(result.content == 'delivered'){
                    $('#tr-' + id).remove();
                }
                else{
                    spinner.addClass('d-none');
                    var func = "changeStatusOrder('" + expected_status + "', '" + id + "', '" + result.style + "')";
                    btn.removeClass('d-none').attr('onclick', func);
                    btn.html(result.content).removeClass(style).addClass(result.style);
                    $('#dataTable').DataTable().draw();
                }
            }
        },
        'json'
    );
}

$('input:radio[name="reason"]').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == 'other-reason') {
            $('#other-reason').removeClass('d-none');
        }
        else{
            $('#other-reason').addClass('d-none');
        }
});

function changeToRequesting(id){
    $('#confirm-btn').addClass('d-none');
    $('#spinner').removeClass('d-none');
    var reason = $('input:radio[name="reason"]:checked').val();
    if(reason == 'other-reason'){
        reason = $('#other-reason-content').val().trim();
    }

    $.post(
        'http://localhost/tmdt_201/orders/change_requesting_order',
        {
            id: id,
            reason: reason
        },
        function(result, status){
            if(status == 'success'){
                $('#status-order').html(result.status);
                $('#ajax-return').html('<i class="fa fa-info-circle"></i> ' + result.res).addClass('text-danger');
                $('#date-request').html(result.date);
                $('#return-modal').modal('toggle');
            }
        },
        'json'
    );
}

function showPreview(instance, container, image){
    const file = instance.files[0]; 
    if (file) { 
        let reader = new FileReader(); 
        reader.onload = function (event) { 
            $("#" + image).attr("src", event.target.result); 
            $('#' + container).removeClass('d-none');
        }; 
        reader.readAsDataURL(file); 
    }
    else{
        $('#' + container).addClass('d-none');
        $("#" + image).attr("src", "#");
    }
}