<?php
// Include necessary file
require_once('./db.inc.php');

// Check if user is already logged in
if (!$user->is_logged_in()) {
    // Redirect logged in user to their home page
    $user->redirect('login.php');
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
            array_push($errors, "Password successfully changed.");

        } else {
            array_push($errors, "There's an error.");
        }
    }
}

if (isset($_GET['logout']) && ($_GET['logout'] == 'true')) {
    $user->log_out();
    $user->redirect('login.php');
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
    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
    <li class="breadcrumb-item"><a href="?logout=true">Log Out</a></li>
</ol>

<?php if (count($errors) > 0): ?>
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