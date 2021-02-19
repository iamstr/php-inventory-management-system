<?php require_once 'php_action/core.php'; ?>


 <?php




if(isset($_COOKIE["lpo"]) || isset($_GET['lpo'])){
  
  


          if(isset($_COOKIE["lpo"])){
          $clientShip=$_COOKIE["lpo"]["clientShip"];
          $clientAddress=$_COOKIE["lpo"]["clientAddress"];
          $clientBlock=$_COOKIE["lpo"]["clientBlock"];
          $clientContact1=$_COOKIE["lpo"]["clientContact1"];
          
          
          $item=$_COOKIE["lpo"]["item"];
          $desc=$_COOKIE["lpo"]["desc"];
          $quantity=$_COOKIE["lpo"]["quantity"];
          $rate=$_COOKIE["lpo"]["rate"];
          $total=$_COOKIE["lpo"]["totalValue"];
          $last_id=$_COOKIE["lpo_last_id"];
  
          }else{


            if(isset($_GET['lpo'])){
              
              $lpo_item=$_GET['lpo'];
              $last_id=$lpo_item;

              $item=array();
              $desc=array();
              $quantity=array();
              $rate=array();
              $total=array();
              
               $sql="select * from lpo  where lpo_item_id='$last_id'";
               $result = $connect->query($sql);
               while ($row = $result->fetch_array()){
                 
                 array_push($item,$row['item']);
                 array_push($desc,$row['Description']);
                 array_push($quantity,$row['quantity']);
                 array_push($rate,$row['Unit Price']);
                 array_push($total,$row['total']);
               }

              
              
            }else{
              
              header("location:lpo.php");
              exit;
            }
            
            
            
          }
  
  
        $sql="select * from lpo_item inner join clients on clients.client_id=lpo_item.client_id where lpo_item_id='$last_id'";
        $result = $connect->query($sql);
        $row = $result->fetch_array();
         if(isset($_GET['lpo'])){
           
           $clientShip=$row["lpo_item_shipped"];
          $clientAddress=$row["lpo_item_address"];
          $clientBlock=$row["lpo_item_block"];
          $clientContact1=$row["lpo_item_contact"];
         }
    
    
  
          
			

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="assests/jquery/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>
</head>
<body>
  

 <style>
   
   

*{
  padding:0px;
  margin:0px;
  box-sizing:border-box;
}

.lpo{
  display:flex;
/*  margin:0 10em;*/
/*  flex-direction:column;*/
  flex-direction: column;
    /* justify-content: center; */
/*    align-items: center;*/
/*    width: fit-content;*/
  overflow-x: hidden;
  width: 100%;
}

.lpo-purchase,.lpo-address,.lpo-address,.lpo-initiated,.lpo-approved,#customers,.lpo-header{
  
  border:1px solid black;
  margin:2em;
  width:fit-content;
}
.lpo-header{
  border:none;
}

.lpo-order{
  
      border-collapse: collapse;
}

.lpo-header{
  
  width: 100%;
}



#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

.lpo-header,.lpo-approval{
  display:flex;
  flex-direction:row;
  justify-content:space-between;
}

.lpo-image{
  order:1;
}
.lpo-purchase{
  order:2;
}
.lpo-address{
  
  width: 300px;
}

.lpo-initiated-by{
  border-bottom:1px solid black;
  
}
.lpo-purchase{
  font-size:1.5em;
}

.lpo-initiated-date,.lpo-initiated-by,.lpo-purchase.lpo-purchase,.lpo-address,.lpo-address,.lpo-initiated,.lpo-approved{
 
  padding: .5em .5em;
  padding-right:5em;
}

.lpo-purchase{
  text-decoration: double underline;
}
.lpo-address p span {
  font-weight:bold;
}
 </style>
 
 <div class="lpo" id="#lpo">
  <div class="lpo-header">
    <img src="./emitek_logo%20(1).png" alt=""  class="lpo-image" width="200" height="100"/>

    <div class="lpo-purchase">
      <h4 class="lpo-purchase-order">Purchase Order</h4>
      <div class="lpo-id"><?php echo $last_id;?></div>
    </div>
  </div>

  <div class="lpo-body">
    <div class="lpo-address">
      <p>Emitek Cleaning Limited</p>
      <p>P.O BOX:<span class="text">  20123-00100</span> </p>
      <p>Tel: <span class="text">     0722453040</span></p>
      <p>Email:<span class="text">    smshabaan@gmail.com</span> </p>
      <p>Website: <span class="text"> emitekcleaning.co.ke</span></p>
    </div>

    <div class="lpo-address">
      <p>Vendor:   <span class="text"><?php echo $row['client_name'];?></span></p>
      <p>Tel 1:<span class="text"><?php echo $row['client_tel1'];?></span></p>
      <p>Tel 2:<span class="text"> <?php echo $row['client_tel2'];?></span></p>
      <p>Email:<span class="text"><?php echo $row['client_email'];?></span></p>
      <p>Website:<span class="text"><?php echo $row['client_website'];?></span></p>
    </div>

    <div class="lpo-address">
      <p>Ship to: <span class="text">  <?php echo $clientShip;?></span></p>
      <p>Address: <span class="text">  <?php echo $clientAddress;?></span></p>
      <p>Block: <span class="text">    <?php echo $clientBlock;?></span></p>
      <p>Contact Person: <span class="text">  <?php echo $clientContact1;?></span></p>
    </div>

    <table class="lpo-order" id="customers">
      <tr>
        <th>No.</th>
        <th>Item</th>
        <th>Description</th>
        <th>Qty</th>
        <th>Unit Price</th>
        <th>Total</th>
      </tr>
      
      <?php
      
      
      
      for($x = 0; $x < count($item); $x++) {			
		
		
		
//			 $_COOKIE["lpo"]['item'][$x];							
				// update product table
				
				
	

      
      ?>
      <tr>
        <td> <?php echo $x+1;?></td>
        <td><?php echo $item[$x];?></td>
        <td><?php echo $desc[$x];?></td>
        <td><?php echo $quantity[$x];?></td>
        <td><?php echo $rate[$x];?></td>
        <td><?php echo $total[$x];?></td>
      </tr>
      <?php }?>
    </table>

    <div class="lpo-approval">
      <div class="lpo-initiated">
        <div class="lpo-initiated-by">Initiated By</div>
        <div class="lpo-initiated-date"> <?php
   
   echo date("d");
   
   ?> <sup> <?php 
                   
          
          switch(date("d")){
            
            case 1:
              echo "st";
               case 2:
              echo "nd";
              
            case 3:
               
              echo "rd";
            default:
              
               
              echo "th";
          }
                    
   ?></sup> <?php
   
   echo date("M Y");
   
   ?></div>
      </div>

      <div class="lpo-approved">
        <div class="lpo-initiated-by">Approved By</div>
        <div class="lpo-initiated-date">  <?php
   
   echo date("d");
   
   ?> <sup> <?php 
                   
          
          switch(date("d")){
            
            case 1:
              echo "st";
               case 2:
              echo "nd";
              
            case 3:
               
              echo "rd";
            default:
              
               
              echo "th";
          }
                    
   ?></sup> <?php
   
   echo date("M Y");
   
   ?></div>
      </div>
    </div>
  </div>
</div>

 <pre>
   <?php
   
//   echo print_r($_COOKIE["lpo"]);
   
   ?>
 </pre>


 <script src="custom/js/html2canvas.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
 
 <script >
    $(document).ready(function() {
      console.log($("#lpo"))
      const lpo=$("#lpo");
      
//      html2canvas(lpo,{
//    onrendered: function (canvas) {
//       document.body.appendChild(canvas)
//    
//    const link=document.createElement("a"),image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
//    
//    document.body.appendChild(a)
//    a.hidden=true
//    a.href=image;
//    a.click()
//    }
//        
//        
//      })
       var pdf = new jsPDF('p', 'pt', 'a4');
                 pdf.setFontSize(26);
                 pdf.addHTML(document.body,10,15,function() {
                 pdf.save('<?php date_default_timezone_set("Africa/Nairobi"); echo $last_id."  ".date(" D d M Y h::m::s");?>.pdf');
        })
//      html2canvas(document.body).then(function(canvas) {
//    document.body.appendChild(canvas);
        
       
//        const a=document.createElement("a"),image = canvas.toDataURL("image/jpeg")
//        .replace("image/jpeg", "image/octet-stream");
//    var imgWidth = (canvas.width*200 ) / 240;
//					var imgHeight = (canvas.height *200) / 240; 
//        var width = doc.internal.pageSize.getWidth();
//var height = doc.internal.pageSize.getHeight();
//     const pdf = new jsPDF();
//
//  pdf.addImage(image, 'JPEG', 10, 10, imgWidth, imgHeight);
       
});
//  pdf.addImage(canvas, 'JPEG', 0, 0);
//  pdf.save(new Date()+".pdf");
//        a.setAttribute('href', image);
//a.setAttribute('download', "pdf.jpeg");
//    a.hidden=true
//        canvas.hidden=true
//   pdf.html(canvas, {
//   callback: function (doc) {
//     doc.save();
//   },
//   x: 10,
//   y: 10
//});
    
//        document.body.appendChild(a)
//        a.click()
//});
//    })
  
</script>

</body>
</html>
<?php 

}else{

?>


<?php
include("includes/header.php")



?>



















<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">LPO</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> View Older LPO</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<a class="btn btn-default button1"   href="purchase.php"> <i class="glyphicon glyphicon-plus-sign"></i> Add new LPO </a>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageProductTable">
					<thead>
						<tr>							
							<th>LPO ID</th>
							<th>Item Count</th>	
							<th>Supplier Name</th>	
							<th>Total Amount</th>
							<th>Date Generated</th>
							<th>Action</th>
							
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeOrderModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Order</h4>
      </div>
      <div class="modal-body">

      	<div class="removeOrderMessages"></div>

        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeOrderBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php
include("includes/footer.php")



?>

<script src="custom/js/lpo.js"></script>

<?php 

}

?>
