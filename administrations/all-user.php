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
                All Waste User Managament
            </h3>
            <span style="float: right; background-color:#4c4c4c; padding: 5px; border-radius: 5px; "> <a href="usermanagement.php" style="text-transform: uppercase; text-decoration: none; color: #ffffff;">Add New User</a></span>
          </div>
          
            <div class="row">
      
            <div class="card">
            <div class="card-body">
              <h4 class="card-title">All Active Admin</h4>


              <div class="row">
                <div class="col-12">
                  <div class="responsive">

                    <table  class="table" id="resultTable" cellspacing="0" width="100%">
                                     <?php
                    $selectAllUsers = $db->prepare("SELECT * FROM users WHERE role='Admin' AND status='Active'");
                    $selectAllUsers->execute();
                    if ($allUsersFound = $selectAllUsers->fetch()) {
                        ?>
                      
                      <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Role</th>
                            <th>Usename</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                      </thead>
                        <?php
                                    do{
                                        ?>
                      <tbody>
                        
                        <tr>
                           <td>&copy;</td>
                            <td><?php echo $allUsersFound['first_name'];?></td>
                            <td><?php echo $allUsersFound['last_name'];?></td>
                            <td><?php echo $allUsersFound['email'];?></td>
                            <td><?php echo $allUsersFound['address'];?></td>
                            <td><?php echo $allUsersFound['phone'];?></td>
                            <td><?php echo $allUsersFound['role'];?></td>
                            <td><?php echo $allUsersFound['username'];?></td>
                            <td>
                              <?php echo $allUsersFound['status'];?>
                            </td>
                            <td>
                              <a href="user-edit.php?id=<?php echo $allUsersFound["id"]; ?>" onclick="return confirm('Do you really want to Change Information Of User')">
                              <button  style="background: #33842b; padding: 5px; color: #ffffff; border-color:#33842b; border-width: 0px; cursor: pointer; text-transform: uppercase;"> <i class="fa fa-cog"></i> Edit</button>
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
                    <div class="row">
      
            <div class="card">
            <div class="card-body">
              <h4 class="card-title">All Active User</h4>

              <div class="row">
                <div class="col-12">
                  <div class="responsive">

                    <table  class="table" id="resultTable" cellspacing="0" width="100%">
                                     <?php
                    $selectAllUsers = $db->prepare("SELECT * FROM users WHERE role='User' AND status='Active'");
                    $selectAllUsers->execute();
                    if ($allUsersFound = $selectAllUsers->fetch()) {
                        ?>
                      
                      <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Role</th>
                            <th>Usename</th>
                            <th>Status</th>
                            <th>Actions</th>
                            <th>Permition</th>
                        </tr>
                      </thead>
                        <?php
                                    do{
                                        ?>
                      <tbody>
                        
                        <tr>
                           <td>&copy;</td>
                            <td><?php echo $allUsersFound['first_name'];?></td>
                            <td><?php echo $allUsersFound['last_name'];?></td>
                            <td><?php echo $allUsersFound['email'];?></td>
                            <td><?php echo $allUsersFound['address'];?></td>
                            <td><?php echo $allUsersFound['phone'];?></td>
                            <td><?php echo $allUsersFound['role'];?></td>
                            <td><?php echo $allUsersFound['username'];?></td>
                            <td>
                              <?php echo $allUsersFound['status'];?>
                            </td>
                            <td>
                              <a href="user-edit.php?id=<?php echo $allUsersFound["id"]; ?>" onclick="return confirm('Do you really want to Change Information Of User')">
                                <button  style="background: #33842b; padding: 5px; color: #ffffff; border-color:#33842b; border-width: 0px; cursor: pointer; text-transform: uppercase;"> <i class="fa fa-cog"></i> Edit</button>

                           </a>
                            </td>
                            <td>
                                <a href="user-permition.php?id=<?php echo $allUsersFound["id"]; ?>" onclick="return confirm('Do you really want to Change Information Of User')">
                                <button  style="background: #33842b; padding: 5px; color: #ffffff; border-color:#33842b; border-width: 0px; cursor: pointer; text-transform: uppercase;"> <i class="fa fa-cog"></i>  Permition</button>
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

            <div class="row">
            <div class="card">
            <div class="card-body">
              <h4 class="card-title">All Pending User</h4>

              <div class="row">
                <div class="col-12">
                  <div class="responsive">

                    <table  class="table" id="resultTable" cellspacing="0" width="100%">
                                     <?php
                    $selectAllUsers = $db->prepare("SELECT * FROM users WHERE status='Pending'");
                    $selectAllUsers->execute();
                    if ($allUsersFound = $selectAllUsers->fetch()) {
                        ?>
                      
                      <thead class="thead-dark2">
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Role</th>
                            <th>Usename</th>
                            <th>Status</th>
                            <th>Permition</th>
                            <th>Status</th>
                        </tr>
                      </thead>
                        <?php
                                    do{
                                        ?>
                      <tbody>
                        
                        <tr>
                           <td>&copy;</td>
                            <td><?php echo $allUsersFound['first_name'];?></td>
                            <td><?php echo $allUsersFound['last_name'];?></td>
                            <td><?php echo $allUsersFound['email'];?></td>
                            <td><?php echo $allUsersFound['address'];?></td>
                            <td><?php echo $allUsersFound['phone'];?></td>
                            <td><?php echo $allUsersFound['role'];?></td>
                            <td><?php echo $allUsersFound['username'];?></td>
                            <td>
                              <?php echo $allUsersFound['status'];?>
                            </td>
                            <td>
                           <a href="user-permition.php?id=<?php echo $allUsersFound["id"]; ?>" onclick="return confirm('Do you really want to Change Information Of User')">
                                <button  style="background: #33842b; padding: 5px; color: #ffffff; border-color:#33842b; border-width: 0px; cursor: pointer; text-transform: uppercase;"> <i class="fa fa-cog"></i>  Permition</button>
                           </a>
                            </td>
                            <td>
                              <a href="user-edit.php?id=<?php echo $allUsersFound["id"]; ?>" onclick="return confirm('Do you really want to Change Information Of User')">
                              <button  style="background: #33842b; padding: 5px; color: #ffffff; border-color:#33842b; border-width: 0px; cursor: pointer; text-transform: uppercase;"> <i class="fa fa-cog"></i> Status</button>
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
                            <div class="alert alert-danger-lg">No deleted users found.</div>
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
  
</script>