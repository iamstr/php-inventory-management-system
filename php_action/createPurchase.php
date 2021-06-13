        
			
		<?php 	
//ALTER TABLE `orders` ADD `payment_place` INT NOT NULL AFTER `payment_status`;
//TER TABLE `orders` ADD `gstn` VARCHAR(255) NOT NULL AFTER `payment_place`;
require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array(), 'order_id' => '');
// print_r($valid);
if($_POST) {	

  
 
		

          $clientShip=$_POST["clientShip"];
          $clientAddress=$_POST["clientAddress"];
          $clientBlock=$_POST["clientBlock"];
          $clientContact1=$_POST["clientContact1"];

          $item=$_POST["item"];
          $desc=$_POST["desc"];
          $quantity=$_POST["quantity"];
          $rate=$_POST["rate"];
          $total=$_POST["totalValue"];
          $clientName1 = $_POST['clientName1'];
			
			
			
  

				
	
  
  
  
  
  
  $sql = "INSERT INTO `lpo_item`( `lpo_item_shipped`, `lpo_item_contact`, `lpo_item_address`, `lpo_item_block`, `client_id`) VALUES ( '$clientShip', '$clientContact1', '$clientAddress', '$clientBlock', '$clientName1')";
	
	$lpo_item_id;
	$orderStatus = false;
	if($connect->query($sql) === true) {
		$lpo_item_id = $connect->insert_id;
		$valid['lpo_item_id'] = $lpo_item_id;	

		$orderStatus = true;
	}else {
  echo  "Error: " . $sql . "<br>" . $connect->error;
}
  
  

		
	// echo $_POST['productName'];
	$orderItemStatus = false;

	for($x = 0; $x < count($_POST['item']); $x++) {			
		
		
		
										
				// update product table
				
				// add into order_item
				$orderItemSql = "INSERT INTO `lpo`( `item`, `Description`, `quantity`, `Unit Price`,total, `lpo_item_id`) VALUES ('".$_POST['item'][$x]."', '".$_POST['desc'][$x]."', '".$_POST['quantity'][$x]."', '".$_POST['rate'][$x]."', '".$_POST['totalValue'][$x]."',$lpo_item_id)";

				$connect->query($orderItemSql);		

				if($x == count($_POST['item'])) {
					$orderItemStatus = true;
				}
      
      
      
      $productItemCount=$_POST['quantity'][$x];
      $productItemName=$_POST['item'][$x];
      $productItemSql="select * from product where product_name='$productItemName'";
      
      if($productItemSqlResult=$connect->query($productItemSql)){
      if ($productItemSqlResult->num_rows > 0) {
		$updateProductItemSql="update product set quantity=quantity+$productItemCount where product_name='$productItemName'";
      if($connect->query($updateProductItemSql)){
        
         echo "product did update ";
      }else{
        die("Update failed: " . $connect->error);
      }
        echo "product does exist ";
	} // /for quantity
      else{
         echo "product does not exist ".$_POST['item'][$x];
         die("something went wrong " . $connect->error);
       
      }
    }
    }
	$valid['success'] = true;
	$valid['messages'] = "Successfully Added";		
	
	$connect->close();
 setcookie("lpo", $_POST, time() + (86400 * 30), "/");
 $_SESSION["lpo"]=$_POST;
 $_SESSION["lpo_last_id"]=$lpo_item_id;
  header("Location: ../lpo.php");
	echo json_encode($valid);
 
} // /if $_POST
// echo json_encode($valid);
  
  ?>