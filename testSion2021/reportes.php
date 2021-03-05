<?php
include_once './sesion.php';

include_once './DAL/Connection.php';

include_once './BLL/UsuariosBLL.php';
include_once './DTO/Usuarios.php';

include_once './BLL/ClientesBLL.php';
include_once './DTO/Clientes.php';

$clienteBLL = new ClientesBLL();
$usuarioBLL = new UsuariosBLL();

$listaDeClientes = $clienteBLL->selectAll();
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
        <div>
            <form action="reportes.php" method="POST" enctype="multipart/form-data">
                <div class="formColumContainer">

                    <div class="formColum">
                        <div class="inputContiner">
                            Fecha de inicio
                            <input type="date" class="input inputDatos" id="dtInicio" name="dtInicio">
                        </div>
                        <div class="inputContiner">
                            Fecha de fin
                            <input type="date" class="input inputDatos" id="dtFin" name="dtFin">
                        </div>
                    </div>

                    <div class="formColum">
                        <div class="inputContiner">
                            Edad
                            <input type="number" class="input inputDatos" id="Edad" name="Edad" placeholder="Edad">
                        </div>
                        <div class="inputContiner">
                            Palabra clave
                            <input type="text" class="input inputDatos" id="Palabra" name="Palabra" placeholder="Palabra clave">
                        </div>
                    </div> 

                    <div class="formColum">
                        <div class="inputContiner">
                            Habilitados
                            <input type="checkbox" class="input inputDatos" id="Habilitados" name="Habilitados">
                        </div>
                        <div class="inputContiner">
                            Inhabilitados
                            <input type="checkbox" class="input inputDatos" id="Inhabilitados" name="Inhabilitados">
                        </div>
                    </div>

                </div>

                <input type="submit" value="Generar Reporte" class="botonGuardar" id="botonGuardarCliente">
            </form>
        </div>
    </body>
</html>
