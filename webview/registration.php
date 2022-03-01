<!doctype html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>2corner | registration forms</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="ArchitectUI HTML Bootstrap 4 Dashboard Template">

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <?php include("js.php"); ?>

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">


    <link href="main.css" rel="stylesheet">
</head>
<link rel="stylesheet" type="text/css" href="">

<body>
<div class="app-container app-theme-white body-tabs-shadow">
        <div class="app-container">
            <div class="h-100">
                <div class="h-100 no-gutters row">
                    <div class="h-100 d-md-flex d-sm-block bg-white justify-content-center align-items-center col-md-12 col-lg-7">

                        <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                            <div class="app-logo"></div>
                            <h4>
                                <div>Welcome,</div>
                                <span>It only takes a <span class="text-success">few seconds</span> to create your account</span></h4>
                            <div>


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
            <input name="name" id="name"  placeholder="Name here..." type="text" class="form-control" required></div>
                        <div class="errorTxt1"></div>           

                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group">
            <label for="exampleName" class="" data-validate = "Last Name">Last Name:</label>
                <input name="lname" id="lname" placeholder="Last Name" type="text" class="form-control" required></div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="examplePassword" class=""><span class="text-danger">*</span>Email:</label>
                        <input name="email" id="email" placeholder="Inter Email--" type="email" class="form-control"  data-error=".errorTxt3" required> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="examplePasswordRep" class=""><span class="text-danger">*</span>User Name</label>
                        <input name="username" id="username" placeholder="Username" type="text" class="form-control"  data-error=".errorTxt4" required></div>
                                        </div>

                                            <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="examplePasswordRep" class=""><span class="text-danger">*</span>Password</label>
                        <input name="password_1" id="password" placeholder="password" type="password" class="form-control"  data-error=".errorTxt4" maxlength="12" required></div>
                                        </div>

                                            <div class="col-md-6">
                                            <div class="position-relative form-group"><label for="examplePasswordRep" class=""><span class="text-danger">*</span>Confirm password</label>
                        <input name="password_2" id="password_2" placeholder="Lytype Password" type="password" class="form-control"  data-error=".errorTxt4" maxlength="12" required></div>
                                        </div>
                                    </div>
                                    <div class="mt-3 position-relative form-check">
                                        <input name="checkTermsAndConditions" id="exampleCheck" type="checkbox" class="form-check-input">

                                        <label for="exampleCheck" class="form-check-label">Accept our Terms and Conditions</a>.</label></div>
                                    <div class="mt-4 d-flex align-items-center"><h5 class="mb-0">Already have an account? <a href="index.php" class="text-primary">Sign in</a></h5>
                                        <div class="ml-auto">

                                            <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-prima ry btn-lg" name="registe" type="submit" > Create Account </button>

<!--                                             <input type="submit" class="btn-wide" name="registerUser" id="registerButton" value="Register now">
 -->                                            
                                        </div>

                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="d-lg-flex d-xs-none col-lg-5">
                        <div class="slider-light">
                            <div class="slick-slider slick-initialized">
                                <div>
                                    <div class="position-relative h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                        <div class="slide-img-bg" style="background-image: url('assets/images/illo-tal-1-h1.png');"></div>
                                        <div class="slider-content"><h3>Welcom 2 Corner Tech</h3>
                                            <p>Easily exclude the components you don't require. Lightweight, consistent Bootstrap based styles across all elements and components</p></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

</body>
</html>