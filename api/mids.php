<?php
$host="localhost"; 
$username="maindb"; 
$password="h097729422"; 
$db_name="houseofsale.co.uk_advertisers"; 
$con=mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");


$sql = ""; 
$result = mysql_query($sql);

$json = array();
$mid= $_GET["mid"];
$start= $_GET["advertiser_name"];
$finish= $_GET["edate"];


$fetch = mysql_query("SELECT `advertiser_name`,`mid` FROM `advertisers` WHERE `status` != 'hold' "); 

while ($row = mysql_fetch_array($fetch, MYSQL_ASSOC)) {
    $row_array['mid'] = $row['mid'];
    $row_array['advertiser_name'] = $row['advertiser_name'];
    array_push($json,$row_array);
	}

echo json_encode($json);
?> 


