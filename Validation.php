<?php
	
	class Validation {

		public $errors;

		public function __construct(){
			$errors = array();
		}

		public function emptyFieldsSignUp(){
			
		  if (empty($_POST['email'])) {
		    $errors->push('Please enter your email <br>');
		  }if(empty($_POST['password'])){
		    $errors->push('Please enter your password <br>');
		  }if(empty($_POST['name']) || empty($_POST['lastName']) || empty($_POST['sLastName'])){
		    $errors->push('Please provide your full name <br>');
		  }if(empty($_POST['cellphone'])){
		    $errors->push('Please enter your cellphone <br>');
		  }if(empty($_POST['phone'])){
		    $errors->push('Please enter your phone <br>');
		  }if(empty($_POST['phoneCode'])){
		    $errors->push('Please enter your phoneCode <br>');
		  }if(empty($_POST['username'])){
		    $errors->push('Please enter your username <br>');
		  }
		}

		public function emptyFieldsLogin(){	
			$flag = false;
			if (empty($_POST['username'])) {
		    	echo"Please enter your username <br>";
		    	$flag = true;
		  	}
		  	if(empty($_POST['password'])){
		    	echo"Please enter your password <br>";
		    	$flag = true;
			}
			return $flag;
		}

		public function isValidPassword($password){
		    $uppercase = preg_match('@[A-Z]@', $password);
		    $lowercase = preg_match('@[a-z]@', $password);
		    $number    = preg_match('@[0-9]@', $password);

		    if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
		      return false;
		      $errors->push('Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.');
		    }else{
		      return true;
		      
		    }

		}
	}

?>