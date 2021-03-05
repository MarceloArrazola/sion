<?php
include_once '../DAL/Connection.php';

include_once '../BLL/ClientesBLL.php';
include_once '../DTO/Clientes.php';



if (isset($_REQUEST["id"])) {
    $clienteBLL = new ClientesBLL();
    $cliente = $clienteBLL->selectByid($_REQUEST["id"]);
    $id = $cliente->getId();
    $tNombres = $cliente->getTNombres();
    $tApellidos = $cliente->getTApellidos();
    $tEdad = $cliente->getTEdad();
    $tCedula = $cliente->getTCedula();
    $tNacionalidad = $cliente->getTNacionalidad();
    $tEstado = $cliente->getTEstado();
    $dtCreado = $cliente->getDtCreado();
    $dtModificado = $cliente->getDtModificado();

    if ($tEstado == 0) {
        $tEstado = 1;
    } else {
        $tEstado = 0;
    }

    $clienteBLL->update($id, $tNombres, $tApellidos, $tEdad, $tCedula, $tNacionalidad, $tEstado, $dtCreado, $dtModificado);

    if ($tEstado == 1) {
        ?>
        <td class="listaAdm" id="elemento-<?php echo $cliente->getId(); ?>" onclick="switchHabilitar(<?php echo $cliente->getId(); ?>)"><a href="JavaScript:void(0)">Dar de baja</a></td>
    <?php } else { ?>
        <td class="listaAdm" id="elemento-<?php echo $cliente->getId(); ?>" onclick="switchHabilitar(<?php echo $cliente->getId(); ?>)"><a href="JavaScript:void(0)">Habilitar</a></td>
    <?php
    }
}
?>


