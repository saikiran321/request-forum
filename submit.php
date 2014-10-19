<?php  
	session_start();
?>
<html>
<form action="" method="post">
<br>
Reason:<input type="text" name="reason">
<br>
From:<input type="date" name="from_date">
<br>
To:<input type="date" name="to_date">
<input type="submit">
</form>
</html>

<?php
if(isset($_POST['submit'])){
include('includes/db.php');
$from_date=$_POST['from_date'];
$to_date = $_POST['to_date'];
$reason=$_POST['reason'];

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
}
}
?>
