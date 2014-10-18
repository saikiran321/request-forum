<?php  
	session_start();
?>
<html>
<form action="submit.php" method="post">
Hostel
<select name="hostel">
		<option value="naramda">Narmada</option>
		<option value="ganga">Ganga</option>
		<option value="godavari">Godavari</option>
		<option value="tapti">Tapti</option>
</select>
<br>
Reason:<input type="text" name="reason">
<br>
Other:<input type="text" name="other">
<br>
<input type="submit">
</form>

</html>

<?php
include('includes/db.php');
$hostel=$_POST['hostel'];
$reason=$_POST['reason'];
$other=$_POST['other'];

//echo $hostel;
//echo $reason;
//echo $other;

$sql="INSERT INTO request (hostel,reason,other) VALUES ('$hostel','$reason','$other')";
$query=mysql_query($sql);
echo $query;


?>

