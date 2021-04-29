<?php

ob_start();
include_once '../../config.php';
if (isset($_GET['tps_num'])) {

    require_once DOCUMENT_ROOT . 'app/modulos/cajas/cajas.modelo.php';
    require_once DOCUMENT_ROOT . 'app/modulos/sucursales/sucursales.modelo.php';
    require_once DOCUMENT_ROOT . 'app/modulos/traspasos/traspasos.modelo.php';
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
    $infoTps = TraspasosModelo::mdlConsultarTraspasoId($_GET['tps_num']);
    $listp = json_decode($infoTps["tps_lista_productos"], true);
    //preArray($listp);


    // Set some content to print
    $header = <<<EOF
    <table>
        <thead>
            <tr>
                <td style="text-align: left;">
                    <img src="{$rutaImg}" width="100" />
                    
                </td>
                <td style="text-align:center ;">
                        sucursal nombre <br>
                        sucursal direccion
                </td>
                <td style="text-align: center;">
                <p>TRASPASO: <strong>$infoTps[tps_num_traspaso]</strong></p><br> 
                FECHA:<strong>$infoTps[tps_fecha]</strong>
                </td>
            </tr>
            <tr>
                <td style="background-color:#24008D; width:100%; color:#fff;text-align: center;vertical-align:text-top; font-size:12px ">
                    
                        REPORTE DEL USUARIO: $infoTps[receptor]
                  
                </td>
            </tr>
            
        </thead>
    </table>
   
    <table style="background-color: #f8f9fa; padding-top:5px; padding-bottom:5px; font-weight:bold;">
    <thead>
        <tr  style="text-align: center;">
            <th>#SKU</th>
            <th>PRODUCTO</th>
            <th>CATEGORIA</th>
            <th>CANTIDAD</th>    
        </tr> 
    </thead>
    
    </table>
    
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $header, 0, 1, 0, true, '', true);

    foreach ($listp as $key => $infP) {
        $array = explode("/", $infP['nombre']);
        $namep = $array[0];

        # code...
        $tps_body = <<<EOF

<table style="background-color: #e9ecef; padding-top:10px; padding-bottom:2px;">
    <thead>
        <tr style="text-align: center; ">
            <td >$infP[id]</td>
            <td >$namep</td>
            <td >$infP[categoria]</td>
            <td >$infP[cantidad]</td>
        </tr>
        
    </thead>
    </table>
    

EOF;


        $pdf->writeHTMLCell(0, 0, '', '', $tps_body, 0, 1, 0, true, '', true);
        //********* */
        $header2 = <<<EOF
    
   
    <table  style="font-weight:bold; font-size: 0.95em">
    <thead>
        <tr  style="text-align: center;">
            <th>#</th>
            <th>S/E</th>
            <th>CONTADO</th>    
        </tr> 
    </thead>
    
    </table> 
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $header2, 0, 1, 0, true, '', true);

        //***** */

        for ($i = 1; $i <= $infP['cantidad']; $i++) {
        
        # code...
        $tps_body2 = <<<EOF
    
    <table  style="text-align: center;  padding-top:10px; padding-bottom:2px;">
        <thead>
            <tr style="text-align: center; padding-top:10px; padding-bottom:2px;">
                <td style="border: 1px solid #000">$i</td>
                
                <td style="border: 1px solid #000"></td>
                <td style="border: 1px solid #000"></td>
            </tr>
            
        </thead>
        </table>
        
    
    EOF;


        $pdf->writeHTMLCell(0, 0, '', '', $tps_body2, 0, 1, 0, true, '', true);
        }
    }


    // ---------------------------------------------------------

    
    ob_end_clean();

    $registro = str_replace(".", "", "prueba");
    $pdf->Output($registro . '.pdf', 'I');
}
