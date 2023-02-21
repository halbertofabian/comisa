<style>
    body {
        background-color: #F2F3F7
    }

    .card-status {
        height: 200px;
        border-radius: 8px;
        box-sizing: border-box;
        border: 1px solid #dad9da;
        padding: 1rem 1rem;

    }

    .card-status:hover {
        box-shadow: 5px 5px 25px 0.5px #88888885;
        border: 1px solid #005EF9;
        cursor: pointer;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="ctr_ruta">Ruta</label>
                <select name="ctr_ruta" id="ctr_ruta" class="form-control select2">
                    <option value="">Selecionar ruta</option>
                    <?php
                    for ($i = 1; $i <= 50; $i++) :
                    ?>
                        <option value="R<?= $i ?>">R<?= $i ?></option>
                    <?php endfor; ?>
                </select>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="cra_etiqueta">Etiqueta</label>
                <select name="cra_etiqueta" id="cra_etiqueta" class="form-control select2">
                    <option value="">Selecionar etiqueta</option>
                    <?php
                    $etiquetas = [
                        "LZR" => "Localizar",
                        "SRV" => "Servicios",
                        "RCG" => "Recoger",
                        "SPR" => "Supervisar",
                        "TRT" => "Traspasos",
                        "SLS" => "Seg. en llamadas",
                        "CVS" => "Convenios",
                        "FLS" => "Fallecidas",
                        "JDC" => "Juridico",
                    ];

                    foreach ($etiquetas as $key => $etq) :
                    ?>
                        <option value="<?= $key ?>"><?= $etq ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 table-responsive">
            <table id="datatable_cuenta" class="table table-striped table-bordered table-hover tablaStatus tablas">
                <thead>
                    <tr class="text-center">
                        <th>#RUTA</th>
                        <th>#CUENTA</th>
                        <th>CLIENTE</th>
                        <th>DIRECCIÓN</th>
                        <th>COLONIA</th>
                        <th>COORDENADAS</th>
                        <th>SALDO</th>
                        <th>FECHA COBRO</th>
                        <th>FECHA REAGENDA</th>
                        <th>ORDEN</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        mostrarStatus();
    });

    $("#ctr_ruta").on("change", function() {
        mostrarStatus();
    })
    $("#cra_etiqueta").on("change", function() {
        mostrarStatus();
    })

    function mostrarStatus() {
        datatable_productos = $('#datatable_cuenta').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            "ajax": {
                "url": urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
                "method": 'POST', //usamos el metodo POST
                "data": {
                    btnMostrarCuentasStatus: true,
                    ctr_ruta: $("#ctr_ruta").val(),
                    cra_status: $("#cra_etiqueta").val()

                }, //enviamos opcion 4 para que haga un SELECT
                "dataSrc": ""
            },
            "bDestroy": true,
            "columns": [{
                    "data": "ctr_ruta"
                },
                {
                    "data": "ctr_numero_cuenta"
                },
                {
                    "data": "ctr_cliente"
                },
                {
                    "data": "clts_domicilio"
                },
                {
                    "data": "clts_col"
                },
                {
                    "data": "clts_coordenadas"
                },
                {
                    "data": "ctr_saldo_actual"
                },
                {
                    "data": "cra_fecha_cobro"
                },
                {
                    "data": "cra_fecha_reagenda"
                },
                {
                    "data": "cra_orden"
                },
                
                // {
                //     "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm btnEditar'><i class='material-icons'>edit</i></button><button class='btn btn-danger btn-sm btnBorrar'><i class='material-icons'>delete</i></button></div></div>"
                // }
            ]
        });
    }
</script>