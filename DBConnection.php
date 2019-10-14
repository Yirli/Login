<?php
require 'User.php';

class DBConnection{

	private $conn;

	public function __construct(){
		$this->conn = new mysqli("localhost", "root", "", "login");
		$this->errors = [];
		if(mysqli_connect_error()){
			die("Connection failed");
		}
	}

	public function __destruct(){
		$this->conn->close();
	}

	public function getUserInfo($username){
		$sql = "SELECT * from users where username = '$username'";
		$result = mysqli_query($this->conn,$sql);

		if(mysqli_num_rows($result) > 0){
			$user = mysqli_fetch_assoc($result);
			echo "User found <br>";
			return new User(
				$user['id'],
				$user['email'],
				$user['password'],
				$user['name'],
				$user['lastName'],
				$user['sLastName'],
				$user['username'],
				$user['cellphone'],
				$user['phone'],
				$user['phoneCode']
			);
		}

		else {
			echo "User not found <br>";
			return null;
		}
	}

	public function verifyLogin($username,$password){
		$sql = "SELECT password from users where username = '$username'";
		$result = mysqli_query($this->conn,$sql);

		if(mysqli_num_rows($result) > 0){

			$user= mysqli_fetch_assoc($result);

			if($user['password']==$password){
				echo "Successfully login <br>";
				return true;

			}
			else{
				echo "Incorrect password <br>";
				return false;
			}
		}
		else{
			echo "User not found <br>";
			return false;
		}

	}

	public function insertUser($email,$password,$name,$lastName,$sLastName,$username,$cellphone,$phone,$phoneCode){

		$sql = "INSERT into users (email,password,name,lastName,sLastName,username,cellphone,phone,phoneCode) values ('$email','$password','$name','$lastName','$sLastName','$username','$cellphone','$phone','$phoneCode')";

		if ( $this->conn->query($sql) ) {
    		echo "New record created successfully <br>";
		} else {
		    echo "Error: " . $sql . "<br>" . $this->conn->error. "<br>";
		}

	}

	public function updatePassword($username,$oldPassword,$newPassword){
	

	if($this->verifyLogin($username,$oldPassword)){
		$sql2 = "UPDATE users set password = '$newPassword' where username = '$username'";
		echo "password updated";
	}

}
}



////TESTING
//$dbConn = new DBConnection();
//$dbConn->insertUser("Yir@gmail.com","123","Yirli","Mejias","Rodriguez","ymejas","623195870", "22785012","506");
//$dbConn->getUserInfo("ymejas")->showUser();
//$dbConn->verifyLogin("ymejas","123");
//$dbConn->updatePassword("ymejas","123","456");
/*$user = new User(1,"Yir@gmail.com","123","Yirli","Mejias","Rodriguez","ymejas","623195870", "22785012","506");
$user->showUser();*/
?>
