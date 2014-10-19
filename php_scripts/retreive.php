<?php
    $username = "root";
    $password = "root";
    $hostname = "localhost";
    
    //connection to the database
    $dbhandle = mysql_connect($hostname, $username, $password)
    or die("Unable to connect to MySQL");
    //echo "Connected to MySQL<br>";
    //echo "Connected to MySQL<br>";
    //select a database to work with
    $selected = mysql_select_db("requests_form",$dbhandle)
    or die("Could not select examples");
    //echo "hi..";
    
    $var = "SELECT * FROM request";
    $result = mysql_query($var);
  

    while($row = mysql_fetch_assoc($result)) {
        
      
        echo <div class="result"> "Reason:"</div>;
        echo <div class="result"> $row['reason']</div>;
        
        echo "&nbsp";
        echo "&nbsp";
        echo "&nbsp";
        echo "Auth_level:";
        echo $row['auth_level'];
        echo "&nbsp";
        echo "&nbsp";
        echo "&nbsp";
        echo "Reject_level:";
        echo $row['reject_level'];
        echo "<br>";
        echo "<br>";
        echo "<br>";
    }
    
?>

