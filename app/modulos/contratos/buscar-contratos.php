<?php
cargarComponente('breadcrumb', '', 'Buscar contrato');
?>

<div class="card">

    <div class="card-body">

        <form id="formConsultaContratos" method="post">
            <div class="row">

                <div class="form-group col-md-4">
                    <label for="crt_filtro">Nº CONTRATO / Nº CAJA / Nº FOLIO </label>
                    <input type="text" name="crt_filtro" id="crt_filtro" class="form-control " placeholder="">

                </div>



            </div>
            <div class="row">
                <div class="form-group col-md-4 ">
                    <button type="submit" class="btn btn-primary float-right btn-load">BUSCAR</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="d-none div-load">
    <div class="d-flex justify-content-center">
        <div class="spinner-border" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>

<div class="row" id="row-contratos">

</div>





<script>
    $("#formConsultaContratos").on("submit", function(e) {

        e.preventDefault();

        var datos = new FormData(this);
        datos.append("btnBuscarContratos2", true);

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
                $(".div-load").removeClass('d-none')
            },
            success: function(res) {
                $(".div-load").addClass('d-none')

                stopLoadButton('Buscar');

                console.log(res);
                var contrato = "";
                res.forEach(cts => {
                    var estado_venta = "";
                    if (cts.clts_registro_venta == 0) {
                        estado_venta = `<a href="${urlApp+'contratos/cerrar-venta/'+cts.ctr_id}" class="btn btn-danger float-right mr-1" style="color:fff">CERRAR VENTA</a>`;
                    } else {
                        estado_venta = `<span class="badge badge-pill badge-success float-right ">REGISTRADO EN VENTAS</span>`;
                    }


                    contrato +=
                        `
                    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row row-encabezado">
                    <div class="col-md-3 btn-group">
                        <a href="${urlApp+'contratos/buscar/'+cts.ctr_id}"  class="btn btn-primary text-center">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <h6 class=" text-center">${cts.clts_folio_nuevo} <br> ${cts.ctr_folio}</h6>
                        </a>
                        <a href="${urlApp+'app/report/contrato-ventas.php?ctr_id='+cts.ctr_id}" target="_blacnk"  class="btn btn-secondary text-center btnImprimirContrato" ctr_id="${cts.ctr_id}" >
                            <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                            <h6 class=" text-center">
                                IMPRIMIR
                            </h6>
                        </a>
                    </div>
                    <div class="col-md-3">
                        <h6 class=" text-center">${cts.ctr_ruta}</h6>
                        <p class="card-text text-center">RUTA</p>
                    </div>
                    <div class="col-md-3">
                        <h6 class=" text-center">${cts.ctr_numero_cuenta}</h6>
                        <p class="card-text text-center">Nº CUENTA</p>
                    </div>
                    <div class="col-md-3">
                        <h6 class=" text-center">${cts.ctr_fecha_contrato}</h6>
                        <p class="card-text text-center">FECHA</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">NOMBRE DEL CLIENTE</label>
                            <input type="text" value="${cts.ctr_cliente}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">CURP</label>
                            <input type="text" value="${cts.clts_curp}" class="form-control phone_mx" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="">TELEFONO</label>
                            <input type="text" value="${cts.clts_telefono}" class="form-control phone_mx" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">DOMICILIO</label>
                            <input type="text" value="${cts.clts_domicilio}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">COL</label>
                            <input type="text" value="${cts.clts_col}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">ENTRE CALLES</label>
                            <input type="text" value="${cts.clts_entre_calles}" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-12 float-right">
                        <span class="badge badge-pill badge-primary">${cts.usr_nombre}</span>
                        <span class="badge badge-pill badge-dark">${cts.clts_caja}</span>
                        
                        ${estado_venta}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
                    
                    
                    
                    `;
                });

                $("#row-contratos").html(contrato);
            }
        })
    })

    $(".btnImprimirContrato").on("click", function(){
        alert("Hola mundo")
        var ctr_id = $(this).attr("ctr_id");
        window.open(urlApp+'app/report/contrato-ventas.php?ctr_id='+ctr_id, "_blank", "toolbar=no,scrollbars=yes,resizable=yes,top=200,left=200,width=1250,height=700");
    })

</script>