<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card mt-3">
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col-md-2 col-12">
                            <div class="form-group">
                                <label for="">Ruta</label>
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
                    </div>
                    <table class="table tablas text-center">
                        <thead class="thead-light">
                            <tr>
                                <th colspan="8">Listar de observaciones</th>
                            </tr>
                            <tr>
                                <th>Folio</th>
                                <th>Ruta</th>
                                <th>Cuenta</th>
                                <th>Cliente</th>
                                <th>Observación</th>
                                <th>Usuario</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_observaciones">
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        mostrarObservaciones();
    });

    function mostrarObservaciones() {
        var ctr_ruta = $("#ctr_ruta").val();
        var datos = new FormData()
        datos.append('ctr_ruta', ctr_ruta);
        datos.append('btnMostrarObservacionesPendientes', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                var tbody_observaciones = "";

                res.forEach(obs => {
                    tbody_observaciones += `
                    <tr>
                        <td> <a target="_blank" href="${urlApp + 'contratos/buscar/' + obs.obs_ctr_id}">${obs.ctr_folio}</a></td>
                        <td>${obs.ctr_ruta}</td>
                        <td>${obs.ctr_numero_cuenta}</td>
                        <td>${obs.ctr_cliente}</td>
                        <td>${obs.obs_observaciones}</td>
                        <td>${obs.obs_usuario}</td>
                        <td>${obs.obs_fecha}</td>
                        <td>
                            <button class="btn btn-success btnCompletar" obs_id="${obs.obs_id}">Completar</button>
                        </td>

                    </tr>
                    `;
                });

                $("#tbody_observaciones").html(tbody_observaciones);
            }
        });
    }

    $('#ctr_ruta').on('change', function() {
        mostrarObservaciones();
    });

    $(document).on("click", ".btnCompletar", function() {

        let obs_id = $(this).attr("obs_id");

        var datos = new FormData();
        datos.append("obs_id", obs_id)
        datos.append("btnCompletar", true);

        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function() {
                //startLoadButton()
            },
            success: function(res) {

                if (res) {
                    swal({
                            title: 'Observación completada',
                            icon: "success",
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location.reload();
                            }
                        })
                } else {

                    swal({
                            title: 'Ocurrio un error, intenta de nuevo',
                            icon: "error",
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location.reload();
                            }
                        })

                }
            }
        });

    });
</script>