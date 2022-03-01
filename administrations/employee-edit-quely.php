    <?php
    if (isset($_POST['submit'])) {
    // configuration
    include("../connection_e_wasterManagement.php");
    // new data
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $telephone =$_POST['telephone'];
    $nid=$_POST['nid'];
    $gender=$_POST['gender'];
    $role=$_POST['role'];
    $id = $_POST['namids'];
    // query
    $sql = "UPDATE employee
            SET firstname=?, lastname=?, address=? , telephone=?, nid=?, gender=?, role=?
            WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($firstname,$lastname,$address,$telephone,$nid, $gender,$role,$id));
    echo "data are Updated";
    header("location: all-employee.php");
}
    
     
    ?>