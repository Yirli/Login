<?php
require 'DBConnection.php';
require 'Validation.php';

$validate = new Validation();

if (isset($_POST["Register"])) {
    if ($validate->emptyFieldsSignUp() && $validate->isValidPassword($_POST["password"])) {
        $dbConn = new DBConnection();
        $dbConn->insertUser($_POST["email"], $_POST["password"], $_POST["name"], $_POST["lastName"],
            $_POST["sLastName"], $_POST["username"], $_POST["cellphone"], $_POST["phone"], $_POST["phoneCode"]);
        $message = "User registered";
    } else{
        $message = "Not registered.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="login.php">Log In</a></li>
    <li class="breadcrumb-item"><a href="signup.php">Sign Up</a></li>
</ol>
<body>

<?php if (!empty($message)): ?>
    <p> <?= $message ?></p>
<?php endif; ?>

<h3>Sign Up</h3>

<form action="signup.php" method="POST">
    <input name="name" type="text" placeholder="Nombre">
    <input name="lastName" type="text" placeholder="Primer Apellido">
    <input name="sLastName" type="text" placeholder="Segundo Apellido">
    <input name="username" type="text" placeholder="Nombre de Usuario">
    <input name="email" type="text" placeholder="Email">
    <input name="phoneCode" type="text" placeholder="Código de Área">
    <input name="cellphone" type="text" placeholder="Celular">
    <input name="phone" type="text" placeholder="Telefono">
    <input name="password" type="password" placeholder="Contraseña">
    <input type="submit" value="Register">
</form>

</body>
</html>

