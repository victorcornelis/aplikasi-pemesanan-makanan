<?php
$noTransaksi= $_POST['noTransaksi'];
$idMeja= $_POST['idMeja'];
$idMenu= $_POST['idMenu'];
$harga= $_POST['harga'];
$user= $_POST['user'];
$activity= 'Tambah Pemesanan dengan ID Meja : "'.$idMeja.'" dan ID Menu : "'.$idMenu.'"';

include'../config.php';
$query=mysql_query("INSERT INTO dataPesanan(noTransaksi, idMeja, idMenu, harga, user)VALUES('$noTransaksi','$idMeja','$idMenu','$harga','$user')");
$query2=mysql_query("UPDATE daftarmenu SET stock=(stock-1) WHERE id='$idMenu'");
$query3=mysql_query("INSERT INTO logs(activity, status, username)VALUES('$activity','1','$user')");

if(!$query){
	$query2=mysql_query("INSERT INTO logs(activity, status, username)VALUES('$activity','2','$user')");	
}
?>