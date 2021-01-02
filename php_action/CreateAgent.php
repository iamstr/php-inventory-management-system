<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {	

	$fullname 		= $_POST['fullname'];
  $phone			= $_POST['phone'];
  $email 			= $_POST['email'];

	
				$sql = "INSERT INTO agents (agent_fullname,agent_phone,agent_email) 
				VALUES ('$fullname', '$phone' , '$email')";
				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				}

				// /else	
		
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
