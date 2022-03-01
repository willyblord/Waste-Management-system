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
<script type="text/javascript">
        function populate(s1,s2){

            var s1= document.getElementById(s1);
            var s2= document.getElementById(s2);
            s2.innerHTML= "";
            if (s1.value == "Musanze") {
                var optionArray=["|","Cyabagarura|Cyabagarura","Garuka|Garuka","Kabazungu|Kabazungu","Nyarubuye|Nyarubuye","Rwambogo|Rwambogo"];
            }else if (s1.value == "Muhoza") {
                var optionArray=["|","Kigombe|Kigombe","Cyabararika|Cyabararika","Mpenge|Mpenge","Ruhengeri|Ruhengeri"];
            }else if (s1.value == "Cyuve") {
                var optionArray=["|","Rwebeya|Rwebeya","Kabeza|Kabeza","Bukinanyana|Bukinanyana","Buruba|Buruba","Cyanya|Cyanya","Migeshi|Migeshi"];
            }else if (s1.value == "Eastern") {
                var optionArray=["|","Kirehe|Kirehe","Ngoma|Ngoma","Kayonza|Kayonza","Rwamagana|Rwamagana","Nyagatare|Nyagatare","Gatsibo|Gatsibo","Bugesera|Bugesera"];
            }else if (s1.value == "Kigali") {
                var optionArray=["|","Kicukiro|Kicukiro","Nyarugenge|Nyarugenge","Gasabo|Gasabo"];
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
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title">
                Employee Management
            </h3>
          </div>
          
          <div class="row">
            <div class="col-lg-9">
              <div class="card">
                <div class="card-body">

                  <form action="quelly-employee.php" class="cmxform" method="post"  enctype="multipart/form-data">
                    <fieldset>
                      <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input name="firstname" id="name" class="form-control" type="text" onkeypress="isInputText(event)" required="">
                      </div>
                      <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input name="lastname" id="lname" class="form-control"  type="text" onkeypress="isInputText(event)" required="">
                      </div>
                      <div class="form-group">
                        <label for="username">Address</label>
                        <input name="address" id="address" class="form-control" type="text" required="">
                      </div>
                      <div class="form-group">
                        <label for="password">Telephone Number</label>
                        <input name="telephone" id="phone" class="form-control" type="text" onkeypress="isInputNumber(event)" maxlength="10" minlength="10" required="">
                      </div>

                      <div class="form-group">
                        <label for="username">National Id</label>
                        <input name="nid" id="nationalid" onkeypress="isInputNumber(event)" class="form-control" type="text" maxlength="16" minlength="16">
                      </div>

                       <div class="form-group">
                        <label for="username">Employee Role</label>
                        <select class="form-control" name="role" required="">
                        <option>--Select option Role--</option>
                        <option value="Reader">Reader</option>
                        <option value="Corrector">E-watse corrector</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="username">Sector</label>
                        <select class="form-control"  name="sector" id="slct1" onchange="populate(this.id,'slct2')" required="">
                                    <option selected disabled>Select Province</option>
                                      <option value="Muhoza">Muhoza</option>
                                      <option value="Cyuve">Cyuve</option>
                                      <option value="Musanze">Musanze</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="username">Cell</label>
                       <select name="cell" class="form-control" id="slct2" >
                          <option  selected disabled>...Select District...</option>
                        </select>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-group">
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="gender" id="optionsRadios1" value="Male" checked>
                              Male
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="gender" id="optionsRadios2" value="Female">
                              Female
                            </label>
                          </div>
                        </div>
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
      if (!(/[A-z]/.test(char))) {
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
