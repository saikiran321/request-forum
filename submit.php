<?php  
	session_start();
?>
<html>
<form action="submit.php" method="post">
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

include('includes/db.php');
$from_date=$_POST['from_date'];
echo $from_date;

$reason=$_POST['reason'];
$other=$_POST['other'];
$sql="INSERT INTO request (reason,other) VALUES ('$reason','$other')";
$query=mysql_query($sql);
echo $query;

?>