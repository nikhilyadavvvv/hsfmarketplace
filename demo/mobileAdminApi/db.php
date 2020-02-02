<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);

if(!isset($_SESSION)) 
{ 
	session_start(); 
}


$host = "3.134.103.215";
$user = "remote";
$psw = "Remote2019@";
$databse = "GDSD_schema";
$mysqli = mysqli_connect($host,$user,$psw,$databse);

if(mysqli_connect_errno($mysqli)){
	echo "failed to connect to Mysql" .mysqli_connect_error();
}

?>
