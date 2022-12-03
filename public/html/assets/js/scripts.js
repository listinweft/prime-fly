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


$(window).scroll(function () {
    if ($(".go-top").offset().top > 1050) {
        $(".go-top").addClass("go-top-no");
    } else {
        $(".go-top").removeClass("go-top-no");
    }
});

