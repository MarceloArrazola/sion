<?php

@ob_start();
@session_start();

include_once './DAL/Connection.php';

include_once './DTO/Usuarios.php';
include_once './BLL/UsuariosBLL.php';

$objConexion = new Connection();
$usuarioBLL = new UsuariosBLL();
$objUsuario = null;

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$db_name = "testsion2021";
$tbl_name = "usuarios";


$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
}

$correo = $_REQUEST['inputLoginEmail'];
$password = $_REQUEST['inputLoginPass'];

$result = null;

$sql = "SELECT id, tNombre FROM $tbl_name WHERE tCorreoE = '$correo' AND tPass = '$password' AND iEstado = '1'" ;
try {
    $result = $objConexion->query($sql);
    if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $row["id"];
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (320 * 60);

        @ob_start();
        header('location: index.php');
        exit;
    }
} catch (Exception $e) {
    echo $e . "error en el login";
}

mysqli_close($conexion);
ob_end_flush();
?>
