<?php
include_once './DAL/Connection.php';

include_once './BLL/UsuariosBLL.php';
include_once './DTO/Usuarios.php';

include_once './BLL/ClientesBLL.php';
include_once './DTO/Clientes.php';

include_once './sesion.php';

$clienteBLL = new ClientesBLL();
$usuarioBLL = new UsuariosBLL();

$cliente = null;
$lista = null;

if (isset($_REQUEST["clienteID"]) && isset($_REQUEST["tNombres"]) && isset($_REQUEST["tApellidos"]) && isset($_REQUEST["tFechaNac"]) && isset($_REQUEST["tCedula"]) && isset($_REQUEST["tNacionalidad"]) && isset($_REQUEST["dtCreado"]) && isset($_REQUEST["dtModificado"])) {
    $id = $_REQUEST["clienteID"];
    $tNombres = $_REQUEST["tNombres"];
    $tApellidos = $_REQUEST["tApellidos"];
    $tEdad = $_REQUEST["tFechaNac"];
    $tCedula = $_REQUEST["tCedula"];
    $tNacionalidad = $_REQUEST["tNacionalidad"];
    $tEstado = $clienteBLL->selectByid($_REQUEST["clienteID"])->getTEstado();
    $dtCreado = $_REQUEST["dtCreado"];
    $dtModificado = $_REQUEST["dtModificado"];

    $clienteBLL->update($id, $tNombres, $tApellidos, $tEdad, $tCedula, $tNacionalidad, $tEstado, $dtCreado, $dtModificado);
    header('Location: index.php');
}

if (isset($_REQUEST["insert"]) && isset($_REQUEST["tNombres"]) && isset($_REQUEST["tApellidos"]) && isset($_REQUEST["tFechaNac"]) && isset($_REQUEST["tCedula"]) && isset($_REQUEST["tNacionalidad"]) && isset($_REQUEST["dtCreado"]) && isset($_REQUEST["dtModificado"])) {

    $tNombres = $_REQUEST["tNombres"];
    $tApellidos = $_REQUEST["tApellidos"];
    $tEdad = $_REQUEST["tFechaNac"];
    $tCedula = $_REQUEST["tCedula"];
    $tNacionalidad = $_REQUEST["tNacionalidad"];
    $tEstado = 0;
    $dtCreado = $_REQUEST["dtCreado"];
    $dtModificado = $_REQUEST["dtModificado"];

    $clienteBLL->insert($tNombres, $tApellidos, $tEdad, $tCedula, $tNacionalidad, $tEstado, $dtCreado, $dtModificado);
    header('Location: index.php');
}


if (isset($_REQUEST["desactivar"]) && isset($_REQUEST["clienteID"])) {
    
    $cliente = $clienteBLL->selectByid($_REQUEST["clienteID"]);
    $id = $_REQUEST["clienteID"];
    $tNombres = $cliente->getTNombres();;
    $tApellidos = $cliente->getTApellidos();;
    $tEdad = $cliente->getTEdad();;
    $tCedula = $cliente->getTCedula();;
    $tNacionalidad = $cliente->getTNacionalidad();;
    $tEstado = $clienteBLL->selectByid($_REQUEST["clienteID"])->getTEstado();
    $dtCreado = $_REQUEST["dtCreado"];
    $dtModificado = date('Y') . "-" . date('m') . "-" . date('d');;

    if ($tEstado == 1) {
        $tEstado = 0;
    } else {
        $tEstado = 1;
    }

    $clienteBLL->update($id, $tNombres, $tApellidos, $tEdad, $tCedula, $tNacionalidad, $tEstado, $dtCreado, $dtModificado);

    header("Location: clienteAdmin.php?clienteID=" . $_REQUEST["clienteID"]);
}
?>


<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta property="og:url" content="" />
        <meta property="og:type" content="Test" />
        <meta property="og:title" content="TestSion2021.com" />
        <meta property="og:description" content="Test Para trabajo" />
        <meta property="og:image" content="" />
        <link rel="shortcut icon" href="http://192.168.0.7:8080/testSion2021/IMG/logo_fooler.png">

        <link href="css/fonts.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <title>Sion - Clientes</title>
    </head>
    <body>
        <?php
        include_once './headerAdmin.php';
        ?>
        <div class="adminSubcontainer">

            <div class="listaAdmContainer">
                <div class="clientesHeader">
                    <?php
                    if (isset($_REQUEST["clienteID"])) {
                        $cliente = $clienteBLL->selectByid($_REQUEST["clienteID"]);
                        ?>
                        <a href="clienteAdmin.php?desactivar&clienteID=<?php echo $cliente->getId(); ?>" class="clientesHeaderLink clientesHeaderNuevo">
                            <div class="botonNuevo" <?php
                            if ($cliente->getTEstado() == 1) {
                                echo "style='background:#8bd03b !important;'";
                            } else {
                                echo "style='background:#ff2112 !important;'";
                            }
                            ?>>
                                <div class="clientesHeaderLinkTexto"><?php
                                    if ($cliente->getTEstado() == 1) {
                                        echo "Dar de baja";
                                    } else {
                                        echo "Habilitar";
                                    }
                                    ?></div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
                <div class="datos">
                    <form action="clienteAdmin.php?<?php
                    if (isset($_REQUEST["clienteID"])) {
                        echo "clienteID=" . $_REQUEST["clienteID"];
                    } else {
                        echo "insert";
                    }
                    ?>" method="POST" enctype="multipart/form-data">
                        <div class="formColumContainer">
                            <div class="formColum">
                                <div class="inputContiner">
                                    Nombres
                                    <input type="text" class="input inputDatos" id="tNombres" name="tNombres" placeholder="Nombres" value="<?php
                                    if (isset($_REQUEST["clienteID"])) {
                                        echo $cliente->getTNombres();
                                    }
                                    ?>" required>
                                </div>
                                <div class="inputContiner">
                                    Apellidos
                                    <input type="text" class="input inputDatos" id="tApellidos" name="tApellidos" placeholder="Apellidos" value="<?php
                                    if (isset($_REQUEST["clienteID"])) {
                                        echo $cliente->getTApellidos();
                                    }
                                    ?>" required>
                                </div>

                            </div>

                            <div class="formColum">
                                <div class="inputContiner">
                                    Fecha de nacimiento
                                    <input type="date" class="input inputDatos" id="tFechaNac" name="tFechaNac" value="<?php
                                    if (isset($_REQUEST["clienteID"])) {
                                        echo date("Y-m-d", strtotime($cliente->getTEdad()));
                                    }
                                    ?>" required>
                                </div>
                                <div class="inputContiner">
                                    Cedula
                                    <input type="text" class="input inputDatos" id="tCedula" name="tCedula" placeholder="Cedula" value="<?php
                                    if (isset($_REQUEST["clienteID"])) {
                                        echo $cliente->getTCedula();
                                    }
                                    ?>" required>
                                </div>                                 
                            </div>

                            <div class="formColum">
                                <div class="inputContiner">
                                    Pais
                                    <select name='tNacionalidad' id='tNacionalidad' class='input inputDatos' required>
                                        <option value="Argentina" <?php
                                        if (isset($_REQUEST["productoID"])) {
                                            if ($cliente->getTNacionalidad() == "Argentina") {
                                                echo "selected";
                                            }
                                        }
                                        ?>>Argentina</option>
                                        <option value="Bolivia" <?php
                                        if (isset($_REQUEST["productoID"])) {
                                            if ($cliente->getTNacionalidad() == "Bolivia") {
                                                echo "selected";
                                            }
                                        }
                                        ?>>Bolivia</option>
                                        <option value="Brasil" <?php
                                        if (isset($_REQUEST["productoID"])) {
                                            if ($cliente->getTNacionalidad() == "Brasil") {
                                                echo "selected";
                                            }
                                        }
                                        ?>>Brasil</option>
                                        <option value="Chile" <?php
                                        if (isset($_REQUEST["productoID"])) {
                                            if ($cliente->getTNacionalidad() == "Chile") {
                                                echo "selected";
                                            }
                                        }
                                        ?>>Chile</option>
                                        <option value="Peru" <?php
                                        if (isset($_REQUEST["productoID"])) {
                                            if ($cliente->getTNacionalidad() == "Peru") {
                                                echo "selected";
                                            }
                                        }
                                        ?>>Peru</option>
                                        <option value="Paraguay" <?php
                                        if (isset($_REQUEST["productoID"])) {
                                            if ($cliente->getTNacionalidad() == "Paraguay") {
                                                echo "selected";
                                            }
                                        }
                                        ?>>Paraguay</option>
                                        <option value="Uruguay" <?php
                                        if (isset($_REQUEST["productoID"])) {
                                            if ($cliente->getTNacionalidad() == "Uruguay") {
                                                echo "selected";
                                            }
                                        }
                                        ?>>Uruguay</option>
                                    </select>
                                </div>

                            </div>
                        </div>

                        <input type="date" readonly="readonly" id="dtCreado" name="dtCreado" style="display: none;" value="<?php
                        if (isset($_REQUEST["clienteID"])) {
                            echo date("Y-m-d", strtotime($cliente->getDtCreado()));
                        } else {
                            echo date('Y') . "-" . date('m') . "-" . date('d');
                        }
                        ?>">
                        <input type="date" readonly="readonly" id="dtModificado" name="dtModificado" style="display: none;" value="<?php echo date('Y') . "-" . date('m') . "-" . date('d'); ?>">

                        <input type="submit" value="Guardar" class="botonGuardar" id="botonGuardarCliente">
                    </form>
                </div>
            </div>
        </div>
        <?php
        include_once './footerAdmin.php';
        ?>
    </body>
</html>
