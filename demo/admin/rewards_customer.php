<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$user_id = filter_input(INPUT_POST, 'user_id');
$rewards = filter_input(INPUT_POST, 'rewards');
if ($user_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	if($_SESSION['admin_type']!='super'){
		$_SESSION['failure'] = "You don't have permission to perform this action";
    	header('location: customers.php');
        exit;

	}
    $customer_id = $user_id;

    $data_to_db['rewards'] = $rewards;
    $db = getDbInstance();
    $db->where('user_id', $customer_id);
    $status = $db->update('user', $data_to_db);
    
    if ($status) 
    {
        $_SESSION['info'] = "Customer rewarded successfully!";
        header('location: customers.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to reward customer";
    	header('location: customers.php');
        exit;

    }
    
}