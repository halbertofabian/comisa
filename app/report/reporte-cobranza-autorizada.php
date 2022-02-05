<?php

ob_start();
include_once '../../config.php';
if (isset($_GET['abs_save'])) {

    require_once DOCUMENT_ROOT . 'app/modulos/cobranza/cobranza.modelo.php';
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
    $pdf->AddPage('L');

    // set text shadow effect
    // $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

    // Declaración de variables

    $ruta = HTTP_HOST;
    $rutaImg = $ruta . 'app/assets/images/sistema/comisa/logo.jpg';


    $scl_nombre = $_SESSION['session_suc']['scl_nombre'];
    $scl_direccion = $_SESSION['session_suc']['scl_direccion'];


    $abonos = CobranzaModelo::mdlListarPagosAutorizadosByAbsSave($_GET['abs_save']);
    $nombre_ficha = CobranzaModelo::mdlListarFichasByGdsId($_GET['abs_save']);

    //
    // Set some content to print
    $header = <<<EOF
    <table>
        <thead>
            <tr>
                <td style="text-align: left;">
                    <img src="{$rutaImg}" width="100" />
                    
                    
                </td>
                <td style="text-align:center ;">
                        {$scl_nombre} <br>
                        {$scl_direccion}
                </td>
                <td style="text-align: center;">
                <p><strong> FICHA DE COBRANZA</strong> <br> {$nombre_ficha['gds_nombre']} </p> 
                </td>
            </tr>
            <tr>
                <td style="background-color:#24008D; width:100%; color:#fff;text-align: center;vertical-align:text-top; font-size:12px ">
                    
                        <strong>{$abonos[0]['usr_nombre']}</strong> RUTA: <strong>{$abonos[0]['usr_ruta']}</strong>
                  
                </td>
            </tr>
            
        </thead>
    </table>    
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $header, 0, 1, 0, true, '', true);

    $tablehead = <<<EOF

    <table  style="border: 1px solid #000">
    
        <thead>
            <tr>
            <th style="text-align: center; border: 1px solid #000" ># PAGO</th>
            <th style="text-align: center; border: 1px solid #000" >CLIENTE</th>
            <th style="text-align: center; border: 1px solid #000" >NUMERO DE CUENTA</th>
            <th style="text-align: center; border: 1px solid #000" >SALDO</th>
            <th style="text-align: center; border: 1px solid #000" >PAGO</th>
            <th style="text-align: center; border: 1px solid #000" >METODO DE PAGO</th>
            <th style="text-align: center; border: 1px solid #000" >REFERENCIA</th>
            <th style="text-align: center; border: 1px solid #000" >NOTA</th>
            <th style="text-align: center; border: 1px solid #000" >FECHA PAGO</th>
            <th style="text-align: center; border: 1px solid #000" >VERIFICACION</th>
            </tr>
        </thead>
    
    </table>

EOF;

$pdf->writeHTMLCell(0, 0, '', '', $tablehead, 0, 1, 0, true, '', true);

$total = 0;
$total_efectivo = 0;
$total_banco = 0;

foreach ($abonos as $key => $abs) {

    $total += $abs['abs_monto'];
    if($abs['abs_mp'] == "EFECTIVO"){
        $total_efectivo += $abs['abs_monto'];
    }else{
        $total_banco += $abs['abs_monto'];
    }

    # code...
$verificacion = $abs['abs_verificacion'] == 1 || $abs['abs_verificacion'] == "" ? '<img src="'.$ruta.'app/report/icon_report/v_1.png" width="20" />' : '<img src="'.$ruta.'app/report/icon_report/v_0.png" width="20" />';
$abs_monto = number_format($abs['abs_monto'],3);
$ctr_saldo_actual = number_format($abs['ctr_saldo_actual'],2);

$tablebody = <<<EOF

<table>

    <thead>
        <tr>
        <th style="text-align: center;border: 1px solid #000" >{$abs['abs_id']}</th>
        <th style="text-align: center;border: 1px solid #000" >{$abs['ctr_cliente']}</th>
        <th style="text-align: center;border: 1px solid #000" ><strong>{$abs['ctr_numero_cuenta']}</strong></th>
        <th style="text-align: center;border: 1px solid #000" >{$ctr_saldo_actual}</th>
        <th style="text-align: center;border: 1px solid #000" ><strong>{$abs_monto}</strong></th>
        <th style="text-align: center;border: 1px solid #000" >{$abs['abs_mp']}</th>
        <th style="text-align: center;border: 1px solid #000" >{$abs['abs_referancia']}</th>
        <th style="text-align: center;border: 1px solid #000" >{$abs['abs_nota']}</th>
        <th style="text-align: center;border: 1px solid #000" >{$abs['abs_fecha_cobro']}</th>
        <th style="text-align: center;border: 1px solid #000" >{$verificacion}</th>
        </tr>
    </thead>

</table>

EOF;
$pdf->writeHTMLCell(0, 0, '', '', $tablebody, 0, 1, 0, true, '', true);

}

$total = number_format($total,2);
$total_efectivo = number_format($total_efectivo,2);
$total_banco = number_format($total_banco,2);

$pdf->writeHTMLCell(0, 0, '', '', '<hr>', 0, 1, 0, true, '', true);
$totales = <<<EOF

<table>

    <thead>
        <tr>
        <th style="text-align: center;" >TOTAL <br> <strong>{$total}</strong> </th>
        <th style="text-align: center;" >TOTAL EFECTIVO <br> <strong>{$total_efectivo}</strong> </th>
        <th style="text-align: center;" >TOTAL BANCO <br> <strong>{$total_banco}</strong> </th>
        </tr>
    </thead>

</table>

EOF;

$pdf->writeHTMLCell(0, 0, '', '', $totales, 0, 1, 0, true, '', true);

ob_end_clean();


   
    $pdf->Output('ficha.pdf', 'I');
}
