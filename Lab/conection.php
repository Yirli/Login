<?php

class conection{
	$server;
	$username;
	$password;
	$database;


	function __construct($server, $username, $password, $database){
		$this.server = $server;
		$this.username = $username;
		$this.password = $password;
		$this.database = $database;
	}

	public function connect(){
		$conn;
		try {
			$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
		} catch (PDOException $e) {
			die('Connection Failed: ' . $e->getMessage());
		}
		return $conn;
	}

	public function login(){
		$conn = connect();

		if($conn == null){
			return "Conexion no establecida."
		}

  		if (!empty($_POST['email']) && !empty($_POST['password'])) {
			$records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
			$records->bindParam(':email', $_POST['email']);
			$records->execute();
			$results = $records->fetch(PDO::FETCH_ASSOC);

			  
			$message = '';

			if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
			  $_SESSION['user_id'] = $results['id'];
			  header("Location: /login/index.php");
			} else {
			  $message = 'Sorry, those credentials do not match';
			}
		}
		return $message;
	}

	public function signup(){
		$message = '';


	  if (empty($_POST['email'])) {
	    $message = 'Please enter your email';
	  }elseif(!isValidPassword($_POST['password'])){
	    $message = 'Password is not strong enough. You have to include 8 characters, at least 1 Uppercase, 1 Lowercase and 1 number.';
	  }elseif(empty($_POST['password'])){
	    $message = 'Please enter your password';
	  }elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	    $message = "Invalid email format";
	  }elseif(empty($_POST['name']) || empty($_POST['lastName']) || empty($_POST['sLastName'])){
	    $message = 'Please provide your full name.';
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
	  return $message;
	}


}
