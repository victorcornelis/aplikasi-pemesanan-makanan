<?php
$noTransaksi= $_POST['noTransaksi'];
$user= $_POST['user'];
$activity= 'Kasir melakukan transaksi pelunasan dengan pada no.pemesanan : "'.$noTransaksi.'"';

include'../config.php';
$query2=mysql_query("UPDATE datapesanan SET lunas = 1 WHERE noTransaksi='$noTransaksi'");
$query3=mysql_query("INSERT INTO logs(activity, status, username)VALUES('$activity','1','$user')");

if(!$query){
	$query2=mysql_query("INSERT INTO logs(activity, status, username)VALUES('$activity','2','$user')");	
}
?>