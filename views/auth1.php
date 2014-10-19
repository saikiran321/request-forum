<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "chiru";
$conn = mysql_connect($host,$user,$pass);
if(!$conn){
  die('Could not connect: '.mysql_error());
}
$sql1 = 'SELECT * FROM request WHERE auth_level=2';
$sql2 = 'SELECT * FROM users WHERE id='.$row1['user_id'];
mysql_select_db('request_forum');
$result1 = mysql_query($sql1,$conn);
if(!$result1){
die('Could not get data1 '.mysql_error());
}
$row1 = mysql_fetch_array($result1,MYSQL_ASSOC);
$result2 = mysql_query($sql2,$conn);
if(!$result2){
die('Could not get data2 '.mysql_error());
}
$row2 = mysql_fetch_array($result2,MYSQL_ASSOC);

mysql_close($conn);
?>
