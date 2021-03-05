<?php
header("Content-Type:application/xls");
header("Content-Disposition: attachment; filename=reporte.xls");

include_once './DAL/Connection.php';

include_once './BLL/UsuariosBLL.php';
include_once './DTO/Usuarios.php';

include_once './BLL/ClientesBLL.php';
include_once './DTO/Clientes.php';

$clienteBLL = new ClientesBLL();
$usuarioBLL = new UsuariosBLL();

$listaDeClientes = $clienteBLL->selectAll();

?>

<table> 
    <thead>
        <tr>
            <td></td>
            <td>Nombres</td>
            <td>Apellidos</td>
            <td>Fecha de Nacimiento</td>
            <td>Cedula</td>
            <td>Nacionalidad</td>
            <td>Creacion</td>
            <td>Modificacion</td>
        </tr>
    </thead>
    <tbody id="tBodyIndex">
        <?php
        foreach ($listaDeClientes as $auxCliente) {
            ?>
            <tr>
                <td><?php echo $auxCliente->getId(); ?></td>
                <td><?php echo $auxCliente->getTNombres(); ?></td>
                <td><?php echo $auxCliente->getTApellidos(); ?></td>
                <td><?php echo $auxCliente->getTEdad(); ?></td>
                <td><?php echo $auxCliente->getTCedula(); ?></td>
                <td><?php echo $auxCliente->getTNacionalidad(); ?></td>
                <td><?php echo $auxCliente->getDtCreado(); ?></td>
                <td><?php echo $auxCliente->getDtModificado(); ?></td>
            </tr>

            <?php
        }
        ?>

    </tbody>
</table>