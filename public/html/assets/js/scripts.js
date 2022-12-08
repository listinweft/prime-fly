$(".my_wishlist").click(function(){
    $(this).toggleClass("fill") ;
})


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


//Testimonials slider
$('.shopCategorySlider').slick({
    slidesToShow: 6,
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
            settings: {slidesToShow: 5, slidesToScroll: 1,}
        },
        {
            breakpoint: 991.98,
            settings: {slidesToShow: 4,}
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
//Testimonials slider


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



$(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});