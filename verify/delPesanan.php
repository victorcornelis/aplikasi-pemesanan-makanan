<?php
$id= $_POST['id'];
$idMenu= $_POST['idMenu'];
$idMeja= $_POST['idMeja'];
$user= $_POST['user'];
$activity= 'Batalkan pemesanan ID Menu : "'.$idMenu.'" di ID Meja "'.$idMeja.'"';

include'../config.php';
$query1=mysql_query("UPDATE daftarmenu SET stock=(stock+1) WHERE id='$idMenu'");
$query2=mysql_query("DELETE FROM datapesanan WHERE id='$id'");
$query3=mysql_query("INSERT INTO logs(activity, status, username)VALUES('$activity','1','$user')");

if(!$query){
	$query4=mysql_query("INSERT INTO logs(activity, status, username)VALUES('$activity','2','$user')");	
}
?>