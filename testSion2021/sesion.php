<?php

header("Cache-Control: no-cache, must-revalidate");
@ob_start();
@session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    include_once './DAL/Connection.php';
    include_once './DTO/Usuarios.php';
    include_once './BLL/UsuariosBLL.php';

    $usuariosBLL = new UsuariosBLL();
    $objUsuario = $usuariosBLL->selectByid($_SESSION["username"]);
    
    if ($objUsuario->getTCargo() != "Administrativo") {
        header('Location: login.php');
        exit;
    }
} else{
    header('Location: login.php');
}
$now = time();
try {
    if (isset($_SESSION["expire"])) {
        if ($now > $_SESSION['expire']) {
            @session_destroy();
            exit;
        }
    }
} catch (Exception $exc) {
    echo $exc->getTraceAsString();
}

if (isset($_REQUEST["salir"])) {
    @session_start();
    unset($SESSION['username']);
    @session_destroy();

    header('Location: login.php');
    exit;
}
