<?php
require 'config.php';

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username ='$username' OR email='$email'");

    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Username or email is already taken. Please choose a different one.');</script>";
    } else {
        if ($password == $confirmpassword) {
            $query = "INSERT INTO tb_user (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";
            mysqli_query($conn, $query);
            echo "<script>alert('Registration Success.');</script>";
        } else {
            echo "<script>alert('Password Not Match.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="./css/style.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body class="login">
    
    <div class="back">
      
    <div class="center">
      <h1>Login</h1>


      <form class="" action="" method="post" autocomplete="off">

        <div class="txt_field">
        <input type="text" name="name" id="name" required value=""> <br>
          <span class="error-message"></span>
          <label for="name"> Name : </label>
        </div>


        <div class="txt_field">
        <input type="text" name="username" id="username" required value=""> <br>
          <span class="error-message"></span>
          <label for="username"> Username : </label>
        </div>

        <div class="txt_field">
        <input type="email" name="email" id="email" required value=""> <br>
          <span class="error-message"></span>
          <label for="email"> Email : </label>
        </div>
        
        <div class="txt_field">
        <input type="password" name="password" id="password" required value=""> <br>
          <span class="error-message"></span>
          <label for="password"> Password : </label>
        </div>

        <div class="txt_field">
        <input type="password" name="confirmpassword" id="confirmpassword" required value=""> <br>
          <span class="error-message"></span>
          <label for="confirmpassword"> Confirm password : </label>
        </div>
        
        <input type="submit" name="submit" value="Register">
        <div class="signup_link">
          Already have account? <a href="login.php">Login</a>
        </div>
      </form>
    </div>
  </div>
  <script type="text/javascript" src="login.js"></script>    
  </body>
</html>