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
  <title>User Management</title>
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
                User Permitions
            </h3>
          </div>
          
          <div class="row">
            <div class="col-lg-9">
              <div class="card">
                <div class="card-body">
                <div class="alert alert-success successMessage" role="alert"  style="display: none; ">
                 User Permition
                </div>
                <div class="alert alert-danger errorMessage" role="alert"  style="display:none;">
                 Error
                </div>
                 <?php
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $selectUserToEdit = $db->prepare("SELECT * FROM users WHERE id= :userid");
    $selectUserToEdit->bindParam(':userid', $id);
    $selectUserToEdit->execute();
    if($userToEditFound = $selectUserToEdit->fetch()){
    

        // if(isset($_POST['p1'])){
        //     $p1 = 1;
        // }
        // else{
        //     $p1 = 0;
        // }

        // $updatePrevileges = $db->prepare("UPDATE users SET p1 = '".$p1."' WHERE id = '".$_POST['userToEdit']."'");
        // $previlegesUpdated = $updatePrevileges->execute();
        // if($previlegesUpdated){

        // }
        // else{

        // }

       
?>

     <form method = "POST"  action="prevelede_edit.php" enctype = "multipart/form-data">
                 <h5 class="card-title">
                                      <input type="hidden" name="namids" value="<?php echo $id ;?>"></h5>
                                <h5>
                                  <input type="text" name="first_name" value="<?php echo $userToEditFound["first_name"]; ?> <?php echo $userToEditFound["last_name"]; ?>" class="form-control" style="width: 500px;" disable hidden></h5>

                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        Add New User:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="form-check-input" name = "p1" type="checkbox" value="1" id="defaultCheck1" <?php if($userToEditFound['p1'] == 1){ ?> Checked <?php }?> > 
                            <input type="text" name="userToEdit" value="<?php echo $userToEditFound['id']?>" hidden />
                     
                      </div>
                          <div class="form-group">
                        All User:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="form-check-input" name = "p6" type="checkbox" value="1" id="defaultCheck1" <?php if($userToEditFound['p6'] == 1){ ?> Checked <?php }?> >                      
                      </div>
                      <div class="form-group">
                        Add New Employee:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="form-check-input" name = "p2" type="checkbox" value="1" id="defaultCheck1" <?php if($userToEditFound['p2'] == 1){ ?> Checked <?php }?> >                      
                      </div>
                      <div class="form-group">
                        All Employee:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="form-check-input" name = "p3" type="checkbox" value="1" id="defaultCheck1" <?php if($userToEditFound['p3'] == 1){ ?> Checked <?php }?> >                      
                      </div>
                      <div class="form-group">
                        Waste Post:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="form-check-input" name = "p4" type="checkbox" value="1" id="defaultCheck1" <?php if($userToEditFound['p4'] == 1){ ?> Checked <?php }?> >                      
                      </div>
                        <div class="form-group">
                        All Waste Post:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="form-check-input" name = "p5" type="checkbox" value="1" id="defaultCheck1" <?php if($userToEditFound['p5'] == 1){ ?> Checked <?php }?> >                      
                      </div>
                        <div class="form-group">
                        Add Schedule:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="form-check-input" name = "p7" type="checkbox" value="1" id="defaultCheck1" <?php if($userToEditFound['p7'] == 1){ ?> Checked <?php }?> >                      
                      </div> 
                      <div class="form-group">
                        Daily Schedule:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="form-check-input" name = "p8" type="checkbox" value="1" id="defaultCheck1" <?php if($userToEditFound['p8'] == 1){ ?> Checked <?php }?> >                      
                      </div>
                        <div class="form-group">
                        Weakly Schedule:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="form-check-input" name = "p9" type="checkbox" value="1" id="defaultCheck1" <?php if($userToEditFound['p9'] == 1){ ?> Checked <?php }?> >                      
                      </div> 
                           <div class="form-group">
                        Mouthly Schedule:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="form-check-input" name = "p10" type="checkbox" value="1" id="defaultCheck1" <?php if($userToEditFound['p10'] == 1){ ?> Checked <?php }?> >                      
                      </div>
                           <div class="form-group">
                        All Notification:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="form-check-input" name = "p11" type="checkbox" value="1" id="defaultCheck1" <?php if($userToEditFound['p11'] == 1){ ?> Checked <?php }?> >                      
                      </div>
                           <div class="form-group">
                        Send Company:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="form-check-input" name = "p12" type="checkbox" value="1" id="defaultCheck1" <?php if($userToEditFound['p12'] == 1){ ?> Checked <?php }?> >                      
                      </div>  
                      

                      <button type="submit" class="btn bg-gradient-default">update</button>
                    </div>  
                  </div>

                </div>
               
                <hr class="my-4" />
     
              </form>
              <?php
            }
            $selectUserToEdit->closeCursor();

            ?>

                </div>
              </div>
            </div>
          </div>
        </div>
            <?php
        require 'footer.php';
        ?>

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
