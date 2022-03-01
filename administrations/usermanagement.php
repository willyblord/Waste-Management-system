<?php
    session_start();
    if(isset($_SESSION['user'])){
    include("../connection_e_wasterManagement.php");
        $selectUser = $db->prepare("SELECT * FROM users WHERE role = 'Admin' OR role='user' AND id = '".$_SESSION['user']."' AND status = 'Active'");
        $selectUser->execute();
        if ($userFound = $selectUser->fetch()) {
            ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>User Management</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <?php include('ajax-registrations.php'); ?>
</head>
<?php
require 'brand_header.php';
?>
   
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                System User Managament
            </h3>
          </div>
          
          <div class="row">
            <div class="col-lg-9">
              <div class="card">
                <div class="card-body">
                <div class="alert alert-success successMessage" role="alert"  style="display: none; ">
                 User Registed Success
                </div>
                <div class="alert alert-danger errorMessage" role="alert"  style="display:none;">
                 Error
                </div>
                  <form class="cmxform" id="addUserForm" method="post">
                    <fieldset>
                      <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input name="name" id="name" class="form-control" type="text" onkeypress="isInputText(event)">
                      </div>
                      <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input name="lname" id="lname" class="form-control"  type="text" onkeypress="isInputText(event)">
                      </div>
                      <div class="form-group">
                        <label for="username">Username</label>
                        <input name="username" id="username" class="form-control" name="username" type="text" onkeypress="isInputText(event)">
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password_1" id="password" class="form-control" name="password" type="password">
                      </div>
                      <div class="form-group">
                        <label for="confirm_password">Confirm password</label>
                        <input name="password_2" id="password_2" class="form-control"  type="password">
                      </div>
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input name="email" id="email"  class="form-control" type="email">
                      </div>
                      
<input name="checkTermsAndConditions" id="exampleCheck" class="form-check-input" type="checkbox" checked style="display: none;">
                      <button class="btn btn-primary" name="registe" type="submit">Submit</button>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
            <?php
        require 'footer.php';
        ?>

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <script src="js/form-validation.js"></script>
  <script src="js/bt-maxLength.js"></script>
</body>
</html>
 <?php
        }
        else{
            header('location:../index.php');   
        }
    }
    else{
        header('location:../index.php');
    }
?>
<script>
    function isInputNumber(evt){
      var char = String.fromCharCode(evt.which);
      if (!(/[0-9]/.test(char))) {
        evt.preventDefault();
      }
    }

      function isInputText(evt){
      var char = String.fromCharCode(evt.which);
      if (!(/[A-z]/.test(char))) {
        evt.preventDefault();
      }
    }

  </script>
