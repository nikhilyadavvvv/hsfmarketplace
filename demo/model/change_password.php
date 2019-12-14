<?php
require 'db.php';
$user_id = $_SESSION['user_id'];
$email = mysqli_real_escape_string($mysqli,$_POST['email']);
$password = mysqli_real_escape_string($mysqli,$_POST['password']);
$n_password = mysqli_real_escape_string($mysqli,$_POST['n_password']);
$c_password = mysqli_real_escape_string($mysqli,$_POST['c_password']);
$password = md5($password);

if ($n_password != $c_password) {
    $_SESSION['error_message'] = 'The confirm password you entered does not match.';
    header("Location: ../change_password.php"); 
    exit();
}else{
    $flag = 0;
    $sql = "SELECT *  FROM `user` WHERE `email` = '".$email."' AND `password` = '".$password."'";
    $result = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($result);
    if ($count==1) {
        $n_password = md5($n_password);

        $sql = "update user SET password = '$n_password', email = '$email' where user_id = $user_id";
        if (mysqli_query($mysqli,$sql)) {

            $_SESSION['success_message'] = 'Password changed successfully.';
            header("Location: ../profile.php"); 
            exit();
        } else {
            echo mysqli_error($mysqli);
        }


    } else {
        $_SESSION['error_message'] = 'The Current password you entered does not match.';
        header("Location: ../change_password.php"); 
        exit();
    }
}

?>