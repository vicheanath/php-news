//Add Data ti my sql
body.on('click', '.frm .btn-post', function() {
    var eThis = $(this);
    if (frmOpt == 0) {
        saveMenu(eThis);
    } else if (frmOpt == 1) {
        saveNews(eThis);
    } else if (frmOpt == 2) {
        saveAds(eThis);
    } else if (frmOpt == 3) {
        alert(1);
        saveUser(eThis);
    }
});
//save Menu
function saveMenu(eThis) {
    var frm = eThis.closest('form.upl');
    var frm_data = new FormData(frm[0]);
    var parent = eThis.parents('.frm');
    var id = parent.find('#txt-id');
    var name = parent.find('#txt-name');
    var color = parent.find('#txt-color');
    var link = parent.find('#txt-link');
    var od = parent.find('#txt-od');
    var status = parent.find('#txt-status');
    var photo = parent.find('#txt-photo');
    if (name.val() == '') {
        alert("Plese Input name..");
        name.focus();
        return;
    } else if (color.val() == '') {
        alert("Plese Color name..");
        color.focus();
        return;
    }
    $.ajax({
        url: 'action/save_menu.php',
        type: 'POST',
        data: frm_data,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        beforeSend: function() {
            eThis.css({
                'pointer-events': 'none',
                'opacity': '0.7'
            });
            eThis.html(myWait);
        },
        success: function(data) {
            if (data.dpl == true) {
                alert("Douplicate name..");
                eThis.css({
                    'pointer-events': 'auto',
                    'opacity': '1'
                });
                eThis.html('+Save');
                return;
            }
            if (data.edit == true) {
                tbl.find('tr:eq(' + trInd + ') td:eq(1)').text(name.val());
                tbl.find('tr:eq(' + trInd + ') td:eq(2) img').attr('src', 'img/product/' + photo.val() + '');
                tbl.find('tr:eq(' + trInd + ') td:eq(2) img').attr('alt', photo.val());
                tbl.find('tr:eq(' + trInd + ') td:eq(3)').text(color.val());
                tbl.find('tr:eq(' + trInd + ') td:eq(4)').text(link.val());
                tbl.find('tr:eq(' + trInd + ') td:eq(5)').text(od.val());
                tbl.find('tr:eq(' + trInd + ') td:eq(6)').text(status.val());
                tbl.find('tr:eq(' + trInd + ') td').css({
                    'background': '#CD3235',
                    'color': '#fff'
                });
                body.find('.popup').remove();
                return;
            }
            //appen tr
            var img = '<img class="img-tbl" src="img/product/' + photo.val() + '" data-img="img/product/' + photo.val() + '" alt="' + photo.val() + '">';
            var tr = "<tr> <td>" + id.val() + "</td> <td>" + name.val() + "</td> <td>" + img + "</td> <td>" + color.val() + "</td> <td>" + od.val() + "</td> <td>" + status.val() + "</td> <td>" + btnEdit + "</td> </tr>";
            tbl.find('tr:eq(0)').after(tr);
            eThis.css({
                'pointer-events': 'auto',
                'opacity': '1'
            });
            eThis.html('+Save');
            id.val(parseInt(data.id) + 1);
            od.val(parseInt(data.id) + 1);
            name.val('');
            photo.val('');
            $('.img-box').css({
                'background-image': 'url("img/u-img/img.png")'
            });
            $('.del-img').remove();

        },
    });
}
//save news
function saveNews(eThis) {
    var parent = eThis.parents('.frm');
    var edit_id = parent.find('#txt-edit-id');
    var desc = tinymce.get('txt-des').getContent();
    var id = parent.find('#txt-id');
    var title = parent.find('#txt-title');
    var menu = parent.find('#txt-menu');
    var status = parent.find('#txt-status');
    var photo = parent.find('#txt-photo');
    var od = parent.find('#txt-od');
    var des = parent.find('.txt-des');
    var date = parent.find('#txt-date');
    console.log(desc);
    des.val(desc);
    if (title.val() == '') {
        alert("Plese Input title..");
        title.focus();
        return;
    }

    if (menu.val() == '0') {
        alert("Plese Select Category..");
        menu.focus();
        return;
    }
    $.ajax({
        url: 'action/save_news.php',
        type: 'POST',
        data: {
            edit_id: edit_id.val(),
            id: id.val(),
            title: title.val(),
            menu: menu.val(),
            status: status.val(),
            photo: photo.val(),
            od: od.val(),
            des: des.val(),
        },
        beforeSend: function() {
            eThis.css({
                'pointer-events': 'none',
                'opacity': '0.7'
            });
            eThis.html(myWait);
        },
        success: function(data) {
            if (data.edit == true) {
                tbl.find('tr:eq(' + trInd + ') td:eq(1)').text(id.val());
                tbl.find('tr:eq(' + trInd + ') td:eq(2) img').attr('src', 'img/product/' + photo.val() + '');
                tbl.find('tr:eq(' + trInd + ') td:eq(2) img').attr('alt', photo.val());
                tbl.find('tr:eq(' + trInd + ') td:eq(3)').text(od.val());
                tbl.find('tr:eq(' + trInd + ') td:eq(4)').text(status.val());
                tbl.find('tr:eq(' + trInd + ') td').css({
                    'background': '#CD3235',
                    'color': '#fff'
                });
                body.find('.popup').remove();
                return;
            }
            //appen tr
            var img = '<img class="img-tbl" src="img/product/' + photo.val() + '" data-img="img/product/' + photo.val() + '" alt="' + photo.val() + '">';
            var tr = "<tr>" +
                "<td>" + id.val() + "</td>" +
                "<td>" + date.val() + "</td>" +
                "<td>" + title.val() + "</td>" +
                "<td>" + img + "</td>" +
                "<td>" + od.val() + "</td>" +
                "<td>" + menu.val() + "</td>" +
                "<td>" + status.val() + "</td>" +
                "<td>" + btnEdit + "</td>" +
                "</tr>";
            tbl.find('tr:eq(0)').after(tr);
            eThis.css({
                'pointer-events': 'auto',
                'opacity': '1'
            });
            eThis.html('+Save');
            id.val(parseInt(data.id) + 1);
            od.val(parseInt(data.id) + 1);
            title.val('');
            photo.val('');
            $('.img-box').css({
                'background-image': 'url("img/u-img/img.png")'
            });
            $('.del-img').remove();

        },
    });
}
//save User
function saveUser(eThis) {
    var frm = eThis.closest('form.upl');
    var frm_data = new FormData(frm[0]);
    var parent = eThis.parents('.frm');
    var id = parent.find('#txt-id');
    var name = parent.find('#txt-name');
    var email = parent.find('#txt-email');
    var pass = parent.find('#txt-pass');
    var status = parent.find('#txt-status');
    var photo = parent.find('#txt-photo');
    var type = parent.find('#txt-type');
    if (name.val() == '') {
        alert("Plese Input name..");
        name.focus();
        return;
    } else if (email.val() == '') {
        alert("Plese email..");
        email.focus();
        return;
    }
    $.ajax({
        url: 'action/save_user.php',
        type: 'POST',
        data: frm_data,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        beforeSend: function() {
            eThis.css({
                'pointer-events': 'none',
                'opacity': '0.7'
            });
            eThis.html(myWait);
        },
        success: function(data) {
            if (data.dpl == true) {
                alert("Douplicate name..");
                eThis.css({
                    'pointer-events': 'auto',
                    'opacity': '1'
                });
                eThis.html('+Save');
                return;
            }
            if (data.edit == true) {
                tbl.find('tr:eq(' + trInd + ') td:eq(0)').text(id.val());
                tbl.find('tr:eq(' + trInd + ') td:eq(1)').text(name.val());
                tbl.find('tr:eq(' + trInd + ') td:eq(3) img').attr('src', 'img/product/' + photo.val() + '');
                tbl.find('tr:eq(' + trInd + ') td:eq(3) img').attr('alt', photo.val());
                tbl.find('tr:eq(' + trInd + ') td:eq(2)').text(email.val());
                tbl.find('tr:eq(' + trInd + ') td:eq(4)').text(status.val());
                tbl.find('tr:eq(' + trInd + ') td').css({
                    'background': '#CD3235',
                    'color': '#fff'
                });
                body.find('.popup').remove();
                return;
            }
            //appen tr
            var img = '<img class="img-tbl" src="img/product/' + photo.val() + '" data-img="img/product/' + photo.val() + '" alt="' + photo.val() + '">';
            var tr = "<tr> <td>" + id.val() + "</td>" +
                "<td>" + name.val() + "</td>" +
                "<td>" + email.val() + "</td>" +
                "<td>" + img + "</td>" +
                "<td>" + data.ip + "</td>" +
                "<td>" + type.val() + "</td>" +
                "<td>" + status.val() + "</td>" +
                "<td>" + btnEdit + "</td> </tr>";
            tbl.find('tr:eq(0)').after(tr);
            eThis.css({
                'pointer-events': 'auto',
                'opacity': '1'
            });
            eThis.html('+Save');
            id.val(parseInt(data.id) + 1);
            name.val('');
            photo.val('');
            $('.img-box').css({
                'background-image': 'url("img/u-img/img.png")'
            });
            $('.del-img').remove();

        },
    });
}
//save ads
function saveAds(eThis) {
    var frm = eThis.closest('form.upl');
    var frm_data = new FormData(frm[0]);
    var parent = eThis.parents('.frm');
    var id = parent.find('#txt-id');
    var name = parent.find('#txt-name');
    var detail = parent.find('#txt-detail');
    var status = parent.find('#txt-status');
    var photo = parent.find('#txt-photo');
    if (name.val() == '') {
        alert("Plese Input name..");
        name.focus();
        return;
    }
    $.ajax({
        url: 'action/save_ads.php',
        type: 'POST',
        data: frm_data,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        beforeSend: function() {
            eThis.css({
                'pointer-events': 'none',
                'opacity': '0.7'
            });
            eThis.html(myWait);
        },
        success: function(data) {
            if (data.dpl == true) {
                alert("Douplicate name..");
                eThis.css({
                    'pointer-events': 'auto',
                    'opacity': '1'
                });
                eThis.html('+Save');
                return;
            }
            if (data.edit == true) {
                tbl.find('tr:eq(' + trInd + ') td:eq(1)').text(name.val());
                tbl.find('tr:eq(' + trInd + ') td:eq(2) img').attr('src', 'img/product/' + photo.val() + '');
                tbl.find('tr:eq(' + trInd + ') td:eq(2) img').attr('alt', photo.val());
                tbl.find('tr:eq(' + trInd + ') td:eq(3)').text(od.val());
                tbl.find('tr:eq(' + trInd + ') td:eq(4)').text(status.val());
                tbl.find('tr:eq(' + trInd + ') td').css({
                    'background': '#CD3235',
                    'color': '#fff'
                });
                body.find('.popup').remove();
                return;
            }
            //appen tr
            var img = '<img class="img-tbl" src="img/product/' + photo.val() + '" data-img="img/product/' + photo.val() + '" alt="' + photo.val() + '">';
            var tr = "<tr> <td>" + id.val() + "</td> <td>" + name.val() + "</td> <td>" + detail.val() + "</td> <td>" + img + "</td> <td>" + color.val() + "</td> <td>" + od.val() + "</td> <td>" + status.val() + "</td> <td>" + btnEdit + "</td> </tr>";
            tbl.find('tr:eq(0)').after(tr);
            eThis.css({
                'pointer-events': 'auto',
                'opacity': '1'
            });
            eThis.html('+Save');
            id.val(parseInt(data.id) + 1);
            od.val(parseInt(data.id) + 1);
            name.val('');
            photo.val('');
            $('.img-box').css({
                'background-image': 'url("img/u-img/img.png")'
            });
            $('.del-img').remove();

        },
    });
}