<div class="row">
    <div class="col-12 mb-3">
        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#mdlAddStatus">Agregar status</button>
    </div>
    <div class="col-xl-6 col-md-6 col-sm-12">
        <div class="card">
            <div class="card-header bg-success text-light">
                LISTA BLANCA
            </div>
            <div class="card-body" style=" overflow-y: auto; max-height: 500px;" id="listaBlanca">

            </div>
        </div>
    </div>
    <div class="col-xl-6 col-md-6 col-sm-12">
        <div class="card-header bg-danger text-light">
            LISTA NEGRA
        </div>
        <div class="card">
            <div class="card-body" style="overflow-y: auto; max-height: 500px;" id="listaNegra">

            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="mdlAddStatus" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Agregar status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="formAddStatusLista">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="gst_status">Nombre del status</label>
                                <input type="text" class="form-control text-uppercase" name="gst_status" id="" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="gst_lista">Lista</label>
                                <select class="form-control" name="gst_lista" id="">
                                    <option value="">-Seleccionar-</option>
                                    <option value="B">BLANCA</option>
                                    <option value="N">NEGRA</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        mostrarListaBlanca();
        mostrarListaNegra();
    })

    function mostrarListaBlanca() {
        var datos = new FormData()
        datos.append('btnMostrarLista', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res) {
                    var checked = "";
                    var listaBlanca = "";
                    res.forEach(gst => {
                        if (gst.gst_lista == "B") {
                            checked = "checked";
                        } else {
                            checked = "";
                        }
                        listaBlanca += `<div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input listaBlanca" ${checked} name="" id="ListaBlanca${gst.gst_id}" gst_id="${gst.gst_id}" value="${gst.gst_id}">
                            <label class="custom-control-label" for="ListaBlanca${gst.gst_id}">${gst.gst_status}</label>
                        </div>`;
                    });
                    $("#listaBlanca").html(listaBlanca);
                }
            }
        });
    }

    function mostrarListaNegra() {
        var datos = new FormData()
        datos.append('btnMostrarLista', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res) {
                    var checked = "";
                    var listaNegra = "";
                    res.forEach(gst => {
                        if (gst.gst_lista == "N") {
                            checked = "checked";
                        } else {
                            checked = "";
                        }
                        listaNegra += `<div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input listaNegra" ${checked} name="" id="ListaNegra${gst.gst_id}" gst_id="${gst.gst_id}" value="${gst.gst_id}">
                            <label class="custom-control-label" for="ListaNegra${gst.gst_id}">${gst.gst_status}</label>
                        </div>`;
                    });
                    $("#listaNegra").html(listaNegra);
                }
            }
        });
    }
    $(document).on('change', '.listaBlanca', function() {
        var gst_id = $(this).attr("gst_id");
        var gst_lista = "";
        if($("#ListaBlanca"+gst_id).is(':checked')) {  
            gst_lista = "B";
        }
        var datos = new FormData()
        datos.append('gst_id', gst_id);
        datos.append('gst_lista', gst_lista);
        datos.append('btnAgregarListaBlanca', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status) {
                    swal({
                        title: '¡Bien!',
                        text: res.mensaje,
                        type: 'success',
                        icon: 'success'
                    }).then(function() {
                        mostrarListaBlanca();
                        mostrarListaNegra();
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
        });
    });
    $(document).on('change', '.listaNegra', function() {
        var gst_id = $(this).attr("gst_id");
        var gst_lista = "";
        if($("#ListaNegra"+gst_id).is(':checked')) {  
            gst_lista = "N";
        }
        var datos = new FormData()
        datos.append('gst_id', gst_id);
        datos.append('gst_lista', gst_lista);
        datos.append('btnAgregarListaNegra', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
                if (res.status) {
                    swal({
                        title: '¡Bien!',
                        text: res.mensaje,
                        type: 'success',
                        icon: 'success'
                    }).then(function() {
                        mostrarListaBlanca();
                        mostrarListaNegra();
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
        });
    });

    $('#formAddStatusLista').on('submit', function(e) {
        e.preventDefault();
        var datos = new FormData(this)
        datos.append('btnAddStatusLista', true);
        $.ajax({
            type: 'POST',
            url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
            data: datos,
            dataType: 'json',
            processData: false,
            contentType: false,
            success: function(res) {
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
        });
    });
</script>