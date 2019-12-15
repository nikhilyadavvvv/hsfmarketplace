<?php
    require 'db.php';
    $from = $_SESSION["user_id"];
    if(empty($from)){
        echo "login to send message";
        exit();
    }
    $to = $_POST["to"];
    $content = $_POST["content"];
    $timestamp = date('Y-m-d H:i:s');
    $product_id = $_POST["product_id"];
    $sql = "INSERT INTO `message` (`message_id`, `sender`, `receiver`, `timestamp`, `product_id`, `content`) VALUES (NULL, '$from', '$to', '$timestamp', '$product_id', '$content')";
    mysqli_query($mysqli, $sql);
    echo "message sent";
?>