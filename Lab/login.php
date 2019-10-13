<?php
require 'DBConnection.php';
session_start();
  if(!empty($_POST['username']) && !empty($_POST['password'])){
    $dbConn = new DBConnection();
    if($dbConn->verifyLogin($_POST['username'],$_POST['password']))
    header('Location: index.php');
    else
      $message = "Those credentials do not match"; 
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>

    <h1>Login</h1>
    <span>or <a href="signup.php">SignUp</a></span>

    <form action="login.php" method="POST">
        <input name="username" type="text" placeholder="Enter your username">
        <input name="password" type="password" placeholder="Enter your password">

      <input type="submit" value="Submit">
    </form>
  </body>
</html>

