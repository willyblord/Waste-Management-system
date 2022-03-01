<body>
  <div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
      <!-- logo management -->
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center"
      style="background-color: #680d02; ">
        <a class="navbar-brand brand-logo" href="index.php" style="color: #ffffff;">Waste MGT</a>
        <a class="navbar-brand brand-logo-mini" href="index.php" style="color: #ffffff;">MGT</a>
      </div>
      <!-- end of logo -->
      <div class="navbar-menu-wrapper d-flex align-items-stretch" style="background-color: #680d02; ">
<!--         <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize" style="color: #fff;">
          <span class="fas fa-bars"></span>
        </button> -->
    
        <ul class="navbar-nav navbar-nav-right">

          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="fas fa-bell mx-0" style="color: #fff;"></i>
              <span class="count"><?php
                                require '../connection_e_wasterManagement.php';
                                 $stmt = $db->prepare("SELECT count(id) FROM notification WHERE status='Pending'");
                                 $stmt->execute();
                                 $count = $stmt->fetchColumn();
                                 ?><?php echo $count;?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have <?php
                                require '../connection_e_wasterManagement.php';
                                 $stmt = $db->prepare("SELECT count(id) FROM notification WHERE status='Pending'");
                                 $stmt->execute();
                                 $count = $stmt->fetchColumn();
                                 ?><?php echo $count;?> new notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
              </a>
                            <?php
                    $selectAllUsers = $db->prepare("SELECT * FROM notification WHERE status='Pending'");
                    $selectAllUsers->execute();
                    if ($allnotification = $selectAllUsers->fetch()) {
                        ?>
                        <?php
                                    do{
                                        ?>
              <div class="dropdown-divider"></div>
              <a href="view-notification.php?id=<?php echo $allnotification["id"]; ?>" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning" >
                    <i class="fas fa-wrench mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium"> <?php echo $allnotification['name'];?></h6>
                  <p class="font-weight-light small-text">
                    <?php echo $allnotification['sector'];?> | <?php echo $allnotification['cell'];?>
                  </p>
                </div>
              </a>
               <?php
                    }while($allnotification = $selectAllUsers->fetch());
                                ?>
                            </table>
                        <?php
                    }
                    else{
                        ?>
                            <div class="alert alert-danger-lg"> No new Notification found.</div>
                        <?php
                    }
                    ?>
            
            </div>
          </li>

          
          <li class="nav-item nav-profile dropdown" style="color: #fff;">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="images/faces/face5.jpg" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="changePassword.php">
                <i class="fas fa-cog text-primary"></i>
                Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="../logout.php" class="dropdown-item">
                <i class="fas fa-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
         <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="fas fa-bars"></span>
        </button>
      </div>
    </nav>
    
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials-->
      <nav class="sidebar sidebar-offcanvas" id="sidebar" style="background: #680d02;" >
        <ul class="nav" style="position: fixed; background: #fff; ">
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="fas fa-user"></i>&nbsp;&nbsp;
              <span class="menu-title">User Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                          <?php
if($userFound['p1'] == 1){
?>
                <li class="nav-item"> <a class="nav-link" href="usermanagement.php">Add New User</a></li>
                <?php
              }
              ?>
                        <?php
if($userFound['p2'] == 1){
?>
                <li class="nav-item"> <a class="nav-link" href="all-user.php">All Active User</a></li>
                <?php
              }
              ?>
              </ul>
              </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="fas fa-users"></i>&nbsp;&nbsp;
              <span class="menu-title">Employee Management</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                          <?php
if($userFound['p3'] == 1){
?>
                <li class="nav-item"> <a class="nav-link" href="employee-management.php">Add New Employee</a></li>
                <?php
              }
                ?>
                          <?php
if($userFound['p4'] == 1){
?>
                <li class="nav-item"> <a class="nav-link" href="all-employee.php">All Employee</a></li>
                <?php
              }
              ?>
               
              </ul>
            </div>
          </li>
        <?php
          if($userFound['p5'] == 1){
          ?>
          <li class="nav-item">
            <a class="nav-link" href="populationsManagement.php">
              <i class="fas fa-allergies menu-icon"></i>&nbsp;&nbsp;
              <span class="menu-title">All Subscribers</span>
            </a>
          </li>
          <?php
        }
        ?>
                  <?php
if($userFound['p6'] == 1){
?>
          <li class="nav-item">
            <a class="nav-link" href="wasterange.php">
              <i class="fas fa-recycle"></i>&nbsp;&nbsp;
              <span class="menu-title">Collection Point</span>
            </a>
          </li>
          <?php
        }
        ?>
                  <?php
if($userFound['p7'] == 1){
?>
          <li class="nav-item">
            <a class="nav-link" href="allwasterange.php">
              <i class="fas fa-arrow-alt-circle-up menu-icon"></i>&nbsp;&nbsp;
              <span class="menu-title">All collection Point</span>
            </a>
          </li>
          <?php
        }
        ?>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="fas fa-bug"></i>&nbsp;&nbsp;
              <span class="menu-title">Daily Employee Schedule</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                         <?php
if($userFound['p8'] == 1){
?>
                <li class="nav-item"> <a class="nav-link" href="schedule.php">Add Schedule</a></li>
                <?php
              }
              ?>
                        <?php
if($userFound['p9'] == 1){
?>
                <li class="nav-item"> <a class="nav-link" href="daily-report.php">Daily Schedule Report</a></li>
                <?php
              }
              ?>
                        <?php
if($userFound['p10'] == 1){
?>
                <li class="nav-item"> <a class="nav-link" href="weekely_report.php">Weekly Schedule Report</a></li>
                <?php
              }
              ?>
                        <?php
if($userFound['p11'] == 1){
?>
                <li class="nav-item"> <a class="nav-link" href="nealy_report.php">Mounthly Schedule Report</a></li>
                <?php
              }
              ?>
              </ul>
            </div>
          </li>
                    <?php
if($userFound['p12'] == 1){
?>
          <li class="nav-item">
            <a class="nav-link" href="all-notofication.php">
              <i class="far fa-file-alt menu-icon"></i>&nbsp;&nbsp;
              <span class="menu-title">All Notifications</span>
            </a>
          </li>
          <?php
        }
        ?>
                  <?php
if($userFound['p13'] == 1){
?>

          <li class="nav-item">
            <a class="nav-link" href="send-compaign.php">
              <i class="fab fa-accessible-icon menu-icon"></i>&nbsp;&nbsp;
              <span class="menu-title">Send Campaign </span>
            </a>
          </li>
          <?php
        }
        ?>
        </ul>
      </nav>
      <!-- partial -->