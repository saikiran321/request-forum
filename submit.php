<?php
//if(!isset($_SESSION[])){
//header('/index.php');
//}
?>
<!DOCTYPE html>
<html>
<head>
<title>Request Forum</title>
<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
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



Request Title:<input type="text" placeholder="Title" class="form-control col-md-4">
Reason:<textarea name="reason" placeholder="reason" class="form-control col-md-4"></textarea>
From:<input type="date" name="from_date" class="form-control col-md-4 required">
To:<input type="date" name="to_date" class="form-control col-md-4" required>
Email:<input type="email" name="email" class="form-control" required>
<input type="submit">
</form>
<form class="form-horizontal" role="form" action="" method="post">
  <div class="form-group">
    <label for="inputTitle3" class="col-sm-2 control-label">Request Title</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputTitle3" placeholder="Title" name="title">
    </div>
  </div>
  <div class="form-group">
    <label for="inputReason3" class="col-sm-2 control-label">Reason</label>
    <div class="col-sm-10">
      <textarea class="form-control" id="inputReason3" placeholder="Reason" name="reason"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="inputFrom3" class="col-sm-2 control-label">From Date</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputFrom3" placeholder="DD/MM/YYYY" name="from_date">
    </div>
  </div>
  <div class="form-group">
    <label for="inputTo3" class="col-sm-2 control-label">To Date</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputTo3" placeholder="DD/MM/YYYY" name="to_date">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" placeholder="your email">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-default" value="Submit Request">
    </div>
  </div>
</form>
<?php
}
?>
</body>
</html>
