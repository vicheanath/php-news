//get Edit Data
tbl.on('click', '.btn-edit', function () {
    var eThis = $(this);
    if (frmOpt == 0) {
        get_edit_menu(eThis);
    } else if (frmOpt == 1) {
        get_edit_news(eThis);
    } else if (frmOpt == 2) {
        get_edit_ads(eThis);
    } else if (frmOpt == 3) {
        get_edit_user(eThis);
    }
});
//Get_Edit_Menu
function get_edit_menu(eThis) {
    var tr = eThis.parents('tr');
    var id = tr.find('td:eq(0)').text();
    var name = tr.find('td:eq(1)').text();
    var color = tr.find('td:eq(3)').text();
    var link = tr.find('td:eq(4)').text();
    var photo = tr.find('td:eq(2) img').attr('alt');
    var od = tr.find('td:eq(5)').text();
    var slide = tr.find('td:eq(6)').text();
    var status = tr.find('td:eq(7)').text();
    trInd = tr.index();
    body.append(popup);
    $('.popup').load("form/" + form[frmOpt] + ".php", function (responseTxt, statusTxt, xhr) {
        if (statusTxt == 'success') {
            body.find('.frm .title').text($('#top-header').find('.title').text());
            body.find('.frm #txt-edit-id').val(id);
            body.find('.frm #txt-id').val(id);
            body.find('.frm #txt-name').val(name);
            body.find('.frm #txt-color').val(color);
            body.find('.frm #txt-link').val(link);
            body.find('.frm #txt-photo').val(photo);
            body.find('.frm #txt-od').val(od);
            body.find('.frm #txt-slide').val(slide);
            body.find('.frm #txt-status').val(status);
            body.find('.frm .img-box').css({
                'background-image': 'url("img/product/' + photo + '")'
            });;
            $('.img-box').prepend(delImg);
        }
        if (statusTxt == "error") {
            alert("Error:" + xhr.status + ":" + xhr.statusText);
        }
    });

}
//Get_Edit_News
function get_edit_news(eThis) {
    var tr = eThis.parents('tr');
    var id = tr.find('td:eq(0)').text();
    trInd = tr.index();
    body.append(popup);
    $('.popup').load("form/" + form[frmOpt] + ".php", function (responseTxt, statusTxt, xhr) {
        if (statusTxt == 'success') {
            body.find('.frm .title').text($('#top-header').find('.title').text());
            $.ajax({
                url: 'action/get_edit_news.php',
                type: 'POST',
                data: {
                    id: id
                },
                cache: false,
                dataType: "json",
                success: function (data) {
                    body.find('.frm #txt-title').val(data[0].title);
                    body.find('.frm #txt-menu').val(data[0].menu_id);
                    body.find('.frm #txt-od').val(data[0].od);
                    body.find('.frm #txt-des').html(data[0].des);
                    body.find('.frm #txt-photo').val(data[0].img);
                    body.find('.frm .img-box').css({
                        'background-image': 'url("img/product/' + data[0].img + '")'
                    });;
                    $('.img-box').prepend(delImg);
                    calleditor();
                },
            });
            body.find('.frm #txt-edit-id').val(id);
            body.find('.frm #txt-id').val(id);

        }
        if (statusTxt == "error") {
            alert("Error:" + xhr.status + ":" + xhr.statusText);
        }
    });

}
//Get_Edit_Ads
function get_edit_ads(eThis) {
    var tr = eThis.parents('tr');
    var id = tr.find('td:eq(0)').text();
    var name = tr.find('td:eq(1)').text();
    var detail = tr.find('td:eq(2)').text();
    var location = tr.find('td:eq(3)').text();
    var photo = tr.find('td:eq(4) img').attr('alt');
    var status = tr.find('td:eq(5)').text();
    trInd = tr.index();
    body.append(popup);
    $('.popup').load("form/" + form[frmOpt] + ".php", function (responseTxt, statusTxt, xhr) {
        if (statusTxt == 'success') {
            body.find('.frm .title').text($('#top-header').find('.title').text());
            body.find('.frm #txt-edit-id').val(id);
            body.find('.frm #txt-id').val(id);
            body.find('.frm #txt-name').val(name);
            body.find('.frm #txt-des').val(detail);
            body.find('.frm #txt-location').val(location);
            body.find('.frm #txt-photo').val(photo);
            body.find('.frm .img-box').css({
                'background-image': 'url("img/product/' + photo + '")'
            });
            $('.img-box').prepend(delImg);
            body.find('.frm #txt-status').val(status);
            calleditor();

        }
        if (statusTxt == "error") {
            alert("Error:" + xhr.status + ":" + xhr.statusText);
        }
    });

}
//Get_edit_User
function get_edit_user(eThis) {
    var tr = eThis.parents('tr');
    var id = tr.find('td:eq(0)').text();
    var name = tr.find('td:eq(1)').text();
    var email = tr.find('td:eq(2)').text();
    var photo = tr.find('td:eq(3) img').attr('alt');
    var type = tr.find('td:eq(5) span').html;
    var status = tr.find('td:eq(6)').text();

    var status = tr.find('td:eq(5)').text();
    trInd = tr.index();
    body.append(popup);
    $('.popup').load("form/" + form[frmOpt] + ".php", function (responseTxt, statusTxt, xhr) {
        if (statusTxt == 'success') {
            body.find('.frm .title').text($('#top-header').find('.title').text());
            calleditor();
            body.find('.frm #txt-edit-id').val(id);
            body.find('.frm #txt-id').val(id);
            body.find('.frm #txt-name').val(name);
            body.find('.frm #txt-email').val(email);
            body.find('.frm #txt-photo').val(photo);
            body.find('.frm .img-box').css({
                'background-image': 'url("img/product/' + photo + '")'
            });;
            $('.img-box').prepend(delImg);
            body.find('.frm #txt-pass').css({
                'display': 'none'
            });
            body.find('.frm .pass').css({
                'display': 'none'
            });
            body.find('.frm #txt-type').val(type);
            body.find('.frm #txt-status').val(status);

        }
        if (statusTxt == "error") {
            alert("Error:" + xhr.status + ":" + xhr.statusText);
        }
    });

}