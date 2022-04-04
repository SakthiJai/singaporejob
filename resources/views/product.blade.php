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
                          <h4 class="card-title">Product</h4>
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
	  <?php if(isset($permission[6]) && $permission[6]->add==1){ ?>
        <button class="btn btn-success  range" onclick="addPet()" style="margin-top:6px;float:right; background-color: #32BDEA;
    border-color: #32BDEA;">Add Product</button>
	<?php } ?>
         <button class="btn btn-default" onclick="reload_table()"><i class="fa fa-refresh"></i></button>
		 <button class="btn btn-success  range" onclick="addproduct()" style="margin-top:6px;float:right; margin-right:10px; background-color: #32BDEA;
    border-color: #32BDEA;" > Import Products</button>

         <span class="tools pull-right">
          <a href="javascript:;" class="fa fa-chevron-down" style="visibility: hidden !important;"></a>
          <a href="javascript:;" class="fa fa-times" style="visibility: hidden !important;"></a>
        </span>
      </header>
       
        <div class="table-responsive1">
          <table class="table table-bordered" id="categoryTable" style="text-align:right;">
            <thead style="background-color: #DCDFE8;text-align:left;">
              <tr style="">
                <th>S.No</th>
				<th>image</th>
                <th>Product Name</th>
				<th>Price</th>
				<th>Selling Price</th>
				<th>Quantity</th>
				<th>Status</th>
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
               <button type="button" id="delete" onclick="deleteproduct()" class="btn btn-primary btn-md">Yes</button>
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.13.1/additional-methods.js" defer></script>

<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"defer></script> 

<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" defer></script>
<script src="https://cdn.datatables.net/colreorder/1.5.4/js/dataTables.colReorder.min.js" defer></script>


 
   {!! Html::script('/assets/application/product.js') !!}

<script>
    var baseUrl= '<?php echo URL::to('/'); ?>';
    console.log(baseUrl);
var editPermission	 = '<?php echo $permission[6]->update;?>';
var deletePermission = '<?php echo $permission[6]->delete;?>';	
</script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>




@endsection
<style type="text/css">
#product_image{visibility: hidden !important;}
  .modal-header{
    color:#ffff;
    background: #393185;
  }
  .modal-body{
    background:#ffff;
  }
  #category-error{
	  color:red !important;
  }
  #message-error{
	  color:red !important;
  }
  #productname-error{
	  color:red !important;
  }
  #house_picture-error{
	  color:red !important;
	  margin-top: -25px;
  }
  #price-error{
	  color:red !important;
  }
  #quantity-error{
	  color:red !important;
  }
  #color-error{
	  color:red !important;
  }
  #size-error{
	  color:red !important;
  }
  
  #items-error{
	  color:red !important;
  }
  #warehouse-error{
	  color:red !important;
  }
  #availbility-error{
	  color:red !important;
  }
div.dataTables_wrapper div.dataTables_filter lable{width:50%!important;}
.dataTables_filter .form-control-sm {width:100%;}
#productcsv-error{
	color:red !important;
}
 

</style>
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog  modal-xl">
        <div class="modal-content" >
            <div class="modal-header">
			
			<h4 class="modal-title" style="float: left;">Add Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeform()"><span aria-hidden="true">&times;</span></button>
                
            </div>
            <div class="modal-body form">
                <form  id="productForm" enctype="multipart/form-data" name="productForm">
                    <input type="hidden" value="" id="id" name="id"/> 
                    <div class="form-body">
                       
                            <div class="row">
                            <div class="col-md-4" id="showimage">
								<label for="house_picture">Profile Picture</label>
      <img src="{{url('assets/images/camra.png')}}" onclick="$('#house_picture').click()" style="width:25%;border-radius:50px;height:50px;" id="imgs">
      <input type="file"  name="house_picture" class="form-control"  id="house_picture" onChange="readURLS(this);"  style="visibility: hidden;">
							</div>
							<div class="col-md-4">
                                        <label>Product Name</label>
                                        <input type="text"  id ="productname" class="form-control"  onkeypress="return lettersOnly(event)" maxlength="50" name="productname" autocomplete="off">
                            </div>
							<div class="col-md-4">
                                        <label>Actual Price</label>
                                        <label>Price</label>
                                        <input type="text"  id ="price" class="form-control" name="price" maxlength="10" onkeypress="return Validate(event)" autocomplete="off">
                            </div>
							</div>
							<div class="row">
							<div class="col-md-4">
                                        <label>Selling Price</label>
                                        <input type="text"  id ="selling_price" class="form-control" name="selling_price" maxlength="10" onkeypress="return Validate(event)" autocomplete="off">
                            </div>
                            <div class="col-md-4">
                                        <label>Quantity</label>
                                    <input type="text"  id="quantity" class="form-control" maxlength="10" name="quantity" onkeypress="return Validate(event)" autocomplete="off">
                            </div>
									
							<div class="col-sm-4">
								  <label for="payment_type">Color</label>
								  <select name="color" id="color" class="form-control">
								 <option value="">Select</option>
								  </select>
							</div>
									
									</div>
									
									<div class="row">
									<div class="col-sm-4">
                          <label for="payment_type">Size</label>
                          <select name="size" id="size" class="form-control">
                         <option value="">Select</option>
						  </select>
									</div>
									<div class="col-sm-4">
                          <label for="payment_type">Items</label>
                          <select name="items" id="items" class="form-control">
                         <option value="">Select</option>
						  </select>
									</div>
									<div class="col-sm-4">
                          <label for="Category">Category</label>
                          <select name="Category" id="Category" class="form-control">
						  <option value="">Select</option>
						  </select>
									</div>
						
						</div>
						<div class="row">
						<div class="col-sm-4">
                                <label for="Warehouse">Ware House</label>
                                     <select name="warehouse" id="warehouse" class="form-control">
									 <option value="">Select</option>
						       </select>
									</div>
							<div class="col-sm-4">
                                <label for="availbility">Availbility</label>
                                     <select name="availbility" id="availbility" class="form-control">
										<option value="">Select</option>
										<option value="1">Yes</option>
										<option value="2">No</option>
									</select>
									</div>
							<div class="col-sm-4">
                                <label for="availbility">Descripation</label>
                                    <textarea class="form-control" id="message" name="message" autocomplete="off">
									</textarea>
									</div>
                        </div>
                    <div class="form-group"  align="center" style="margin-top:34px !important;">
                      <button type="submit" id="submit" class="btn btn-primary btn-md">Save</button>
                      <button type="button" class="btn  btn-md btn-danger" data-dismiss="modal"  onclick="closeform()" role="button">Close</button>
                    </div>
                </div>
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
	
  
<div class="modal fade" id="modal_forms" role="dialog">     

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			<h4 class="modal-title" style="float: left;"> Import Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
			
            <div class="modal-body form">
			<div class="alert alert-success" role="alert">
                    Import Products Sucessfully
                </div>
			
                <form  id="importproductForm" enctype="multipart/form-data" class="form-horizontal" method="post">
			
                    <input type="hidden" value="" id="id" name="id"/> 
                    <div class="form-body">
						
                        <div class="form-group">
						
						
							<img src="assets/images/icon/progress.gif" id="progress"  style="width:100%">
					
                            <label class="control-label col-md-3"></label>
                            <div class="col-md-12">
							
                                 <input type="file" id="productcsv" class="form-control image-file"  name="productcsv" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" style="line-height: 26px;">
                            </div>
                        </div>
							
                    <div class="form-group"  align="center">
                      <button type="submit" id="submit" class="btn btn-primary btn-md">save</button>
                      <button type="button" class="btn  btn-md btn-danger" data-dismiss="modal" onclick="formReload()" role="button">Close</button>                    </div>	
                </div>
				
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script type="text/javascript">
 function readURLS(that)
  {
    var input = that;
    var url = $(that).val();
    var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
    if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) 
     {
        var reader = new FileReader();

        reader.onload = function (e) {
          //console.log(e.target.result )
           $('#imgs').attr('src', e.target.result);
            $('#house_picture_tmp').val(e.target.result);
           $('#house_picture').val(e.target.result);
           //profile_picture_tmp
        }
       reader.readAsDataURL(input.files[0]);
    }
  }
 function Validate(event) {
        var regex = new RegExp("^[0-9-!@#$%&*?.]");
        var key = String.fromCharCode(event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            event.preventDefault();
            return false;
        }
    }
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