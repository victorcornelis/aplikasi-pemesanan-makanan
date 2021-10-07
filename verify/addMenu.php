<?php
 $nm_file = $_FILES["gambar"]["name"];
 $tp_file = $_FILES["gambar"]["tmp_name"];
 $dir = "images/$nm_file";
 move_uploaded_file($tp_file, $dir);
 $tipe= $_POST['tipe'];
 $namaMenu= $_POST['namaMenu'];
 $hargaTemp= $_POST['harga'];
 $harga= str_replace(".", "", $hargaTemp);
 $stock= $_POST['stock'];
 $user= $_POST['user'];
 $activity= '"'.$noTransaksi.'" menambahkan menu baru : "'.$namaMenu.'"';

include'../config.php';
$query=mysql_query("INSERT INTO daftarmenu(namaMenu, tipe, gambar, harga, stock, user)
					VALUES('$namaMenu','$tipe','$dir','$harga','$stock','$user')");
$query2=mysql_query("INSERT INTO logs(activity, status, username)VALUES('$activity','1','$user')");

if(!$query){
	$query3=mysql_query("INSERT INTO logs(activity, status, username)VALUES('$activity','2','$user')");
}
header('location:masterMenu');
?>