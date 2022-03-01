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
  <title>E-waste managment system</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="css/style.css">
</head>
    
<?php
require 'brand_header.php';
?>

      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
              Collection Point
            </h3>
          </div>


          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex justify-content-between align-items-center">

                             <a href="all-point.php" style="text-decoration: none; color: #262626;">
                    <div class="d-flex align-items-center mb-3 mb-md-0">
                      <button class="btn btn-social-icon btn-facebook btn-rounded">
                        <i class="fa fa-street-view"></i>
                      </button>
                      <div class="ml-4">
                        <h5 class="mb-0">All Point</h5>
                        <p class="mb-0"> Collection Point</p>
                      </div>
                    </div>
                    </a>

                    <a href="muhozacorrection.php" style="text-decoration: none; color: #262626;">
                    <div class="d-flex align-items-center mb-3 mb-md-0">
                      <button class="btn btn-social-icon btn-facebook btn-rounded">
                        <i class="fa fa-street-view"></i>
                      </button>
                      <div class="ml-4">
                        <h5 class="mb-0">Muhoza Sector</h5>
                        <p class="mb-0"> Collection Point</p>
                      </div>
                    </div>
                    </a>
                    <a href="cyuvecorrection.php" style="text-decoration: none; color: #262626;">
                      <div class="d-flex align-items-center mb-3 mb-md-0">
                      <button class="btn btn-social-icon btn-facebook btn-rounded">
                        <i class="fa fa-street-view"></i>
                      </button>
                      <div class="ml-4">
                        <h5 class="mb-0">Cyuve Sector</h5>
                        <p class="mb-0"> Collection Point</p>
                      </div>
                    </div>
                    </a>
                    <a href="musanzecollection.php" style="text-decoration: none; color: #262626;">
                    <div class="d-flex align-items-center mb-3 mb-md-0">
                      <button class="btn btn-social-icon btn-facebook btn-rounded">
                        <i class="fa fa-street-view"></i>
                      </button>
                      <div class="ml-4">
                        <h5 class="mb-0">Musanze Sector</h5>
                        <p class="mb-0"> Collection Point</p>
                      </div>
                    </div>
                    </a>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
        require 'footer.php';
        ?>
        
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <script src="vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/misc.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <!-- End custom js for this page-->
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
