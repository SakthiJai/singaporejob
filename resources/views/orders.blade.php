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
                          <h4 class="card-title">Order</h4>
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
	   
		<button type="button" class="btn btn-success" data-toggle="modal" style="margin-top:6px;float:right; background-color: #32BDEA; border-color: #32BDEA; " data-target=".bd-example-modal-xl" onclick="addOrder()">Add Order</button>
	  
         <button class="btn btn-default" onclick="reload_table()"><i class="fa fa-refresh"></i></button>

         <span class="tools pull-right">
          <a href="javascript:;" class="fa fa-chevron-down" style="visibility: hidden !important;"></a>
          <a href="javascript:;" class="fa fa-times" style="visibility: hidden !important;"></a>
        </span>
      </header>
  
        <div class="table-responsive1">
          <table class="table table-bordered" id="oredersTable">
            <thead>
              <tr style="background-color: #DCDFE8;">
                <th>S.No</th>
                <th>Invoice no</th>
				<th>Customer name</th>
				<th>Customer phone</th>
				<th>Net amount</th>
				<th>Date Time</th>
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
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"onclick="closeform()"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
      <form  id="deleteForm" method="post">
             <input type="hidden" name="delete_id" id="delete_id" value="">

            <div class="form-group"  align="center">
			<h5>Are you sure want to delete?</h5>
			  <button type="button" id="delete" onclick="deleteOrders()" class="btn btn-primary btn-md">Yes</button>
              <button type="button" class="btn  btn-md btn-danger" data-dismiss="modal"  onclick="closeform()" role="button">No</button>
            </div>
          
            </form>

    </div>
   
  </div>
  </div>
</div>
<div class="modal removerow" id="deletepettype" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content" style="background-color: #fff !important;">
    <div class="modal-header">
	<h5 class="items_header">Delete</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"onclick="closeform()"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
      <form  id="tdremove" method="post">
             <input type="hidden" name="id" id="id" value="">

            <div class="form-group"  align="center">
			<h5>Are you sure want to delete</h5>
			  <button type="button" id="delete" onclick="deleteproductlist()" class="btn btn-primary btn-md">Yes</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"defer></script> 

<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" defer></script>
<script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js" defer></script>


 
   {!! Html::script('/assets/application/orders.js') !!}

<script>
var editPermission	 = '<?php echo $permission[7]->update;?>';
var deletePermission = '<?php echo $permission[7]->delete;?>';
function Validate(event) {
        var regex = new RegExp("^[0-9-!@#$%&*?.]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }	
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
	.rightside{
		text-align:right;
	}
	.customer_address{
		height: 42%;
	}
#customer_name-error{
	  color:red  !important;
  }
#customer_phone-error{
	  color:red  !important;
  }
#customer_address-error{
	  color:red  !important;
  }
  .error{
	  color:red  !important;
  }
</style>
<div class="modal fade bd-example-modal-xl" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
     <div class="modal-header">
	 <h4 class="modal-title" style="float: left;">Add Orders</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
     </div>
	 <div class="card">
       <div class="card-body">
	   <div class="content-wrapper">
	   <section class="content">
	   <div class="row">
	   <div class="col-md-12 col-xs-12">
	   <form id="ordersform" >
              <div class="box-body">
			  <div class="row">
			   <div class="col-md-9">
			   </div>
			   <div class="col-md-3">
			  <div class="form-group" id="">
                  
                </div>
			</div>	
				</div>
                <div class="row" style="margin-top:2px">
                  <div class="col-md-4">
				   <input type="hidden" name="orders_id" id="orders_id" class="form-control" autocomplete="off">
                    <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Client Name</label>
                      <input type="text" class="form-control" id="customer_name" name="customer_name" maxlength="50" onkeypress="return lettersOnly(event)"  placeholder="Enter Client Name" autocomplete="off" />
                    </div>
                  <div class="col-md-4">
                    <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Client Phone</label>
                      <input type="text" class="form-control" id="customer_phone" name="customer_phone" placeholder="Enter Client Phone" onkeypress="return Validate(event);"  autocomplete="off">
                  </div>
				  <div class="col-md-4">
                    <label for="gross_amount" class="col-sm-5 control-label" style="text-align:left;">Client Address</label>
                      <textarea type="text" class="form-control" id="customer_address" style="height:42%;" name="customer_address" placeholder="Enter Client Address" autocomplete="off"></textarea>
                  </div>
                </div></br>	
				<div class="card">
					<div class="card-body">
				<table class="table table-bordered" id="product_info_table">
				<input type="hidden" name="orders_items_id[]" id="orders_items_id" class="form-control" autocomplete="off">
				<input type="hidden" name="product_id[]" id="product_id" class="form-control" autocomplete="off">
                  <thead>
                    <tr>
                      <th>Product</th>
                      <th>Qty</th>
                      <th>Rate</th>
                      <th>Amount</th>
                      <th><button type="button" id="add_row" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i></button></th>
                    </tr>
                  </thead>
				  <tbody>
					
                   </tbody>
                </table>
				</div>
				</diV>
                  <div class="mb-3 row">
				  <div class="col-sm-8">
				  </div>
                    <label for="gross_amount" class="col-sm-2 col-form-label">Gross Amount</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control rightside" id="gross_amount" name="gross_amount" disabled autocomplete="off">
                      <input type="hidden" class="form-control" id="gross_amount_value" name="gross_amount_value" autocomplete="off">
                    </div>
                  </div>
                  <div class="mb-3 row">
				  <div class="col-sm-8">
				  </div>
                    <label for="service_charge" class="col-sm-2 col-form-label"><span id="s_charge_rate"></span></label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control rightside" id="service_charge" name="service_charge" disabled autocomplete="off">
                      <input type="hidden" class="form-control" id="service_charge_value" name="service_charge_value" autocomplete="off">
                    </div>
                  </div>
                  <div class="mb-3 row">
				  <div class="col-sm-8">
				  </div>
                    <label for="vat_charge" class="col-sm-2 col-form-label"><span id="vat_charge_rate"></span></label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control rightside" id="vat_charge" name="vat_charge" disabled autocomplete="off">
                      <input type="hidden" class="form-control" id="vat_charge_value" name="vat_charge_value" autocomplete="off">
                    </div>
                  </div>
                  <div class="mb-3 row">
				  <div class="col-sm-8">
				  </div>
                    <label for="discount" class="col-sm-2 col-form-label">Discount</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control rightside" id="discount" name="discount" placeholder="Discount" onkeyup="subAmount()" autocomplete="off">
                    </div>
                  </div>
                  <div class="mb-3 row">
				  <div class="col-sm-8">
				  </div>
                    <label for="net_amount" class="col-sm-2 col-form-label">Net Amount</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control rightside" id="net_amount" name="net_amount" disabled autocomplete="off">
                      <input type="hidden" class="form-control" id="net_amount_value" name="net_amount_value" autocomplete="off">
                    </div>
                  </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer" style="text-align:center;">
                 <button type="submit" id="save" class="btn btn-primary">Save</button>	
                 <button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onclick="closeform()">Close</button>
              </div>
            </form>
					</div>
					</div>
    </div>
	</section>
	</div>
  </div>
</div>
</div>
</div>