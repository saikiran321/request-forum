<?php
	$ldapLogin = true;

	$host = "localhost";
	$username = "students";
	$password = "";
	$db_name = "students";
	$tbl_name = "users";

	$con = mysql_connect("$host", "$username", "$password")or die("cannot connect to host"); 

	mysql_select_db("$db_name")or die("cannot select DB");
?> 
