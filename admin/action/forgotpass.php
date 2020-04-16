<?php
	session_start();
	include('../../_config_inc.php');
	$BASE_URL = BASE_URL;
	include('db/db.php');
	$db=new Database;
	$res['dpl']=false;
	$email= $_POST['email'];
	
	$dpl = $db->dpl_data("tbl_user","*","email='".$email."'");

	if($dpl==true){		
		$db->upd_data("tbl_user","verify_code='".$verify_code."'","email='".$email."'");
		$headers = "MIME-Version: 1.0". "\r\n";
		$headers .= "Content-type:text/html; charset=UTF-8" . "\r\n";
		$headers .= 'From: Vreport News  noreply@vreportnews.com'. "\r\n";

		$msg='<html><body><p>Dear: User</p>'. 
			'<p>We have received a request to reset your system password.</p>'. 
			'<h4>Good luck for your new password </h4>'.
			'<p>Click link below to verify your new password:</p>'. 
			'<p><a href="'.$BASE_URL.'form/newpass.php?email='.$email.'"> Click here to verify Email. </a></p></body></html>';

		$subject= $pass.' is your new password.';	
		
		if(mail($email, $subject, $msg, $headers,"-f  noreply@vreportnews.com")){
			$res['send']=true;
		}else{
			$res['send']=false;
		}
		
		$res['dpl']=true;	
		
	}
	echo json_encode($res);

?>