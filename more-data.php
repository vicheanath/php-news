<?php
include "admin/action/db/db.php";
$db = new Database;
$e = $_POST['e'];
$s = $_POST['s'];
$menu_id = $_POST['menuid'];
$post_data = $db->select_data("tbl_news", "id,img,title,date_post,menu_id", "status=1&& menu_id=$menu_id", "id DESC", "$e,$s");
if ($post_data != 0) {
    foreach ($post_data as $row) {
        $date_time = explode(" ", $row[3]);
        $date = $db->get_post_date($date_time[1], $date_time[0]);
        $data[] = array(
            "id" => $row[0],
            "img" => $row[1],
            "title" => $row[2],
            "date" => $date,
            "menuid" => $row[4],
        );
    }
}
echo json_encode($data);
