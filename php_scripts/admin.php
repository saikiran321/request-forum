<?php
    $username = "root";
    $password = "root";
    $hostname = "localhost";
    
    //connection to the database
    $dbhandle = mysql_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");
   
    //select a database to work with
    $selected = mysql_select_db("first ass",$dbhandle)
    or die("Could not select examples");
    
    
    
    
    $var = "SELECT Name,User_id FROM REQ_FORM";
    $result = mysql_query($var);
    
    while($row = mysql_fetch_assoc($result)) {
        echo $row['Name'];
        echo "<br>";

        <form name="myform1" action=" " method="POST">
       <input value=$row['user_id'],name="user_id">
       <input value="1",name="status">
       <input type="submit" value="Accept">
       </form>
       
        <form name="myform2" action=" " method="POST">
        <input value=$row['user_id'],name="user_id">
        <input value="0",name="status">
        <input type="submit" value="Reject">
        </form>

    }

    ?>