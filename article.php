<?php
include "_config_inc.php";
include BASE_PATH . "admin/action/db/db.php";
$db = new Database;
include BASE_PATH . "include/header.php";
$id = $_GET['id'];
$sql = "SELECT tbl_news.menu_id, tbl_menu.name, tbl_menu.id, tbl_news.title, tbl_news.img, tbl_news.id, tbl_menu.name_link, tbl_news.menu_id
		FROM tbl_menu
		INNER JOIN tbl_news
		ON tbl_menu.id = tbl_news.menu_id WHERE tbl_news.id=$id LIMIT 0,1";
$post_data = $db->select_inner_join_data($sql);

if ($post_data != 0) {
	foreach ($post_data as $row) {
		$url = $row[6] . "/" . $row[5];
		$title = $row[3];
		$des = $row[3];
		$img = "admin/img/product/" . $row[4];
	}
}
include BASE_PATH . "include/og.php";

?>
<title><?php echo $title ?> | Vreport News</title>
</head>

<body>
	<!--Header-->
	<section id="header">
		<!--       Top Header-->
		<?php include BASE_PATH . "include/top-header.php" ?>
		<!--       Top Menu-->
		<?php include BASE_PATH . "include/top-menu.php" ?>
	</section>
	<!-- endheader -->
	<!--	Content-->
	<section id="content">

		<?php
		$db->upd_data("tbl_news", "view= view+1", "id=$id");
		$post_data = $db->select_data("tbl_news", "*", "id=$id", "od DESC", "0,1");
		if ($post_data != 0) {
			foreach ($post_data as $row) {
				$u_id = $row[9];
		?>
				<div class="container-fluid" id="img-background" style="background: url('<?php echo BASE_URL ?>admin/img/product/<?php echo $row[4] ?>');background-repeat: no-repeat;background-position: center;background-size: cover;"></div>
				<div class="container">
					<div class="slide-site content-text">
						<div class="title-news"><?php echo $row[2] ?></div>
						<div class="user">
							<?php $user = $db->select_cur_data("tbl_user", "id,name", "id=$u_id");
							echo ("ដោយ៖ " . $user[1]);
							$cate = $db->select_cur_data("tbl_menu", "id,name_link", "id=$row[7]");
							?>
						</div>
						<div class="date"><i class="fa fa-clock-o" aria-hidden="true"></i> <span class="datef"><?php echo $row[1] ?></span></div>
						<div class="views"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $row[10] ?></div>
						<!-- <a href="">
							<div class="btn-share" style="background: #0088CC"><i class="fab fa-telegram-plane"></i></div>
						</a> -->
						<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo BASE_URL . $cate[1] . "/" . $row[0]  ?>">
							<div class="btn-share" style="background: #3B5998; margin-right: 0;"><i class="fab fa-facebook-f"></i></div>
						</a>

						<div class="body-text" style="display: inline-block"><?php echo $row[3] ?></div>
						<div class="fb-comments" data-href="<?php echo BASE_URL . $row[7] . "/" . $row[0] ?>" data-width="500px" data-numposts="5"></div>
					</div>

					<?php include BASE_PATH . "include/aside.php" ?>
				</div>
				</div>

		<?php
			}
		}

		?>
	</section>
	<script>
		var baseUrl = '<?php echo BASE_URL ?>';
		var url = baseUrl + 'admin/img/news/';
		const img = document.querySelectorAll('.body-text img');
		for (let i = 0; i < img.length; i++) {
			const arr = img[i].src.split('/');
			endArr = arr.slice(0, -3);
			const imgUrl = endArr[0] + '//' + endArr[2] + '/' + endArr[3] + '/';
			console.log(imgUrl);
			if (imgUrl == baseUrl) {
				const lastArr = arr.slice(-1);
				img[i].src = url + lastArr;
			}

		}
	</script>
	<!--	Footer-->
	<?php include('include/footer.php') ?>
</body>
<script src="assete/js/jquery-3.4.1.js"></script>
<script src="assete/js/javascript.js"></script>

</html>