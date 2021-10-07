<?php

$clas_d_none = "d-none";
$icon = '<i class="fa fa-plus"></i>';

$productos = ProductosModelo::mdlMostrarProductosActivos();



?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <button class="btn btn-default float-right btnDisplayProductos" data-display="<?php echo $clas_d_none ?>"><?php echo $icon ?></button>
        </div>
    </div>

    <div class="card <?php echo $clas_d_none ?>" id="card-filtro-producto">
        <div class="card-body">
            <h4 class="card-title">Productos</h4>
            <div class="row">
                <div class="col-12">
                    <a class="btn btn-dark mb-1" href="<?php echo HTTP_HOST . 'productos/new' ?>">Añadir nuevo <i class="fa fa-plus"></i></a>
                    <a class="btn btn-dark mb-1" href="<?php echo HTTP_HOST . 'productos/importar' ?>">Importar <i class="fab fa-file-import"></i></a>
                    <a class="btn btn-dark mb-1" href="<?php echo HTTP_HOST . 'productos/exportar' ?>">Exportar <i class="fab fa-file-download"></i></a>
                </div>
                <div class="col-12">
                    <hr>
                </div>
                <div class="col-12 col-md-2">

                    <p> <strong><a href="">Mostrar todos (9)</a></strong></p>

                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="">Filtrar por categoría</label>
                                <select class="form-control" name="" id="">
                                    <option value="">Todas</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="">Tipo de producto</label>
                                <select class="form-control" name="" id="">
                                    <option value="">Todos</option>
                                    <option value="POS">POS</option>
                                    <option value="ONLINE">ONLINE</option>
                                    <option value="POS/ONLINE">POS / ONLINE</option>


                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label for="">Estado de producto</label>
                                <select class="form-control" name="" id="">
                                    <option value="">Activos</option>
                                    <option value="">Activos</option>

                                </select>
                                <button class="btn btn-dark mt-1 float-right">Filtrar</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="form-group">
                        <label for="">Productos del almacen:</label>
                        <select class="form-control select2" name="pds_ams_id" id="pds_ams_id">
                            <option value="">Seleccione un almacén origén</option>
                            <?php

                            $sucursales = AlmacenesModelo::mdlMostrarAlamcenesTraspaso('I', $_SESSION['session_suc']['scl_id']);
                            // $sucursales = AlmacenesModelo::mdlMostrarAlamcenesTraspaso('E');
                            foreach ($sucursales as $key => $scl) :
                            ?>
                                <option value="<?php echo $scl['ams_id'] ?>"><?php echo $scl['scl_nombre'] . ' - ' . $scl['ams_nombre']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <p class="card-text">Lista de productos</p>
            <form action="" method="post">
                <div class="">
                    <table class="table tablaProductos table-light tablas table-bordered table-striped dt-responsive">
                        <thead>
                            <tr>

                                <th><i class="fas fa-image"></i></th>
                                <th>Nombre</th>
                                <th>SKU</th>
                                <th>Inventario</th>
                                <th>Categorías</th>
                                <th>Fecha</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="bodyviewProd">


                            <?php foreach ($productos as $key => $pds) : ?>
                                <tr class="pds_content text-center" pds_id="pds_id_<?php echo $pds['pds_id_producto'] ?>" style="height: 110px;">

                                    <td><img src="<?php echo $pds['pds_imagen_portada'] ?>" width="50" height="50" alt="no fount"></td>
                                    <td>
                                        <a href="<?= HTTP_HOST . 'productos/update/' . $pds['pds_id_producto'] ?>" class="bt btn-link"><?php echo $pds['pds_nombre'] ?></a>


                                    </td>
                                    <td><?php
                                        $pds_sku = explode("/", $pds['pds_sku']);
                                        echo $pds_sku[0]; ?>

                                    </td>
                                    <td>
                                        <?php
                                        if ($pds['pds_stok'] <= $pds['pds_stok_min'] || $pds['pds_stok'] == 0) :

                                            echo '<strong class="text-danger">' . $pds['pds_stok'] . '</strong>';

                                        else :
                                            echo '<strong class="text-success">' . $pds['pds_stok'] . '</strong>';
                                        endif;
                                        ?>

                                    </td>
                                    <td><?php echo $pds['pds_categoria'] ?></td>
                                    <td>
                                        <?php
                                        if ($pds['pds_fecha_modificacion'] == '0000-00-00 00:00:00') :
                                            echo 'Creado el: ' . $pds['pds_fecha_creacion']  . '<br> <strong class="text-warning">' . $pds['pds_usaurio_registro'] . '</strong>';
                                        else :
                                            echo 'Ultima modificación el: ' . $pds['pds_fecha_modificacion'] . '<br> <strong class="text-warning">' . $pds['pds_usuario_modifico'] . '</strong>';

                                        endif;
                                        ?>

                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-sm btnEliminarProducto" pds_id_producto="<?= $pds['pds_id_producto']?>"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    </td>

                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>

                </div>
            </form>
        </div>
    </div>
</div>