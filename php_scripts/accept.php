<?php
	//include_once('mysql_config.php');
   
	$username = "root";
    $password = "a";
    $hostname = "localhost";
    
    //connection to the database
    $dbhandle = mysql_connect($hostname, $username, $password) or die("Unable to connect to MySQL");
    //echo "Connected to MySQL<br>";
    //echo "Connected to MySQL<br>";
    //select a database to work with
    $selected = mysql_select_db('request_forum',$dbhandle) or die("Could not select examples");
    //echo "hi..";
   
    $var = "update `request` set auth_level=".$_GET['auth_level']+1." where id=".$_GET['id'];
    $result = mysql_query($var);

    header("Location: retrieve.php");
?>
</body>
