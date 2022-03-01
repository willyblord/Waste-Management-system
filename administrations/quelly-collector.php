
                     <?php
                         include("../connection_e_wasterManagement.php");
                      if (isset($_POST['submit'])) {
                    $sector=$_POST['sector'];
                    $cell=$_POST['cell'];
                    $cordinate=rand()*100;
                    
                    $added_by=$_POST['added_by'];
                
                     $stmt=$db->prepare('INSERT INTO waste_range (sector, cell, cordinate,added_by)VALUES(?,?,?,?)');
            $stmt->bindParam(1, $sector);
            $stmt->bindParam(2, $cell);
            $stmt->bindParam(3, $cordinate);
            $stmt->bindParam(4,$added_by);
                         
    if($stmt->execute())
    {
    ?>
    <script>
        alert("corrector point Added well");
        window.location.href=('wasterange.php');
    </script>
    <?php
    }else

         {
     ?>
    <script>
        alert("Error");
        window.location.href=('wasterange.php');
    </script>
    <?php
     }
 }
?>