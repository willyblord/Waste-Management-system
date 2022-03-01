<?php
    session_start();
    if(isset($_SESSION['user'])){
    include("../connection_e_wasterManagement.php");
        $selectUser = $db->prepare("SELECT * FROM users WHERE role = 'Admin' OR role='user' AND id = '".$_SESSION['user']."' AND status = 'Active'");
        $selectUser->execute();
        if ($userFound = $selectUser->fetch()) {
            ?>

            <!-- delete script -->
    <?php 
    if(isset($_GET['delete_id']))
    {    
        $stmt_delete=$db->prepare('DELETE FROM employee WHERE id = "'.$_GET['delete_id'].'"');
        if($stmt_delete->execute())
        {
            ?>
            <script>
            alert("User Are Deleted Well!!!!");
            window.location.href=('all-employee.php');
            </script>
            <?php 
        }else
 
        ?>
            <script>
            alert("Can not delete item");
            window.location.href=('all-employee.php');
            </script>
            <?php 
 
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
               All Employee Cleaners
            </h3>
            <span style="float: right; background-color:#4c4c4c; padding: 5px; border-radius: 5px; "> <a href="employee-management.php" style="text-transform: uppercase; text-decoration: none; color: #ffffff;">Add New Cleanes</a></span>
          </div>
          
            <div class="row">
            <div class="card">
            <div class="card-body">


              <!-- modal data -->
              <div class="row">
                <div class="col-12">
                   <button style="float: left;" class="btn btn-dark" name="save" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-print"></i> Print</button>
                  <div class="inputSearch">
                
                      
                   
                    <input type="search" placeholder="...Search Waste Point..." class="form-control search-input" data-table="customers-list" style="border-color: #3c3c3c;" />
                  </div>
                  <br>
                  <div class="table-responsive">

                    
    <table  class="table table-striped mt32 customers-list">
                  <?php
                  $i = 1;
                    $selectAllUsers = $db->prepare("SELECT * FROM employee");
                    $selectAllUsers->execute();
                    if ($allEmployeeFound = $selectAllUsers->fetch()) {
                        ?>
        <thead style="background-color: #2c2c2c; color: #ffffff;">
            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Nation Id</th>
                            <th scope="col">Gender</th>
                            <th>Role</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                                    do{
                                        ?>
            
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $allEmployeeFound['firstname'];?></td>
                <td><?php echo $allEmployeeFound['lastname'];?></td>
                <td><?php echo $allEmployeeFound['address'];?></td>
                <td><?php echo $allEmployeeFound['telephone'];?></td>
                <td><?php echo $allEmployeeFound['nid'];?></td>
                <td><?php echo $allEmployeeFound['gender'];?></td>
                <td><?php echo $allEmployeeFound['role'];?></td>
                <td>
                  <a href="employee-edit.php?id=<?php echo $allEmployeeFound["id"]; ?>" onclick="return confirm('Do you really want to Change Information Of User')">
                  <button  style="background: #33842b; padding: 5px; color: #ffffff; border-color:#33842b; border-width: 0px; cursor: pointer; text-transform: uppercase;"> <i class="fa fa-cog"></i> Edit</button>
               </a>
             </td>
             <td>
              <a  href="?delete_id=<?php echo $allEmployeeFound['id']?>" title="click for delete" onclick="return confirm('Sure to delete this record?')">
                <button style="background: #6d2624; padding: 5px; color: #ffffff; border-color:#6d2624; border-width: 0px; cursor: pointer; text-transform: uppercase;"> <i class="fa fa-clouse"></i> Delete</button>
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
<div id="print">
  <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">List of all subscribers</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
    <table  class="table table-striped mt32 customers-list">
                  <?php
                  $i = 1;
                    $selectAllUsers = $db->prepare("SELECT * FROM employee");
                    $selectAllUsers->execute();
                    if ($allEmployeeFound = $selectAllUsers->fetch()) {
                        ?>
        <thead style="background-color: #2c2c2c; color: #ffffff;">
            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Telephone</th>
                            <th scope="col">Nation Id</th>
                            <th scope="col">Gender</th>
                            <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <?php
                                    do{
                                        ?>
            
            <tr>
                <td><?php echo $i++ ?></td>
                <td><?php echo $allEmployeeFound['firstname'];?></td>
                <td><?php echo $allEmployeeFound['lastname'];?></td>
                <td><?php echo $allEmployeeFound['address'];?></td>
                <td><?php echo $allEmployeeFound['telephone'];?></td>
                <td><?php echo $allEmployeeFound['nid'];?></td>
                <td><?php echo $allEmployeeFound['gender'];?></td>
                <td><?php echo $allEmployeeFound['role'];?></td>
          
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
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        <button type="button" class="btn btn-primary" class="btn-print" onclick="codespeedy()">Print</button>
      </div>
    </div>
  </div>
</div>
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
        (function(document) {
            'use strict';

            var TableFilter = (function(myArray) {
                var search_input;

                function _onInputSearch(e) {
                    search_input = e.target;
                    var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
                    myArray.forEach.call(tables, function(table) {
                        myArray.forEach.call(table.tBodies, function(tbody) {
                            myArray.forEach.call(tbody.rows, function(row) {
                                var text_content = row.textContent.toLowerCase();
                                var search_val = search_input.value.toLowerCase();
                                row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
                            });
                        });
                    });
                }

                return {
                    init: function() {
                        var inputs = document.getElementsByClassName('search-input');
                        myArray.forEach.call(inputs, function(input) {
                            input.oninput = _onInputSearch;
                        });
                    }
                };
            })(Array.prototype);

            document.addEventListener('readystatechange', function() {
                if (document.readyState === 'complete') {
                    TableFilter.init();
                }
            });

        })(document);
    </script>
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
    <style type="text/css">
      .inputSearch{
        float: right;
        width: 50%;
        padding-bottom: 20px;
      }
    </style>

