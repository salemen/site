<?php
 
header('Content-Type: text/html; charset=utf-8');
 
include("bd.php");
 
$iconText = htmlspecialchars($_POST['icontext']);
$hintText = htmlspecialchars($_POST['hinttext']);
$balloonText = htmlspecialchars($_POST['balloontext']);
$stylePlacemark = $_POST['styleplacemark'];
$lat = $_POST['lat'];
$lon = $_POST['lon'];
 
$sql = "INSERT INTO ymapapiv2_markers (`id`, `iconText`, `hintText`, `balloonText`, `stylePlacemark`, `lat`, `lon`) VALUES (NULL, '$iconText', '$hintText', '$balloonText', '$stylePlacemark', '$lat', '$lon');";
 
$result = mysql_query($sql) or die("Ошибочный запрос: " . mysql_error());
 
?>