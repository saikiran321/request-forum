<?php


$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="sai"; // Mysql password 
$db_name="crdtb"; // Database name 
$connect=mysql_connect($host,$username,$password) or die('can not connect');
$database=mysql_select_db("request_forum") or die('can not select db');


?>
