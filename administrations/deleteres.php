<?php

$mysqli_hostname = "localhost";
$mysqli_user = "root";
$mysqli_password = "";
$mysqli_database = "e_waste";
$prefix = "";
$conn = mysqli_connect($mysqli_hostname, $mysqli_user, $mysqli_password,$mysqli_database) or die("Could not connect database");

if($_GET['id'])
{
$id=$_GET['id'];
 $sql = "delete from users where id='$id'";
 mysqli_query($conn, $sql);
}


?>