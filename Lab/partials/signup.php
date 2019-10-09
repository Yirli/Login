<?php

  require 'database.php';

  
  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (email, password,name,lastName,sLastName,username,cellphone,phone,phoneCode) VALUES (:email,:password,:name,:lastName,:sLastName,:username,:cellphone,:phone,:phoneCode)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':lastName', $_POST['lastName']);
    $stmt->bindParam(':sLastName', $_POST['sLastName']);
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':cellphone', $_POST['cellphone']);
    $stmt->bindParam(':phone', $_POST['phone']);
    $stmt->bindParam(':phoneCode', $_POST['phoneCode']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
   
      
    if ($stmt->execute()) {
      $message = 'Successfully created new user';
    } else {
      $message = 'Sorry there must have been an issue creating your account';
    }
  }
?>



