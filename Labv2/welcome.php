<?php
include('session.php');
?>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<head>
    <title>Welcome </title>
</head>

<body>
<h1 align="center" style="margin: 50px;">Welcome <?php echo $_SESSION['login_user']; ?></h1>
<h2 align="center"><a href = "logout.php" class="button">Sign Out</a></h2>
</body>

</html>
