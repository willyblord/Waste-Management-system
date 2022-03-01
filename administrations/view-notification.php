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
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>View Notifications</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />
</head>

<?php
require 'brand_header.php';
?>
                 <?php
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $result = $db->prepare("SELECT * FROM notification  WHERE id= :userid");
    $result->bindParam(':userid', $id);
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
?>
      <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Active Notification</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">10,200</h2>
                                       
                                    </div>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-chart-pie text-info icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Pending Notification</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        <h2 class="mb-0">2256</h2>
                                        
                                    </div>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-chart-pie text-info icon-lg"></i>                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <form action="responseEdit.php" method="post">
            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card text-center">                      
                        <div class="card-body">
                          <span style="float: right; background-color: red; padding: 6px; border-radius: 3px; color: #fff; font-weight: bolder;"><i>New</i></span>
                            <img src="images/images.jpg" class="img-lg rounded-circle mb-2" alt="profile image"/>
                            <h4><?php echo $row['name'];?></h4>
                            <p class="text-muted"><?php echo $row['sector'];?> <?php echo $row['cell'];?></p>
                            <p class="mt-4 card-text">
                                    <?php echo $row['message'];?>
                            </p>
                            <div class="border-top pt-3">
                                <div class="row">
                                    <div class="col-4">
                                        <p><button class="btn btn-info btn-sm mt-3 mb-4" type="submit" name="submit">Checked</button>
                                        </p>
                                    </div>
                                    <div class="col-4">
                                      <input type="hidden" name="namids" value="<?php echo $id ;?>">
                                      <select name="status">
                                        
                                        <option value="<?php echo $row['status'];?>" name="status"><?php echo $row['status'];?></option>
                                        <option value="Active" na>Active</option>
                                      </select>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </form>
            </div>
            <?php
          }
          ?>

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
