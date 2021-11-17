<div class="container">
    <div class="row">
        <div class="col-12 col-md-6">
            <h3>Importar lista para actualizar el saldo de cada cuenta de los clientes</h3>
            <p>Instrucciones:</p>
            <ol>

                <li> Descarga el archivo de ejemplo <a href="<?php echo HTTP_HOST . 'export/FORMATO ACTUALIZAR SALDOS.xlsx' ?>" class="btn"> <i class="fa fa-download"></i> Descargar ejemplo</a></li>
                <li> Llena tu Excel siguiendo el ejemplo y los campos obligatorios </li>
                <li> Guardalo con extensión .xls o .csv </li>
                <li> De click en seleccionar archivo </li>
                <li> Cargue el archivo excel permitido </li>
                <li> Una vez realizado estos pasos, da click en el botón Actualizar saldo </li>

            </ol>
        </div>
        <div class="col-12 col-md-6">

            <div class=" card-body">
                <h4 class="card-title">Cargar archivo</h4>
                <form method="post" enctype="multipart/form-data" id="formActualizarSaldos">
                    <input type="file" class="form-control" name="input_saldos" id="input_saldos">
                    <button type="submit" class="btn btn-success mt-1 float-right btn-load">
                        <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                        Actualizar saldo
                    </button>
                </form>

            </div>
        </div>

    </div>

</div>