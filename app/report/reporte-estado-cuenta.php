<?php

ob_start();
include_once '../../config.php';
if (isset($_GET['ec_ruta']) && isset($_GET['ec_cuenta'])) {

    require_once DOCUMENT_ROOT . 'app/modulos/cobranza/cobranza.modelo.php';
    require_once DOCUMENT_ROOT . 'app/lib/phpqrcode/qrlib.php';
    /**
     * Creates an example PDF TEST document using TCPDF
     * @package com.tecnick.tcpdf
     * @abstract TCPDF - Example: Default Header and Footer
     * @author Nicola Asuni
     * @since 2008-03-04
     */



    // Include the main TCPDF library (search for installation path).
    require_once('../lib/TCPDF/tcpdf.php');

    // create new PDF document
    $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

    // set document information
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('');
    $pdf->SetTitle('');
    $pdf->SetSubject('');
    $pdf->SetKeywords('');



    // set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    // set some language-dependent strings (optional)
    if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
        require_once(dirname(__FILE__) . '/lang/eng.php');
        $pdf->setLanguageArray($l);
    }

    // ---------------------------------------------------------

    // set default font subsetting mode
    $pdf->setFontSubsetting(true);

    // Set font
    // dejavusans is a UTF-8 Unicode font, if you only need to
    // print standard ASCII chars, you can use core fonts like
    // helvetica or times to reduce file size.
    $pdf->SetFont('dejavusans', '', 9, '', true);

    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    // Add a page
    // This method has several options, check the source code documentation for more information.
    $pdf->AddPage('P');

    // set text shadow effect
    // $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

    // Declaración de variables

    $ruta = HTTP_HOST;
    $rutaImg = $ruta . 'app/assets/images/sistema/comisa/logo.jpg';

    //
    $infoContrato = CobranzaModelo::mdlConsultarEstadoCuenta($_GET['ec_ruta'], $_GET['ec_cuenta']);
    $infoCra = CobranzaModelo::mdlConsultarEstadoCuenta2($infoContrato['ctr_id']);
    $infoAbonos = CobranzaModelo::mdlConsultarEstadoCuenta3($infoCra['cra_id'],'AUTORIZADO');



    $scl_nombre = $_SESSION['session_suc']['scl_nombre'];
    $scl_direccion = $_SESSION['session_suc']['scl_direccion'];
    $fecha = date("d-m-Y H:i:s");
    //preArray($listp);

    if ($infoContrato['ctr_forma_pago'] == "SEMANALES") {
        $ctr_saldo = $infoContrato['ctr_total'] - $infoContrato['ctr_enganche'] - $infoContrato['ctr_pago_adicional'];
        $semanas_credito = ceil($ctr_saldo / $infoContrato['ctr_pago_credito']);

        $fecha_hoy = date("Y-m-d");
        $fecha = date($infoContrato['ctr_proximo_pago']);

        $diasdif = abs((strtotime($fecha_hoy) - strtotime($fecha)) / 86400);
        $dias = round($diasdif);


        //semanas del primer dia de pago hasta la fecha
        $semanas = ceil($dias / 7);

        $adeudo = ($semanas * $infoContrato['ctr_pago_credito'] - $infoContrato['ctr_total_pagado']) + $infoContrato['ctr_pago_credito'];

        $adeudo_aux = $adeudo;
        if ($semanas <= $semanas_credito) {
            $ec_adeudo_corriente = $adeudo_aux;
        } else {
            $ec_adeudo_corriente = 0;
        }
        $semanas_atrasadas = ceil($adeudo_aux / $infoContrato['ctr_pago_credito']);
        $ec_total_pagado = $ctr_saldo - $infoContrato['ctr_saldo_actual'];
        $label = "Semanas atrasadas";
    }
    else if ($infoContrato['ctr_forma_pago'] == "CATORCENALES") {
        $ctr_saldo = $infoContrato['ctr_total'] - $infoContrato['ctr_enganche'] - $infoContrato['ctr_pago_adicional'];
        $semanas_credito = ceil($ctr_saldo / $infoContrato['ctr_pago_credito']);

        $fecha_hoy = date("Y-m-d");
        $fecha = date($infoContrato['ctr_proximo_pago']);

        $diasdif = abs((strtotime($fecha_hoy) - strtotime($fecha)) / 86400);
        $dias = round($diasdif);


        //semanas del primer dia de pago hasta la fecha
        $semanas = ceil($dias / 14);

        $adeudo = ($semanas * $infoContrato['ctr_pago_credito'] - $infoContrato['ctr_total_pagado']) + $infoContrato['ctr_pago_credito'];

        $adeudo_aux = $adeudo;
        if ($semanas <= $semanas_credito) {
            $ec_adeudo_corriente = $adeudo_aux;
        } else {
            $ec_adeudo_corriente = 0;
        }
        $semanas_atrasadas = ceil($adeudo_aux / $infoContrato['ctr_pago_credito']);
        $ec_total_pagado = $ctr_saldo - $infoContrato['ctr_saldo_actual'];
        $label = "Catorcenas atrasadas";
    }
    else if ($infoContrato['ctr_forma_pago'] == "QUINCENALES") {
        $ctr_saldo = $infoContrato['ctr_total'] - $infoContrato['ctr_enganche'] - $infoContrato['ctr_pago_adicional'];
        $semanas_credito = ceil($ctr_saldo / $infoContrato['ctr_pago_credito']);

        $fecha_hoy = date("Y-m-d");
        $fecha = date($infoContrato['ctr_proximo_pago']);

        $diasdif = abs((strtotime($fecha_hoy) - strtotime($fecha)) / 86400);
        $dias = round($diasdif);


        //semanas del primer dia de pago hasta la fecha
        $semanas = ceil($dias / 15);

        $adeudo = ($semanas * $infoContrato['ctr_pago_credito'] - $infoContrato['ctr_total_pagado']) + $infoContrato['ctr_pago_credito'];

        $adeudo_aux = $adeudo;
        if ($semanas <= $semanas_credito) {
            $ec_adeudo_corriente = $adeudo_aux;
        } else {
            $ec_adeudo_corriente = 0;
        }
        $semanas_atrasadas = ceil($adeudo_aux / $infoContrato['ctr_pago_credito']);
        $ec_total_pagado = $ctr_saldo - $infoContrato['ctr_saldo_actual'];
        $label = "Quincenas atrasadas";
    }
    else {
        $ctr_saldo = $infoContrato['ctr_total'] - $infoContrato['ctr_enganche'] - $infoContrato['ctr_pago_adicional'];
        $semanas_credito = ceil($ctr_saldo / $infoContrato['ctr_pago_credito']);

        $fecha_hoy = date("Y-m-d");
        $fecha = date($infoContrato['ctr_proximo_pago']);

        $diasdif = abs((strtotime($fecha_hoy) - strtotime($fecha)) / 86400);
        $dias = round($diasdif);


        //semanas del primer dia de pago hasta la fecha
        $semanas = ceil($dias / 30);

        $adeudo = ($semanas * $infoContrato['ctr_pago_credito'] - $infoContrato['ctr_total_pagado']) + $infoContrato['ctr_pago_credito'];

        $adeudo_aux = $adeudo;
        if ($semanas <= $semanas_credito) {
            $ec_adeudo_corriente = $adeudo_aux;
        } else {
            $ec_adeudo_corriente = 0;
        }
        $semanas_atrasadas = ceil($adeudo_aux / $infoContrato['ctr_pago_credito']);
        $ec_total_pagado = $ctr_saldo - $infoContrato['ctr_saldo_actual'];
        $label = "Meses atrasados";
    }



    $ec_total_pagado  = $ec_total_pagado + $infoContrato['ctr_enganche'] + $infoContrato['ctr_pago_adicional'];
    // Set some content to print
    $encabezado = <<<EOF
    <table>
        <thead>
            <tr style="width:100%;">
                <td style="text-align: left; width:150px;">
                    <img src="{$rutaImg}" width="100" />
                </td>
                <td style="text-align:center ;">
                        SUCURSAL: $scl_nombre <br>
                        DIRECCION: $scl_direccion <br>
                </td>
                <td style="text-align:center ;">
                    FECHA:<strong>$fecha</strong><br>
                    RUTA:<strong> $_GET[ec_ruta]</strong><br>
                    CUENTA:<strong> $_GET[ec_cuenta]</strong><br>
                    CLIENTE:<strong> $infoContrato[ctr_cliente]</strong><br>
                    FECHA INICIO:<strong> $infoContrato[ctr_proximo_pago]</strong><br>
                </td>
            </tr>
        </thead>
    </table>
EOF;
$pdf->writeHTMLCell(0, 0, '', '', $encabezado, 0, 1, 0, true, '', true);

$saldo = dnum($infoContrato['ctr_saldo_actual']);
// var saldo = Number($("#ec_saldo_actual").val());
// Print text using writeHTMLCell()
foreach ($infoAbonos as $abonos) {

    $aux_saldo = number_format($saldo,2);
    # code...
    $tps_body .= <<<EOF

   
<tr style="font-size:10px">
    <td style="border-top:1px solid #ccc" >$abonos[abs_fecha_cobro]</td>
    <td style="border-top:1px solid #ccc" >$abonos[abs_mp] <br> <strong>$abonos[abs_referancia]</strong></td>
    <td style="border-top:1px solid #ccc" >$abonos[abs_nota]</td>
    <td style="border-top:1px solid #ccc" >$abonos[abs_monto]</td>
    <td style="border-top:1px solid #ccc" >$aux_saldo</td>
</tr>



EOF;

$saldo = dnum($saldo) + dnum($abonos['abs_monto']);
// saldo = Number(saldo) + Number(element.abs_monto);

    // $pdf->writeHTMLCell(0, 0, '', '', $tps_body, 0, 1, 0, true, '', true);
}


$header = <<<EOF

<table style="width:100%; font-size: 12px;">
    <tr>
        <td style="width:70%;">
           <table cellpadding="2">
                <tr style="background-color: #24008D;color:#fff">
                    <th>FECHA</th>
                    <th>M.P</th>
                    <th>NOTA</th>
                    <th>PAGO</th>
                    <th>SALDO</th>
                </tr>
                $tps_body
           </table>
        </td>
        <td style="background-color: #e9ecef; width:30%;">
            <table>
                <tr>
                    <td><b>Vendedor:</b> $infoContrato[ctr_elaboro]</td>
                </tr>
                <tr>
                    <td><b>Precio:</b> $infoContrato[ctr_total]</td>
                </tr>
                <tr>
                    <td><b>Enganche:</b> $infoContrato[ctr_enganche]</td>
                </tr>
                <tr>
                    <td><b>Pago adicional:</b> $infoContrato[ctr_pago_adicional]</td>
                </tr>
                <tr>
                    <td><b>Pago:</b> $infoContrato[ctr_pago_credito]</td>
                </tr>
                <tr>
                    <td><b>Saldo:</b> $infoContrato[ctr_saldo]</td>
                </tr>
                <tr>
                    <td><b>Saldo base:</b> $infoContrato[ctr_saldo_base]</td>
                </tr>
                <tr>
                    <td><b>Saldo actual:</b> $infoContrato[ctr_saldo_actual]</td>
                </tr>
                <tr>
                    <td><b>Ultima fecha abono:</b> $infoContrato[ctr_ultima_fecha_abono]</td>
                </tr>
                <tr>
                    <td><b>Total pagado:</b> $ec_total_pagado</td>
                </tr>
                <tr>
                    <td><b>Adeudo corriente:</b> $ec_adeudo_corriente</td>
                </tr>
                <tr>
                    <td><b>$label:</b> $semanas_atrasadas</td>
                </tr>
            </table>
        </td>
    </tr>
</table>

EOF;
$pdf->writeHTMLCell(0, 0, '', '', $header, 0, 1, 0, true, '', true);


    
    //********* */

    // ---------------------------------------------------------

    $firma = <<<EOF
    
    <table style="padding-top:30px; width:100%;">
        <thead>
            <tr>
                <td style="text-align: center;width:33%;">
                    
                </td>
                <td style="text-align: center;width:33%;">
                    <p style="border-top: 1px solid #000;">FIRMA</p>
                </td>
                <td style="text-align: center;width:33%;">
                    
                </td>
            </tr>
        </thead>
    </table>
 
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $firma, 0, 1, 0, true, '', true);


    ob_end_clean();

    $registro = str_replace(".", "", "prueba");
    $pdf->Output($registro . '.pdf', 'I');
}
