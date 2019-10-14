<?php

	class User {
		private $id;
		private $email;
		private $password;
		private $name;
		private $lastName;
		private $sLastName;
		private $username;
		private $cellphone;
		private $phone;
		private $phoneCode;


		public function __construct($id,$email,$password,$name,$lastName,$sLastName,$username,$cellphone,$phone,$phoneCode){
			$this->id = $id;
			$this->email = $email;
			$this->password = $password;
			$this->name = $name;
			$this->lastName = $lastName;
			$this->sLastName= $sLastName;
			$this->username= $username;
			$this->cellphone = $cellphone;
			$this->phone = $phone;
			$this->phoneCode = $phoneCode;
		}

		public function showUser(){
			echo "id: $this->id, email: $this->email,name: $this->name, last name: $this->lastName, Second Last Name: $this->sLastName,username: $this->username ,cellphone: $this->cellphone, phone: $this->phone, phone code: $this->phoneCode <br>";
		}

	}

?>