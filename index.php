<?php
include("_config_inc.php");
include BASE_PATH . "admin/action/db/db.php";
$db = new Database;
include BASE_PATH . "include/header.php";
$url = '';
$title = 'Vreport News';
$des = 'news site in cambodia';
$img = 'assete/images/logo.png';

include BASE_PATH . "include/og.php";
?>
 <title>Vreport News | គេហទំព័រសារពត៏មាន</title>
</head>

<body>
	<!--Header-->
	<section id="header">
		<!--Top Header-->
		<?php include BASE_PATH . "include/top-header.php" ?>
		<!--Top Menu-->
		<?php include BASE_PATH . "include/top-menu.php" ?>
	</section>
	<!-- endheader -->
	<!--	Content-->
	<section id="content">
		<div class="container">
			<!-- slide -->
			<div class="slide-site">
				<div id="pre"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
				<div id="next"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
				<div class="row b-black">
					<div class="col-sm-7 slide">
						<!--Slide-->
						<?php
						$slide = 1;
						include BASE_PATH . ("include/slide.php")
						?>
					</div>
					<div class="col-sm-5 slide">
						<?php
						$slide = 2;
						include BASE_PATH . ("include/slide.php")
						?>
					</div>
				</div>
				<div class="row b-black">
					<div class="col-sm-7 slide">
						<?php
						$slide = 3;
						include BASE_PATH . ("include/slide.php")
						?>
					</div>
					<div class="col-sm-5 slide">
						<?php
						$slide = 4;
						include BASE_PATH . ("include/slide.php")
						?>
					</div>
				</div>
			</div>
			<!-- endslide -->
			<!-- Ads -->
			<div class="ads-site mobile-hidden">
				<div class="ads-1">
					<?php
					$post_data = $db->select_data("tbl_ads", "id,img", "status=1 && location=2", "id DESC", "0,1");
					if ($post_data != 0) {
						foreach ($post_data as $row) {
					?>
							<img src="<?php BASE_URL ?>admin/img/product/<?php echo $row[1]; ?>" alt="">
					<?php
						}
					}

					?>
				</div>
				<div class="ads-2">
					<?php
					$post_data = $db->select_data("tbl_ads", "id,img", "status=1 && location=3", "id DESC", "0,1");
					if ($post_data != 0) {
						foreach ($post_data as $row) {
					?>
							<img src="<?php BASE_URL ?>admin/img/product/<?php echo $row[1]; ?>" alt="">
					<?php
						}
					}

					?>
				</div>
			</div>
			<!-- endAds -->
			<!-- category -->
			<?php
			//include BASE_PATH . ("include/content-box.php")
			?>

			<div class="main-body"></div>
		</div>
	</section>
	<!--	Footer-->
	<?php
	include BASE_PATH . ("include/footer.php");
	?>
</body>

</html>