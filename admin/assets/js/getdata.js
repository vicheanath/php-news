//get_Menu data
function get_menu_data() {
    var trHead = '<tr> <th>ID</th> <th>Menu Name</th> <th>Photo</th> <th>Color</th> <th>Link</th> <th>OD</th> <th>Slide</th> <th>Status</th> <th>Action</th> </tr>';
    tbl.html(trHead);
    $.ajax({
        url: 'action/get_menu_data.php',
        type: 'POST',
        data: {
            tbl: frmOpt,
            e: eNum.val(),
            s: sNum
        },
        cache: false,
        dataType: "json",
        beforeSend: function() {
            body.append(loading);
        },
        success: function(data) {
            var dataNum = data.length;
            var tr = '';
            for (var i = 0; i < dataNum; i++) {
                var img = '<img class="img-tbl" src="img/product/' + data[i].img + '" data-img="img/product/' + data[i].img + '" alt="' + data[i].img + '">';
                tr += '<tr>' +
                    '<td width="60px">' + data[i].id + '</td>' +
                    '<td>' + data[i].name + '</td>' +
                    '<td width="55px">' + img + '</td>' +
                    '<td width="55px" style="background:' + data[i].color + '">' + data[i].color + '</td>' +
                    '<td width="55px">' + data[i].link + '</td>' +
                    '<td width="55px">' + data[i].od + '</td>' +
                    '<td width="55px">' + data[i].slide + '</td>' +
                    '<td width="60px">' + data[i].status + '</td>' +
                    '<td width="55px">' + btnEdit + '</td>' +
                    '</tr>';
            }
            tbl.append(tr);
            body.find('.loading').remove();
        },
    });
}
//get_News data
function get_news_data() {
    var trHead = '<tr> <th>ID</th> <th>DateTime</th> <th>Title</th> <th>Image</th> <th>Od</th> <th>Category</th> <th>Status</th> <th>Action</th> </tr>';
    tbl.html(trHead);
    $.ajax({
        url: 'action/get_news_data.php',
        type: 'POST',
        data: {
            tbl: frmOpt,
            e: eNum.val(),
            s: sNum
        },
        cache: false,
        dataType: "json",
        beforeSend: function() {
            body.append(loading);
        },
        success: function(data) {
            var dataNum = data.length;
            var tr = '';
            for (var i = 0; i < dataNum; i++) {
                var img = '<img class="img-tbl" src="img/product/' + data[i].img + '" data-img="img/product/' + data[i].img + '" alt="' + data[i].img + '">';
                tr += '<tr>' +
                    '<td width="60px">' + data[i].id + '</td>' +
                    '<td width="100px">' + data[i].date + '</td>' +
                    '<td>' + data[i].title + '</td>' +
                    '<td width="55px">' + img + '</td>' +
                    '<td  width="55px">' + data[i].od + '</td>' +
                    '<td  width="55px">' + data[i].menu_id + '</td>' +
                    '<td width="60px">' + data[i].status + '</td>' +
                    '<td width="55px">' + btnEdit + '</td>' +
                    '</tr>';

            }
            tbl.append(tr);
            body.find('.loading').remove();

        },
    });
}
//get_User data
function get_user_data() {
    var trHead = '<tr> <th>ID</th> <th>Name</th> <th>Email</th> <th>Photo</th> <th>IP</th> <th>Type</th> <th>Status</th> <th>Action</th> </tr>';
    tbl.html(trHead);
    $.ajax({
        url: 'action/get_user_data.php',
        type: 'POST',
        data: {
            tbl: frmOpt,
            e: eNum.val(),
            s: sNum
        },
        cache: false,
        dataType: "json",
        beforeSend: function() {
            body.append(loading);
        },
        success: function(data) {
            var dataNum = data.length;
            var tr = '';
            for (var i = 0; i < dataNum; i++) {
                var type = ['', 'Admin', 'Editor', 'ContentWriter']
                var typeUser = data[i].type;
                typeUser = type[typeUser];
                var img = '<img class="img-tbl" src="img/product/' + data[i].img + '" data-img="img/product/' + data[i].img + '" alt="' + data[i].img + '">';
                tr += '<tr>' +
                    '<td width="60px">' + data[i].id + '</td>' +
                    '<td>' + data[i].name + '</td>' +
                    '<td>' + data[i].email + '</td>' +
                    '<td width="55px">' + img + '</td>' +
                    '<td width="55px">' + data[i].ip + '</td>' +
                    '<td width="55px"><span style="display:none">' + data[i].type + '</span>' + typeUser + '</td>' +
                    '<td width="60px">' + data[i].status + '</td>' +
                    '<td width="55px">' + btnEdit + '</td>' +
                    '</tr>';

            }
            tbl.append(tr);
            body.find('.loading').remove();

        },
    });
}
//get_Ads data
function get_ads_data() {
    var trHead = '<tr> <th>ID</th> <th>Name</th> <th>Dtail</th> <th>Location</th> <th>Img</th> <th>Status</th> <th>Action</th> </tr>';
    tbl.html(trHead);
    $.ajax({
        url: 'action/get_ads_data.php',
        type: 'POST',
        data: {
            tbl: frmOpt,
            e: eNum.val(),
            s: sNum
        },
        cache: false,
        dataType: "json",
        beforeSend: function() {
            body.append(loading);
        },
        success: function(data) {
            var dataNum = data.length;
            var tr = '';
            for (var i = 0; i < dataNum; i++) {
                var img = '<img class="img-tbl" src="img/product/' + data[i].img + '" data-img="img/product/' + data[i].img + '" alt="' + data[i].img + '">';
                tr += '<tr>' +
                    '<td width="60px">' + data[i].id + '</td>' +
                    '<td>' + data[i].name + '</td>' +
                    '<td>' + data[i].detail + '</td>' +
                    '<td width="55px">' + data[i].location + '</td>' +
                    '<td width="55px">' + img + '</td>' +
                    '<td width="60px">' + data[i].status + '</td>' +
                    '<td width="55px">' + btnEdit + '</td>' +
                    '</tr>';

            }
            tbl.append(tr);
            body.find('.loading').remove();

        },
    });
}