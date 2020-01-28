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
        $data['email'] = $row["email"];
        $json_array[] = $data;
    }
    $json_array = json_encode($json_array);
    header('Content-Type: application/json');
    print_r($json_array);
}

$mysqli->close();
