@extends('layout.master')

@push('plugin-styles')
  <!-- {!! Html::style('/assets/plugins/plugin.css') !!} -->
  {!! Html::style('/assets/css/datatables.min.css') !!}
@endpush

@section('content')
 <meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
  <div class="col-lg-12 grid-margin">
    <div class="card">
	<div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Elements Value</h4>
                        </div>
                    </div>
      <div class="card-body">
        <h2 class="card-title"></h2>
         <!--  <header class="panel-heading">
        
     <button class="btn btn-success" onclick="addPet()" style="margin-bottom: 0px;float:left"><i class="mdi mdi-plus"></i>ADD PET TYPE</button>
         <span class="tools pull-right">
          <a href="javascript:;" class="fa fa-chevron-down"></a>
          <a href="javascript:;" class="fa fa-times"></a>
        </span>
      </header> -->
       <header class="panel-heading" >&nbsp;&nbsp;&nbsp;
        <button class="btn btn-success  range" onclick="addvalueView()" style="margin-top:6px;float:right; background-color: #32BDEA;
    border-color: #32BDEA;">Add Value</button>
         <button class="btn btn-default" onclick="reload_table()"><i class="fa fa-refresh"></i></button>

         <span class="tools pull-right">
          <a href="javascript:;" class="fa fa-chevron-down" style="visibility: hidden !important;"></a>
          <a href="javascript:;" class="fa fa-times" style="visibility: hidden !important;"></a>
        </span>
      </header>
        
        <div class="table-responsive1">
          <table class="table table-bordered" id="addvalueTable">
            <thead>
              <tr>
                <th>S.No</th>
                <th>Elements Name</th>
				<th>Value</th>
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
	<h5 class="modal-title" id="lineModalLabel">Delete</h5>
     <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeform()"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
      <form  id="deleteForm" method="post">
             <input type="hidden" name="delete_id" id="delete_id" value="">

            <div class="form-group"  align="center">
			<h5>Are you sure want to delete?</h5>
               <button type="button" id="delete" onclick="deleteelementsvalueList()" class="btn btn-primary btn-md">Yes</button>
              <button type="button" class="btn  btn-md btn-danger" data-dismiss="modal" onclick="closeform()" role="button">No</button>
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


 
   {!! Html::script('/assets/application/addvalue.js') !!}

<script>
    var baseUrl= '<?php echo URL::to('/'); ?>';
    console.log(baseUrl);
	
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
  #elementsname-error{
	  color:red;
  }
  #elements_value-error{
	  color:red;
  }

 

</style>
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content" >
            <div class="modal-header">
			
			<h4 class="modal-title" style="float: left;">Add value</h4>
                <button type="button" class="close" data-dismiss="modal" onclick="closeform()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
            <div class="modal-body form">
                <form  id="add_value_form" class="form-horizontal">
                    <input type="hidden" value="" id="id" name="id"/> 
                    <div class="form-body">
									
									<div class="row">
									<div class="col-sm-4">
                          <label for="payment_type">Elements Name</label>
						  <input type="text" id="elements_name" name="elements_name"class="form-control"/>
							<select name="elementsname" id="elementsname" class="form-control">
								<option value="">Select Elements</option>
						  </select>
									</div>
									 <div class="col-md-4">
                                        <label>Elements Value</label>
                                        <input type="text"  id="elements_value" class="form-control" maxlength="50" onkeypress="return lettersOnly(event)" name="elements_value" autocomplete="off">
                                    </div>
									
						</div>
                    <div class="form-group"  align="center" style="margin-top:14px;">
                      <button type="submit" id="submit" class="btn btn-primary btn-md">Save</button>
                      <button type="button" class="btn  btn-md btn-danger" data-dismiss="modal" onclick="closeform()" role="button">Close</button>
                    </div>
                </div>
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->