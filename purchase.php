<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>
<?php if(isset($_COOKIE['lpo'])){ setcookie("lpo", "", time() - 3600);} ?>

<script>
 
//
//     function getTotal1(row = null) {
//  
//	if(row) {
//		var total = Number(document.querySelector("#rate"+row).value) * Number($("#quantity"+row).val());
//		total = total.toFixed(2);
//		document.querySelector("#total"+row).value=total;
//      console.log(" this is the predefined value ",document.querySelector("#total"+row).value,total)
//		$("#totalValue"+row).val(total);
//		
//		
//
//	} else {
//		alert('no row !! please refresh the page');
//	}
//}
//


 

 

</script>

<div class="panel panel-default">
	<div class="panel-heading">

		
  		<i class="glyphicon glyphicon-file"></i> <a href="lpo.php" rel="noopener noreferrer" target="_blank">Check previous  LPO</a>	
		
	</div> <!--/panel-->	
	
</div>


<div class="panel panel-default">
	<div class="panel-heading">

		
  		<i class="glyphicon glyphicon-plus-sign"></i>	Generate LPO
		
	</div> <!--/panel-->	
	<div class="panel-body">
			
		<?php if(true) { 
			// add order
			?>			

			<div class="success-messages"></div> <!--/success-messages-->

  		<form class="form-horizontal" method="POST" action="php_action/createPurchase.php" id="createOrderForm">

<!--			 
			  <div class="form-group">
			    <label for="clientName" class="col-sm-2 control-label">Vendor Name</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="clientName" name="clientName" placeholder="Wash limited" autocomplete="off" />
			    </div>
			  </div> /form-group--
			  <div class="form-group">
			    <label for="clientContact" class="col-sm-2 control-label">Vendor Contact</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="clientContact" name="clientContact" placeholder="07xx xxx xxx" autocomplete="off" />
			    </div>
			  </div> <!--/form-group--
			  
			  
			  <div class="form-group">
			    <label for="clientPOBOX" class="col-sm-2 control-label">Vendor P.O BOX</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="clientPOBOX" name="clientPOBOX" autocomplete="off" placeholder="00100-12345"  />
			    </div>
			  </div> <!--/form-group--
			  <div class="form-group">
			    <label for="clientEmail" class="col-sm-2 control-label">Vendor Email</label>
			    <div class="col-sm-10">
			      <input type="email" class="form-control" id="clientEmail" name="clientEmail" placeholder="vendoremail@gmail.com" autocomplete="off" />
			    </div>
			  </div> <!--/form-group--
			  <div class="form-group">
			    <label for="clientWebsite" class="col-sm-2 control-label">Vendor Website</label>
			    <div class="col-sm-10">
			      <input type="url" class="form-control" id="clientWebsite" name="clientWebsite" placeholder="vendorwebsite.com" autocomplete="off" />
			    </div>
			  </div> --/form-group-->			  

			   <div class="form-group">
			    <label for="clientName1" class="col-sm-2 control-label">Vendor Name</label>
			    <div class="col-sm-10">
			       <select class="form-control" name="clientName1" id="clientName1"  >
			  						<option value="0">~~SELECT~~</option>
			  						<?php
			  							$sql = "SELECT * FROM clients where contact_group='suppliers'";
			  							$query = $connect->query($sql);

			  							while($row = $query->fetch_array()) {									 		
			  								echo "<option value='".$row['client_id']."' id='changeClient".$row['client_id']."'>".$row['client_name']."</option>";
										 	} // /while 

			  						?>
		  						</select>  
			    </div>
			  </div> <!--/form-group-->
			  
			<hr>  
			  		  
<!--			  		  		  shipping address		  -->

  <div class="form-group">
			    <label for="clientShip" class="col-sm-2 control-label">Ship To</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="clientShip" name="clientShip" autocomplete="off" placeholder="Office suite number" />
			    </div>
			  </div> <!--/form-group-->
			  <div class="form-group">
			    <label for="clientAddress" class="col-sm-2 control-label">Address</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="clientAddress" name="clientAddress" placeholder="Street " autocomplete="off" />
			    </div>
			  </div> <!--/form-group-->
			  <div class="form-group">
			    <label for="clientBlock" class="col-sm-2 control-label">Block</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="clientBlock" name="clientBlock" placeholder="Office suite number" autocomplete="off" />
			    </div>
			  </div> <!--/form-group-->			  
 <div class="form-group">
			    <label for="clientContact1" class="col-sm-2 control-label">Contact Person</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" id="clientContact1" name="clientContact1" placeholder="Contact Number" autocomplete="off" />
			    </div>
			  </div> <!--/form-group-->			  

<!--        end of shipping address-->
        <hr>

			  <table class="table" id="productTable" style="margin-left: 63px;">
			  	<thead>
			  		<tr>			  			
			  			
			  			<th style="width:20%;">Item Name</th>
			  			<th style="width:30%;">Description</th>
			  			<th style="width:10%;">Qty</th>			  			
			  			<th style="width:10%;">Unit Price</th>			  			
			  			<th style="width:10%;">Total</th>
			  		</tr>
			  	</thead>
			  	<tbody>
			  		<?php
			  		$arrayNumber = 0;
			  		for($x = 1; $x < 2; $x++) { ?>
			  			<tr id="row<?php echo $x; ?>" class="<?php echo $arrayNumber; ?>">			  				
			  				<td style="padding-left: 20px;">
			  					<div class="form-group">
    <input type="text" name="item[]" id="item<?php echo $x; ?>" autocomplete="off"  class="form-control"  placeholder="Item name"/>	
			  					
			  					</div>
			  				</td>
			  				<td style="padding-left:20px;">			  					
			  					<input type="text" name="desc[]" id="desc<?php echo $x; ?>" autocomplete="off"  class="form-control"  placeholder="Item Description" />			  					
			  					<input type="hidden" name="descValue[]" id="descValue<?php echo $x; ?>" autocomplete="off" class="form-control" />			  					
			  				</td>
							<td style="padding-left:20px;padding-right:20px;">
			  					<div class="form-group">
									<input type="number" name="quantity[]" id="quantity<?php echo $x; ?>" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
			  				<td style="padding-left:20px;">
			  					<div class="form-group">
			  					<input type="number" name="rate[]" id="rate<?php echo $x; ?>" onkeyup="getTotal(<?php echo $x ?>)" onchange="getTotal(<?php echo $x ?>)" autocomplete="off" class="form-control" min="1" />
			  					</div>
			  				</td>
			  				<td style="padding-left:20px;">			  					
			  					<input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" disabled="true" />			  					
			  					<input type="hidden" name="totalValue[]" id="totalValue<?php echo $x; ?>" autocomplete="off" class="form-control" />
			  					<input type="hidden" name="grandTotal" id="grandTotal" autocomplete="off" class="form-control" />			  					
			  				</td>
			  				<td>

			  					<button class="btn btn-default removeProductRowBtn" type="button" id="removeProductRowBtn" onclick="removeProductRow(<?php echo $x; ?>)"><i class="glyphicon glyphicon-trash"></i></button>
			  				</td>
			  			</tr>
		  			<?php
		  			$arrayNumber++;
			  		} // /for
			  		?>
			  	</tbody>			  	
			  </table>

		
			  <div class="form-group submitButtonFooter">
			    <div class="col-sm-offset-2 col-sm-10">
			    <button type="button" class="btn btn-default" onclick="addRow()" id="addRowBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-plus-sign"></i> Add Row </button>

			      <button type="submit" id="createOrderBtn" data-loading-text="Loading..." class="btn btn-success"><i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>

			      <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="glyphicon glyphicon-erase"></i> Reset</button>
			    </div>
			  </div>
			</form>
		<?php } 
			// manage order
			?>

			


	</div> <!--/panel-->	
</div> <!--/panel-->	

<script src="custom/js/lpo.js"></script>

<?php require_once 'includes/footer.php'; ?>