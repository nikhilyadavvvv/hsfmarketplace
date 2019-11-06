<?php
$host = "localhost";
$user = "root";
$psw = "root";
$databse = "gdsd";
$mysqli = mysqli_connect($host,$user,$psw,$databse);

if(mysqli_connect_errno($mysqli)){
    echo "failed to connect to Mysql" .mysqli_connect_error();
  }

?>