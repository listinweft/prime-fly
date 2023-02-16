$(".my_wishlist").click(function(){
    $(this).toggleClass("fill") ;
});

$(".colorItemFilterClick").click(function(){
    $(this).toggleClass("active") ;
});

$(".shapeFilterClick").click(function(){
    $(this).toggleClass("active") ;
});

$(".tagFilterClick").click(function(){
    $(this).toggleClass("active") ;
});




//currency changing
$('#language-selector').on('change', function () {
    $("html").attr("lang", this.value);
    $(".language-flag").attr("src", $(this).find(':selected').data('img'));
});
//currency changing


//Home Banner Slider
$('.homeSliderDetails').slick({
    infinite: true, slidesToShow: 1, slidesToScroll: 1, autoplay: false,
    dots: false,
    // draggable: false,
    pauseOnHover: true,
    pauseOnFocus: false,
    cssEase: 'ease-in-out',
    autoplaySpeed: 3000,
    asNavFor: '.homeSliderImages',
    adaptiveHeight: false,
    arrows: false,
});

$('.homeSliderImages').slick({
    infinite: true, slidesToShow: 1, slidesToScroll: 1, autoplay: false,
    dots: false,
    draggable: true,
    pauseOnHover: true,
    pauseOnFocus: false,
    cssEase: 'ease-in-out',
    focusOnSelect: true,
    autoplaySpeed: 3000,
    centerMode: false,
    asNavFor: '.homeSliderDetails',
    arrows: true,
    fade: true,
});

//Home Banner Slider


//Testimonials slider
$('.testimonialsSlider').slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    focusOnSelect: true,
    draggable: true,
    swipeToSlide: true,
    dots: false,
    arrows: true,
    pauseOnHover: false,
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 2, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 1,}
        },
        {
            breakpoint: 575,
            settings: {slidesToShow: 1,}
        },
    ]
});
//Testimonials slider


// category Section slider
$('.categorySliderSmall').slick({
    infinite: true,slidesToShow: 5,slidesToScroll: 1, autoplay: true,
    dots: false,
    roes:0,
    focusOnSelect: true,
    draggable: true,
    swipeToSlide: true,
    arrows: false,
    responsive: [
        {
            breakpoint: 1025,
            settings: {slidesToShow: 5,slidesToScroll: 1,}
        },
        {
            breakpoint: 960,
            settings: {slidesToShow: 6,slidesToScroll: 1,}
        },
        {
            breakpoint: 768,
            settings: {slidesToShow: 5,}
        },
        {
            breakpoint: 525,
            settings: {slidesToShow: 4,}
        },
        {
            breakpoint: 330,
            settings: {slidesToShow: 3,}
        },
    ]
});
// category Section slider

// Related Product slider
$(document).ready(function() {
    $('.relatedSlider').owlCarousel({
        loop: true,
        autoplay:true,
        margin: 15,
        nav: true,
        dots:false,
        autoplayTimeout: 4000,
        smartSpeed: 1000,
        autoplayHoverPause:false,
        responsiveClass: true,
        responsive: {
            0: {
                items: 2,
            },
            525: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1200: {
                items: 4,
            },
            1399: {
                items: 5,
            }
        }
    })
})
// Related Product slider


$('.slider-xzoom').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: false,
    infinite: true,
    focusOnSelect: true,
    vertical: true,
    verticalSwiping: true,

});


$('.productDetailsThumbs').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: false,
    infinite: true,
    vertical: true,
    verticalSwiping: true,
    asNavFor: '.productDetailsLargeImages',
});

$('.productDetailsLargeImages').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: false,
    infinite: true,
    nav: false,
    dots:false,
    asNavFor: '.productDetailsThumbs',
});




//Recent Blog Slider
$('.blogRecentSlider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    focusOnSelect: true,
    vertical: true,
    verticalSwiping: true,
});
//Recent Blog Slider


//Shop Category slider
$('.shopCategorySlider').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay: true,
    infinite: true,
    focusOnSelect: true,
    draggable: true,
    dots: false,
    arrows: true,
    pauseOnHover: false,
    appendArrows: $('.sliderNavShopCategory'),
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 4, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 3,}
        },
        {
            breakpoint: 766.98,
            settings: {slidesToShow: 3,}
        },
        {
            breakpoint: 600,
            settings: {slidesToShow: 2,}
        },
    ]
});
//Shop Category slider


//Price Ranger Start

function numberWithCommas(x) {
    if (x !== null) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
}

$(function() {
    //slider range init set
    $( "#slider-range" ).slider({
        range: true,
        min: 100,
        max: 1000,
        values: [ 100, 1000 ],
        slide: function( event, ui ) {
            $( "#min" ).html(numberWithCommas(ui.values[ 0 ]) );
            $( "#max" ).html(numberWithCommas(ui.values[ 1 ]) );
        }
    });

    //slider range data tooltip set
    var $handler = $("#slider-range .ui-slider-handle");

    $handler.eq(0).append("<b class='amount'><span id='min'>"+numberWithCommas($( "#slider-range" ).slider( "values", 0 )) +"</span></b>");
    $handler.eq(1).append("<b class='amount'><span id='max'>"+numberWithCommas($( "#slider-range" ).slider( "values", 1 )) +"</span></b>");

    //slider range pointer mousedown event
    $handler.on("mousedown",function(e){
        e.preventDefault();
        $(this).children(".amount").fadeIn(300);
    });

    //slider range pointer mouseup event
    $handler.on("mouseup",function(e){
        e.preventDefault();
        $(this).children(".amount").fadeOut(300);
    });
});

//Price Ranger End

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

// Select Billing slider slider
$('.select_billing_address_slider').slick({
    infinite: false,slidesToShow: 2,slidesToScroll: 1, autoplay: false,
    dots: false,
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
    dots: false,
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

$('.address-slider').slick('refresh');

// Select Billing slider slider



//sticky header
$(window).scroll(function () {
    if ($(this).scrollTop() > 40) {
        $('header').addClass('sticky')
    } else {
        $('header').removeClass('sticky')
    }
});
//sticky header

//sticky header
$(window).scroll(function () {
    if ($(this).scrollTop() > 800) {
        $('.bottomStickyBar').addClass('d-block');
    } else {
        $('.bottomStickyBar').removeClass('d-block')
    }
});
//sticky header


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
                items: 2,
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
                items: 4,
            }
        }
    })
})






$(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
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


//Edit Profile go to
$(document).on('click', '#edit_profile_go', function () {
    if ($('#info_box').css('display') === 'block') {
        $('#info_box').addClass('d-none');
        $('#info_box_edit').removeClass('d-none');
    }
    else {
        $('#info_box').removeClass('d-none');
        $('#info_box_edit').addClass('d-none');
    }
});
//Edit Profile go to



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



$(window).on('load', function () {
    $('#loading').hide();
})