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
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log In</title>
    <link rel="icon" href="logo (2).png">
    <link href="./css/style.css" rel="stylesheet">
  </head>
  <body class="login">
    <div class="back">
      
    <div class="center">
      <h1>Login</h1>
      <form action="login.php" method="post" class="loginForm">
        <div class="txt_field">
          <input type="text" name="usernameemail" id="username" class="input" required>
          <span class="error-message"></span>
          <label for="usernameemail" class="label">Username or Email</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" id="password" class="input" required>
          <span class="error-message"></span>
          <label for="password" class="label">Password</label>
        </div>
        
        
        <input type="submit" name="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="register.php">Signup</a>
        </div>
      </form>
    </div>
  </div>
  <script type="text/javascript" src="login.js"></script>    
  </body>
</html>

