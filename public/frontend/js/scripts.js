


    //products slider
    // $('.slider-for').slick({
    //     slidesToShow: 1,
    //     slidesToScroll: 1,
    //     arrows: false,
    //     fade: true,
    //     autoplay:true,
    //     asNavFor: '.slider-nav'
    // });
    // $('.slider-nav').slick({
    //     slidesToShow: 3,
    //     slidesToScroll: 1,
    //     asNavFor: '.slider-for',
    //     //dots: true,
    //     // centerMode: true,
    //     focusOnSelect: true,
    //     vertical: true,
    //     verticalSwiping: true,
    //     autoplay:false,
    //     responsive: [
    //         {
    //             breakpoint: 765,
    //             settings: {slidesToShow: 1,}
    //         },
    //     ]
    // });
    //products slider

    $('.slider-xzoom').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        focusOnSelect: true,
        autoplay:false,
        infinite: true,
        appendArrows: $('.slick-slider-xzoom'),
    });

    //Advertisement slider Start
    $('.advertisement_slider').slick({
        infinite: false, slidesToShow: 1,slidesToScroll: 1, autoplay: true,
        dots: false,
        draggable: false,
        pauseOnHover: false,
        pauseOnFocus: false,
        cssEase: 'ease-in-out',
        autoplaySpeed: 3000,
        cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
        appendArrows: $('.slick-slider-nav'),
    });

    $('.advertisement_slider_mb').slick({
        infinite: false, slidesToShow: 1,slidesToScroll: 1, autoplay: true,
        dots: false,
        draggable: false,
        pauseOnHover: false,
        pauseOnFocus: false,
        cssEase: 'ease-in-out',
        autoplaySpeed: 3000,
        cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
        appendArrows: $('.slick-slider-nav_mb'),
    });
    //Advertisement slider End

    //Special Product slider Start
    $('.special_product_slider').slick({
        infinite: false, slidesToShow: 1,slidesToScroll: 1, autoplay: false,
        dots: false,
        // draggable: false,
        pauseOnHover: false,
        pauseOnFocus: false,
        cssEase: 'ease-in-out',
        autoplaySpeed: 3000,
        asNavFor: '.special_ad_slider',
        appendArrows: $('.slick-slider-nav-sp'),
        adaptiveHeight: true,
    });
    $('.special_ad_slider').slick({
        infinite: false, slidesToShow: 1,slidesToScroll: 1, autoplay: false,
        dots: false,
        // draggable: false,
        pauseOnHover: false,
        pauseOnFocus: false,
        cssEase: 'ease-in-out',
        autoplaySpeed: 3000,
        asNavFor: '.special_product_slider',
    });
    //Special Product slider End



    //Featured Projects SLIDER


    // $('.featured_projects_slider').slick({
    //     infinite: true, slidesToShow: 1,slidesToScroll: 1, autoplay: true,
    //     dots: true,
    //     appendDots: $('.slick-slider-dots'),
    //     responsive: [
    //         {
    //             breakpoint: 1200,
    //             settings: {slidesToShow: 1,slidesToScroll: 1,}
    //         },
    //         {
    //             breakpoint: 992,
    //             settings: {slidesToShow: 1,slidesToScroll: 1,}
    //         },
    //         {
    //             breakpoint: 765,
    //             settings: {slidesToShow: 1,}
    //         },
    //     ]
    // });


    //Featured Projects SLIDER


   $('.color_wrapper_slider').slick({
        infinite: true, slidesToShow: 4,slidesToScroll: 1, autoplay: true,
        dots: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {slidesToShow: 3,slidesToScroll: 1,}
            },
            {
                breakpoint: 992,
                settings: {slidesToShow: 5,slidesToScroll: 1,}
            },
            {
                breakpoint: 765,
                settings: {slidesToShow: 4,}
            },
            {
                breakpoint: 575,
                settings: {slidesToShow: 3,}
            },
        ]
    });


    $('.recently-viewed-slider').slick({
        infinite: true, slidesToShow: 3, slidesToScroll: 1, autoplay: true,
        dots: true, rows: 0,
        responsive: [
            {
                breakpoint: 1200,
                settings: {slidesToShow: 3, slidesToScroll: 1,}
            },
            {
                breakpoint: 992,
                settings: {slidesToShow: 2, slidesToScroll: 1,}
            },
            {
                breakpoint: 765,
                settings: {slidesToShow: 2,}
            },
        ]
    });


    // Home Category Slider
    $('.home_category_slider').slick({
        infinite: true, slidesToShow: 4, slidesToScroll: 1, autoplay: true,
        swipeToSlide: true,
        draggable: true,
        dots: true,
        rows: 0,
        responsive: [
            {
                breakpoint: 1200,
                settings: {slidesToShow: 3, slidesToScroll: 1,}
            },
            {
                breakpoint: 992,
                settings: {slidesToShow: 2, slidesToScroll: 1,}
            },
            {
                breakpoint: 767,
                settings: {slidesToShow: 2,}
            },
        ]
    });


    // Key Features Slider
    $('.key_features_slider').slick({
        infinite: true, slidesToShow: 4,slidesToScroll: 1, autoplay: true,
        dots: true,
        rows: 0,
        responsive: [
            {
                breakpoint: 1200,
                settings: {slidesToShow: 3,slidesToScroll: 1,}
            },
            {
                breakpoint: 992,
                settings: {slidesToShow: 2,slidesToScroll: 1,}
            },
            {
                breakpoint: 575,
                settings: {slidesToShow: 1,}
            },
        ]
    });

    // Order Items Slider
    $('.order_card_slider').slick({
        infinite: false, slidesToShow: 3,slidesToScroll: 1, autoplay: true,
        dots: true,
        rows: 0,
        responsive: [
            {
                breakpoint: 1200,
                settings: {slidesToShow: 2,slidesToScroll: 1,}
            },
            {
                breakpoint: 992,
                settings: {slidesToShow: 2,slidesToScroll: 1,}
            },
            {
                breakpoint: 575,
                settings: {slidesToShow: 1,}
            },
        ]
    });


    //sticky header
    $(window).scroll(function () {
    if ($(this).scrollTop() > 80) {
            $('header').addClass('sticky')
        } else {
            $('header').removeClass('sticky')
        }
    });
    //sticky header




    // services List slider
    $('.services_list_Slider').slick({
        infinite: true, slidesToShow: 6, slidesToScroll: 1, autoplay: true,
        dots: true,
        responsive: [
            {
                breakpoint: 1025,
                settings: {slidesToShow: 4, slidesToScroll: 1,}
            },
            {
                breakpoint: 960,
                settings: {slidesToShow: 3, slidesToScroll: 1,}
            },
            {
            breakpoint: 765,
            settings: {slidesToShow: 2,}
            },
        ]
        });
    // services


    // Select Billing slider slider
    $('.select_billing_address_slider').slick({
        infinite: false,slidesToShow: 2,slidesToScroll: 1, autoplay: false,
        dots: true,
        appendArrows: $('.slick-address-nav1'),
        roes:0,
        responsive: [
            {
                breakpoint: 1025,
                settings: {slidesToShow: 2,slidesToScroll: 1,}
            },
            {
                breakpoint: 960,
                settings: {slidesToShow: 2,slidesToScroll: 1,}
            },
            {
                breakpoint: 768,
                settings: {slidesToShow: 1,}
            },
        ]
    });
    // Select Billing slider slider

    // Select Billing slider slider
    $('.select_shipping_address_slider').slick({
        infinite: false,slidesToShow: 2,slidesToScroll: 1, autoplay: false,
        dots: true,
        appendArrows: $('.slick-address-nav2'),
        roes:0,
        responsive: [
            {
                breakpoint: 1025,
                settings: {slidesToShow: 2,slidesToScroll: 1,}
            },
            {
                breakpoint: 960,
                settings: {slidesToShow: 2,slidesToScroll: 1,}
            },
            {
                breakpoint: 768,
                settings: {slidesToShow: 1,}
            },
        ]
    });
    // Select Billing slider slider


    // MOBILE MENU
    jQuery('.btn-menu-open').on('click', function(){
        jQuery('.mobile-menubar').addClass('open');
    });
    jQuery('.btn-menu-close').on('click', function(){
        jQuery('.mobile-menubar').removeClass('open');
    });

    jQuery('.btn-menu-open').on('click', function(){
        jQuery('.navbar-collapse').addClass('show');
    });
    jQuery('.btn-menu-close').on('click', function(){
        jQuery('.navbar-collapse').removeClass('show');
    });


    // Mega Menu Start

    document.addEventListener("DOMContentLoaded", function(){

        /////// Prevent closing from click inside dropdown
    document.querySelectorAll('.dropdown-menu').forEach(function(element){
        element.addEventListener('click', function (e) {
        e.stopPropagation();
        });
    });

    // make it as accordion for smaller screens
    if (window.innerWidth < 992) {

        // close all inner dropdowns when parent is closed
        document.querySelectorAll('.navbar .dropdown').forEach(function(everydropdown){
        everydropdown.addEventListener('hidden.bs.dropdown', function () {
            // after dropdown is hidden, then find all submenus
            this.querySelectorAll('.megasubmenu').forEach(function(everysubmenu){
                // hide every submenu as well
                everysubmenu.style.display = 'none';
            });
        })
        });

        document.querySelectorAll('.has-megasubmenu a').forEach(function(element){
        element.addEventListener('click', function (e) {

            let nextEl = this.nextElementSibling;
            if (nextEl && nextEl.classList.contains('megasubmenu')) {
                // prevent opening link if link needs to open dropdown
                e.preventDefault();

                if (nextEl.style.display == 'block') {
                    nextEl.style.display = 'none';
                } else {
                    nextEl.style.display = 'block';
                }

            }
        });
        })
    }
        // end if innerWidth
    });

    // Mega Menu End


    $(".my_wishlist").click(function(){
        $(this).toggleClass("fill") ;
    })


    $(document).ready(function() {
        $('.our-works-slider').owlCarousel({
          loop: false,
          autoplay:false,
          margin: 15,
          nav: true,
          dots:false,
          autoplayTimeout: 4000,
          smartSpeed: 1000,
          autoplayHoverPause:false,
          responsiveClass: true,
          responsive: {
            0: {
              items: 1,
            },
            525: {
              items: 2,
            },
            992: {
              items: 3,
            },
            1200: {
              items: 3,
            },
            1399: {
              items: 3,
            }
          }
        })
      })


    //Edit Profile go to
    $(document).on('click', '#edit_profile_go', function () {
        $('#button_edit').removeClass('d-none');
        // if ($('#button_edit').css('display') === 'block') {
        //     // $('#info_box_edit').removeClass('d-none');
        // }
        // else {
        //     $('#button_edit').addClass('d-none');
        //     // $('#info_box_edit').addClass('d-none');
        // }
    });
    //Edit Profile go to


    //Order Details go to
    $(document).on('click', '#my_order_details_go', function () {
        
        var id = $(this).data('id');
      
        if ($('#my_order_list'+id).css('display') === 'block') {
            $('#my_order_list'+id).addClass('d-none');
            $('#my_order_list_details'+id).removeClass('d-none');
        }
        else {
            $('#my_order_list'+id).removeClass('d-none');
            
            $('#my_order_list_details'+id).addClass('d-none');
        }
    });
    //Order Details go to

    //Add Bill Address go to
    $(document).on('click', '#add_address_go', function () {
        if ($('#my_address_list').css('display') === 'block') {
            
            $('#my_address_list').addClass('d-none');
            $('#my_address_add_form').removeClass('d-none');
        }
        else {
            $('#my_address_list').removeClass('d-none');
            $('#my_address_add_form').addClass('d-none');
        }
    });
    //Add Address go to

    //Add Ship Address go to
    $(document).on('click', '#add_address_ship_go', function () {
        if ($('#my_address_list_ship').css('display') === 'block') {
            $('#my_address_list_ship').addClass('d-none');
            $('#my_address_add_form_2').removeClass('d-none');
        }
        else {
            $('#my_address_list_ship').removeClass('d-none');
            $('#my_address_add_form_2').addClass('d-none');
        }
    });
    //Order Ship Address go to


    //QUANTITY COUNTER
    jQuery('.quantity-counter').each(function() {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.btn-quantity-up'),
            btnDown = spinner.find('.btn-quantity-down'),
            min = input.attr('min'),
            max = input.attr('max');

        btnUp.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

    });

    //Add Checkout Bill Address go to
    $(document).on('click', '#add_checkout_bill_address', function () {
        if ($('#bill_address_list').css('display') === 'block') {
            // $('#bill_address_list').addClass('d-none');
            $('#add_bill_address_form').removeClass('d-none');
        }
        else {
            // $('#bill_address_list').removeClass('d-none');
            $('#add_bill_address_form').addClass('d-none');
        }
    });
    //Add Checkout Bill Address go to

    //Add Checkout Shipping Address go to
    $(document).on('click', '#add_checkout_ship_address', function () {
        if ($('#bill_address_list').css('display') === 'block') {
            // $('#bill_address_list').addClass('d-none');
            $('#add_ship_address_form').removeClass('d-none');
        }
        else {
            // $('#bill_address_list').removeClass('d-none');
            $('#add_ship_address_form').addClass('d-none');
        }
    });
    //Add Checkout Shipping Address go to


    $(window).on('load', function () {
        $('#loading').hide();
    })
