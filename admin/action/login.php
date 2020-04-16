<?php
session_start();

include('db/db.php');
$db = new Database;

$email = $_POST['email'];
$email = trim($email);
$email = $db->real_string($email);

$pass = $_POST['pass'];
$pass = trim($pass);
$pass = $db->real_string($pass);
$pass = md5($pass);

$code = rand(0000,9999);
$ip = $_SERVER['REMOTE_ADDR'];


$dpl=$db->dpl_data("tbl_user","*","email='".$email."'");
$res['login']=false;
if($dpl==true){
	$post_data = $db->select_cur_data("tbl_user","*","email='".$email."'");
	$res['pass']=$post_data[2];
	if(password_verify($pass, $post_data[2])){
		$db->upd_data("tbl_user","ip='$ip',code=$code","email='".$email."'");
		$_SESSION['success']= true;
		$_SESSION['ip']= $ip;
		$_SESSION['email']= $email;
		$_SESSION['code']= $code;
		$_SESSION['uid']= $post_data[0];
		$res['login']=true;
	}
}

echo json_encode($res);
?>