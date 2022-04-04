@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
  {!! Html::style('/assets/css/datatables.min.css') !!}
@endpush

@section('content')
<?php  
		$permission = Session::get('permission');
		//print_r($permission[1]);
		?>
 <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
  <div class="col-lg-12 grid-margin">
    <div class="card">
	<div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Users</h4>
                        </div>
                    </div>
      <div class="card-body">
        <h2 class="card-title"></h2>
         <!--  <header class="panel-heading">
        
     <button class="btn btn-success" onclick="addPet()" style="margin-bottom: 0px;float:left"><i class="mdi mdi-plus"></i>ADD PET TYPE</button>
         <span class="tools pull-right">
          <a href="javascript:;" class="fa fa-chevron-down"></a>
          <a href="javascript:;" class="fa fa-times"></a>
		  <button class="btn btn-success  range" onclick="addPet()" style="margin-top:6px;float:right;background:#14aa75;">Add Users</button>
        </span>
      </header> -->
       <header class="panel-heading" >&nbsp;&nbsp;&nbsp;
	   <?php if(isset($permission[8]) && $permission[8]->add==1){ ?> 
		<button type="button" class="btn btn-success" data-toggle="modal" style="margin-bottom: 0px;float:right; background-color: #32BDEA;
    border-color: #32BDEA; " data-target=".bd-example-modal-lg" onclick="addPet()">Add User</button>
	<?php } ?>
         <button class="btn btn-default" onclick="reload_table()"><i class="fa fa-refresh"></i></button>

         <span class="tools pull-right">
          <a href="javascript:;" class="fa fa-chevron-down" style="visibility: hidden !important;"></a>
          <a href="javascript:;" class="fa fa-times" style="visibility: hidden !important;"></a>
        </span>
      </header>
        
        <div class="table-responsive1">
          <table class="table table-bordered" id="usersTable">
            <thead>
              <tr>
                <th>S.No</th>
				<th>User Name</th>
                <th>First Name</th>
				<th>Last Name</th>
				<th> Roles</th>        
				<th>Phone Number</th>
                <th>Action</th>
               
              </tr>
            </thead>
            
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!------delete modal--->
<div class="modal fades" id="deletepettypeModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content" style="background-color: #fff !important;">
    <div class="modal-header">
	<h5 class="modal-title" id="lineModalLabel" align="left" onclick="closeform()">Delete</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
      <form  id="deleteForm" method="post">
             <input type="hidden" name="delete_id" id="delete_id" value="">

            <div class="form-group"  align="center">
			<h5>Are you sure want to delete?</h5>
			  
			   <button type="button" id="delete" onclick="deleteusers()" class="btn btn-primary btn-md">Yes</button>
              <button type="button" class="btn  btn-md btn-danger" data-dismiss="modal"  onclick="closeform()" role="button">No</button>
            </div>
          
            </form>

    </div>
   
  </div>
  </div>
</div>
<!-- Backend Bundle JavaScript -->
<script src="assets/js/backend-bundle.min.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="assets/js/table-treeview.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="assets/js/customizer.js"></script>
	<script src="assets/application/dashboard.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script async src="assets/js/chart-custom.js"></script> 
     
    <!-- app JavaScript -->
    <script src="assets/js/app.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" defer></script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"defer></script> 

<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" defer></script>
<script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js" defer></script>


 
   {!! Html::script('/assets/application/user.js') !!}

<script>
    var baseUrl= '<?php echo URL::to('/'); ?>';
    console.log(baseUrl);
var editPermission	 = '<?php echo $permission[8]->update;?>';
var deletePermission = '<?php echo $permission[8]->delete;?>';	
</script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
function lettersOnly(evt) {
       evt = (evt) ? evt : event;
       var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode :
          ((evt.which) ? evt.which : 0));
       if (charCode > 31 && (charCode < 65 || charCode > 90) &&
          (charCode < 97 || charCode > 122)) {
          //alert("Enter letters only.");
          return false;
       }
       return true;
     }
	 function Validate(event) {
        var regex = new RegExp("^[0-9-!@#$%&*?.]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
</script>




@endsection
<style type="text/css">
  .modal-header{
    color:#ffff;
    background: #393185;
  }
  .modal-body{
    background:#ffff;
  }
  #roles-error {
	  color:red !important;
  }
  #user_name-error{
	  color:red  !important;
  }
  
   #first_name-error{
	  color:red  !important;
  }
   #last_name-error{
	  color:red  !important;
  }
   #phone_number-error{
	  color:red  !important;
  }
   #email-error{
	  color:red  !important;
  }
   #password-error{
	  color:red  !important;
  }
   #confirm_password-error{
	  color:red  !important;
  }
  #gender-error{
	  color:red !important;
  

 

</style>
<div class="modal fade bd-example-modal-lg" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	<div class="modal-header">
	<h4 class="modal-title" style="float: left;">Add Users</h4>
                <button type="button" class="close" data-dismiss="modal" onclick="closeform()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
			
	
	   <form id="users_form" style="padding: 4px 13px;">
					<div class="row">
					<input type="hidden" value="" id="user_id" name="user_id"/> 
							<div class="col-md-4 roles">
                            <label for="roles">Select Role</label>
                            <select id="roles" class="form-control" name="roles">
                                <option value="">Select Role</option>
                            </select>
                        </div>
						<div class="col-md-4 user_name">
                            <label for="user_name">User Name</label>
                            <input type="text" name="user_name" class="form-control" onkeypress="return lettersOnly(event)" id="user_name" placeholder=""
							autocomplete="off" maxlength="50">
                        </div>
                        <div class="col-md-4 first_name">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" onkeypress="return lettersOnly(event)" id="first_name" placeholder="" autocomplete="off" maxlength="50">
                        </div>
                    </div>
					<div class="row">
					 <div class="col-md-4 last_name">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" onkeypress="return lettersOnly(event)" id="last_name" placeholder="" autocomplete="off" maxlength="50">
                        </div>
					 <div class="col-md-4 phone_number">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" name="phone_number" class="form-control" onkeypress="return Validate(event)" id="phone_number" placeholder=""autocomplete="off" maxlength="50">
                        </div>
					 <div class="col-md-4 email">
                            <label for="email">Email</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="" autocomplete="off" maxlength="50">
                        </div>
					</div>
					<div class="row">
					<div class="col-md-4 password">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="" autocomplete="off" maxlength="50">
                        </div>
						<div class="col-md-4 confirm_password">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="" autocomplete="off" maxlength="50">
                        </div>
						<div class="col-md-4">
							<label for="exampleInputEmail1">Gender</label><br>
							<label class="radio-inline">
								<input type="radio" name="gender" id="male" value="1" checked>&nbsp;Male
							</label>&nbsp;
							<label class="radio-inline">
								<input type="radio" name="gender" id="female" value="2">&nbsp;Female
							</label>
						</div>
					</div>
					 <div class="form-group"  align="center" style="margin-top:14px;">
                      <button type="submit" id="submit" class="btn btn-primary btn-md">Save</button>
                      <button type="button" class="btn  btn-md btn-danger" data-dismiss="modal" onclick="closeform()" role="button">Close</button>
                    </div>
					</form>
					
    </div>
  </div>
</div>