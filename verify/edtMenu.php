<?php
 $nm_file = $_FILES["gambar"]["name"];
 $tp_file = $_FILES["gambar"]["tmp_name"];
 $dir = "images/$nm_file";
 move_uploaded_file($tp_file, $dir);
 $id= $_POST['id'];
 $tipe= $_POST['tipe'];
 $namaMenu= $_POST['namaMenu'];
 $hargaTemp= $_POST['harga'];
 $harga= str_replace(".", "", $hargaTemp);
 $stock= $_POST['stock'];
 $user= $_POST['user'];
 $activity= '"'.$user.'" edit menu : "'.$namaMenu.'"';

include'../config.php';
if(empty($nm_file)){
	$query=mysql_query("UPDATE daftarmenu SET namaMenu='$namaMenu', tipe='$tipe', harga='$harga', stock='$stock', user='$user' WHERE id='$id'");	
}else{
	$query=mysql_query("UPDATE daftarmenu SET namaMenu='$namaMenu', tipe='$tipe', gambar='$dir', harga='$harga', stock='$stock', user='$user' WHERE id='$id'");
}
$query2=mysql_query("INSERT INTO logs(activity, status, username)VALUES('$activity','1','$user')");

if(!$query){
	$query3=mysql_query("INSERT INTO logs(activity, status, username)VALUES('$activity','2','$user')");
}
header('location:masterMenu');
?>