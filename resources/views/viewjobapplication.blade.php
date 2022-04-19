<!DOCTYPE html>
<html lang="en">
@include('layout.mainheader')
<link rel="stylesheet" href="	https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<body>
<?php 
$job	= explode("/",$_SERVER['REQUEST_URI']);
?>
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
                <div class="profile"><img src="<?php echo URL::to('');?>/assets/images/faces/face1.jpg" alt=""><span class="online"></span></div>
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
      <div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <div class="card p-3 py-4">
			<div class="text-center" id="edit">
			<button type="button" class="btn btn-success" data-toggle="modal" style="float:right; background-color:blue;border-color:blue;" onclick="backform()" data-target=".bd-example-modal-lg">Back</button>
	</div>
                <div class="text-center"> <img src="<?php echo URL::to('');?>/assets/images/man.jpg" width="200" id="images"> </div>
				<h5 class="text-center" id="first_name"><span></span></h5> 
				<div class="row">
                <div class="col-md-3">
                    <div class="card cssanimation2 fadeInBottom2"> 
                            <div class="card-body">
                                <div class="row" id="blockitems">
                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"> <img src="<?php echo URL::to('');?>/assets/images/pngtree.png" style="width:60px;margin-left:-9px;margin-bottom:-65px; margin-left:-19px;"></div>
									
                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="facebook_link">
                                        <h6 style="margin-left:45px;">Facebook</h6>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
						</div>
						
						<div class="col-md-3">
                    <div class="card cssanimation2 fadeInBottom2"> 
                            <div class="card-body">
                                <div class="row" id="blockitems">
                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"> <img src="<?php echo URL::to('');?>/assets/images/demo.png" style="width:60px;margin-left:-19px;margin-bottom:-65px;"></div>
									
                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="instagram_link">
                                        <h6 style="margin-left:45px;">Instagram</h6>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
						</div>
						<div class="col-md-3">
                    <div class="card cssanimation2 fadeInBottom2"> 
                            <div class="card-body">
                                <div class="row" id="blockitems">
                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"> <img src="<?php echo URL::to('');?>/assets/images/twitter.png" style="width:60px;margin-left:-19px; margin-bottom:-65px;"></div>
									
                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="twitter_link">
                                        <h6 style="margin-left:45px;">Twitter</h6>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
						</div>
						<div class="col-md-3">
                    <div class="card cssanimation2 fadeInBottom2"> 
                            <div class="card-body">
                                <div class="row" id="blockitems">
                                    <div class="col-sm-3 col-md-1 col-lg-1 col-xl-1" id="icons_section"> <img src="<?php echo URL::to('');?>/assets/images/cloud.png" style="width:60px;margin-left:-19px; margin-bottom:-65px;"></div>
									
                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="resume_link">
                                        <h6 style="margin-left:45px;">Resume</h6>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
						</div>
				</div>
				<div class="row">
				<h5 class="work" style="margin-top:16px;">Work Experience </h5>
				</div>
				<div class="row">
				<span class="compleate" style="color:gray;">Recognize the subjected compleate your education and training</span>
				</div>
				<div class="col-md-12">
                    <div class="card cssanimation2 fadeInBottom2"> 
                            <div class="card-body">	
							<div class="row">
                                    <div class="col-sm-4 id="heading_section">
                                        <button class="btn btn-success btn-fw"  style="background-color:white;border-color:gray;"><img src="<?php echo URL::to('');?>/assets/images/google.png" style="width:34px;margin-left:-9px;"></button><span style="margin-left:13px;">Product designer</span>
                                    </div>
								<div class="col-sm-4" id="heading_section">
								<span style="color:gray;">Date</span>
									<div class="row">
                                 <span>02/16-Today</span>
                             </div>								 
                                    </div>
									</div>
                               
                            </div>
                        </div>
						</div>
						
				<div class="row" style="margin-top:12px;">
				<div class="col-md-12">
                    <div class="card cssanimation2 fadeInBottom2"> 
                            <div class="card-body">	
							<div class="row">
                                    <div class="col-sm-4 id="heading_section">
                                        <button class="btn btn-success btn-fw"  style="background-color:white;border-color:gray;"><img src="<?php echo URL::to('');?>/assets/images/facebook.jpg" style="width:37px;margin-left:-6px;"></button><span style="margin-left:13px;">Product designer</span>
                                    </div>
								<div class="col-sm-4" id="heading_section">
								<span style="color:gray;">Date</span>
									<div class="row">
                                 <span>02/16-Today</span>
                             </div>								 
                                    </div>
									
									</div>
                               
                            </div>
                        </div>
						</div>
				</div>
				<div class="row" style="margin-top:12px;">
				<div class="col-md-12">
                    <div class="card cssanimation2 fadeInBottom2"> 
                            <div class="card-body">	
							<div class="row">
                                    <div class="col-sm-4 id="heading_section">
                                        <button class="btn btn-success btn-fw"  style="background-color:white;border-color:gray;"><img src="<?php echo URL::to('');?>/assets/images/demo.png" style="width:37px;margin-left:-6px;"></button><span style="margin-left:13px;">Product designer</span>
                                    </div>
								<div class="col-sm-4" id="heading_section">
								<span style="color:gray;">Date</span>
									<div class="row">
                                 <span>02/16-Today</span>
                             </div>								 
                                    </div>
									</div>
                               
                            </div>
                        </div>
						</div>
				</div>
				
				<div class="row">
				<h5 class="work" style="margin-top:16px;">Education</h5>
				</div>
				<div class="row">
				<span class="compleate" style="color:gray;">Recognize the subjected compleate your education and training</span>
				</div>
				<div class="col-md-12">
                    <div class="card cssanimation2 fadeInBottom2"> 
                            <div class="card-body">	
							<div class="row">
                                    <div class="col-sm-4 id="heading_section">
                                        <button class="btn btn-success btn-fw"  style="background-color:white;border-color:gray;"><img src="<?php echo URL::to('');?>/assets/images/graduation-hat.png" style="width:34px;margin-left:-9px;"></button><span style="margin-left:13px;">Masters</span>
                                    </div>
								<div class="col-sm-4" id="heading_section">
								<span style="color:gray;">Date</span>
									<div class="row">
                                 <span>02/16-Today</span>
                             </div>								 
                                    </div>
									</div>
                               
                            </div>
                        </div>
						</div>
				
				
				
				
				
				
				<div class="row">
				<div class="col-md-6">
                    <div class="card cssanimation2 fadeInBottom2" style="margin-top:36px;"> 
                            <div class="card-body" style="background-color: #f3efef85;	">
                                <div class="row" id="blockitems">
                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                        <h6>Skill/Knowledge</h6>
                                        <p style="color:gray;">Recongnize the subject and complete your education and training</p>
                                    </div>
									
									<div class="row">
									 <div class="col-sm-4">
						
			  <label for="apply"><input type="file" name="" id="apply" accept="image/*,.pdf"><span>Resources</span> <i class="fa fa-remove" style="color:gray;margin-left:12px;"></i></label>
			
				  </div>
				     <div class="col-sm-4">
			 
			  <label for="apply"><input type="file" name="" id="apply" accept="image/*,.pdf"><span>Interfaces</span> <i class="fa fa-remove" style="color:gray;margin-left:12px;"></i></label>
				</div>
						   
						<div class="col-sm-4">
			  <label for="apply"><input type="file" name="" id="apply" accept="image/*,.pdf"><span>Markting</span> <i class="fa fa-remove" style="color:gray;margin-left:12px;"></i></label>
				</div>
					
						    </div>
                                </div>
                            </div>
                        </div>
						</div>
						
						<div class="col-md-6">
                    <div class="card cssanimation2 fadeInBottom2" style="margin-top:36px;"> 
                            <div class="card-body" style="background-color: #f3efef85;	">
                                <div class="row" id="blockitems">
                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                        <h6>Skill/Knowledge</h6>
                                        <p style="color:gray;">Recongnize the subject and complete your education and training</p>
                                    </div>
									
									<div class="row">
									 <div class="col-sm-4">
						<div class="col-sm-4">
			  <label for="apply"><input type="file" name="" id="apply" accept="image/*,.pdf"><span>Export A1</span> <i class="fa fa-remove" style="color:gray;margin-left:12px;"></i></label>
				</div>
				  </div>
				     <div class="col-sm-4" style="">
			  <label for="apply"><input type="file" name="" id="apply" accept="image/*,.pdf"><span>Export A1</span> <i class="fa fa-remove" style="color:gray;margin-left:12px;"></i></label>
				</div>
						    </div>
									     
									
                                </div>
                            </div>
                        </div>
						</div>
						
				</div>
				<div class="row">
				<div class="col-md-6">
                    <div class="card cssanimation2 fadeInBottom2" style="margin-top:36px;"> 
                            <div class="card-body">
                                <div class="row" id="blockitems">
                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                        <h6> Singapora Driving Licence</h6>
                                        <p style="color:gray;">Recongnize the subject and complete your education and training</p>
                                    </div>
									<div class="row">
									<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="row" style="padding: 10px;">
                <div class="col-md-4">
                  <div class="demo1" id="test">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="fa fa-bus"></i></div>
                      </div>
                </div>
				<div class="col-md-4">
                  <div class="demo1" id="test">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="margin-left:82px;"><i class="fa fa-car"></i></div>
                      </div>
                </div>
				<div class="col-md-4">
                  <div class="demo1" id="test">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="margin-left:162px;"> <i class="fa fa-plane"></i></div>
                      </div>
                </div>
				
            </div>
        </div>
		
									</div>
                                </div>
                            </div>
                        </div>
						</div>
						
						<div class="col-md-6">
                    <div class="card cssanimation2 fadeInBottom2" style="margin-top:36px;"> 
                            <div class="card-body">
                                <div class="row" id="blockitems">
                                    <div class="col-sm-8 col-md-9 col-lg-11 col-xl-11" id="heading_section">
                                        <h6> Singapora Driving Licence</h6>
                                        <p style="color:gray;">Recongnize the subject and complete your education and training</p>
                                    </div>
									<div class="row">
									<div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
            <div class="row" style="padding: 10px;">
                <div class="col-md-4">
                  <div class="demo1" id="test">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="fa fa-file-text-o" style="color:blue;"></i></div>
                      </div>
                </div>
				<div class="col-md-4">
                  <div class="demo1" id="test">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="margin-left:82px;">  <i class="fa fa-file-pdf-o" style="color:red;"></i></div>
                      </div>
                </div>
				<div class="col-md-4">
                  <div class="demo1" id="test">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="margin-left:162px;"> <i class="fa fa-file-o"></i></div>
                      </div>
                </div>
				
            </div>
        </div>
									</div>
                                </div>
                            </div>
                        </div>
						</div>
				
				</div>
						
            </div>
			 
        </div>
		 
    </div>
	 
	
	 
       
</div>
  <!-- container-scroller -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- base:js -->
  <script>
  var baseUrl = '<?php echo URL::to('');?>';
  getviewJobList();
function getviewJobList()
{
	var id = '<?php echo $job[3];?>';
	$.ajax({
        url:baseUrl+"/getviewJobList",
        type: "GET",
        data:{id:id,_token: $('meta[name="_token"]').attr('content')},
		dataType: "JSON",
		cache: false,
		  headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data)
        {
             console.log(data);
		  var details =  JSON.parse(JSON.stringify(data));
         details.forEach(function(element) {
			$('#first_name').append('<span>'+element.name+'</span>'); 
			$('#facebook_link').append('<p style="margin-left:45px; color:blue">'+element.facebook+'</p>');
			$('#instagram_link').append('<p style="margin-left:45px; color:blue">'+element.instagram+'</p>');
			$('#twitter_link').append('<p style="margin-left:45px; color:blue">'+element.twitter+'</p>');
			$('#resume_link').append('<a href="'+element.resume+'" style="margin-left:45px;">Resume</a>');
			 if(element.images)
            {
                if(element.images.indexOf('public')!=-1){ 
						$('#images').attr('src',element.images)
                }
                 else{
                    $('#images').attr('src',element.images)
                 }
               
            }
        });
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
		
}
function backform(){
	window.location.href=baseUrl+"/jobapplication";
}
  </script>
  
  <script src="<?php echo URL::to('');?>/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="<?php echo URL::to('');?>/assets/vendors/chart.js/Chart.min.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?php echo URL::to('');?>/assets/js/off-canvas.js"></script>
  <script src="<?php echo URL::to('');?>/assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo URL::to('');?>/assets/js/template.js"></script>
  <script src="<?php echo URL::to('');?>/assets/js/settings.js"></script>
  <script src="<?php echo URL::to('');?>/assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo URL::to('');?>/assets/js/dashboard.js"></script>
  <script src="<?php echo URL::to('');?>/assets/application/viewjobapplication.js"></script>
  <!-- End custom js for this page-->
 
</body>

</html>
<style type="text/css">
.error{
	color:red;
}

body {
    background: #eee
		display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
	width: 100vw;
	
	background-color: black;
}
label {
	display: block;
	width: 60vw;
	max-width: 172px;
	margin: 0 auto;
	background-color:white;
	border-radius: 73px;
	font-size: 1em;
	line-height: 2.5em;
	text-align: center;
	margin-top:12px;
}





input {
	border: 0;
    clip: rect(1px, 1px, 1px, 1px);
    height: 1px; 
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
}

.card {
    border: none;
    position: relative;
    overflow: hidden;
    border-radius: 8px;
    cursor: pointer
}

.card:before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    width: 4px;
    height: 100%;
    
    transform: scaleY(1);
    transition: all 0.5s;
    transform-origin: bottom
}
.card-icon{
	background: #f6f6fe;
    font-size: 32px;
    line-height: 0;
    width: 64px;
    height: 64px;
    flex-shrink: 0;
    flex-grow: 0;
    border-radius: 86%!important;
}


</style>

