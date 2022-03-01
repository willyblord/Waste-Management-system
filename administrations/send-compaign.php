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

        <script type="text/javascript">  
            function selects(){  
                var ele=document.getElementsByName('chk');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=true;  
                }  
            }  
            function deSelect(){  
                var ele=document.getElementsByName('chk');  
                for(var i=0; i<ele.length; i++){  
                    if(ele[i].type=='checkbox')  
                        ele[i].checked=false;  
                      
                }  
            }             
        </script>
</head>
<?php
require 'brand_header.php';
?>
      <div class="main-panel">
        <div class="content-wrapper" style="">
          <div class="page-header">
            <h3 class="page-title">
                Send Mobilization to all Subscribers
            </h3>
            <span style="float: right;"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">View All<i class="fa fa-eye ml-1"></i></button></span>
          </div>
          
          <div class="row">
            <div class="col-lg-9">
              <div class="card">
                <div class="card-body">

                  <form action="quelly-mobilization.php" class="cmxform" method="post"  enctype="multipart/form-data">
                    <fieldset>
                       <div class="form-group">
                      <label for="exampleTextarea1">Message</label>
                      <textarea class="form-control" id="exampleTextarea1" name="message" rows="4"></textarea>
                    </div>
                    </fieldset>
                  
                </div>
              </div>
              <br>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Select Populations
                    <span>
                      <input type="button" onclick='selects()' value="Select All"/><input type="button" onclick='deSelect()' value="Deselect All"/> 

                      <input type="submit" class="btn btn-primary btn-sm"  name="submit" value="Send"/></span>

                  </h4>


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                                         <?php
    $result = $db->prepare("SELECT phone,first_name FROM client");
    $result->execute();
    for($i=0; $row = $result->fetch(); $i++){
?>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" name="chk" name="form-check-input" value="<?php echo $row['phone'];?>">
                              <?php echo $row['phone'];?> <?php echo $row['first_name'];?>
                            </label>
                          </div>
                          <?php
                        }
                          ?>
                       
                        </div>
                      </div>
                    </div>
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
