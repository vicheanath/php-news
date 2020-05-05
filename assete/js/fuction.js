$(document).ready(function () {
    // Date
    moment.locale('km');
    var dateT = $('.datef').html();
    var datefor = formarDateTime(dateT);
    $('.datef').html(datefor);
    // frmat Datime 
    function formarDateTime(date) {
        var day = moment(date).format('dddd[,]​');
        var formateDate = moment(dateT).format('​Do​​ [ខែ] MMMM [ឆ្នាំ] YYYY, h:mm:ss a');
        var dateTime = day + ' ' + formateDate;
        return dateTime;
    }

    if (window.location.href == url) {
        // getSlide();
        for (let i = 0; i < 4; i++) {
            $.ajax({
                url: 'admin/action/get_slide_data.php',
                type: 'POST',
                data: {
                    slide: i + 1,
                },
                cache: false,
                dataType: "json",
                success: function (data) {
                    for (let i = 0; i < data.length; i++) {
                        var slide = '<div class="col-sm-6 slide">' +
                            '<a href="' + data[i].namelink + '"><span class="yellow" style="background: ' + data[i].color + '">' + data[i].cate + '</span></a>' +
                            '<a href="' + data[i].namelink + '/' + data[i].id + '" class="over-read">' +
                            '<div class="image-slide" style="background-image: url(\'admin/img/product/' + data[i].img + '\');"></div>' +
                            '<div class="bg"></div>' +
                            '<div class="main-des">' +
                            '<div class="title">' + data[i].title + '</div>' +
                            '</div>' +
                            '<div class="date datef">' + formarDateTime(data[i].date) + '</div>' +
                            '</a>' +
                            '</div>';
                        $('#slide-body').append(slide);
                    }
                },
            });
        }
        $('.bg').mouseover(function () {
            console.log(1);
            var eThis = $(this);
            eThis.css("color", "rgb(242, 13, 24)");
            eThis.css("opacity", "1");
        });
        $('.bg').mouseout(function () {
            var eThis = $(this);
            eThis.css("color", "rgb(255, 255, 255)");
            eThis.css("opacity", "0.5");
        });
        // Get category
        var eNum = 8;
        var sNum = 0;
        var home = true;
        $.ajax({
            url: 'admin/action/get_menu_data.php',
            type: 'POST',
            data: {
                e: eNum,
                s: sNum,
                home: home,
            },
            cache: false,
            dataType: "json",
            success: function (data) {
                for (let i = 0; i < data.length; i++) {
                    var hreader = '<a href="' + data[i].link + '">'
                        + ' <div class="category yellow" style="background: ' + data[i].color + '"><span></span>' + data[i].name + '</div>'
                        + ' </a>'
                        + '<div class="box-content b-yellow" style="border-top:2px solid ' + data[i].color + '">'
                        + '<div class="row row-item" id="' + data[i].link + '">'
                        + '</div>'
                        + '</div>'
                    $('.main-body').append(hreader);
                    contentbox(data[i].id, data[i].link);
                }
            },
        });

        function contentbox(menuId, link) {
            var eThis = $('#' + link);
            var load = '<div class="col-6 col-sm-4 col-lg-3 item load" >'
                + '<div class="img-box">'
                + '<div class="load-img">'
                + '</div>'
                + '<div class="load-title"></div>'
                + '<div class="load-title"></div>'
                + '</div>';
            var eNum = 8;
            var sNum = 0;
            $.ajax({
                url: 'admin/action/get_news_data2.php',
                type: 'POST',
                data: {
                    e: eNum,
                    s: sNum,
                    menuid: menuId,
                },
                cache: false,
                dataType: "json",
                beforeSend: function () {
                    for (let i = 0; i < 2; i++) {
                        $('.row-item').append(load);
                    }
                },
                success: function (data) {
                    for (let i = 0; i < data.length; i++) {
                        var row = '<div class="col-6 col-sm-4 col-lg-3 item" >'
                            + '<a href="' + data[i].menu_link + '/' + data[i].id + '">'
                            + '<div class="img-box">'
                            + '<div class="image" style="background-image: url(' + url + 'admin/img/product/' + data[i].img + ')">'
                            + '</div>'
                            + '</div>'
                            + '<div class="title">' + data[i].title + '</div>'
                            + '</a>'
                            + '</div>';
                        eThis.append(row);
                    }
                    $('.load').remove();
                },
            });
        }
    }
});