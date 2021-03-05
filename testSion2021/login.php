<?php
@ob_start();
header("Cache-Control: no-cache, must-revalidate");
if (isset($_REQUEST['inputLoginEmail']) && isset($_REQUEST['inputLoginPass'])) {
    include_once './session/checklogin.php';
} else {
    @session_start();
}

if (isset($_REQUEST["salir"])) {
    @session_start();
    @session_destroy();
}

include_once './DAL/Connection.php';

include_once './DTO/Usuarios.php';
include_once './BLL/UsuariosBLL.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta property="og:url" content="" />
        <meta property="og:type" content="e-commerce" />
        <meta property="og:title" content="GoShop.com" />
        <meta property="og:description" content="La mejor App de ofertas del pais" />
        <meta property="og:image" content="" />
        <link rel="shortcut icon" href="http://192.168.0.8:8080/testSion2021/IMG/logo_fooler.png">

        <link href="css/fonts.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <title>Test - Login</title>
    </head>
    <body>
        <div class="loginContainer">
            <div class="loginHeader">
                <div class="loginLogo">
                    <img src="../IMG/web/logo real.png" alt="" class="img-banner"/>
                </div>
            </div>
            <div class="loginBody">
                <form action="login.php" method="post" class="loginInicio">
                    <div class="inputContainerLogin">
                        <input type="text" class="input inputLoginEmail" id="inputLoginEmail" name="inputLoginEmail" placeholder="Correo">
                    </div>
                    <div class="inputContainerLogin">
                        <input type="password" class="input inputLoginPass" id="inputLoginPass" name="inputLoginPass" placeholder="Contraseña">
                    </div>
                    <div class="inputContainerLogin inputsubmitLogin">
                        <input type="submit" value="Iniciar" class="boton botonCrear">
                        <a href="RecuperarCuenta.php" target="_blank" id="loginFacebook">Olvidaste tu contraseña?</a>
                    </div>
                </form>

            </div>
        </div>

        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script src="js/script.js" type="text/javascript"></script>
    </body>

</html>