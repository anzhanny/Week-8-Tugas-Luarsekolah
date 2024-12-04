<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <style>
    body {
      margin: 0;
      font-family: Poppins, sans-serif;
      height: 100vh;
      display: flex;
      position: relative;
    }

    .left-section, .right-section {
      width: 50%;
      height: 100vh;
    }

    .right-section {
      background-color: #C9E6F0;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 15px;
    }

    .left-section {
      background-image: url('bg-register.jpg');
      background-size: cover;
      background-position: center;
    }

    form {
      width: 100%;
      max-width: 100vh;
      padding: 20px;
    }

    input[type=text], input[type=password], input[type=email] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 10px;
    }

    input[type=text]:focus, input[type=password]:focus, input[type=email]:focus {
      background-color: #ddd;
      outline: none;
    }

    button {
      background-color: #04AA6D;
      color: white;
      padding: 14px 20px;
      border: none;
      cursor: pointer;
      width: 50%;
      opacity: 0.9;
      border-radius: 10px;

    }

    button:hover {
      opacity: 1;
      background-color: #00A1A1;
    }

    .clearfix::after {
      content: "";
      clear: both;
      display: table;
    }
  </style>
</head>
<body>
  <div class="left-section">
    
  </div>
  <div class="right-section">
  <form method="post">
      <h2>Sign Up</h2>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Masukan Username" name="uname" required>

      <label for="remail"><b>Email</b></label>
      <input type="email" placeholder="Masukan Email" name="remail" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Masukan Password" name="psw" required>

      <div class="clearfix">
        <button type="submit" class="signupbtn" name="register">Sign Up</button>
      </div>
    </form>
  </div>
</body>
</html>
