var manageUserTable;

$(document).ready(function() {
	// top nav bar 
	$('#topNavClient').addClass('active');
	// manage product data table
	manageUserTable = $('#manageUserTable').DataTable({
		'ajax': 'php_action/fetchClient.php',
		'order': []
	});

	// add product modal btn clicked
	$("#addUserModalBtn").unbind('click').bind('click', function() {
		// // product form reset
		$("#submitUserForm")[0].reset();		

		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');

		$("#productImage").fileinput({
	      overwriteInitial: true,
		    maxFileSize: 2500,
		    showClose: false,
		    showCaption: false,
		    browseLabel: '',
		    removeLabel: '',
		    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
		    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
		    removeTitle: 'Cancel or reset changes',
		    elErrorContainer: '#kv-avatar-errors-1',
		    msgErrorClass: 'alert alert-block alert-danger',
		    defaultPreviewContent: '<img src="assests/images/photo_default.png" alt="Profile Image" style="width:100%;">',
		    layoutTemplates: {main2: '{preview} {remove} {browse}'},								    
	  		allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
			});   

		// submit product form
		$("#submitUserForm").unbind('submit').bind('submit', function() {
				// form validation
					var username = $("#add_userName").val();
					var email = $("#add_uemail").val();
                    var tel1 = $("#add_tel1").val();
					var tel2 = $("#add_tel2").val();
					var website = $("#add_website").val();
				    var address = $("#add_address").val();
					var location = $("#add_location").val();
					var pin = $("#add_pin").val();
                    var floor = $("#add_floor").val();
					var county = $("#add_county").val();
					var city = $("#add_city").val();
					var street = $("#add_city").val();
					var contact = $("#add_contact").val();
					var designation = $("#add_designation").val();
					var company = $("#add_company").val();
					var personal = $("#add_personal_id").val();
					var code = $("#add_code").val();
					var phone = $("#add_phone").val();
								

					if(username == "") {
						$("#edituserName").after('<p class="text-danger">User Name field is required</p>');
						$('#edituserName').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#edituserName").find('.text-danger').remove();
						// success out for form 
						$("#edituserName").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(pin == "") {
						$("#add_pin").after('<p class="text-danger">Password field is required</p>');
						$('#add_pin').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#add_pin").find('.text-danger').remove();
						// success out for form 
						$("#add_pin").closest('.form-group').addClass('has-success');	  	
					}	// /else	
                  
                    if(tel1 == "") {
						$("#add_tel1").after('<p class="text-danger">User Name field is required</p>');
						$('#add_tel1').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#add_tel1").find('.text-danger').remove();
						// success out for form 
						$("#add_tel1").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(county == "") {
						$("#add_county").after('<p class="text-danger">Password field is required</p>');
						$('#add_county').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#add_county").find('.text-danger').remove();
						// success out for form 
						$("#add_county").closest('.form-group').addClass('has-success');	  	
					}	// /else

					
 
                    if(street == "") {
						$("#add_street").after('<p class="text-danger">User Name field is required</p>');
						$('#add_street').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#add_street").find('.text-danger').remove();
						// success out for form 
						$("#add_street").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(location == "") {
						$("#add_location").after('<p class="text-danger">Password field is required</p>');
						$('#add_location').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#add_location").find('.text-danger').remove();
						// success out for form 
						$("#add_location").closest('.form-group').addClass('has-success');	  	
					}	// /else

					

					

					

									

					if(location && username && street && tel1 && pin && county) {
				// submit loading button
				$("#createUserBtn").button('loading');

				var form = $(this);
				var formData = new FormData(this);

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: formData,
					dataType: 'json',
					cache: false,
					contentType: false,
					processData: false,
					success:function(response) {

						if(response.success == true) {
							// submit loading button
							$("#createUserBtn").button('reset');
							
							$("#submitUserForm")[0].reset();

							$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																	
							// shows a successful message after operation
							$('#add-user-messages').html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

							// remove the mesages
		          $(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert

		          // reload the manage student table
							manageUserTable.ajax.reload(null, true);

							// remove text-error 
							$(".text-danger").remove();
							// remove from-group error
							$(".form-group").removeClass('has-error').removeClass('has-success');

						} // /if response.success
						
					} // /success function
				}); // /ajax function
			}	 // /if validation is ok 					

			return false;
		}); // /submit product form

	}); // /add product modal btn clicked
	

	// remove product 	

}); // document.ready fucntion

function editUser(userid = null) {

	if(userid) {
		$("#userid").remove();		
		// remove text-error 
		$(".text-danger").remove();
		// remove from-group error
		$(".form-group").removeClass('has-error').removeClass('has-success');
		// modal spinner
		$('.div-loading').removeClass('div-hide');
		// modal div
		$('.div-result').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedClient.php',
			type: 'post',
			data: {"userid": userid},
			dataType: 'json',
			success:function(response) {		
			// alert(response.product_image);
				// modal spinner
				$('.div-loading').addClass('div-hide');
				// modal div
				$('.div-result').removeClass('div-hide');				

			

				// product id 
				$(".editUserFooter").append('<input type="hidden" name="userid" id="userid" value="'+response.client_id+'" />');				
				$(".editUserPhotoFooter").append('<input type="hidden" name="userid" id="userid" value="'+response.client_id+'" />');				
				
				// product name
				
                $("#userName").val(response.client_name);
	            $("#uemail").val(response.client_email);
                $("#tel1").val(response.client_tel1);
	            $("#tel2").val(response.client_tel2);
			    $("#website").val(response.client_website);
				$("#address").val(response.client_address);
				$("#location").val(response.client_location); 
                $("#pin").val(response.client_pin);
                $("#floor").val(response.client_floor);
		        $("#county").val(response.client_county);
                $("#city").val(response.client_city);
		        $("#street").val(response.client_street);
		        $("#code").val(response.secondary_id);
                $("#contact").val(response.contact_person);
				$("#designation").val(response.contact_designation);
				$("#company").val(response.contact_ID);
				$("#personal_id").val(response.contact_ID);
				$("#phone").val(response.contact_number);
				
				
				// update the product data function
				$("#editUserForm").unbind('submit').bind('submit', function() {

					// form validation
					var username = $("#userName").val();
					var email = $("#uemail").val();
                    var tel1 = $("#tel1").val();
					var tel2 = $("#tel2").val();
					var website = $("#website").val();
				    var address = $("#address").val();
					var location = $("#location").val();
					var pin = $("#pin").val();
                    var floor = $("#floor").val();
					var county = $("#county").val();
					var city = $("#city").val();
					var street = $("#street").val();
								

					if(username == "") {
						$("#edituserName").after('<p class="text-danger">User Name field is required</p>');
						$('#edituserName').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#edituserName").find('.text-danger').remove();
						// success out for form 
						$("#edituserName").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(pin == "") {
						$("#pin").after('<p class="text-danger">Password field is required</p>');
						$('#pin').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#pin").find('.text-danger').remove();
						// success out for form 
						$("#pin").closest('.form-group').addClass('has-success');	  	
					}	// /else	
                  
                    if(tel1 == "") {
						$("#tel1").after('<p class="text-danger">User Name field is required</p>');
						$('#tel1').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#tel1").find('.text-danger').remove();
						// success out for form 
						$("#tel1").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(county == "") {
						$("#county").after('<p class="text-danger">Password field is required</p>');
						$('#county').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#county").find('.text-danger').remove();
						// success out for form 
						$("#county").closest('.form-group').addClass('has-success');	  	
					}	// /else

					
 
                    if(street == "") {
						$("#street").after('<p class="text-danger">User Name field is required</p>');
						$('#street').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#street").find('.text-danger').remove();
						// success out for form 
						$("#street").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(location == "") {
						$("#location").after('<p class="text-danger">Password field is required</p>');
						$('#location').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#location").find('.text-danger').remove();
						// success out for form 
						$("#location").closest('.form-group').addClass('has-success');	  	
					}	// /else

					

					

					

									

					if(location && username && street && tel1 && pin && county) {
						// submit loading button
						$("#editUserBtn").button('loading');

						var form = $(this);
						var formData = new FormData(this);

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: formData,
							dataType: 'json',
							cache: false,
							contentType: false,
							processData: false,
							success:function(response) {
								console.log(response);
								if(response.success == true) {
									// submit loading button
									$("#editUserBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
									$('#edit-user-messages').html('<div class="alert alert-success">'+
				            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');

									// remove the mesages
				          $(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

				          // reload the manage student table
									manageUserTable.ajax.reload(null, true);

									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');

								} // /if response.success
								
							} // /success function
						}); // /ajax function
					}	 // /if validation is ok 					

					return false;
				}); // update the product data function

				// update the product image				
				$("#updateProductImageForm").unbind('submit').bind('submit', function() {					
					// form validation
					var productImage = $("#editProductImage").val();					
					
					if(productImage == "") {
						$("#editProductImage").closest('.center-block').after('<p class="text-danger">Product Image field is required</p>');
						$('#editProductImage').closest('.form-group').addClass('has-error');
					}	else {
						// remov error text field
						$("#editProductImage").find('.text-danger').remove();
						// success out for form 
						$("#editProductImage").closest('.form-group').addClass('has-success');	  	
					}	// /else

					if(productImage) {
						// submit loading button
						$("#editProductImageBtn").button('loading');

						var form = $(this);
						var formData = new FormData(this);

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: formData,
							dataType: 'json',
							cache: false,
							contentType: false,
							processData: false,
							success:function(response) {
								
								if(response.success == true) {
									// submit loading button
									$("#editProductImageBtn").button('reset');																		

									$("html, body, div.modal, div.modal-content, div.modal-body").animate({scrollTop: '0'}, 100);
																			
									// shows a successful message after operation
									$('#edit-productPhoto-messages').html('<div class="alert alert-success">'+
				            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
				            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');

									// remove the mesages
				          $(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert

				          // reload the manage student table
									manageUserTable.ajax.reload(null, true);

									$(".fileinput-remove-button").click();

									$.ajax({
										url: 'php_action/fetchProductImageUrl.php?i='+userid,
										type: 'post',
										success:function(response) {
										$("#getProductImage").attr('src', response);		
										}
									});																		

									// remove text-error 
									$(".text-danger").remove();
									// remove from-group error
									$(".form-group").removeClass('has-error').removeClass('has-success');

								} // /if response.success
								
							} // /success function
						}); // /ajax function
					}	 // /if validation is ok 					

					return false;
				}); // /update the product image

			} // /success function
		}); // /ajax to fetch product image

				
	} else {
		alert('error please refresh the page');
	}
} // /edit product function

// remove product 
function removeUser(userid = null) {
	if(userid) {
		// remove product button clicked
		$("#removeProductBtn").unbind('click').bind('click', function() {
			// loading remove button
			$("#removeProductBtn").button('loading');
			$.ajax({
				url: 'php_action/removeClient.php',
				type: 'post',
				data: {userid: userid},
				dataType: 'json',
				success:function(response) {
					// loading remove button
					$("#removeProductBtn").button('reset');
					if(response.success == true) {
						// remove product modal
						$("#removeUserModal").modal('hide');

						// update the product table
						manageUserTable.ajax.reload(null, false);

						// remove success messages
						$(".remove-messages").html('<div class="alert alert-success">'+
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

						// remove success messages
						$(".removeUserMessages").html('<div class="alert alert-success">'+
		            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
		            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

						// remove the mesages
	          $(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert

					} // /error
				} // /success function
			}); // /ajax fucntion to remove the product
			return false;
		}); // /remove product btn clicked
	} // /if userid
} // /remove product function

function clearForm(oForm) {
	// var frm_elements = oForm.elements;									
	// console.log(frm_elements);
	// 	for(i=0;i<frm_elements.length;i++) {
	// 		field_type = frm_elements[i].type.toLowerCase();									
	// 		switch (field_type) {
	// 	    case "text":
	// 	    case "password":
	// 	    case "textarea":
	// 	    case "hidden":
	// 	    case "select-one":	    
	// 	      frm_elements[i].value = "";
	// 	      break;
	// 	    case "radio":
	// 	    case "checkbox":	    
	// 	      if (frm_elements[i].checked)
	// 	      {
	// 	          frm_elements[i].checked = false;
	// 	      }
	// 	      break;
	// 	    case "file": 
	// 	    	if(frm_elements[i].options) {
	// 	    		frm_elements[i].options= false;
	// 	    	}
	// 	    default:
	// 	        break;
	//     } // /switch
	// 	} // for
}