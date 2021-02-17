
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 10/01/2021 19:49
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */


$("#formCerrarCaja").on("submit", function (e) {

    e.preventDefault();

    var copn_ingreso_efectivo = Number($("#copn_ingreso_efectivo").val())
    var copn_ingreso_banco = Number($("#copn_ingreso_banco").val())

    swal({
        title: "¿Estás seguro de cerrar caja ahora?",
        text: "  EFECTIVO: " + copn_ingreso_efectivo + "\n BANCO: " + copn_ingreso_banco,
        icon: "warning",
        buttons: ["No, cancelar", "Si, cerrar caja "],
        dangerMode: false,
        closeOnClickOutside: false,
    })
        .then((willDelete) => {
            if (willDelete) {

                var datos = new FormData(this);

                datos.append("btnCerrarCaja", true);

                $.ajax({
                    type: "POST",
                    url: urlApp + 'app/modulos/cajas/cajas.ajax.php',
                    data: datos,
                    dataType: "json",
                    processData: false,
                    contentType: false,
                    beforeSend: function () {

                    },
                    success: function (res) {

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
                            toastr.error(res.mensaje, 'Error')
                        }

                    }
                })

            }
        })
})

