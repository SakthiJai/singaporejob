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
      <div class="card-body">
        <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="box">
            <form  id="company_form">
              <div class="box-body">
				<div class="row">
					<div class="col-md-4">
					  <label for="company_name">Company Name</label>
					  <input type="hidden" class="form-control" id="company_id" name="company_id">
					  <input type="text" class="form-control" id="company_name" name="company_name" onkeypress="return lettersOnly(event)" placeholder="" autocomplete="off" maxlength="50">
					</div>
					<div class="col-md-4">
					  <label for="service_charge_value">Charge Amount (%)</label>
					  <input type="text" class="form-control" id="service_charge_value" name="service_charge_value" onkeypress="return Validate(event)" placeholder="Enter charge amount %" autocomplete="off" maxlength="50">
					</div>
					<div class="col-md-4">
					  <label for="vat_charge_value">Vat Charge (%)</label>
					  <input type="text" class="form-control" id="vat_charge_value" name="vat_charge_value" onkeypress="return Validate(event)" placeholder="" autocomplete="off" maxlength="50">
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
					  <label for="address">Address</label>
					  <input type="text" class="form-control" id="address" name="address" placeholder=""  autocomplete="off">
					</div>
					<div class="col-md-4">
					  <label for="phone">Phone</label>
					  <input type="text" class="form-control" id="phone" name="phone" placeholder="" onkeypress="return Validate(event)" autocomplete="off" maxlength="12">
					</div>
					<div class="col-md-4">
					  <label for="country">Country</label>
					  <input type="text" class="form-control" id="country" name="country" placeholder="" onkeypress="return lettersOnly(event)" autocomplete="off" maxlength="50">
					</div>
				</div>
				<div class="row">
				<div class="col-md-4">
					  <label for="currency">Currency</label>
					  <select class="form-control" id="currency" name="currency">
						<option value="">SELECT</option>
						<option value="AED">AED</option>
						<option value="AED">AED</option>
						<option value="ALL">ALL</option>
						<option value="ANG">ANG</option>
						<option value="AOA">AOA</option>
						<option value="ARS">ARS</option>
						<option value="AUD">AUD</option>
						<option value="AWG">AWG</option>
						<option value="AZN">AZN</option>
						<option value="BAM">BAM</option>
						<option value="BBD">BBD</option>
						<option value="BDT">BDT</option>
						<option value="BGN">BGN</option>
						<option value="BHD">BHD</option>
						<option value="BIF">BIF</option>
						<option value="BMD">BMD</option>
						<option value="BND">BND</option>
						<option value="BOB">BOB</option>
						<option value="BRL">BRL</option>
						<option value="BSD">BSD</option>
						<option value="BTN">BTN</option>
						<option value="BWP">BWP</option>
						<option value="BYR">BYR</option>
						<option value="BZD">BZD</option>
						<option value="CAD">CAD</option>
						<option value="CDF">CDF</option>
						<option value="CHF">CHF</option>
						<option value="CLP">CLP</option>
						<option value="CNY">CNY</option>
						<option value="COP">COP</option>
						<option value="CRC">CRC</option>
						<option value="CUP">CUP</option>
						<option value="CVE">CVE</option>
						<option value="CZK">CZK</option>
						<option value="DJF">DJF</option>
						<option value="DKK">DKK</option>
						<option value="DOP">DOP</option>
						<option value="DZD">DZD</option>
						<option value="EGP">EGP</option>
						<option value="ETB">ETB</option>
						<option value="EUR">EUR</option>
						<option value="FJD">FJD</option>
						<option value="FKP">FKP</option>
						<option value="GBP">GBP</option>
						<option value="GEL">GEL</option>
						<option value="GHS">GHS</option>
						<option value="GIP">GIP</option>
						<option value="GMD">GMD</option>
						<option value="GNF">GNF</option>
						<option value="GTQ">GTQ</option>
						<option value="GYD">GYD</option>
						<option value="HKD">HKD</option>
						<option value="HNL">HNL</option>
						<option value="HRK">HRK</option>
						<option value="HTG">HTG</option>
						<option value="HUF">HUF</option>
						<option value="IDR">IDR</option>
						<option value="ILS">ILS</option>
						<option value="INR">INR</option>
						<option value="IQD">IQD</option>
						<option value="IRR">IRR</option>
						<option value="ISK">ISK</option>
						<option value="JEP">JEP</option>
						<option value="JMD">JMD</option>
						<option value="JOD">JOD</option>
						<option value="JPY">JPY</option>
						<option value="KES">KES</option>
						<option value="KGS">KGS</option>
						<option value="KHR">KHR</option>
						<option value="KMF">KMF</option>
						<option value="KPW">KPW</option>
						<option value="KRW">KRW</option>
						<option value="KWD">KWD</option>
						<option value="KYD">KYD</option>
						<option value="KZT">KZT</option>
						<option value="LAK">LAK</option>
						<option value="LBP">LBP</option>
						<option value="LKR">LKR</option>
						<option value="LRD">LRD</option>
						<option value="LSL">LSL</option>
						<option value="LTL">LTL</option>
						<option value="LVL">LVL</option>
						<option value="LYD">LYD</option>
						<option value="MAD">MAD</option>
						<option value="MDL">MDL</option>
						<option value="MGA">MGA</option>
						<option value="MKD">MKD</option>
						<option value="MMK">MMK</option>
						<option value="MNT">MNT</option>
						<option value="MOP">MOP</option>
						<option value="MRO">MRO</option>
						<option value="MUR">MUR</option>
						<option value="MVR">MVR</option>
						<option value="MWK">MWK</option>
						<option value="MXN">MXN</option>
						<option value="MYR">MYR</option>
						<option value="MZN">MZN</option>
						<option value="NAD">NAD</option>
						<option value="NGN">NGN</option>
						<option value="NIO">NIO</option>
						<option value="NIO">NIO</option>
						<option value="NPR">NPR</option>
						<option value="NZD">NZD</option>
						<option value="OMR">OMR</option>
						<option value="PAB">PAB</option>
						<option value="PEN">PEN</option>
						<option value="PGK">PGK</option>
						<option value="PHP">PHP</option>
						<option value="PKR">PKR</option>
						<option value="PLN">PLN</option>
						<option value="PLN">PLN</option>
						<option value="QAR">QAR</option>
						<option value="RON">RON</option>
						<option value="RSD">RSD</option>
						<option value="RUB">RUB</option>
						<option value="RWF">RWF</option>
						<option value="SAR">SAR</option>
						<option value="SBD">SBD</option>
						<option value="SCR">SCR</option>
						<option value="SDG">SDG</option>
						<option value="SEK">SEK</option>
						<option value="SGD">SGD</option>
						<option value="SHP">SHP</option>
						<option value="SLL">SLL</option>
						<option value="SOS">SOS</option>
						<option value="SRD">SRD</option>
						<option value="STD">STD</option>
						<option value="SVC">SVC</option>
						<option value="SYP">SYP</option>
						<option value="SZL">SZL</option>
						<option value="THB">THB</option>
						<option value="TJS">TJS</option>
						<option value="TMT">TMT</option>
						<option value="TND">TND</option>
						<option value="TOP">TOP</option>
						<option value="TRY">TRY</option>
						<option value="TTD">TTD</option>
						<option value="TWD">TWD</option>
						<option value="UAH">UAH</option>
						<option value="UGX">UGX</option>
						<option value="USD">USD</option>
						<option value="UYU">UYU</option>
						<option value="UZS">UZS</option>
						<option value="VEF">VEF</option>
						<option value="VEF">VEF</option>
						<option value="VUV">VUV</option>
						<option value="WST">WST</option>
						<option value="XAF">XAF</option>
						<option value="XCD">XCD</option>
						<option value="XPF">XPF</option>
						<option value="YER">YER</option>
						<option value="ZAR">ZAR</option>
						<option value="ZMK">ZMK</option>
						<option value="ZWL">ZWL</option>
					  </select>
					</div>
					<div class="col-md-6">
					  <label for="permission">Message</label>
					  <textarea class="form-control" id="message" name="message">
					  </textarea>
					</div>
				</div>  
              </div>
              <!-- /.box-body -->
			<?php if(isset($permission[10]) && $permission[10]->update==1){?>  
			<div class="form-group" align="center">
                <button type="submit" class="btn btn-primary" style="margin-top: 23px;">Save</button>
			</div>  
			<?php } ?>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- col-md-12 -->
      </div>
      <!-- /.row -->
      

    </section>
      </div>
    </div>
  </div>
</div>
<!------delete modal--->
<div class="modal fades" id="deletepettypeModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content" style="background-color: #fff !important;">
    <div class="modal-header">
      <h5 class="modal-title" id="lineModalLabel">Are you sure want to delete?</h5>
	   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
      <form  id="deleteForm" method="post">
             <input type="hidden" name="delete_id" id="delete_id" value="">

            <div class="form-group"  align="center">
               <button type="button" id="delete" onclick="deletecategory()" class="btn btn-primary btn-sm">Yes</button>
              <button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal"  role="button">No</button>
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


 
   {!! Html::script('/assets/application/company.js') !!}

<script>
    var baseUrl= '<?php echo URL::to('/'); ?>';
    console.log(baseUrl);
	
</script>
<script type="text/javascript">
function isNumberKey(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode;
    if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
        return false;
    } else {
        return true;
    }      
}
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
	.error{
	  color:red !important;
  }
 

</style>
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			<h4 class="modal-title" style="float: left;">Add Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
            <div class="modal-body form">
                <form  id="categoryForm" class="form-horizontal">
                    <input type="hidden" value="" id="id" name="id"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3"></label>
                            <div class="col-md-9">
                                <input name="category" id="category" placeholder="Enter category" class="form-control" type="text" autocomplete="off">

                            </div>
                        </div>
                    <div class="form-group"  align="center">
                      <button type="submit" id="submit" class="btn btn-primary btn-sm">Submit</button>
                      <button type="button" class="btn  btn-sm btn-danger" data-dismiss="modal"  role="button">Close</button>
                    </div>	
                </div>
                </form>
            </div>
            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->