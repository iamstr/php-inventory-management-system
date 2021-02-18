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
	
	$code= $_POST['code'];
	$personal_id= $_POST['personal_id'];
	$contact= $_POST['contact'];
	$phone= $_POST['phone'];
	$company= $_POST['company'];
    $designation=$_POST['designation'];
    $group=$_POST['group'];
  
  
//  $userid = $_POST['userid'];

$sql = "SELECT * FROM clients WHERE client_pin = $pin";
$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows
  
  else{
    
    $sql = "insert into `clients`( `client_name`, `client_pin`, `client_tel1`, `client_tel2`, `client_email`, `client_website`, `client_address`, `client_floor`, `client_county`, `client_city`, `client_street`, `client_location`, `contact_person`, `contact_number`, `contact_company`, `contact_designation`, `contact_ID`, secondary_id,contact_group)
				VALUES ('$username','$pin', '$tel1' ,'$tel2','$email','$website','$address','$floor' ,'$county','$city','$street','$location','$contact','$phone','$company', '$designation','$personal_id','$code','$group')";
				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
                  echo $connect->error;
				}
  }

  
  
  
				

				// /else	
		
	} // if in_array 		

	$connect->close();

	echo json_encode($valid);
 
