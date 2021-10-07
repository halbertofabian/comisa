<?php

$pds = ProductosModelo::mdlMostrarProductoById($rutas[2]);


?>

<link rel="stylesheet" href="<?php echo HTTP_HOST . 'app/modulos/productos/productos.css' ?>">
<div class="container">
    <form method="post" class="needs-validation">
        <div class="row">
            <div class="col-md-8 col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title text-primary">Nuevo producto <strong class="text-primary" data-toggle="tooltip" data-placement="right" title="Campos obligatorios, por favor llenelos">*</strong> </h4> -->
                        <div class="form-group">
                            <label for="">Elije un almacén</label>
                            <select class="form-control" name="pds_ams_id" id="pds_ams_id" disabled>
                                <?php



                                ?>
                                <option select value="<?= $pds['pds_ams_id'] ?>">BODEGA</option>
                                <?php
                                $almacenes = AlmacenesModelo::mdlMostrarAlmacenes($_SESSION['session_suc']['scl_id']);
                                foreach ($almacenes as $key => $ams) :
                                ?>
                                    <option value="<?php echo $ams['ams_id'] ?>"><?php echo $ams['ams_nombre'] ?></option>

                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pds_nombre">Nombre del producto <strong class="text-primary" data-toggle="tooltip" data-placement="right" title="Campo obligatorio, por favor llenelo">*</strong> </label>
                            <input type="text" value="<?= $pds['pds_nombre'] ?>" name="pds_nombre" id="pds_nombre" class="form-control" placeholder="Ingrese el nombre del producto" required onkeyup="generarcodigobarras()">

                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-12 col-md-12">

                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="pds_sku">SKU <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="SKU se refiere a una unidad de almacenamiento de inventario, un identificador único para cada producto y servicio que se puede comprar."></i><strong class="text-primary" data-toggle="tooltip" data-placement="right" title="Campo obligatorio, por favor llenelo">*</strong></label>
                                            <input type="text" value="<?php $sku = explode("/", $pds['pds_sku']);
                                                                        echo $sku[0] ?>" name="pds_sku" id="pds_sku" class="form-control" readonly required onkeyup="generarcodigobarras()">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <div class="form-group">
                                            <label for="pds_stok">Existencia <strong class="text-primary" data-toggle="tooltip" data-placement="right" title="Campo obligatorio, por favor llenelo">*</strong> </label>
                                            <input type="number" value="<?= $pds['pds_stok'] ?>" name="pds_stok" id="pds_stok" class="form-control" placeholder="" value="0" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <div class="form-group">
                                            <label for="pds_stok_min">Existencia mínima <i class="fa fa-question-circle" data-toggle="tooltip" data-placement="right" title="El sistema te notificará cuando la cantidad de inventario sea igual o inferior a la que pongas en este campo."></i> </label>
                                            <input type="number" value="<?= $pds['pds_stok_min'] ?>" name="pds_stok_min" id="pds_stok_min" class="form-control" placeholder="" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <!-- <div class="form-group">
                                                    <label for="pds_inpuesto">Inpuesto %</label>
                                                    <input type="text" name="pds_inpuesto" id="pds_inpuesto" class="form-control" placeholder="">
                                                </div> -->
                                    </div>
                                    <!-- <div class="col-md-4 col-6">
                                                <div class="form-group">
                                                    <label for="pds_stok_max">Existencia máxima</label>-->
                                    <input type="hidden" name="pds_stok_max" id="pds_stok_max" class="form-control" placeholder="">
                                    <!-- </div>
                                            </div> -->
                                    <div class="col-md-4 col-6">
                                        <div class="form-group">
                                            <label for="pds_precio_credito">Crédito <strong class="text-primary"></strong></label>
                                            <input type="text" value="<?= $pds['pds_precio_credito'] ?>" name="pds_precio_credito" id="pds_precio_credito" class="form-control inputN" placeholder="" value="0">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-6">
                                        <div class="form-group">
                                            <label for="pds_enganche">Enganche <strong class="text-primary"></strong></label>
                                            <input type="text" value="<?= $pds['pds_enganche'] ?>" name="pds_enganche" id="pds_enganche" class="form-control inputN" placeholder="" value="0">
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-6">
                                        <div class="form-group">
                                            <label for="pds_pago_semanal">Pago semanal <strong class="text-primary"></strong></label>
                                            <input type="text" value="<?= $pds['pds_pago_semanal'] ?>" name="pds_pago_semanal" id="pds_pago_semanal" class="form-control inputN" placeholder="" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <div class="form-group">
                                            <label for="pds_precio_contado">Contado <strong class="text-primary"></strong></label>
                                            <input type="text" value="<?= $pds['pds_precio_contado'] ?>" name="pds_precio_contado" id="pds_precio_contado" class="form-control inputN" placeholder="" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <div class="form-group">
                                            <label for="pds_precio_compra_mes_1">A un mes <strong class="text-primary"></strong></label>
                                            <input type="text" value="<?= $pds['pds_precio_compra_mes_1'] ?>" name="pds_precio_compra_mes_1" id="pds_precio_compra_mes_1" class="form-control inputN" placeholder="" value="0">
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-6">
                                        <div class="form-group">
                                            <label for="pds_precio_compra_mes_2">A dos meses <strong class="text-primary"></strong></label>
                                            <input type="text" value="<?= $pds['pds_precio_compra_mes_2'] ?>" name="pds_precio_compra_mes_2" id="pds_precio_compra_mes_2" class="form-control inputN" placeholder="" value="0">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- <div class="tab-pane fade" id="v-pills-detalle-precio" role="tabpanel" aria-labelledby="v-pills-detalle-precio-tab">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="pds_precio_promocion">Precio rebajado</label>
                                                    <input type="text" name="pds_precio_promocion" id="pds_precio_promocion" class="form-control inputN" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12"></div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="pds_fecha_inicio_promocion">Fecha de inicio</label>
                                                    <input type="datetime-local" name="pds_fecha_inicio_promocion" id="pds_fecha_inicio_promocion" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="pds_fecha_fin_promocion">Fecha de finalización</label>
                                                    <input type="datetime-local" name="pds_fecha_fin_promocion" id="pds_fecha_fin_promocion" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="pds_porcentaje_precio_rebajado">Ganancia % </label>
                                                    <input type="number" name="pds_porcentaje_precio_rebajado" id="pds_porcentaje_precio_rebajado" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="pds_porcentaje_descuento">Descuento %</label>
                                                    <input type="text" name="pds_porcentaje_descuento" id="pds_porcentaje_descuento" class="form-control" readonly placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detalle" role="tabpanel" aria-labelledby="v-pills-detalle-tab">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="pds_marca">Marca</label>
                                                    <input type="text" name="pds_marca" id="pds_marca" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                    <label for="pds_modelo">Modelo</label>
                                                    <input type="text" name="pds_modelo" id="pds_modelo" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="pds_caracteristicas">Caracteristicas (separar por comas (<strong>,</strong>)</label>
                                                    <input type="text" name="pds_caracteristicas" id="pds_caracteristicas" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4 col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="row">


                            <div class="col-12">

                                <div id="divPrint">
                                    <div class="text-center">
                                        <strong id="text-producto" class=""></strong>
                                    </div>
                                    <svg id="codigobarras" class="img-responsive img-fluid"></svg>
                                </div>
                                <a href="javascript:imprSelec('divPrint')" class="btn btn-secondary float-right">Imprimir</a>
                                <!-- <button type="button"  id="print">Imprimir</button> -->

                                <script>
                                    function imprSelec(nombre) {
                                        var ficha = document.getElementById(nombre);
                                        var ventimp = window.open(' ', '_blank');
                                        ventimp.document.write(ficha.innerHTML);
                                        ventimp.document.close();
                                        ventimp.print();
                                        ventimp.close();
                                    }

                                    $("#print").on("click", function() {
                                        window.print();
                                    })
                                    $(document).ready(function() {
                                        generarcodigobarras();
                                    })

                                    function generarcodigobarras() {
                                        $("#text-producto").html($("#pds_nombre").val())
                                        var x = document.getElementById("pds_sku").value;
                                        JsBarcode("#codigobarras", x);
                                    }
                                </script>

                            </div>

                            <div class="col-12">
                                <h4 class="card-title">Categoría</h4>
                                <input type="hidden" class="form-control" name="pds_id_producto" id="pds_id_producto" value="<?= $pds['pds_id_producto'] ?>">
                                <input type="hidden" class="form-control" name="categorias" id="categorias" value="<?= $pds['pds_categoria'] ?>">
                                <div class="col-12">
                                    <!-- <input type="text" class="form-control" id="ctg_buscar_categoria" placeholder="Buscar categoría" style=" border:none; border-bottom:1px solid #EA4D56;"> -->
                                    <div class="mt-2 text-center" id="pds_categoria-content-edit" data-toggle="" style="overflow-y: scroll; height: 200px; border: 1px dashed #000; ">
                                    </div>
                                </div>

                                <!-- <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for=""></label>
                                            <input type="text" name="" id="" class="form-control">
                                        </div>
                                    </div> -->
                                <!-- <div class="col-12">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="pds_categoria_text" id="pds_categoria_text">
                                            <button type="button" class="btn btn-link btnClickAgregarCategoria float-right d-none">Crear categoría</button>
                                        </div>
                                    </div> -->

                                <!-- <div class="col-12">
                                        
                                        <div class="mt-2 text-center" id="pds_categoria-content" data-toggle="" style="overflow-y: scroll; height: 200px; border: 1px dashed #000; ">
                                        </div>
                                    </div> -->
                                <!-- </div> -->
                                <!-- <button type="button" class="btn btn-link" id="btnClickAgregarCategoria">+Añadir nueva categoría</button> -->

                                <!-- <p class="card-text text-primary">Etiqueta</p>
                                <input type="hidden" class="form-control" name="pds_etiquetas_text" id="pds_etiquetas_text">
                                <button class="btn btn-link">+Añadir nueva etiqueta</button> -->

                                <div class="mt-2 pds_etiquetas-content" data-toggle="">
                                    <!-- <label class="btn btn-light active">
                                <input type="checkbox" name="pds_etiquetas" id="pds_etiquetas" checked value="default"> default
                            </label> -->

                                </div>

                                <input type="hidden" name="pds_imagen_portada" id="pds_imagen_portada" value="<?php echo HTTP_HOST . 'app/assets/images/sistema/logo-productos-sm.jpeg' ?>"><br>

                                <!-- <div class="text-center img-portada">
                                    <p class="text-primary text-center">Imagen del producto <strong class="text-dark">250 x 250 px</strong></p>
                                    <img src="<?php echo HTTP_HOST . 'app/assets/images/sistema/logo-productos-sm.jpeg' ?>" id="pds_imagen_portada_muestra" width="250" height="250" alt="">


                                    <button type="button" class="btn btn-link btnAgregarImagen" data-toggle="modal" data-target="#mdlAgregarImagen">Agregar imágen</button>
                                    <button type="button" class="btn btn-link text-primary d-none">Quitar imágen</button>
                                </div> -->
                                <!-- <div class="text-center img-galeria">
                                    <p class="text-primary">Galeria del producto</p>
                                    <button class="btn btn-link">Imágenes a la galería del producto</button>
                                </div> -->

                                <button type="submit" class="btn btn-primary float-right mt-5" name="btnEditarProductos">Guardar producto</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php
        $editarProducto = new ProductosControlador();
        $editarProducto->ctrActualizarProductos();

        ?>
    </form>
</div>




<!-- Modal -->
<div class="modal fade" id="mdlAgregarImagen" tabindex="-1" aria-labelledby="mdlAgregarImagenLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAgregarImagenLabel">Escoger Imágen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Formato</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="pills-biblioteca-tab" data-toggle="pill" href="#pills-biblioteca" role="tab" aria-controls="pills-biblioteca" aria-selected="true">Biblioteca</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pills-url-tab" data-toggle="pill" href="#pills-url" role="tab" aria-controls="pills-url" aria-selected="false">Url</a>
                                    </li>
                                </ul>
                                <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-biblioteca" role="tabpanel" aria-labelledby="pills-biblioteca-tab">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">

                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-2 col-6">
                                                                <p class="text-r">Resultados:</p>
                                                            </div>
                                                            <div class="col-6">
                                                                <p class="text-s">Espacio en disco duro: /2GB</p>
                                                            </div>
                                                        </div>
                                                        <div class="row " id="listarImagenesAgregar" style="overflow-y: scroll; height: 500px;">

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-url" role="tabpanel" aria-labelledby="pills-url-tab">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>