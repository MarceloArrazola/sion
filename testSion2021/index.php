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
        <title>Test Sion 2021</title>
    </head>
    <body>
        <?php
        include_once './headerAdmin.php';
        ?>
        <div class="adminSubcontainer">
            <div class="clientesHeader">
                <div class="clientesHeaderItem clientesHeaderTitulo">
                    <div class="clientesHeaderTituloIcon">
                        <img src="../IMG/logo_fooler.png" alt="" class="clientesHeaderTituloIconImg">
                    </div>
                    <div class="clientesHeaderTituloTexto">Clientes</div>
                </div>
                <a href="clienteAdmin.php" class="clientesHeaderLink botonNuevo clientesHeaderNuevo">
                    <div class="botonNuevo">
                        <div class="clientesHeaderLinkTexto"><b>+</b> Nuevo Cliente</div>
                    </div>
                </a>
            </div>
            <div class="listaAdmContainer">

                <table class="tabla" border="0" cellpadding="0" cellspacing="0"> 
                    <thead>
                        <tr>
                            <td></td>
                            <td onclick="ordenar('tNombres')" order="ASC" id="tNombres" class="headerTable">Nombres</td>
                            <td onclick="ordenar('tApellidos')" order="ASC" id="tApellidos" class="headerTable">Apellidos</td>
                            <td onclick="ordenar('tEdad')" order="ASC" id="tEdad" class="headerTable">Fecha de Nacimiento</td>
                            <td onclick="ordenar('tCedula')" order="ASC" id="tCedula" class="headerTable">Cedula</td>
                            <td onclick="ordenar('tNacionalidad')" order="ASC" id="tNacionalidad" class="headerTable">Nacionalidad</td>
                            <td onclick="ordenar('dtCreado')" order="ASC" id="dtCreado" class="headerTable">Creacion</td>
                            <td onclick="ordenar('dtModificado')" order="ASC" id="dtModificado" class="headerTable">Modificacion</td>
                            <td></td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody id="tBodyIndex">
                        <?php
                        foreach ($listaDeClientes as $auxCliente) {
                            ?>
                            <tr>
                                <td class="listaAdm"><?php echo $auxCliente->getId(); ?></td>
                                <td class="listaAdm"><?php echo $auxCliente->getTNombres(); ?></td>
                                <td class="listaAdm"><?php echo $auxCliente->getTApellidos(); ?></td>
                                <td class="listaAdm"><?php echo $auxCliente->getTEdad(); ?></td>
                                <td class="listaAdm"><?php echo $auxCliente->getTCedula(); ?></td>
                                <td class="listaAdm"><?php echo $auxCliente->getTNacionalidad(); ?></td>
                                <td class="listaAdm"><?php echo $auxCliente->getDtCreado(); ?></td>
                                <td class="listaAdm"><?php echo $auxCliente->getDtModificado(); ?></td>
                                <td class="listaAdm" id="elemento-<?php echo $auxCliente->getId(); ?>" onclick="switchHabilitar(<?php echo $auxCliente->getId(); ?>)"><a href="JavaScript:void(0)"><?php
                                        if ($auxCliente->getTEstado() == 0) {
                                            echo "Habilitar";
                                        } else {
                                            echo "Dar de baja";
                                        }
                                        ?></a></td>
                                <td class="listaAdm"><a href="clienteAdmin.php?clienteID=<?php echo $auxCliente->getId(); ?>">ir Cliente</a></td>
                            </tr>

                            <?php
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php
        include_once './footerAdmin.php';
        ?>
    </body>
</html>
