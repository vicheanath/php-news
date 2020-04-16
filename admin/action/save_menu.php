<?php
include('db/db.php');
$db = new Database;
$id = $_POST['txt-id'];
$name = $_POST['txt-name'];
$name = trim($name);
$name = str_replace("'","''",$name);
$name_link = $_POST['txt-link'];
$od = $_POST['txt-od'];
$status = $_POST['txt-status'];
$img = $_POST['txt-photo'];
$color = $_POST['txt-color'];
$edit_id =$_POST['txt-edit-id'];
$res['edit']=false;
$dpl=$db->dpl_data("tbl_menu","id","name='".$name."' && id !=".$id."");
if($dpl==true){
	$res['dpl']=true;
}else{
	if($edit_id == 0){
		$db->save_data("tbl_menu","null,'".$name."','".$img."','".$color."',".$od.",".$status.",'".$name_link."'");
		$res['id']=$db->last_id;
		$res['dpl']=false;
	}else{
		$db->upd_data("tbl_menu","name='".$name."',img='".$img."',color='".$color."',od=".$od.",status=".$status.",name_link='".$name_link."'","id=".$edit_id."");
		$res['edit']=true;
	}
}
echo json_encode($res);
