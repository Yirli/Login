<?php
// Include necessary file
require_once('./db.inc.php');

// Check if user is already logged in
if ($user->is_logged_in()) {
    // Redirect logged in user to their home page
    $user->redirect('home.php');
}

// Check if log-in form is submitted
if (isset($_POST['Change'])) {
    // Retrieve form input
    $user_password = trim($_POST['user_password']);

    // Check for empty and invalid inputs
    if (empty($user_password)) {
        array_push($errors, "Please enter a valid password.");
    } else {
        // Check if the user may be logged in
        if ($user->editPassword($user_password)) {
            // Redirect if logged in successfully
            $user->redirect('home.php');
        } else {
            array_push($errors, "Incorrect log-in credentials.");
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Web | Login</title>
</head>

<body>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="login.php">Log In</a></li>
    <li class="breadcrumb-item"><a href="register.php">Register</a></li>
</ol>
<h1>Welcome</h1>

<?php if (count($errors) > 0): ?>
    <p>Error(s):</p>
    <ul>
        <?php foreach ($errors as $error):
            echo $error; endforeach
        ?>
    </ul>
<?php endif ?>


<h2>Change password</h2>
<form action="password.php" method="POST">

    <input name="user_password" type="password" placeholder="Enter your new password">

    <input type="submit" name="Change" value="Change">
</form>

</body>
</html>