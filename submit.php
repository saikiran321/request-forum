<?php
if(!isset($_SESSION[])){
header('/index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Request Forum</title>
</head>
<body>
<?php
//session starts here
session_start();

//if form is not submitted run this
if(isset($_POST['submit'])){
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="sai"; // Mysql password 
$connect=mysql_connect($host,$username,$password) or die('can not connect');
$database=mysql_select_db("request_forum") or die('can not select db');

$from_date = $_POST['from_date'];
$to_date   = $_POST['to_date'];
$reason    = $_POST['reason'];
$email     = $_POST['email'];

$sql="INSERT INTO request (reason,from,to) VALUES (".$reason.",".$from_date.",".$to_date.")";

//print_r($sql);
$query=mysql_query($sql);

if (!$query)
{
  echo "Query not successful.";
}
else
{
  echo "Query successful.";
  $array = array($email);
  include('mail.php');
}
}
else {
?>
<form action="" method="post">
<br>
Reason:<input type="text" name="reason">
<br>
From:<input type="date" name="from_date">
<br>
To:<input type="date" name="to_date"><br>
Email:<input type="email" name="email" required><br>
<input type="submit">
</form>
<?php
}
?>
</body>
</html>
