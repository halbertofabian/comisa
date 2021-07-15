<?php


if (isset($_GET['ctr_id'])) {

    ob_start();
    include_once '../../config.php';




    require_once DOCUMENT_ROOT . 'app/modulos/sucursales/sucursales.modelo.php';
    require_once DOCUMENT_ROOT . 'app/modulos/contratos/contratos.modelo.php';

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
    $pdf->SetFont('helvetica', '', 9, '', true);

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
    $scl_nombre = $_SESSION['session_suc']['scl_nombre'];
    $scl_direccion = $_SESSION['session_suc']['scl_direccion'];

    $ctr = ContratosModelo::mdlMostrarContratosById($_GET['ctr_id']);

    $ctr['ctr_fecha_contrato'] = fechaCastellano($ctr['ctr_fecha_contrato']);
    $ctr['ctr_proximo_pago'] = fechaCastellano($ctr['ctr_proximo_pago']);


    $encabezado = <<<EOF

<table>
    <thead>
        <tr>
            <td style="text-align:center; width:25%">
                <img src="{$rutaImg}" width="200" height="200" /> <br>
                R.F.C: FAAS750810MVV9
            </td>
            <td style="text-align:center ; width:55%">
                    MATRIZ: TUXTEPEC, OAX.<br>
                    CARR. FED. AL INGENIO LOTE 500 B COL. REACOMODO <br>
                    PLAYA DE MONO TELS.: 01 (287) 87 193 17 <BR>
                    SUCURSAL: ALMADA #210 ENTRE DIAS MIRON Y ALTAMIRANO <BR>
                    COL.: LOMAS DE JAZMIN, TIERRA BLANCA, VER.
                    <BR><BR>
                    HORARIOS DE OFICINA: De 8:00 am A 14:00 hrs. <br>
                    y de 16:00 hrs. a 18:00. Lunes a Viernes <br>
                    Sábado De 8:00 am a 14:00 hrs.
                    
                    
            </td>
            <td style="text-align: center; width:20%">
                <div style="width:100%;">
                    <div style="width:50%;text-align: center;border: 1px solid #002973;background-color:#E9ECEF;color:#002973;">
                        RUTA<br>  <span style="color:#000"> $ctr[ctr_ruta] </span>
                    </div>
                    <div style="width:50%;text-align: center;border: 1px solid #002973;background-color:#E9ECEF;color:#002973;">
                        Nº CUENTA <br>  <span style="color:#000"> $ctr[ctr_numero_cuenta] </span>
                    </div>
                    <div style="width:50%;text-align: center;border: 1px solid #002973;background-color:#E9ECEF;color:#002973;">
                        FECHA <br>  <span style="color:#000"> $ctr[ctr_fecha_contrato] </span>
                    </div>
                </div>  
            </td>
        </tr> 
    </thead>
</table>

EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $encabezado, 0, 1, 0, true, '', true);


    $header = <<<EOF
<table>
    <thead>
        <tr>
            <td  style="width:15%;vertical-align: middle;  border: 1px solid #002973;background-color:#E9ECEF;color:#002973;">
               Nº CONTRATO
            </td>
           
            <td style="text-align:center; width:15%;border: 1px solid #002973;">
                  <span style="color:#000"> $ctr[clts_folio_nuevo] </span>
            </td>
            <td style="text-align:left ; width:60%; font-size: 20px;color:#002973;font-style: italic;">
            
            <strong>CONTRATO DE COMPRAVENTA</strong>
           
            </td>
        </tr> 
    </thead>
</table>
EOF;
    $pdf->writeHTMLCell(0, 0, '', '', $header, 0, 1, 0, true, '', true);
    $datosCliente = <<<EOF
<table style="text-align:center;background-color:#E9ECEF;color:#002973;border: 1px solid #002973">
    <thead>
        <tr>
            <td>
                1.- DATOS DEL CLIENTE
            </td>
        </tr> 
    </thead>
</table>
<table style="text-align:left;color:#002973;border: 1px solid #002973">
    <thead>
        <tr>
            <td colspan="2"> 
               <strong>NOMBRE:</strong>  <span style="color:#000"> $ctr[ctr_cliente] </span>
            </td>
            <td>
            <strong>TELEFONO:</strong>  <span style="color:#000"> $ctr[clts_telefono] </span>
            </td>
        </tr> 

        <tr>
            <td>
            <strong>DOMICILIO: </strong>  <span style="color:#000"> $ctr[clts_domicilio] </span>
            </td>
            <td>
            <strong>COL.:</strong>  <span style="color:#000"> $ctr[clts_col] </span>
            </td>
            <td>
            <strong>ENTRE LAS CALLES:</strong>  <span style="color:#000"> $ctr[clts_entre_calles] </span>
            </td>
        </tr> 

        <tr>
            <td>
            <strong>TRABAJA EN: </strong>  <span style="color:#000"> $ctr[clts_trabajo] </span>
            </td>
            <td>
            <strong>ANTIGÜEDAD:</strong>  <span style="color:#000"> $ctr[clts_antiguedad_tbj] </span>
            </td>
            <td>
            <strong>PUESTO:</strong>  <span style="color:#000"> $ctr[clts_puesto] </span>
            </td>
        </tr> 

        <tr>
            <td>
            <strong>DIRECCION: </strong>  <span style="color:#000"> $ctr[clts_direccion_tbj] </span> 
            </td>
            <td>
            <strong>COL.:</strong>  <span style="color:#000"> $ctr[clts_col_tbj] </span>
            </td>
            <td>
            <strong>TEL.:</strong>  <span style="color:#000"> $ctr[clts_tel_tbj] </span>
            </td>
        </tr> 

        <tr>
            <td>
            <strong>INGRESO MENSUAL: </strong>  <span style="color:#000"> $ctr[clts_igs_mensual_tbj] </span>
            </td>
            <td>
            <strong>LA CASA ES:</strong>  <span style="color:#000"> $ctr[clts_tipo_vivienda] </span>
            </td>
            <td>
            <strong>TIEMPO VIVIENDO AQUI.:</strong>  <span style="color:#000"> $ctr[clts_antiguedad_viviendo] </span>
            </td>
        </tr> 
        <tr>
            <td>
            <strong>A NOMBRE DE: </strong>  <span style="color:#000"> $ctr[clts_vivienda_anomde] </span>
            </td>
            <td>
            <strong>CORDENADAS:</strong>  <span style="color:#000"> $ctr[clts_coordenadas] </span>
            </td>
            <td>
            <strong>CURP:</strong>  <span style="color:#000"> $ctr[clts_curp] </span>
            </td>
            
        </tr> 
    </thead>
</table>
EOF;
    $pdf->writeHTMLCell(0, 0, '', '', '<br>', 0, 1, 0, true, '', true);
    $pdf->writeHTMLCell(0, 0, '', '', $datosCliente, 0, 1, 0, true, '', true);

    $datosConyugue = <<<EOF
<table style="text-align:center;background-color:#E9ECEF;color:#002973;border: 1px solid #002973">
    <thead>
        <tr>
            <td>
                2.- DATOS DEL CONYUGUE
            </td>
        </tr> 
    </thead>
</table>
<table style="text-align:left;color:#002973;border: 1px solid #002973">
    <thead>
        <tr>
            <td>
               <strong>NOMBRE:</strong> <span style="color:#000"> $ctr[clts_nom_conyuge] </span>
            </td>
            <td>
            <strong>TRABAJA EN:</strong> <span style="color:#000"> $ctr[clts_tbj_conyuge] </span>
               
            </td>
            <td>
            <strong>PUESTO:</strong> <span style="color:#000"> $ctr[clts_tbj_puesto_conyuge] </span>
            </td>
        </tr> 

        <tr>
            <td>
            <strong>DIRECCION: </strong> <span style="color:#000"> $ctr[clts_tbj_dir_conyuge] </span>
            </td>
            <td>
            <strong>COL.:</strong> <span style="color:#000"> $ctr[clts_tbj_col_conyuge] </span>
            </td>
            <td>
            <strong>TEL.:</strong> <span style="color:#000"> $ctr[clts_tbj_tel_conyuge] </span>
            </td>
        </tr> 

        <tr>
            <td>
            <strong>TIEMPO TRABAJANDO ALLI: </strong> <span style="color:#000"> $ctr[clts_tbj_ant_conyuge] </span>
            </td>
            <td>
            <strong>INGRESOS DEL CONYUGUE:</strong> <span style="color:#000"> $ctr[clts_tbj_ing_conyuge] </span>
            </td>
        </tr> 
    </thead>
</table>
EOF;
    $pdf->writeHTMLCell(0, 0, '', '', '<BR>', 0, 1, 0, true, '', true);
    $pdf->writeHTMLCell(0, 0, '', '', $datosConyugue, 0, 1, 0, true, '', true);


    $datosFiador = <<<EOF
<table style="text-align:center;background-color:#E9ECEF;color:#002973;border: 1px solid #002973">
    <thead>
        <tr>
            <td>
                3.- DATOS DEL FIADOR
            </td>
        </tr> 
    </thead>
</table>
<table style="text-align:left;color:#002973;border: 1px solid #002973">
    <thead>
        <tr>
            <td>
               <strong>NOMBRE:</strong> <span style="color:#000"> $ctr[clts_nom_fiador] </span>
            </td>
            <td>
            <strong>PARENTESCO:</strong> <span style="color:#000"> $ctr[clts_parentesco_fiador] </span>
               
            </td>
            <td>
            <strong>TEL:</strong> <span style="color:#000"> $ctr[clts_tel_fiador] </span>
            </td>
        </tr> 

        <tr>
            <td>
            <strong>DIRECCION: </strong> <span style="color:#000"> $ctr[clts_dir_fiador] </span>
            </td>
            <td>
            <strong>COL.:</strong> <span style="color:#000"> $ctr[clts_col_fiador] </span>
            </td>
            <td>
            <strong>TRABAJA EN:</strong> <span style="color:#000"> $ctr[clts_tbj_fiador] </span>
            </td>
        </tr> 

        <tr>
            <td>
            <strong>DIRECCION: </strong> <span style="color:#000"> $ctr[clts_tbj_dir_fiador] </span>
            </td>
            <td>
            <strong>TEL.:</strong> <span style="color:#000"> $ctr[clts_tbj_tel_fiador] </span>
            </td>
            <td>
            <strong>COL.:</strong> <span style="color:#000"> $ctr[clts_tbj_col_fiador] </span>
            </td>
        </tr> 
        <tr>
            <td>
            <strong>ANTIGÚEDAD: </strong> <span style="color:#000"> $ctr[clts_tbj_ant_fiador] </span>
            </td>
            <td>
            
            </td>
            <td>
            
            </td>
        </tr> 
    </thead>
</table>
EOF;
    $pdf->writeHTMLCell(0, 0, '', '', '<BR>', 0, 1, 0, true, '', true);
    $pdf->writeHTMLCell(0, 0, '', '', $datosFiador, 0, 1, 0, true, '', true);

    $referancias = <<<EOF
<table style="text-align:center;background-color:#E9ECEF;color:#002973;border: 1px solid #002973">
    <thead>
        <tr>
            <td>
                4.- REFERENCIAS
            </td>
        </tr> 
    </thead>
</table>
<table style="text-align:left;color:#002973;border: 1px solid #002973">
    <thead>
        <tr>
            <td colspan="2">
               <strong>NOMBRE:</strong>  <span style="color:#000"> $ctr[ctr_nombre_ref_1] </span>
            </td>
            <td>
            <strong>PARENTESCO:</strong>  <span style="color:#000"> $ctr[ctr_parentesco_ref_1] </span>
            </td>
        </tr> 

        <tr>
            <td>
            <strong>DIRECCION: </strong>  <span style="color:#000"> $ctr[ctr_direccion_ref_1] </span>
            </td>
            <td>
            <strong>COL.:</strong>  <span style="color:#000"> $ctr[ctr_colonia_ref_1] </span>
            </td>
            <td>
            <strong>TEL.:</strong>  <span style="color:#000"> $ctr[ctr_telefono_ref_1] </span>
            </td>
        </tr> 

        <tr>
            <td colspan="2">
               <strong>NOMBRE:</strong> <span style="color:#000"> $ctr[clts_nom_ref2] </span>
            </td>
            <td>
            <strong>PARENTESCO:</strong> <span style="color:#000"> $ctr[clts_parentesco_ref2] </span>
            </td>
        </tr> 

        <tr>
            <td>
            <strong>DIRECCION: </strong> <span style="color:#000"> $ctr[clts_dir_ref2] </span>
            </td>
            <td>
            <strong>COL.:</strong> <span style="color:#000"> $ctr[clts_col_ref2] </span>
            </td>
            <td>
            <strong>TEL.:</strong> <span style="color:#000"> $ctr[clts_tel_ref2] </span>
            </td>
        </tr> 

        <tr>
            <td colspan="2">
               <strong>NOMBRE:</strong> <span style="color:#000"> $ctr[clts_nom_ref3] </span>
            </td>
            <td> 
               <strong>PARENTESCO:</strong> <span style="color:#000"> $ctr[clts_parentesco_ref3] </span>
            </td>
        </tr> 

        <tr>
            <td>
            <strong>DIRECCION: </strong>  <span style="color:#000"> $ctr[clts_dir_ref3] </span>
            </td>
            <td>
            <strong>COL.:</strong>  <span style="color:#000"> $ctr[clts_col_ref3] </span>
            </td>
            <td>
            <strong>TEL.:</strong> <span style="color:#000"> $ctr[clts_tel_ref3] </span>
            </td>
        </tr> 

    </thead>
</table>
EOF;
    $pdf->writeHTMLCell(0, 0, '', '', '<BR>', 0, 1, 0, true, '', true);
    $pdf->writeHTMLCell(0, 0, '', '', $referancias, 0, 1, 0, true, '', true);

    $plazo_crdito = <<<EOF
<table style="text-align:center;background-color:#E9ECEF;color:#002973;border: 1px solid #002973">
    <thead>
        <tr>
            <td>
                5.- LLENADO POR EL CLIENTE
            </td>
        </tr> 
    </thead>
</table>
<br><br>
<table style="">
    <thead>
        <tr>
            <td style="width:25%;text-align: center;vertical-align: middle; border: 1px solid #002973;background-color:#E9ECEF;color:#002973;">
                <strong>FORMA DE PAGO</strong>
            </td>
        
            <td style="text-align:center; width:25%;border: 1px solid #002973;">
                <span style="color:#000"> $ $ctr[ctr_pago_credito] $ctr[ctr_forma_pago] </span>
            </td>
            <td style="width:25%;text-align: center;vertical-align: middle; border: 1px solid #002973;background-color:#E9ECEF;color:#002973;">
                <strong>FECHA PROXIMO PAGO</strong>
            </td>
        
            <td style="text-align:center; width:25%;border: 1px solid #002973;">
                <span style="color:#000"> $ctr[ctr_proximo_pago] </span>
            </td>
        </tr> 
        
    </thead>
</table>
<br><br>
<table style="">
    <thead>
        <tr>
            <td style="width:25%;text-align: center;vertical-align: middle; border: 1px solid #002973;background-color:#E9ECEF;color:#002973;">
                <strong>DIA(S) DE PAGO</strong>
            </td>
        
            <td style="text-align:center; width:25%;border: 1px solid #002973;">
                <span style="color:#000"> $ctr[ctr_dia_pago] </span>   
            </td>
            <td style="width:25%;text-align: center;vertical-align: middle; border: 1px solid #002973;background-color:#E9ECEF;color:#002973;">
                <strong>PLAZO DE CREDITO</strong>
            </td>
        
            <td style="text-align:center; width:25%;border: 1px solid #002973;">
            <span style="color:#000"> $ctr[ctr_plazo_credito] </span>   
                
            </td>
        </tr> 
        
    </thead>
</table>
EOF;
    $pdf->writeHTMLCell(0, 0, '', '', '<BR>', 0, 1, 0, true, '', true);
    $pdf->writeHTMLCell(0, 0, '', '', $plazo_crdito, 0, 1, 0, true, '', true);
    $pdf->writeHTMLCell(0, 0, '', '', '<BR>', 0, 1, 0, true, '', true);

    $mercancia = <<<EOF
<table style="text-align:center;background-color:#E9ECEF;color:#002973;border: 1px solid #002973">
    <thead>
        <tr>
            <td>
                6.- MERCANCIA
            </td>
        </tr> 
    </thead>
</table>
<table style="text-align:center;color:#002973;border: 1px solid #002973">
    <thead>
        <tr>
            <th><strong>SKU</strong></th>
            <th><strong>DESCRIPCION</strong></th>
            <th><strong>CANTIDAD</strong></th>
        </tr> 
    </thead>
</table>

EOF;

    $pdf->writeHTMLCell(0, 0, '', '', $mercancia, 0, 1, 0, true, '', true);


    $productos = json_decode($ctr['ctr_productos'], true);

    foreach ($productos as $key => $pds) {
$mercancia_json = <<<EOF
        <table style="text-align:center;color:#002973;border: 1px solid #002973">
            <thead>
                <tr>
                    <td>$pds[sku]</td>
                    <td>$pds[nombreProducto]</td>
                    <td>$pds[cantidad]</td>
                </tr> 
            </thead>
        </table>
EOF;
        $pdf->writeHTMLCell(0, 0, '', '', $mercancia_json, 0, 1, 0, true, '', true);
    }

    $pdf->writeHTMLCell(0, 0, '', '', '<BR>', 0, 1, 0, true, '', true);

    $pagos_credito = <<<EOF
<table style="">
    <thead>
        <tr>
            <td style="width:50%;"></td>
            <td style="width:25%;text-align: right;vertical-align: middle; color:#002973;">
                <strong>TOTAL </strong>.
            </td>
            <td style="text-align:left; width:25%;border: 1px solid #002973;">
            <span style="color:#000">$ $ctr[ctr_total] </span> 
            </td>
        </tr> 

        <tr>
            <td style="width:50%;"></td>
            <td style="width:25%;text-align: right;vertical-align: middle;color:#002973;">
                <strong>ENGANCHE </strong>.
            </td>
            <td style="text-align:left; width:25%;border: 1px solid #002973;">
            <span style="color:#000">$ $ctr[ctr_enganche] </span> 
                
            </td>
        </tr> 

        <tr>
            <td style="width:50%;"></td>
            <td style="width:25%;text-align: right;vertical-align: middle; color:#002973;">
                <strong>PAGO ADICIONAL </strong>.
            </td>
            <td style="text-align:left; width:25%;border: 1px solid #002973;">
            <span style="color:#000">$ $ctr[ctr_pago_adicional] </span> 
                
            </td>
        </tr> 

        <tr>
            <td style="width:50%;"></td>
            <td style="width:25%;text-align: right;vertical-align: middle;color:#002973;">
                <strong>SALDO </strong>.
            </td>
            <td style="text-align:left; width:25%;border: 1px solid #002973;">
            <span style="color:#000">$ $ctr[ctr_saldo] </span> 
                
            </td>
        </tr> 
    </thead>
</table>
EOF;
    $pdf->writeHTMLCell(0, 0, '', '', $pagos_credito, 0, 1, 0, true, '', true);


    ob_end_clean();


    $pdf->Output('contrato' . '.pdf', 'I');
}
