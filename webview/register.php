<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta charset="utf-8">
  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- fontawesome -->
  <link rel="stylesheet" href="plugins/fontawesome/font-awesome.min.css">
  <!-- animation css -->
  <link rel="stylesheet" href="plugins/animate/animate.css">
  <!-- aos -->
  <link rel="stylesheet" href="plugins/aos/aos.css">
  <!-- venobox popup -->
  <link rel="stylesheet" href="plugins/venobox/venobox.css">
  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
      <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

  <?php include("js.php"); ?>

</head>

<body>
  <!-- preloader start -->
  <div class="preloader">
    <div class="spin"></div>
  </div>
  <!-- preloader end -->

<!-- header -->
<header>

  <!-- navigation -->
  <div class="navigation bg-white position-relative">
    <div class="container">
      <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="#"><img class="img-fluid pb-lg-3" src="images/logo.png" alt="Bexar"></a>

       
      </nav>
    </div>
  </div>
  <!-- /navigation -->
</header>
<!-- /header -->

<div style="padding: 20px;"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-7">

        <center><h3 class="section-title"> Legister </h3></center>
               <form class="col s12" id="addUserForm" method="post">
                <?php //echo display_error(); ?>

                <div class="alert alert-success successMessage" role="alert"  style="display:none; ">
                 Success
                </div>
               
                <div class="alert alert-danger errorMessage" role="alert"  style="display:none;">
                 Error
                </div>


                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="exampleEmail" class=""><span class="text-danger">*</span>First Name:</label>
            <input name="name" id="name"  placeholder="Name here..." type="text" class="form-control border-0 rounded-0 box-shadow mb-4" required></div>
                        <div class="errorTxt1"></div>           

                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
            <label for="exampleName" class="" data-validate = "Last Name">Last Name:</label>
                <input name="lname" id="lname" placeholder="Last Name" type="text" class="form-control border-0 rounded-0 box-shadow mb-4" required></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="examplePassword" class=""><span class="text-danger">*</span>Email:</label>
                        <input name="email" id="email" placeholder="Inter Email--" type="email" class="form-control border-0 rounded-0 box-shadow mb-4"  data-error=".errorTxt3" required> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="examplePasswordRep" class=""><span class="text-danger">*</span>User Name</label>
                        <input name="username" id="username" placeholder="Username" type="text" class="form-control border-0 rounded-0 box-shadow mb-4"  data-error=".errorTxt4" required></div>
                                        </div>

                                            <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="examplePasswordRep" class=""><span class="text-danger">*</span>Password</label>
                        <input name="password_1" id="password" placeholder="password" type="password" class="form-control border-0 rounded-0 box-shadow mb-4"  data-error=".errorTxt4" maxlength="12" required></div>
                                        </div>

                                            <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="examplePasswordRep" class=""><span class="text-danger">*</span>Confirm password</label>
                        <input name="password_2" id="password_2" placeholder="Lytype Password" type="password" class="form-control border-0 rounded-0 box-shadow mb-4"  data-error=".errorTxt4" maxlength="12" required></div>
                                        </div>
                                    </div>
                                    <div class="mt-3 position-relative form-check">
                                        <input name="checkTermsAndConditions" id="exampleCheck" type="checkbox"> 
                                    </div>
                                                  <div class="col-12">
                                            <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary" name="registerUser" id="registerButton"type="submit" > Register </button>
            No Account <a href="index.html">Login</a>
          </div>
                          

                                </form>
      
    </div>
  </div>
</div>
</div>
</section>

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- aos -->
<script src="plugins/aos/aos.js"></script>
<!-- venobox popup -->
<script src="plugins/venobox/venobox.min.js"></script>
<!-- Modernizer -->
<script src="plugins/modernizer/modernizr.min.js"></script>
<!-- filter -->
<script src="plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- Main Script -->
<script src="js/script.js"></script>

</body>
</html>