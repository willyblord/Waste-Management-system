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
        $stmt_delete=$db->prepare('DELETE FROM notification WHERE id = "'.$_GET['delete_id'].'"');
        if($stmt_delete->execute())
        {
            ?>
            <script>
            alert("User Are Deleted Well!!!!");
            window.location.href=('all-notofication.php');
            </script>
            <?php 
        }else
 
        ?>
            <script>
            alert("Can not delete item");
            window.location.href=('all-notofication.php');
            </script>
            <?php 
 
    }
 
    ?>
    
    	<script type="text/javascript">

		$(document).ready(function(){
			$('#productName').autocomplete({
				source: 'searchEmployee.php'
			});
		});

	</script>
    <!-- end of delete button -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>All Notification</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />

  <?php include('ajax-registrations.php'); ?>
</head>
<?php
require 'brand_header.php';
?>
   
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                All Notification</span>
            </h3>
          </div>
          
            <div class="row">
            <div class="card">
            <div class="card-body">
              <h4 class="card-title">
              <input type="search" placeholder="...Search Waste Point..." class="form-control search-input" data-table="customers-list" style="border-color: #3c3c3c;" />


            </h4>
              <!-- modal data -->
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                   
    <table  class="table table-striped mt32 customers-list">
                                     <?php
                                     $i=1;
                    $selectAllUsers = $db->prepare("SELECT * FROM notification WHERE status='active' ORDER BY added_time DESC ");
                    $selectAllUsers->execute();
                    if ($allEmployeeFound = $selectAllUsers->fetch()) {
                        ?>
                      
                      <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Waste Sector</th>
                            <th>Waste Cell</th>
                            <th>Telephone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                        <?php
                                    do{
                                        ?>
                      <tbody>
                        
                        <tr>
                           <td><?php echo $i++ ?></td>
                            <td><?php echo $allEmployeeFound['name'];?></td>
                            <td><?php echo $allEmployeeFound['sector'];?></td>
                            <td><?php echo $allEmployeeFound['cell'];?></td>
                            <td><?php echo $allEmployeeFound['phone'];?></td>

                            <td><?php 
              switch ($allEmployeeFound['status']) {
                case 'Active':
                  echo "<span class='badge badge-pill badge-info'> Checked</span>";
                  break;
                case 'Pending':
                  echo "<span class='badge badge-pill badge-info' style='background-color: red;'> Not Collected</span>";
                  break;
                
                default:
                  echo "<span class='badge badge-pill badge-info'> Not Checked</span>";
                  
                  break;
              }

              ?></td>


                            
                            <td>
                              <a href="?delete_id=<?php echo $allEmployeeFound["id"]; ?>" onclick="return confirm('Do you really want to Change Information Of User')">
                              <button class="btn btn-primary" style="background: #b13d30; border-color: #b13d30; "> <i class="fa fa-cog"></i> Delete</button>
                           </a>
                          
                            </td>
                        </tr>
                        <?php
                            }while($allEmployeeFound = $selectAllUsers->fetch());
                        ?>
                            </table>
                        <?php
                    }
                    else{
                        ?>
                            <div class="alert alert-danger-lg"> No new Employee found.</div>
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
<style type="text/css">
  .thead-dark{
    background:#33b672 !important;

  }
    .thead-dark2{
    background:#bf280a !important;
    color: #ffffff;
    
  }
  .form-control{
    border-radius: 10px;
    height: 5px;
    width: 50%;
    border-color: red;
  }

</style>
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

