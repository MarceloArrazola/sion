<?php
include_once './DAL/Connection.php';

include_once './BLL/UsuariosBLL.php';
include_once './DTO/Usuarios.php';

include_once './BLL/ClientesBLL.php';
include_once './DTO/Clientes.php';

//include_once './sesion.php';

$usuarioBLL = new UsuariosBLL();




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
        <link rel="shortcut icon" href="http://192.168.0.8:8080/testSion2021/IMG/logo_fooler.png">

        <link href="css/fonts.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <title>Sion - usuarios</title>
    </head>
    <body>
        <?php
        include_once './headerAdmin.php';
        ?>
        <div class="adminSubcontainer">
            <?php
            include_once './menuLateral.php';
            ?>

            <div class="listaAdmContainer">
                <div class="tiendasHeader">
                    <?php if (isset($_REQUEST["tiendaID"])) { ?>
                        <div class="tiendasHeaderItem tiendasHeaderTitulo">
                            <div class="tiendasHeaderTituloIcon">
                                <img src="../IMG/admin/guia go shop.png" alt="" class="tiendasHeaderTituloIconImg">
                            </div>
                            <div class="tiendasHeaderTituloTexto"><?php echo $tienda->getTNombre(); ?></div>
                        </div>

                        <a href="tiendaAdmin.php?desactivar&tiendaID=<?php echo $tienda->getIdTiendas(); ?>" class="tiendasHeaderLink tiendasHeaderNuevo">
                            <div class="botonNuevo" <?php
                            if ($tienda->getBActivo() == 1) {
                                echo "style='background:#8bd03b !important;'";
                            } else {
                                echo "style='background:#ff2112 !important;'";
                            }
                            ?>>
                                <div class="tiendasHeaderLinkTexto"><?php
                                    if ($tienda->getBActivo() == 1) {
                                        echo "Activo";
                                    } else {
                                        echo "Inactivo";
                                    }
                                    ?></div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
                <div class="tiendaOpciones">
                    <a href="<?php
                    if (isset($_REQUEST["tiendaID"])) {
                        echo "tiendaAdmin.php?tiendaID=" . $tienda->getIdTiendas();
                    } else {
                        echo "tiendaAdmin.php";
                    }
                    ?>" class="tiendaOpcionesItem <?php
                       if (isset($_REQUEST["productos"])) {
                           echo 'tiendaOpciones2';
                       } else {
                           echo 'tiendaOpciones1';
                       }
                       ?>">
                        <div class="tiendaOpcionesItemBoton">
                            Datos del negocio
                        </div>
                    </a>
                    <a href="<?php if (isset($_REQUEST["tiendaID"])) { ?>tiendaAdmin.php?productos&tiendaID=<?php
                        echo $tienda->getIdTiendas();
                    } else {
                        ?>Javascript:void(0)<?php } ?>" class="tiendaOpcionesItem <?php
                       if (isset($_REQUEST["productos"])) {
                           echo 'tiendaOpciones1';
                       } else {
                           echo 'tiendaOpciones2';
                       }
                       ?>">
                        <div class="tiendaOpcionesItemBoton">
                            Productos
                        </div>
                    </a>

                </div>
                <?php if (!isset($_REQUEST["productos"])) { ?>
                    <div class="datos">
                        <form action="tiendaAdmin.php?<?php
                        if (isset($_REQUEST["tiendaID"])) {
                            echo "update&tiendaID=" . $tienda->getIdTiendas();
                        } else {
                            echo "insert";
                        }
                        ?>" method="POST" enctype="multipart/form-data">
                            <div class="formColumContainer">
                                <div class="formColum">

                                    <div class="inputContiner">
                                        Nombre
                                        <input type="text" class="input inputDatos" id="tNombre" name="tNombre" placeholder="Nombre" value="<?php
                                        if (isset($_REQUEST["tiendaID"])) {
                                            echo $tienda->getTNombre();
                                        }
                                        ?>" required>
                                    </div>
                                    <div class="inputContiner">
                                        Rubro
                                        <input type="text" class="input inputDatos" id="tRubro" name="tRubro" placeholder="Rubro" value="<?php
                                        if (isset($_REQUEST["tiendaID"])) {
                                            echo $tienda->getTRubro();
                                        }
                                        ?>" required>
                                    </div>
                                    <div class="inputContiner">
                                        Tipo
                                        <input type="text" class="input inputDatos" id="tTipoTienda" name="tTipoTienda" placeholder="Tipo" value="<?php
                                        if (isset($_REQUEST["tiendaID"])) {
                                            echo $tienda->getTTipoTienda();
                                        }
                                        ?>">
                                    </div>
                                    <div class="inputContiner">
                                        NIT
                                        <input type="text" class="input inputDatos" id="tNit" name="tNit" placeholder="NIT" value="<?php
                                        if (isset($_REQUEST["tiendaID"])) {
                                            echo $tienda->getTNit();
                                        }
                                        ?>">
                                    </div>
                                </div>

                                <div class="formColum">
                                    <div class="inputContiner">
                                        Telefono
                                        <input type="text" class="input inputDatos" id="tNroTelefono" name="tNroTelefono" placeholder="Telefono" value="<?php
                                        if (isset($_REQUEST["tiendaID"])) {
                                            echo $tienda->getTNroTelefono();
                                        }
                                        ?>" required>
                                    </div>
                                    <div class="inputContiner">
                                        Correo electrónico
                                        <input type="text" class="input inputDatos" id="tEMail" name="tEMail" placeholder="Correo electronico" value="<?php
                                        if (isset($_REQUEST["tiendaID"])) {
                                            echo $tienda->getTEMail();
                                        }
                                        ?>" required>
                                    </div>
                                    <div class="inputContiner">
                                        Direccion
                                        <input type="text" class="input inputDatos" id="tDireccion" name="tDireccion" placeholder="Direccion" value="<?php
                                        if (isset($_REQUEST["tiendaID"])) {
                                            echo $tienda->getTDireccion();
                                        }
                                        ?>" required>
                                    </div>
                                    <div class="inputContiner">
                                        Referencia
                                        <input type="text" class="input inputDatos" id="tReferencia" name="tReferencia" placeholder="Referencia" value="<?php
                                        if (isset($_REQUEST["tiendaID"])) {
                                            echo $tienda->getTReferencia();
                                        }
                                        ?>">
                                    </div>
                                </div>

                                <div class="formColum">
                                    <div class="inputContiner">
                                        Nro. de Casa
                                        <input type="text" class="input inputDatos" id="tNumeroCasa" name="tNumeroCasa" placeholder="Nro. De casa" value="<?php
                                        if (isset($_REQUEST["tiendaID"])) {
                                            echo $tienda->getTNumeroCasa();
                                        }
                                        ?>" required>
                                    </div>

                                    <div class="inputContiner">
                                        Categoria
                                        <select name='categoria' id='categoria' class='input inputDatos' required>
                                            <?php foreach ($ListaCategoriasTienda as $obj) { ?>                                                
                                                <option value='<?php echo $obj->getIdCategoriasTienda(); ?>' <?php
                                                if (isset($_REQUEST["tiendaID"])) {
                                                    if ($obj->getIdCategoriasTienda() == $categoria->getIdCategoriasTienda()) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?>><?php echo $obj->getIdCategoriasTienda() . " - " . $obj->getTNombre(); ?></option>                                             
                                                        <?php
                                                    }
                                                    ?>
                                        </select>
                                    </div>
                                    <div class="inputContiner">
                                        Usuario
                                        <select name='idUsuario' id='idUsuario' class='input inputDatos'>
                                            <?php
                                            foreach ($listaUsuarios as $objUsr) {
                                                ?>
                                                <option value='<?php echo $objUsr->getId(); ?>' <?php
                                                if (isset($_REQUEST["tiendaID"])) {
                                                    if ($objUsr->getId() == $tienda->getIdUsuario()) {
                                                        echo "selected";
                                                    }
                                                }
                                                ?>><?php echo $objUsr->getId() . " - " . $objUsr->getTNombres(); ?></option>                                             
                                                        <?php
                                                    }
                                                    ?>
                                        </select>
                                    </div>

                                    <div class="inputContiner inputCheck">
                                        Facturacion
                                        <input type="checkbox" class="input inputDatos" id="bFacturacion" name="bFacturacion" placeholder="Correo electronico" <?php
                                        if (isset($_REQUEST["tiendaID"])) {
                                            if ($tienda->getBFacturacion() == 1) {
                                                echo "checked";
                                            }
                                        }
                                        ?>>
                                    </div>
                                </div>
                            </div>

                            <div class="map" id="map"></div>
                            <div class="ubicacionLATLNG">
                                <div class="inputContiner">
                                    Latitud
                                    <input type="text" readonly="readonly" class="input inputDatos" id="tGeoLng" name="tGeoLng" value="<?php
                                    if (isset($_REQUEST["tiendaID"])) {
                                        echo $tienda->getTGeoLng();
                                    }
                                    ?>">
                                </div>

                                <div class="inputContiner">
                                    Longitud
                                    <input type="text" readonly="readonly" class="input inputDatos" id="tGeoLat" name="tGeoLat" value="<?php
                                    if (isset($_REQUEST["tiendaID"])) {
                                        echo $tienda->getTGeoLat();
                                    }
                                    ?>">
                                </div>
                            </div>

                            <div class="datosTimeLine">
                                <div class="imagenesAdminTitulo">
                                    TIMELINE
                                </div>
                                <div class="formColumContainer">
                                    <div class="inputContiner">
                                        Fecha de Inicio
                                        <input type="date" class="input inputDatos" id="dtInicioPromo" name="dtInicioPromo" value="<?php
                                        if (isset($_REQUEST["tiendaID"])) {
                                            echo date("Y-m-d", strtotime($tienda->getDtInicioPromo()));
                                        }
                                        ?>">
                                    </div>
                                    <div class="inputContiner">
                                        Fecha de Final
                                        <input type="date" class="input inputDatos" id="dtFinPromo" name="dtFinPromo" value="<?php
                                        if (isset($_REQUEST["tiendaID"])) {
                                            echo date("Y-m-d", strtotime($tienda->getDtFinPromo()));
                                        }
                                        ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="imagenesAdmin">
                                <div class="imagenesAdminTitulo">
                                    IMAGENES
                                </div>
                                <div class="tiendaFoto formColumContainer" id="tiendaFoto">
                                    <div class="inputContiner">
                                        Banner
                                        <input type="file" class="input inputDatos" name="imageBanner" id="imageBanner" accept=".jpg, .png, .jpeg" onchange="return validarBanner()" />
                                        <?php if (isset($_REQUEST["tiendaID"])) { ?>
                                            <img src="../IMG/tiendas/<?php echo $_REQUEST["tiendaID"]; ?>/banner.png" alt="" class="imgAdmin"/>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="inputContiner">
                                        Logo
                                        <input type="file" class="input inputDatos" name="imageLogo" id="imageLogo" accept=".jpg, .png, .jpeg" onchange="return validarLogo()" />
                                        <?php if (isset($_REQUEST["tiendaID"])) { ?>
                                            <img src="../IMG/tiendas/<?php echo $_REQUEST["tiendaID"]; ?>/logo.png" alt="" class="imgAdmin"/>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <div class="inputContiner">
                                        Tabla
                                        <input type="file" class="input inputDatos" name="imageTabla" id="imageTabla" accept=".jpg, .png, .jpeg" onchange="return validarTablaContenido()" />
                                        <?php if (isset($_REQUEST["tiendaID"])) { ?>
                                            <img src="../IMG/tiendas/<?php echo $_REQUEST["tiendaID"]; ?>/tabla.png" alt="" class="imgAdmin"/>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>

                            </div>
                            <div class="promosExtra">
                                <div class="imagenesAdminTitulo">
                                    PROMOS EXTRAS
                                </div>
                                <div class="formColumContainer">
                                    <div class="inputContiner inputCheck">
                                        Delivery Gratis
                                        <input type="checkbox" class="input inputDatos" id="bAbierto" name="bAbierto" placeholder="Correo electronico" <?php
                                        if (isset($_REQUEST["tiendaID"])) {
                                            if ($tienda->getBAbierto() == 1) {
                                                echo "checked";
                                            }
                                        }
                                        ?>>
                                    </div>
                                </div>
                            </div>   
                            <input type="date" readonly="readonly" id="dtCreado" name="dtCreado" style="display: none;">
                            <input type="date" readonly="readonly" id="dtModificado" name="dtModificado" style="display: none;">

                            <input type="submit" value="Guardar" class="botonGuardar" id="botonGuardarTienda">
                        </form>
                    </div>

                    <?php
                }
                if (isset($_REQUEST["tiendaID"]) && isset($_REQUEST["productos"])) {
                    ?>
                    <table class="tabla" border="0" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <td></td>
                                <td>Nombre</td>
                                <td>Precio</td>
                                <td>Precio oferta</td>
                                <td>Modelo</td>
                                <td>Marca</td>
                                <td>Color</td>
                                <td>Cantidad</td>
                                <td>Especificaciones</td>
                                <td>Opciones</td>
                                <td>Fotos</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($lista as $aux) {
                                $categoriaAux = $categoriasProducto->selectByidCategoriasProducto($subcategorias->selectByidsubcategorias($tipos->selectByidTipos($aux->getIdTipos())->getIdsubcategorias())->getIdCategoriasProducto())->getTNombre();
                                $subcategoriaAux = $subcategorias->selectByidsubcategorias($tipos->selectByidTipos($aux->getIdTipos())->getIdsubcategorias())->getTNombre();
                                $tipoAux = $tipos->selectByidTipos($aux->getIdTipos())->getTNombre();
                                $marcaAux = $marcas->selectByidMarcas($aux->getIdMarcas())->getTNombre();

                                $listaOpciones = $opciones->selectByidProductos($aux->getIdProductos());
                                $listaFotos = $fotos->selectByidProductos($aux->getIdProductos());
                                $listaEspecificaciones = $especificaciones->selectByidProductos($aux->getIdProductos());

                                $auxOciones = null;
                                $auxFotos = null;
                                $auxEspecificaciones = null;

                                foreach ($listaOpciones as $opcion) {
                                    $auxOciones = $auxOciones . "" . $opcion->getIdOpcion() . " " . $opcion->getTGrupo() . " " . $opcion->getTNombre() . "<br>";
                                }
                                foreach ($listaFotos as $foto) {
                                    $auxFotos = $auxFotos . " <img src='../IMG/tiendas/" . $aux->getIdTiendas() . "/" . $aux->getIdProductos() . "/" . $foto->getTDescripcion() . ".png' alt='' class='fotosProductosListaIMG'/>";
                                }

                                foreach ($listaEspecificaciones as $especificacion) {
                                    $auxEspecificaciones = $auxEspecificaciones . " - " . $especificacion->getTNombre() . " " . $especificacion->getTDetalle() . "<br>";
                                }

                                $nombreAux = $categoriaAux . " " . $subcategoriaAux . " " . $tipoAux . " " . $marcaAux . " " . $aux->getTModelo() . " " . $aux->getTPresentacion();
                                ?>
                                <tr>
                                    <td><?php echo $aux->getIdProductos(); ?></td>
                                    <td class="listaAdmNombre"><?php echo $nombreAux; ?></td>
                                    <td><?php echo $aux->getDPrecio(); ?></td>
                                    <td><?php echo $aux->getDPrecioPromo(); ?></td>
                                    <td><?php echo $aux->getTModelo(); ?></td>
                                    <td><?php echo $marcaAux; ?></td>
                                    <td><?php echo $aux->getTPresentacion(); ?></td>
                                    <td><?php echo $aux->getIStock(); ?></td>
                                    <td class="espcificacioneTd"><?php echo $auxEspecificaciones; ?></td>
                                    <td><?php echo $auxOciones; ?></td>
                                    <td class="fotosProductosLista"><?php echo $auxFotos; ?></td>

                                    <td><a href="productoAdmin.php?productoID=<?php echo $aux->getIdProductos(); ?>">Editar</a></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <a href="productoAdmin.php?tiendaID=<?php echo $tienda->getIdTiendas(); ?>" class="botonProductosNuevo">
                        <div>
                            Agregar
                        </div>
                    </a>
                <?php } ?>

            </div>



        </div>
        <?php
        include_once './footerAdmin.php';
        ?>
    </body>
</html>
