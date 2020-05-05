<?php
session_start();
include('db/db.php');
date_default_timezone_set('Asia/Phnom_Penh');
$db = new Database;
$edit_id = $_POST['edit_id'];
$menu = $_POST['menu'];
$title = $_POST['title'];
$title_link =$db->php_slug($title);
$od = $_POST['od'];
$status = $_POST['status'];
$img = $_POST['photo'];
$des = $_POST['des'];
$date = date("Y-m-d H:i:s");
$location =1;
$user=$_SESSION['uid'];
$view=0;
	if($edit_id == 0){
		$db->save_data("tbl_news","null,'".$date."','".$title."','".$des."','".$img."',".$od.",".$location.",".$menu.",'".$title_link."',".$user.",".$view.",".$status."");
		$res['id']=$db->last_id;
		$res['uid']=$user;
	}else{
		$db->upd_data("tbl_news","title='".$title."',des='".$des."',img='".$img."',od=".$od.",location=".$location.",menu_id=".$menu.",title_link='".$title_link."',user=".$user.",status=".$status."","id=".$edit_id."");
		$res['edit']=true;
		$res['edit1']=1;
	}
echo json_encode($res);
