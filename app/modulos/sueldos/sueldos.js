
/**
 *  Desarrollador: 
 *  Fecha de creación: 14/04/2021 17:08
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

$("#id__usr_sueldo").on("change", function () {

    idusr = $(this).val();
    var datos = new FormData();
    datos.append("btnConsultaInfSueldo", true);
    datos.append("id__usr_sueldo", idusr);

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/sueldos/sueldos.ajax.php',
        data: datos,
        dataType: "json",
        processData: false,
        contentType: false,

        success: function (respuesta) {
            if (respuesta) {

                sueldo = respuesta.usr_sueldo;
                deudaex = respuesta.usr_deuda_ext;
                deudaint = respuesta.usr_deuda_int;
                imss = respuesta.usr_imss;

                igs_deuda_int = respuesta.usr_deuda_int

                $("#igs_deuda_int").val(igs_deuda_int);

                $("#igs_sueldo_base").val(sueldo);
                $("#igs_imss").val(imss);

                $("#igs_deuda_ext").val(deudaex);
                $("#igs_pago").val(sueldo - imss - igs_deuda_int);

            } else {
            }
        }
    });
})
$("#igs_abono_deuda,#igs_imss,#igs_sueldo_base").on("keyup", function () {

    var igs_Apgar = $("#igs_sueldo_base").val()
    var igs_abono_deuda = $("#igs_abono_deuda").val()
    var igs_deuda_ext = $("#igs_deuda_ext").val();
    var igs_imss = $("#igs_imss").val();

    var igs_deuda_int = $("#igs_deuda_int").val();

    igs_nueva_deuda = igs_deuda_ext - igs_abono_deuda;
    $("#igs_nueva_deuda").val(igs_nueva_deuda);

    var igs_pago = igs_Apgar - igs_abono_deuda - igs_imss - igs_deuda_int;
    $("#igs_pago").val(igs_pago);

    //var igs_nueva_deuda = $("#igs_nueva_deuda").val();

})

$("#formsueldo").on("submit", function (e) {
    e.preventDefault();
    var datos = new FormData(this);
    datos.append("btnCalcularSueldo", true)
    if ($("#id__usr_sueldo").val() == "") {
        toastr.warning("Por favor, seleccione un usuario", "ADVERTENCIA")
        return;
    }

    swal({
        title: "Verifique si los datos de la operacion son correctos",
        text: "PAGO: " + $("#igs_pago").val() + " \n DEUDA EXTERNA: " + $("#igs_deuda_ext").val() + " \n DEUDA INTERNA: " + $("#igs_deuda_int").val() + " \n ABONO DEUDA EXTERNA: " + $("#igs_abono_deuda").val() + " \n NUEVA DEUDA: " + Number($("#igs_nueva_deuda").val()),
        icon: "warning",
        buttons: ["No, cancelar", "Si, continuar"],
        dangerMode: false,
        closeOnClickOutside: false,
    })
        .then((willDelete) => {
            if (willDelete) {

                $.ajax({

                    url: urlApp + 'app/modulos/sueldos/sueldos.ajax.php',
                    method: "POST",
                    data: datos,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: "json",
                    beforeSend: function () {

                        startLoadButton()

                    },
                    success: function (res) {

                        if (res.status) {
                            toastr.success(res.mensaje, "¡Muy bien!")
                            stopLoadButton('Rediriendo a mi caja....')
                            $("#btnCalcularComisiones").attr("disabled", true)

                            setTimeout(function () {
                                location.href = res.pagina
                            }, 1000);
                        } else {
                            stopLoadButton("Intentar de nuevo")
                            toastr.error(res.mensaje, "¡Error!")
                            setTimeout(function () {
                                location.href = res.pagina
                            }, 3000);
                        }
                    }
                })
            }
        })




})

$("#btnMostrarDeuda").on("click", function () {

    pms_usuario = $("#absemp_id_usuario").val();
    pms_tipo = $("#absemp_tipo_prestamo").val();

    var errormsj = "";
    if (pms_usuario <= 0) {
        errormsj += "*Seleccione un usuario \n";
    }

    if (pms_tipo == "") {
        errormsj += "*Seleccione tipo de deuda \n";
    }


    if (errormsj != "") {
        toastr.warning(errormsj, 'Error de datos')
        return;

    }

    var datos = new FormData();
    datos.append("btnMostrarDeuda", true);
    datos.append("pms_usuario", pms_usuario);
    datos.append("pms_tipo", pms_tipo);

    $.ajax({
        url: urlApp + 'app/modulos/sueldos/sueldos.ajax.php',
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
            // console.log(respuesta)
            stopLoadButton()
            var tblinfPrestamos = ""
            deudaint = ""
            deudaext = ""

            infoPrestamo = respuesta.infoPrestamo;

            deudaint = respuesta.infoDeuda.usr_deuda_int
            deudaext = respuesta.infoDeuda.usr_deuda_ext

            infoPrestamo.forEach(info => {


                tblinfPrestamos +=
                    `
                        <tr>
                        <td>${info.pms_id}</td>
                        <td>${info.pms_cantidad}</td>
                        <td>${info.pms_fecha_registro}</td>
                        <td>${info.pms_usuario_registro}</td>   
                        </tr>
                    `;
            })
            $("#tblDatosprestamo").html(tblinfPrestamos)

            if (pms_tipo == "Interno") { $("#totaldeuda").val(deudaint); }
            if (pms_tipo == "Externo") { $("#totaldeuda").val(deudaext); }

        }
    });
});

$("#btnAbonoDeuda").on("click", function () {

    pms_usuario = $("#absemp_id_usuario").val();
    pms_tipo = $("#absemp_tipo_prestamo").val();
    absemp_abono = $("#absemp_abono").val();
    deudaact = $("#totaldeuda").val();


    var errormsj = "";
    if (pms_usuario <= 0) {
        errormsj += "*Seleccione un usuario \n";
    }

    if (pms_tipo == "") {
        errormsj += "*Seleccione tipo de deuda \n";
    }
    if (absemp_abono <= 0) {
        errormsj += "*El abono debe ser mayor a 0 \n";
    }
    if (deudaact < 0 || deudaact == "") {
        errormsj += "*Este usuario no tiene deuda \n";
    }

    if (errormsj != "") {
        toastr.warning(errormsj, 'Error de datos')
        return;

    }

    var datos = new FormData();
    datos.append("btnAbonoDeuda", true);
    datos.append("pms_usuario", pms_usuario);
    datos.append("pms_tipo", pms_tipo);
    datos.append("absemp_abono", absemp_abono);

    $.ajax({
        url: urlApp + 'app/modulos/sueldos/sueldos.ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        beforeSend: function () {

            startLoadButton()
        },
        success: function (res) {
            // console.log(respuesta)
            stopLoadButton()

            if (res.status) {
                swal({
                    title: "Muy bien",
                    text: res.mensaje,
                    icon: "success",
                    buttons: [false, "Continuar"],
                    dangerMode: true,
                    closeOnClickOutside: false,

                })
                    .then((willDelete) => {
                        if (willDelete) {
                            location.href = res.pagina
                        } else {
                            location.href = res.pagina
                        }
                    });
            } else {
                swal({
                    title: "Error",
                    text: res.mensaje,
                    icon: "error",
                    buttons: [false, "Continuar"],
                    dangerMode: true,
                    closeOnClickOutside: false,

                })
                    .then((willDelete) => {
                        if (willDelete) {
                            location.href = res.pagina
                        } else {
                            location.href = res.pagina
                        }
                    });

            }


        }
    });
});