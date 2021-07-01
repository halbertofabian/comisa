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
                            <select class="form-control" name="pds_ams_id" id="pds_ams_id">
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
                            <input type="text" name="pds_nombre" id="pds_nombre" class="form-control" placeholder="Ingrese el nombre del producto" required>

                        </div>
                        <div class="form-group">
                            <textarea id="pds_descripcion_corta" name="pds_descripcion_corta"></textarea>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <ul class="nav nav-pills nav-primary" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" id="tab-general-tab" data-toggle="pill" href="#tab-general" role="tab" aria-controls="tab-general" aria-selected="true"> General <i class="fa fa-bars" aria-hidden="true"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="v-pills-detalle-precio-tab" data-toggle="pill" href="#v-pills-detalle-precio" role="tab" aria-controls="v-pills-detalle-precio" aria-selected="false">Precio promoción <i class="fas fa-digital-tachograph"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="v-pills-detalle-tab" data-toggle="pill" href="#v-pills-detalle" role="tab" aria-controls="v-pills-detalle" aria-selected="false">Detalle <i class="fas fa-align-justify"></i></a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-12">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade active show" id="tab-general" role="tabpanel" aria-labelledby="tab-general-tab">
                                        <div class="row">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="pds_sku">SKU <i class="far fa-question-circle" data-toggle="tooltip" data-placement="right" title="SKU se refiere a una unidad de almacenamiento de inventario, un identificador único para cada producto y servicio que se puede comprar."></i><strong class="text-primary" data-toggle="tooltip" data-placement="right" title="Campo obligatorio, por favor llenelo">*</strong></label>
                                                    <input type="text" name="pds_sku" id="pds_sku" class="form-control" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="form-group">
                                                    <label for="pds_stok">Existencia <strong class="text-primary" data-toggle="tooltip" data-placement="right" title="Campo obligatorio, por favor llenelo">*</strong> </label>
                                                    <input type="number" name="pds_stok" id="pds_stok" class="form-control" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="form-group">
                                                    <label for="pds_stok_min">Existencia mínima</label>
                                                    <input type="number" name="pds_stok_min" id="pds_stok_min" class="form-control" placeholder="">
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
                                                    <label for="pds_precio_compra">Precio compra <strong class="text-primary" data-toggle="tooltip" data-placement="right" title="Campo obligatorio, por favor llenelo">*</strong></label>
                                                    <input type="text" name="pds_precio_compra" id="pds_precio_compra" class="form-control inputN" placeholder="" value="0" required>
                                                </div>
                                            </div>

                                            <div class="col-md-4 col-6">
                                                <div class="form-group">
                                                    <label for="pds_precio_publico">Precio publico <strong class="text-primary" data-toggle="tooltip" data-placement="right" title="Campo obligatorio, por favor llenelo">*</strong></label>
                                                    <input type="text" name="pds_precio_publico" id="pds_precio_publico" class="form-control inputN" placeholder="" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="form-group">
                                                    <label for="pds_porcentaje_precio_publico">Ganancia %</label>
                                                    <input type="number" name="pds_porcentaje_precio_publico" id="pds_porcentaje_precio_publico" class="form-control" placeholder="">
                                                </div>
                                            </div>


                                            <div class="col-md-4 col-6">
                                                <div class="form-group">
                                                    <label for="pds_precio_mayoreo">Precio mayoreo</label>
                                                    <input type="text" name="pds_precio_mayoreo" id="pds_precio_mayoreo" class="form-control inputN" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="pds_porcentaje_precio_mayoreo">Ganancia %</label>
                                                    <input type="number" name="pds_porcentaje_precio_mayoreo" id="pds_porcentaje_precio_mayoreo" readonly class="form-control inputN" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="pds_porcentaje_descuento_mayoreo">Descuento %</label>
                                                    <input type="text" name="pds_porcentaje_descuento_mayoreo" id="pds_porcentaje_descuento_mayoreo" class="form-control inputN" readonly placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="v-pills-detalle-precio" role="tabpanel" aria-labelledby="v-pills-detalle-precio-tab">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <textarea id="pds_descripcion_larga" name="pds_descripcion_larga"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12">
                <div class="card">

                    <div class="card-body">
                        <div class="row">

                            <div class="col-12">
                                <h4 class="card-title">Detalles</h4>
                                <p class="card-text text-primary">Visibilidad</p>
                                <div class="" data-toggle="">
                                    <label class="btn  active">
                                        <input type="radio" name="pds_visivilidad" id="pds_visivilidad_pos" checked value="POS"> POS
                                    </label>

                                    <label class="btn ">
                                        <input type="radio" name="pds_visivilidad" id="pds_visivilidad_online" value="ONLINE"> ONLINE
                                    </label>
                                    <label class="btn ">
                                        <input type="radio" name="pds_visivilidad" id="pds_visivilidad_pos_online" value="POS/ONLINE"> POS / ONLINE
                                    </label>
                                </div>
                                <p class="card-text text-primary">Categorías</p>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" name="pds_categoria_text" id="pds_categoria_text">
                                            <button type="button" class="btn btn-link btnClickAgregarCategoria float-right d-none">Crear categoría</button>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <!-- <input type="text" class="form-control" id="ctg_buscar_categoria" placeholder="Buscar categoría" style=" border:none; border-bottom:1px solid #EA4D56;"> -->
                                        <div class="mt-2 text-center" id="pds_categoria-content" data-toggle="" style="overflow-y: scroll; height: 200px; border: 1px dashed #000; ">
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-link" id="btnClickAgregarCategoria">+Añadir nueva categoría</button>

                                <!-- <p class="card-text text-primary">Etiqueta</p>
                                <input type="hidden" class="form-control" name="pds_etiquetas_text" id="pds_etiquetas_text">
                                <button class="btn btn-link">+Añadir nueva etiqueta</button> -->

                                <div class="mt-2 pds_etiquetas-content" data-toggle="">
                                    <!-- <label class="btn btn-light active">
                                <input type="checkbox" name="pds_etiquetas" id="pds_etiquetas" checked value="default"> default
                            </label> -->

                                </div>


                                <div class="text-center img-portada">
                                    <p class="text-primary text-center">Imagen del producto <strong class="text-dark">250 x 250 px</strong></p>
                                    <img src="<?php echo HTTP_HOST . 'app/assets/images/sistema/logo-productos-sm.jpeg' ?>" id="pds_imagen_portada_muestra" width="250" height="250" alt="">

                                    <input type="hidden" name="pds_imagen_portada" id="pds_imagen_portada" value="<?php echo HTTP_HOST . 'app/assets/images/sistema/logo-productos-sm.jpeg' ?>"><br>

                                    <button type="button" class="btn btn-link btnAgregarImagen" data-toggle="modal" data-target="#mdlAgregarImagen">Agregar imágen</button>
                                    <button type="button" class="btn btn-link text-primary d-none">Quitar imágen</button>
                                </div>
                                <!-- <div class="text-center img-galeria">
                                    <p class="text-primary">Galeria del producto</p>
                                    <button class="btn btn-link">Imágenes a la galería del producto</button>
                                </div> -->

                                <button type="submit" class="btn btn-primary float-right mt-5" name="btnAgregarProductos">Guardar producto</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php
        $agregarProducto = new ProductosControlador();
        $agregarProducto->ctrAgregarProductos();

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