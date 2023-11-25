<?php
include "conn.php";

if(isset($_POST['submit'])) {
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $Passwords = $_POST['Passwords'];
   
   $sql = "INSERT INTO client (FirstName,LastName,Passwords$Passwords) VALUES('$FirstName','$LastName','$Passwords')";
   if($conn ->query($sql)) {
    $_SESSION ['success'] = "true";
   } else {
    $_SESSION ['error'] = "gabisa";
   }
}
header("Location:index.php");
?>