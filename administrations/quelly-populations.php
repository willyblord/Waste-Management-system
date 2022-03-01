
                     <?php
                         include("../connection_e_wasterManagement.php");
                      if (isset($_POST['submit'])) {
                    $firstname=$_POST['firstname'];
                    $lastname=$_POST['lastname'];
                    $country=$_POST['country'];
                    $national_id=$_POST['national_id'];
                    $phone=$_POST['phone'];
                    $province=$_POST['province'];
                    $district=$_POST['district'];
                    $cells=$_POST['cells'];
                    $akagari=$_POST['akagari'];

                    $stmt= $db->prepare("
                                INSERT INTO population (
                                    firstname, 
                                    lastname,
                                    country, 
                                    national_id, 
                                    phone, 
                                    province, 
                                    district, 
                                    cells, 
                                    akagari
                                ) 
                                VALUES(
                                    '".$_POST['firstname']."', 
                                    '".$_POST['lastname']."', 
                                    '".$_POST['country']."', 
                                    '".$_POST['national_id']."', 
                                    '".$_POST['phone']."', 
                                    '".$_POST['province']."',
                                    '".$_POST['district']."',
                                    '".$_POST['cells']."',
                                    '".$_POST['akagari']."'

                                ) 
                            ");

            if($stmt->execute())
            {
            ?>
            <script>
                alert("new record successfully Uploaded");
                window.location.href=('populationManagement.php');
            </script>
            <?php
            }else
 
                 {
             ?>
            <script>
                alert("Error");
                window.location.href=('populationManagement.php');
            </script>
            <?php
             }
           
            
            }

     ?>