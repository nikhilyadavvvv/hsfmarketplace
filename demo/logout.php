<?php
if(!isset($_SESSION)) 
{ 
	session_start(); 
}
session_unset();
session_destroy();
session_start();

header("Location: login.php"); 
exit();
?>