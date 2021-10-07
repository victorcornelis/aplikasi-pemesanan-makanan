<?php
$data = array(
    'modul'    => $_POST['modul'],
    'username' => $_POST['username'],
    'password' => $_POST['password']
);
$url="http://localhost/primaya/API/aksesLogin";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 
$result = curl_exec($ch);
echo $result; 
 
curl_close($ch);
?>