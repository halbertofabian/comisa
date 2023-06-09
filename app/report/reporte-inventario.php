<?php

ob_start();
include_once '../../config.php';
if (isset($_GET['reporte'])) {

    require_once DOCUMENT_ROOT . 'app/modulos/usuarios/usuarios.modelo.php';
    require_once DOCUMENT_ROOT . 'app/modulos/sucursales/sucursales.modelo.php';
    require_once DOCUMENT_ROOT . 'app/modulos/almacenes/almacenes.modelo.php';
    require_once DOCUMENT_ROOT . 'app/modulos/proveedores/proveedores.modelo.php';
    require_once DOCUMENT_ROOT . 'app/modulos/productos/productos.modelo.php';
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
    $itr = AlmacenesModelo::mdlFichaActualInventario();
    $list_pvs = ProveedoresModelo::mdlMostrarProveedores();
    $colspan = count($list_pvs);
    $proveedores = "";
    $colores = array('#E5C0A1', '#E5DEA1', '#A1E5B0', '#A1DEE5','#A2A1E5'.'#F16E83');
    $array_colores = array();
    foreach ($list_pvs as $key => $pvs) {
        $color = sprintf('#%02x%02x%02x', mt_rand(128, 255), mt_rand(128, 255), mt_rand(128, 255));
        $proveedores .= "<th>$pvs[pvs_nombre]</th>";
        $aleatoreo = rand(0,5);
        array_push($array_colores,array(
            $pvs['pvs_clave'] => [$color])
        );
    }


    $scl_nombre = $_SESSION['session_suc']['scl_nombre'];
    $scl_direccion = $_SESSION['session_suc']['scl_direccion'];
    $usr_usuario = $_SESSION['session_usr']['usr_nombre'];
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
                FECHA:<strong> $fecha_hoy</strong><br><br>
                FICHA:<strong> $itr[itr_ficha]</strong> 

                </td>
            </tr>
            <tr>
                <td style="background-color:#24008D; width:100%; color:#fff;text-align: center;vertical-align:text-top; font-size:12px ">
                        INVENTARIO
                </td>
            </tr>
            
        </thead>
    </table>
   
    <table border="1" style="background-color: #f8f9fa;font-size: 10px;text-align:center">
    <thead>
        <tr style="background-color: #9AD1F7;">
            <th colspan="3"></th>
            <th colspan="$colspan">COMPRAS</th>
            <th></th>
            <th colspan="2">TRASLADOS</th>
            <th></th>
        </tr>
        <tr style="text-align: center; background-color: #9AD1F7;">
            <th>I. INICIAL</th>
            <th>ARTICULO</th>    
            <th>VENTAS</th>    
            $proveedores
            <th>DEVOLUCIONES</th>
            <th>(+)</th>
            <th>(-)</th>
            <th>I. FINAL</th>
        </tr> 
    </thead>
    
    </table>
    
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $header, 0, 1, 0, true, '', true);


    $inventario = AlmacenesModelo::mdlMostrarInventario();
    $campos = "";

    foreach ($inventario as $key => $itr) {
        $pvs = ProductosModelo::mdlMostrarModelosById($itr['itr_id_modelo']);
        $campos = ""; // Inicializar la variable para almacenar los campos en cada iteración

        // Generar los campos correspondientes a cada proveedor


        
       

        foreach ($list_pvs as $key => $pvs) {
            $campo = AlmacenesModelo::mdlMostrarInventarioByProveedor($pvs['pvs_clave'], $itr['itr_id_modelo']);
            $campos .= '<td style="background-color: '.$array_colores[$key][$pvs['pvs_clave']][0].'">'.$campo['clave'].'</td>';
        }
        # code...
        $tps_body = <<<EOF

<table border="1" style="padding-top:10px; padding-bottom:2px;">
    <thead>
        <tr style="text-align: center; ">
            <td><strong>$itr[itr_ii]</strong></td>
            <td>$itr[mpds_descripcion]</td>
            <td>$itr[itr_ventas]</td>
            $campos
            <td>$itr[itr_devoluciones]</td>
            <td>$itr[itr_traslado_1]</td>
            <td>$itr[itr_traslado_2]</td>
            <td style="background-color: #EAD971;">$itr[itr_if]</td>
        </tr>
    </thead>
</table>
    

EOF;


        $pdf->writeHTMLCell(0, 0, '', '', $tps_body, 0, 1, 0, true, '', true);
        //********* */

    }

    //--------------------------

    $firma = <<<EOF
    
    <table style="padding-top:30px; ">
        <thead>
        <tr>
        <td style="text-align: center; width:33%;">
        </td>
        <td style="text-align: center; width:33%;">
            <p style="border-top: 1px solid #000;"><strong>FIRMA</strong></p><br>
            
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

    $registro = str_replace(".", "", "reporte");
    $pdf->Output($registro . '.pdf', 'I');
}
