
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 29/03/2021 10:08
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

$("#btnGuardarPrestamo").on("click", function () {
    var pms_usuario = $("#pms_usuario").val()
    var pms_cantidad = Number($("#pms_cantidad").val())
    var pms_tipo = $("input[type=radio][name=pms_tipo]:checked").val();


    alert(pms_tipo)



    var errormsj = "";

    if (pms_tipo == undefined) {
        errormsj += "Necesita seleccionar un tiopo de prestamo \n";
    }

    if (pms_usuario == "") {
        errormsj += "Necesita seleccionar un usuario \n";
    }
    if (pms_cantidad <= 0) {
        errormsj += "Necesita ingresar una cantidad mayor a 0 \n";
    }

    if (errormsj != "") {
        toastr.warning(errormsj, 'Error de datos')
        return;

    }

    swal({
        title: "¿Estás seguro de realizar este prestamo a " + $('select[name="pms_usuario"] option:selected').text() + " ?",
        text: "  CANTIDAD A PRESTAR: " + pms_cantidad,
        icon: "warning",
        buttons: ["No, cancelar", "Si, confirmar "],
        dangerMode: false,
        closeOnClickOutside: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                var datos = new FormData();

                datos.append("pms_usuario", pms_usuario)
                datos.append("pms_cantidad", pms_cantidad)
                datos.append("pms_tipo", pms_tipo)
                
                datos.append("btnGuardarPrestamos", true)

                $.ajax({

                    url: urlApp + 'app/modulos/prestamos/prestamos.ajax.php',
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
                            stopLoadButton("Guardar")
                            $("#pms_usuario").val("")
                            $("#pms_cantidad").val("")
                            toastr.success(res.mensaje, "¡Muy bien!")

                            var flujo_usr = $("#flujo_usr").val();
                            buscarFlujoCaja(flujo_usr)
                        } else {
                            stopLoadButton("Intentar de nuevo")
                            toastr.error(res.mensaje, "¡Error!")

                        }


                    }
                })
            }
        })




})