
(function ($) {
    "use strict";

    /*==================================================================
    [ Focus Contact2 ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })

    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
})(jQuery);

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