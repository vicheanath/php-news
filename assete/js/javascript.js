$(document).ready(function () {
    $('.menu-icon').click(function () {
        $('.top-menu').slideToggle();
    });

    var slide = $('.slide');
    slide.css({'display':'none'});
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