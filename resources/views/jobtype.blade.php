<!DOCTYPE html>
<html lang="en">
@include('layout.mainheader')

<body>
 <meta name="csrf-token" content="{{ csrf_token() }}" />
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('layout.topsidebar')
    <!-- partial -->
     <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close typcn typcn-times"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close typcn typcn-times"></i>
        <ul class="nav nav-tabs" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove typcn typcn-delete-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove typcn typcn-delete-outline"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove typcn typcn-delete-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove typcn typcn-delete-outline"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove typcn typcn-delete-outline"></i>
                </li>
              </ul>
            </div>
            <div class="events py-4 border-bottom px-3">
              <div class="wrapper d-flex mb-2">
                <i class="typcn typcn-media-record-outline text-primary mr-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page</p>
              <p class="text-gray mb-0">build a js based app</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="typcn typcn-media-record-outline text-primary mr-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
	  @include('layout.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
			<div class="row">
  <div class="col-lg-12 grid-margin">
    <div class="card">
	<div class="card-header d-flex justify-content-between"style="background-color: white; border-bottom: 0px solid #e4e4f4;">
                        <div class="header-title">
                            <h4 class="card-title"></h4>
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
	   
		<button type="button" class="btn btn-success" data-toggle="modal" style="margin-bottom: 0px;float:right; background-color: #32BDEA;
    border-color: #32BDEA; margin-top:-54px;" data-target=".bd-example-modal-lg" onclick="addPet()">Add Job</button><button class="btn btn-default" onclick="reload_table()"><i class="fa fa-refresh"></i></button>

         <span class="tools pull-right">
          <a href="javascript:;" class="fa fa-chevron-down" style="visibility: hidden !important;"></a>
          <a href="javascript:;" class="fa fa-times" style="visibility: hidden !important;"></a>
        </span>
      </header>
        
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="table-responsive pt-3">
                  <table class="table table-striped project-orders-table" id="joblist_table">
                    <thead>
                      <tr>
                        <th class="ml-5">ID</th>
                        <th>Job Tittle</th>
                        <th>Category</th>
                        <th>Sectors</th>
                        <th>Service Charge</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
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
			  <button type="button" id="delete" onclick="deletevendors()" class="btn btn-primary btn-md">Yes</button>
              <button type="button" class="btn  btn-md btn-danger" data-dismiss="modal"  onclick="closeform()" role="button">No</button>
            </div>
          
            </form>

    </div>
   
  </div>
  </div>
</div>
          <!-------Add modal---->
		  <div class="modal fade bd-example-modal-lg" id="modal_form" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" style="margin-top:8%;">
    <div class="modal-content">
	<div class="modal-header">
	<h5 class="">Add Job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
	   <form id="jobtype_form" style="padding: 4px 13px;">
	   {{ csrf_field() }}
					<div class="row">
					<input type="hidden" value="" id="id" name="id"/> 
						<div class="col-md-6 roles">
                            <label for="roles">Job Title</label>
                            <input type="text" name="job_title" class="form-control" id="job_title" placeholder="" autocomplete="off" maxlength="50">
                        </div>
						<div class="col-md-6">
						<div class="form-group">
						<label for="exampleSelectGender">Job Sectors</label>
                        <select class="form-control" id="job_sectors" name="job_sectors">
						 <option>Select</option>
                        </select>
                      </div>
					  </div>
                    </div>
					<div class="row">
					<div class="col-md-6">
						<div class="form-group">
                      <label for="exampleSelectGender">Job Category</label>
                        <select class="form-control" id="job_Category" name="job_Category">
						 <option value="">Select</option>
                        </select>
                      </div>
					  </div>
				  <div class="col-md-6">
					<div class="form-group">
                      <label for="exampleSelectGender">Sub Category</label>
                        <select class="form-control" id="sub_Category" name="sub_Category">
						 <option value="">Select</option>
                        </select>
                      </div>
					  </div>
					</div>
					<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
                      <label for="exampleSelectGender">Job Experience</label>
                        <select class="form-control" id="job_experience" name="job_experience">
						 <option value="">Select</option>
                        </select>
                      </div>
					 
					</div>
					<div class="col-md-4 roles">
                            <label for="roles">Service Charge per Day</label>
                            <input type="text" name="service_charge" class="form-control" id="service_charge" placeholder="" autocomplete="off" maxlength="50">
                        </div>
					<div class="col-md-4 roles">
                            <label for="required_skills">Required Skills Set </label>
                            <input type="text" name="required_skills" class="form-control" id="required_skills" placeholder="" autocomplete="off" maxlength="50">
                        </div>
					</div>
					<div class="row">
					
						<div class="col-md-12 roles">
                            <label for="description">Description</label>
							 <textarea id="description" name="description_id" class="form-control" rows="4" cols="50"></textarea>
                        </div>
					</div>
					 <div class="form-group"  align="center" style="margin-top:14px;">
                      <button type="submit" id="submit" class="btn btn-primary btn-md" style="background-color: #21bf06;
    border-color: #21bf06;">Save</button>
                      <button type="button" class="btn  btn-md btn-danger" data-dismiss="modal" onclick="closeform()" role="button" onclick="formreload()">Close</button>
                    </div>
					</form>
					
    </div>
  </div>
</div>

         </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('layout.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" defer></script>

  <!-- base:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/template.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="assets/js/dashboard.js"></script>
   <script src="assets/application/jobtype.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
<script type="text/javascript">
$( document ).ready(function() {
   CKEDITOR.replace('description_id');
});
</script>
<style type="text/css">
.error{
	color:red;
}
</style>