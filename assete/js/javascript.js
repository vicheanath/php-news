$(document).ready(function () {
    $('.menu-icon').click(function () {
        $('.top-menu').slideToggle();
    });
    $('.over-read').mouseover(function () {
        var eThis = $(this);
        eThis.css("color", "rgb(242, 13, 24)");
        eThis.find('.bg').css("opacity", "1");
    });
    $('.over-read').mouseout(function () {
        var eThis = $(this);
        eThis.css("color", "rgb(255, 255, 255)");
        eThis.find('.bg').css("opacity", "0.5");
    });


    // Slide
    var slide = $('.slide');
    var ind = 0;
    var numSlide = slide.length;
    slide.eq(0).show();
    $('#next').click(function () {
        ind++;
        slide.hide();
        slide.eq(ind).show();
        if (ind > numSlide - 1) {
            ind = 0;
            slide.eq(0).show();
        }
    });
    $('#pre').click(function () {
        ind--;
        slide.hide();
        slide.eq(ind).show();
        if (ind < 0) {
            slide.hide();
            ind = numSlide - 1;
            slide.eq(ind).show();
        }
    });
    /* autoSlide();
    var myVar;
    myVar = setInterval(autoSlide,5000);
    function autoSlide(){
        ind++;
        slide.hide();
        slide.eq(ind).show();
        if(ind>numSlide-1){
            ind=0;
            slide.eq(0).show();
        }
    } */

    $('body').on('click', 'menu li', function () {
        alert(1);
        $(this).addClass("active");
    });
});