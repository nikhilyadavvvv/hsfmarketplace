<?php

     require 'db.php';
    if(empty($_SESSION['user_id'])){
    echo "You are not logged in ";
    exit();
    }
    $user_id = $_SESSION['user_id'];
    $firstname = mysqli_real_escape_string($mysqli,$_POST['firstname']);
    $lastname = $email = mysqli_real_escape_string($mysqli,$_POST['lastname']);
    $city = $email = mysqli_real_escape_string($mysqli,$_POST['city']);
    $state = mysqli_real_escape_string($mysqli,$_POST['state']);
    $zip = $email = mysqli_real_escape_string($mysqli,$_POST['zip']);
    $email = mysqli_real_escape_string($mysqli,$_POST['email']);
    $phone = $email = mysqli_real_escape_string($mysqli,$_POST['phone']);
    $country = $email = mysqli_real_escape_string($mysqli,$_POST['country']);



    

    $sql = "UPDATE `user` SET `firstname` = '$firstname', `lastname` = '$lastname',  `city` = '$city', `state` = '$state', `zip` = '$zip', `email` = '$email', `phone` = '$phone', `country` = '$country' WHERE `user`.`user_id` = '$user_id'";
    $result = mysqli_query($mysqli, $sql);
    echo 'Data updated successfully';
    $mysqli->close();
?>