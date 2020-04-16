<?php
$sql = "SELECT tbl_news.menu_id, tbl_menu.name, tbl_menu.id, tbl_news.title, tbl_news.img, tbl_news.date_post, tbl_news.id, tbl_menu.color, tbl_menu.name_link, tbl_menu.status
		FROM tbl_menu
		INNER JOIN tbl_news
		ON tbl_menu.id = tbl_news.menu_id WHERE tbl_news.status=1&&tbl_menu.status=1&&tbl_menu.od=$od ORDER BY tbl_news.od DESC LIMIT 0,1";
$post_data = $db->select_inner_join_data($sql, $od);
if ($post_data != 0) {
	foreach ($post_data as $row) {
		$date_time = $row[5];
		$date_time = explode(" ", $date_time);
?>
		<a href="<?php echo BASE_URL . $row[8]; ?>"><span class="yellow" style="background: <?php echo $row[7]; ?> "><?php echo $row[1]; ?></span></a>
		<a href="<?php echo BASE_URL .$row[8]; ?>/<?php echo $row[6]; ?>" class="over-read">
			<div class="image-slide" style="background-image: url('<?php echo BASE_URL ?>admin/img/product/<?php echo $row[4]; ?>');"></div>
			<div class="bg"></div>
			<div class="main-des">
				<div class="title"><?php echo $row[3]; ?></div>
			</div>
			<div class="date"><?php echo $db->get_post_date($date_time[1], $date_time[0]); ?></div>
		</a>
<?php
	}
}

?>