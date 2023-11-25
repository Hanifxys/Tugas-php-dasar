<?php
include "conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD OPERATION</title>
</head>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
}

h1 {
    font-size: 2.5em;  /* Large font size */
    color: #007BFF;  /* Matching the color used for buttons */
    text-align: center;  /* Centers the text */
    margin-top: 20px;  /* Space at the top */
    margin-bottom: 30px;  /* Space at the bottom */
    font-weight: 600;  /* Slightly bold */
    letter-spacing: 1.5px;  /* Spacing between characters */
    text-transform: uppercase;  /* Makes the text all uppercase */
    border-bottom: 3px solid #007BFF;  /* Adds a bottom border */
    display: inline-block;  /* Ensures the border hugs the text */
    padding-bottom: 10px;  /* Space between the text and the border */
}


#divheader {
    margin: auto;
    width: 80%;
    max-width: 730px;
    padding: 20px;
    border-radius: 10px;
    background-color: #fff;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
}

input[type=text] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px;
    outline: none;
    transition: border 0.3s;
}

input[type=text]:focus {
    border: 1px solid #007BFF;
}

button {
    padding: 8px 15px;
    background-color: #007BFF;
    border: none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
}

button:hover {
    background-color: #0056b3;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    margin: 20px 0;  /* Add some space between the form and table */
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
}

table, th, td {
    border: 1px solid #ddd;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #f2f2f2;
}

a {
    padding: 6px 10px;
    text-decoration: none;
    color: #fff;
    border-radius: 5px;
    transition: background-color 0.3s;
}

a[href*="edit"] {
    background-color: #FFC107;
}

a[href*="delete"] {
    background-color: #FF5722;
}

a[href*="edit"]:hover {
    background-color: #e0a800;
}

a[href*="delete"]:hover {
    background-color: #e04a00;
}

@keyframes bounceIn {
    0% {
        transform: scale(0.95);
        opacity: 0.5;
    }
    70% {
        transform: scale(1.05);
        opacity: 1;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

form {
    animation: bounceIn 0.8s forwards;  
}



</style>
<body>
    <div id="divheader">
        <form action="insert.php" method="post" >
            <table width="200%">
                <h1>crud_db</h1>
<tr>
                    <td>FirstName</td>
                    <td><input type="text"  name="FirstName" required></td>
</tr>
<tr>
                    <td>LastName</td>
                    <td><input type="text"  name="LastName" required></td>
</tr>
<tr>
                    <td>password</td>
                    <td><input type="text"  name="Passwords" required></td>
</tr>
<tr>
    <td></td>
    <td><button type="submit" name="submit">Register</button></td>
    </tr>
</table>
</form>
<?php
if (isset($_SESSION['success'])) {
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
echo $_SESSION['error'];
    unset($_SESSION['error']);
}
?>

<table border="1" width="100%" >
<tr>
    <th>FirstName</th>
    <th>LastName</th>
    <th>password</th>
   <th>ACTION</th>
   </tr>
   <?php
 $sql = "SELECT * FROM client ORDER BY LastName ASC";
$query = $conn->query($sql);
while ($row=$query->fetch_assoc()) {

    ?>
    <tr>
    <td><?= $row['FirstName']; ?></td>
    <td><?= $row['LastName']; ?></td>
    <td><?= $row['Passwords']; ?></td>
    <td align="right">

    <a href="edit.php?edit=<?= $row['id']; ?>">Edit</a>
<a href="delete.php?delete=<?= $row['id']; ?>">Delete</a>
    </td>
    </tr>
<?php } ?>
</table>
    </div>
        
    
</body>
</html>