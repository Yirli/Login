<?php
include("config.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // username and password sent from form

    $myusername = mysqli_real_escape_string($db, $_POST['username']);
    $mypassword = mysqli_real_escape_string($db, $_POST['password']);

    $sql = "SELECT idUsuario FROM usuario WHERE nombreUsuario = '$myusername' and contrasenna = '$mypassword'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['active'];

    $count = mysqli_num_rows($result);

    // If result matched $myusername and $mypassword, table row must be 1 row

    if ($count == 1) {
        $_SESSION['login_user'] = $myusername;

        header("location: welcome.php");
    } else {
        $error = "Your Login Name or Password is invalid";
    }
}
?>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="css/login.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab">Iniciar
            Sesión</label>
        <input id="tab-2" type="radio" name="tab" class="for-pwd"><label for="tab-2" class="tab">Registrarse</label>
        <div class="login-form">
            <div class="sign-in-htm">
                <form action="" method="post">
                    <div class="group">
                        <label for="user" class="label">Nombre de Usuario</label>
                        <input type="text" name="username" class="input">
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Contraseña</label>
                        <input type="password" name="password" class="input" data-type="password">
                    </div>
                    <div class="group">
                        <input type="submit" value="Sign In" class="button">
                    </div>
                    <div class="hr"></div>
                </form>
            </div>

            <div class="for-pwd-htm">
                <div class="group">
                    <label for="user" class="label">Nombre</label>
                    <input id="nombre" type="text" class="input">
                </div>
                <div class="group">
                    <label for="user" class="label">Primer Apellido</label>
                    <input id="pApellido" type="text" class="input">
                </div>
                <div class="group">
                    <label for="user" class="label">Segundo Apellido</label>
                    <input id="sApellido" type="text" class="input">
                </div>
                <div class="group">
                    <label for="user" class="label">Correo</label>
                    <input id="correo" type="text" class="input">
                </div>
                <div class="group">
                    <label for="user" class="label">Nombre de Usuario</label>
                    <input id="nombreUsuario" type="text" class="input">
                </div>
                <div class="group">
                    <label for="user" class="label">Contraseña</label>
                    <input id="contraseña" type="password" class="input">
                </div>
                <div class="group">
                    <label for="user" class="label">Teléfono</label>
                    <input id="telefono" type="text" class="input">
                </div>
                <div class="group">
                    <input type="submit" class="button" value="Registrarse">
                </div>
                <div class="hr"></div>
            </div>


        </div>
    </div>
</div>
</html>
