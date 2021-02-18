<?php 	

require_once 'core.php';



$valid = array('order' => array(), 'order_item' => array());

$sql = "SELECT * from  lpo 	order by lpo_id desc limit 1";

$result = $connect->query($sql);
$data = $result->fetch_row();
$valid['order'] = $data;


$connect->close();

echo json_encode($valid);

?>