<?php 
include('db/db.php');
$db = new Database;
$opt=$_POST['tbl'];
$post_data=$db->get_count_data($opt);
$res['data']=$post_data[0];
echo json_encode($res);
?>