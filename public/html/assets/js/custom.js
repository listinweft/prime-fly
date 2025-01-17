$(document).ready(function () {

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
            $('#rating').val(currentRating);
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
                        title: "", text: response.message, type: "success"
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

    $(document).on('click', '#review-form-btn', function (e) {
        e.preventDefault();
        var _token = token;
        var required = [];
        $('.review-required').each(function () {
            var id = $(this).attr('id');
            var id_text = $(this).attr('placeholder');
            if ($('#' + id).val() == '') {
                required.push($('#' + id).val());
                $('#' + id).css({'border': '1px solid #FF0000'});
            } else {
                $('#' + id).css({'border': '1px solid #d0d0d0'});
            }
        });
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
                                title: "", text: response.message, type: "success"
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
                        title: "", text: response.message, type: "success"
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
                var msg = '<span class="error invalid-feedback" style="color: red" for="' + field_name + '">' + error + '</span>';
                $('#' + form_id).find('input[name="' + field_name + '"], textarea[name="' + field_name + '"]')
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
                        swal({title: "", text: response.message, type: response.status}, function () {
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

    $(document).on('click', '.cart-action', function () {
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
        var _token = token;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {product_id: id, _token: _token, qty: qty, countRelative: countRelative,attributeList:attributeList},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url + '/add-cart',
            success: function (response) {
                $('.cart-action-span').html(cartText);
                if (response.status == true) {
                    swal({
                        title: "Done it", text: response.message, type: "success"
                    });
                    $('.cartCount').html(response.count);
                    $('.cartTotal').html(response.cartTotal);
                    if (/[,\-]/.test(id)) {
                        var idArray = id.split(',');
                        var i;
                        for (i = 0; i < idArray.length; ++i) {
                            $('#addoncheck' + idArray[i]).prop('disabled', true);
                            console.log(idArray[i]);
                            $('#wishlist_check_' + idArray[i]).prop('checked', false);
                            $('#wishlistBox_' + idArray[i]).remove();
                        }
                    } else {
                        $('#wishlist_check_' + id).prop('checked', false);
                        $('#wishlistBox_' + id).remove();
                    }
                } else {
                    swal({
                        title: "Oops", text: response.message, type: "error"
                    });
                }
            }
        });
    });

    $(document).on('click', '.remove-cart-item', function () {
        var id = $(this).attr('id');
        var _token = token;
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {cart_id: id, _token: _token},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url + '/remove-cart-item',
            success: function (response) {
                if (response.status == true) {
                    swal({
                        title: "",
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
                        title: "",
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
                                title: "",
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

    /***************** cart action end **********************/

});
