<?php 	



require_once 'core.php';

$sql = "SELECT lpo_item_id ,clients.client_name,`lpo_item_shipped`, `lpo_item_contact`, `lpo_item_address`, `lpo_item_block`, `lpo_item_date` FROM lpo_item INNER JOIN clients ON clients.client_id = lpo_item.client_id";

$result = $connect->query($sql);

$output = array('data' => array());

if($result->num_rows > 0) { 

 // $row = $result->fetch_array();
 $active = ""; 
$items_array=array();
 while($row = $result->fetch_array()) {
   
   
   
  
 	$productId = $row[0];
 	// active 
 	 $sqlItems="select * from lpo where lpo_item_id='$productId'";
   $sqlItemsResult = $connect->query($sqlItems);
   $itemCount = $sqlItemsResult ->num_rows;
   
   
   
   
   
  
 	// active 
 	 $sqlTotal="select sum(total) as sum_total from lpo where lpo_item_id='$productId'";
   
   
  $sqlTotalResult= mysqli_query($connect, $sqlTotal);
  $sqlTotalRow = mysqli_fetch_assoc($sqlTotalResult); 
$total = $sqlTotalRow['sum_total'];
   

 	$button = '<!-- Single button -->
	<div class="btn-group">
	  <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
	  <ul class="dropdown-menu">
	    <li><a href="?lpo='.$productId.'" target="_blank"> <i class="glyphicon glyphicon-eye-open"></i> View</a></li>
	   <li><a type="button" data-toggle="modal" data-target="#removeOrderModal" id="removeOrderModalBtn" onclick="removeOrder('.$productId.')"> <i class="glyphicon glyphicon-trash"></i> Remove</a></li>    
	</div>';

	// $brandId = $row[3];
	// $brandSql = "SELECT * FROM brands WHERE brand_id = $brandId";
	// $brandData = $connect->query($sql);
	// $brand = "";
	// while($row = $brandData->fetch_assoc()) {
	// 	$brand = $row['brand_name'];
	// }

//	$items=$row[1];
//	$quantity = $row[3];
//
//	$unit=$row[4];
//	$total=$row[5];
	$date=$row[6];

 	$output['data'][] = array( 		
 	$productId,	
	$itemCount,
	$row[1],
	$total,
	$date,
 		
 		// button
 		$button 		
 		); 	
 } // /while 

}// if num_rows

$connect->close();

echo json_encode($output);