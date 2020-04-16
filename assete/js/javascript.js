$(document).ready(function(){
    $('.menu-icon').click(function(){
        $('.top-menu').slideToggle();
    });
    $('.over-read').mouseover(function(){
        var eThis = $(this);
        eThis.css("color","rgb(242, 13, 24)");
        eThis.find('.bg').css("opacity","1");
    });
    $('.over-read').mouseout(function(){
        var eThis = $(this);
        eThis.css("color","rgb(255, 255, 255)");
        eThis.find('.bg').css("opacity","0.5");
    });


    // Slide
    var slide = $('.slide');
    var ind = 0;
    var numSlide = slide.length;
    slide.eq(0).show();
    $('#next').click(function(){
        ind++;
        slide.hide();
        slide.eq(ind).show();
        if(ind>numSlide-1){
            ind=0;
            slide.eq(0).show();
        }
    });
    $('#pre').click(function(){
        ind--;
        slide.hide();
        slide.eq(ind).show();
        if(ind<0){
            slide.hide();
            ind=numSlide-1;
            slide.eq(ind).show();
        }
    });
    // var myVar;
    // myVar = setInterval(autoSlide,3000);
    // function autoSlide(){
    //     ind++;
    //     slide.hide();
    //     slide.eq(ind).show();
    //     if(ind>numSlide-1){
    //         ind=0;
    //         slide.eq(0).show();
    //     }
    // }

   $('body').on('click','menu li',function(){
       alert(1);
        $(this).addClass( "active" );
   });
   $('body').on('click','#btn-more',function(){
        var e = $('#e');
        var s = $('#s');
        var menu_id = $('#menu-id');
        var menuname = $('#menu-name');
        var eThis = $(this);
        $.ajax({
            url: 'more-data.php',
            type: 'POST',
            data: {
                e:e.val(),
                s:s.val(),
                menuid:menu_id.val(),
            },
            cache: false,
            dataType: "json",
            beforeSend: function() {
                eThis.html('<i class="fas fa-circle-notch fa-spin"></i>');
            },
            success: function(data) {
                for( var i=0;i< data.length;i++){
                    var catItem='<a href="'+menuname.val()+'/'+data[i].id+'">'
                                    +'<div class="cate-item">'
                                    + '<div class="image-item" style="background: url(\'admin/img/product/'+data[i].img+'\')"></div>'
                                    + '<div class="detail">'
                                        + '<div class="title">'+data[i].title+'-'+data[i].id+'</div>'
                                            +'<span></span>'
                                        + ' <div class="date-post">'+data[i].date+' </div>'
                                        +'</div>'
                                    +'</div>'
                                +'</a>';
                eThis.before(catItem);
                }
            s.val(parseInt(s.val())+1);
            e.val(parseInt(e.val())+1);
            eThis.html('more');
            },

        });
   });
        
});