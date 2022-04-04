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
                            <h4 class="card-title">Roles</h4>
                        </div>
                    </div>
      <div class="card-body">
        <h2 class="card-title"></h2>
       <header class="panel-heading" >&nbsp;&nbsp;&nbsp;
	    <?php if(isset($permission[9]) && $permission[9]->add==1){ ?> 
        <button class="btn btn-success  range" onclick="addPet()" style="margin-top:6px;float:right;    background-color: #32BDEA;
    border-color: #32BDEA;">Add Roles</button>
	<?php } ?>
         <button class="btn btn-default" onclick="reload_table()"><i class="fa fa-refresh"></i></button>

         <span class="tools pull-right">
          <a href="javascript:;" class="fa fa-chevron-down" style="visibility: hidden !important;"></a>
          <a href="javascript:;" class="fa fa-times" style="visibility: hidden !important;"></a>
        </span>
      </header>
       
			<form id="permissiontable">		
        <div class="table-responsive1">
          <table class="table table-bordered" id="permissionTable">
            <thead>
              <tr>
                <th>S.No</th>
                <th>Roles Name</th>
                <th>Action</th>
              </tr>
            </thead>
            
          </table>
        </div>
		</form>
      </div>
    </div>
  </div>
</div>
<!------delete modal--->
<div class="modal fades" id="deletepettypeModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content" style="background-color: #fff !important;">
    <div class="modal-header">
	<h5 class="modal-title" id="lineModalLabel">Delete</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeform()"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
      <form  id="deleteForm" method="post">
             <input type="hidden" name="delete_id" id="delete_id" value="">

            <div class="form-group"  align="center">
			<h5>Are you sure want to delete?</h5>
			  <button type="button" id="delete" onclick="deletepermission()" class="btn btn-primary btn-md">Yes</button>
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


 
   {!! Html::script('/assets/application/permission.js') !!}

<script>
    var baseUrl= '<?php echo URL::to('/'); ?>';
    console.log(baseUrl);
var editPermission	 = '<?php echo $permission[9]->update;?>';
var deletePermission = '<?php echo $permission[9]->delete;?>';
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
       /*if (charCode > 31 && (charCode < 65 || charCode > 90) &&
          (charCode < 97 || charCode > 122)) {
          //alert("Enter letters only.");
          return false;
       }*/
	   if(!(charCode >= 65 && charCode <= 120) && (charCode != 32 && charCode != 0)) { 
            //event.preventDefault(); 
			return false;
        }
       return true;
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
	#group_name-error{
		color:red !important;
	}
</style>
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			<h4 class="modal-title" style="float: left;">Permissoion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeform()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form id="permissionForm">
              <div class="box-body">

                <div class="form-group">
                  <label for="group_name">Roles Name</label>
				  <input type="hidden" class="form-control" id="permission_id" name="permission_id">
                  <input type="text" class="form-control" id="group_name" name="group_name" onkeypress="return lettersOnly(event)" maxlength="50" placeholder="" autocomplete="off">
                </div>
               <!-- <div class="form-group">
                  <label for="permission">Permission</label>

                  <table class="table table-responsive" id="permissionview">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Create</th>
                        <th>Update</th>
                        <th>View</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Users</td>
                        <td><input type="checkbox" name="members[]" id="members1" value="01" class="minimal"></td>
                        <td><input type="checkbox" name="members[]" id="members2" value="02" class="minimal"></td>
                        <td><input type="checkbox" name="members[]" id="members3" value="03" class="minimal"></td>
                        <td><input type="checkbox" name="members[]" id="members4" value="04" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Permission</td>
                        <td><input type="checkbox" name="permission[]" id="permission1" value="11" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission2" value="12" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission3" value="13" class="minimal"></td>
                        <td><input type="checkbox" name="permission[]" id="permission4" value="13" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Items</td>
                        <td><input type="checkbox" name="items[]" id="items1" value="21" class="minimal"></td>
                        <td><input type="checkbox" name="items[]" id="items2" value="22" class="minimal"></td>
                        <td><input type="checkbox" name="items[]" id="items3" value="23" class="minimal"></td>
                        <td><input type="checkbox" name="items[]" id="items4" value="24" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Category</td>
                        <td><input type="checkbox" name="category[]" id="category1" value="31" class="minimal"></td>
                        <td><input type="checkbox" name="category[]" id="category2" value="32" class="minimal"></td>
                        <td><input type="checkbox" name="category[]" id="category3" value="33" class="minimal"></td>
                        <td><input type="checkbox" name="category[]" id="category4" value="34" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Warehouse</td>
                        <td><input type="checkbox" name="warehouse[]" id="warehouse1" value="41" class="minimal"></td>
                        <td><input type="checkbox" name="warehouse[]" id="warehouse2" value="42" class="minimal"></td>
                        <td><input type="checkbox" name="warehouse[]" id="warehouse3" value="43" class="minimal"></td>
                        <td><input type="checkbox" name="warehouse[]" id="warehouse4" value="44" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Elements</td>
                        <td><input type="checkbox" name="elements[]" id="elements1" value="51" class="minimal"></td>
                        <td><input type="checkbox" name="elements[]" id="elements2" value="52" class="minimal"></td>
                        <td><input type="checkbox" name="elements[]" id="elements3" value="53" class="minimal"></td>
                        <td><input type="checkbox" name="elements[]" id="elements4" value="54" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Products</td>
                        <td><input type="checkbox" name="products[]" id="products1" value="61" class="minimal"></td>
                        <td><input type="checkbox" name="products[]" id="products2" value="62" class="minimal"></td>
                        <td><input type="checkbox" name="products[]" id="products3" value="63" class="minimal"></td>
                        <td><input type="checkbox" name="products[]" id="products4" value="64" class="minimal"></td>
                      </tr>
                      <tr>
                        <td>Orders</td>
                        <td><input type="checkbox" name="orders[]" id="orders1" value="71" class="minimal"></td>
                        <td><input type="checkbox" name="orders[]" id="orders2" value="72" class="minimal"></td>
                        <td><input type="checkbox" name="orders[]" id="orders3" value="73" class="minimal"></td>
                        <td><input type="checkbox" name="orders[]" id="orders4" value="74" class="minimal"></td>
                      </tr>
                      
                      <tr>
                        <td>Company</td>
                        <td> - </td>
                        <td><input type="checkbox" name="company[]" id="company" value="81" class="minimal"></td>
                        <td> - </td>
                        <td> - </td>
                      </tr>
                  
                    </tbody>
                  </table>
                  
                </div>-->
              </div>
			  <div class="form-group"  align="center">
                      <button type="submit" id="submit" class="btn btn-primary btn-sm">Submit</button>
                      <button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal" onclick="closeform()" role="button">Close</button>
                </div>
				</form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal --> 

<div class="modal fade" id="permission_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content" style="width: 114%;">
            <div class="modal-header">
			<h4 class="modal-title" style="float: left;">Permissoion</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeform()"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body form">
                <form id="permission_form">
              <div class="box-body">
				<div class="alert alert-success" role="alert">
				  Access Submitted SuccessFully!
				</div>
				<div class="alert alert-danger" role="alert">
				  Access Submit Issue!
				</div>
				
                <div class="form-group">
                  <label for="group_name">Roles Name</label>
				  <input type="hidden" class="form-control" id="permissionList_id" name="permissionList_id">
                  <input type="text" class="form-control" id="roles_name" name="roles_name" onkeypress="return lettersOnly(event)" maxlength="50" placeholder="" autocomplete="off">
                </div>
               <div class="form-group">
                  <label for="permission"><strong>Permission</strong></label>
				    <label style="float: right;">
						<input type="checkbox" class="check" id="checkAll" value="1" name="checkAll"> Check All
					</label>
					<div class="table-responsive1">
					<?php //print_r($menu);?>
                  <table class="table table-bordered" id="permissionview">
                    <thead>
                      <tr>
                        <th>Access</th>
                        <th>View</th>
                        <th>Create</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
					<?php foreach($menu as $list):?>
                      <tr>
                        <td><?php echo ucwords($list->menu_name);?></td>
                        <td><input type="checkbox" name="<?php echo $list->menu_name;?>[]" id="users1" value="1"  class="minimal"></td>
                        <td><input type="checkbox" name="<?php echo $list->menu_name;?>[]" id="users2" value="2"  class="minimal"></td>
                        <td><input type="checkbox" name="<?php echo $list->menu_name;?>[]" id="users3" value="3"  class="minimal"></td>
                        <td><input type="checkbox" name="<?php echo $list->menu_name;?>[]" id="users4" value="4"  class="minimal"></td>
                      </tr>
					  <?php endforeach;?>
                     
                  
                    </tbody>
                  </table>
                  </div>
                </div>
              </div>
			  <div class="form-group"  align="center">
                      <button type="button" onclick="submitpermissionList()" class="btn btn-primary btn-sm">Submit</button>
                      <button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal" onclick="closeform()" role="button">Close</button>
                </div>
				</form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->