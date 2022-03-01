<?php
    session_start();
    if(isset($_SESSION['user'])){
    include("../connection_e_wasterManagement.php");
        $selectUser = $db->prepare("SELECT * FROM users WHERE role = 'Admin' OR role='user' AND id = '".$_SESSION['user']."' AND status = 'Active'");
        $selectUser->execute();
        if ($userFound = $selectUser->fetch()) {
            ?>
<?php
include("../connection_e_wasterManagement.php");
  if (isset($_POST['submit'])) {
    $firstname = $_POST['search'];

    $sql = 'SELECT * FROM employee WHERE firstname = :firstname';
    $stmt = $db->prepare($sql);
    $stmt->execute(['firstname' => $firstname]);
    $row = $stmt->fetch();
  } else {
    header('location: .');
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>All User Management</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
   <script src="assets/fontawesome/js/all.min.js"></script>
     <script src="assets/js/jquery-3.5.1.min.js"></script>
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
     <script  src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" ></script>
     <script >
         $(document).ready(function() {
    $('#example').DataTable();
} );
     </script>

  <!-- Template Main CSS File -->

  <?php include('ajax-registrations.php'); ?>
</head>
<?php
require 'brand_header.php';
?>
   
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
               <?php echo $row['firstname'];?> Details</span>
            </h3>
          </div>
          
            <div class="row">
            <div class="card">
            <div class="card-body">


              <!-- modal data -->
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    
                               <table id="example" class="table table-striped table-bordered" style="width:100%">
                                          <?php
                    $selectAllUsers = $db->prepare("SELECT * FROM employee");
                    $selectAllUsers->execute();
                    if ($allEmployeeFound = $selectAllUsers->fetch()) {
                        ?>
        <thead>
            <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Address</th>
                            <th>Telephone</th>
                            <th>Nation Id</th>
                            <th>Gender</th>
                            <th>Added By</th>
                            <th>Edit</th>
                            <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                                    do{
                                        ?>
            
            <tr>
                <td>&copy;</td>
                <td><?php echo $allEmployeeFound['firstname'];?></td>
                <td><?php echo $allEmployeeFound['lastname'];?></td>
                <td><?php echo $allEmployeeFound['address'];?></td>
                <td><?php echo $allEmployeeFound['telephone'];?></td>
                <td><?php echo $allEmployeeFound['nid'];?></td>
                <td><?php echo $allEmployeeFound['gender'];?></td>
                <td style="background-color: #0d892f; color: #fff; text-transform: uppercase;">
                  <?php echo $allEmployeeFound['added_by'];?>
                </td>
                <td>
                  <a href="employee-edit.php?id=<?php echo $allEmployeeFound["id"]; ?>" onclick="return confirm('Do you really want to Change Information Of User')">
                  <button class="btn btn-primary" style="background: #33b672 ; "> <i class="fa fa-cog"></i> Edit</button>
               </a>
             </td>
             <td>
              <a  href="?delete_id=<?php echo $allEmployeeFound['id']?>" title="click for delete" onclick="return confirm('Sure to delete this record?')">
                <button class="btn btn-outline-primary"> <i class="fa fa-clouse"></i> Dele</button>
               </a>
                </td>
            </tr>
            </tr>
        </tbody>
              <?php
                            }while($allEmployeeFound = $selectAllUsers->fetch());
                        ?>
                            
               
                 <?php
                    }
                    else{
                        ?>
                            <div class="alert alert-danger-lg"> No new Employee found.</div>
                        <?php
                    }
                    ?>
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