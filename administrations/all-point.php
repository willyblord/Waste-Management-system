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
  <title>All Uwaste Point Management</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js">
  <script src="jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <?php include('ajax-registrations.php'); ?>
</head>
<?php
require 'brand_header.php';
?>

<?php 
    if(isset($_GET['waste_id']))
    {    
        $stmt_delete=$db->prepare('DELETE FROM waste_range WHERE id = "'.$_GET['waste_id'].'"');
        if($stmt_delete->execute())
        {
            ?>
            <script>
            alert("waste Point Are Deleted Well!!!!");
            window.location.href=('all-point.php');
            </script>
            <?php 
        }else
 
        ?>
            <script>
            alert("Can not delete item");
            window.location.href=('all-point.php');
            </script>
            <?php 
 
    }
 
    ?>
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                All Waste Correction point in Musanze city
            </h3>
          </div>
            <div class="row">
            <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <button style="float: left;" class="btn btn-dark" name="save" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-print"></i> Print</button></span></h4>
                  <div style="width: 300px; float: right; padding-bottom: 10px;">

                    <input type="search" placeholder="...Search Waste Point..." class="form-control search-input" data-table="customers-list" style="border-color: #3c3c3c;" />
                    </div>

                  <div class="responsive">

    <table  class="table table-striped mt32 customers-list">
                                     <?php

                                     $i=1;
                    $selectAllUsers = $db->prepare("SELECT * FROM waste_range");
                    $selectAllUsers->execute();
                    if ($allUsersFound = $selectAllUsers->fetch()) {
                        ?>
                      
                      <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Sector</th>
                            <th>Cell</th>
                            <th>Point Code</th>
                            <th>Created date</th>
                            <th></th>
                        </tr>
                      </thead>
                        <?php
                                    do{
                                        ?>
                      <tbody>
                        
                        <tr>
                           <td><?php echo $i++ ?></td>
                            <td><?php echo $allUsersFound['sector'];?></td>
                            <td><?php echo $allUsersFound['cell'];?></td>
                            <td><?php echo $allUsersFound['cordinate'];?></td>
                            <td><?php echo $allUsersFound['added_time'];?></td>
                            <td>
                              <a  href="?waste_id=<?php echo $allUsersFound['id']?>" title="click for delete" onclick="return confirm('Sure to delete this record?')">
                            <button class="btn btn-outline-primary"> <i class="fa fa-clouse"></i> Delete</button>
                           </a>
                            </td>
                        </tr>
                        <?php
                          }while($allUsersFound = $selectAllUsers->fetch());
                        ?>
                      </tbody>
                                   <?php
                    }
                    else{
                        ?>
                            <div class="alert alert-danger-lg">users found.</div>
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
        <br>
    </div>
    <!-- page-body-wrapper ends -->
  </div>
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
        <div style="text-align: center;font-size: 25px; font-weight: bold;">All Waste Correction Point</div>
        </div>
      <div class="modal-body">
       <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
           <table  class="table table-striped mt32 customers-list">
                                     <?php

                                     $i=1;
                    $selectAllUsers = $db->prepare("SELECT * FROM waste_range");
                    $selectAllUsers->execute();
                    if ($allUsersFound = $selectAllUsers->fetch()) {
                        ?>
                      
                      <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Sector</th>
                            <th>Cell</th>
                            <th>Point Code</th>
                            <th>Created date</th>
                            
                        </tr>
                      </thead>
                        <?php
                                    do{
                                        ?>
                      <tbody>
                        
                        <tr>
                           <td><?php echo $i++ ?></td>
                            <td><?php echo $allUsersFound['sector'];?></td>
                            <td><?php echo $allUsersFound['cell'];?></td>
                            <td><?php echo $allUsersFound['cordinate'];?></td>
                            <td><?php echo $allUsersFound['added_time'];?></td>
                     
                        </tr>
                        <?php
                          }while($allUsersFound = $selectAllUsers->fetch());
                        ?>
                      </tbody>
                                   <?php
                    }
                    else{
                        ?>
                            <div class="alert alert-danger-lg">users found.</div>
                        <?php
                    }
                    ?>
                    </table>
                  </div>
                </div>
              </div>
            </div>
      </div>
    <script src="js/jquery.js"></script>

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
<style type="text/css">
  .thead-dark{
    background:#33b672 !important;

  }
    .thead-dark2{
    background:#bf280a !important;
    color: #ffffff;
    
  }

</style>

<script type="text/javascript">
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