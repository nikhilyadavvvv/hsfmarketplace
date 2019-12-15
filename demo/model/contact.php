<?php
require 'db.php';
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$sql = "INSERT INTO `contact_admin` (`name`, `email`, `subject`, `message`) VALUES 
('$name', '$email', '$subject', '$message')";

if (mysqli_query($mysqli,$sql)) {
    //$_SESSION['error_message'] = $errors;
    $_SESSION['success_message'] = 'We received your message.';
    header("Location: ../contact.php"); 
    exit();
} else {
    echo mysqli_error($mysqli);
}
?>