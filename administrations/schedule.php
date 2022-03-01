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
            if (s1.value == "Cyuve") {
                var optionArray=["|","Rwebeya|Rwebeya","Kabeza|Kabeza","Bukinanyana|Bukinanyana","Buruba|Buruba","Cyanya|Cyanya","Migeshi|Migeshi"];
            }else if (s1.value == "Muhoza") {
                var optionArray=["|","Kigombe|Kigombe","Cyabararika|Cyabararika","Mpenge|Mpenge","Ruhengeri|Ruhengeri"];
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
  <title>Waste Management | schedule</title>
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
                Schedules
            </h3>
          </div>
          
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                   <a onclick="window.location.href='muhozasector.php';" id="twn" title="Bugesera District">
                  <button type="button" class="btn btn-primary" style="background: #454545;">
                    Muhoza Sector <span class="badge badge-light">9</span>
                    <span class="sr-only">unread messages</span>
                  </button>
                </a>
                  <a onclick="window.location.href='cyuveSector.php';" id="twn" title="Bugesera District">
                  <button type="button" class="btn btn-primary" style="background: #454545;">
                    Cyuve Sector <span class="badge badge-light">9</span>
                    <span class="sr-only">unread messages</span>
                  </button>
                </a>
                 <a onclick="window.location.href='musanzesector.php';" id="twn" title="Bugesera District">
                  <button type="button" class="btn btn-primary" style="background: #454545;">
                    Musanze Sector <span class="badge badge-light">9</span>
                    <span class="sr-only">unread messages</span>
                  </button>
                </a>
                 <a onclick="window.location.href='kimonyiSector.php';" id="twn" title="Bugesera District">
                  <button type="button" class="btn btn-primary" style="background: #454545;">
                    Kimonyi Sector <span class="badge badge-light">9</span>
                    <span class="sr-only">unread messages</span>
                  </button>
                </a>

                  
                </div>
              </div>
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
