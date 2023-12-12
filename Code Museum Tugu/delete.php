<?php 

include 'config.php';

$id = $_GET['Id'];
 

mysqli_query($conn,"delete from event where Id_Event='$id'");
 
header("location:admin1.php");
 
?>