<?php
 $id= $_POST['id'];
 $user= $_POST['user'];
 $activity= '"'.$user.'" menghapus ID Menu : "'.$id.'"';

include'../config.php';
$query=mysql_query("DELETE FROM daftarmenu WHERE id ='$id'");
$query2=mysql_query("INSERT INTO logs(activity, status, username)VALUES('$activity','1','$user')");

if(!$query){
	$query3=mysql_query("INSERT INTO logs(activity, status, username)VALUES('$activity','2','$user')");
}
header('location:masterMenu');
?>