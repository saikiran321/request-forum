<html>
<head>
<title>Requests</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<?php
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
    
    $var = "SELECT * FROM request";
    $result = mysql_query($var);
  

    while($row = mysql_fetch_assoc($result)) {
        
      
        echo "<div style='margin-top:20px; margin-left:20px;' class='result'>".
             "Reason:".$row['reason']."<br>";
        echo "Authority Level:".$row['auth_level']."<br>";
		echo "Reject Level:".$row['reject_level']."<br>";
		echo "<button type='button' class='btn btn-sm btn-success'>Accept</button>".
		     "<button type='button' class='btn btn-sm btn-danger' style='margin-left:5px;'>Decline</button>";
		echo "</div>";
      
        echo "<br>";
        echo "<br>";
    }
    
?>
</body>
