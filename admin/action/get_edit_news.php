<?php 
include('db/db.php');
$db = new Database;
$id = $_POST['id'];
$e=1;
$s=0;
$tbl="tbl_news";
$fld="*";
$con="id=".$id;
$od="id DESC";
$limit=$s.','.$e;
$post_data = $db->select_data($tbl,$fld,$con,$od,$limit);
if($post_data!='0'){
	foreach($post_data as $row){
		$data[]=array(
			"title"=>$row[2],
			"img"=>$row[4],
			"des"=>$row[3],
			"od"=>$row[5],
			"menu_id"=>$row[7],
			"status"=>$row[11],
			"status2"=>'true',
			);
	}
}else{
	$data[]=array("status2"=>"flase");
}
echo json_encode($data);

?>