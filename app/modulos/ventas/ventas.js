
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
     numsem=$('#pvts_num_semana').val();
     fechaini=$("#pvts_fecha_inicio").val();
     fechafin=$("#pvts_fecha_fin").val();

     var errormsj = "";

    if (numsem =="") {
        errormsj += "Seleccione una semana\n";
    }
    if ( fechaini== "") {
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