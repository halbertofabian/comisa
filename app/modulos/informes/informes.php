<?php
cargarComponente('breadcrumb', '', 'Gestión de informes');
?>

<div class="container">

    <div class="card">

        <div class="card-body">
            <form method="post" id="formInforme_1">

                <div class="row">
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label for="ifs_fecha_inicio">Fecha inicio</label>
                            <input type="date" name="ifs_fecha_inicio" id="ifs_fecha_inicio" required class="form-control theDate">
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label for="ifs_fecha_fin">Fecha fin</label>
                            <input type="date" name="ifs_fecha_fin" id="ifs_fecha_fin" required class="form-control theDate">
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <div class="form-group">
                            <label for="ifs_concepto">Concepto</label>
                            <select name="ifs_concepto" id="ifs_concepto" class="form-control">
                                <option value="">Todos los conceptos</option>
                                <option value="PPG_INSCRIPCION">Inscripción</option>
                                <option value="PPG_GUIA">Guía</option>
                                <option value="PPG_EXAMEN">Exámen</option>
                                <option value="PPG_INCORPORACION">Incorporación</option>
                                <option value="PPG_CERTIFICADO">Certificado</option>
                                <option value="PPG_SEMANAL">Semanal</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 col-12">
                        <button type="submit" class="btn btn-primary mt-2 btn-load">Filtrar</button>
                    </div>
                </div>

            </form>
            <div class="row">
                <div class="col-md-3">
                    <p id="text-cert"></p>
                </div>
                <div class="col-md-3">
                    <p id="text-total"></p>
                </div>
                <div class="col-md-3">
                    <a href="" id="btn_export_result" class="btn btn-success waves-effect waves-light d-none" data-toggle="tooltip" data-placement="top" title="" data-original-title="Exportar resultados a Excel"> <i class="fa fa-file-excel-o"></i> </a>

                </div>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <table class="table table-striped tablaInforme1">
                <thead>
                    <tr>
                        <th># Número de transacción</th>
                        <th># Inscripción</th>
                        <th># Ficha de pago</th>
                        <th>Sub monto</th>
                        <th>Monto total</th>
                        <th>Descuento</th>
                        <th>Concepto</th>
                        <th>Adeudo</th>
                        <th>Fecha registro</th>
                        <th>Usuario registro</th>
                    </tr>
                </thead>
                <tbody id="tbodyInforme_1">

                </tbody>
            </table>

        </div>
    </div>

</div>