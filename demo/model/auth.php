<?php
    require 'db.php';
    $email = $_POST["email"];
    $password = $_POST["password"];
    $flag = 0;
    $sql = "SELECT *  FROM `user` WHERE `email` = '".$email."' AND `password` = '".$password."'";
    $result = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($result);
    if ($count==1) {
            while ($row = $result->fetch_assoc()) {
                echo 'valid credentials';
        }
    } else {
        echo 'invalid credentials';
    }
    $mysqli->close();
?>