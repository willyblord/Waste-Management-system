    <?php
    if (isset($_POST['submit'])) {
    // configuration
    include("../connection_e_wasterManagement.php");
    // new data
  
    $status=$_POST['status'];
    $id = $_POST['namids'];
    // query
    $sql = "UPDATE notification
            SET status=?
            WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($status,$id));
    echo "Notification Activeted";
    header("location: all-employee.php");
}
    
     
    ?>