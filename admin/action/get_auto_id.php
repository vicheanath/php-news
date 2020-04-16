<?php 
include('db/db.php');
$db = new Database;
$opt = $_POST['tbl'];

$post_data=$db->get_auto_id($opt,"id");
$res['id']=$post_data;
echo json_encode($res);
?>