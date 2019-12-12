<?php
    require 'db.php';
    $email = mysqli_real_escape_string($mysqli,$_POST['email']);
    $password = mysqli_real_escape_string($mysqli,$_POST['password']);
    $password = md5($password);
    $flag = 0;
    $sql = "SELECT *  FROM `user` WHERE `email` = '".$email."' AND `password` = '".$password."'";
    $result = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($result);
    if ($count==1) {
            while ($row = $result->fetch_assoc()) {
                echo 'valid credentials';
                $_SESSION['user_id'] = $row["user_id"];
        }
    } else {
        $_SESSION['error_message'] = 'Invalid credentials.';
        header("Location: ../login.php"); 
        exit();
    }
    $mysqli->close();
?>