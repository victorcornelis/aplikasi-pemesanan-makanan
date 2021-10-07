<?php
include_once('../config.php');
$result = mysql_query("SELECT * FROM daftarmenu WHERE status = 0");
$array_data = array();
while($baris = mysql_fetch_assoc($result))
{
  $array_data[]=$baris;
}

echo json_encode($array_data);
?>