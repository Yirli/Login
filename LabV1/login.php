<?php
require 'DBConnection.php';
require 'Validation.php';
session_start();
$validate = new Validation();

if (isset($_POST["Login"])){
    if ($validate->emptyFieldsLogin()) {
        $dbConn = new DBConnection();
        if ($dbConn->verifyLogin($_POST['username'], $_POST['password']))
            header('Location: login.php');
        else
            $message = "Those credentials do not match";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="login.php">Log In</a></li>
    <li class="breadcrumb-item"><a href="signup.php">Sign Up</a></li>
</ol>
<body>

<h1>Login</h1>

<?php if (!empty($message)): ?>
    <p> <?= $message ?></p>
<?php endif; ?>

<form action="login.php" method="POST">
    <input name="username" type="text" placeholder="Enter your username">
    <input name="password" type="password" placeholder="Enter your password">
    <input type="submit" value="Login">
</form>
</body>
</html>

