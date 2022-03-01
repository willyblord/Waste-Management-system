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
  <title>Cyuve waste Point Management</title>
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
                Cyuve Waste Correction point
            </h3>
          </div>
            <div class="row">
            <div class="card">
            <div class="card-body">
              <h4 class="card-title">Cyuve Waste Correction Point</h4>
              <div class="row">
                <div class="col-12">
                  <div class="responsive">

                    <table  class="table" id="resultTable" cellspacing="0" width="100%">
                                     <?php
                    $selectAllUsers = $db->prepare("SELECT * FROM waste_range WHERE sector='Cyuve'");
                    $selectAllUsers->execute();
                    if ($allUsersFound = $selectAllUsers->fetch()) {
                        ?>
                      
                      <thead class="thead-dark">
                        <tr>
                            <th>#</th>
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
                           <td>&copy;</td>
                            <td><?php echo $allUsersFound['sector'];?></td>
                            <td><?php echo $allUsersFound['cell'];?></td>
                            <td><?php echo $allUsersFound['cordinate'];?></td>
                            <td><?php echo $allUsersFound['added_time'];?></td>
                            <td>
                              <a  href="?waste_id=<?php echo $allUsersFound['id']?>" title="click for delete" onclick="return confirm('Sure to delete this record?')">
                            <button class="btn btn-outline-primary"> <i class="fa fa-clouse"></i> Dele</button>
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
                            <div class="alert alert-danger-lg">cyuve correction Point not found.</div>
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