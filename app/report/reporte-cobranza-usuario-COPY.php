<?php

ob_start();
include_once '../../config.php';
if (isset($_GET['copn_id'])) {

    require_once DOCUMENT_ROOT . 'app/modulos/cajas/cajas.modelo.php';
    require_once DOCUMENT_ROOT . 'app/modulos/sucursales/sucursales.modelo.php';
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

    $caja = CajasModelo::mdlMostrarCajasCobranzaById($_GET['copn_id']);
    $cja_nombre = strtoupper($caja['cja_nombre']);
    $copn_fecha = fechaCastellano($caja['copn_fecha_cierre']);


    $scl_nombre = $_SESSION['session_suc']['scl_nombre'];
    $scl_direccion = $_SESSION['session_suc']['scl_direccion'];

    $inicio_caja = number_format($caja['copn_ingreso_inicio'], 2);


    $copn_saldo = number_format($caja['copn_saldo'], 2);

    $copn_retiro = $caja['copn_ingreso_efectivo'] - $caja['copn_saldo'];
    $copn_retiro = number_format($copn_retiro, 2);


    // INGRESOS DE COBRANZA EFECTIVO

    $igs_cobranza_efectivo = CajasModelo::mdlConsultarIngresosCajaEfectivo($caja['copn_id'], 'COBRANZA');
    $igs_reingreso_efectivo = CajasModelo::mdlConsultarIngresosCajaEfectivo($caja['copn_id'], 'REINGRESOS_COBRANZA');





    //
    // HEADER DE REPORTE 

    $PDF = <<<EOF
<table>
    <thead>
        <tr>
            <td style="text-align: left;">
                <img src="{$rutaImg}" width="100" />
                    
            </td>
            <td style="text-align:center ;">
                $scl_nombre <br>
                $scl_direccion
            </td>
                <td style="text-align: center;">
                <p>REGISTRO: <strong>$caja[copn_registro]</strong></p> <strong></strong>
            </td>
        </tr>
        <tr>
            <td style="background-color:#24008D; width:100%; color:#fff;text-align: center;vertical-align:text-top; font-size:12px ">
                REPORTE DE $cja_nombre
            </td>
        </tr>    
    </thead>
</table> 
EOF;

    // HEADER INGRESOS COBRANZA EFECTIVO
    $pdf->writeHTMLCell(0, 0, '', '', $PDF, 0, 1, 0, true, '', true);

    $PDF = <<<EOF
    <table style="border: 1px solid #000">
        <thead>
        <tr>
            <td style="text-align: center;">

                <p style="color:#280898" ><strong>INGRESOS $cja_nombre</strong></p>
            
            </td>
            <td style="text-align: center;">
                <p>TIPO DE PAGO: <strong>EFECTIVO</strong></p> <strong></strong>
            </td>
            <td style="text-align: center;">
                <p>FECHA: <strong>$copn_fecha</strong></p> <strong></strong>
            </td>
        </tr>
        </thead>
    </table>

    <table>
        <thead>
            <tr style="text-align: center;">
                <th style="border: 1px solid #000" ><strong>#MOVIMIENTO</strong></th>
                <th style="border: 1px solid #000" ><strong>CONCEPTO</strong></th>
                <th style="border: 1px solid #000" ><strong>MONTO</strong></th>
                <th style="border: 1px solid #000" ><strong>FECHA REGISTRO</strong></th>
                <th style="border: 1px solid #000" ><strong>USUARIO REGISTRO</strong></th>
                <th style="border: 1px solid #000" ><strong>COBRADOR</strong></th>
            </tr>
        </thead>
    </table>
   
EOF;

    // HEADER
    $pdf->writeHTMLCell(0, 0, '', '', $PDF, 0, 1, 0, true, '', true);


    $igs_efectivo = 0;
    foreach ($igs_cobranza_efectivo as $key => $igs) {
        # code...
        $monto = number_format($igs['igs_monto'], 2);
        $igs_efectivo += $igs['igs_monto'];
        $body = <<<EOF

    <table style="border: 1px solid #000">
        <thead>
            <tr style="text-align: center; border: 1px solid #000">
                <td style="border: 1px solid #000">$igs[igs_id]</td>
                <td style="border: 1px solid #000" >$igs[igs_concepto] - $igs[igs_tipo]</td>
                <td style="border: 1px solid #000" >$monto</td>
                <td style="border: 1px solid #000" >$igs[igs_fecha_registro]</td>
                <td style="border: 1px solid #000" >$igs[igs_usuario_registro]</td>
                <td style="border: 1px solid #000" >$igs[usr_nombre]</td>
            </tr>
            </thead>
        </table>
  
EOF;
        $pdf->writeHTMLCell(0, 0, '', '', $body, 0, 1, 0, true, '', true);
    }


    $igs_reingresos_efectivo = 0;
    foreach ($igs_reingreso_efectivo as $key => $igs) {
        # code...
        $monto = number_format($igs['igs_monto'], 2);
        $igs_reingresos_efectivo += $igs['igs_monto'];
        $body = <<<EOF

    <table style="border: 1px solid #000">
        <thead>
            <tr style="text-align: center; border: 1px solid #000">
                <td style="border: 1px solid #000">$igs[igs_id]</td>
                <td style="border: 1px solid #000" >$igs[igs_concepto] - $igs[igs_tipo]</td>
                <td style="border: 1px solid #000" >$monto</td>
                <td style="border: 1px solid #000" >$igs[igs_fecha_registro]</td>
                <td style="border: 1px solid #000" >$igs[igs_usuario_registro]</td>
                <td style="border: 1px solid #000" ></td>
            </tr>
            </thead>
        </table>
  
EOF;
        $pdf->writeHTMLCell(0, 0, '', '', $body, 0, 1, 0, true, '', true);
    }

    $igs_efectivo = $igs_efectivo + $igs_reingresos_efectivo;
    $igs_efectivo_2 = number_format($igs_efectivo, 2);
    $footer2 = <<<EOF
    
    <table style="border: 1px solid #000">
        <thead>
            <tr>
                <td style="text-align: center;">

                </td>
                    <td style="text-align: right;">
                    <p><strong>TOTAL: </strong></p>
                </td>
                    <td style="text-align: center;">
                    <p> <strong> $ $igs_efectivo_2</strong></p> <strong></strong>
                </td>
            </tr> 
        </thead>
    </table>
    
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $footer2, 0, 1, 0, true, '', true);


    //$pdf->writeHTMLCell(0, 0, '', '', $header, 0, 1, 0, true, '', true);

    // This method has several options, check the source code documentation for more information.

    ob_end_clean();

    $registro = str_replace(".", "", $caja['copn_registro']);
    $pdf->Output($registro . '.pdf', 'I');
}
