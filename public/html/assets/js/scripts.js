
//currency changing
$('#language-selector').on('change', function() {
    $("html").attr("lang", this.value);
    $(".language-flag").attr("src",$(this).find(':selected').data('img'));
});
//currency changing




//Our Experts Slider
$('.expertsSlider').slick({
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    dots: true,
    arrows: false,
    row: 0,
    draggable: true,
    swipeToSlide: true,
    responsive: [{
        breakpoint: 1099, settings: {slidesToShow: 4, slidesToScroll: 1,}
    }, {
        breakpoint: 900, settings: {slidesToShow: 3, slidesToScroll: 1,}
    }, {
        breakpoint: 576, settings: {slidesToShow: 2,}
    },]
});
//Our Experts Slider

//Our Solutions Home Slider
$('.ourSolutionsSlider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    dots: true,
    arrows: false,
    row: 0,
});
//Our Solutions Home Slider



//Our Brands Home Slider
$('.ourBrandSlider').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    dots: true,
    arrows: false,
    row: 0,
    draggable: true,
    swipeToSlide: true,
    centerMood: true,
    responsive: [{
        breakpoint: 3000, settings: {slidesToShow: 4, slidesToScroll: 1, vertical: true, verticalSwiping: true, focusOnSelect: true,}
    }, {
        breakpoint: 991.98, settings: {slidesToShow: 3, slidesToScroll: 1,}
    }, {
        breakpoint: 766.8, settings: {slidesToShow: 2,}
    },]
});
//Our Brands Home Slider

//Follow Instagram Slider
$(document).ready(function() {
    $('.followInstagramSlider').owlCarousel({
        loop: true,
        autoplay:true,
        margin: 20,
        nav: false,
        dots:false,
        autoplayTimeout: 4000,
        smartSpeed: 1000,
        autoplayHoverPause:true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
            },
            575: {
                items: 1,
            },
            767: {
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
//Follow Instagram Slider

//Home Blog Slider Slider
$(document).ready(function() {
    $('.homeBlogSlider').owlCarousel({
        loop: true,
        autoplay:true,
        margin: 20,
        nav: false,
        dots:false,
        autoplayTimeout: 4000,
        smartSpeed: 1000,
        autoplayHoverPause:true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                margin:12,
            },
            380: {
                items: 2,
                margin:12,
            },
            767: {
                items: 2,
            },
            992: {
                items: 3,
            },
            1200: {
                items: 4,
            },
            1399: {
                items: 4,
            }
        }
    })
})
//Home Blog Slider Slider

//Testimonials slider
$('.testimonials_slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay:true,
    infinite: true,
    appendArrows: $('.slick-slider-xzoom'),
    focusOnSelect: true,
    vertical: true,
    verticalSwiping: true,
    draggable: true,
    dots: true,
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 3,slidesToScroll: 1,}
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

//History Slider
$(document).ready(function() {
    $('.historySlider').owlCarousel({
        loop: true,
        autoplay:true,
        margin: 25,
        nav: false,
        dots:false,
        autoplayTimeout: 4000,
        smartSpeed: 1000,
        autoplayHoverPause:true,
        responsiveClass: true,
        autoHeight: true,
        responsive: {
            0: {
                items: 1,
                margin:12,

                stagePadding: 20,
            },
            380: {
                items: 1,
                margin:15,
                stagePadding: 20,
            },
            767: {
                items: 1,
                margin:15,
                stagePadding: 80,
            },
            992: {
                items: 1,
                stagePadding: 120,
            },
            1200: {
                items: 1,
                stagePadding: 180,
            },
            1399.98: {
                items: 2,
                stagePadding: 110,
            }
        }
    })
})
//History Slider

//About Page Map Slider
$('.mapSlider').slick({
    infinite: true, slidesToShow: 1, slidesToScroll: 1, autoplay: false,
    dots: false,
    // draggable: false,
    pauseOnHover: true,
    pauseOnFocus: false,
    cssEase: 'ease-in-out',
    autoplaySpeed: 3000,
    asNavFor: '.mapSliderThumbnail',
    adaptiveHeight: false,
    arrows: false,
});

$('.mapSliderThumbnail').slick({
    infinite: true, slidesToShow: 3, slidesToScroll: 1, autoplay: false,
    dots: false,
    // draggable: false,
    pauseOnHover: true,
    pauseOnFocus: false,
    cssEase: 'ease-in-out',
    focusOnSelect: true,
    autoplaySpeed: 3000,
    centerMode: false,
    centerPadding: '0%',
    asNavFor: '.mapSlider',
    arrows: false,
    row:0,
    responsive: [
        {
            breakpoint: 1199.98,
            settings: {slidesToShow:2, slidesToScroll: 1,}
        },
        {
            breakpoint: 766.98,
            settings: {slidesToShow: 1,}
        },
    ]
});

//About Page Map Slider


//More Solutions Slider
$('.moreSolutionsSlider').slick({
    slidesToShow: 6,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay:true,
    infinite: true,
    swipeToSlide: true,
    draggable: true,
    dots: false,
    responsive: [
        {
            breakpoint: 1399.98,
            settings: {slidesToShow: 5,slidesToScroll: 1,}
        },
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 4,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 3,}
        },
        {
            breakpoint: 766.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 410,
            settings: {slidesToShow: 1,}
        },
    ]
});
//More Solutions Slider

//More Solutions Slider
$('.otherSolutionsSlider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay:true,
    infinite: true,
    swipeToSlide: true,
    draggable: true,
    dots: false,
    responsive: [
        {
            breakpoint: 1399.98,
            settings: {slidesToShow: 3,slidesToScroll: 1,}
        },
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 3,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 766.98,
            settings: {slidesToShow: 2,}
        },
        {
            breakpoint: 555,
            settings: {slidesToShow: 1,}
        },
    ]
});
//More Solutions Slider


//Home Image Slider
$('.homeSliderImages').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    dots: false,
    arrows: false,
    fade: true,
    row: 0,
    pauseOnHover:true,
    asNavFor: '.homeThumbnailSlider, .homeSliderDetails',
});
//Home Image Slider

//Home Image Slider
$('.homeSliderDetails').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    dots: false,
    arrows: false,
    fade: true,
    focusOnSelect: true,
    pauseOnHover:true,
    row: 0,
    asNavFor: '.homeThumbnailSlider, .homeSliderImages',
});
//Home Image Slider

//Home Thumbnail Slider
$('.homeThumbnailSlider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    focusOnSelect: true,
    autoplay:true,
    infinite: true,
    swipeToSlide: true,
    draggable: true,
    dots: false,
    centerMode: true,
    arrows: false,
    centerPadding: '0px',
    cssEase: 'ease-in-out',
    pauseOnHover:true,
    asNavFor: '.homeSliderImages, .homeSliderDetails',
    responsive: [
        {
            breakpoint: 1399.98,
            settings: {slidesToShow: 3,slidesToScroll: 1,}
        },
        {
            breakpoint: 1199.98,
            settings: {slidesToShow: 3,}
        },
    ]
});
//Home Thumbnail Slider



//sticky header
$(window).scroll(function () {
    if ($(this).scrollTop() > 40) {
        $('header').addClass('sticky')
    } else {
        $('header').removeClass('sticky')
    }
});
//sticky header


$(".contactSelect").select2({
    placeholder: "Select your service",
    allowClear: true
});



//Our Works Navigation Start

$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        console.log('yes');
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');

        }

        if ($(".filter-button").removeClass("active")) {
            $(this).removeClass("active");
        }
        $(this).addClass("active");
    });

});

$(".dropdown-menu li a").click(function(){
    var selText = $(this).text();
    $(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
});

//Our Works Navigation End



    $(window).scroll(function() {
    if ($(".go-top").offset().top > 1050) {
    $(".go-top").addClass("go-top-no");
} else {
    $(".go-top").removeClass("go-top-no");
}
});

