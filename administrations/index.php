<?php
    session_start();
    if(isset($_SESSION['user'])){
    include("../connection_e_wasterManagement.php");
        $selectUser = $db->prepare("SELECT * FROM users WHERE  role='Admin' AND id = '".$_SESSION['user']."'");
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
              Welcome <?php echo $userFound["first_name"]; ?> | <?php echo $userFound['role'];?>
            </h3>
          </div>
          <div class="row grid-margin">
            <div class="col-12">
              <div class="card card-statistics">
                <div class="card-body" style="background-color: #4b534f;">
                  <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fa fa-user mr-2"></i>
                          User
                        </p>
                        <h2><?php
                                require '../connection_e_wasterManagement.php';
                                 $stmt = $db->prepare("SELECT count(id) FROM users WHERE status='Active'");
                                 $stmt->execute();
                                 $count = $stmt->fetchColumn();
                                 ?><?php echo $count;?></h2>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                          Waste Corrector
                        </p>
                        <h2><?php
                                require '../connection_e_wasterManagement.php';
                                 $stmt = $db->prepare("SELECT count(id) FROM employee");
                                 $stmt->execute();
                                 $count = $stmt->fetchColumn();
                                 ?><?php echo $count;?></h2>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                          Notifications
                        </p>
                        <h2><?php
                                require '../connection_e_wasterManagement.php';
                                 $stmt = $db->prepare("SELECT count(id) FROM Notification WHERE status='Active'");
                                 $stmt->execute();
                                 $count = $stmt->fetchColumn();
                                 ?><?php echo $count;?></h2>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-check-circle mr-2"></i>
                          Pending Notications
                        </p>
                        <h2><?php
                                require '../connection_e_wasterManagement.php';
                                 $stmt = $db->prepare("SELECT count(id) FROM users WHERE status='Pending'");
                                 $stmt->execute();
                                 $count = $stmt->fetchColumn();
                                 ?><?php echo $count;?></h2>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-chart-line mr-2"></i>
                          Waste Range
                        </p>
                        <h2><?php
                                require '../connection_e_wasterManagement.php';
                                 $stmt = $db->prepare("SELECT count(id) FROM waste_range");
                                 $stmt->execute();
                                 $count = $stmt->fetchColumn();
                                 ?><?php echo $count;?></h2>
                      </div>
                      <div class="statistics-item">
                        <p>
                          <i class="icon-sm fas fa-circle-notch mr-2"></i>
                          Pending User
                        </p>
                        <h2><?php
                                require '../connection_e_wasterManagement.php';
                                 $stmt = $db->prepare("SELECT count(id) FROM users WHERE status='Pending'");
                                 $stmt->execute();
                                 $count = $stmt->fetchColumn();
                                 ?><?php echo $count;?></h2>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <i class="fas fa-envelope"></i>
                    Musanze City Map
                  </h4>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d255261.7653258585!2d29.467567260719917!3d-1.492314291545261!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dc51ee436c4117%3A0x9ef88b100d8e5834!2sMusanze!5e0!3m2!1sen!2srw!4v1616146475193!5m2!1sen!2srw"  style="width: 1000px; height: 400px; border-color: red;"></iframe>
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
