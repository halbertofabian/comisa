<div class="row">
    <div class="col-md-2 col-12">
        <div class="form-group">
            <label for="srv_año">Tiempo</label>
            <select class="form-control select2" name="srv_año" id="srv_año">
                <option selected value="<?= date('Y-m-d') ?>/<?= date('Y-m-d') ?>">Hoy</option>
                <option value="<?= date('Y-m-d', strtotime('-1 day')) ?>/<?= date('Y-m-d', strtotime('-1 day')) ?>">Ayer</option>
                <option value="<?= date('Y-m-d', strtotime('monday this week')) ?>/<?= date('Y-m-d', strtotime('sunday this week')) ?>">Semana en curso</option>
                <option value="<?= date('Y-m-01') ?>/<?= date('Y-m-t') ?>">Mes en curso</option>
                <option value="<?= date('Y-01-01') ?>/<?= date('Y-12-31') ?>">Año en curso</option>
                <option value="R">Elegir un rango</option>
            </select>
            <input type="hidden" id="fecha-inicio" class="form-control mb-1 mt-1" value="<?= date('Y-m-d') ?>">
            <input type="hidden" id="fecha-fin" class="form-control" value="<?= date('Y-m-d') ?>">
        </div>
    </div>
    <div class="col-md-2 col-12">
        <div class="form-group">
            <label for="usr_id">Cobrador</label>
            <select name="usr_id" id="usr_id" class="form-control select2" placeholder="">
                <option value="">-Seleccionar-</option>
                <?php
                $usuarios = UsuariosModelo::mdlMostrarUsuarios();
                foreach ($usuarios as $key => $usr) :
                ?>
                    <option value="<?= $usr['usr_id'] ?>"> <?= $usr['usr_nombre']  ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="col-md-2 col-12">
        <div class="form-group">
            <label for="igs_cuenta">Banco</label>
            <select class="form-control " name="igs_cuenta" id="igs_cuenta">

                <option value="">Seleccione una cuenta</option>
                <?php
                $cuentas = CuentasModelo::mdlMostrarCuentas();
                foreach ($cuentas as $key => $cbco) : ?>

                    <option value="<?= $cbco['cbco_id'] ?>"><?= $cbco['cbco_nombre'] ?></option>

                <?php endforeach; ?>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <table class="table table-bordered text-center" id="datatable_depositos">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Concepto</th>
                    <th>Responsable</th>
                    <th>Banco</th>
                    <th>Monto</th>
                    <th>Referencia</th>
                    <th>Registro</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

<!-- Modal ver foto deposito -->
<div class="modal fade" id="verFotoDeposito" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <img id="foto_deposito" src="" width="100%" alt="foto_deposito">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        mostrarAllDepositos();
    });

    function mostrarAllDepositos() {
        datatable_depositos = $('#datatable_depositos').DataTable({
            dom: 'Bfrtip',
            responsive: true,
            buttons: [
                'copy', 'csv', 'excel', 'pdf'
            ],
            'ajax': {
                'url': urlApp + 'app/modulos/cobranza/cobranza.ajax.php',
                'method': 'POST', //usamos el metodo POST
                'data': {
                    btnMostrarAllDepositos: true,
                    srv_año: $('#srv_año').val(),
                    usr_id: $('#usr_id').val(),
                    igs_cuenta: $('#igs_cuenta').val(),
                    fecha_inicio: $("#fecha-inicio").val(),
                    fecha_fin: $("#fecha-fin").val(),
                }, //enviamos opcion 4 para que haga un SELECT
                'dataSrc': ''
            },
            'bDestroy': true,
            'order': false,
            'columns': [{
                    'data': 'abs_id'
                },
                {
                    'data': 'abs_folio'
                },
                {
                    'data': 'usr_nombre'
                },
                {
                    'data': 'cbco_nombre'
                },
                {
                    'data': 'abs_monto'
                },
                {
                    'data': 'abs_referancia'
                },
                {
                    'data': 'abs_fecha_cobro'
                },
            ]
        });
    }

    $('#srv_año').on('change', function() {
        mostrarAllDepositos();
        if ($(this).val() === "R") {
            $("#fecha-inicio").attr('type', 'date')
            $("#fecha-fin").attr('type', 'date')
        } else {
            $("#fecha-inicio").attr('type', 'hidden')
            $("#fecha-fin").attr('type', 'hidden')
        }
    });
    $("#fecha-inicio").on("change", function() {
        mostrarAllDepositos();

    })
    $("#fecha-fin").on("change", function() {
        mostrarAllDepositos();

    })
    $('#usr_id').on('change', function() {
        mostrarAllDepositos();
    });
    $('#igs_cuenta').on('change', function() {
        mostrarAllDepositos();
    });

    $(document).on('click', '.btnMostrarComprobanteDeposito', function() {
        var abs_foto_deposito = $(this).attr('abs_foto_deposito');
        $("#foto_deposito").attr('src', abs_foto_deposito);
        $("#verFotoDeposito").modal('show');

    });
</script>