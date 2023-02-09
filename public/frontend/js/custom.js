$(document).ready(function () {
    $('#button_edit').addClass('d-none');
    var urlLastSegment = window.location.pathname.split("/").pop();

    // select2();

    // for facebook callback hash issue
    if (window.location.hash && window.location.hash == '#_=_') {
        if (window.history && history.pushState) {
            window.history.pushState("", document.title, window.location.pathname);
        } else {
            // Prevent scrolling by storing the page's current scroll offset
            var scroll = {
                top: document.body.scrollTop, left: document.body.scrollLeft
            };
            window.location.hash = '';
            // Restore the scroll offset, should be flicker free
            document.body.scrollTop = scroll.top;
            document.body.scrollLeft = scroll.left;
        }
    }

    $(".my-rating-readonly").starRating({
        totalStars: 5,
        starShape: 'rounded',
        starSize: 18,
        emptyColor: 'lightgray',
        hoverColor: '#FAB63C',
        activeColor: '#FAB63C',
        useGradient: false,
        readOnly: true,
    });

    $(".my-rating").starRating({
        totalStars: 5,
        starShape: 'rounded',
        starSize: 18,
        emptyColor: 'lightgray',
        hoverColor: '#FAB63C',
        activeColor: 'lightgray',
        ratedColor: '#FAB63C',
        useGradient: false,
        disableAfterRate: false,
        useFullStars: true,
        callback: function (currentRating, $el) {
            $('#rating').val(currentRating);
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

    $('.navigation-link').on('mouseover', function () {
        $(this).css({'cursor': 'pointer'});
    });

    $('.navigation-link').on('click', function () {
        var link = $(this).data('url');
        var type = $(this).data('type');
        window.location.href = base_url + '/' + type + '/' + link;
    });


    $(document).on('click', '.product_enquiry', function () {
        var produt_id = $(this).data('product');
        var product_title = $(this).data('product-title');
        if (produt_id) {
            $('#enquire_now_form_pop').modal('show');
            $('#product_id').val(produt_id);
            $('#product_title').val(product_title);

        }
    });
   

//QUANTITY COUNTER
    jQuery('.quanityCount').each(function () {
        var counter = jQuery(this), input = counter.find('input[type="number"]'),
            btnUp = counter.find('.btn-quantity-up'), btnDown = counter.find('.btn-quantity-down'),
            min = parseFloat(input.attr('min')), max = parseFloat(input.attr('max')),
            step = parseFloat(input.attr('step'));

        btnUp.click(function () {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + step;
            }
            counter.find("input").val(newVal);
            counter.find("input").trigger("change");
        });

        btnDown.click(function () {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - step;
            }
            counter.find("input").val(newVal);
            counter.find("input").trigger("change");
        });
    });
//QUANTITY COUNTER

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
                if (response.status == "true" && response.reload == 'true') {
               
                    $('.shipping_charge').text(response.calculation_box.shippingAmount);
                    $('.tax_amount').text(response.calculation_box.tax_amount);
                    $('#grand_total_amount').val(response.calculation_box.final_total_with_tax);
                    $('.cart_final_total_span').text(response.calculation_box.final_total_with_tax);
                    Toast.fire('Success', response.message, 'success');
                    setTimeout(() => {
                        window.location.reload();
                        
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
    $(document).on('keyup', '#main-search-mobile', function () {
        var search_param = $(this).val();
      
        if (search_param) {
            $.ajax({
                type: 'POST', dataType: 'json', data: {search_param: search_param, _token: _token}, headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, url: base_url + '/main-search', success: function (response) {
                    if (response.status == true) {
                        var resp = response.message;
                        var len = response.message.length;
                        if (len > 0) {
                            $('#search-result-append-here-mobile').html('');
                            for (var i = 0; i < len; i++) {
                                var id = resp[i]['id'];
                                var title = resp[i]['title'];
                                var price = resp[i]['price'];
                                var offer_price = resp[i]['offer_price'];
                                var image = resp[i]['image'];
                                var link = resp[i]['link'];
                                var result = "<li><a href=" + link + " class='flxBx'>" + "<div class='row flxBx'><div class='col-lg-2 col-md-3 col-4 imgBx'><img src='" + image + "' alt='' style='width: 100%;'></div>" + "<div class='col-lg-10 col-md-9 col-8 txtBx' style='padding-left: 25px;'>" + "<div class='name'>" + title + "</div>";
                                if (offer_price != '') {
                                    result += "<div class='d-flex align-items-center'><div class='price'>" + offer_price + "</div>" + "<div class='fullPrice'>" + price + "</div></div>";
                                } else {
                                    result += "<div class='d-flex align-items-center'><div class='price'>" + price + "</div></div>";
                                }
                                result += "</div></div>" + "</a></li>";
                                $('#search-result-append-here-mobile').append(result);
                                $('#Header .FlexRow .rit_bx .search-box .search-input:focus ~ .searchResultMobile').css({'height': 'auto'});
                            }
                            $('.searchResultMobile').show();
                        } else {
                            var result = "<li class='disableClick'>" + "<div class='flxBx'>" + "<div class='txtBx'>" + "<div class='name'>No Results Found</div>" + "</div></div>" + "</li>";
                            $('#search-result-append-here-mobile').html(result);
                            $('#Header .FlexRow .rit_bx .search-box .search-input:focus ~ .searchResultMobile').css({'height': '0px'});
                        }
                    } else {
                        Toast.fire('Error', 'Error while retrieving the filter results', 'error');
                    }
                }
            });
        }
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
                    swal.fire({
                        title: "Done it!", text: response.message, type: "success"
                    }, function () {
                        window.location.reload();
                    });
                } else {
                    swal.fire({title: "Error", text: 'Can\'t change the language', type: "error"});
                }
            }
        });
    });

    $(document).on('click', '.tabLink', function () {
        var tab = $(this).data('tab');
        if (tab == "wishlist") {
            $('#latestProductsList').show();
        } else {
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
                            swal.fire({
                                title: "Done it!", text: response.message, type: "success"
                            }, function () {
                                window.location.reload();
                            });
                        } else if (response.status == "error") {
                            $('#email_error').html('Please enter a valid email ID').css({'border-color': '1px solid #FF0000'});
                        } else {
                            swal.fire({
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
                    swal.fire({
                        title: "Done it!", text: response.message, type: "success"
                    }, function () {
                        window.location.reload();
                    });
                } else {
                    swal.fire({
                        title: "Error", text: response.message, type: "error"
                    });
                }
            }
        });
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
                var msg = '<span class="error invalid-feedback" style="color: red" for="' + field_name + '">' + error + '</span>';
                $('#' + form_id).find('input[name="' + field_name + '"], textarea[name="' + field_name + '"], select[name="' + field_name + '"]')
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
                    // console.log(response);
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
                        // console.log(response);
                        if (response.redirect) {
                             console.log('yes');
                            window.location.href = response.redirect;
                        } else {
                            location.reload();
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

    // profile image plus button in profile page
    $('#profile_image').on('change', function (event) {
        var formData = new FormData($("#profileImageForm")[0]);
        $.ajax({
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            url: base_url + '/customer/profile-image',
            success: function (response) {
                if (response.status === "success") {
                    Toast.fire({
                        title: "Done it!", text: response.message, icon: "success"
                    });
                    location.reload();
                } else {
                    Toast.fire({
                        title: "Error", text: response.message, icon: 'error'
                    });
                }
            }
        });
    });

    //add or edit address button in profile address page
    $(document).on('click', '.addressModal', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        $.ajax({
            type: 'POST', dataType: 'html', data: {id}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/customer/address-form', success: function (response) {
                if (response != '0') {
                    $('#addressModalDiv').html(response);
                    $('#addressModal').modal('show');
                } else {
                    swal.fire({
                        title: "Error", text: "Error while load the form", icon: 'error'
                    });
                }
            }
        });
    });

    // changing country in address modal and form
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

    //delete address
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
                        }
                    }
                });
            } else {
                Toast.fire("Cancelled", "Entry remain safe :)", "warning");
            }
        });
    });

    /***************** Blog Load More **********************/
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

      /***************** Product filter **********************/
    // PRICE_FILTER
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

    $('.filterItem').on('change', function () {
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

    /****************** Product Filter End *************************/
    

    //product automatic load more
    $(window).scroll(function () {
        $(".load-more-product").each(function () {
            var WindowTop = $(window).scrollTop();
            var WindowBottom = WindowTop + $(window).height();
            var ElementTop = $(this).offset().top;
            var ElementBottom = ElementTop + $(this).height();

            if ((ElementBottom <= WindowBottom) && ElementTop >= WindowTop) loadMoreProduct();
        });
    })

    function loadMoreProduct() {
        var offset = $('#loading_offset').val();
        $.ajax({
            type: 'POST', data: $('#filter-form').serialize(), headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/product-load-more', success: function (response) {
                if (response != 0) {
                    $('.appendHere' + offset).after(response).remove();
                    $('.more-section-' + offset).remove();
                } else {
                    swal.fire({
                        title: 'Error', text: 'Some error occurred while loading', icon: 'error'
                    });
                }
            }
        });
    }

    /****************** Product Compare *************************/
    $(document).on('click', '.min_compare_error', function () {
        Toast.fire('Error!', 'Add minimum 2 Products to compare', 'error');
    });
    $(document).on('click', '.add_compare_product, .close_compare_btn', function () {
        var product_id = $(this).data('id');
        $.ajax({
            type: 'POST', dataType: 'json', data: {product_id}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/add-compare-product', success: function (response) {
                if (response.status == 'success') {
                    Toast.fire('Success!', response.message, 'success');
                } else {
                    Toast.fire("Oops", response.message, "error");
                }
                window.location.reload();
            }
        });
    });
    /****************** Product Compare *************************/


    /****************** cart action *************************/
    $(document).on('click', '.cartOpen', function (e) {
        e.preventDefault();
        var cartCount = $('.cartCount').html();
        if (cartCount > 0) {
            var _token = token;
            $.ajax({
                type: 'POST', data: {_token: _token}, headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, url: base_url + '/open-cart-modal', success: function (response) {
                    $('#cartModalContent').html(response)
                    $('#cartModalProducts').modal('show');
                }
            });
        }
    });

  

    $(document).on('click', '.cart-action', function () {
        var id = $(this).data('id');
        var qty = $('.itemQuantity').val();
        var checkout = $(this).data('checkout');
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
            var combined = attrLabel + ' : ' + attrId;
            attrArray.push(combined);
        });
        var attributeList = attrArray.join(",");
        $('.cart-action-span').html('Loading..');
        $.ajax({
            type: 'POST', dataType: 'json', data: {
                product_id: id, qty: qty, countRelative: countRelative, attributeList: attributeList
            }, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/add-cart', success: function (response) {
                $('.cart-action-span').html(cartText);
              
          console.log(response);
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
                        if (urlLastSegment == "cart" || urlLastSegment == "checkout") {
                            location.reload();
                        }
                    }
                } else {
                    swal.fire({
                        title: "Oops", text: response.message, icon: "error"
                    });
                }
            }
        });
    });
    /****************** product review load more *************************/
    $(document).on('click', '.load-more-reviews', function () {
      
      
    });
    $(".load-more-reviews").each(function () {
        var review_offset = $('#review_offset').val();
        var product_id = $('#product_id').val();

        loadMoreReviews(product_id, review_offset);
});
    function loadMoreReviews(product_id, review_offset) {
        $.ajax({
            type: 'POST', data: {product_id, review_offset}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/review-load-more', success: function (response) {
                
                if (response != 0) {
                    $('.appendReviewHere' + review_offset).after(response).remove();
                    $('.more-review-section-' + review_offset).remove();
                } else {
                    swal.fire({
                        title: 'Error', text: 'Some error occurred while loading', icon: 'error'
                    });
                }
            }
        });
    }
    $(document).on('click', '.remove-cart-item', function () {
        var id = $(this).data('id');
   
        $.ajax({
            type: 'POST', dataType: 'json', data: {cart_id: id}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/remove-cart-item', success: function (response) {
                if (response.status == true) {
                    $('#cart-item-div-' + id).remove();
                    $('.count').html(response.count);
                    Toast.fire({
                        title: "Done it!", text: response.message, icon: "success"
                    })
                    location.reload();
                } else {
                    Toast.fire('Error', response.message, "error");
                }
            }
        });
    });


    $(document).on('click', '.cancel-remove-cart-item', function () {
        $('.remove-cart-item').data('id', '');
    });
    $(document).on('click', '.login-popup', function () {
        var id = $(this).data('id');
        $('#wishlist_check_' + id).removeClass('fill');
        Toast.fire({
            title: "Oops", text: 'Please login for wish listing a product', icon: "error"
        });

    });

    $(document).on('change', '.cartQuantity', function () {
        $this = $(this);
        var id = $this.data('id');
        var qty = $this.val();
        if (qty >= 1) {
            $.ajax({
                type: 'POST', dataType: 'json', data: {product_id: id, qty: qty}, headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }, url: base_url + '/update-item-quantity', success: function (response) {
                    if (response.status == true) {
                        Toast.fire({
                            title: "Done it!", text: response.message, icon: "success"
                        });
                        // console.log();
                        $('.cart-count').html(response.productCount);
                        // window.location.reload();
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

  //get value according to the cart quantity
    $(document).on('change', '.cartQuantity', function () {
        $this = $(this);
        var id = $this.data('id');
        var qty = $this.val();
        if (qty >= 1) {
            $.ajax({
                type: 'POST', dataType: 'json', data: {product_id: id, qty: qty}, headers: {
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


    // $(document).on('click', '.deliver', function (e) {
    //     e.preventDefault();
    //     $this = $(this);
    //     var address_id = $this.data('id');
    //     var addressType = $this.data('address-type');
    //     $.ajax({
    //         type: 'POST', dataType: 'json', data: {address_id, addressType}, headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }, url: base_url + '/select-customer-address', success: function (response) {
    //             if (response.status == true) {
    //                 Toast.fire({
    //                     title: "Done it!", text: response.message, icon: "success"
    //                 });
    //                 $this.addClass('active');
    //                 location.reload();
    //             } else {
    //                 Toast.fire('Error', response.message, "error");
    //             }
    //         }
    //     });
    // });

    $(document).on('change', '#orderRemarks', function (e) {
        e.preventDefault();
        var remarks = $('#orderRemarks').val();
        $.ajax({
            type: 'POST', dataType: 'json', data: {remarks: remarks}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/add-order-remarks', success: function (response) {
                if (response.status == true) {
                    Toast.fire({
                        title: "Done it!", text: response.message, icon: "success"
                    });
                } else {
                    Toast.fire('Error', response.message, "error");
                }
            }
        });
    });

    $(document).on('click', '.payment_method', function () {
        var payment_method = $(this).val();
        var finalAmount = $('#grand_total_amount').val();
        finalAmount = parseInt(finalAmount.replace(/\,/g, ''));
        $('.order-submit-loader').show();
        $.ajax({
            type: 'POST', dataType: 'json', data: {payment_method}, headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }, url: base_url + '/cod-charge-apply', success: function (response) {
                $('.order-submit-loader').hide();
                if (response.status == true) {
                    $('.cod-charge').show();
                    var finalTotal = parseFloat(finalAmount) + parseFloat(response.cost);
                    $('.cart_final_total').html(response.currency + ' ' + finalTotal.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,'));
                    Toast.fire('Done it!', response.message, "success");
                } else {
                    $('.cod-charge').hide();
                    finalAmount = parseFloat(finalAmount).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                    $('.cart_final_total').html(response.currency + ' ' + finalAmount);
                    $('#grand_total_amount').val(finalAmount);
                    if ($('.cod-charge').css('display') === 'flex') {
                        Toast.fire('Done it!', response.message, "success");
                    }
                }
            }
        });
    });

 

 
    /***************** cart action end **********************/


    $(".menu_image_hover_a").mouseover(function () {
        // console.log($(this).data('img-val'));
        $('.sub_category_img').attr("src", $(this).data('img-val'));
    });

});
