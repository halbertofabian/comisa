<?php
//$contratos = ContratosModelo::mdlConsultarContratosAll();
?>

<!-- <div class="row">


    <div class="col-12">

        <table class="table table-striped table-hover tablas">
            <thead>
                <tr>
                    <th># FOLIO</th>
                    <th>FECHA</th>
                    <th>VENDEDOR</th>
                    <th>CLIENTE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($contratos as $key => $cts) : ?>
                <tr>
                <td> <a href="<?= HTTP_HOST . 'contratos/buscar/' . $cts['ctr_id'] ?>" class="btn btn-primary"> <?= $cts['ctr_folio'] . '<br>' . $cts['clts_folio_nuevo'] ?> </a> </td>
                <td><?= $cts['ctr_fecha_contrato'] ?></td>
                <td><?= $cts['usr_nombre'] ?></td>
                <td><?= $cts['ctr_cliente'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>

</div> -->

<div class="card">

    <div class="card-header text-center bg-primary">

        <div class="row" style="color:aliceblue">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ctr_folio">FILTRO DE BUSQUEDA</label>
                    <input type="text" name="ctr_folio" id="ctr_folio" class="form-control" placeholder="">
                    <small id="helpId" class="">Nº TICKET / CTA / RUTA </small>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ctr_vendedor">VENDEDOR</label>
                    <select name="ctr_vendedor" id="ctr_vendedor" class="form-control select2">
                        <option value=""></option>
                        <?php
                        $usuarios = UsuariosModelo::mdlMostrarUsuarios();
                        foreach ($usuarios as $key => $usr) :
                        ?>
                            <option value="<?= $usr['usr_id'] ?>"> <?= $usr['usr_nombre']  ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ctr_fecha_inicio">FECHA INICIO </label>
                    <input type="date" name="ctr_fecha_inicio" id="ctr_fecha_inicio" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ctr_fecha_fin">FECHA FIN </label>
                    <input type="date" name="ctr_fecha_fin" id="ctr_fecha_fin" class="form-control">
                </div>
            </div>
            <div class="col-9"></div>
            <div class="col-3">
                <button type="submit" class="btn btn-block  float-right" id="btnListarContratos" style="background-color:#fff;border: 1px solid #fff; color:#103760">Buscar</button>
            </div>

        </div>

    </div>
    <div class="d-load d-none">
        <div class="d-flex justify-content-center mt-5">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    <div class="card-body" style="height:500px; overflow-y: scroll;">
        <div class="row">
            <div class="col-12  table-responsive">
                <table class="table table-striped table-hover tblContratos" width="100%">
                    <thead>
                        <tr class="text-center">
                            <th>+Opciones</th>
                            <th>Nº</th>
                            <th>CODIGO</th>
                            <th>Nº CUENTA</th>
                            <th>RUTA</th>
                            <th>CLIENTE</th>
                            <th>DOMICILIO</th>
                            <th>VENDEDOR</th>
                            <th>FECHA DE VENTA</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyContratos">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        <div class="row">
            <div class="col-md-6">
                <a href="" target="_blanck" id="btnExportarContratos" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i>
                    Descargar
                </a>
            </div>
            <div class="col-md-6">
                <form id="formImportarContratos" method="post">
                    <input type="file" id="input_file" class="form-control">
                    <button type="submit" class="btn btn-primary mt-1 float-right btnImportarContratos btn-load">Importar contratos</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Asignar ruta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="AsignarRuta" method="post">
                <input type="hidden" name="ctr_id" id="ctr_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>TICKET: </strong><span id="ctr_ticket"></span><br>
                                <strong>NOMBRE: </strong><span id="ctr_nombre"></span><br>
                                <strong>DIRECCION: </strong><span id="ctr_domicilio"></span><br>
                                <strong>COL: </strong><span id="ctr_colonia"></span><br>
                                <strong>UBICACION: </strong><span id="ctr_ubicacion"></span><br>
                                <strong>TELEFONO: </strong><span id="ctr_telefono"></span><br>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ctr_ruta">RUTA</label>
                                <select name="ctr_ruta" id="ctr_ruta" class="form-control">
                                    <option value="-">Selecione una ruta</option>
                                    <?php for ($i = 1; $i <= 16; $i++) : ?>
                                        <option value="<?= 'R' . $i ?>"> <?= 'R' . $i ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="ctr_numero_cuenta">CUENTA</label>
                                <input type="text" name="ctr_numero_cuenta" id="ctr_numero_cuenta" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-load">Asignar ruta y número de cuenta</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        listarContrato();
    })

    $("#ctr_ruta").on("change", function() {
        var ctr_ruta = $(this).val();

        var datos = new FormData();

        datos.append("ctr_ruta", ctr_ruta)
        datos.append("btnBuscarRuta", true)

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

                if (!res) {
                    var numero_cuenta = Number(1);

                } else {
                    var numero_cuenta = Number(res.ctr_numero_cuenta) + 1;

                }
                $("#ctr_numero_cuenta").val(numero_cuenta)

            }
        })
    })


    $("#AsignarRuta").on("submit", function(e) {
        e.preventDefault();
        var datos = new FormData(this);
        datos.append("btnAsignarRutaCuenta", true);
        $.ajax({
            type: "POST",
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            cache: false,
            dataType: "json",
            processData: false,
            contentType: false,
            beforeSend: function() {
                startLoadButton()
                //$(".d-load").removeClass("d-none")


            },
            success: function(res) {
                stopLoadButton()
                if (res) {

                    toastr.success("Ruta y número de cuanta asignado", "Muy bien");
                    var ctr_folio = $("#ctr_folio").val();
                    var ctr_vendedor = $("#ctr_vendedor").val();
                    var ctr_fecha_inicio = $("#ctr_fecha_inicio").val();
                    var ctr_fecha_fin = $("#ctr_fecha_fin").val();
                    listarContrato(ctr_folio, ctr_vendedor, ctr_fecha_inicio, ctr_fecha_fin);
                } else {
                    toastr.error("Intente de nuevo", "Error");
                }

            }
        })


    })


    $(".tblContratos tbody").on("click", "button.btnAsignarRuta", function() {



        $("#ctr_ticket").html("");
        $("#ctr_nombre").html("");
        $("#ctr_domicilio").html("");
        $("#ctr_colonia").html("");
        $("#ctr_telefono").html("");
        $("#ctr_ubicacion").html("");
        $('#ctr_ruta option')[0].selected = true;

        var datos = new FormData();

        var ctr_id = $(this).attr("ctr_id");
        datos.append("ctr_id", ctr_id)
        datos.append("btnAsignarRuta", true)

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

                if (res.ctr_ruta == '-') {

                    $('#ctr_ruta option')[0].selected = true;

                } else {
                    $("#ctr_ruta option[value=" + res.ctr_ruta + "]").attr("selected", true);
                }
                if (res.ctr_ruta != '-' && res.ctr_numero_cuenta != 0) {

                    swal({
                            title: "¿Desea continuar?",
                            text: "A este contrato ya se le asigno anteriormente un número de cuenta y ruta si usted continua, a este contrato se le asignará un nuevo número de cuenta y perderá el que ya tiene ",
                            icon: "warning",
                            buttons: ["Cancelar", "Si, asumir el riesgo"],
                            dangerMode: true,
                            closeOnClickOutside: false,
                        })
                        .then((willDelete) => {
                            if (willDelete) {

                            } else {
                                window.location.reload();
                            }
                        });
                }

                $("#ctr_numero_cuenta").val(res.ctr_numero_cuenta)

                $("#ctr_ticket").html(res.ctr_folio);
                $("#ctr_nombre").html(res.ctr_cliente);
                $("#ctr_domicilio").html(res.clts_domicilio);
                $("#ctr_colonia").html(res.clts_col);
                $("#ctr_telefono").html(res.clts_telefono);
                $("#ctr_ubicacion").html(res.clts_coordenadas);
                $("#ctr_id").val(ctr_id)


            }
        })


    })


    $("#btnListarContratos").on("click", function() {

        var ctr_folio = $("#ctr_folio").val();
        var ctr_vendedor = $("#ctr_vendedor").val();
        var ctr_fecha_inicio = $("#ctr_fecha_inicio").val();
        var ctr_fecha_fin = $("#ctr_fecha_fin").val();
        listarContrato(ctr_folio, ctr_vendedor, ctr_fecha_inicio, ctr_fecha_fin);
    })

    function listarContrato(ctr_folio = "",
        ctr_vendedor = "",
        ctr_fecha_inicio = "",
        ctr_fecha_fin = "") {

        $("#tbodyContratos").html("");
        var datos = new FormData();

        datos.append("ctr_folio", ctr_folio)
        datos.append("ctr_vendedor", ctr_vendedor)
        datos.append("ctr_fecha_inicio", ctr_fecha_inicio)
        datos.append("ctr_fecha_fin", ctr_fecha_fin)

        datos.append("btnListarContratos", true);

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
                $(".d-load").removeClass("d-none")


            },
            success: function(res) {

                $(".d-load").addClass("d-none")
                var tbodyContratos = "";

                res.forEach(ctr => {

                    tbodyContratos +=
                        `
                        <tr class="text-center">

                            <td>
                               <div class="btn-group">
                                <a href="${urlApp+'contratos/buscar/'+ctr.ctr_id}"  class="btn btn-warning text-center">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="${urlApp+'app/report/contrato-ventas.php?ctr_id='+ctr.ctr_id}" target="_blacnk"  class="btn btn-secondary text-center btnImprimirContrato" ctr_id="${ctr.ctr_id}" >
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                </a>
                                <button   class="btn btn-primary text-center btnAsignarRuta" ctr_id="${ctr.ctr_id}" data-toggle="modal" data-target="#exampleModal" >
                                <i class="fa fa-map-marker" aria-hidden="true"></i>

                                </button>
                               </div>
                            </td>
                            <td>${ctr.ctr_folio}</td>
                            <td>${ctr.ctr_numero_cuenta+""+ctr.ctr_ruta}</td>
                            <td>${ctr.ctr_numero_cuenta}</td>
                            <td>${ctr.ctr_ruta}</td>
                            <td>${ctr.ctr_cliente}</td>
                            <td>${ctr.clts_domicilio+" "+ctr.clts_col}</td>
                            <td>${ctr.ctr_elaboro}</td>
                            <td>${ctr.ctr_fecha_contrato}</td>
                        
                        </tr>
                        
                        `;


                });

                //alert(ctr_folio);

                var urlExport = urlApp + 'export/contratos.php?ctr_folio=' + ctr_folio + '&ctr_vendedor=' + ctr_vendedor + '&ctr_fecha_inicio=' + ctr_fecha_inicio + '&ctr_fecha_fin=' + ctr_fecha_fin

                $("#btnExportarContratos").attr("href", urlExport)
                $("#tbodyContratos").html(tbodyContratos);
            }
        })


    }
</script>