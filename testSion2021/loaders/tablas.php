<?php
include_once '../DAL/Connection.php';

include_once '../BLL/ClientesBLL.php';
include_once '../DTO/Clientes.php';



if (isset($_POST["elem"])) {
    $clienteBLL = new ClientesBLL();

    $elem = $_POST["elem"];
    $listaDeClientes = null;
    
    if (isset($_POST["DESC"])) {
        $listaDeClientes = $clienteBLL->selectAllByOrderDESC($elem);
    }if (isset($_POST["ASC"])) {
        $listaDeClientes = $clienteBLL->selectAllByOrderASC($elem);
    }
    
    ?>
    <tbody id="tBodyIndex">
    <?php
    foreach ($listaDeClientes as $auxCliente) {
        ?>
            <tr>
                <td class="listaAdmid"><?php echo $auxCliente->getId(); ?></td>
                <td class="listaAdmNombre"><?php echo $auxCliente->getTNombres(); ?></td>
                <td class="listaAdmNombreRep"><?php echo $auxCliente->getTApellidos(); ?></td>
                <td class="listaAdmEmail"><?php echo $auxCliente->getTEdad(); ?></td>
                <td class="listaAdmEmail"><?php echo $auxCliente->getTCedula(); ?></td>
                <td class="listaAdmTel"><?php echo $auxCliente->getTNacionalidad(); ?></td>
                <td class="listaAdmNit"><?php echo $auxCliente->getDtCreado(); ?></td>
                <td class="listaAdmRubro"><?php echo $auxCliente->getDtModificado(); ?></td>
                <td class="listaAdmRubro"><a href="JavaScript:void(0)">Dar de baja</a></td>
                <td class="listaAdmProductos"><a href="clienteAdmin.php?clienteID=<?php echo $auxCliente->getId(); ?>">ir Cliente</a></td>
            </tr>

        <?php
    }
    ?>
    </tbody>
    <?php
}
