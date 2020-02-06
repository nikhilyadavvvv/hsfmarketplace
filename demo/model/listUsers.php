<?php
require 'db.php';
$json = file_get_contents('php://input');
$data = json_decode($json);
$verifier = mysqli_real_escape_string($mysqli, $data->croma);
if ($verifier === "x1x2x3x4x5x6x7x8x9") {
    $sql = "SELECT *  FROM `user`";
    $result = mysqli_query($mysqli, $sql);
    $json_array = array();
    while ($row = $result->fetch_assoc()) {
        $data =  array();
        $data['id'] = $row["user_id"];
        $sql2="SELECT * FROM `basket` WHERE `basket`.user_id = "+$row["user_id"];
        $resultx = mysqli_query($mysqli, $sql2);
        $count = mysqli_num_rows($resultx);
        $data['count'] = $count;
        $data['email'] = $row["email"];
        $json_array[] = $data;
    }
    $json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);
}

$mysqli->close();
