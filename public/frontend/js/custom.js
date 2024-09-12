$(document).ready(function () {
    var urlLastSegment = window.location.pathname.split("/").pop();
    // $(".my-rating-readonly").starRating({
    //     totalStars: 5,
    //     starShape: 'rounded',
    //     starSize: 15,
    //     emptyColor: 'lightgray',
    //     hoverColor: '#F3DB01',
    //     activeColor: '#F3DB01',
    //     useGradient: false,
    //     readOnly: true,
    // });

    // $(".my-rating").starRating({
    //     totalStars: 5,
    //     starSize: 20,
    //     emptyColor: 'lightgray',
    //     hoverColor: '#F3DB01',
    //     activeColor: 'lightgray',
    //     useGradient: false,
    //     disableAfterRate: false,
    //     ratedColor: '#F3DB01',
    //     emptyColor: 'lightgray',
    //     useFullStars: true,
    //     callback: function (currentRating, $el) {
    //         $('.rating').val(currentRating);
    //       console.log('DOM element ', $el);
    //     }
    // });

    // $('.rtl-slider').slick({
    //     slidesToShow: 1, slidesToScroll: 1, arrows: false, fade: true, asNavFor: '.rtl-slider-nav'
    // });
    // $('.rtl-slider-nav').slick({
    //     slidesToShow: 4,
    //     slidesToScroll: 1,
    //     vertical: true,
    //     asNavFor: '.rtl-slider',
    //     centerMode: false,
    //     focusOnSelect: true,
    //     prevArrow: ".thumb-prev",
    //     nextArrow: ".thumb-next",
    // });

    // $('.navigation-link').on('mouseover',function(){
    //     $(this).css({'cursor':'pointer'});
    // });

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
                            $("#successModal").modal('show');

                            document.getElementById("myspan").innerHTML=response.message;

                            const myTimeout = setTimeout(myGreeting, 2000);

                            function myGreeting() {

                                 $('#successModal').delay(2000).fadeOut();

                                 window.location.reload();
                            }
                            // swal({
                            //     title: "", text: response.message, type: "success"
                            // }, function () {
                            //     window.location.reload();
                            // });
                        } else if (response.status == "error") {
                            $('#email_error').html('Please enter a valid email ID').css({'border-color': '1px solid #FF0000'});
                        } else {
                            // swal({
                            //     title: response.status, text: response.message, type: response.status
                            // });
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
                            $("#successModal").modal('show');

                            document.getElementById("myspan").innerHTML=response.message;

                            const myTimeout = setTimeout(myGreeting, 2000);

                            function myGreeting() {

                                 $('#successModal').delay(2000).fadeOut();

                                 window.location.reload();
                            }
                            // swal({
                            //     title: "", text: response.message, type: "success"
                            // }, function () {
                            //     window.location.reload();
                            // });
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


    // $(document).on('click', '.currency-selection', function () {
    //     var currency = $(this).data('id');
    //     var _token = token;
    //     $.ajax({
    //         type: 'POST', dataType: 'json', data: {currency: currency, _token: _token}, headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }, url: base_url + '/currency_set', success: function (response) {
    //             if (response.status == true) {
    //                 swal({
    //                     title: "", text: response.message, type: "success"
    //                 }, function () {
    //                     window.location.reload();
    //                 });
    //             } else {
    //                 swal({
    //                     title: "Error", text: response.message, type: "error"
    //                 });
    //             }
    //         }
    //     });
    // });

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
                var error = 'Please enter'  + " " + field_name ;
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
            var waitText = "Please wait...";
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
                       // Redirect to thanku.blade.php
            window.location.href = '/thankyou'; // Adjust the URL if necessary

        // Reload the page after a delay (e.g., 2000 milliseconds)
                       
                                        
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

    // $(document).on('change', '#country', function () {
    //     var country_id = $(this).val();
    //     if (country_id) {
    //         $.ajax({
    //             type: 'POST', dataType: 'json', url: base_url + '/customer/state-list/', data: {country_id}, headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }, success: function (data) {
    //                 if (data.status == 'error') {
    //                     swal.fire('Error !', data.message, 'error');
    //                 } else {
    //                     var resp = data.message;
    //                     var len = resp.length;
    //                     $("#state").empty().append("<option value=''>Select State</option>")
    //                     for (var i = 0; i < len; i++) {
    //                         $("#state").append("<option value='" + resp[i]['id'] + "'>" + resp[i]['state_en'] + "</option>");
    //                     }
    //                 }
    //             }
    //         })
    //     }
    // });

    /****************** cart action *************************/

    $('.cartBtn').on('click', function () {
        //cart contain out of stock product
        if ($(this).hasClass('out-of-stock')) {
            //cart contain out of stock product
            
            swal.fire({
                title: "Oops",
                text: "Sorry, this product is out of stock.",
                type: "error"
            });
        }
    });

    $('.outOfStock').on('click', function () {
        //cart contain out of stock product
        swal.fire({
            title: "Oops",
            text: "Sorry, this product is out of stock.",
            type: "error"
        });
    });
    // $(document).ready(function() {
    //     $(document).on('click', '.cart-action', function (e) {
    //         e.preventDefault(); // Prevent default action to ensure only our code runs
    
    //         console.log('Cart action clicked');
    
    //         var userid = $(this).data('customerid');
    //         var id = $(this).data('id');
    //         var totalprice = $(this).data('price');
    //         var totalguest = $(this).data('guest');
    //         var setdate = $(this).data('setdate');
    //         var origin = $(this).data('origin');
    //         var destination = $(this).data('destination');
    //         var travel_sector = $(this).data('travel_sector');
    //         var flight_number = $(this).data('flight_number');
    //         var entry_date = $(this).data('entry_date');
    //         var travel_type = $(this).data('travel_type');
    //         var terminal = $(this).data('terminal');
    //         var entry_time = $(this).data('entry_time');
    //         var exit_time = $(this).data('exit_time');
    //         var bag_count = $(this).data('bag_count');
    //         var adults = $(this).data('adults');
    //         var infants = $(this).data('infants');
    //         var children = $(this).data('children');
    //         var pnr = $(this).data('pnr');
    //         var meet_guest= $(this).data('meet_guest');

          
          
    //         var qty = 1;
    //         var checkout = $(this).data('checkout');
    //         var cartText = $('.cart-action-span').html();
    //         var countRelative = $(this).data('relative') === undefined ? 1 : 0;
    //         var attrArray = [];
    
    //         $('.attrSelect').each(function () {
    //             var attrId = $(this).val();
    //             var attrLabel = $(this).data('label');
    //             var combined = attrLabel + ' : ' + attrId;
    //             attrArray.push(combined);
    //         });
    
    //         var attributeList = attrArray.join(",");
    //         $('.cart-action-span').html('Loading..');
    
    //         $.ajax({
    //             type: 'POST',
    //             dataType: 'json',
    //             data: {
    //                 product_id: id,
    //                 qty: qty,
    //                 totalprice: totalprice,
    //                 totalguest: totalguest,
    //                 setdate: setdate,
    //                 countRelative: countRelative,
    //                 attributeList: attributeList,
    //                 origin: origin,
    //                 destination: destination,
    //                 travel_sector: travel_sector,
    //                 flight_number: flight_number,
    //                 entry_date: entry_date,
    //                 travel_type: travel_type,
    //                 terminal: terminal,
    //                 entry_time: entry_time,
    //                 exit_time: exit_time,
    //                 bag_count: bag_count,
    //                 adults: adults,
    //                 infants: infants,
    //                 children: children,
    //                 pnr: pnr,
    //                 meet_guest: meet_guest,
    //             },
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             url: base_url + '/add-cart',
    //             success: function (response) {
    //                 console.log('AJAX success:', response);
    
    //                 $('.cart-action-span').html(cartText);
    
    //                 if (response.status == true) {
    //                     if (!userid || userid.trim() === '') {
    //                         window.location.href = base_url + '/choose';
    //                     } else if (checkout == 1) {
    //                         window.location.href = base_url + '/checkout';
    //                     } else {
    //                         if (urlLastSegment == "cart" || urlLastSegment == "checkout") {
    //                             setTimeout(function() {
    //                                 location.reload();
    //                             }, 50000); // 50 seconds
    //                         } else {
    //                             window.location.href = base_url + '/cart';
    
    //                             Toast.fire({
    //                                 icon: 'success',
    //                                 title: response.message
    //                             });
    
    //                             // Reload the page after a delay (if needed)
    //                             setTimeout(() => {
    //                                 location.reload();
    //                             }, 50000); // 50 seconds
    //                         }
    //                     }
    //                 } else {
    //                     swal.fire({
    //                         title: "Oops",
    //                         text: response.message,
    //                         icon: "error"
    //                     });
    //                 }
    //             },
    //             error: function (xhr, status, error) {
    //                 console.error('AJAX error:', xhr.responseText);
    //                 swal.fire({
    //                     title: "Error",
    //                     text: "An error occurred while processing your request. Please try again.",
    //                     icon: "error"
    //                 });
    //             }
    //         });
    //     });
    // });
    
    $(document).ready(function() {
        $(document).on('click', '.cart-action', function (e) {
            e.preventDefault(); // Prevent default action to ensure only our code runs
    
            var $button = $(this); // Reference to the clicked button
    
            if ($button.attr("disabled")) {
                return; // If the button is already disabled, do nothing
            }
    
            $button.attr("disabled", true); // Disable the button to prevent multiple clicks
    
            console.log('Cart action clicked');
    
            var userid = $button.data('customerid');
            var id = $button.data('id');
            var totalprice = $button.data('price');
            var totalguest = $button.data('guest');
            var setdate = $button.data('setdate');
            var origin = $button.data('origin');
            var trans = $button.data('trans');
            var destination = $button.data('destination');
            var travel_sector = $button.data('travel_sector');
            var flight_number = $button.data('flight_number');
            var entry_date = $button.data('entry_date');
            var travel_type = $button.data('travel_type');
            var terminal = $button.data('terminal');
            var entry_time = $button.data('entry_time');
            var exit_time = $button.data('exit_time');
            var bag_count = $button.data('bag_count');
            var adults = $button.data('adults');
            var infants = $button.data('infants');
            var children = $button.data('children');
            var pnr = $button.data('pnr');
            var meet_guest = $button.data('meet_guest');
            var meet_guestn = $button.data('meet_guestn');
    
            var qty = 1;
            var checkout = $button.data('checkout');
            var cartText = $('.cart-action-span').html();
            var countRelative = $button.data('relative') === undefined ? 1 : 0;
            var attrArray = [];
    
            $('.attrSelect').each(function () {
                var attrId = $(this).val();
                var attrLabel = $(this).data('label');
                var combined = attrLabel + ' : ' + attrId;
                attrArray.push(combined);
            });
    
            var attributeList = attrArray.join(",");
            $('.cart-action-span').html('Loading..');
    
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    product_id: id,
                    qty: qty,
                    totalprice: totalprice,
                    totalguest: totalguest,
                    setdate: setdate,
                    countRelative: countRelative,
                    attributeList: attributeList,
                    origin: origin,
                    trans: trans,
                    destination: destination,
                    travel_sector: travel_sector,
                    flight_number: flight_number,
                    entry_date: entry_date,
                    travel_type: travel_type,
                    terminal: terminal,
                    entry_time: entry_time,
                    exit_time: exit_time,
                    bag_count: bag_count,
                    adults: adults,
                    infants: infants,
                    children: children,
                    pnr: pnr,
                    meet_guest: meet_guest,
                    meet_guestn: meet_guestn,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: base_url + '/add-cart',
                success: function (response) {
                    console.log('AJAX success:', response);
    
                    $('.cart-action-span').html(cartText);
    
                    if (response.status == true) {
                        if (!userid || userid.trim() === '') {
                            window.location.href = base_url + '/choose';
                        } else if (checkout == 1) {
                            window.location.href = base_url + '/checkout';
                        } else {
                            if (urlLastSegment == "cart" || urlLastSegment == "checkout") {
                                setTimeout(function() {
                                    location.reload();
                                }, 5000); // 5 seconds
                            } else {
                                window.location.href = base_url + '/cart';
    
                                Toast.fire({
                                    icon: 'success',
                                    title: response.message
                                });
    
                                // Reload the page after a delay (if needed)
                                setTimeout(() => {
                                    location.reload();
                                }, 5000); // 5 seconds
                            }
                        }
                    } else {
                        swal.fire({
                            title: "Oops",
                            text: response.message,
                            icon: "error"
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX error:', xhr.responseText);
                    swal.fire({
                        title: "Error",
                        text: "An error occurred while processing your request. Please try again.",
                        icon: "error"
                    });
                }
            });
        });
    });
    
    
    

    $(document).on('click', '.remove-cart-item', function () {
        var id = $(this).data('id');

        $.ajax({
            type: 'POST', dataType: 'json', data: {cart_id: id}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/remove-cart-item', success: function (response) {
                if (response.status == true) {
                   
                    $(".successModalForm").modal('show');

                            $("#myspan").html(response.message);
                          
                    // swal.fire({
                    //     title: "",
                    //     text: response.message,
                    //     type: "success"
                    // }, function () {
                    //     // window.location.reload();
                    // });
                    Toast.fire('success', response.message, "success");
                    setTimeout(() => {
                        location.reload();
                    }, 800);

                } else {
                    Toast.fire('Error', response.message, "error");
                }
            }
        });
    });

    $(document).on('click', '.login-popup', function () {
        var id = $(this).data('id');
        $('#wishlist_check_' + id).removeClass('fill');
        Toast.fire({
            title: "Oops", text: 'Please login for wish listing a product', icon: "error"
        });

    });

    $(document).on('change', '.cartQuantity', function () {
        var id = $(this).data('id');
        var product_id = $(this).data('product_id');
        var qty = $(this).val();
        var size = $(this).data('size');
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {product_id: product_id, qty: qty,size: size,id : id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: base_url + '/update-item-quantity',
            success: function (response) {
                $('.cart-error').html('');
                $('.cart-success').html('');
                if (response.status == true) {
                    Toast.fire({
                        title: "", text: response.message, icon: "success"
                    });
                    $('.cart-success').html('');
                    $('.cart-success').html('<i class="fa fa-check" aria-hidden="true"></i>'+response.message);
                    // console.log();
                    $('.cart-count').html(response.productCount);
                } else {
                  
                  $('.cart-error').html('<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>'+response.message);
                    Toast.fire('Error', response.message, "error");

                }
                setTimeout(() => {
                    $('.cart-error').html('');
                    $('.cart-success').html('');
                }, 800);
            }
        });
    });
    $(document).on('change', '.cartQuantity', function () {
        var id = $(this).data('id');
        var product_id = $(this).data('product_id');
        var qty = $(this).val();
        var size = $(this).data('size');
        if (qty >= 1) {
            $.ajax({
                type: 'POST', dataType: 'json',  data: {product_id: product_id, qty: qty,size: size,id : id}, headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, url: base_url + '/get-calc-value', success: function (response) {
                    if (response.status == true) {
                        console.log(response);
                        $('.sub_totall').html(response.default_currency+' '+response.cart);
                        $('.tax_amount').html(response.default_currency+' '+response.tax_amount);
                        $('.cart_final_total').html(response.default_currency+' '+response.cart_final_total);
                        $('.shipping_amount').html(response.default_currency+' '+response.shipping_amount);
                       
                        $('.price'+id).html(response.default_currency+' '+response.total);

                    } else {
                        
                        Toast.fire('Error', response.message, "error");
                        $this.val(response.qty);
                    }
                }
            });

        } else {
            $this.val(1);
            Toast.fire('Error', 'Quantity must be minimum 1', "error");
        }
    });

    // $(document).on('click','#confirm_payment',function(){
    //     if($('#terms-condition').prop('checked')==true){
    //         $('#confirm-order-error').html('');
    //         if($('.payment_method').val()=="cod"){
    //             $('.order-submit-loader').show();
    //             var _token = token;
    //             $.ajax({
    //                 type:'POST',
    //                 dataType:'json',
    //                 data:{_token:_token},
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 },
    //                 url: base_url+'/submit-order-by-cod',
    //                 success:function(response){
    //                     $('.order-submit-loader').hide();
    //                     if(response.status==true){
    //                         swal({
    //                             title: "",
    //                             text: response.message,
    //                             type: "success"
    //                         }, function() {
    //                             $('#submit-loader').hide();
    //                             window.location.href = base_url+'/response/'+response.data;
    //                         });
    //                     }else{
    //                         $.notify(response.message, "error");
    //                     }
    //                 }
    //             });
    //         }else{
    //             alert('online payment');
    //         }
    //     }else{
    //         $('#confirm-order-error').html('Please accept the terms & condition').css({'color':'red'});
    //     }
    // });

    
    // $(document).on('click', '#confirm_payment', function (e) {
    //     e.preventDefault();
    
        
           
           
           
           
           
    //        var payment_method ="COD";

         

           
    //         if (payment_method) {
    //             $(this).text("Please Wait...")
    //             $.ajax({
    //                 type: 'POST',
    //                 dataType: 'json',
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 },
    //                 url: base_url + '/submit-order', 

    //                  data: { payment_method: payment_method},
    //                  headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 },
                 
    //                 success: function (response) {
    //                     $('.order-submit-loader').hide();
    //                     if (response.status == true) {
                         
    //                         swal.fire({
    //                             title: "", text: response.message, type: "success", icon: "success",
    //                         });
                                
    //                             setTimeout(() => {
    //                                 $('#submit-loader').hide();
    //                                 window.location.href = base_url + response.data;
                                    
    //                             }, 900);
    //                             // if (result.isConfirmed) {
    //                             //     $('#submit-loader').hide();
    //                             //     window.location.href = base_url + response.data;
    //                             // }
                           
    //                     } else {
    //                         if (response.status == 'online-payment') {
    //                             window.location.href = response.url;
    //                         } else {
    //                             swal.fire({
    //                                 confirmButtonColor: '#3085d6',
    //                                 title: "", text: response.message, type: "success", icon: "success",
    //                             });
    //                             setTimeout(() => {
    //                                 $('#submit-loader').hide();
    //                                 window.location.href = base_url + response.data;
                                    
    //                             }, 3000);
    //                                 // if (result.isConfirmed) {
    //                                 // }
                            
    //                         }
    //                         thisData.text("Confirm Order");
    //                     }
    //                 },
    //                 error: function (response) {
    //                     thisData.text("Confirm Order");
    //                     $('#confirm_payment').removeAttr('disabled');
                        
    //                     $(this).prop('disabled', false);
    //                     $(this).text("Confirm Order")

    //                 }
    //             });
    //         } else {
    //             $(this).prop('disabled', false);
    //             var payment_error = 'Select payment method';
    //             $('#payment-method-error').html(payment_error).css({'color': 'red'});
    //             Toast.fire('Error', payment_error, "error");
    //         }
        
           
    //         // $.notify('Please accept the terms & condition', "error");
        
    // });


    // $(document).on('click', '#confirm_payment', function (e) {
    //     e.preventDefault();
    
    //     var payment_method = "COD";
        
    //     // Validate form fields
    //     var valid = true;
    //     $('.details-item input[required], .details-item textarea[required]').each(function() {
    //         if ($(this).val().trim() === '') {
    //             valid = false;
    //             $(this).addClass('error'); // Add error class for styling
    //             $(this).next('.error-message').show(); // Show error message if any
    //         } else {
    //             $(this).removeClass('error'); // Remove error class
    //             $(this).next('.error-message').hide(); // Hide error message if valid
    //         }
    //     });
    
    //     if (valid) {
    //         $(this).text("Please Wait...");
    //         $.ajax({
    //             type: 'POST',
    //             dataType: 'json',
    //             headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             url: base_url + '/submit-order',
    //             data: {
    //                 payment_method: payment_method,
           
    //         address: $('#address').val(),
    //         passport_number: $('#passport_number').val(),
    //         pincode: $('#pincode').val(),
    //         country: $('#country').val(),
    //         city: $('#city').val(),
    //         state: $('#state').val(),
    
    //     // gender: $('input[name^="inlineRadioOptions"]:checked').map(function() { return $(this).val(); }).get(),
    //     // name: $('input[name="name[]"]').map(function() { return $(this).val(); }).get(),
    //     // age: $('input[name="age[]"]').map(function() { return $(this).val(); }).get(),
    //     // pnr: $('input[name="pnr[]"]').map(function() { return $(this).val(); }).get(),

    //     gender: $('input[name^="inlineRadioOptions"]:checked').map(function() { return $(this).val(); }).get(),
    //     // Name
    //     name: $('input[name^="name["]').map(function() { return $(this).val(); }).get(),
    //     // Age
    //     age: $('input[name^="age["]').map(function() { return $(this).val(); }).get(),
    //     // PNR
    //     pnr: $('input[name^="pnr["]').map(function() { return $(this).val(); }).get(),
                   
                    
    //             },
    //             success: function (response) {
    //                 $('.order-submit-loader').hide();
    //                 if (response.status == true) {
    //                     swal.fire({
    //                         title: "", text: response.message, type: "success", icon: "success",
    //                     });
    //                     setTimeout(() => {
    //                         $('#submit-loader').hide();
    //                         window.location.href = base_url + response.data;
    //                     }, 900);
    //                 } else {
    //                     if (response.status == 'online-payment') {
    //                         window.location.href = response.url;
    //                     } else {
    //                         swal.fire({
    //                             confirmButtonColor: '#3085d6',
    //                             title: "", text: response.message, type: "success", icon: "success",
    //                         });
    //                         setTimeout(() => {
    //                             $('#submit-loader').hide();
    //                             window.location.href = base_url + response.data;
    //                         }, 3000);
    //                     }
    //                     $('#confirm_payment').text("Confirm Order");
    //                 }
    //             },
    //             error: function (response) {
    //                 $('#confirm_payment').text("Confirm Order");
    //                 $('#confirm_payment').removeAttr('disabled');
    //             }
    //         });
    //     } else {
    //         // Handle validation error (e.g., show error message, highlight fields)
    //         $('#payment-method-error').html('Please fill out all required fields').css({'color': 'red'});
    //         Toast.fire('Error', 'Please fill out all required fields', "error");
    //     }
    // });
    

    $(document).on('click', '#confirm_payment', function (e) {
        e.preventDefault(); // Prevent the default form submission
    
        var payment_method = $('input[name=transfer]:checked').attr('id');
    
        // alert(payment_method);
        var finalAmount = $(this).data('finalamount');
        var phone_number = $(this).data('phone_number');
        var valid = true;
    
        // Initialize error messages
        var $paymentMethodError = $('#payment-method-error');
        var $requiredFields = $('.details-item input[required], .details-item textarea[required]');
        var requiredFieldsEmpty = false;
    
        // Reset previous error messages
        $paymentMethodError.html('').css({'color': ''});
        $requiredFields.removeClass('error');
        $('.error-message').hide();
    
        // Check if a payment method is selected
        if (!payment_method) {
            valid = false;
            $paymentMethodError.html('Please select a payment method').css({'color': 'red'});
        }
    
        // Validate required fields
        $requiredFields.each(function() {
            if ($(this).val().trim() === '') {
                valid = false;
                requiredFieldsEmpty = true;
                $(this).addClass('error');
                $(this).next('.error-message').show();
            }
        });
    
        if (valid) {
            $(this).text("Please Wait...");
    
            $.ajax({
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: base_url + '/submit-order',
                data: {
                    payment_method: payment_method,
                    final_amount: finalAmount,
                    address: $('#address').val(),
                    passport_number: $('#passport_number').val(),
                    pincode: $('#pincode').val(),
                    country: $('#country').val(),
                    city: $('#city').val(),
                    state: $('#state').val(),
                    gst_number: $('#gst_number').val(),
                    gender: $('input[name^="inlineRadioOptions"]:checked').map(function() { return $(this).val(); }).get(),
                    name: $('input[name^="name["]').map(function() { return $(this).val(); }).get(),
                    age: $('input[name^="age["]').map(function() { return $(this).val(); }).get(),
                    pnr: $('input[name^="pnr["]').map(function() { return $(this).val(); }).get(),
                    type: $('input[name^="type["]').map(function() { return $(this).val(); }).get(),
                },
                success: function (response) {
                    if (response.status === 'online-payment') {
                        initiateRazorpayPayment(response.order_id, response.amount, response.currency, response.key, phone_number, response.db_orderid);
                    } else if (response.status === 'COD') {
                        swal.fire({
                            confirmButtonColor: '#3085d6',
                            title: "", text: response.message, type: "success", icon: "success",
                        });
                        setTimeout(() => {
                            $('#submit-loader').hide();
                            window.location.href = base_url + response.data;
                        }, 3000);
                    } else {
                        handleOrderResponse(response);
                    }
                },
                error: function () {
                    $('#confirm_payment').text("Confirm Order");
                    $('#confirm_payment').removeAttr('disabled');
                }
            });
        } else {
            // Notify the user to fill out all required fields and select a payment method
            Toast.fire('Error', 'Please fill out all required fields and select a payment method', "error");
        }
    });
    
    // Clear error message when a payment method is selected
    $(document).on('change', 'input[name=transfer]', function() {
        $('#payment-method-error').html('').css({'color': ''});
    });
    
    // Clear error message when a required field is filled out
    $(document).on('input', '.details-item input[required], .details-item textarea[required]', function() {
        $(this).removeClass('error');
        $(this).next('.error-message').hide();
    });
    
    
    function initiateRazorpayPayment(order_id, amount, currency, key, phone_number,db_orderid) {
        var options = {
            "key": key, // Enter the Key ID generated from the Dashboard
            "amount": amount, // Amount is in currency subunits. Default is in paise (INR), so multiply by 100
            "currency": currency,
            "name": "Primefly",
            "description": "Order Payment",
            "order_id": order_id,
            "handler": function (response) {
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: base_url + '/razorpay-callback',
                    data: {
                        razorpay_payment_id: response.razorpay_payment_id,
                        razorpay_order_id: response.razorpay_order_id,
                        razorpay_signature: response.razorpay_signature,
                        db_orderid:db_orderid
                    },
                    success: function (response) {
                        if (response.status == 'success') {


                            Toast.fire({
                                title: "Success!", text: response.message, icon: "success"
                            });
                            setTimeout(() => {
                                window.location.href = base_url;
                            }, 2000);
                          
                           
                            // window.location.href = base_url;


                                           }
                    },
                    error: function () {
                        alert('Payment failed');
                    }
                });
            },
            "prefill": {
            "contact": phone_number // Only the phone number is included in prefill
        },
            "notes": {
                "address": "Customer Address"
            },
            "theme": {
                "color": "#F37254"
            }
        };
        var rzp1 = new Razorpay(options);
        rzp1.open();
    }
    
    function handleOrderResponse(response) {
        $('.order-submit-loader').hide();
        if (response.status === true) {
            swal.fire({
                title: "",
                text: response.message,
                type: "success",
                icon: "success",
            });
            setTimeout(() => {
                $('#submit-loader').hide();
                window.location.href = base_url + response.data;
            }, 900);
        } else {
            swal.fire({
                confirmButtonColor: '#3085d6',
                title: "",
                text: response.message,
                type: "error",
                icon: "error",
            });
            setTimeout(() => {
                $('#submit-loader').hide();
                window.location.href = base_url + response.data;
            }, 3000);
            $('#confirm_payment').text("Confirm Order");
        }
    }
    
    // function initiateRazorpayPayment(order_id, amount, currency, key) {
    //     var options = {
    //         "key": key, // Enter the Key ID generated from the Dashboard
    //         "amount": amount, // Amount is in currency subunits. Default is in paise (INR), so multiply by 100
    //         "currency": currency,
    //         "name": "Your Company Name",
    //         "description": "Order Payment",
    //         "order_id": order_id,
    //         "handler": function (response){
    //             $.ajax({
    //                 type: 'POST',
    //                 dataType: 'json',
    //                 headers: {
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 },
    //                 url: base_url + '/razorpay-callback',
    //                 data: {
    //                     razorpay_payment_id: response.razorpay_payment_id,
    //                     razorpay_order_id: response.razorpay_order_id,
    //                     razorpay_signature: response.razorpay_signature
    //                 },
    //                 success: function (response) {
    //                     handleOrderResponse(response);
    //                 },
    //                 error: function () {
    //                     alert('Payment failed');
    //                 }
    //             });
    //         },
    //         "prefill": {
    //             "name": "Customer Name",
    //             "email": "customer@example.com",
    //             "contact": "9999999999"
    //         },
    //         "notes": {
    //             "address": "Customer Address"
    //         },
    //         "theme": {
    //             "color": "#F37254"
    //         }
    //     };
    //     var rzp1 = new Razorpay(options);
    //     rzp1.open();
    // }
    
    // function handleOrderResponse(response) {
    //     $('.order-submit-loader').hide();
    //     if (response.status === true) {
    //         swal.fire({
    //             title: "",
    //             text: response.message,
    //             type: "success",
    //             icon: "success",
    //         });
    //         setTimeout(() => {
    //             $('#submit-loader').hide();
    //             window.location.href = base_url + response.data;
    //         }, 900);
    //     } else {
    //         swal.fire({
    //             confirmButtonColor: '#3085d6',
    //             title: "",
    //             text: response.message,
    //             type: "success",
    //             icon: "success",
    //         });
    //         setTimeout(() => {
    //             $('#submit-loader').hide();
    //             window.location.href = base_url + response.data;
    //         }, 3000);
    //         $('#confirm_payment').text("Confirm Order");
    //     }
    // }
    
    
    
    
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

                       
                        Toast.fire({
                            title: "Success!", text: response.message, icon: "success"
                        });
                        setTimeout(() => {
                            window.location.href = base_url;
                        }, 2000);


                    } else if (response.status == "success-reload") {
                        $(".successModalForm").modal('show');
                        $("#myspan").html(response.message);
                            setTimeout(function(){
                                $(".successModalForm").modal('hide');
                            }, 800);

                        // Toast.fire({
                        //     title: "Success!", text: response.message, icon: "success"
                        // });
                        if (response.redirect) {
                            window.location.href = response.redirect;
                        } else {
                           setTimeout(() => {
                            location.reload();
                           }, 1000);
                        }
                    } else {
                        $(".successModalForm").modal('show');
                        $("#myspan").html(response.message);
                            setTimeout(function(){
                                $(".successModalForm").modal('hide');
                            }, 800);
                        // swal.fire({
                        //     title: response.status, text: response.message, icon: response.status
                        // });
                    }
                    setTimeout(() => {
                        location.reload();
                       }, 1000);
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
    $(document).on('click', '.form_submit_btnu', function (e) {
        

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

                       
                        Toast.fire({
                            title: "Success!", text: response.message, icon: "success"
                        });
                        setTimeout(() => {
                            window.location.href = base_url + '/customer/account';
                        }, 2000);
                        

                    } else if (response.status == "success-reload") {
                        $(".successModalForm").modal('show');
                      

                       
                        
                    } else {
                        $(".successModalForm").modal('show');
                        
                        // swal.fire({
                        //     title: response.status, text: response.message, icon: response.status
                        // });
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
    $(document).on('click', '.registerform_submit_btn', function (e) {
        e.preventDefault();
    
        $this = $(this);
        var buttonText = $this.val(); // Changed to val() to get the value of the button
        var url = $this.data('url');
        var form_id = $this.closest("form").attr('id');
        var formData = new FormData(document.getElementById(form_id));
    
        // Clear existing error messages
        $('#' + form_id).find('input[name="email"], input[name="phone"]').removeClass('is-invalid');
        $('#' + form_id).find('.error.invalidMessage').remove();
    
        var errors = false;
        $("#" + form_id + " .required").each(function (k, v) {
            var field_name = $(v).attr('name');
    
            if (!$(v).val().length) {
                errors = true;
                var error = 'Please enter <strong>' + field_name + '</strong>.';
                var msg = '<span class="error invalid-feedback invalidMessage" style="color: red" for="' + field_name + '">' + error + '</span>';
                $('#' + form_id).find('input[name="' + field_name + '"], textarea[name="' + field_name + '"]').addClass('is-invalid').attr("aria-invalid", "true").after(msg);
            } else {
                if (field_name === 'email') {
                    var regex = /^([a-zA-Z0-9_\.\-\+])+@(([a-zA-Z0-9\-])+.)+([a-zA-Z0-9]{2,4})+$/;
                    if (!regex.test($(v).val())) {
                        errors = true;
                        msg = '<span class="error invalid-feedback invalidMessage" style="color: red" for="email">Please enter a valid email address</span>';
                        $('#' + form_id).find('input[name="' + field_name + '"]').addClass('is-invalid').attr("aria-invalid", "true").after(msg);
                    }
                }
                if (field_name === 'phone') {
                    var phoneNumber = $(v).val().replace(/\s/g, ''); // Remove all whitespace characters
                    var phoneRegex = /^\d+$/; // Match one or more digits
    
                    if (!phoneRegex.test(phoneNumber)) {
                        errors = true;
                        msg = '<span class="error invalid-feedback invalidMessage" for="phone">Please enter a valid phone number with only digits and no spaces</span>';
                        $('#' + form_id).find('input[name="' + field_name + '"]').addClass('is-invalid').attr("aria-invalid", "true").after(msg);
                    }
                }
            }
        });
    
        // Add event listener to dynamically remove errors as user corrects input
        $('#' + form_id).on('input', '.required', function () {
            var field_name = $(this).attr('name');
            if ($(this).val().length) {
                $(this).removeClass('is-invalid').removeAttr("aria-invalid");
                $(this).siblings('.invalidMessage').remove();
            }
        });
    
        if (!errors) {
            // Disable the submit button to prevent multiple submissions
            $this.prop('disabled', true);
            $this.val('Please Wait..');
    
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
            }).done(function (response) {
                console.log(response);
                $this.val(buttonText);
                $this.prop('disabled', false); // Enable the submit button
    
                $("#" + form_id)[0].reset();
    
                if (response.status == "success") {

                     Toast.fire({
                            title: "Success!", text: response.message, icon: "success"
                        });
                        setTimeout(() => {
                            window.location.href = base_url/choose;
                        }, 2000);


                } else if (response.status == "success-reload") {
                    Toast.fire({
                        title: "Success!", text: response.message, icon: "success"
                    });
                    setTimeout(() => {
                        window.location.href = base_url + "/choose";
                    }, 2000);
                } else {
                    // Handle other error responses
                }
            }).fail(function (response) {
                $this.val(buttonText);
                $this.prop('disabled', false); // Enable the submit button
    
                $.each(response.responseJSON.errors, function (field_name, error) {
                    var msg = '<span class="error invalid-feedback invalidMessage" for="' + field_name + '">' + error + '</span>';
                    $('#' + form_id).find('input[name="' + field_name + '"]').addClass('is-invalid').attr("aria-invalid", "true").after(msg);
                });
            });
        }
    });
    
    $(document).on('click', '.loginform_submit_btn', function (e) {
       

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
                   
                    if (response.status == "success-reload") {


                        Toast.fire({
                            title: "Success!", text: response.message, icon: "success"
                        });
                        setTimeout(() => {
                            window.location.href = base_url;
                        }, 2000);

                    }

                   else  if (response.status == "success-reload2") {


                        Toast.fire({
                            title: "Success!", text: response.message, icon: "success"
                        });
                        setTimeout(() => {
                            window.location.href = base_url;
                        }, 500);

                    }

                    else if (response.status == "success2") {

                        Toast.fire({
                            title: "Success!", text: response.message, icon: "success"
                        });
                        setTimeout(() => {
                            window.location.href = base_url/customer/account;
                        }, 500);


                    }
                    else {
                        Toast.fire({
                            title: "error!", text: response.message, icon: "error"
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

    $(document).on('click', '.forgotpasswdform_submit_btn', function (e) {

      

        

        e.preventDefault();

        $this = $(this);
        var buttonText = $this.html();
        var url = $this.data('url');
        var form_id = $this.closest("form").attr('id');



        var modal_id = $this.closest(".modal").attr('id');
        var formData = new FormData(document.getElementById(form_id));
        console.log(formData);

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
                       
                        

                        Toast.fire({
                            title: "Success!", text: response.message, icon: "success"
                        });
                        
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
                        $('#reviewForm').find('input[name="' + field_name + '"]')
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
                             $(".successModalForm").modal('show');

                            $("#myspan").html(response.message);
                            setTimeout(function(){
                                $(".successModalForm").modal('hide');
                            }, 2000);
                        } else if (response.status == "error") {
                            $('#email_error').html('Please enter a valid email ID').css({'border-color': '1px solid #FF0000'});
                        } else {
                             $("#successModal").modal('show');
                            //  $(".successModalForm").modal('show');
                            // Toast.fire({
                            //     title: response.status, text: response.message, icon: response.status
                            // });
                        }
                    }
                });
            }
        }
    });
    /***************** cart action end **********************/



    $('.load-more-button').click(function(e) {
        e.preventDefault();
        blogLoadMoreData();
    });

    $(window).scroll(function () {
        // $(".load-more-button").each(function () {
        //     var WindowTop = $(window).scrollTop();
        //     var WindowBottom = WindowTop + $(window).height();
        //     var ElementTop = $(this).offset().top;
        //     var ElementBottom = ElementTop + $(this).height();

        //     if ((ElementBottom <= WindowBottom) && ElementTop >= WindowTop) {
        //         blogLoadMoreData();
        //         // journalLoadMoreData();
               
        //     }
        // });
         $(".load-more-product").each(function () {
            var WindowTop = $(window).scrollTop();
            var WindowBottom = WindowTop + $(window).height();
            var ElementTop = $(this).offset().top;
            var ElementBottom = ElementTop + $(this).height();

            if ((ElementBottom <= WindowBottom) && ElementTop >= WindowTop) {
                loadMoreData();
            }
        });
    });

    function loadMoreData() {

        var total_products = $('#totalProducts').val();

        var offset = $('#loading_offset').val();

        var btnHtml = $('.load-more-product').html();


        if (total_products > offset) {

            $('.load-more-product').html('Please wait..!');
            $.ajax({
                type: 'POST', data: $('#filter-form').serialize(), headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, url: base_url + '/product-load-more', success: function (response) {
                    if (response != 0) {
                        $('.appendHere' + offset).after(response).remove();
                        $('.more-section-' + offset).remove();
                        $('.load-more-product').html(btnHtml);
                    } else {
                        Toast.fire({
                            title: "Error", text: 'Some error occurred', icon: 'error'
                        });
                    }
                }
            });
        }

    }
  


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
    function journalLoadMoreData() {
        var total_blogs = $('#totaljournals').val();

        var offset = $('#journal_loading_offset').val();
        var loading_limit = $('#journal_loading_limit').val();

        var btnHtml = $('.load-more-product').html();
        $('.load-more-button').html('Please wait..!');
        $.ajax({
            type: 'POST', data: {total_blogs: total_blogs, offset: offset, loading_limit: loading_limit}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/journal-load-more', success: function (response) {
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


                if(response.availabilty == "In Stock"){
                    $('.cartBtn').removeClass('out-of-stock');
                    $('.cartBtn').addClass('cart-action');
                    $('.outstock').addClass('d-none');
                    $('.instock').addClass('d-none');
                }
                else{

                    $('.cartBtn').addClass('out-of-stock');
                    $('.cartBtn').removeClass('cart-action');
                    $('.outstock').addClass('d-none');

                    //empty instock
                    $('.instock').html('');
                    $('.instock').append('');
                    $('.instock').append('Out of Stock');
                    $('.instock').removeClass('d-none');
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

    $(document).on('change', '#shipping_country', function () {
        console.log('yes');
        var country_id = $(this).val();
        console.log(country_id);
        console.log('yes');
        if (country_id) {
            $.ajax({
                type: 'POST', dataType: 'json', url: base_url + '/state-list', data: {country_id}, headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, success: function (data) {
                    if (data.status == false) {
                        Toast.fire('Error', data.message, "error");
                    } else {
                        if (data.states.length > 0) {
                            $("#shipping_state").empty();
                            $('#shipping_state').append('<option value="">Select State</option>');
                            $.each(data.states, function (key, value) {
                                $('#shipping_state').append('<option value="' + value.id + '"' + '>' + value.title + '</option>');
                            });
                        } else {
                            $('#shipping_state').append('<option value="">No States Available</option>');
                        }
                    }
                }
            })
        }
    });


    $(document).on('change', '#billing_country', function () {
        var country_id = $(this).val();
        if (country_id) {
            $.ajax({
                type: 'POST',async:false, dataType: 'json', url: base_url + '/b-state-list', data: {country_id}, headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, success: function (data) {
                    if (data.status == false) {
                        Toast.fire('Error !', data.message, "error");
                    } else {
                        if (data.states.length > 0) {
                            $("#billing_state").empty();
                            $('#billing_state').append('<option value="">Select State</option>');
                            $.each(data.states, function (key, value) {
                                $('#billing_state').append('<option value="' + value.id + '"' + '>' + value.title + '</option>');
                            });
                        } else {
                            $('#billing_state').append('<option value="">No States Available</option>');
                        }
                    }
                }
            })
        }
    });
    // $(document).on('change', '#country', function (e) {

    //     e.preventDefault();
    //     var country_id = $(this).val();
    //     var form = $(this).closest("form");

    //     var form_id = form.attr('id');


    //     if (country_id) {
    //         $.ajax({
    //             type: 'POST', dataType: 'json', url: base_url + '/state-list', data: {country_id}, headers: {
    //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             }, success: function (data) {

    //                 if (data.status == 'error') {
    //                     swal.fire('Error !', data.message, 'error');
    //                 } else {

    //                     var resp = data.message;
    //                     var len = resp.length;
    //                     $("#" + form_id + " #state").empty().append("<option value=''>Select Emirate</option>");
    //                     for (var i = 0; i < len; i++) {
    //                         $("#" + form_id + " #state").append("<option value='" + resp[i]['id'] + "'>" + resp[i]['title'] + "</option>");
    //                     }
    //                 }
    //             }
    //         })
    //     } else {
    //         $("#" + form_id + " #state").empty().append("<option value=''>Select Country First</option>");
    //     }
    // });

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
            $("#tags").hide();
        }


        Toast.fire("Done it!", 'Filter cleared', "success");
        window.location.reload();
    });


    // Single Clear Filtered
    $(document).on('click', '.clearFiltered', function () {
        var id = $(this).data('id');
        $(this).closest(".filterItems .fltr").remove();
        $('#' + id).prop('checked', false);
        if ($('#filterResult').val() == null || $('#filterResult').val() == '') {



            $("#tags").hide();

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
                $("#tags").show();





                $('.productList').html(response);
                Toast.fire("Done it!", 'Filter Applied', "success");
            }
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
    $(document).on('keyup', '#main-search-journal', function () {
        var search_param = $(this).val();
        if (search_param.trim() === "") {
            $('#search-result-service-append-here').html('');
            $('.searchResultservice').hide();
        } else {
            desktopSearchjournal(search_param);
        }
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
                               
                                var image = resp[i]['image'];
                                var link = resp[i]['link'];
                                var result = "<li><a href=" + link + " class='flxBx'>" + "<img src='" + image + "' alt=''>" + "<div class='name'>" + title + "</div>";
                               
                                result += "</div>" + "</a></li>";
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
    function desktopSearchjournal(search_param) {
        if (search_param) {
            $.ajax({
                type: 'POST', dataType: 'json', data: {search_param: search_param}, headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, url: base_url + '/main-search-journal', success: function (response) {

                   
                    if (response.status == true) { 
                        var resp = response.message;
                        var len = response.message.length;
                        if (len > 0) {

                            $('#search-result-service-append-here').html('');
                            for (var i = 0; i < len; i++) {
                                var id = resp[i]['id'];
                                var title = resp[i]['title'];
                               
                             
                                var link = resp[i]['link'];
                                var result = "<li><a href=" + link + " class='flxBx'>" + "<div class='name'>" + title + "</div>";
                               
                                result += "</div>" + "</a></li>";
                                $('#search-result-service-append-here').append(result);
                                $('#Header .FlexRow .rit_bx .search-box .search-input:focus ~ .searchResultservice').css({'height': 'auto'});
                            }
                            $('.searchResultservice').show();
                        } else {
                            var result = "<li class='disableClick'>" + "<div class='flxBx'>" + "<div class='txtBx'>" + "<div class='name'>No Results Found</div>" + "</div></div>" + "</li>";
                            $('#search-result-service-append-here').html(result);
                            $('#Header .FlexRow .rit_bx .search-box .search-input:focus ~ .searchResultservice').css({'height': '0px'});
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
                    // $('.shipping_amount').text(response.calculation_box.shippingAmount);
                    // $('.tax_amount').text(response.calculation_box.tax_amount);
                    // $('#grand_total_amount').val(response.calculation_box.final_total_with_tax);
                    // $('.cart_final_total_span').text(response.calculation_box.final_total_with_tax);

                    $('.shipping_amount').text(response.default_currency+' '+response.calculation_box.shippingAmount);
                    $('.tax_amount').text(response.default_currency+' '+response.calculation_box.tax_amount);
                    $('#grand_total_amount').val(response.calculation_box.final_total_with_tax);
                    $('.cart_final_total').text(response.default_currency+' '+response.calculation_box.final_total_with_tax);
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


    $(".range_bar_sort").on("slidechange", function (event, ui) {
       



        $("#amount").val("AED" + $("#slider-range").slider("values", 0) + " - AED" + $("#slider-range").slider("values", 1));
        filterProducts();
    });

    $("#amount").keyup(function () {
        filterProducts();
    });

     $(document).on('change', '.currency-selection', function () {
        var currency = $(this).find(':selected').data('code');
        // var _token = token;
        $.ajax({
            type: 'POST', dataType: 'json', data: {currency: currency}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/currency_set', success: function (response) {
                if (response.status == true) {
                    Toast.fire({
                        title: "Done it!", text: response.message, icon: "success"
                    }).then((result) => {
                        location.reload();
                    });
                } else {
                    swal.fire({
                        title: "Error", text: response.message, icon: "error"
                    });
                }
            }
        });
    });


});

$(document).ready(function() {
    $('.select2').select2({ 
        allowClear: true
    }); 
    $('.select_static').select2({ 
        allowClear: true,
        minimumResultsForSearch: Infinity  
    });  
});


