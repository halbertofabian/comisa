

/**
 *  Desarrollador: 
 *  Fecha de creación: 12/05/2021 09:28
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

$("#cts_buscar_cliente").on("change", function () {
    var clts_id = $(this).val();
    $(".content-cliente").removeClass('d-none');

    buscarInfoCliente(clts_id);
})

$("#btn_infPersonal").on("click", function () {
    if ($("#dts-client").hasClass("d-none")) {
        $("#dts-client").removeClass("d-none");
    } else {
        $("#dts-client").addClass("d-none");
    }
})

$("#btn_infconyug").on("click", function () {
    if ($("#dts-conyug").hasClass("d-none")) {
        $("#dts-conyug").removeClass("d-none");
    } else {
        $("#dts-conyug").addClass("d-none");
    }

})
function buscarInfoCliente(clts_id) {
    var datos = new FormData();

    datos.append("clts_id", clts_id);
    datos.append("btnMostrarInfCltId", true);
    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
            //startLoadButton()
        },
        success: function (res) {
            separador = "-"
            // stopLoadButton('VER')
            $("#cts_ruta").html(res.cts_ruta)
            $("#clts_nombre").val(res.clts_nombre)
            $("#clts_telefono").val(res.clts_telefono)
            $("#clts_domicilio").val(res.clts_domicilio)
            $("#clts_col").val(res.clts_col)
            $("#clts_entre_calles").val(res.clts_entre_calles)
            $("#clts_fachada_color").val(res.clts_fachada_color)
            $("#clts_puerta_color").val(res.clts_puerta_color)
            $("#clts_cred_elector_n").val(res.clts_cred_elector_n)

            $("#clts_trabajo").val(res.clts_trabajo)
            $("#clts_puesto").val(res.clts_puesto)
            $("#clts_direccion_tbj").val(res.clts_direccion_tbj)
            $("#clts_col_tbj").val(res.clts_col_tbj)
            $("#clts_tel_tbj").val(res.clts_tel_tbj)
            textseparado = res.clts_antiguedad_tbj.split(separador)
            $("#clts_antiguedad_trabajo").val(textseparado[0])
            $("#clts_antiguedad_trabajo_1").val(textseparado[1])
            $("#clts_igs_mensual_tbj").val(res.clts_igs_mensual_tbj)

            $("#clts_tipo_vivienda").val(res.clts_tipo_vivienda)
            textseparado2 = res.clts_antiguedad_viviendo.split(separador)

            $("#clts_tiempo_casa").val(textseparado2[0])//
            $("#clts_tiempo_casa_1").val(textseparado2[1])
            $("#clts_vivienda_anomde").val(res.clts_vivienda_anomde)
            $("#clts_nreg_propiedad").val(res.clts_nreg_propiedad)

            $("#clts_nom_conyuge").val(res.clts_nom_conyuge)
            $("#clts_tbj_conyuge").val(res.clts_tbj_conyuge)
            $("#clts_tbj_puesto_conyuge").val(res.clts_tbj_puesto_conyuge)
            $("#clts_tbj_dir_conyuge").val(res.clts_tbj_dir_conyuge)
            $("#clts_tbj_col_conyuge").val(res.clts_tbj_col_conyuge)
            $("#clts_tbj_tel_conyuge").val(res.clts_tbj_tel_conyuge)
            textseparado3 = res.clts_tbj_ant_conyuge.split(separador)
            $("#clts_anttrabajo_conyuge").val(textseparado3[0])//
            $("#clts_tiempo_trabajo_conyuge").val(textseparado3[1])

            $("#clts_nom_fiador").val(res.clts_nom_fiador)
            $("#clts_parentesco_fiador").val(res.clts_parentesco_fiador)
            $("#clts_tel_fiador").val(res.clts_tel_fiador)
            $("#clts_dir_fiador").val(res.clts_dir_fiador)
            $("#clts_col_fiador").val(res.clts_col_fiador)
            $("#clts_tbj_fiador").val(res.clts_tbj_fiador)
            $("#clts_tbj_dir_fiador").val(res.clts_tbj_dir_fiador)
            $("#clts_tbj_tel_fiador").val(res.clts_tbj_tel_fiador)
            $("#clts_tbj_col_fiador").val(res.clts_tbj_col_fiador)
            $("#clts_fc_elector_fiador").val(res.clts_fc_elector_fiador)
            textseparado4 = res.clts_tbj_ant_fiador.split(separador)
            $("#clts_anttrabajo_fiador").val(textseparado4[0])//
            $("#clts_tiempo_trabajo_fiador").val(textseparado4[1])

            $("#clts_nom_ref1").val(res.clts_nom_ref1)
            $("#clts_parentesco_ref1").val(res.clts_parentesco_ref1)
            $("#clts_dir_ref1").val(res.clts_dir_ref1)
            $("#clts_col_ref1").val(res.clts_col_ref1)
            $("#clts_tel_ref1").val(res.clts_tel_ref1)
            $("#clts_nom_ref2").val(res.clts_nom_ref2)
            $("#clts_parentesco_ref2").val(res.clts_parentesco_ref2)
            $("#clts_dir_ref2").val(res.clts_dir_ref2)
            $("#clts_col_ref2").val(res.clts_col_ref2)
            $("#clts_tel_ref2").val(res.clts_tel_ref2)

        }
    })
}


$("#form_new_contrato").on("submit", function (e) {
    e.preventDefault();

    var datos = new FormData(this);
    datos.append("btnNewContratoAdd", true);
    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
            startLoadButton()
        },
        success: function (res) {
            stopLoadButton()
            if (res.status) {

                swal({
                    title: "Muy bien!, Se creo el contrato",
                    text: "ESTADO DE LAS FOTOS: \n"+"Cliente con producto: " + res.msg1 + "\n Pagare: " + res.msg2 + "\n Facha de casa: "+res.msg3 + "\n",
                    icon: "success",
                    buttons: [false, "OK"],
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            location.href = res.pagina
                        } else {
                            location.href = res.pagina
                        }
                    })

            } else {

                swal({
                    title: "Error",
                    text: res.mensaje,
                    icon: "error",
                    buttons: [false, "Intentar de nuevo"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        location.href = res.pagina
                    } else {
                        location.href = res.pagina
                    }
                })

            }

        }
    })
})

$("#btn_Mostar_ctrs").on("click", function (e) {
    e.preventDefault();
    nom=$("#ctrs_cliente_aux").val();
    ctr=$("#ctrs_Naux").val();

    var datos = new FormData();
    datos.append("nombre",nom);
    datos.append("id_ctr",ctr);
    datos.append("btn_Mostar_ctrs", true);
    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
           // startLoadButton()
        },
        success: function (res) {
            if (res.status) {
                var tblDatos = ""
                res.ctrs.forEach(ctr => {
                    tblDatos +=
                        `
                        <tr>
                        <td><a href="${res.pagina}contratos/editar/${ctr.ctrs_id}">${ctr.ctrs_id}</a></td>
                        <td>${ctr.ctrs_cuenta}</td>  
                        <td>${ctr.clts_nombre}</td>  
                        <td>${ctr.ctrs_fecha_registro}</td>  
                        
                        </tr>
                    `;

                })

                $("#tbl_list_ctrs").html(tblDatos)
            }
        }
    })
})

$("#form-edita-contrato").on("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(this);
    datos.append("btnEditarctrs", true);
    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/contratos/contratos.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
            //startLoadButton()
        },
        success: function (res) {
            //stopLoadButton()
            if (res.status) {

                swal({
                    title: "Muy bien!, Se actualizaron datos del contrato",
                    text: "ESTADO DE LAS FOTOS: \n"+"Cliente con producto: " + res.msg1 + "\n Pagare: " + res.msg2 + "\n Facha de casa: "+res.msg3 + "\n",
                    icon: "success",
                    buttons: [false, "OK"],
                    dangerMode: true,
                })
                    .then((willDelete) => {
                        if (willDelete) {
                            location.href = res.pagina
                        } else {
                            location.href = res.pagina
                        }
                    })

            } else {

                swal({
                    title: "Error",
                    text: res.mensaje,
                    icon: "error",
                    buttons: [false, "Intentar de nuevo"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        location.href = res.pagina
                    } else {
                        location.href = res.pagina
                    }
                })

            }

        }
    })
})