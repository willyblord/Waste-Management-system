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
  <title>Annual Cleaners Employee Activities</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <?php include('ajax-registrations.php'); ?>
          <script type="text/javascript">    
function codespeedy(){
var print_div = document.getElementById("print");
var print_area = window.open();
print_area.document.write(print_div.innerHTML);
print_area.document.close();
print_area.focus();
print_area.print();
print_area.close();
// This is the code print a particular div element
    }
  </script>
</head>
<?php
require 'brand_header.php';
?>
   
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                Monthly Employee Activities
            </h3>
          </div>
          
            <div class="row">
      
            <div class="card">
            <div class="card-body">
              <h4 class="card-title">Monthly Report Employee Activities <span class="print" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <button style="float: left;" class="btn btn-dark" name="save" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-print"></i> Print</button></span></h4>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table">
                    
                                  <?php
                            $i=1;
                           $selectAllUsers = $db->prepare("SELECT * FROM schedule  WHERE MONTH(inserted_date) = MONTH(now()) ORDER BY inserted_date DESC");
                    $selectAllUsers->execute();
                    if ($allUsersFound = $selectAllUsers->fetch()) {
                        ?>
                          <thead style="background-color: #26a99f; color: #fff;">
                        <tr>
                            <th>No</th>
                            <th>Reader Cleaners phone Number</th>
                            <th>Sector</th>
                            <th>Cell</th>
                            <th>Added By</th>
                            <th>Place</th>
<!--                             <th>Action</th>
 -->                        </tr>
                      </thead>
                            <?php
                      do{
                          ?>
                      <tbody>
                        
                        <tr>
                           <td><?php echo $i++ ?></td>
                            <td><?php echo $allUsersFound['employee_phone'];?></td>
                            <td><?php echo $allUsersFound['sector'];?></td>
                            <td><?php echo $allUsersFound['cell'];?></td>
                            <td><?php echo $allUsersFound['added_by'];?></td>
                            <td><?php echo $allUsersFound['message'];?></td>
                           
                          <!--   <td>
                              <a href="user-edit.php?id=<?php echo $allUsersFound["id"]; ?>" onclick="return confirm('Do you really want to Change Information Of User')">
                              <button class="btn btn-outline-primary">Edit</button>
                           </a>
                            </td> -->
                        </tr>

                                            <?php
                                    }while($allUsersFound = $selectAllUsers->fetch());
                                ?>
                            </table>
                        <?php
                    }
                    else{
                        ?>
                            <div class="alert alert-danger-lg"> No Monthly Cleaners found.</div>
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
      <!-- report Print -->
  <!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
<!--       <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div id="print">
       <div style="background-color: #454545; color: #fff; ">
        <h5>Norther Province- Rwanda</h5>
        <h5>Phone: +250 000 000 000</h5>
        <h5>Email: info@clenaers.rw</h5>
        <h5>Smart City Campany</h5>
        <div style="text-align: center;font-size: 25px; font-weight: bold;">Weakly Report</div>
        </div>
      <div class="modal-body">
       <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table class="table" cellpadding="0">
                      
                                  <?php
                           $i=1;
                           $selectAllUsers=$db->prepare("SELECT * FROM schedule  WHERE MONTH(inserted_date)= MONTH(now()) ORDER BY inserted_date DESC");
                    $selectAllUsers->execute();
                    if ($allUsersFound = $selectAllUsers->fetch()) {
                        ?>

                        <thead style="background-color: #26a99f; color: #fff;">

                        <tr>
                            <th><?php echo $i++ ?></th>
                            <th>Reader Cleaners phone Number</th>
                            <th>Sector</th>
                            <th>Cell</th>
                            <th>Added By</th>
                            <th>Place</th>
<!--                             <th>Action</th>
 -->                        </tr>
                      </thead>
                            <?php
                      do{
                          ?>
                      <tbody>
                        
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><?php echo $allUsersFound['employee_phone'];?></td>
                            <td><?php echo $allUsersFound['sector'];?></td>
                            <td><?php echo $allUsersFound['cell'];?></td>
                            <td><?php echo $allUsersFound['added_by'];?></td>
                            <td><?php echo $allUsersFound['message'];?></td>
                           
                          <!--   <td>
                              <a href="user-edit.php?id=<?php echo $allUsersFound["id"]; ?>" onclick="return confirm('Do you really want to Change Information Of User')">
                              <button class="btn btn-outline-primary">Edit</button>
                           </a>
                            </td> -->
                        </tr>

                        <?php
                                    }while($allUsersFound = $selectAllUsers->fetch());
                                ?>
                            </table>
                        <?php
                    }
                    else{
                        ?>
                            <div class="alert alert-danger-lg"> No new Cleaners found.</div>
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

      <div class="modal-footer">
        <button type="button" name="save" onclick="codespeedy()" style="background-color: #1c1c1c; border-color: #1c1c1c; padding: 5px; color: #fff; "> <i class="fa fa-print"></i> Print</button>
      </div>
    </div>
  </div>
</div>
  <!-- end of printing form -->
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
<style type="text/css">
  .print{
    float: right;

  }
  .print button{
    background: #1e1e21;
    border-width: 0px;
    color: #fff;
    font-weight: bold;
    padding: 5px;
    cursor: pointer;
    border-radius: 5px;
  }
</style>
