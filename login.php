<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      height: 100vh;
      display: flex;
    }

    .left-section, .right-section {
      width: 50%;
      height: 100%;
    }

    .right-section {
      background-color: #78B3CE;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .left-section {
      background-image: url('bg-login.jpg'); 
      background-size: cover;
      background-position: center;
    }

    form {
      width: 100%;
      max-width: 100vh;
      padding: 20px;
    }

    input[type=text], input[type=password] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 10px;
    }

    input[type=text]:focus, input[type=password]:focus {
      background-color: #ddd;
      outline: none;
    }

    button {
      background-color: #04AA6D;
      color: white;
      padding: 14px 20px;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
      border-radius: 10px;
    }

    button:hover {
      opacity: 1;
      background-color: #00A1A1;
    }

    .imgcontainer {
      text-align: center;
      margin: 24px 0 12px 0;
    }

    img.avatar {
      width: 40%;
      border-radius: 50%;
    }

    span.psw {
      float: right;
      padding-top: 16px;
    }

    @media screen and (max-width: 768px) {
      .left-section, .right-section {
        width: 100%;
      }

      .right-section {
        display: none; /* Sembunyikan latar belakang di layar kecil */
      }
    }
  </style>
</head>
<body>

  <div class="left-section">
    
  </div>

  <div class="right-section">
  <form method="post">
      <h2 align="center">Login</h2>
      <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Masukan Username" name="uname" required>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Masukan Password" name="psw" required>
            
        <button type="submit" name="login">Login</button>
      </div>
    </form>
  </div>

</body>
</html>
