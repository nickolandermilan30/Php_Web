<?php
require 'config.php';

if (isset($_POST["submit"])) {
    $usernameemail = $_POST["usernameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            session_start();
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: Index.php");
        } else {
            echo "<script> alert('Wrong Password.');</script>";
        }
    } else {
        echo "<script> alert('User Not Found.');</script>";  
    }
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="./css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
<form class="" action="" method="post" autocomplete="off">
        <label for="usernameemail"> Username or Email </label>
        <input type="text" name="usernameemail" id="usernameemail" required value=""> <br>

        <label for="password"> Password </label>
        <input type="password" name="password" id="password" required value=""> <br>

        <button type="submit" name="submit">Login</button>
</form>
<br>
<a href="register.php">Registration</a>
</body>
</html>