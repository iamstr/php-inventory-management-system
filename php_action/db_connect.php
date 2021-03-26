<?php 	
//username ---- emitekcl
//password ---- 1nY+0O*lZwYk35
//database ---- emitekcl_inventory
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "store";
//$store_url = "http://localhost/php-inventory-management-system/";
$store_url = "/";
// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  // echo "Successfully connected";
}

?>