<html>
<head>
<title>Requests</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<div class="page-header" style="text-align:center;">
  <h1>Requests</h1>
</div>
<div class="container-fluid">
<div class="row-fluid"> 
<div class="col-md-6 col-md-offset-3">
<?php
	session_start();
	$auth_level=$_SESSION['auth_level'];
	
	//include_once('mysql_config.php');
   
	$username = "root";
    $password = "root";
    $hostname = "localhost";
    
    //connection to the database
    $dbhandle = mysql_connect($hostname, $username, $password) or die("Unable to connect to MySQL");
    //echo "Connected to MySQL<br>";
    //echo "Connected to MySQL<br>";
    //select a database to work with
    $selected = mysql_select_db('request_forum',$dbhandle) or die("Could not select examples");
    //echo "hi..";
    
    $var = "SELECT * FROM request where auth_level='$auth_level'";
	
    $result = mysql_query($var);
  

    while($row = mysql_fetch_assoc($result)) {
        
      
        echo "<div style='margin-top:20px; margin-left:20px;' class='panel panel-primary'>";
		echo "<div class='panel-heading'>";
		echo "<h3 class='panel-title'>".$row['title']."</h3>";
		/*
		echo "<div style='text-align:left'>";
		echo "<h3 class='panel-title'>".$row['username']."</h3>";
		echo "<h3 class='panel-title'>".$row['roll_no']."</h3>";
		echo "</div>";
		*/
		echo "</div>";
        echo "<div class='panel panel-body'>".
             "<strong>Reason</strong>:".$row['reason']."<br>";
        echo "<strong>Authority Level</strong>:".$row['auth_level']."<br>";
		echo "<strong>Reject Level</strong>:".$row['reject_level']."<br>";
		echo "</div>";
		echo "<div class='panel-footer' style='text-align:right;'>";
		echo "<button type='button' class='btn btn-sm btn-success'>Accept</button>".
		     "<button type='button' class='btn btn-sm btn-danger' style='margin-left:8px;'>Decline</button>";
		echo "</div>";
		echo "</div>";
      
        echo "<br>";
        echo "<br>";
    }
    
?>
</div>
</div>
</div>
</body>
