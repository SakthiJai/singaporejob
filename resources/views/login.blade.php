<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>INVENTRY</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="assets/images/favicon.ico" />
      <link rel="stylesheet" href="assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="assets/css/backend.css?v=1.0.0">
      <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="assets/vendor/remixicon/fonts/remixicon.css">  </head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
	<!--- login --->
      <div class="wrapper">
      <section class="login-content">
         <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
               <div class="col-lg-8">
                  <div class="card auth-card">
                     <div class="card-body p-0">
                        <div class="d-flex align-items-center auth-content">
                           <div class="col-lg-7 align-self-center">
                              <div class="p-3">
                                 <h2 class="mb-2">login In</h2>
                                 <p>Login to stay connected.</p>

                                 <form action="./adminlogin" method="post">
									@csrf								 
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="form-group" style="margin-bottom:0rem;">
										   <label>Email</label>
                                             <input class="floating-input form-control" type="email" name="email_id" id="email_id"  maxlength="50" required placeholder="">
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                             <label>Password</label>
                                          <div class="form-group" style="margin-bottom:0rem;">
                                             <input class="floating-input form-control" type="password" name="password" id="password" required placeholder="">

                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="custom-control custom-checkbox mb-3">
                                             <input type="checkbox" class="custom-control-input" id="customCheck1">
                                             <label class="custom-control-label control-label-1" for="customCheck1">Remember Me</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">

                                          <a  href="register" class="text-primary float-right">Forgot Password?</a>

                                       </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign In</button>
                                    <p class="mt-3">
									   

                                       Create an Account <a  class="text-primary">Sign Up</a>
                                    </p>
                                 </form>
                              </div>
                           </div>
                           <div class="col-lg-5 content-right">
                              <img src="assets/images/login/01.png" class="img-fluid image-right" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      </div>

	  <!----loginend--->
	  
	  <!----signup--->
	  
	 <!--- <div class="wrapper">
      <section class="login-content">
         <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
               <div class="col-lg-8">
                  <div class="card auth-card">
                     <div class="card-body p-0">
                        <div class="d-flex align-items-center auth-content">
                           <div class="col-lg-7 align-self-center">
                              <div class="p-3">
                                 <h2 class="mb-2">Sign Up</h2>
                                 <p>Create your POSDash account.</p>
                                 <form id="signup"  class="signup">
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="text" placeholder=" ">
                                             <label>Full Name</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="text" placeholder=" ">
                                             <label>Last Name</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="email" placeholder=" ">
                                             <label>Email</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="text" placeholder=" ">
                                             <label>Phone No.</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="password" placeholder=" ">
                                             <label>Password</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-6">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="password" placeholder=" ">
                                             <label>Confirm Password</label>
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="custom-control custom-checkbox mb-3">
                                             <input type="checkbox" class="custom-control-input" id="customCheck1">
                                             <label class="custom-control-label" for="customCheck1">I agree with the terms of use</label>
                                          </div>
                                       </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sign Up</button>
                                    <p class="mt-3">
                                       Already have an Account <a href="{{ url('signup')}" class="text-primary">Sign In</a>
                                    </p>
                                 </form>
                              </div>
                           </div>
                           <div class="col-lg-5 content-right">
                              <img src="assets/images/login/01.png" class="img-fluid image-right" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      </div> --->
	  <!-----signup end---->

	  <!-- Jquery Validation-->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js" defer></script>
0
	  
    <!-- Backend Bundle JavaScript -->
    <script src="assets/js/backend-bundle.min.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="/assets/js/table-treeview.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="assets/js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script async src="/assets/js/chart-custom.js"></script>
    
    <!-- app JavaScript -->
    <script src="assets/js/app.js"></script>
	{!! Html::script('/assets/application/login.js') !!}
	
  </body>
</html>
 <<style>
.error{
	color:red;
}
</style>