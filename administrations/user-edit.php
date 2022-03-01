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
                Edut User Managament
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
    $result = $db->prepare("SELECT * FROM users  WHERE id= :userid");
    $result->bindParam(':userid', $id);
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
?>
                  <form class="cmxform" action="user-edit-quely.php" method="post">
                    <fieldset>
                      <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input name="first_name" id="name" value="<?php echo $row['first_name'];?>" class="form-control" type="text">
                      </div>
                      <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input name="last_name" id="lname" value="<?php echo $row['last_name'];?>"class="form-control"  type="text">
                      </div>
                      <div class="form-group">
                        <label for="username">Address</label>
                        <input name="address" id="address" value="<?php echo $row['address'];?>" class="form-control" type="text">
                      </div>
                      <div class="form-group">
                        <label for="password">Phone</label>
                        <input name="phone" id="phone" value="<?php echo $row['phone'];?>" class="form-control" type="text">
                      </div>
                      <div class="form-group">
                        <label for="password">Email</label>
                        <input name="email"  value="<?php echo $row['email'];?>" class="form-control"  type="email">
                      </div>
                      <div class="form-group">
                        <label>Status</label>
                            <select class="form-control" name="status">
                            <option value="Active" <?php echo $row["status"]; ?> ><?php echo $row["status"]; ?></option>
                            <option value="Active" <?php echo $row["status"]; ?>  >Active</option>
                            <option value="Deleted" <?php echo $row["status"]; ?> >Deleted</option>
                        </select>
                        
                      </div>
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
