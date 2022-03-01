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
  <title>All Populations E waste management</title>
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
                All Population
            </h3>
          </div>
          
            <div class="row">
      
            <div class="card">
            <div class="card-body">
              <h4 class="card-title"> All Populations</h4>
              <!-- modal data -->
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                                     <?php
                    $selectAllUsers = $db->prepare("SELECT * FROM population");
                    $selectAllUsers->execute();
                    if ($allEmployeeFound = $selectAllUsers->fetch()) {
                        ?>          
                      <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Country</th>
                            <th>National_id </th>
                            <th>Phone</th>
                            <th>Province</th>
                            <th>District</th>
                            <th>Cells</th>
                            <th>Akagari</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                        <?php
                                    do{
                                        ?>
                      <tbody>
                        
                        <tr>
                           <td>&copy;</td>
                            <td><?php echo $allEmployeeFound['firstname'];?></td>
                            <td><?php echo $allEmployeeFound['lastname'];?></td>
                            <td><?php echo $allEmployeeFound['country'];?></td>
                            <td><?php echo $allEmployeeFound['national_id'];?></td>
                            <td><?php echo $allEmployeeFound['phone'];?></td>
                            <td><?php echo $allEmployeeFound['province'];?></td>
                            <td><?php echo $allEmployeeFound['district'];?></td>
                            <td><?php echo $allEmployeeFound['cells'];?></td>
                            <td><?php echo $allEmployeeFound['akagari'];?></td>
                            <td><button>Delete</button> <button>Edit</button></td>
                        </tr>

                                            <?php
                                    }while($allEmployeeFound = $selectAllUsers->fetch());
                                ?>
                            </table>
                        <?php
                    }
                    else{
                        ?>
                            <div class="alert alert-danger-lg"> No new Population found.</div>
                        <?php
                    }
                    ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
  <script src="js/data-table.js"></script>

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
