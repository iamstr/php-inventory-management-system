var manageOrderTable;
var vat,vatYes;

$(document).ready(function() {
  
  
  
  manageOrderTable = $('#manageProductTable').DataTable({
		'ajax': 'php_action/fetchPurchase.php',
		'order': []
	});
   vatYes=$('.d-flex input[type=radio]').val(); 
  console.log(vatYes)
  
  $("#navPurchase").addClass('active');
  
  $('.d-flex input[type=radio]').on('change', function(e) {
    vatYes=e.target.value
  subAmount()
});
  
  
	$("#paymentPlace").change(function(){
		if($("#paymentPlace").val() == 2)
		{
			$(".gst").text("ONRB 16%");
		}
		else
		{
			$(".gst").text("NRB 16%");	
		}
});

	var divRequest = $(".div-request").text();

	

	if(divRequest == 'add')  {
		// add order	
		// top nav child bar 
		

		// order date picker
		$("#orderDate").datepicker();

		// create order form function
		$("#createOrderForm").unbind('submit').bind('submit', function(e) {
			var form = $(this);
e.preventDefault()
          console.log(e)
			$('.form-group').removeClass('has-error').removeClass('has-success');
			$('.text-danger').remove();
				
          
          var clientPOBOX=$("#clientPOBOX")
          var clientEmail=$("#clientEmail")
          var clientWebsite=$("#clientWebsite")
          var clientShip=$("#clientShip")
          var clientAddress=$("#clientAddress")
          var clientBlock=$("#clientBlock")
          var clientContact1=$("#clientContact1")
          
          
          var item=$("#item")
          var desc=$("#desc")
          var quantity=$("#quantity")
          var rate=$("#rate")
          var total=$("#total")
          
			var orderDate = $("#orderDate").val();
			var clientName = $("#clientName").val();
			var clientContact = $("#clientContact").val();
			var paid = $("#paid").val();
			var discount = $("#discount").val();
			var paymentType = $("#paymentType").val();
			var paymentStatus = $("#paymentStatus").val();		

			// form validation 
			if(orderDate == "") {
				$("#orderDate").after('<p class="text-danger"> The Order Date field is required </p>');
				$('#orderDate').closest('.form-group').addClass('has-error');
			} else {
				$('#orderDate').closest('.form-group').addClass('has-success');
			} // /else

			if(clientName == "") {
				$("#clientName").after('<p class="text-danger"> The Client Name field is required </p>');
				$('#clientName').closest('.form-group').addClass('has-error');
			} else {
				$('#clientName').closest('.form-group').addClass('has-success');
			} // /else

			if(clientContact == "") {
				$("#clientContact").after('<p class="text-danger"> The Contact field is required </p>');
				$('#clientContact').closest('.form-group').addClass('has-error');
			} else {
				$('#clientContact').closest('.form-group').addClass('has-success');
			} // /else

			if(paid == "") {
				$("#paid").after('<p class="text-danger"> The Paid field is required </p>');
				$('#paid').closest('.form-group').addClass('has-error');
			} else {
				$('#paid').closest('.form-group').addClass('has-success');
			} // /else

			if(discount == "") {
				$("#discount").after('<p class="text-danger"> The Discount field is required </p>');
				$('#discount').closest('.form-group').addClass('has-error');
			} else {
				$('#discount').closest('.form-group').addClass('has-success');
			} // /else

			if(paymentType == "") {
				$("#paymentType").after('<p class="text-danger"> The Payment Type field is required </p>');
				$('#paymentType').closest('.form-group').addClass('has-error');
			} else {
				$('#paymentType').closest('.form-group').addClass('has-success');
			} // /else

			if(paymentStatus == "") {
				$("#paymentStatus").after('<p class="text-danger"> The Payment Status field is required </p>');
				$('#paymentStatus').closest('.form-group').addClass('has-error');
			} else {
				$('#paymentStatus').closest('.form-group').addClass('has-success');
			} // /else
          
          
          
          
         
          
            if(clientPOBOX == "") {
				$("#clientPOBOX").after('<p class="text-danger"> The  field is required </p>');
				$('#clientPOBOX').closest('.form-group').addClass('has-error');
			} else {
				$('#clientPOBOX').closest('.form-group').addClass('has-success');
			} // /else
          
            if(clientEmail == "") {
				$("#clientEmail").after('<p class="text-danger"> The email field is required </p>');
				$('#clientEmail').closest('.form-group').addClass('has-error');
			} else {
				$('#clientEmail').closest('.form-group').addClass('has-success');
			} // /else
           if(clientWebsite == "") {
				$("#clientWebsite").after('<p class="text-danger"> The email field is required </p>');
				$('#clientWebsite').closest('.form-group').addClass('has-error');
			} else {
				$('#clientWebsite').closest('.form-group').addClass('has-success');
			} // else
           if(clientShip == "") {
				$("#clientShip").after('<p class="text-danger"> The email field is required </p>');
				$('#clientShip').closest('.form-group').addClass('has-error');
			} else {
				$('#clientShip').closest('.form-group').addClass('has-success');
			} // /else
          
           if(clientAddress == "") {
				$("#clientAddress").after('<p class="text-danger"> The email field is required </p>');
				$('#clientAddress').closest('.form-group').addClass('has-error');
			} else {
				$('#clientAddress').closest('.form-group').addClass('has-success');
			} // /else
          
          if(clientBlock == "") {
				$("#clientBlock").after('<p class="text-danger"> The email field is required </p>');
				$('#clientBlock').closest('.form-group').addClass('has-error');
			} else {
				$('#clientBlock').closest('.form-group').addClass('has-success');
			} // /else
          
          if(clientContact1 == "") {
				$("#clientContact1").after('<p class="text-danger"> The email field is required </p>');
				$('#clientContact1').closest('.form-group').addClass('has-error');
			} else {
				$('#clientContact1').closest('.form-group').addClass('has-success');
			} // /else
          
          
          if(item == "") {
				$("#item").after('<p class="text-danger"> The email field is required </p>');
				$('#item').closest('.form-group').addClass('has-error');
			} else {
				$('#item').closest('.form-group').addClass('has-success');
			} // /else
          
          if(desc == "") {
				$("#desc").after('<p class="text-danger"> The email field is required </p>');
				$('#desc').closest('.form-group').addClass('has-error');
			} else {
				$('#desc').closest('.form-group').addClass('has-success');
			} // /else
          
          if(quantity == "") {
				$("#quantity").after('<p class="text-danger"> The email field is required </p>');
				$('#quantity').closest('.form-group').addClass('has-error');
			} else {
				$('#desc').closest('.form-group').addClass('has-success');
			} // /else
          
          if(rate == "") {
				$("#rate").after('<p class="text-danger"> The email field is required </p>');
				$('#rate').closest('.form-group').addClass('has-error');
			} else {
				$('#desc').closest('.form-group').addClass('has-success');
			} // /else
          
           if(total == "") {
				$("#total").after('<p class="text-danger"> The email field is required </p>');
				$('#total').closest('.form-group').addClass('has-error');
			} else {
				$('#total').closest('.form-group').addClass('has-success');
			} // /else





			// array validation
			var productName = document.getElementsByName('productName[]');				
			var validateProduct;
			for (var x = 0; x < productName.length; x++) {       			
				var productNameId = productName[x].id;	    	
		    if(productName[x].value == ''){	    		    	
		    	$("#"+productNameId+"").after('<p class="text-danger"> Product Name Field is required!! </p>');
		    	$("#"+productNameId+"").closest('.form-group').addClass('has-error');	    		    	    	
	      } else {      	
		    	$("#"+productNameId+"").closest('.form-group').addClass('has-success');	    		    		    	
	      }          
	   	} // for

	   	for (var x = 0; x < productName.length; x++) {       						
		    if(productName[x].value){	    		    		    	
		    	validateProduct = true;
	      } else {      	
		    	validateProduct = false;
	      }          
	   	} // for       		   	
	   	
	   	var quantity = document.getElementsByName('quantity[]');		   	
	   	var validateQuantity;
	   	for (var x = 0; x < quantity.length; x++) {       
	 			var quantityId = quantity[x].id;
		    if(quantity[x].value == ''){	    	
		    	$("#"+quantityId+"").after('<p class="text-danger"> Product Name Field is required!! </p>');
		    	$("#"+quantityId+"").closest('.form-group').addClass('has-error');	    		    		    	
	      } else {      	
		    	$("#"+quantityId+"").closest('.form-group').addClass('has-success');	    		    		    		    	
	      } 
	   	}  // for

	   	for (var x = 0; x < quantity.length; x++) {       						
		    if(quantity[x].value){	    		    		    	
		    	validateQuantity = true;
	      } else {      	
		    	validateQuantity = false;
	      }          
	   	} // for       	
	   	
          
          
        

			if(clientPOBOX&&clientEmail&&clientWebsite&&clientShip&&clientAddress&&clientBlock&&clientContact1) {
				
					// create order button
					// $("#createOrderBtn").button('loading');
              
					$.ajax({
						url : form.attr('action'),
						type: form.attr('method'),
						data: form.serialize(),					
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// reset button
							$("#createOrderBtn").button('reset');
							
							$(".text-danger").remove();
							$('.form-group').removeClass('has-error').removeClass('has-success');

							if(response.success == true) {
								
								// create order button
								$(".success-messages").html('<div class="alert alert-success">'+
	            	'<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            	'<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
	            	' <br /> <br /> <a type="button" onclick="printOrder('+response.lpo_item_id+')" class="btn btn-primary"> <i class="glyphicon glyphicon-print"></i> Print </a>'+
	            	'<a href="orders.php?o=add" class="btn btn-default" style="margin-left:10px;"> <i class="glyphicon glyphicon-plus-sign"></i> Add New Order </a>'+
	            	
	   		       '</div>');
								
							$("html, body, div.panel, div.pane-body").animate({scrollTop: '0px'}, 100);

							// disabled te modal footer button
							$(".submitButtonFooter").addClass('div-hide');
							// remove the product row
							$(".removeProductRowBtn").addClass('div-hide');
								
							} else {
								alert(response.messages);								
							}
						} // /response
					}); // /ajax
				
			} // /if field validate is true
			

			return false;
		}); // /create order form function	
	
	} 
}); // /documernt


// print order function
function printOrder(orderId = null) {
	if(orderId) {		
			
		$.ajax({
			url: 'php_action/printOrder.php',
			type: 'post',
			data: {orderId: orderId},
			dataType: 'text',
			success:function(response) {
				
				var mywindow = window.open('', 'Stock Management System', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Order Invoice</title>');        
        mywindow.document.write('</head><body>');
        mywindow.document.write(response);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10
        mywindow.resizeTo(screen.width, screen.height);
setTimeout(function() {
    mywindow.print();
    mywindow.close();
}, 1250);

        //mywindow.print();
        //mywindow.close();
				
			}// /success function
		}); // /ajax function to fetch the printable order
	} // /if orderId
} // /print order function

function addRow() {
	$("#addRowBtn").button("loading");

	var tableLength = $("#productTable tbody tr").length;

	var tableRow;
	var arrayNumber;
	var count;

	if(tableLength > 0) {		
		tableRow = $("#productTable tbody tr:last").attr('id');
		arrayNumber = $("#productTable tbody tr:last").attr('class');
		count = tableRow.substring(3);	
		count = Number(count) + 1;
		arrayNumber = Number(arrayNumber) + 1;					
	} else {
		// no table row
		count = 1;
		arrayNumber = 0;
	}

	$("#addRowBtn").button("reset");			

			var tr = '<tr id="row'+count+'" class="'+arrayNumber+'">'+			  				
				
				'<td style="padding-left:0px;"">'+
                
					'<input type="text" name="item[]" id="item'+count+'" autocomplete="off"  class="form-control"  placeholder="Item name" />'+
					'<input type="hidden" name="itemValue[]" id="itemValue'+count+'" autocomplete="off" class="form-control" />'+
				'</td >'+
				'<td style="padding-left:20px;">'+
					
					'<input type="text" name="desc[]" id="desc'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control" placeholder="Item Description"  />'+
					
				'<td style="padding-left:20px; padding-right:20px;">'+
					
					'<input type="number" name="quantity[]" id="quantity'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control" min="1" />'+
					
				'</td>'+
				'<td style="padding-left:20px; ">'+
					
					'<input type="number" name="rate[]" id="rate'+count+'" onchange="getTotal('+count+')" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control" min="1" />'+
					
				'</td>'+
				'<td style="padding-left:20px;">'+
					'<input type="text" name="total[]" id="total'+count+'" autocomplete="off" class="form-control" disabled="true" />'+
					'<input type="hidden" name="totalValue[]" id="totalValue'+count+'" autocomplete="off" class="form-control" />'+
				'</td>'+
				'<td>'+
					'<button class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow('+count+')"><i class="glyphicon glyphicon-trash"></i></button>'+
				'</td>'+
			'</tr>';
  var vr2=$("#productTable tbody tr:last").html()
  
  
			if(tableLength > 0) {							
				$("#productTable tbody tr:last").after(tr);
			} else {				
				$("#productTable tbody").append(tr);
			}	

} // /add row

function removeProductRow(row = null) {
	if(row) {
		$("#row"+row).remove();


		subAmount();
	} else {
		alert('error! Refresh the page again');
	}
}

// select on product data
function getProductData(row = null) {

	if(row) {
		var productId = $("#productName"+row).val();		
		
		if(productId == "") {
			$("#rate"+row).val("");

			$("#quantity"+row).val("");						
			$("#total"+row).val("");

			// remove check if product name is selected
			// var tableProductLength = $("#productTable tbody tr").length;			
			// for(x = 0; x < tableProductLength; x++) {
			// 	var tr = $("#productTable tbody tr")[x];
			// 	var count = $(tr).attr('id');
			// 	count = count.substring(3);

			// 	var productValue = $("#productName"+row).val()

			// 	if($("#productName"+count).val() == "") {					
			// 		$("#productName"+count).find("#changeProduct"+productId).removeClass('div-hide');	
			// 		console.log("#changeProduct"+count);
			// 	}											
			// } // /for

		} else {
			$.ajax({
				url: 'php_action/fetchSelectedProduct.php',
				type: 'post',
				data: {productId : productId},
				dataType: 'json',
				success:function(response) {
					// setting the rate value into the rate input field
					
					$("#rate"+row).val(response.rate);
					$("#rateValue"+row).val(response.rate);

					$("#quantity"+row).val(1);
					$("#available_quantity"+row).text(response.quantity);

					var total = Number(response.rate) * 1;
					total = total.toFixed(2);
					$("#total"+row).val(total);
					$("#totalValue"+row).val(total);
					
					// check if product name is selected
					// var tableProductLength = $("#productTable tbody tr").length;					
					// for(x = 0; x < tableProductLength; x++) {
					// 	var tr = $("#productTable tbody tr")[x];
					// 	var count = $(tr).attr('id');
					// 	count = count.substring(3);

					// 	var productValue = $("#productName"+row).val()

					// 	if($("#productName"+count).val() != productValue) {
					// 		// $("#productName"+count+" #changeProduct"+count).addClass('div-hide');	
					// 		$("#productName"+count).find("#changeProduct"+productId).addClass('div-hide');								
					// 		console.log("#changeProduct"+count);
					// 	}											
					// } // /for
			
					subAmount();
				} // /success
			}); // /ajax function to fetch the product data	
		}
				
	} else {
		alert('no row! please refresh the page');
	}
} // /select on product data

// table total
function getTotal(row = null) {
  
	if(row) {
		var total = Number($("#rate"+row).val()) * Number($("#quantity"+row).val());
		total = total.toFixed(2);
		$("#total"+row).val(total);
      
		$("#totalValue"+row).val(total);
		
		subAmount();

	} else {
		alert('no row !! please refresh the page');
	}
}

function subAmount() {
	var tableProductLength = $("#productTable tbody tr").length;
  if( $("#grandTotal")!==true){
     $("#productTable tbody tr:first")
    const input=createElement("input")
    input.setAttribute("id","grandTotal")
    const td=createElement("td")
    
    input.setAttribute("id","grandTotal")
    input.setAttribute("hidden","true")
    td.append(input)
    $("#row").append(td)
  }
	var totalSubAmount = 0;
	for(x = 0; x < tableProductLength; x++) {
		var tr = $("#productTable tbody tr")[x];
		var count = $(tr).attr('id');
		count = count.substring(3);

		totalSubAmount = Number(totalSubAmount) + Number($("#total"+count).val());
	} // /for

	totalSubAmount = totalSubAmount.toFixed(2);

	

	// total amount	
		var grandTotal = totalSubAmount;
		grandTotal = grandTotal.toFixed(2);
		$("#grandTotal").val(grandTotal);
		
	 	

	
} // /sub total amount



function resetOrderForm() {
	// reset the input field
	$("#createOrderForm")[0].reset();
	// remove remove text danger
	$(".text-danger").remove();
	// remove form group error 
	$(".form-group").removeClass('has-success').removeClass('has-error');
} // /reset order form


// remove order from server
function removeOrder(orderId = null) {
  console.log(orderId)
	if(orderId) {
		$("#removeOrderBtn").unbind('click').bind('click', function() {
			$("#removeOrderBtn").button('loading');

			$.ajax({
				url: 'php_action/removeLpo.php',
				type: 'post',
				data: {orderId : orderId},
				dataType: 'json',
				success:function(response) {
					$("#removeOrderBtn").button('reset');

					if(response.success == true) {

						manageOrderTable.ajax.reload(null, false);
						// hide modal
						$("#removeOrderModal").modal('hide');
						// success messages
						$("#success-messages").html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
	          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert	          

					} else {
						// error messages
						$(".removeOrderMessages").html('<div class="alert alert-warning">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
	          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert	          
					} // /else

				} // /success
			});  // /ajax function to remove the order

		}); // /remove order button clicked
		

	} else {
		alert('error! refresh the page again');
	}
}
// /remove order from server

// Payment ORDER
function paymentOrder(orderId = null) {
	if(orderId) {

		$("#orderDate").datepicker();

		$.ajax({
			url: 'php_action/fetchOrderData.php',
			type: 'post',
			data: {orderId: orderId},
			dataType: 'json',
			success:function(response) {				

				// due 
				$("#due").val(response.order[10]);				

				// pay amount 
				$("#payAmount").val(response.order[10]);

				var paidAmount = response.order[9] 
				var dueAmount = response.order[10];							
				var grandTotal = response.order[8];

				// update payment
				$("#updatePaymentOrderBtn").unbind('click').bind('click', function() {
					var payAmount = $("#payAmount").val();
					var paymentType = $("#paymentType").val();
					var paymentStatus = $("#paymentStatus").val();

					if(payAmount == "") {
						$("#payAmount").after('<p class="text-danger">The Pay Amount field is required</p>');
						$("#payAmount").closest('.form-group').addClass('has-error');
					} else {
						$("#payAmount").closest('.form-group').addClass('has-success');
					}

					if(paymentType == "") {
						$("#paymentType").after('<p class="text-danger">The Pay Amount field is required</p>');
						$("#paymentType").closest('.form-group').addClass('has-error');
					} else {
						$("#paymentType").closest('.form-group').addClass('has-success');
					}

					if(paymentStatus == "") {
						$("#paymentStatus").after('<p class="text-danger">The Pay Amount field is required</p>');
						$("#paymentStatus").closest('.form-group').addClass('has-error');
					} else {
						$("#paymentStatus").closest('.form-group').addClass('has-success');
					}

					if(payAmount && paymentType && paymentStatus) {
						$("#updatePaymentOrderBtn").button('loading');
						$.ajax({
							url: 'php_action/editPayment.php',
							type: 'post',
							data: {
								orderId: orderId,
								payAmount: payAmount,
								paymentType: paymentType,
								paymentStatus: paymentStatus,
								paidAmount: paidAmount,
								grandTotal: grandTotal
							},
							dataType: 'json',
							success:function(response) {
								$("#updatePaymentOrderBtn").button('loading');

								// remove error
								$('.text-danger').remove();
								$('.form-group').removeClass('has-error').removeClass('has-success');

								$("#paymentOrderModal").modal('hide');

								$("#success-messages").html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

								// remove the mesages
			          $(".alert-success").delay(500).show(10, function() {
									$(this).delay(3000).hide(10, function() {
										$(this).remove();
									});
								}); // /.alert	

			          // refresh the manage order table
								manageOrderTable.ajax.reload(null, false);

							} //

						});
					} // /if
						
					return false;
				}); // /update payment			

			} // /success
		}); // fetch order data
	} else {
		alert('Error ! Refresh the page again');
	}
}
