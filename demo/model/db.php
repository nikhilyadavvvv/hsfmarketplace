<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);

if(!isset($_SESSION)) 
{ 
	session_start(); 
}


$host = "database-1.cdatrlmmreql.us-east-1.rds.amazonaws.com";
$user = "admin";
$psw = "password";
$databse = "GDSD_schema";
$mysqli = mysqli_connect($host,$user,$psw,$databse);

if(mysqli_connect_errno($mysqli)){
	echo "failed to connect to Mysql" .mysqli_connect_error();
}

?>