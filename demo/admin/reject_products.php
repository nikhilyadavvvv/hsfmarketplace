<?php 
session_start();
require_once 'includes/auth_validate.php';
require_once './config/config.php';
$rej_id = filter_input(INPUT_POST, 'rej_id');
if ($rej_id && $_SERVER['REQUEST_METHOD'] == 'POST') 
{

	if($_SESSION['admin_type']!='super'){
		$_SESSION['failure'] = "You don't have permission to perform this action";
    	header('location: products.php');
        exit;

	}
    $product_id = $rej_id;

    $data_to_db['status'] = 'unapproved';
    $db = getDbInstance();
    $db->where('id', $product_id);
    $status = $db->update('table_product', $data_to_db);
    
    if ($status) 
    {
        $_SESSION['info'] = "Product rejected successfully!";
        header('location: products.php');
        exit;
    }
    else
    {
    	$_SESSION['failure'] = "Unable to reject customer";
    	header('location: products.php');
        exit;

    }
    
}