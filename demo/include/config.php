<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";


$segment = basename(parse_url($url, PHP_URL_PATH));
/*echo $segment;
exit();*/

if ($segment == 'my_products.php' && !isset($_SESSION['user_id'])) {
	$_SESSION['error_message'] = 'You are not logged in.';
	header('Location: logout.php');
} else if ($segment == 'profile.php' && !isset($_SESSION['user_id'])){
	$_SESSION['error_message'] = 'You are not logged in.';
	header('Location: logout.php');
}else if ($segment == 'edit_profile.php' && !isset($_SESSION['user_id'])){
	$_SESSION['error_message'] = 'You are not logged in.';
	header('Location: logout.php');
}


?>