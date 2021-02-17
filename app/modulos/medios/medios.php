<?php cargarComponente('breadcrumb', '', 'Biblioteca de medios');
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <button class="btn btn-danger float-right btnAddNuevo">Añadir nuevo</button>
                </div>
            </div>
        </div>
        <?php include_once 'app/componentes/upload_image.php';


        //    $ok =  unlink('/Applications/XAMPP/xamppfiles/htdocs/softgym/app/upload/000001/475695-2020-10-23-03-02-53.jpeg');
        //     preArray($ok);


        //echo $tamano;

        ?>
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
                    <div class="row " id="listarImagenes">

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="mdlViewImg" tabindex="-1" aria-labelledby="mdlViewImgLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="width: 100%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlViewImgLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-8 col-12 text-center">
                        <div class="card">
                            <div class="card-body">
                                <img src="" id="mds_img_url" style="max-width: 100%;" alt=""><br>

                                <div class="row m-2">
                                    <div class="col-12">
                                        <div id="container-delete">
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12" style="overflow: scroll; height: 500px;">
                        <div class="card">

                            <div class="card-body">
                                <p><strong style="font-size: 12px; color:#666666">Nombre del archivo: </strong><span id="mds_url"> </span></p>
                                <p><strong style="font-size: 12px; color:#666666">Tipo de archivo: </strong><span id="mds_tipo"> </span></p>
                                <p><strong style="font-size: 12px; color:#666666">Subido el: </strong><span id="mds_fecha_subida"> </span></p>
                                <p><strong style="font-size: 12px; color:#666666">Tamaño del archivo: </strong><span id="mds_tamano"> </span></p>
                                <p><strong style="font-size: 12px; color:#666666">Dimensiones: </strong><span id="mds_dimensiones"> </span></p>
                                <p><strong style="font-size: 12px; color:#666666">Subido por: </strong><span id="mds_usuario_registro"> </span></p>


                                <form method="post">
                                    <div class="form-group">
                                        <label for="">Nombre:</label>
                                        <input type="text" name="" id="" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Texto alternativo:</label>
                                        <input type="text" name="" id="" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Título:</label>
                                        <input type="text" name="" id="" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Leyenda:</label>
                                        <input type="text" name="" id="" class="form-control" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Descripción:</label>
                                        <textarea name="" id="" class="form-control" placeholder=""></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">URL del archivo:</label>
                                        <input type="text" name="" id="" class="form-control" placeholder="">
                                    </div>
                                    <button class="btn btn-danger mt-3 float-right" name="btnGuardarCambios">Guardar cambios</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>