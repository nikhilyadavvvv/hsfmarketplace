<?php

    session_start();


    if(empty($_SESSION['user_id'])){
    echo "You are not logged in ";
    exit();
    }
    $user_id = $_SESSION['user_id'];

    require 'db.php';

    $sql = "SELECT *  FROM `user` WHERE `user_id` = '".$user_id."'";
    $result = mysqli_query($mysqli, $sql);
    $count = mysqli_num_rows($result);

    $endpoint = array();

    if ($count==1) {
            while ($row = $result->fetch_assoc()) {
                $data = array();
                $data['user_id'] = $row["user_id"];
                $data['firstname'] = $row["firstname"];
                $data['lastname'] = $row["lastname"];
                $data['password'] = $row["password"];
                $data['initial_email'] = $row["initial_email"];
                $data['city'] = $row["city"];
                $data['state'] = $row["state"];
                $data['zip'] = $row["zip"];
                $data['email'] = $row["email"];
                $data['phone'] = $row["phone"];
                $data['country'] = $row["country"];
                $data['is_buyer'] = $row["is_buyer"];
                $data['is_seller'] = $row["is_seller"];
                $endpoint[] = $data;
          }
        }
    $json = json_encode($endpoint);
    header('Content-Type: application/json');
    print_r($json);
    $mysqli->close();
?>