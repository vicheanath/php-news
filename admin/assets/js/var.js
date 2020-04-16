var body = $('body');
		var leftMenu = $('.left-menu');
		var cnt = $('.content,.dasbord');
		var menuOpt = 0;
		var popup = '<div class="popup"></div>';
		var form = ["frm_menu", "frm_news", "frm_ads", "frm_user"];
		var frmOpt = 0;
		var dOpt = 0;
		var tbl = $('#tblData');
		var trInd;
		var loadingImg = '<div class="middle loadingImg">' +
			'<div class="bar bar1"></div>' +
			'<div class="bar bar2"></div>' +
			'<div class="bar bar3"></div>' +
			'<div class="bar bar4"></div>' +
			'<div class="bar bar5"></div>' +
			'<div class="bar bar6"></div>' +
			'<div class="bar bar7"></div>' +
			'<div class="bar bar8"></div>' +
			'</div>';
		var loading = '<div class="loading">' +
			'<div class="middle">' +
			'<div class="bar bar1"></div>' +
			'<div class="bar bar2"></div>' +
			'<div class="bar bar3"></div>' +
			'<div class="bar bar4"></div>' +
			'<div class="bar bar5"></div>' +
			'<div class="bar bar6"></div>' +
			'<div class="bar bar7"></div>' +
			'<div class="bar bar8"></div>' +
			'</div>' +
			'</div>';
		var delImg = '<div class="del-img"><i class="fas fa-times"></i></div>';
		var myWait = '<i class="fa fa-spinner fa-spin" style="font-size:24px"></i> Wait';
		var btnEdit = '<a class="btn hover-red btn-edit"><i class="fa fa-edit"></i></a>';
		var trInd;
		var eNum = $('#txt-fillter');
		var sNum = 0;
		var curPage = $('#txt-cur-page');
		var totalPage = $('#txt-total-page');
		var boxImg = '<div class="img-box">' +
			'<input type="file" id="txt-file-2" name="txt-file" class="txt-file">' +
			'<input type="text" name="txt-photo[]" id="txt-photo" class="txt-photo">' +
			'</div>';