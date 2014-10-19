<?php
    $username = "root";
    $password = "root";
    $hostname = "localhost";
    
    //connection to the database
    $dbhandle = mysql_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");
    echo "Connected to MySQL<br>";
    echo "Connected to MySQL<br>";
    //select a database to work with
    $selected = mysql_select_db("first ass",$dbhandle)
    or die("Could not select examples");
    echo "hi..";



$Status= $_POST['status']
    if($Status==1){
        
        mysql_query("UPDATE TABLE_NAME SET ADMIN_VALUE=2
                    WHERE User_id=$_POST['user_id'])
}