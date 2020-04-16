<?php
include('db/db.php');
$db = new Database;
$id = $_POST['txt-id'];
$name = $_POST['txt-name'];
$name = trim($name);
$name = str_replace("'","''",$name);
$detail = $_POST['txt-des-ads'];
$status = $_POST['txt-status'];
$img = $_POST['txt-photo'];
$location = $_POST['txt-location'];
$edit_id =$_POST['txt-edit-id'];
$res['edit']=false;
$dpl=$db->dpl_data("tbl_ads","id","name='".$name."' && id !=".$id."");
if($dpl==true){
	$res['dpl']=true;
}else{
	if($edit_id == 0){
		$db->save_data("tbl_ads","null,'".$name."','".$detail."',".$location.",'".$img."',".$status."");
		$res['id']=$db->last_id;
		$res['dpl']=false;
	}else{
		$db->upd_data("tbl_ads","name='".$name."',img='".$img."',status=".$status.",detail='".$detail."'","id=".$edit_id."");
		$res['edit']=true;
	}
}
echo json_encode($res);
?>