<?php 	

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());

if($_POST) {
	$username = $_POST['fullname'];
	$email 		= $_POST['email'];
	$tel1 		= $_POST['tel1'];
	$tel2 		= $_POST['tel2'];
	$website 		= $_POST['website'];
	$address 		= $_POST['address'];
	$pin 		= $_POST['pin'];
	$location 		= $_POST['location'];
	$floor 		= $_POST['floor'];
	$street 		= $_POST['street'];
	$county 		= $_POST['county'];
	$city 		= $_POST['city'];
	$userid 		= $_POST['userid'];
    $code= $_POST['code'];
	$personal_id= $_POST['personal_id'];
	$contact= $_POST['contact'];
	$phone= $_POST['phone'];
	$company= $_POST['company'];
    $designation=$_POST['designation'];
				
	$sql = "UPDATE clients SET client_name = '$username', client_tel1 = '$tel1', client_tel2='$email' ,client_email='$email',client_pin='$pin',client_location='$location',client_street='$street',client_city='$city',client_county='$county',client_website='$website',client_floor='$floor',client_address='$address',`contact_person`='$contact',`contact_number`='$phone',`contact_company`='$company',`contact_designation`='$designation',`contact_ID`='$personal_id',`secondary_id`='$code'
    
    
    WHERE client_id = $userid ";

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
 
