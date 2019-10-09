<?php

  require 'database.php';

  
  $message = '';


  if (empty($_POST['email'])) {
    $message = 'Please enter your email.';
  }elseif(!isValidPassword($_POST['password'])){
    $message = 'Password is not strong enough. You have to include 8 characters, at least 1 Uppercase, 1 Lowercase and 1 number.';
  }elseif(empty($_POST['password'])){
    $message = 'Please enter your password.';
  }elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $message = "Invalid email format";
  }elseif(empty($_POST['name']) || empty($_POST['lastName']) || empty($_POST['sLastName'])){
    $message = 'Please provide your full name.';
  }elseif(empty($_POST['username'])){
    $message = 'Your username is not valid.';
  }else{
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

  function isValidPassword($password){
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

    if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
      return false;
      echo 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
    }else{
      return true;
      echo 'Strong password.';
    }

  }

  echo $message;
?>



