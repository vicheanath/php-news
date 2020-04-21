<?php
include "action/db/db.php";
$db = new Database;
session_start();
if (!isset($_SESSION['success'])) {
	header('Location: index.php');
} else {
	$email = $_SESSION['email'];
	$ip = $_SESSION['ip'];
	$code = $_SESSION['code'];
	$dpl = $db->dpl_data("tbl_user", "ip='$ip'&&code=$code", "email='" . $email . "'");

	if ($dpl == false) {
		header('Location:index.php');
	}
}
$uid = $_SESSION['uid'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="assets/css/fontawesome-free-5.11.2-web/css/all.css">
	<link rel="stylesheet" href="assets/css/jquery-confirm.min.css">
	<!-- include summernote css/js -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.2.1/skins/content/dark/content.min.css" rel="stylesheet">
	<script src="assets/js/jquery-3.4.1.js"></script>
	<script src="assets/js/jquery-confirm.min.js"></script>
	<!-- include libraries(jQuery, bootstrap) -->
	<link rel="stylesheet" href="assets/css/style.css">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="assets/css/loding.css">
	<title>Admin Vreport</title>
</head>

<body>
	<div class="alert-img">
		<img class="big-img" src="img/u-img/img.png">
	</div>
	<!-- Header -->
	<div id="top-header">
		<ul>
			<li class="btn-menu hover-333">
				<i class="fas fa-bars"></i>
			</li>
			<li>
				<a href="admin.php" style="text-decoration: none; color:#fff;">Dashboard</a>
			</li>
			<li class="title">
				Admin-Page
			</li>
			<?php
			$post_data = $db->select_cur_data("tbl_user", "img,email", "id=$uid");
			?>
			<li class="u-img">
				<div class="img-pro" style="background: url('img/product/<?php echo $post_data[0] ?>')"></div>
			</li>
			<li>
				<?php echo $post_data[1] ?>
			</li>
			<li class="btn-sign-out hover-333" onclick="logout()">
				<i class="fas fa-sign-out-alt"></i>
			</li>
		</ul>
	</div>
	<!-- Left Menu -->
	<div class="left-menu">
		<ul>
			<li>
				<a class="menu1"><i class="fas fa-user-cog"></i><span>System<i class="fas fa-caret-right drop-icon"></i></span></a>
				<div class="sub-menu">
					<ul>
						<li data-id="3"><i class="fas fa-user"></i>User</li>
						<li data-id="4"><i class="fas fa-key"></i>Reset Password</li>
						<li data-id="5"><i class="fas fa-passport"></i>Permission</li>
					</ul>
				</div>
			</li>

			<li>
				<a class="menu1"><i class="far fa-newspaper"></i><span>News<i class="fas fa-caret-right drop-icon"></i></span></a>
				<div class="sub-menu">
					<ul>
						<li data-id="0"><i class="fas fa-sliders-h"></i>Category</li>
						<li data-id="1"><i class="fas fa-pen"></i>News</li>
						<li data-id="2"><i class="fas fa-audio-description"></i>Ads</li>
					</ul>
				</div>
			</li>
		</ul>
	</div>
	<!-- Content -->
	<div class="content" style="display: none">
		<div class="title">
			<ul>
				<li>
					<a class="btn hover-fff btn-add"> Add New</a>
				</li>
				<li>
					<a class="txt-fillter ">
						<select id="txt-fillter" class="btn hover-fff select-box ">
							<option value="5">5</option>
							<option value="20">20</option>
							<option value="50">50</option>
							<option value="100">100</option>
						</select>
					</a>
				</li>
				<li>
					<a class="btn btn-back-data hover-fff"><i class="fas fa-chevron-left"></i></a>
				</li>
				<li>
					<div class="page"><span id="txt-cur-page">1</span>/<span id="txt-total-page">1</span> of <span id="txt-total-data">1</span></div>
				</li>
				<li>
					<a class="btn btn-next-data hover-fff"><i class="fas fa-chevron-right"></i></a>
				</li>
			</ul>
		</div>
		<div class="data">
			<table id="tblData"></table>
		</div>
	</div>
	<!-- Dachbord -->
	<div class="wrap">
		<div class="dasbord">
			<div data-id="0" class="item">
				<h1>Category</h1>
				<i class="fas fa-sliders-h"></i>
				<p>
					<?php
					$post_data2 = $db->get_count_data(0);
					echo $post_data2[0];
					?>
				</p>
				<span></span>
			</div>
			<div data-id="1" class="item">
				<h1>News</h1>
				<i class="fas fa-pen"></i>
				<p>
					<?php
					$post_data2 = $db->get_count_data(1);
					echo $post_data2[0];
					?>
				</p>
				<span></span>
			</div>
			<div data-id="3" class="item">
				<h1>User</h1>
				<i class="fas fa-user"></i>
				<p>
					<?php
					$post_data2 = $db->get_count_data(3);
					echo $post_data2[0];
					?>
				</p>
				<span></span>
			</div>
			<div data-id="2" class="item">
				<h1>Ads</h1>
				<i class="fas fa-audio-description"></i>
				<p>
					<?php
					$post_data2 = $db->get_count_data(2);
					echo $post_data2[0];
					?>
				</p>
				<span></span>
			</div>
		</div>
		<div class="fuction">
			<?php

			$post_data = $db->select_data("tbl_news", "id,title,img,view", "status=1", "view DESC", "0,10");
			if ($post_data != 0) {
				foreach ($post_data as $row) {
			?>
					<div class="f-item"><?php echo $row[1] ?> <p><i class="fas fa-eye"></i><?php echo $row[3] ?></p>
					</div>
			<?php
				}
			}
			?>
		</div>
		<div class="chart">
			<canvas id="myChart" width="400" height="400"></canvas>
		</div>
	</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.2.1/tinymce.min.js"></script>
<script src="assets/js/var.js"></script>
<script src="assets/js/getdata.js"></script>
<script src="assets/js/savedata.js"></script>
<script src="assets/js/editdata.js"></script>
<script src="assets/js/fuction.js"></script>
<script>
	$(document).ready(function() {
		//Status
		$('.btn-menu').click(function() {
			if (menuOpt == 0) {
				leftMenu.css({
					'left': '-100%'
				});
				cnt.css({
					'left': '0',
					'width': '100%'
				});
				menuOpt = 1;
				return;
			}
			leftMenu.css({
				'left': '0'
			});
			cnt.css({
				'left': '15%',
				'width': '85%'
			});
			menuOpt = 0;
		});
		///LefMenu
		leftMenu.on('click', 'ul li .menu1', function() {
			$(this).parent().find('.sub-menu').slideToggle();
			if (dOpt == 0) {
				$(this).parent().find('.drop-icon').css({
					'transform': 'rotateZ(90deg)'
				});
				dOpt = 1;
				return;
			}
			$(this).parent().find('.drop-icon').css({
				'transform': 'rotateZ(0deg)'
			});
			dOpt = 0;

		});
		/// Add form
		$('.btn-add').click(function() {
			body.append(popup);
			$('.popup').load("form/" + form[frmOpt] + ".php", function(responseTxt, statusTxt, xhr) {
				if (statusTxt == 'success') {
					body.find('.frm .title').text($('#top-header').find('.title').text());
					get_auto_id();
					calleditor();
				}
				if (statusTxt == "error") {
					alert("Error:" + xhr.status + ":" + xhr.statusText);
				}
			});
		});
		body.on('click', '.frm .btn-close', function() {
			tinymce.remove();
			$('.popup').remove();
		});
		//Get form Id
		$('.sub-menu').on('click', 'ul li,.item', function() {
			$('.wrap').css({
				'display': 'none'
			});
			$('.content').css({
				'display': 'block'
			});
			var eThis = $(this);
			frmOpt = eThis.data("id");
			$('#top-header').find('.title').html(eThis.text());
			$('.btn-add').show();
			eThis.parents('.sub-menu').find('ul li').css({
				'color': '#ccc'
			});
			eThis.css({
				'color': '#781313'
			});
			if (frmOpt == 0) {
				get_menu_data();
			} else if (frmOpt == 1) {
				get_news_data();
			} else if (frmOpt == 2) {
				get_ads_data();
			} else if (frmOpt == 3) {
				get_user_data();
			}
			get_count_data();
		});
		//Click Item
		$('.item').click(function() {
			$('.wrap').css({
				'display': 'none'
			});
			$('.content').css({
				'display': 'block'
			});
			var eThis = $(this);
			frmOpt = eThis.data("id");
			$('#top-header').find('.title').html(eThis.text());
			$('.btn-add').show();
			eThis.parents('.sub-menu').find('ul li').css({
				'color': '#ccc'
			});
			eThis.css({
				'color': '#781313'
			});
			if (frmOpt == 0) {
				get_menu_data();
			} else if (frmOpt == 1) {
				get_news_data();
			} else if (frmOpt == 2) {
				get_ads_data();
			} else if (frmOpt == 3) {
				get_user_data();
			}
			get_count_data();
		});

	});

	function calleditor() {
		tinymce.remove();
		var url = location.href;
		var num = url.length;
		var part = url.substring(num - 9, 0);
		console.log(part);
		tinymce.init({
			selector: "textarea",
			images_upload_url: 'upl_img_news.php',
			images_upload_base_path: part,
			height: 500,
			plugins: [
				"advlist autolink lists link image charmap print preview hr anchor pagebreak",
				"searchreplace wordcount visualblocks visualchars code fullscreen",
				"insertdatetime media nonbreaking save table contextmenu directionality",
				"emoticons template paste textcolor colorpicker textpattern imagetools media code",
			],
			menubar: true,
			toolbar1: "undo redo | insert | sizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",
			toolbar2: "fontselect | fontsizeselect | forecolor media code",
		});
	};
</script>

</html>