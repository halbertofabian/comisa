
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

    var total_efectivo_input = Number($("#copn_ingreso_efectivo").val())
    var total_efectivo_retiro = Number($("#copn_saldo").val())

    var usurio = $("#cja_responsable").html();

    var copn_saldo = total_efectivo_input - total_efectivo_retiro;



    swal({
        title: "¿Estás seguro de cerrar caja ahora?",
        text: "  EFECTIVO: " + copn_ingreso_efectivo + "\n BANCO: " + copn_ingreso_banco + "\n RETIRO DE CAJA: " + total_efectivo_retiro + "\n SALDO EN CAJA: " + copn_saldo,
        icon: "warning",
        buttons: ["No, cancelar", "Si, confirmar "],
        dangerMode: false,
        closeOnClickOutside: true,
    })
        .then((willDelete) => {
            if (willDelete) {

                swal("Guardar como...", {
                    content: {
                        element: "input",
                        attributes: {
                            type: "text",
                            value: "CAJA " + today + " U - " + usurio,
                        },
                    },
                })
                    .then((copn_registro) => {
                        if (copn_registro == "") {

                            toastr.error('Error', 'Guarda el corte con otro nombre...')

                        } else {

                            var datos = new FormData(this);

                            datos.append("btnCerrarCaja", true);
                            datos.append("copn_saldo", copn_saldo)
                            datos.append("copn_registro", copn_registro)





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
                                                    //location.href = res.pagina
                                                    window.open(res.pagina, "_blank")
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
                    });





            }
        })
})



$(".table_tabulador tbody").on("keyup", ".tabCalculo", function () {


    // 1000
    var sumaTab = 0;
    var d_1000 = Number($("#d_1000").val())
    var c_1000 = Number($("#c_1000").val())
    $("#t_1000").val(d_1000 * c_1000);
    sumaTab += d_1000 * c_1000;

    var d_500 = Number($("#d_500").val())
    var c_500 = Number($("#c_500").val())
    $("#t_500").val(d_500 * c_500);
    sumaTab += d_500 * c_500;

    var d_200 = Number($("#d_200").val())
    var c_200 = Number($("#c_200").val())
    $("#t_200").val(d_200 * c_200);
    sumaTab += d_200 * c_200;

    var d_100 = Number($("#d_100").val())
    var c_100 = Number($("#c_100").val())
    $("#t_100").val(d_100 * c_100);
    sumaTab += d_100 * c_100;

    var d_50 = Number($("#d_50").val())
    var c_50 = Number($("#c_50").val())
    $("#t_50").val(d_50 * c_50);
    sumaTab += d_50 * c_50;

    var d_20 = Number($("#d_20").val())
    var c_20 = Number($("#c_20").val())
    $("#t_20").val(d_20 * c_20);
    sumaTab += d_20 * c_20;

    var t_moneda = Number($("#t_moneda").val())

    sumaTab += t_moneda;
    $("#total_t").val(sumaTab)


})