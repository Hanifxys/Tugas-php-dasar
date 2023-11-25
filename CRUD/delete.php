<?php
include "conn.php";

 $id=$_GET['delete'];

 $sql = "DELETE FROM client WHERE id = '$id'";

 if ($conn->query($sql )) {
$_SESSION ['success'] = "berhasil_delete" ;
 }else {
    $_SESSION ['error'] = "gagal_delete";
}

header("Location:index.php");
?>