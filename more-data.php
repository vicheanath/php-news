<?php
include "admin/action/db/db.php";
$db = new Database;
$e = $_POST['e'];
$s = $_POST['s'];
$menu_id = $_POST['menuid'];
$data = array();
$post_data = $db->select_data("tbl_news", "id,img,title,date_post,menu_id", "status=1&& menu_id=$menu_id", "id DESC", "$e,$s");
if ($post_data != '0') {
    foreach ($post_data as $row) {
        $data[] = array(
            "id" => $row[0],
            "img" => $row[1],
            "title" => $row[2],
            "date" => $row[3],
            "menuid" => $row[4],
        );
    }
}
echo json_encode($data, 10, 512);
