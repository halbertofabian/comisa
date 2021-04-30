
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 12/03/2021 10:42
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */



$(".buscarFichaByUsr").on("click", function () {

    var fch_usr = $("#fch_usr").val();
    var fch_fecha_inicio = $("#fch_fecha_inicio").val()
    var fch_fecha_fin = $("#fch_fecha_fin").val()

    var datos = new FormData();
    datos.append("fch_usr", fch_usr)
    datos.append("fch_fecha_inicio", fch_fecha_inicio)
    datos.append("fch_fecha_fin", fch_fecha_fin)
    datos.append("buscarFichaByUsr", true)

    $.ajax({
        type: "POST",
        url: urlApp + 'app/modulos/fichas/fichas.ajax.php',
        data: datos,
        cache: false,
        dataType: "json",
        processData: false,
        contentType: false,
        beforeSend: function () {
            startLoadButton()
        },
        success: function (res) {
            stopLoadButton('Buscar ficha');
            console.log(res)

            var cobranza = "";
            var fch_cobro = 0;
            res.forEach(fch => {

                fch_cobro += Number(fch.igs_monto);

                cobranza +=
                    `         
                        <tr>
                        <td>${fch.igs_id}</td>
                        <td>${fch.igs_concepto} ${fch.igs_tipo}</td>
                        <td>${fch.igs_monto}</td>
                        <td>${fch.igs_fecha_registro}</td>
                        <td>${fch.igs_usuario_registro}</td>
                        <td>${fch.igs_mp}</td>
                        </tr>
          
                        `;
            });

            $("#tbodyCobranza").html(cobranza);

            $("#fch_cobro").val(fch_cobro)

            calcularComision();




        }
    })
})

$("#fch_comision").on("keyup", function(){
    calcularComision()
})

$("#fch_porcentaje").on("keyup", function(){
    calcularComision()
})

$("#fch_descuento").on("keyup", function(){
    calcularComision()
})

function calcularComision() {
    // Calcular comision 

    var fch_cobro = Number($("#fch_cobro").val())
    var fch_porcentaje = Number($("#fch_porcentaje").val())


    var fch_comision = fch_cobro * fch_porcentaje / 100;

    $("#fch_comision").val(fch_comision)

    var fch_comision = Number($("#fch_comision").val())
    var fch_descuento = $("#fch_descuento").val()


    var fch_pagar = fch_comision - fch_descuento;


    $("#fch_pagar").val(fch_pagar)



}