
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 29/10/2020 19:53
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */

var focoInputSku = true;

$("body").on("load", function () {
    mueveReloj()
})
// $(document).on("click", function () {
//     if (focoInputSku)
//         $("#pds_sku").focus()
// })
mueveReloj()


var elem = document.documentElement;


/* View in fullscreen */
function openFullscreen() {
    $("#pds_sku").focus()

    if (elem.requestFullscreen) {
        elem.requestFullscreen();
    } else if (elem.webkitRequestFullscreen) { /* Safari */
        elem.webkitRequestFullscreen();
    } else if (elem.msRequestFullscreen) { /* IE11 */
        elem.msRequestFullscreen();
    }
    if (document.exitFullscreen) {
        document.exitFullscreen();
    } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
    } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
    }

    $(".btnFullSc").blur();
    $(".btnFullSc").attr("disabled", false);

}


function mueveReloj() {
    momentoActual = new Date()

    mes = momentoActual.getMonth() + 1
    ano = momentoActual.getFullYear()
    dia = momentoActual.getDate()

    dia = ("0" + dia).slice(-2);
    mes = ("0" + mes).slice(-2);


    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()

    hora = ("0" + hora).slice(-2);
    minuto = ("0" + minuto).slice(-2);
    segundo = ("0" + segundo).slice(-2);



    horaImprimible = dia + "/" + mes + "/" + ano + " " + hora + " : " + minuto + " : " + segundo

    $("#relojPOS").html(horaImprimible)
    // document.form_reloj.reloj.value = horaImprimible

    setTimeout("mueveReloj()", 1000)
}

$("#btnEmpezarVenta").on("click", function () {
    empezarVenta()
})

function empezarVenta() {
    var datos = new FormData();
    var vts_id_cliente = $("#vts_id_cliente").val()
    var vts_tipo_venta = $("#vts_tipo_venta").val()
    var vts_usuario_registro = $("#vts_usuario_registro").val()
    var vts_id_venta = "";

    datos.append("vts_id_cliente", vts_id_cliente)
    datos.append("vts_tipo_venta", vts_tipo_venta)
    datos.append("vts_usuario_registro", vts_usuario_registro)
    datos.append("vts_id_venta", vts_id_venta)
    datos.append("btnEmpezarVenta", true)


    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/pos/pos.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
            $("#btnEmpezarVenta").attr("disabled", true)
            $("#btnEmpezarVenta").html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Creando venta...`)
        },
        success: function (res) {
            if (res.status) {
                $("#btnEmpezarVenta").attr("disabled", false)
                $("#btnEmpezarVenta").html(`Empezar a marcar`)
                $("#btnEmpezarVenta").addClass("d-none")
                $("#contentPos").removeClass("d-none")
                $("#contentPos_venta").addClass(".d-none .d-sm-block")
                $("#contentPos").attr("disabled", false)
                $("#contentPos_venta").attr("disabled", true)
                $("#vts_id_venta").val(res.vts_id_venta)
                $("#pds_sku").focus()



            } else {
                toastr.error('Error', res.status)
            }
        }
    })
}

$(document).keyup(function (e) {
    var key = e.keyCode;
    if (key == 16) {
        alert("PAGAR")
    }
    if (key == 27) {
        alert("CANCELAR")
    }
    if (key == 112) {
        buscarProductos()
    }
    if (key == 113) {
        buscarProductos()
    }
    if (key == 32) {
        $(".btnFullSc").attr("disabled", false);

        if ($("#vts_id_venta").val() != "") {
            // alert("Venta en proceso...")
        } else {
            empezarVenta()
        }

    }

    if (key == 114) {
        openFullscreen()
    }


})

$("#FormScanpds").on("submit", function (e) {
    e.preventDefault();
    var pds_sku = $("#pds_sku").val()
    marcarProducto(pds_sku.trim(), 1)
})

function marcarProducto(pds_sku, dpds_cantidad) {
    var sonido = new Audio(urlApp + 'app/assets/audio/scanner-beep-checkout.mp3')

    var vts_tipo_venta = $("#vts_tipo_venta").val()
    var vts_id_venta = $("#vts_id_venta").val()

    var datos = new FormData()

    datos.append("vts_tipo_venta", vts_tipo_venta)
    datos.append("pds_sku", pds_sku)
    datos.append("vts_id_venta", vts_id_venta)
    datos.append("dpds_cantidad", dpds_cantidad)
    datos.append("btnMarcarProducto", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/pos/pos.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {

        },
        success: function (res) {

            console.log(res)

        }

    })

    //sonido.play()


}

$(".btnBuscarProducto").on("click", function () {
    buscarProductos()
})

function buscarProductos() {
    focoInputSku = false;
    $("#pds_sku").blur()
    $('#mdlBuscarProductos').modal('show')

    $(".dataTables_filter.form-control").focus()

}
