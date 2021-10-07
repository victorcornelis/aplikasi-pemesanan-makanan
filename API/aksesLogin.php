<?php
//function login(){
	include_once('../config.php');
	$modul = $_POST['modul'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);

	if($modul=='login'){
		$access = mysql_query("SELECT * FROM dataUsers WHERE username='$username' AND password='$password'");
		$data = mysql_fetch_array($access);
		$cek = mysql_num_rows($access);
		$response = array();

		if($cek >= 1){
			$response['code'] =200;
		  	$response['message'] = "Login successfully";
		  	$response['username'] = $data['username'];
		  	$response['password'] = $_POST['password'];
		  	$response['nama'] = $data['nama'];
		  	$response['role'] = $data['role'];
		  	$response['status'] = $data['status'];
		}elseif($cek < 1){
			$response['code'] =100;
		  	$response['message'] = "Login Failed, cek ulang username dan password anda !";
		}
	}elseif($modul==''){
		$response['code'] =401;
	  	$response['message'] = "Modul kosong !";
	}
	echo json_encode($response,true);
//}
?>