<?php    

require_once 'core.php';

$orderId = $_POST['orderId'];

$sql = "SELECT orders.order_id, orders.order_date, client_name, client_tel1, orders.sub_total, orders.vat, orders.total_amount, orders.discount, orders.grand_total, orders.paid, orders.due, orders.payment_type, orders.payment_status,orders.payment_place,orders.gstn ,clients.client_street,clients.client_address,clients.client_floor,clients.client_county,clients.client_location,clients.client_email,clients.client_pin FROM orders inner join clients on orders.client_id=clients.client_id WHERE order_id = $orderId";

$orderResult = $connect->query($sql);
$orderData = $orderResult->fetch_array();

$orderDate = $orderData[1];
$clientName = $orderData[2];
$clientContact = $orderData[3]; 
$clientAddress = $orderData[16]; 
$clientPin = $orderData["client_pin"]; 
$clientCounty = $orderData[18]; 
$clientLocation = $orderData[19]; 
$clientFloor = $orderData[17]; 
$clientEmail = $orderData[20]; 
$clientStreet = $orderData[15]; 
$subTotal = $orderData[4];
$vat = $orderData[5];
$totalAmount = $orderData[6]; 
$discount = $orderData[7];
$grandTotal = $orderData[8];
$paid = $orderData[9];
$due = $orderData[10];
$payment_place = $orderData[1];
$gstn = $orderData[12];

if($payment_type=$orderData[11]===1){
  
  $payment_type="Cheque";
}

else if($payment_type=$orderData[11]===2){
  
  $payment_type="Cash";
}
else
    {

      $payment_type="Credit Card";
    }


$orderItemSql = "SELECT order_item.product_id, order_item.rate, order_item.quantity, order_item.total,
product.product_name FROM order_item
   INNER JOIN product ON order_item.product_id = product.product_id 
 WHERE order_item.order_id = $orderId";
$orderItemResult = $connect->query($orderItemSql);

 $table = '<style>
   
   
   
   
  
   * {
  padding: 0;
  margin: 0;
}
p,h1,h2,h3,h4,h5,h6{
  text-align:left;
}
.wrapper {
  padding: 3rem 2rem;
}
.d-flex {
  display: flex;
}

.flex-column {
  flex-direction: column;
}
.flex-row {
  flex-direction: row;
}

.flex-end {
  justify-content: flex-end;
}


.flex-start {
  justify-content: flex-start;
}
.justify-content-between {
  justify-content: space-between;
}

.justify-content-center {
  justify-content: center;
}

.justify-content-around {
  justify-content: space-around;
}

.justify-content-evenly {
  justify-content: space-evenly;
}

.align-center {
  align-items: center;
}

.align-end {
  align-items: flex-end;
}

.invoice-body:not(.invoice-body:last-child,.invoice-body:nth-child(2)){
  
  margin-right:22rem;
}
.invoice-body:last-child{
  
  margin-left:2rem;
}

.sum-info,
.banking-info {
  justify-content: space-between;
}


.banking,
.sum {
  width: 350px;
}
.sum {
  margin-left: 42rem;
}
.sum,
.tax,
.address,
.invoice {
  margin-top: 3rem;
}

.sum-values {
  
  min-width: 80px;
}
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4caf50;
  color: white;
}
#customers td,
#customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even) {
  background-color: #f2f2f2;
}

#customers tr:hover {
  background-color: #ddd;
}
#customers tr:nth-child(even) {
  background-color: #f2f2f2;
}

#customers{
  margin-top:10rem;
  
}


.banking {
  margin-top: 30rem;
  margin-bottom:3rem;
}

p.banking-values {
    min-width: 120px;
}

.d-none{
  display:none;
}


 </style>
 
 
 
 
 
 
 <div class="d-flex flex-column wrapper">

  <div class="tax d-flex justify-content-between">
   
    <h1 class="tax-header">Tax Invoice</h1>
    <img src="emitek_logo (1).png" alt="" width="100" height="50">
    <div class="tax-info  flex-column">
  <!--   <p>Invoice date</p>
//      <p>Invoice Number</p>
//      <p>Payment Terms</p>
//      
//      <p>Salesperson</p>
//      <p>VAT NO</p>
//      <p>PIN NO</p>
-->
    </div>
    <div class="tax-info flex-column d-none">
      <p>'.$orderDate.'</p>
      <p>'.$orderId.'</p>
      <p>'.$payment_type.'</p>
      
      <p>Shabaan</p>
      <p>011145236</p>
      <p>P14523548</p>
    </div>
  </div>

  <div class="invoice d-flex">
    <div class="invoice-body">

      <h3>Customer Details</h3>
      <p>'.$clientName.'</p>
      <p>'.$clientName.'</p>
      <p>'.$clientCounty.',</p>
      <p>'.$clientAddress.' '.$clientStreet.' '.$clientFloor.'</p>
    </div>
    <!-- 
    <div class="invoice-body">
      <h3>Physical Address</h3>
      <p>'.$clientCounty.',</p>
      <p>'.$clientAddress.' '.$clientStreet.' '.$clientFloor.'</p>
      </div>
      -->
    
    <div class="invoice-body">
      <h3>Account No</h3>
      <p>Customer VAT No</p>
      <p>Reference No</p>
    </div>
    <div class="invoice-body">
      <h3>C0030</h3>
      <p>'.$clientPin.'</p>
      <p>ref'.$orderId.'</p>
    </div>
  </div>

  <table class="lpo-order" id="customers">
    <tbody>
      <tr>
        <th>No.</th>
        <th>Item</th>
       
        <th>Qty</th>
        <th>Unit Price</th>
        <th>Total</th>
      </tr>

 
 
 
 
 
 ';
                  $x = 1;
                  $cgst = 0;
                  $igst = 0;
                  if($payment_place == 2)
                  {
                     $igst = $subTotal*16/100;
                  }
                  else
                  {
                     $cgst = 0;
                  }
                  $total = $subTotal+2*$cgst+$igst;
            while($row = $orderItemResult->fetch_array()) {       
                        
               $table .= '
      <tr>
        <td> '.$x.'</td>
        <td>'.$row[4].'</td>
        <td>'.$row[2].'</td>
        <td>'.$row[1].'</td>
        <td>'.$row[3].'</td>
       
      </tr>
    
 
 
               ';
            $x++;
            } // /while
                $table.= '
                
                
                
                
                </tbody>
  </table>

  <div class="sum d-flex flex-column  ">
    <div class="sum-info d-flex  flex-row">
      <h4 class="sum-header ">SubTotal</h4>
      <p class="sum-values">KES '.$subTotal.'</p>
    </div>
    <div class="sum-info d-flex  flex-row ">
      <h4 class="sum-header">VAT 16%</h4>
      <p class="sum-values">KES '.$vat.'</p>
    </div>
    <div class="sum-info d-flex  flex-row">
      <h4 class="sum-header">Total</h4>
      <p class="sum-values">KES '.$totalAmount.'</p>
    </div>
  </div>

  <div class="banking d-flex flex-column">

    <div class="banking-info d-flex flex-row justify-content-between ">
      <h4 class="banking-header">Account Name</h4>
      <p class="banking-values">Emitek Cleaning</p>

    </div>
    <div class="banking-info d-flex flex-row">
      <h4 class="banking-header">Bank Name</h4>
      <p class="banking-values">FCB</p>

    </div>
    <div class="banking-info d-flex flex-row">
      <h4 class="banking-header">A/C</h4>
      <p class="banking-values">0010147200</p>

    </div>
    <div class="banking-info d-flex flex-row">
      <h4 class="banking-header">Branch </h4>
      <p class="banking-values">Upperhill Branch</p>

    </div>
    <div class="banking-info d-flex flex-row">
      <h4 class="banking-header">Branch Code</h4>
      <p class="banking-values">001</p>

    </div>
    <div class="banking-info d-flex flex-row">
      <h4 class="banking-header">Bank Code</h4>
      <p class="banking-values">075</p>

    </div>
    <div class="banking-info d-flex flex-row">
      <h4 class="banking-header">Swift Code</h4>
      <p class="banking-values">DUIBKENAXXX</p>

    </div>

  </div>

  <div class="address d-flex justify-content-center flex-column align-center">
    <p class="address-info">Nairobi CBD, Utalii Street Road , Utalii House ,Nairobi Kenya</p>
    <div class="address-info">
      Cell:+254 720 699 969| +254 721 338 098 Email: info@emitekcleaning.co.ke
    </div>
  </div>

</div>
 
 
 ';
$connect->close();

echo $table;