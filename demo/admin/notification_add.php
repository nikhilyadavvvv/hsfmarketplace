<?php
function add_notification($sender, $receiver, $message, $link){

	$data_to_db['sender'] = $sender;
	$data_to_db['receiver'] = $receiver;
	$data_to_db['message'] = $message;
	$data_to_db['link'] = $link;
	$data_to_db['read'] = '0';
	/*print_r($data_to_db);
	exit();*/

	$db = getDbInstance();
	$status = $db->insert('notification', $data_to_db);
}

?>