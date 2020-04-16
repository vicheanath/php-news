<?php
include('db/db.php');
$db = new Database;
$id = $_POST['txt-id'];
$name = $_POST['txt-name'];
$name = trim($name);
$name = str_replace("'","''",$name);
$email = $_POST['txt-email'];
$pass = $_POST['txt-pass'];
$pass=$db->real_string($pass);
$pass = md5($pass);
$pass = password_hash($pass, PASSWORD_DEFAULT);

$type = $_POST['txt-type'];
$ip = $_SERVER['REMOTE_ADDR'];


$status = $_POST['txt-status'];
$img = $_POST['txt-photo'];
$code = 0;

$edit_id =$_POST['txt-edit-id'];
$res['edit']=false;
$dpl=$db->dpl_data("tbl_user","id","email='".$email."' && id !=".$id."");
if($dpl==true){
	$res['dpl']=true;
}else{
	if($edit_id == 0){
		$db->save_data("tbl_user","null,'".$name."','".$pass."','".$img."','".$ip."',".$type.",'".$email."',".$status.",".$code."");
		$res['id']=$db->last_id;
		$res['dpl']=false;
	}else{
		$db->upd_data("tbl_user","name='".$name."',img='".$img."',status=".$status.",code=".$code."","id=".$edit_id."");
		$res['edit']=true;
	}
}
echo json_encode($res);
?>