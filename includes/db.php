<?php


$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="sai"; // Mysql password 
$db_name="crdtb"; // Database name 
$Connect=mysql_connect($host,$username,$password) or die('can not connect');
$Database=mysql_select_db("forum") or die('can not select db');


?>