///Count Data
function get_count_data() {
    $.ajax({
        url: 'action/get_count_data.php',
        type: 'POST',
        data: {
            tbl: frmOpt
        },
        cache: false,
        dataType: "json",
        success: function(data) {
            $('#txt-total-data').text(data.data);
            $('#txt-total-page').text(Math.ceil(data.data / eNum.val()));
        },
    });
}
///Fillter
$('#txt-fillter').change(function() {
    sNum = 0;
    curPage.text(1);
    if (frmOpt == 0) {
        get_menu_data();
    } else if (frmOpt == 1) {
        get_news_data();
    }
    get_count_data();
});
///Next Data
$('.btn-next-data').click(function() {
    if (curPage.text() >= totalPage.text()) {
        return;
    }
    curPage.text(parseInt(curPage.text()) + 1);
    sNum += parseInt(eNum.val());
    if (frmOpt == 0) {
        get_menu_data();
    } else if (frmOpt == 1) {
        get_news_data();
    } else if (frmOpt == 2) {
        get_ads_data();
    }
});
///Back Data
$('.btn-back-data').click(function() {
    if (curPage.text() <= 1) {
        return;
    }
    curPage.text(parseInt(curPage.text()) - 1);
    sNum -= parseInt(eNum.val());
    if (frmOpt == 0) {
        get_menu_data();
    } else if (frmOpt == 1) {
        get_news_data();
    } else if (frmOpt == 2) {
        get_ads_data();
    }
});
//big Img
body.on('click', '#tblData .img-tbl', function() {
    var eThis = $(this);
    body.append('<div class="pop"></div>');
    $('.alert-img').css({
        'display': 'block'
    });
    var Image = eThis.data("img");
    $('.big-img').attr("src", Image);

    body.on('click', '.pop', function() {
        $(this).remove();
        $('.alert-img').css({
            'display': 'none'
        });
    });
});
//Append Img Plus
body.on('click', '.frm .img-plus', function() {
    photoVal = $(this).parent().find('.txt-photo').last().val();
    if (photoVal != '') {
        $(this).parent().append(boxImg);
        $(this).parent().append('<div class="img-plus"></div>');
        $(this).remove();
    } else {
        alert('pleae Input Image...');
    }
});
//Get auto id
function get_auto_id() {
    $.ajax({
        url: 'action/get_auto_id.php',
        type: 'POST',
        data: {
            tbl: frmOpt
        },
        cache: false,
        dataType: "json",
        success: function(data) {
            $('#txt-id').val(parseInt(data.id) + 1);
            $('#txt-od').val(parseInt(data.id) + 1);
        },
    });
}
//Upload Img
body.on('change', '.frm .txt-file', function() {
    var eThis = $(this);
    var imgBox = eThis.parent();
    var photo = eThis.parent().find('.txt-photo');
    var frm = eThis.closest('form.upl');
    var frm_data = new FormData(frm[0]);
    $.ajax({
        url: 'action/upl-img.php',
        type: 'POST',
        data: frm_data,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        beforeSend: function() {
            imgBox.append(loadingImg);
        },
        success: function(data) {
            $('.loadingImg').remove();
            imgBox.css({
                'background-image': 'url("img/product/' + data.imgName + '")'
            });
            photo.val(data.imgName);
            imgBox.prepend(delImg);
        },

    });

});
//Product Upload Img
body.on('change', '.frm .txt-file-2', function() {
    var eThis = $(this);
    var imgBox = eThis.parent();
    var photo = eThis.parent().find('.txt-photo');
    var file = eThis.prop("files")[0];
    var frm = eThis.closest('form.upl');
    var frm_data = new FormData(frm[0]);
    frm_data.append("txt-file", file);
    $.ajax({
        url: 'action/upl-img.php',
        type: 'POST',
        data: frm_data,
        contentType: false,
        cache: false,
        processData: false,
        dataType: "json",
        beforeSend: function() {
            imgBox.append(loadingImg);
        },
        success: function(data) {
            $('.loadingImg').remove();
            imgBox.css({
                'background-image': 'url("img/product/' + data.imgName + '")'
            });
            photo.val(data.imgName);
            imgBox.prepend(delImg);
        },

    });

});
//Remove Img
body.on('click', '.frm .del-img', function() {
    var eThis = $(this);
    var imgBox = eThis.parent();
    var imgName = imgBox.find('.txt-photo').val();
    $.ajax({
        url: 'action/del-img.php',
        type: 'POST',
        data: {
            img: imgName
        },
        cache: false,
        success: function(data) {
            imgBox.css({
                'background-image': 'url("img/u-img/img.png")'
            });
            imgBox.find('.del-img').remove();
            imgBox.find('.txt-photo').val('');
        },

    });

});
// logout
function logout(){
    window.location.href = "index.php";
}