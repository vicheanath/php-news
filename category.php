<?php
include "_config_inc.php";
include BASE_PATH . "admin/action/db/db.php";
$db = new Database;
include BASE_PATH . "include/header.php";
$id=$_GET['menu_id'];
$row = $db->select_cur_data("tbl_menu","*","name_link='$id'");
    $url = $row[6];
	$title = $row[1];
	$des = $row[1];
	$img = "admin/img/product/" . $row[2];
include BASE_PATH . "include/og.php";
?>
</head>

<body>
	<!--Header-->
	<section id="header">
		<!--       Top Header-->
		<?php include BASE_PATH . "include/top-header.php" ?>
		<!--       Top Menu-->
		<?php include BASE_PATH . "include/top-menu.php" ?>
	</section>

	<!--	Content-->
	<section id="content">
		<div class="container">
			<div id="cate-box" class="slide-site content-text contain-cate">
				<?php
				$menu_id = $_GET['menu_id'];
				$post_data = $db->select_data("tbl_menu", "id,name,color", "status=1&&name_link='$menu_id'", "od DESC", "0,1");
				if ($post_data != 0) {
					foreach ($post_data as $row) {
				?>
						<div class="head-cate">
							<h2 style=" background: <?php echo $row[2]; ?>"><?php echo $row[1]; ?></h2>
						</div>
						<span class="line" style=" border-top: <?php echo $row[2]; ?>"></span>
				<?php
					$menu_id=$row[0];
					}
				}

				?>
				<?php
				$news_num = $db->get_count_data2('tbl_news',"status=1&& menu_id=$menu_id");
				echo $news_num[0];
				$e=0;
				$s=1;
				//  && menu_id=$menu_id 
				$post_data = $db->select_data("tbl_news", "*", "status=1&& menu_id=$menu_id", "id DESC", "$e,$s");
				if ($post_data != 0) {
					foreach ($post_data as $row) {
						$u_id = $row[9];
						$date_time = $row[1];
						$date_time = explode(" ", $date_time);
						$cate=$db->select_cur_data("tbl_menu", "id,name_link", "id=$row[7]");
				?>
						<a href="<?php echo BASE_URL .$cate[1]; ?>/<?php echo $row[0]; ?>">
							<div class="cate-item">
								<div class="image-item" style="background: url('admin/img/product/<?php echo $row[4]; ?>')"></div>
								<div class="detail">
									<div class="title"><?php echo $row[2].$row[0]; ?></div>
									<span></span>
									<div class="date-post"><?php echo  $db->get_post_date($date_time[1], $date_time[0]); ?></div>
									<div class="date-post"><?php $user = $db->select_cur_data("tbl_user", "id,name", "id=$u_id");
										echo ("ដោយ៖ " . $user[1]) ?></div>
								</div>
							</div>
						</a>
				<?php
					}
				}
				$e+=1;
				$s+=1;
				?>
				<input id="e" value="<?php echo $e ?>" type="text">
				<input id="s" value="<?php echo $s ?>" type="text">
				<input id="menu-id" value="<?php echo $menu_id ?>" type="text">
				<input id="menu-name" value="<?php echo $cate[1] ?>" type="text">
				<div id="btn-more">more</div>
			</div>
			<?php include BASE_PATH . "include/aside.php" ?>

		</div>
	</section>
	<!--	Footer-->
	<?php include "include/footer.php" ?>
</body>
</html>