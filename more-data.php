<?php
include "admin/action/db/db.php";
$db = new Database;
$e = $_POST['e'];
$s = $_POST['s'];
$menu_id = $_POST['menuid'];
$data = array();
$sql = "SELECT tbl_news.id, tbl_news.img, tbl_news.title, tbl_news.date, tbl_news.menu_id, tbl_user.name, tbl_user.id, tbl_news.user, tbl_news.status
		FROM tbl_news
		INNER JOIN tbl_user
		ON tbl_user.id = tbl_news.user";
$post_data = $db->select_inner_join_data($sql,$menu_id);

if ($post_data != 0) {
	foreach ($post_data as $row) {
		$data[] = array(
            "id" => $row[0],
            "img" => $row[1],
            "title" => $row[2],
            "date" => $row[3],
            "menuid" => $row[4],
            "uname" => $row[5],
        );
	}
}
// $post_data = $db->select_data("tbl_news", "id,img,title,date_post,menu_id", "status=1&& menu_id=$menu_id", "id DESC", "$e,$s"); 
// if ($post_data != '0') {
//     foreach ($post_data as $row) {
//         $data[] = array( WHERE tbl_news.status=1 && tbl_news.menu_id=1 ORDER BY tbl_news.id DESC LIMIT 0,1
//             "id" => $row[0],
//             "img" => $row[1],
//             "title" => $row[2],
//             "date" => $row[3],
//             "menuid" => $row[4],
//         );
//     }
// }
echo json_encode($data);
