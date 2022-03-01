<?php
    session_start();
    if(isset($_SESSION['user'])){
    include("../connection_e_wasterManagement.php");
        $selectUser = $db->prepare("SELECT * FROM users WHERE role = 'Admin' OR role='user' AND id = '".$_SESSION['user']."' AND status = 'Active'");
        $selectUser->execute();
        if ($userFound = $selectUser->fetch()) {

          if(isset($_POST['submit']))
{
$selectAllUsers = $db->prepare("SELECT password FROM  users where password='".md5($_POST['password'])."' && username='".$_SESSION['user']."'");

//$num=$donnees = $reponse->fetch();
$selectAllUsers->execute();
  if ($allEmployeeFound = $selectAllUsers->fetch()) {

 $selectAllUsers = $db->prepare("update users set password='".md5($_POST['newpassword'])."' WHERE username='".$_SESSION['user']."'");
$_SESSION['msg']="Password Changed Successfully !!";
}
else
{
$_SESSION['msg']="Old Password not match !!";
}
}
            ?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Employee Management</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/iconfonts/font-awesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="shortcut icon" href="images/favicon.png" />
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>

      <script type="text/javascript">
function valid()
{
if(document.chngpwd.password.value=="")
{
alert("Current Password Filed is Empty !!");
document.chngpwd.password.focus();
return false;
}
else if(document.chngpwd.newpassword.value=="")
{
alert("New Password Filed is Empty !!");
document.chngpwd.newpassword.focus();
return false;
}
else if(document.chngpwd.confirmpassword.value=="")
{
alert("Confirm Password Filed is Empty !!");
document.chngpwd.confirmpassword.focus();
return false;
}
else if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
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
                Change Password
            </h3>
          </div>
          
          <div class="row">
            <div class="col-lg-9">
              <div class="card">
                <div class="card-body">

                  <?php if(isset($_POST['submit']))
{?>

                  <div class="alert alert-dark" role="alert">
  <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
</div>
<?php } ?>
             
              
                    <form class="form-horizontal row-fluid" name="chngpwd" method="post" onSubmit="return valid();">
                    <fieldset>
                      <div class="form-group">
                        <label for="firstname">Current Password</label>
                        <input name="password" class="form-control" type="text" >
                      </div>
                      <div class="form-group">
                        <label for="lastname">New Password</label>
                        <input class="form-control" name="newpassword"  type="text">
                      </div>
                      <div class="form-group">
                        <label for="username">Confirm Password</label>
                        <input class="form-control" name="confirmpassword" type="text">
                      </div>
             
                    

                      <input type="hidden" name="namids" value="<?php echo $id ;?>">
                      <button class="btn btn-primary" name="submit" type="submit">Submit</button>
                    </fieldset>
                  </form>
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
