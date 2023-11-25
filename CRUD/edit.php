<?php

include "conn.php";
$id = $_GET ['edit'];

$sql = "SELECT * FROM client WHERE id = '$id'";
$query =$conn->query($sql);
$row = $query->fetch_assoc();
?>



<form action="update.php" method="post" >
<table width="100%">
<tr>
        <td>Id</td>
        <td><input type="text" value="<?=$row['id'] ;?>" name="id" required></td>
</tr>
<tr>
        <td>FirstName</td>
        <td><input type="text" value="<?=$row['FirstName'] ;?>" name="FirstName" required></td>
</tr>
<tr>
        <td>LastName</td>
        <td><input type="text" value="<?=$row['LastName'] ;?>" name="LastName" required></td>
</tr>
<tr>
        <td>password</td>
        <td><input type="text" value="<?=$row['Passwords'] ;?>" name="Passwords" required></td>
</tr>
<tr>
<td></td>
<td><button type="submit" name="submit">UPDATE</button></td>
</tr>
</table>