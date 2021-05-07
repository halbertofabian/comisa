
/**
 *  Desarrollador: 
 *  Fecha de creación: 04/05/2021 11:16
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

$("#btn_crear_plantilla").on("click", function () {
    numsem = $('#pvts_num_semana').val();
    fechaini = $("#pvts_fecha_inicio").val();
    fechafin = $("#pvts_fecha_fin").val();

    var errormsj = "";

    if (numsem == "") {
        errormsj += "Seleccione una semana\n";
    }
    if (fechaini == "") {
        errormsj += "Seleccione una fecha de inicio\n";
    }
    if (fechafin == "") {
        errormsj += "Seleccione una fecha de fin \n";
    }

    if (errormsj != "") {
        toastr.warning(errormsj, 'Error de datos')
        return;

    }
    var datos = new FormData();
    datos.append("btn_crear_plantilla", true);
    datos.append("pvts_num_semana", numsem);
    datos.append("pvts_fecha_inicio", fechaini);
    datos.append("pvts_fecha_fin", fechafin);

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/ventas/ventas.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

            startLoadButton()

        },
        success: function (respuesta) {
            if (respuesta.status) {
                stopLoadButton()
                toastr.success(respuesta.mensaje, "¡Muy bien!")
                setTimeout(function () {
                    location.href = respuesta.pagina
                }, 1000);
            } else {
                toastr.error(respuesta.mensaje, "¡Error!")
                setTimeout(function () {
                    location.href = respuesta.pagina
                }, 2000);
            }
        }
    });
})

$(".table_cargarPlantilla tbody").on("keyup", ".inputdia", function () {
    var id = $(this).attr("id");

    separador = "_";
    idseparado = id.split(separador);
    usrid = idseparado[1];

    var sumaVts = 0;
    var vts_s = Number($("#vtss_" + usrid).val());
    var vts_d = Number($("#vtsd_" + usrid).val());
    var vts_l = Number($("#vtsl_" + usrid).val());
    var vts_m = Number($("#vtsm_" + usrid).val());
    var vts_mi = Number($("#vtsmi_" + usrid).val());
    var vts_j = Number($("#vtsj_" + usrid).val());
    var vts_v = Number($("#vtsv_" + usrid).val());
    sumaVts = vts_s + vts_d + vts_l + vts_m + vts_mi + vts_j + vts_v;
    $("#vtst_" + usrid).val(sumaVts);
    $("#vtstaux_" + usrid).val(usrid+"_"+sumaVts);


})

$("#pvts_num_semana").on("change", function () {

    idplantilla = $(this).val();
    var datos = new FormData();
    datos.append("select_plantilla", true);
    datos.append("dvts_id_plantilla", idplantilla);

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/ventas/ventas.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (respuesta) {
            tbinfNumVentas = "";
            if (respuesta.status) {
                respuesta.info.forEach(datos => {
                    tbinfNumVentas += `
                    <tr id="${datos['dvts_id_vendedor']}">
                    <td>
                    <input data-toggle="tooltip" data-placement="top" title="${datos['usr_nombre']}" type="text" class="form-control" value="${datos['usr_nombre']}" readonly>
                    <input type="hidden" name="vendedor[]"  value="${datos['dvts_id_vendedor']}">
                    </td>
                    <td><input type="text" name="sabado[]" id="vtss_${datos['dvts_id_vendedor']}" value="${datos['dvts_sabado']}" class="form-control inputdia "></td>
                    <td><input type="text" name="domingo[]" id="vtsd_${datos['dvts_id_vendedor']}" value="${datos['dvts_domingo']}" class="form-control inputdia" ></td>
                    <td><input type="text" name="lunes[]" id="vtsl_${datos['dvts_id_vendedor']}" value="${datos['dvts_lunes']}" class="form-control inputdia "></td>
                    <td><input type="text" name="martes[]" id="vtsm_${datos['dvts_id_vendedor']}" value="${datos['dvts_martes']}" class="form-control inputdia "></td>
                    <td><input type="text" name="miercoles[]" id="vtsmi_${datos['dvts_id_vendedor']}" value="${datos['dvts_miercoles']}" class="form-control inputdia "></td>
                    <td><input type="text" name="jueves[]" id="vtsj_${datos['dvts_id_vendedor']}" value="${datos['dvts_jueves']}" class="form-control inputdia "></td>
                    <td><input type="text" name="viernes[]" id="vtsv_${datos['dvts_id_vendedor']}" value="${datos['dvts_viernes']}" class="form-control inputdia "></td>
                    <td>
                    <input type="text" name="total[]" id="vtst_${datos['dvts_id_vendedor']}" value="${datos['dvts_total']}" class="form-control " readonly>
                    <input type="hidden" class="vtsTotal" id="vtstaux_${datos['dvts_id_vendedor']}" value="${datos['dvts_id_vendedor']}_${datos['dvts_total']}">
                    <input type="hidden" name="dvts_id[]"  value="${datos['dvts_id']}">
                    </td>
                    </tr>`;
                });


            } else {
                respuesta.info.forEach(datos => {
                    tbinfNumVentas += `
                    <tr id="${datos['usr_id']}">
                    <td>
                    <input data-toggle="tooltip" data-placement="top" title="${datos['usr_nombre']}" type="text" class="form-control" value="${datos['usr_nombre']}" readonly>
                    <input type="hidden" name="vendedor[]"  value="${datos['usr_id']}">
                    </td>
                    <td><input type="text" name="sabado[]" id="vtss_${datos['usr_id']}" class="form-control inputdia "></td>
                    <td><input type="text" name="domingo[]" id="vtsd_${datos['usr_id']}" class="form-control inputdia" ></td>
                    <td><input type="text" name="lunes[]" id="vtsl_${datos['usr_id']}" class="form-control inputdia "></td>
                    <td><input type="text" name="martes[]" id="vtsm_${datos['usr_id']}" class="form-control inputdia "></td>
                    <td><input type="text" name="miercoles[]" id="vtsmi_${datos['usr_id']}" class="form-control inputdia "></td>
                    <td><input type="text" name="jueves[]" id="vtsj_${datos['usr_id']}" class="form-control inputdia "></td>
                    <td><input type="text" name="viernes[]" id="vtsv_${datos['usr_id']}" class="form-control inputdia "></td>
                    <td>
                    <input type="text" name="total[]" id="vtst_${datos['usr_id']}" class="form-control " readonly>
                    <input type="hidden" class="vtsTotal" value="${datos['usr_id']}_">
                    <input type="hidden" name="dvts_id[]"  value="">
                    </td>
                    </tr>`;
                });
            }
            $("#inftblcargarPlantilla").html(tbinfNumVentas);
            $("#btn_cargar_plantilla").removeClass("d-none");
            $("#seccion_pgs_vts").removeClass("d-none");
        }
    });


})

$("#form_cargar_plantilla").on("submit", function (e) {
    e.preventDefault()
    var datos = new FormData(this)
    datos.append("btn_cargar_plantilla", true)
    $.ajax({
        url: urlApp + 'app/modulos/ventas/ventas.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {
            startLoadButton()
        },
        success: function (respuesta) {
            stopLoadButton()

            if (respuesta.status == "insertado") {
                toastr.success(respuesta.mensaje, "¡Muy bien!")

            }
            if (respuesta.status == "actualizado") {
                toastr.success(respuesta.mensaje, "¡Muy bien!")
            }

        }
    })


})

$("#btn_cal_pg").on("click", function () {
    var vtsmas = Number($("#vtsmas").val());
    var vtsmenos = Number($("#vtsmenos").val());
    var preciomas = Number($("#pvtsmas").val());
    var preciomenos = Number($("#pvtsmenos").val());
    var ek = $('.vtsTotal').map((_, el) => el.value).get()
    /*
$.each(ek, function() {
    alert('this is ' + this);
  });
  */

    ek.forEach(dts => {
        separador = "_";
        textseparado = dts.split(separador);
        usrid = textseparado[0];
        deudainterna=Number($("#dint_"+usrid).val());
        numvts= Number(textseparado[1]);
        //limpiar abono para evitar confusion
        $("#abn_"+usrid).val("");
        //
        if(numvts>=vtsmas){
            
            $("#apagar_"+usrid).val((numvts*preciomas)-deudainterna);
            $("#apagaraux_"+usrid).val((numvts*preciomas)-deudainterna);
        }if(numvts<vtsmenos){
            
            $("#apagar_"+usrid).val((numvts*preciomenos)-deudainterna);
            $("#apagaraux_"+usrid).val((numvts*preciomenos)-deudainterna);
        }
    });

})

$(".table_vts_pago tbody").on("keyup", ".inputAbono", function () {
    var id = $(this).attr("id");
    var apagar="";
    separador = "_";
    idseparado = id.split(separador);
    usrid = idseparado[1];
    var abono= Number($(this).val());
    var pago= Number($("#apagaraux_"+usrid).val());
    apagar=pago-abono;
    $("#apagar_"+usrid).val(apagar);
})