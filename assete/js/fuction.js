$(document).ready(function() {
    var item = $('.box-content .row-item');
    for(let i=0;i<item.length;i++){
        var menuId = $('.row-item').data("menu");
        contentbox(menuId);
    }

    function contentbox(menuId){
    var load ='<div class="col-6 col-sm-4 col-lg-3 item">'
                +'<div class="img-box">'
                    +'<div class="load-img">'
                +'</div>'
                +'<div class="load-title"></div>'     
                +'<div class="load-title"></div>'     
            +'</div>';
    var eNum = 8;
    var sNum = 0;
    $.ajax({
        url: 'admin/action/get_news_data2.php',
        type: 'POST',
        data: {
            e: eNum,
            s: sNum,
            menuid:menuId,
        },
        cache: false,
        dataType: "json",
        beforeSend: function() {
            for(let i=0 ; i<3 ;i++){
                $('.row-item').append(load);
            }
            
        },
        success: function(data) {
            $('.row-item').html('');
                for(let i=0; i< data.length;i++){
                    var row ='<div class="col-6 col-sm-4 col-lg-3 item">'
							+'<a href="'+data[i].menu_name+'/'+data[i].id+'">'
								+'<div class="img-box">'
									+'<div class="image" style="background-image: url('+url+'admin/img/product/'+data[i].img+')">'
									+'</div>'
								+'</div>'
								+'<div class="title">'+data[i].title+'</div>'
							+'</a>'
                        +'</div>';
                $('.row-item').append(row);
            }           
        },
    });
}
});