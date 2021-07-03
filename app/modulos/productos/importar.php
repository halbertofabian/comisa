<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <h3>Importa tu lista de productos</h3>
            <p>Instrucciones:</p>
            <ol>

                <li> Descarga el archivo de ejemplo <a href="<?php echo HTTP_HOST . 'export/Formato importar productos.xlsx' ?>" class="btn"> <i class="fa fa-download"></i> Descargar ejemplo</a></li>
                <li> Llena tu Excel siguiendo el ejemplo </li>
                <li> Guardalo con extensión .xls o .csv </li>
                <li> Cargue el archivo excel permitido </li>
                <li> Una vez realizado estos pasos, da click en el botón Importar productos </li>

            </ol>
        </div>
        <div class="col-12 col-md-6">

            <div class=" card-body">
                <h4 class="card-title">Cargar archivo</h4>
                <form method="post" enctype="multipart/form-data" id="formImportarProductosComisa">

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
                    <input type="file" class="form-control" name="input_file" id="input_file">
                    <button type="submit" class="btn btn-success mt-1 float-right btnImportarProductos btn-load">
                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                        Importar productos
                    </button>
                </form>

            </div>
        </div>

    </div>
</div>