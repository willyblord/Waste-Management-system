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
  <title>Employee Management</title>
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
                Edit Employee Managament
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
                 <?php
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $result = $db->prepare("SELECT * FROM employee  WHERE id= :userid");
    $result->bindParam(':userid', $id);
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
?>
                  <form class="cmxform" action="employee-edit-quely.php" method="post">
                    <fieldset>
                      <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input name="firstname" id="name" value="<?php echo $row['firstname'];?>" class="form-control" type="text" onkeypress="isInputText(event)">
                      </div>
                      <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input name="lastname" id="lname" value="<?php echo $row['lastname'];?>"class="form-control"  type="text" onkeypress="isInputText(event)">
                      </div>
                      <div class="form-group">
                        <label for="username">Address</label>
                        <input name="address" id="address" value="<?php echo $row['address'];?>" class="form-control" name="address" type="text">
                      </div>
                      <div class="form-group">
                        <label for="password">Phone</label>
                        <input name="telephone" id="phone" value="<?php echo $row['telephone'];?>" class="form-control" name="phone" type="text" maxlength="10" onkeypress="isInputNumber(event)" minlength="10">
                      </div>
                      <div class="form-group">
                        <label for="password">National id</label>
                        <input name="nid" id="phone" value="<?php echo $row['nid'];?>" class="form-control" name="phone" type="text" maxlength="16" onkeypress="isInputNumber(event)" minlength="16">
                      </div>

                      <div class="form-group">
                        <label for="password">Change Role</label>
                        <select class="form-control" name="role">
                          <option value="<?php echo $row['role'];?>"> <?php echo $row['role'];?></option>
                          <option> Reader</option>
                          <option> Corrector</option>
                        </select>
                      </div>

<input type="radio" id="male" name="gender" value="<?php echo $row['gender'];?>" checked>
<label for="male"><?php echo $row['gender'];?></label><br>
<input type="radio" id="female" name="gender" value="Male">
<label for="female">Male</label><br>
<input type="radio" id="other" name="gender" value="Female">
<label for="other">Female</label> 
                    

                      <input type="hidden" name="namids" value="<?php echo $id ;?>">
                      <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                    </fieldset>
                  </form>
                  <?php
                  }

                    ?>
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
