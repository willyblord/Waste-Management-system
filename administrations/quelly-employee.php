
                     <?php
                    include("../connection_e_wasterManagement.php");
                    if (isset($_POST['submit'])) {
                        $selectID = $db->prepare("SELECT nid FROM employee WHERE 
                            nid = '".$_POST['nid']."'");
                                $selectID->execute();
                                if($IDFound = $selectID->fetch()){
                                die("<script>
                                    alert('Employee exist');
                                    window.location= 'employee-management.php';
                                </script>");
                                }
                    $firstname=$_POST['firstname'];
                    $lastname=$_POST['lastname'];
                    $address=$_POST['address'];
                    $telephone=$_POST['telephone'];
                    $role=$_POST['role'];
                    $sector=$_POST['sector'];
                    $cell=$_POST['cell'];
                    $nid=$_POST['nid'];
                    $gender=$_POST['gender'];
                    $added_by=$_POST['added_by'];
                   $stmt=$db->prepare('INSERT INTO employee (firstname,lastname, address, telephone,role, sector, cell, nid, gender, added_by)VALUES(?,?,?,?,?,?,?,?,?,?)');
            $stmt->bindParam(1, $firstname);
            $stmt->bindParam(2, $lastname);
            $stmt->bindParam(3, $address);
            $stmt->bindParam(4, $telephone);
            $stmt->bindParam(5, $role);
            $stmt->bindParam(6, $sector);
            $stmt->bindParam(7, $cell);
            $stmt->bindParam(8, $nid);
            $stmt->bindParam(9, $gender);
            $stmt->bindParam(10, $added_by);
                         
    if($stmt->execute())
    {
    ?>
    <script>
        alert("New employee Added SuccessFully");
        window.location.href=('all-employee.php');
    </script>
    <?php
    }else

         {
     ?>
    <script>
        alert("Error");
        window.location.href=('employee-management.php');
    </script>
    <?php
     }
 }
?>