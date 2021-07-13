<?php
$dbms = "mysql";
$db_host = 'h223293-3.mysql';
$db_user = 'h223293-3_mysql';
$db_name = 'h223293-3_ud_03_26122__00';
$db_pass = "x0pd6syj";
$link = mysql_connect($db_host, $db_user, $db_pass) or die("Не могу соединиться.");
mysql_select_db($db_name, $link);


// your registration data
$mrh_pass2 = "mg5zX2Umn73JUpXlvR1G";  // merchant pass2 here

// HTTP parameters:
$out_summ = $_GET["OutSum"];
$inv_id = $_GET["InvId"];
$crc = $_GET["SignatureValue"];

// HTTP parameters: $out_summ, $inv_id, $crc
$crc = strtoupper($crc);  // force uppercase

// build own CRC
$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2:shpItem=$shp_item"));
$my_crc2 = strtoupper(md5("$mrh_login:$out_summ:$inv_id:$mrh_pass2:shpItem=$shp_item"));

/*
print_r($_REQUEST);
echo '<hr/>';
print_r($crc);
echo '<hr/>';
print_r($my_crc);
echo '<hr/>';

/*
if (strtoupper($my_crc) != strtoupper($crc))
{
  echo "bad sign\n";
  exit();
}*/

// print OK signature
//echo "OK$inv_id\n";

// doing our stuff
// select from sell
	
	$query = mysql_query("SELECT * FROM sell WHERE id=$inv_id LIMIT 0,1;");
	$rows = mysql_fetch_array($query);
	//print_r($rows);
	$type2 = $rows['type2'];
	$uid = $rows['uid'];
	//echo '1-'.$type2;
// обновляем статус - "уплочено"
	$query = "UPDATE sell SET realpay=1 WHERE id=$inv_id;";
	$database = mysql_query( $query ); 
// если дата - то меняем дату
	if ($type2==1) {
		echo 222;
		$curdate = date('Y-m-d H:i:s');
		$query = "UPDATE sar_ezrealty SET listdate='".$curdate."' WHERE id=$uid;";
		$database = mysql_query( $query ); 
		echo mysql_errno($link) . ": " . mysql_error($link).'<br/><b>Query: </b>'.$query;/**/
		$query = "UPDATE sar_ezrealty SET availdate='".$curdate."' WHERE id=$uid;";
		$database = mysql_query( $query ); 
		echo mysql_errno($link) . ": " . mysql_error($link).'<br/><b>Query: </b>'.$query;/**/
	}
?>