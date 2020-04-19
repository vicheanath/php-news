<?php 
include('db/db.php');
$db = new Database;
$e=$_POST['e'];
$s=$_POST['s'];
$menuid = $_POST['menuid'];
$limit=$s.','.$e;
$sql="SELECT tbl_news.menu_id, tbl_menu.name, tbl_menu.id, tbl_news.title, tbl_news.img, tbl_news.date_post, tbl_news.id, tbl_news.od, tbl_news.status, tbl_menu.name_link
	FROM tbl_menu
	INNER JOIN tbl_news
	ON tbl_menu.id = tbl_news.menu_id WHERE tbl_news.menu_id =$menuid ORDER BY tbl_news.id DESC LIMIT $limit";
$data=array();
$post_data=$db->select_inner_join_data($sql);
	if($post_data!=0){
		foreach($post_data as $row){
			$data[]=array(
				"id"=>$row[6],
				"date"=>$row[5],
				"title"=>$row[3],
				"img"=>$row[4],
				"od"=>$row[7],
				"status"=>$row[8],
				"menu_id"=>$row[0],
				"menu_link"=>$row[9],
				"menu_name"=>$row[1],
				"status2"=>'true',
				);						
		 }
	}
echo json_encode($data);
?>