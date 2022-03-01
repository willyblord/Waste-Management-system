<?php
    session_start();
    if(isset($_SESSION['user'])){
    include("../connection_e_wasterManagement.php");
        $selectUser = $db->prepare("SELECT * FROM users WHERE role = 'Admin' OR role='user' AND id ='".$_SESSION['user']."' AND status = 'Active'");
        $selectUser->execute();
        if ($userFound = $selectUser->fetch()) {
            ?>
<script type="text/javascript">
        function populate(s1,s2){
            var s1= document.getElementById(s1);
            var s2= document.getElementById(s2);
            s2.innerHTML= "";
            if (s1.value == "Muhoza") {
                var optionArray=["|","Cyabararika|Cyabararika","Kigombe|Kigombe","Mpenge|Mpenge","Ruhengeri|Ruhengeri"];
            }

            for (var option in optionArray){

               var pair= optionArray[option].split("|");
               var newOption= document.createElement("option");
               newOption.value= pair[0];
               newOption.innerHTML= pair[1];
               s2.options.add(newOption)

            }    
        }
    </script>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>muhozasector User Management</title>
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
                Select Reader of waste corrector in Muhoza Sector
            </h3>
          </div>
          
          <div class="row">
            <div class="col-lg-9">
              <div class="card">
                <div class="card-body">

                
                     <form action="quelly-schedule.php" class="cmxform" method="post"  enctype="multipart/form-data">
                    <fieldset>
               
                      <div class="form-group">
                        <label for="">Sector</label>
                    <select class="form-control" name="sector" id="slct1" onchange="populate(this.id,'slct2')">
                        <option selected disabled> Select Sector </option>
                        <option value="Muhoza">Muhoza</option>
<!--                         <option value="Muhoza">Muhoza</option>
 -->                    </select>
                      </div>
                      <div class="form-group">
                        <label for="cell">Cell</label>
                        <select class="form-control" name="cell" id="slct2">
                          
                        </select>
                        <input type="hidden" name="added_by" value="<?php echo $userFound["first_name"]; ?>">
                      </div>         
                      <div class="form-group">
                        <label for="firstname">Reader Firstname </label>
                        <select name="name" class="form-control">
                          <option>--Select Reader of Waste correctors--</option>
                                      <?php
                    $selectAllUsers = $db->prepare("SELECT * FROM employee WHERE role='Reader' AND sector='Muhoza' limit 1");
                    $selectAllUsers->execute();
                    if ($allEmployeeFound = $selectAllUsers->fetch()) {
                        ?>
                         <?php
                                    do{
                                        ?>
                          <option value="<?php echo $allEmployeeFound['firstname'];?>"><?php echo $allEmployeeFound['firstname'];?></option>
                          <input type="hidden" name="employee_phone" value="<?php echo $allEmployeeFound['telephone'];?>">

                           <?php
                                    }while($allEmployeeFound = $selectAllUsers->fetch());
                                ?>
                            </table>
                        <?php
                    }
                    else{
                        ?>
                           <option><div class="alert alert-danger-lg"> reade Not found.</div></option> 
                        <?php
                    }
                    ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="cell">Comment or Message</label>
                        <textarea name="message" class="form-control">
                          
                        </textarea>
                        
                      </div>
                     
                      <div>
                        <input type="hidden" name="added_by" 
                        value="<?php echo $userFound["first_name"];?>" class="form-control">
                      </div>
                      <br>
                      <button class="btn btn-primary" type="Submit" name="submit">Submit</button>
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
  <script>
    function isInputNumber(evt){
      var char = String.fromCharCode(evt.which);
      if (!(/[0-9]/.test(char))) {
        evt.preventDefault();
      }
    }

      function isInputText(evt){
      var char = String.fromCharCode(evt.which);
      if (!(/[a-z]/.test(char))) {
        evt.preventDefault();
      }
    }

  </script>
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
