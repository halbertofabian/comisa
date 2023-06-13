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
                    <small id="helpId" class="">Nº TICKET / CTA / RUTA / NOMBRE </small>
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
            <div class="col-6"></div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="ctr_status_c">Status</label>
                    <select class="form-control select2" name="ctr_status_c" id="ctr_status_c">
                        <option value="">-Seleccionar-</option>
                        <?php
                        $status = ContratosModelo::mdlMostrarEstadosCtr();
                        foreach ($status as $st) :
                        ?>
                            <option value="<?= $st['ctr_status_cuenta'] ?>"><?= $st['ctr_status_cuenta'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-3">
                <button type="submit" class="btn btn-block  float-right" id="btnListarContratos" style="background-color:#fff;border: 1px solid #fff; color:#103760">Buscar</button>
            </div>

        </div>


        <input type="hidden" value="<?= $_SESSION['session_usr']['usr_rol'] ?>" id="session_usr_rol">

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
                <table class="table table-hover tblContratos" width="100%">
                    <thead>
                        <tr class="text-center">
                            <th>+Opciones</th>
                            <th>Nº</th>
                            <th>CODIGO</th>
                            <th>Nº CUENTA</th>
                            <th>RUTA</th>
                            <th>CLIENTE</th>
                            <th>DOMICILIO</th>
                            <th>ELABORO</th>
                            <th>STATUS</th>
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
            <div class="col-6">
                <div class="alert alert-dark" role="alert">
                    <strong>Resultados: </strong><span id="ctr_count" class="text-primary"></span>
                </div>
            </div>
            <div class="col-6"></div>
            <div class="col-md-6">
                <a href="" target="_blanck" id="btnExportarContratos" class="btn btn-success"><i class="fa fa-file-excel-o" aria-hidden="true"></i>
                    Descargar
                </a>
            </div>
            <?php if ($_SESSION['session_usr']['usr_rol'] != 'Agente de llamadas') : ?>
                <div class="col-md-6">
                    <form id="formImportarContratos" method="post">
                        <input type="file" id="input_file" class="form-control">
                        <button type="submit" class="btn btn-primary mt-1 float-right btnImportarContratos btn-load">Importar contratos</button>
                    </form>
                </div>
            <?php endif; ?>
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
                                    <?php for ($i = 1; $i <= 50; $i++) : ?>
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

<div class="modal fade" id="mdlClientesMal" tabindex="-1" role="dialog" aria-labelledby="mdlClientesMalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Clientes con mal historial</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-load-c d-node">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <form id="formRegistroClienteMalH" method="post" class="d-none">
                <input type="hidden" name="ctr_id" id="ctr_id_c">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="clts_ruta">Ruta</label>
                            <input type="text" name="clts_ruta" id="clts_ruta" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="clts_cuenta">Cuenta</label>
                            <input type="text" name="clts_cuenta" id="clts_cuenta" class="form-control" placeholder="">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="clts_fecha_venta">Fecha de venta</label>
                            <input type="text" name="clts_fecha_venta" id="clts_fecha_venta" class="form-control">
                        </div>

                        <div class="form-group col-md-5">
                            <label for="clts_nombre">Nombre del cliente *</label>
                            <input type="text" name="clts_nombre" id="clts_nombre" class="form-control" placeholder="Ingresa el nombre del cliente" required>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="clts_curp">CURP</label>
                            <input type="text" name="clts_curp" id="clts_curp" class="form-control" placeholder="Ingresa la curp del cliente">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="clts_telefono">Número de telefono</label>
                            <input type="text" name="clts_telefono" id="clts_telefono" class="form-control phone_mx" placeholder="Ingresa el número del cliente">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="clts_domicilio">Domicilio *</label>
                            <input type="text" name="clts_domicilio" id="clts_domicilio" class="form-control" placeholder="Ingrese el domicilio" required>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="clts_col">Colonia</label>
                            <input type="text" name="clts_col" id="clts_col" class="form-control" placeholder="Ingrese la colonia">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="clts_ubicacion">Ubicación</label>
                            <input type="text" name="clts_ubicacion" id="clts_ubicacion" class="form-control" placeholder="Ingrese la ubicación">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="clts_tipo_cliente">Status *</label>
                            <input type="text" name="clts_tipo_cliente" id="clts_tipo_cliente" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="clts_articulo">Mercancía</label>
                            <input type="text" name="clts_articulo" id="clts_articulo" class="form-control" placeholder="" required>
                        </div>


                        <div class="form-group col-12">
                            <label for="clts_observaciones"></label>
                            <textarea name="clts_observaciones" id="clts_observaciones" cols="30" rows="5" class="form-control" placeholder="Escriba aquí las observaciones"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary btn-load">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalProductos" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-light"><i class="fa fa-dropbox fa-lg text-light"></i> Productos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-light">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>SKU</th>
                            <th>CANTIDAD</th>
                            <th>DESCRIPCION</th>
                        </tr>
                    </thead>
                    <tbody id="tbody_productos">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="mdlPendientes" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pendientes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-12 col-12">
                        <strong>No. de cuenta: </strong><span id="ctr_cta"></span></br>
                        <strong>Ruta: </strong><span id="ctr_rta"></span></br>
                        <strong>Cliente: </strong><span id="ctr_nom"></span></br>
                        <strong>Domicilio: </strong><span id="ctr_dom"></span><span id="clts_colnia"></span></br>
                        <strong>Curp: </strong><span id="ctr_cp"></span></br>
                        <strong>Telefono: </strong><span id="ctr_tel"></span></br>
                        <strong>Status: </strong><span id="status_cuenta"></span></br>
                        <div class="form-group">
                            <label for="ctr_not"><strong>Observaciones:</strong></label>
                            <textarea class="form-control" name="ctr_not" id="ctr_not" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <div id="buttons">

                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        listarContrato();
        $('[data-dismiss="modal"]').on('click', function() {
            $('.modal').modal('hide');
        });
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

                    $('#exampleModal').modal('hide')
                } else {
                    toastr.error("Intente de nuevo", "Error");
                }

            }
        })


    })

    $("#formRegistroClienteMalH").on("submit", function(e) {


        e.preventDefault();

        swal({
                title: "¿Desea continuar?",
                text: "Este cliente se alacenará en la base de datos de clientes con mal historial",
                icon: "warning",
                buttons: ["Cancelar", "Si, se lo merece"],
                dangerMode: true,
                closeOnClickOutside: false,
            })
            .then((willDelete) => {
                if (willDelete) {

                    var datos = new FormData(this);
                    datos.append("btnRegistrarClienteMalH", true);
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
                        },
                        success: function(res) {
                            stopLoadButton("Guardar");
                            if (res.status) {
                                swal({
                                    title: '¡Bien!',
                                    text: res.mensaje,
                                    type: 'success',
                                    icon: 'success'
                                }).then(function() {
                                    location.reload();
                                });
                            } else {
                                swal({
                                    title: 'Error',
                                    text: res.mensaje,
                                    icon: 'error',
                                    buttons: [false, 'Intentar de nuevo'],
                                    dangerMode: true,
                                }).then((willDelete) => {
                                    if (willDelete) {} else {}
                                })
                            }


                        }
                    })

                } else {
                    window.location.reload();
                }
            });



    })

    $(document).on("click", ".btnAsignarRuta", function() {



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
        datos.append("btnConsultarContrato", true)

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
                    $('#ctr_ruta option')[0].selected = true;

                    // $("#ctr_ruta option[value=" + res.ctr_ruta + "]").attr("selected", true);
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

                //$("#ctr_numero_cuenta").val(res.ctr_numero_cuenta)

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

    $(".tblContratos tbody").on("click", "button.btnClientesMal", function() {
        var datos = new FormData();

        var ctr_id = $(this).attr("ctr_id");
        datos.append("ctr_id", ctr_id)
        datos.append("btnConsultarContrato", true)

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

                $(".d-load-c").removeClass("d-none")

            },
            success: function(res) {
                $("#formRegistroClienteMalH").removeClass("d-none")
                $(".d-load-c").addClass("d-none")

                var productos = JSON.parse(res.ctr_productos);

                console.log(productos);

                var mercancia = "";

                productos.forEach(pds => {
                    mercancia += pds.cantidad + " " + pds.nombreProducto + ","
                });

                $("#clts_ruta").val(res.ctr_ruta)
                $("#clts_cuenta").val(res.ctr_numero_cuenta)
                $("#clts_fecha_venta").val(res.ctr_fecha_contrato)
                $("#clts_nombre").val(res.ctr_cliente)
                $("#clts_curp").val(res.clts_curp)
                $("#clts_telefono").val(res.clts_telefono)
                $("#clts_domicilio").val(res.clts_domicilio)
                $("#clts_col").val(res.clts_col)
                $("#clts_ubicacion").val(res.clts_coordenadas)
                $("#clts_tipo_cliente").val(res.ctr_status_cuenta)
                $("#clts_articulo").val(mercancia)
                $("#clts_observaciones").html(res.ctr_nota)
                $("#ctr_id_c").val(res.ctr_id)

            }
        })
    })


    // $("#ctr_folio").on("keyup", function() {
    //     var ctr_folio = $("#ctr_folio").val();
    //     var ctr_vendedor = $("#ctr_vendedor").val();
    //     var ctr_fecha_inicio = $("#ctr_fecha_inicio").val();
    //     var ctr_fecha_fin = $("#ctr_fecha_fin").val();
    //     listarContrato(ctr_folio, ctr_vendedor, ctr_fecha_inicio, ctr_fecha_fin);
    // })

    $("#btnListarContratos").on("click", function() {

        var ctr_folio = $("#ctr_folio").val();
        var ctr_vendedor = $("#ctr_vendedor").val();
        var ctr_fecha_inicio = $("#ctr_fecha_inicio").val();
        var ctr_fecha_fin = $("#ctr_fecha_fin").val();
        var ctr_status_c = $("#ctr_status_c").val();
        listarContrato(ctr_folio, ctr_vendedor, ctr_fecha_inicio, ctr_fecha_fin, ctr_status_c);
    })

    $(document).on("click", ".btnPendiente", function() {

        var datos = new FormData();

        var ctr_id = $(this).attr("ctr_id");
        datos.append("ctr_id", ctr_id)
        datos.append("btnPendiente", true)

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
                $("#ctr_cta").html(res.ctr_numero_cuenta)
                $("#ctr_rta").html(res.ctr_ruta)
                $("#ctr_nom").html(res.ctr_cliente);
                $("#ctr_dom").html(res.clts_domicilio);
                $("#ctr_colnia").html(res.clts_col);
                $("#ctr_cp").html(res.clts_curp);
                $("#ctr_tel").html(res.clts_telefono);
                $("#status_cuenta").html(res.ctr_status_cuenta);
                $("#ctr_not").html(res.ctr_nota);
                $("#ctr_not").val(res.ctr_nota);
                var buttons = "";
                if (res.ctr_status_pendiente == '0') {
                    buttons = `<button type="button" class="btn btn-primary cambiarPendiente" ctr_id="${res.ctr_id}">Mandar a pendiente</button>`;
                } else {
                    buttons = `<button type="button" class="btn btn-success cambiarPendienteRealizado" ctr_id="${res.ctr_id}">Pendiente realizado</button>`;
                }

                $("#buttons").html(buttons);


            }
        })


    })
    $("#buttons").on("click", "button.cambiarPendiente", function() {

        var datos = new FormData();

        var ctr_id = $(this).attr("ctr_id");
        var nota = $("#ctr_not").val();
        datos.append("ctr_id", ctr_id)
        datos.append("nota", nota)
        datos.append("cambiarPendiente", true)

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
                            title: "Muy bien",
                            text: "El contrato se cambio a pendientes correctamente!",
                            icon: "success",
                            buttons: "OK",
                            dangerMode: true,
                            closeOnClickOutside: false,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location.reload();
                            } else {
                                window.location.reload();
                            }
                        });
                }
            }
        })


    })
    $("#buttons").on("click", "button.cambiarPendienteRealizado", function() {

        var datos = new FormData();

        var ctr_id = $(this).attr("ctr_id");
        var nota = $("#ctr_not").val();
        datos.append("ctr_id", ctr_id)
        datos.append("nota", nota)
        datos.append("cambiarPendienteRealizado", true)

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
                            title: "Muy bien",
                            text: "El contrato se quito de la lista de pendientes correctamente!",
                            icon: "success",
                            buttons: "OK",
                            dangerMode: true,
                            closeOnClickOutside: false,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                window.location.reload();
                            } else {
                                window.location.reload();
                            }
                        });
                }
            }
        })


    })

    function listarContrato(ctr_folio = "",
        ctr_vendedor = "",
        ctr_fecha_inicio = "",
        ctr_fecha_fin = "",
        ctr_status_c = "") {

        var session_usr_rol = $("#session_usr_rol").val();
        $("#tbodyContratos").html("");
        var datos = new FormData();

        datos.append("ctr_folio", ctr_folio)
        datos.append("ctr_vendedor", ctr_vendedor)
        datos.append("ctr_fecha_inicio", ctr_fecha_inicio)
        datos.append("ctr_fecha_fin", ctr_fecha_fin)
        datos.append("ctr_status_c", ctr_status_c)

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
                var ctr_count = 0;


                res.forEach(ctr => {
                    ctr_count++;

                    var bg_color = "#FFF";


                    if (ctr.ctr_aprovado_ventas == 1) {
                        bg_color = "#46CD93";
                    }

                    var accesos = "";

                    if (session_usr_rol != 'Agente de llamadas') {

                        accesos = `<div class="btn-group">
                                <a href="${urlApp+'contratos/buscar/'+ctr.ctr_id}" target="_blacnk"   class="btn btn-warning text-center btn-sm">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="${urlApp+'app/report/contrato-ventas.php?ctr_id='+ctr.ctr_id}" target="_blacnk"  class="btn btn-secondary text-center btnImprimirContrato btn-sm" ctr_id="${ctr.ctr_id}" >
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                </a>
                                <button   class="btn btn-primary text-center btnAsignarRuta btn-sm" ctr_id="${ctr.ctr_id}" data-toggle="modal" data-target="#exampleModal" >
                                <i class="fa fa-map" aria-hidden="true"></i>
                                </button>
                                <button class="btn btn-danger btn-sm btnClientesMal" ctr_id="${ctr.ctr_id}" data-toggle="modal" data-target="#mdlClientesMal"><i class="fa fa-user-times" aria-hidden="true"></i></button>
                                <button class="btn btn-dark btn-sm btnProductos" ctr_id="${ctr.ctr_id}" data-toggle="modal" data-target="#modalProductos"><i class="fa fa-dropbox"></i></button>
                                <button class="btn btn-light btn-sm btnPendiente" ctr_id="${ctr.ctr_id}" data-toggle="modal" data-target="#mdlPendientes" title="Agregar a pendientes"><i class="fa fa-hourglass"></i></button>
                                <a href="${urlApp+'app/report/reporte-estado-cuenta.php?ec_ruta='+ctr.ctr_ruta+'&ec_cuenta='+ctr.ctr_numero_cuenta}" target="_blank"  class="btn btn-sm  btn-warning"><i class="fa fa-download" aria-hidden="true"></i></a>
                               </div>`;
                    } else {
                        accesos = `<div class="btn-group">
                                
                                <a href="${urlApp+'app/report/contrato-ventas.php?ctr_id='+ctr.ctr_id}" target="_blacnk"  class="btn btn-secondary text-center btnImprimirContrato btn-sm" ctr_id="${ctr.ctr_id}" >
                                    <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                </a>
                               
                                
                                <button class="btn btn-dark btn-sm btnProductos" ctr_id="${ctr.ctr_id}" data-toggle="modal" data-target="#modalProductos"><i class="fa fa-dropbox"></i></button>
                               
                                <a href="${urlApp+'app/report/reporte-estado-cuenta.php?ec_ruta='+ctr.ctr_ruta+'&ec_cuenta='+ctr.ctr_numero_cuenta}" target="_blank"  class="btn btn-sm  btn-warning"><i class="fa fa-download" aria-hidden="true"></i></a>
                               </div>`;
                    }

                    tbodyContratos +=
                        `
                        <tr class="text-center" style="background-color:${bg_color}">

                            <td>
                               ${accesos}
                            </td>
                            <td>${ctr.ctr_folio}</td>
                            <td>${ctr.ctr_numero_cuenta+""+ctr.ctr_ruta}</td>
                            <td>${ctr.ctr_numero_cuenta}</td>
                            <td>${ctr.ctr_ruta}</td>
                            <td>${ctr.ctr_cliente}</td>
                            <td>${ctr.clts_domicilio+" "+ctr.clts_col}</td>
                            <td>${ctr.ctr_elaboro}</td>
                            <td><strong>${ctr.ctr_status_cuenta}</strong></td>
                            <td>${ctr.ctr_fecha_contrato}</td>
                        
                        </tr>
                        
                        `;


                });

                //alert(ctr_folio);

                var urlExport = urlApp + 'export/contratos.php?ctr_folio=' + ctr_folio + '&ctr_vendedor=' + ctr_vendedor + '&ctr_fecha_inicio=' + ctr_fecha_inicio + '&ctr_fecha_fin=' + ctr_fecha_fin + '&ctr_status_cuenta=' + ctr_status_c

                $("#btnExportarContratos").attr("href", urlExport)
                $("#tbodyContratos").html(tbodyContratos);
                $("#ctr_count").html(ctr_count)
            }
        })


    }
</script>