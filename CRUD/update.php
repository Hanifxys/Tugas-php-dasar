<?php
include "conn.php";

if (isset($_POST ['submit'] )) {

    $id = $_POST['id'];
    $FirstName = $_POST['FirstName'];
    $lastName = $_POST['LastName'];
    $Passwords = $_POST['Passwords'];
}
    $sql = "UPDATE client SET FirstName =' $FirstName', LastName = '$lastName', Passwords = '$Passwords' WHERE id = '$id'";

if ($conn->query($sql)) {
    $_SESSION ['success'] = "Successfully";
}else {
        $_SESSION ['error'] = "Error gagal ";
    }


    header ("location:index.php");
?>



