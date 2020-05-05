<?php
include('db/db.php');
$db = new Database;
$slide= $_POST['slide'];

$sql = "SELECT tbl_news.menu_id, tbl_menu.name, tbl_menu.id, tbl_news.title, tbl_news.img, tbl_news.date_post, tbl_news.id, tbl_menu.color, tbl_menu.name_link, tbl_menu.status, tbl_menu.slide
		FROM tbl_menu
		INNER JOIN tbl_news
		ON tbl_menu.id = tbl_news.menu_id WHERE tbl_news.status=1&&tbl_menu.status=1&&tbl_menu.slide=$slide ORDER BY tbl_news.od DESC LIMIT 0,1";
$post_data = $db->select_inner_join_data($sql, $slide);
if ($post_data != 0) {
	foreach ($post_data as $row) {
		$data[] = array(
			"id" => $row[6],
			"namelink" => $row[8],
			"color" => $row[7],
			"cate" => $row[1],
			"img" => $row[4],
			"title" => $row[3],
			"date" => $row[5],
		);
	}
}
echo json_encode($data);
