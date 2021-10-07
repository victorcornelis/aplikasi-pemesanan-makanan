<?php
include'config.php';
	$username = mysql_real_escape_string(htmlentities($_POST['username']));
	$password = mysql_real_escape_string(htmlentities(md5($_POST['password'])));
	$sql = mysql_query("SELECT * FROM dataUsers WHERE username='$username' AND password='$password'") or die(mysql_error());
	$dataUser=mysql_fetch_array($sql);
	$nama=$dataUser['nama'];
	$role=$dataUser['role'];
	$activity='Login Aplikasi';
	if(mysql_num_rows($sql) == 1){
		$log = mysql_query("INSERT INTO logs(activity, status, username)VALUES('$activity', '1', '$nama')") or die(mysql_error()); //Status 1 -> success
		session_start();
		$_SESSION['role'] = $role;
		$_SESSION['nama'] = $nama;
		$_SESSION['login']=true;
		header("location:verify/index?x=x")or die(mysql_error());
	}else{
		$log = mysql_query("INSERT INTO logs(activity, status, username)VALUES('$activity', '2', '$nama')") or die(mysql_error()); //Status 2 -> Failed
		echo '<script language="javascript">document.location="index?x=1";</script>';
	}
?> 