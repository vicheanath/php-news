<?php
include "admin/action/db/db.php";
$db = new Database;
$id = $_POST['id'];
$post_data = $db->select_cur_data("tbl_news", "id,date_post", "id=$id");
$date_time = explode(" ", $post_data[1]);
$formate = $db->get_post_date($date_time[1], $date_time[0]);
$res['time'] = $date_time;
$res['id'] = $post_data[0];
$res['date'] = $formate;

echo json_encode($res);
