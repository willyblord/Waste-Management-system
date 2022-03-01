<?php
    session_start();
    if(isset($_SESSION['user'])){
    include("../connection_e_wasterManagement.php");
        $selectUser = $db->prepare("SELECT * FROM users WHERE role = 'Admin' OR role='user' AND id = '".$_SESSION['user']."' AND status = 'Active'");
        $selectUser->execute();
        if ($userFound = $selectUser->fetch()) {
            ?>
            
             <?php 
    if(isset($_GET['delete_id']))
    {    
        $stmt_delete=$db->prepare('DELETE FROM client WHERE id = "'.$_GET['delete_id'].'"');
        if($stmt_delete->execute())
        {
            ?>
            <script>
            alert("User Are Deleted Well!!!!");
            window.location.href=('populationsManagement.php');
            </script>
            <?php 
        }else
 
        ?>
            <script>
            alert("Can not delete item");
            window.location.href=('populationsManagement.php');
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
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js">

     <script src="jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript">
$(document).ready(function() {
   var table = $('#example').DataTable({
      'initComplete': function(){
         var api = this.api();

         // Initialize Typeahead plug-in
         $('.dataTables_filter input[type="search"]', api.table().responsive())
            .typeahead({
               source: function(query, process){
                  $.getJSON('https://api.myjson.com/bins/e66c3', { q: query }, function (data){
                     return process(data);
                  });
               },
               afterSelect: function(value){
                  api.search(value).draw();
               }
            }
         );
      }
   });
});

    </script>
  <?php include('ajax-registrations.php'); ?>
</head>
<?php
require 'brand_header.php';
?>
   
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                All Subscribers
            </h3>
           
          </div>
          
            <div class="row">
      
            <div class="card">
            <div class="card-body">


              <div class="row">
                <div class="col-12">
                    <button style="float: left;" class="btn btn-dark" name="save" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-print"></i> Print</button>
                  <div class="inputSearch">
                    <input type="search" placeholder="...Search Employee..." class="form-control search-input" data-table="customers-list"/>
                  </div>
                  <div class="responsive">
                   

    <table  class="table table-striped mt32 customers-list">
                                     <?php
                                     $i=1;
                    $selectAllUsers = $db->prepare("SELECT * FROM client");
                    $selectAllUsers->execute();
                    if ($allUsersFound = $selectAllUsers->fetch()) {
                        ?>
                      
                      <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Usename</th>
                            
                            <th>Actions</th>
                        </tr>
                      </thead>
                        <?php
                                    do{
                                        ?>
                      <tbody>
                        
                        <tr>
                           <td><?php echo $i++ ?></td>
                            <td><?php echo $allUsersFound['first_name'];?></td>
                            <td><?php echo $allUsersFound['last_name'];?></td>
                            <td><?php echo $allUsersFound['email'];?></td>
                            <td><?php echo $allUsersFound['phone'];?></td>
                            <td><?php echo $allUsersFound['username'];?></td>
                          
                            <td>
                              <a  href="?delete_id=<?php echo $allUsersFound['id']?>" title="click for delete" onclick="return confirm('Sure to delete this record?')">
                 <button style="background: #6d2624; padding: 5px; color: #ffffff; border-color:#6d2624; border-width: 0px; cursor: pointer; text-transform: uppercase;"> <i class="fa fa-clouse"></i> Delete</button>
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


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div id="print">
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
                                     $i=1;
                    $selectAllUsers = $db->prepare("SELECT * FROM client");
                    $selectAllUsers->execute();
                    if ($allUsersFound = $selectAllUsers->fetch()) {
                        ?>
                      
                      <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Usename</th>
                            
                        </tr>
                      </thead>
                        <?php
                                    do{
                                        ?>
                      <tbody>
                        
                        <tr>
                           <td><?php echo $i++ ?></td>
                            <td><?php echo $allUsersFound['first_name'];?></td>
                            <td><?php echo $allUsersFound['last_name'];?></td>
                            <td><?php echo $allUsersFound['email'];?></td>
                            <td><?php echo $allUsersFound['phone'];?></td>
                            <td><?php echo $allUsersFound['username'];?></td>
                        </tr>
                        <?php
                                    }while($allUsersFound = $selectAllUsers->fetch());
                                ?>
           
                      </tbody>
                                   <?php
                    }
                    else{
                        ?>
                            <div class="alert alert-danger-lg">No subscribers found.</div>
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
        

    
    </div>
    <!-- page-body-wrapper ends -->
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
      .form-control{
        background-color: #adadad;
      }
      
    </style>
