<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$edituserName = $_POST['edituserName'];
	$editPhone 		= $_POST['editPhone'];
	$editEmail 		= $_POST['editEmail'];
	$userid 		= $_POST['userid'];

				
	$sql = "UPDATE agents SET agent_fullname = '$edituserName', agent_phone = '$editPhone', agent_email='$editEmail' WHERE agent_id = $userid ";

	if($connect->query($sql) === TRUE) {
		$valid['success'] = true;
		$valid['messages'] = "Successfully Update";	
	} else {
		$valid['success'] = false;
		$valid['messages'] = "Error while updating product info";
	}

} // /$_POST
	 
$connect->close();

echo json_encode($valid);
 
