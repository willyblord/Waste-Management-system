
                     <?php
                         include("../connection_e_wasterManagement.php");
                      if (isset($_POST['submit'])) {
                    $name=$_POST['name'];
                    $sector=$_POST['sector'];
                    $cell=$_POST['cell'];
                    $phone=$_POST['phone'];
                    $message=$_POST['message'];
                
                     $stmt=$db->prepare('INSERT INTO notification (name,sector, cell,phone,message)VALUES(?,?,?,?,?)');
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $sector);
            $stmt->bindParam(3, $cell);
            $stmt->bindParam(4, $phone);
            $stmt->bindParam(5,$message);
                         
    if($stmt->execute())
    {
    ?>
    <script>
        alert("Urakoze Kumusanzu wawe mugusukura umugi wacu wa musanze");
        window.location.href=('population-notification');
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