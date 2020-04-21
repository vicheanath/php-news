<?php 
include('db/db.php');
$db = new Database;
$e=$_POST['e'];
$s=$_POST['s'];
if(isset($_POST['home'])){
	$con='status=1';
}else{
	$con="id>0";
}
$tbl="tbl_menu";
$fld="*";
$od="id DESC";
$limit=$s.','.$e;
$post_data = $db->select_data($tbl,$fld,$con,$od,$limit);
if($post_data!='0'){
	foreach($post_data as $row){
		$data[]=array(
			"id"=>$row[0],
			"name"=>$row[1],
			"img"=>$row[2],
			"color"=>$row[3],
			"link"=>$row[6],
			"od"=>$row[4],
			"status"=>$row[5],
			"slide"=>$row[7],
			"status2"=>'true',
			);
	}
}else{
	$data[]=array("status2"=>"flase");
}
echo json_encode($data);
