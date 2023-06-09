<?php

ob_start();
include_once '../../config.php';
if (isset($_GET['ams_id'])) {

    require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
    require_once DOCUMENT_ROOT . 'app/modulos/sucursales/sucursales.modelo.php';
    require_once DOCUMENT_ROOT . 'app/modulos/almacenes/almacenes.modelo.php';
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
    $fecha_hoy = date('d-m-Y H:i:s');
    $usuario = "";

    //
    $pds = AlmacenesModelo::mdlMostrarProductosByAlmacenID($_GET['ams_id']);
    $usr = AlmacenesModelo::mdlMostrarAlmacenesByID($_GET['ams_id']);
    if ($usr['usr_nombre']) {
        $usuario = $usr['usr_nombre'];
    } else {
        $usuario = AlmacenesModelo::mdlMostrarAlmacenByID($_GET['ams_id'])['ams_nombre'];
    }

    $scl_nombre = $_SESSION['session_suc']['scl_nombre'];
    $scl_direccion = $_SESSION['session_suc']['scl_direccion'];
    $usr_usuario = isset($_GET['usr_nombre']) ? urldecode($_GET['usr_nombre']) : $_SESSION['session_usr']['usr_nombre'];
    $sucursales = isset($_GET['sucursales']) ? json_decode(urldecode($_GET['sucursales']), true) : "";
    if (!empty($sucursales)) {
        $datos_sucursales = "SUCURSAL ORIGEN: <br> <strong>{$sucursales[0]}</strong><br>
        SUCURSAL DESTINO: <br> <strong>{$sucursales[1]}</strong>";
    } else {
        $datos_sucursales = ""; // Otra opción es establecer un valor predeterminado si no se proporciona el parámetro
    }
    
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
                        SUCURSAL: $scl_nombre <br>
                        DIRECCION: $scl_direccion <br>
                </td>
                <td style="text-align: center;">
                <br><br>
                TIPO:<strong> SALIDA</strong> <br>
                FECHA:<strong> $fecha_hoy</strong><br>
                $datos_sucursales
                </td>
            </tr>
            <tr>
                <td style="background-color:#24008D; width:100%; color:#fff;text-align: center;vertical-align:text-top; font-size:12px ">
                    
                        REPORTE DEL USUARIO: $usuario
                  
                </td>
            </tr>
            
        </thead>
    </table>
   
    <table style="background-color: #f8f9fa; padding-top:5px; padding-bottom:5px; font-weight:bold;text-align:center">
    <thead>
        <tr  style="text-align: center;">
            <th>PRODUCTO</th>
            <th>SERIE</th>    
        </tr> 
    </thead>
    
    </table>
    
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $header, 0, 1, 0, true, '', true);
    $sumatotalp = 0;
    foreach ($pds as $key => $pt) {
        $sumatotalp += 1;

        # code...
        $tps_body = <<<EOF

<table style="background-color: #e9ecef; padding-top:10px; padding-bottom:2px;">
    <thead>
        <tr style="text-align: center; ">
            <td>$pt[mpds_descripcion]-$pt[mpds_modelo]</td>
            <td>$pt[spds_serie_completa]</td>
        </tr>
        
    </thead>
    </table>
    

EOF;


        $pdf->writeHTMLCell(0, 0, '', '', $tps_body, 0, 1, 0, true, '', true);
        //********* */

    }

    //--------------------------
    $seccionTOTAL = <<<EOF

    <table  style="text-align: center; background-color: #e9ecef; padding-top:10px; padding-bottom:2px;">
        <thead>
            <tr>
            <td><strong> TOTAL DE ARTÍCULOS </strong> </td>
            <td><strong>$sumatotalp</strong></td>
            </tr>
        </thead>
    </table>
    
EOF;

    $pdf->writeHTMLCell(0, 0, '', '', $seccionTOTAL, 0, 1, 0, true, '', true);

    $firma = <<<EOF
    
    <table style="padding-top:30px; ">
        <thead>
        <tr>
        <td style="text-align: center; width:33%;">
           
            <p style="border-top: 1px solid #000;">ENTREGA</p><br>
            <strong>$usr_usuario</strong>
        
        </td>
        <td style="text-align: center; width:33%;">
           
            
        
        </td>
        <td style="text-align: center;width:33%;">
        <p style="border-top: 1px solid #000;">RECIBE</p>
        <br>
            <strong>$usuario</strong>
        
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
