<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>

<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb">
		  <li><a href="dashboard.php">Home</a></li>		  
		  <li class="active">Clients</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Clients</div>
			</div> <!-- /panel-heading -->
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-default button1" data-toggle="modal" id="addUserModalBtn" data-target="#addUserModal"> <i class="glyphicon glyphicon-plus-sign"></i> Add Client </button>
				</div> <!-- /div-action -->				
				
				<table class="table" id="manageUserTable">
					<thead>
						<tr>
							<th style="width:10%;">Client ID</th>
							<th style="width:10%;">Client Name</th>
							<th style="width:10%;">Secondary ID</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add user -->
<div class="modal fade" id="addUserModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitUserForm" action="php_action/createClient.php" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-plus"></i> Add Client</h4>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-user-messages"></div>

	      		     	           	       

	        <div class="form-group">
	        	<label for="add_userName" class="col-sm-3 control-label">Client fullName: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_userName" placeholder="User Name" name="fullname" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	      
	        <div class="form-group">
	        	<label for="add_uemail" class="col-sm-3 control-label">Email: </label>
	        	
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="add_uemail" placeholder="Email" name="email" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
	        	         	        
	        <div class="form-group">
	        	<label for="add_pin" class="col-sm-3 control-label">PIN Number: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_pin" placeholder="PIN Number" name="pin" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
	        	         	        
	        <div class="form-group">
	        	<label for="add_tel1" class="col-sm-3 control-label">Tel 1: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_tel1" placeholder="0712 xxx xxx" name="tel1" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
	        	         	        
	        <div class="form-group">
	        	<label for="add_tel2" class="col-sm-3 control-label">Tel 2: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_tel2" placeholder="07xx xxx xxx" name="tel2" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
	        <div class="form-group">
	        	<label for="add_code" class="col-sm-3 control-label">Secondary Code: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_code" placeholder="C123" name="code" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
	        	         	        
	        <div class="form-group">
	        	<label for="add_website" class="col-sm-3 control-label">Website: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_website" placeholder="website.co.ke" name="website" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
                    	         	        
	        <div class="form-group">
	        	<label for="add_address" class="col-sm-3 control-label">Physical Address: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_address" placeholder="website.co.ke" name="address" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
                    	         	        
	        <div class="form-group">
	        	<label for="add_floor" class="col-sm-3 control-label">Floor: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_floor" placeholder="website.co.ke" name="floor" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
                          	         	        
	        <div class="form-group">
	        	<label for="add_county" class="col-sm-3 control-label">County: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_county" placeholder="website.co.ke" name="county" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
                          	         	        
	        <div class="form-group">
	        	<label for="add_city" class="col-sm-3 control-label">City: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_city" placeholder="website.co.ke" name="city" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
                                   	         	        
	        <div class="form-group">
	        	<label for="add_street" class="col-sm-3 control-label">Street: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_street" placeholder="website.co.ke" name="street" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
                                   	         	        
	        <div class="form-group">
	        	<label for="add_location" class="col-sm-3 control-label">Location: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_location" placeholder="website.co.ke" name="location" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
            <div class="form-group">
	        	<label for="add_contact" class="col-sm-3 control-label">Contact Person: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_contact" placeholder="website.co.ke" name="contact" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
            <div class="form-group">
	        	<label for="add_designation" class="col-sm-3 control-label">Designation: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_designation" placeholder="Accountant" name="designation" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
            <div class="form-group">
	        	<label for="add_company" class="col-sm-3 control-label">Company ID: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_company" placeholder="website.co.ke" name="company" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->
	        <div class="form-group">
	        	<label for="add_personal_id" class="col-sm-3 control-label">Personal ID: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_personal_id" placeholder="website.co.ke" name="personal_id" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->
	        <div class="form-group">
	        	<label for="add_phone" class="col-sm-3 control-label">Personal Phone: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="add_phone" placeholder="07xx xxx xxx" name="phone" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
                             
               <div class="form-group">
				    <label for="vat" class="col-sm-3 control-label gst">Group</label>
				    <div class="col-sm-9 d-flex">
				     
				      <label for="supplier">Supplier</label>
				      <input type="radio" id="supplier" name="group"  class="form-control"  value="supplier" checked>
				      <input type="radio" id="client" name="group" value="client" class="form-control" >
				      <label for="client">Client</label>
				    </div>
				  </div>   <!-- /form-group-->              
	        	         	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createUserBtn" data-loading-text="Loading..." autocomplete="off"> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Client</h4>
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
	      	</div>

	      	<div class="div-result">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#userInfo" aria-controls="profile" role="tab" data-toggle="tab">Client Info</a></li>    
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">

				  	
				    
				    <!-- product image -->
				    <div role="tabpanel" class="tab-pane active" id="userInfo">
				    	<form class="form-horizontal" id="editUserForm" action="php_action/editClient.php" method="POST">				    
				    	<br />

				    	<div id="edit-user-messages"></div>

				    	
              
              
              
              
              
	        <div class="form-group">
	        	<label for="userName" class="col-sm-3 control-label">Client fullName: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="userName" placeholder="User Name" name="fullname" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	    

	            	 

	        <div class="form-group">
	        	<label for="uemail" class="col-sm-3 control-label">Email: </label>
	        	
				    <div class="col-sm-8">
				      <input type="email" class="form-control" id="uemail" placeholder="Email" name="email" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
	        	         	        
	        <div class="form-group">
	        	<label for="pin" class="col-sm-3 control-label">PIN Number: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="pin" placeholder="PIN Number" name="pin" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
	        	         	        
	        <div class="form-group">
	        	<label for="tel1" class="col-sm-3 control-label">Tel 1: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="tel1" placeholder="0712 xxx xxx" name="tel1" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
	        	         	        
	        <div class="form-group">
	        	<label for="tel2" class="col-sm-3 control-label">Tel 2: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="tel2" placeholder="07xx xxx xxx" name="tel2" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	
                 <div class="form-group">             
                              	<label for="code" class="col-sm-3 control-label">Secondary Code: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="code" placeholder="C123" name="code" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	  
	        	         	        
	        <div class="form-group">
	        	<label for="website" class="col-sm-3 control-label">Website: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="website" placeholder="website.co.ke" name="website" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
                    	         	        
	        <div class="form-group">
	        	<label for="address" class="col-sm-3 control-label">Physical Address: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="address" placeholder="website.co.ke" name="address" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
                    	         	        
	        <div class="form-group">
	        	<label for="floor" class="col-sm-3 control-label">Floor: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="floor" placeholder="website.co.ke" name="floor" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
                          	         	        
	        <div class="form-group">
	        	<label for="county" class="col-sm-3 control-label">County: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="county" placeholder="website.co.ke" name="county" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
                          	         	        
	        <div class="form-group">
	        	<label for="city" class="col-sm-3 control-label">City: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="city" placeholder="website.co.ke" name="city" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
                                   	         	        
	        <div class="form-group">
	        	<label for="street" class="col-sm-3 control-label">Street: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="street" placeholder="website.co.ke" name="street" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
                                   	         	        
	        <div class="form-group">
	        	<label for="location" class="col-sm-3 control-label">Location: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="location" placeholder="website.co.ke" name="location" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	
                     
                       <div class="form-group">
	        	<label for="contact" class="col-sm-3 control-label">Contact Person: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="contact" placeholder="website.co.ke" name="contact" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
            <div class="form-group">
	        	<label for="designation" class="col-sm-3 control-label">Designation: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="designation" placeholder="Accountant" name="designation" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	 
            <div class="form-group">
	        	<label for="company" class="col-sm-3 control-label">Company ID: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="company" placeholder="website.co.ke" name="company" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->
	        <div class="form-group">
	        	<label for="personal_id" class="col-sm-3 control-label">Personal ID: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="personal_id" placeholder="website.co.ke" name="personal_id" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->
	        <div class="form-group">
	        	<label for="phone" class="col-sm-3 control-label">Personal Phone: </label>
	        	
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="phone" placeholder="07xx xxx xxx" name="phone" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	
                 
                 
                  
                      

			        <div class="modal-footer editUserFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
				        
				        <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save Changes</button>
				      </div> <!-- /modal-footer -->				     
			        </form> <!-- /.form -->				     	
				    </div>    
				    <!-- /product info -->
				  </div>

				</div>
	      	
	      </div> <!-- /modal-body -->
	      	      
     	
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeUserModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="glyphicon glyphicon-trash"></i> Remove Client</h4>
      </div>
      <div class="modal-body">

      	<div class="removeUserMessages"></div>

        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="glyphicon glyphicon-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i class="glyphicon glyphicon-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->


<script src="custom/js/client.js"></script>

<?php require_once 'includes/footer.php'; ?>