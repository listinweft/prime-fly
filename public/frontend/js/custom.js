$(document).ready(function () {
    var urlLastSegment = window.location.pathname.split("/").pop();
    $(".my-rating-readonly").starRating({
        totalStars: 5,
        starShape: 'rounded',
        starSize: 15,
        emptyColor: 'lightgray',
        hoverColor: '#F3DB01',
        activeColor: '#F3DB01',
        useGradient: false,
        readOnly: true,
    });

    $(".my-rating").starRating({
        totalStars: 5,
        starSize: 20,
        emptyColor: 'lightgray',
        hoverColor: '#F3DB01',
        activeColor: 'lightgray',
        useGradient: false,
        disableAfterRate: false,
        ratedColor: '#F3DB01',
        emptyColor: 'lightgray',
        useFullStars: true,
        callback: function (currentRating, $el) {
            $('.rating').val(currentRating);
          console.log('DOM element ', $el);
        }
    });

    $('.rtl-slider').slick({
        slidesToShow: 1, slidesToScroll: 1, arrows: false, fade: true, asNavFor: '.rtl-slider-nav'
    });
    $('.rtl-slider-nav').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        vertical: true,
        asNavFor: '.rtl-slider',
        centerMode: false,
        focusOnSelect: true,
        prevArrow: ".thumb-prev",
        nextArrow: ".thumb-next",
    });

    $('.navigation-link').on('mouseover',function(){
        $(this).css({'cursor':'pointer'});
    });

    $('.navigation-link').on('click',function(){
        var link = $(this).data('url');
        var type = $(this).data('type');
        window.location.href=base_url+'/'+type+'/'+link;
    });

    $(document).mouseup(function(e)
    {
        var container = $("#product-main-search");

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0)
        {
            $('.results').hide();
        }
    });

    $(document).on('keyup','#product-main-search',function(){
        var search_param = $(this).val();
        var _token = token;
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{search_param:search_param,_token:_token},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url+'/main-product-search',
            success:function(response){
                if(response.status==true){
                    var resp = response.message;
                    var len = response.message.length;
                    if(len>0){
                        $('#search-result-append-here').html('');
                        for( var i = 0; i<len; i++){
                            var id = resp[i]['id'];
                            var title = resp[i]['title'];
                            var price = resp[i]['price'];
                            var image = resp[i]['image'];
                            var link = resp[i]['link'];
                            var result =    "<li><a href="+link+" class='flxBx'>"
                                +"<div class='row flxBx'><div class='col-md-3 imgBx'><img src='"+image+"' alt=''></div>"
                                +"<div class='col-md-9 txtBx'>"
                                +"<div class='name'>"+title+"</div>"
                                +"<div class='price'>"+price+"</div>"
                                +"</div></div>"
                                +"</a></li>";
                            $('#search-result-append-here').append(result);
                            $('#Header .FlexRow .rit_bx .search-box .search-input:focus ~ .results').css({'height':'auto'});
                        }
                        $('.results').show();
                    }else{
                        var result =    "<li class='disableClick'>"
                            +"<div class='flxBx'>"
                            +"<div class='txtBx'>"
                            +"<div class='name'>No Results Found</div>"
                            +"</div></div>"
                            +"</li>";
                        $('#search-result-append-here').html(result);
                        $('#Header .FlexRow .rit_bx .search-box .search-input:focus ~ .results').css({'height':'0px'});
                    }
                }else{
                    $.notify('Error while retrieving the filter results', 'error');
                }
            }
        });
    });

    $(document).on('keyup','#product-main-search-mobile',function(){
        var search_param = $(this).val();
        var _token = token;
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{search_param:search_param,_token:_token},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url+'/main-product-search',
            success:function(response){
                if(response.status==true){
                    var resp = response.message;
                    var len = response.message.length;
                    if(len>0){
                        $('#search-result-append-here-mobile').html('');
                        for( var i = 0; i<len; i++){
                            var id = resp[i]['id'];
                            var title = resp[i]['title'];
                            var price = resp[i]['price'];
                            var image = resp[i]['image'];
                            var link = resp[i]['link'];
                            var result =    "<li><a href="+link+" class='flxBx'>"
                                +"<div class='flxBx'><div class='imgBx'><img src='"+image+"' alt=''></div>"
                                +"<div class='txtBx'>"
                                +"<div class='name'>"+title+"</div>"
                                +"<div class='price'>"+price+"</div>"
                                +"</div></div>"
                                +"</a></li>";
                            $('#search-result-append-here-mobile').append(result);
                            $('#Header .FlexRow .rit_bx .search-box .search-input:focus ~ .results').css({'height':'auto'});
                        }
                        $('.results').show();
                    }else{
                        var result =    "<li class='disableClick'>"
                            +"<div class='flxBx'>"
                            +"<div class='txtBx'>"
                            +"<div class='name'>No Results Found</div>"
                            +"</div></div>"
                            +"</li>";
                        $('#search-result-append-here-mobile').html(result);
                        $('#Header .FlexRow .rit_bx .search-box .search-input:focus ~ .results').css({'height':'0px'});
                    }
                }else{
                    $.notify('Error while retrieving the filter results', 'error');
                }
            }
        });
    });

    $('#dropDown').click(function () {
        $('.drop-down').toggleClass('drop-down--active');
    });

    $(document).on('change', '.lang-change', function () {
        var language = $(this).find(':selected').data('lang');
        var language_code = $(this).find(':selected').data('lang_code');
        $.ajax({
            type: 'POST', dataType: 'json', data: {language, language_code}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/set-language', success: function (response) {
                if (response.status === true) {
                    swal({
                        title: "Done it!", text: response.message, type: "success"
                    }, function () {
                        window.location.reload();
                    });
                } else {
                    swal({title: "Error", text: 'Can\'t change the language', type: "error"});
                }
            }
        });
    });

    $(document).on('click','.tabLink',function(){
        var tab = $(this).data('tab');
        if(tab=="wishlist"){
            $('#latestProductsList').show();
        }else{
            $('#latestProductsList').hide();
        }
    });
    $(document).on('click', '.product-review-form-btn', function (e) {
        e.preventDefault();

        var required = [];
        $('.product-review-required').each(function () {
            var id = $(this).attr('id');
            console.log($('#' + id).val());
            var id_text = $(this).attr('placeholder');
            if ($('#' + id).val() == '') {
                required.push($('#' + id).val());
                $('#' + id).css({'border': '1px solid #FF0000'});
                //add d-none class to error div
                $('.' + id ).removeClass('d-none');
            } else {
                $('#' + id).css({'border': '1px solid #d0d0d0'});
            }
        });
        console.log(required.length);
        if (required.length == 0) {
            if ($('#email').length > 0) {
                var email = $('#email').val();
            } else {
                var email = 'review@elitco.com';
            }
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                $('#email_error').css({'border': '1px solid #FF0000'});
            } else {
                $('.with-errors').html('');
                $.ajax({
                    type: 'POST', dataType: 'json', data: $('.product-review-form').serialize(), headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }, url: base_url + '/submit-review', success: function (response) {
                        if (response.status == "true") {
                            swal({
                                title: "Done it!", text: response.message, type: "success"
                            }, function () {
                                window.location.reload();
                            });
                        } else if (response.status == "error") {
                            $('#email_error').html('Please enter a valid email ID').css({'border-color': '1px solid #FF0000'});
                        } else {
                            swal({
                                title: response.status, text: response.message, type: response.status
                            });
                        }
                    }
                });
            }
        }
    });


    $(document).on('click', '#review-form-btn', function (e) {
        e.preventDefault();

        var required = [];
        $('.review-required').each(function () {
            var id = $(this).attr('id');
            console.log(id);
            var id_text = $(this).attr('placeholder');
            if ($('#' + id).val() == '') {
                required.push($('#' + id).val());
                $('#' + id).css({'border': '1px solid #FF0000'});
            } else {
                $('#' + id).css({'border': '1px solid #d0d0d0'});
            }
        });
        console.log(required);
        if (required.length == 0) {
            if ($('#email').length > 0) {
                var email = $('#email').val();
            } else {
                var email = 'review@elitco.com';
            }
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                $('#email_error').css({'border': '1px solid #FF0000'});
            } else {
                $('.with-errors').html('');
                $.ajax({
                    type: 'POST', dataType: 'json', data: $('#review-form').serialize(), headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }, url: base_url + '/submit-review', success: function (response) {
                        if (response.status == "true") {
                            swal({
                                title: "Done it!", text: response.message, type: "success"
                            }, function () {
                                window.location.reload();
                            });
                        } else if (response.status == "error") {
                            $('#email_error').html('Please enter a valid email ID').css({'border-color': '1px solid #FF0000'});
                        } else {
                            swal({
                                title: response.status, text: response.message, type: response.status
                            });
                        }
                    }
                });
            }
        }
    });


    $(document).on('click', '.currency-selection', function () {
        var currency = $(this).data('id');
        var _token = token;
        $.ajax({
            type: 'POST', dataType: 'json', data: {currency: currency, _token: _token}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/currency_set', success: function (response) {
                if (response.status == true) {
                    swal({
                        title: "Done it!", text: response.message, type: "success"
                    }, function () {
                        window.location.reload();
                    });
                } else {
                    swal({
                        title: "Error", text: response.message, type: "error"
                    });
                }
            }
        });
    });

    $(document).on('click', '.contact_form_btn', function (e) {
        e.preventDefault();
        var buttonText = $(this).html();
        var url = $(this).data('url');
        var form_id = $(this).closest("form").attr('id');
        var modal_id = $(this).closest(".modal").attr('id');
        var formData = new FormData(document.getElementById(form_id));
        var errors = false;
        $('form input, form textarea').removeClass('is-invalid is-valid');
        $('span.error').remove();
        $("#" + form_id + " .required").each(function (k, v) {
            var field_name = $(v).attr('name');
            if (!$(v).val().length) {
                errors = true;
                var error = 'Please enter <strong>' + field_name + '</strong>.';
                var msg = '<span class="error invalid-feedback " style="color: red" for="' + field_name + '">' + error + '</span>';
                $('#' + form_id).find('input[name="' + field_name + '"], textarea[name="' + field_name + '"]')
                    .removeClass('is-valid').addClass('is-invalid').attr("aria-invalid", "true").after(msg);
            } else {
                if (field_name === 'email') {
                    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (!regex.test($(v).val())) {
                        errors = true;
                        msg = '<span class="error invalid-feedback " style="color: red" for="email">Please enter a valid email address</span>';
                        $('#' + form_id).find('input[name="' + field_name + '"]')
                            .removeClass('is-valid').addClass('is-invalid').attr("aria-invalid", "true").after(msg);
                    }
                }
            }
        });
        if (!errors) {
            $('.contact_form_btn').html(waitText);
            $.ajax({
                type: 'POST',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: base_url + url,
            })
                .done(function (response) {
                    $('.contact_form_btn').html(buttonText);
                    if (response.status === "success") {
                        $("#" + form_id)[0].reset();
                        if (modal_id) {
                            $("#" + modal_id).hide();
                        }
                        swal({title: "Done it!", text: response.message, type: response.status}, function () {
                            location.reload();
                        });
                    } else if (response.status == "login-success") {
                        swal({
                            title: "Success!", text: response.message, type: 'success'
                        }, function () {
                            $("#" + form_id)[0].reset();
                            location.reload();
                        });
                    } else {
                        swal({
                            title: response.status, text: response.message, type: response.status
                        });
                    }
                })
                .fail(function (response) {
                    $('.contact_form_btn').html(buttonText);
                    $.each(response.responseJSON.errors, function (field_name, error) {
                        var msg = '<span class="error invalid-feedback" for="' + field_name + '">' + error + '</span>';
                        $("#" + form_id).find('input[name="' + field_name + '"], select[name="' + field_name + '"], textarea[name="' + field_name + '"]')
                            .removeClass('is-valid').addClass('is-invalid').attr("aria-invalid", "true").after(msg);
                    });
                })
        }
    });

    $(document).on('click', '.apply_job', function () {
        var id = $(this).data('id');
        $('#job_id').val(id);
    });

    $('#proceed_to_checkout').on('click', function () {
        window.location.href = base_url + '/checkout';
    });

    $(document).on('click', '.service_enquiry_btn', function () {
        var id = $(this).data('id');
        $('#service_id').val(id);
    });

    $(document).on('click', '#change_password_btn', function () {
        if ($('#editPro').css('display') === 'block') {
            $(this).html(editProfile);
            $('#editPro').css('display', 'none');
            $('#editPass').css('display', 'block');
        } else {
            $(this).html(changePassword);
            $('#editPro').css('display', 'block');
            $('#editPass').css('display', 'none');
        }
    });

    $(document).on('change', '#country', function () {
        var country_id = $(this).val();
        if (country_id) {
            $.ajax({
                type: 'POST', dataType: 'json', url: base_url + '/customer/state-list/', data: {country_id}, headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, success: function (data) {
                    if (data.status == 'error') {
                        swal.fire('Error !', data.message, 'error');
                    } else {
                        var resp = data.message;
                        var len = resp.length;
                        $("#state").empty().append("<option value=''>Select State</option>")
                        for (var i = 0; i < len; i++) {
                            $("#state").append("<option value='" + resp[i]['id'] + "'>" + resp[i]['state_en'] + "</option>");
                        }
                    }
                }
            })
        }
    });

    /****************** cart action *************************/

    $(document).on('click', '.wishlist-action', function () {
        var id = $(this).data('id');
        var _token = token;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {product_id: id, _token: _token},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url + '/add-wishlist',
            success: function (response) {
                if (response.status == true) {
                    if (response.responseStatus == true) {
                        $('#wishlist_check_' + id).prop('checked', false);
                        if ($('#wishlistBox' + id).length > 0) {
                            $('#wishlistBox' + id).remove();
                        }
                    } else {
                        $('#wishlist_check_' + id).prop('checked', true);
                    }
                    $('.wishlistCount').html(response.count);
                    $('.cartCount').html(response.cartCount);
                    if ($('#cartBox' + id).length > 0) {
                        $('#cartBox' + id).remove();
                    }
                    if (method == "cart" && response.cartCount == 0) {
                        swal({
                            title: 'success',
                            text: response.message,
                            type: 'success'
                        }, function () {
                            window.location.reload();
                        });
                    } else {
                        swal({
                            title: 'success',
                            text: response.message,
                            type: 'success'
                        });
                    }
                } else {
                    swal({
                        title: "Oops",
                        text: response.message,
                        type: "error"
                    });
                }
            }
        });
    });

    $('.size').on('click', function () {


    });
    $(document).on('click', '.cart-action', function () {
   // take value of active size class
        var size = $('.size.active').data('id');
        var type_id   = $('.size.active').data('product_type_id');
        var frame_id = $('.frame.active').data('id');
        var mount = $('.mount.active').data('mount');
        var checkout = $(this).data('checkout');
        var cartText = $('.cart-action-span').html();
        var id = $(this).data('id');
        var qty = $('.qty').val();
        var cartText = $('.cart-action-span').html();
        if ($(this).data('relative') == undefined) {
            var countRelative = 1;
        } else {
            var countRelative = 0;
        }
        var attrArray = [];
        $('.attrSelect').each(function () {
            var attrId = $(this).val();
            var attrLabel = $(this).data('label');
            var combined = attrLabel+' : '+attrId;
            attrArray.push(combined);
        });
        var attributeList = attrArray.join(",");
        $('.cart-action-span').html('Loading..');

        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: { size : size, type_id: type_id, product_id: id,qty: qty, countRelative: countRelative,attributeList:attributeList,
                frame_id:frame_id,mount:mount,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url + '/add-cart',
            success: function (response) {
                $('.cart-action-span').html(cartText);
                $('.cart-count').html(response.count);
                if (response.status == true) {
                    if (checkout == 1) {
                        window.location.href = base_url + '/checkout';
                    } else {

                        $('.count').html(response.count);
                        $('.cartCount').html(response.count);
                        $('.cartTotal').html(response.cartTotal);
                        if (/[,\-]/.test(id)) {

                            var idArray = id.split(',');
                            var i;
                            for (i = 0; i < idArray.length; ++i) {
                                $('#addoncheck' + idArray[i]).prop('disabled', true);
                                $('#wishlist_check_' + idArray[i]).removeClass('fill');
                                $('#wishlistBox_' + idArray[i]).remove();
                            }
                        } else {

                            $('#wishlist_check_' + id).removeClass('fill');
                            $('#wishlistBox_' + id).remove();
                        }
                        Toast.fire({
                            title: "Done it", text: response.message, icon: "success"
                        });

                        if (urlLastSegment == "cart" || urlLastSegment == "checkout" || urlLastSegment == "profile" || urlLastSegment == "wishlist") {
                            location.reload();
                        }
                    }
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    swal.fire({
                        title: "Oops", text: response.message, icon: "error"
                    });
                }
            }
        });
    });

    $(document).on('click', '.remove-cart-item', function () {
        var id = $(this).data('id');
        
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {cart_id: id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url + '/remove-cart-item',
            success: function (response) {
                if (response.status == true) {
                    swal.fire({
                        text: response.message,
                        type: "success"
                    });
                    setTimeout(() => {
                        location.reload();
                    }, 900);
                } else {
                    $.notify(response.message, "error");
                }
            }
        });
    });

    $(document).on('click', '.login-popup', function () {
        var id = $(this).data('id');
        swal({
            title: "Oops",
            text: 'Please login for wishlisting a product',
            type: "error"
        }, function () {
            $('#wishlist_check_' + id).prop('checked', false);
        });

    });

    $(document).on('change', '.cartQuantity', function () {
        var id = $(this).data('id');
        var qty = $(this).val();
        var _token = token;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {product_id: id, _token: _token, qty: qty},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url + '/update-item-quantity',
            success: function (response) {
                if (response.status == true) {
                    swal({
                        title: "Done it!",
                        text: response.message,
                        type: "success"
                    }, function () {
                        window.location.reload();
                    });
                } else {
                    $.notify(response.message, "error");
                }
            }
        });
    });

    $(document).on('click','.deliver',function(e){
        e.preventDefault();
        var id = $(this).data('id');
        var remarks = $('#exampleFormControlTextarea1').val();
        var _token = token;
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{address_id:id,_token:_token,remarks:remarks},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url+'/select-customer-address',
            success:function(response){
                if(response.status==true){
                    swal({
                        title: "Done it!",
                        text: 'Customer addrress selected succesfully',
                        type: "success"
                    }, function() {
                        window.location.reload();
                    });
                }else{
                    $.notify(response.message, "error");
                }
            }
        });
    });

    $(document).on('click','#confirm_payment',function(){
        if($('#terms-condition').prop('checked')==true){
            $('#confirm-order-error').html('');
            if($('.payment_method').val()=="cod"){
                $('.order-submit-loader').show();
                var _token = token;
                $.ajax({
                    type:'POST',
                    dataType:'json',
                    data:{_token:_token},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url+'/submit-order-by-cod',
                    success:function(response){
                        $('.order-submit-loader').hide();
                        if(response.status==true){
                            swal({
                                title: "Done it!",
                                text: response.message,
                                type: "success"
                            }, function() {
                                $('#submit-loader').hide();
                                window.location.href = base_url+'/response/'+response.data;
                            });
                        }else{
                            $.notify(response.message, "error");
                        }
                    }
                });
            }else{
                alert('online payment');
            }
        }else{
            $('#confirm-order-error').html('Please accept the terms & condition').css({'color':'red'});
        }
    });
    $(document).on('click', '.form_submit_btn', function (e) {

        e.preventDefault();
        $this = $(this);
        var buttonText = $this.html();
        var url = $this.data('url');
        var form_id = $this.closest("form").attr('id');

        var modal_id = $this.closest(".modal").attr('id');
        var formData = new FormData(document.getElementById(form_id));

        var errors = false;
        $('form input, form textarea').removeClass('is-invalid is-valid');
        $('span.error').remove();
        $("#" + form_id + " .required").each(function (k, v) {
            var field_name = $(v).attr('name');


            if (!$(v).val().length) {
                errors = true;
                var error = 'Please enter <strong>' + field_name + '</strong>.';
                var msg = '<span class="error invalid-feedback invalidMessage" style="color: red" for="' + field_name + '">' + error + '</span>';


                $('#' + form_id).find('input[name="' + field_name + '"], textarea[name="' + field_name + '"], select[name="' + field_name + '"]')
                    .removeClass('is-valid').addClass('is-invalid').attr("aria-invalid", "true").after(msg);


            } else {
                if (field_name === 'email') {
                    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (!regex.test($(v).val())) {
                        errors = true;
                        msg = '<span class="error invalid-feedback invalidMessage" style="color: red" for="email">Please enter a valid email address</span>';
                        $('#' + form_id).find('input[name="' + field_name + '"]')
                            .removeClass('is-valid').addClass('is-invalid').attr("aria-invalid", "true").after(msg);
                    }
                }
            }
        });
        if (!errors) {
            $this.html('Please Wait..');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: base_url + url,


            })
                .done(function (response) {


                    console.log(response);
                    $this.html(buttonText);
                    $("#" + form_id)[0].reset();
                    if (modal_id) {
                        $("#" + modal_id).modal('hide');
                    }
                    if (response.status == "success") {
                        Toast.fire({title: "Done it!", text: response.message, icon: response.status});
                    } else if (response.status == "success-reload") {
                        Toast.fire({
                            title: "Success!", text: response.message, icon: "success"
                        });
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        } else {
                           setTimeout(() => {
                            location.reload();
                           }, 1000);
                        }
                    } else {
                        swal.fire({
                            title: response.status, text: response.message, icon: response.status
                        });
                    }
                })
                .fail(function (response) {
                    $this.html(buttonText);
                    $.each(response.responseJSON.errors, function (field_name, error) {
                        var msg = '<span class="error invalid-feedback invalidMessage" for="' + field_name + '">' + error + '</span>';
                        $("#" + form_id).find('input[name="' + field_name + '"], select[name="' + field_name + '"], textarea[name="' + field_name + '"]')
                            .removeClass('is-valid').addClass('is-invalid').attr("aria-invalid", "true").after(msg);
                    });
                })
        }
    });

    $(document).on('click', '.review-form-btn', function (e) {
        e.preventDefault();
        // var _token = token;
        var required = [];
        $('form input, form textarea').removeClass('is-invalid is-valid');
        $('span.error').remove();

        $('.review-required').each(function () {
            var id = $(this).attr('id');
            var id_text = $(this).attr('placeholder');
            if ($('#' + id).val() == '') {
                required.push($('#' + id).val());
                $('#' + id).css({'border-bottom': '1px solid #FF0000'});
            } else {
                $('#' + id).css({'border-bottom': '1px solid #d0d0d0'});
            }
        });


        $(".review-required").each(function (k, v) {
            var field_name = $(v).attr('name');
            if (!$(v).val().length) {
                errors = true;
                var error = 'Please enter <strong>' + field_name + '</strong>.';
                var msg = '<span class="error invalid-feedback invalidMessage" style="color: red" for="' + field_name + '">' + error + '</span>';
                $('#reviewForm').find('input[name="' + field_name + '"], textarea[name="' + field_name + '"], select[name="' + field_name + '"]')
                    .removeClass('is-valid').addClass('is-invalid').attr("aria-invalid", "true").after(msg);
            } else {
                if (field_name === 'email') {
                    var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    if (!regex.test($(v).val())) {
                        errors = true;
                        msg = '<span class="error invalid-feedback" style="color: red" for="email">Please enter a valid email address</span>';
                        $('#' + form_id).find('input[name="' + field_name + '"]')
                            .removeClass('is-valid').addClass('is-invalid').attr("aria-invalid", "true").after(msg);
                    }
                }
            }
        });
        if (required.length == 0) {
            if ($('#email').length > 0) {
                var email = $('#email').val();
            } else {
                var email = 'review@artymist.com';
            }
            var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if (!regex.test(email)) {
                $('#email_error').css({'border': '1px solid #FF0000'});
            } else {
                $('.with-errors').html('');
                $.ajax({
                    type: 'POST', dataType: 'json', data: $('#reviewForm').serialize(), headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }, url: base_url + '/submit-review', success: function (response) {


                        if (response.status == "true") {
                            $("#reviewForm")[0].reset();
                            $("#reviewModal").modal('hide');
                            Toast.fire({
                                title: "Done it!", text: response.message, icon: "success"

                            });

                            //window.location.reload();
                        } else if (response.status == "error") {
                            $('#email_error').html('Please enter a valid email ID').css({'border-color': '1px solid #FF0000'});
                        } else {
                            Toast.fire({
                                title: response.status, text: response.message, icon: response.status
                            });
                        }
                    }
                });
            }
        }
    });
    /***************** cart action end **********************/

    $(window).scroll(function () {
        $(".load-more-button").each(function () {
            var WindowTop = $(window).scrollTop();
            var WindowBottom = WindowTop + $(window).height();
            var ElementTop = $(this).offset().top;
            var ElementBottom = ElementTop + $(this).height();

            if ((ElementBottom <= WindowBottom) && ElementTop >= WindowTop) {
                blogLoadMoreData();
            }
        });
    });

    function blogLoadMoreData() {
        var total_blogs = $('#totalBlogs').val();

        var offset = $('#blog_loading_offset').val();
        var loading_limit = $('#blog_loading_limit').val();

        var btnHtml = $('.load-more-product').html();
        $('.load-more-button').html('Please wait..!');
        $.ajax({
            type: 'POST', data: {total_blogs: total_blogs, offset: offset, loading_limit: loading_limit}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/blog-load-more', success: function (response) {
                if (response != 0) {
                    $('.appendHere_' + offset).after(response).remove();
                    $('.more-section-' + offset).remove();
                    $('.load-more-product').html(btnHtml);
                } else {
                    swal.fire({
                        title: 'Error', text: 'Some error occurred', icon: 'error'
                    });
                }
            }
        });
    }
    $(document).on('click', '#change-password-btn', function (e) {
        e.preventDefault();

        // var _token = token;
        var required = [];
        $('.password-required').each(function () {
            var id = $(this).attr('id');
            if ($('#' + id).val() == '') {
                required.push($('#' + id).val());
                $('#' + id).css({'border': '1px solid #FF0000'});
            } else {
                $('#' + id).css({'border': '1px solid #cdcdcd'});
            }
        });
        if (required.length == 0) {
            $('.with-errors').html('');
            var password = $('#new_password').val();


            var confirm_password = $('#confirm_password').val();

            $.ajax({
                type: 'POST', dataType: 'json',

                data: $('#change-password-form').serialize(), headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, url: base_url + '/customer/change-password',
            })
                .done(function (response) {
                    $('#change-password-form').val('Register');
                    if (response.status == "success") {
                        Toast.fire({
                            title: "", text: response.message, icon: "success"
                        })
                        location.reload();
                    } else if (response.status == "error") {
                        // $('#register_email_id_error').html('Please enter a valid email ID').css({'color':'#FF0000','font-size':'14px','font-weight':'700'});
                        Toast.fire('Error', response.message, "error");
                    } else if (response.errors) {
                        $('.alert-success').hide();
                        $('.alert-info').hide();
                        $('.alert-danger').show();
                        $('.alert-danger ul').html('');
                        for (var error in response.errors) {
                            $('.alert-danger').html(response.errors[error]);
                        }
                    }
                })
                .fail(function (response) {
                    // $(this).html(buttonText);
                    $.each(response.responseJSON.errors, function (field_name, error) {
                        var msg = '<span class="error invalid-feedback" for="' + field_name + '">' + error + '</span>';
                        $("#change-password-form").find('input[name="' + field_name + '"], select[name="' + field_name + '"], textarea[name="' + field_name + '"]')
                            .removeClass('is-valid').addClass('is-invalid').attr("aria-invalid", "true").after(msg);
                    });
                })
        }
    });

    $(document).on('click', '.address-form', function (e) {
        e.preventDefault();
        var id = $(this).data('id');


        $.ajax({
            type: 'POST', dataType: 'html', data: {id}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/customer/address-form', success: function (response) {
                if (response != '0') {

                    $('#my_address_add_form').html(response);
                    $('#my_address_list').addClass('d-none');
                    $('#my_address_add_form').removeClass('d-none');

                } else {
                    swal.fire({
                        title: "Error", text: "Error while load the form", icon: 'error'
                    });
                }
            }
        });
    });
    $(document).on('click', '.checkprice', function () {
        var id = $(this).data('id');

      //remove active class from all
        $('.checkprice').removeClass('active');
        //add active class to the selected
        $(this).addClass('active');
        var product_id = $(this).data('product_id');
        var product_type_id = $(this).data('product_type_id');
        $.ajax({
            type: 'POST', dataType: 'json', data: {id,product_id,product_type_id}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url : base_url+'/product/check-price', success: function (response) {

                if(response.offerPrice != null){
                    $('.offer_price').html(response.offerPrice);
                    $('.product_price').html(response.productPrice);
                }
                else{
                    $('.offer_price').html(response.productPrice);
                    $('.product_price').html('');
                }
                if (response != '0') {

                } else {
                    swal.fire({
                        title: "Error", text: "Error while load the form", icon: 'error'
                    });
                }
            }
        });
    });

    $(document).on('click', '#add_address_gos', function () {



        $('#my_address_add_form_')[0].reset();
        if ($('#my_address_list').css('display') === 'block') {
            $('#my_address_list').addClass('d-none');
            $('#my_address_add_form').removeClass('d-none');
        }
        else {
            $('#my_address_list').removeClass('d-none');
            $('#my_address_add_form').addClass('d-none');
        }
    });

    $(document).on('change', '#country', function (e) {

        e.preventDefault();
        var country_id = $(this).val();
        var form = $(this).closest("form");

        var form_id = form.attr('id');


        if (country_id) {
            $.ajax({
                type: 'POST', dataType: 'json', url: base_url + '/state-list', data: {country_id}, headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, success: function (data) {

                    if (data.status == 'error') {
                        swal.fire('Error !', data.message, 'error');
                    } else {
                       
                        var resp = data.message;
                        var len = resp.length;
                        $("#" + form_id + " #state").empty().append("<option value=''>Select Emirate</option>");
                        for (var i = 0; i < len; i++) {
                            $("#" + form_id + " #state").append("<option value='" + resp[i]['id'] + "'>" + resp[i]['title'] + "</option>");
                        }
                    }
                }
            })
        } else {
            $("#" + form_id + " #state").empty().append("<option value=''>Select Country First</option>");
        }
    });

    $(document).on('click', '.remove-address', function () {



        var address_id = $(this).data('id');
        swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            showConfirmButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: false,
            closeOnCancel: false
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST', dataType: 'json', headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }, url: base_url + '/customer/delete-address', data: {address_id}, success: function (data) {
                        if (data.status == 'error') {
                            swal.fire('Error !', data.message, 'error');
                        } else {
                            $('#address' + address_id).remove();
                            Toast.fire({
                                title: "Success", text: data.message, icon: "success"
                            });
                            setTimeout(() => {

                               //redirect url
                               window.location.href = base_url + '/customer/account/address';
                            }, 1000);
                        }
                    }
                });
            } else {
                Toast.fire("Cancelled", "Entry remain safe :)", "warning");
            }
        });
    });

    $(document).on('change', '#priceRangeMin, #priceRangeMax, #priceInputMin, #priceInputMax', function () {
        filterProducts();
    });

    // CLEAR
    $('.clear').on('click', function () {
        $(".filterItems .fltr").remove();
        $('.filterItem').prop('checked', false);
        if ($('#filterResult').html() == null || $('#filterResult').html() == '') {
            $('.filteredContents').hide();
        }
        Toast.fire("Done it!", 'Filter cleared', "success");
        window.location.reload();
    });


    // Single Clear Filtered
    $(document).on('click', '.clearFiltered', function () {
        var id = $(this).data('id');
        $(this).closest(".filterItems .fltr").remove();
        $('#' + id).prop('checked', false);
        if ($('#filterResult').html() == null || $('#filterResult').html() == '') {
            $('.filteredContents').hide();
        }
        filterProducts();
    });

    $('.filterItem').on('click', function () {

        $(this).closest('.colorItemFilterClick').toggleClass("active") ;
        $(this).closest('.shapeFilterClick').toggleClass("active") ;
        $(this).closest('.tagFilterClick').toggleClass("active") ;


       var parent = $(this).data('parent');





       if(parent != null){

              $('#Category_'+parent).prop('checked', true);
         }
         if($(this).prop('checked') == false){

                $('#Category_'+parent).prop('checked', false);
            }


        var label = $(this).data('label');
        var title = $(this).data('title');
        var id = $(this).val();
        if ($(this).prop('checked') == true) {
            $('.filteredContents').show();

            $('#filterResult').append('<div class="fltr" id="item' + id + '">' + ' <div class="txt">' + label + ': ' + title + '</div>' + '<button class="btn clearFiltered" data-id="' + label + '_' + id + '">' + '<i class="fa-solid fa-xmark"></i> </button> </div>');
        } else {
            $('#item' + id).remove();
            if ($('#filterResult').html() == null || $('#filterResult').html() == '' || parent != null) {
                $('.filteredContents').hide();
            }
        }
        filterProducts();
    });

    $(document).on('change', '#sort_order_drop', function () {
        $('#sort_value').val($(this).val());
        filterProducts();
    });

    function filterProducts() {
        var fields = [];
        $('.filterItem').each(function () {
            if ($(this).prop('checked') == true) {
                fields.push($(this).data('field'));
            }
        });
        $('#input_field').val($.unique(fields.sort()));
        $.ajax({
            type: 'POST', dataType: 'html', data: $('#filter-form').serialize(), headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/filter-product', success: function (response) {

                $('.productList').html(response);
                Toast.fire("Done it!", 'Filter Applied', "success");
            }
        });
    }

    function select2() {
        $('.select2').select2({
            theme: 'bootstrap4', minimumResultsForSearch: -1,
        });
    }

    $(document).mouseup(function (e) {
        var container = $("#main-search");

        // if the target of the click isn't the container nor a descendant of the container
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            $('.searchResult').hide();
            $('.searchResultMobile').hide();
        }
    });

    $(document).on('click', '#searchBtn', function (e) {
        e.preventDefault();
        var search_param = $('#main-search').val();
        if (search_param) {
            window.location.href = base_url + '/search/' + search_param;
        } else {
        }
    });

    $(document).on('keyup', '#main-search', function () {
        var search_param = $(this).val();
        desktopSearch(search_param);
    });

    function desktopSearch(search_param) {
        if (search_param) {
            $.ajax({
                type: 'POST', dataType: 'json', data: {search_param: search_param}, headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, url: base_url + '/main-search', success: function (response) {
                    if (response.status == true) {
                        var resp = response.message;
                        var len = response.message.length;
                        if (len > 0) {

                            $('#search-result-append-here').html('');
                            for (var i = 0; i < len; i++) {
                                var id = resp[i]['id'];
                                var title = resp[i]['title'];
                                var price = resp[i]['price'];
                                 var offer_price = resp[i]['offer_price'];
                                var image = resp[i]['image'];
                                var link = resp[i]['link'];
                                var result = "<li><a href=" + link + " class='flxBx'>" + "<div class='row flxBx'><div class='col-lg-2 col-md-3 col-4 imgBx'><img src='" + image + "' alt=''></div>" + "<div class='col-lg-10 col-md-9  col-8 txtBx' style='padding-left: 25px;'>" + "<div class='name'>" + title + "</div>";
                                if (offer_price != '') {
                                    result += "<div class='d-flex align-items-center'><div class='price'>" + offer_price + "</div>" + "<div class='fullPrice'>" + price + "</div></div>";
                                } else {
                                    result += "<div class='d-flex align-items-center'><div class='price'>" + price + "</div></div>";
                                }
                                result += "</div></div>" + "</a></li>";
                                $('#search-result-append-here').append(result);
                                $('#Header .FlexRow .rit_bx .search-box .search-input:focus ~ .searchResult').css({'height': 'auto'});
                            }
                            $('.searchResult').show();
                        } else {
                            var result = "<li class='disableClick'>" + "<div class='flxBx'>" + "<div class='txtBx'>" + "<div class='name'>No Results Found</div>" + "</div></div>" + "</li>";
                            $('#search-result-append-here').html(result);
                            $('#Header .FlexRow .rit_bx .search-box .search-input:focus ~ .searchResult').css({'height': '0px'});
                        }
                    } else {
                        Toast.fire('Error', 'Error while retrieving the search results', 'error');
                    }
                }
            });
        }
    }
    $(document).on('change', '.shipping-value-change', function (e) {

        $(document).find('span.invalid-feedback').text('fdd');
        e.preventDefault();
        var field_name = $(this).attr('name');
        var val = $(this).val();
        // var addressChoose=$('.addressChoose').val();
        var addressChoose = $('.addressChoose:checked').val();
        var reload = $(this).data('reload');
        // var _token = token;
        $.ajax({
            type: 'POST', dataType: 'json', data: $('#addShippingAddressForm').serialize(), headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/' + 'update-customer-shipping-address', beforeSend: function() {
                $(document).find('span.invalid-feedback').text('');
            },

        })

            .done(function (response) {
                if (addressChoose == 'same') {
                    if (field_name == 'country') {
                        $('#billing_' + field_name).val(val).change();
                    } else {
                        $('#billing_' + field_name).val(val);
                    }
                    if (field_name == 'state') {
                        $('#billing_' + field_name).val(val).change();
                    } else {
                        $('#billing_' + field_name).val(val);
                    }
                }
                if (response.status == "true" && response.reload == true) {
                    $('.error').addClass('d-none');
                    $('.shipping_charge').text(response.calculation_box.shippingAmount);
                    $('.tax_amount').text(response.calculation_box.tax_amount);
                    $('#grand_total_amount').val(response.calculation_box.final_total_with_tax);
                    $('.cart_final_total_span').text(response.calculation_box.final_total_with_tax);
                    Toast.fire('Success', response.message, 'success');
                    $('#confirm_payment').attr('disabled', false);
                    setTimeout(() => {
                        // window.location.reload();

                    }, 1500);
                }
            })


            .fail(function (response) {

                // $(this).html(buttonText);
                $.each(response.responseJSON.errors, function (field_name, error) {

                    var msg = '<span class="error invalid-feedback" for="' + field_name + '">' + error + '</span>';
                    $("#addShippingAddressForm").find('input[name="' + field_name + '"], select[name="' + field_name + '"], textarea[name="' + field_name + '"]')
                        .removeClass('is-valid').addClass('is-invalid').attr("aria-invalid", "true").after(msg);
                });
                if (addressChoose == 'same') {
                    // $('')
                    if (field_name == 'country') {
                        $('#billing_' + field_name).val(val).change();
                    } else {
                        $('#billing_' + field_name).val(val);
                    }
                }
            })
    });


});
