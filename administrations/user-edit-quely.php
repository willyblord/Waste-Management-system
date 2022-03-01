    <?php
    if (isset($_POST['submit'])) {
    // configuration
    include("../connection_e_wasterManagement.php");
    // new data
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $phone =$_POST['phone'];
    $email =$_POST['email'];
    $status=$_POST['status'];

    $id = $_POST['namids'];
    // query
    $sql = "UPDATE users
            SET first_name=?, last_name=?, address=? , phone=?, email=?, status=?
            WHERE id=?";
    $q = $db->prepare($sql);
    $q->execute(array($first_name,$last_name,$address,$phone,$email,$status,$id));
    echo "User are Updated";
    header("location: all-user.php");
}
    
     
    ?>