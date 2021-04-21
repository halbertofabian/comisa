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

    $copn_tabulador = json_decode($caja['copn_tabulador'], true);

    



    $igs_c = CajasModelo::mdlConsultarIngresosCajaEfectivo($caja['copn_id'], 'COBRANZA');

    $igs_rc = CajasModelo::mdlConsultarReIngresosCajaCobranzaEfectivo($caja['copn_id'], 'REINGRESOS_COBRANZA');

    $igs_b = CajasModelo::mdlConsultarIngresosCajaCobranzaBanco($caja['copn_id']);

    $gts_c = CajasModelo::mdlConsultarGastosCajaEfectivo($caja['copn_id']);

    $gts_v = CajasModelo::mdlConsultarGastosVariosCajaEfectivo($caja['copn_id']);

    $gts_pres = CajasModelo::mdlConsultarGastosPrestamosCajaEfectivo($caja['copn_id']);


    // aqui 
    $igs_prestamoCP = CajasModelo::mdlConsultarPrestamoCPCajaCobranzaEfectivo($caja['copn_id']);



    $igs_abonos = CajasModelo::mdlConsultarIngresosCajaEfectivo($caja['copn_id'], 'ABONOS_COBRANZA');

    $igs_v_efectivo = CajasModelo::mdlConsultarIngresosCajaEfectivo($caja['copn_id'], 'CONTADO_VENTAS');

    $igs_vs_efectivo = CajasModelo::mdlConsultarIngresosCajaEfectivo($caja['copn_id'], 'S/E_VENTAS');


    $gts_ventas = CajasModelo::mdlConsultarGastosVentasCajaEfectivo($caja['copn_id']);

    $gts_com = CajasModelo::mdlConsultarGastosComisionesCajaEfectivo($caja['copn_id']);

    $gts_sue = CajasModelo::mdlConsultarGastosSueldosCajaEfectivo($caja['copn_id']);




    $cja_nombre = strtoupper($caja['cja_nombre']);
    $copn_fecha = fechaCastellano($caja['copn_fecha_cierre']);


    $scl_nombre = $_SESSION['session_suc']['scl_nombre'];
    $scl_direccion = $_SESSION['session_suc']['scl_direccion'];

    $inicio_caja = number_format($caja['copn_ingreso_inicio'], 2);


    $copn_saldo = number_format($caja['copn_saldo'], 2);

    $copn_retiro = $caja['copn_ingreso_efectivo'] - $caja['copn_saldo'];
    $copn_retiro = number_format($copn_retiro, 2);
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
   
    <table style="border: 1px solid #000">
        <thead>
        <tr>
        <td style="text-align: center;">
           
        <p><strong>INGRESOS (COBRANZA) $cja_nombre</strong></p>
        
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
    
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $header, 0, 1, 0, true, '', true);

    $ingresos_efectivo_header = <<<EOF
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
    $pdf->writeHTMLCell(0, 0, '', '', $ingresos_efectivo_header, 0, 1, 0, true, '', true);
    // ---------------------------------------------------------
    $igs_efectivo = 0;
    foreach ($igs_c as $key => $igs) {
        # code...
        $igs_monto = number_format($igs['igs_monto'], 2);
        $igs_efectivo += $igs['igs_monto'];
        $ingresos_efectivo_body = <<<EOF

    <table style="border: 1px solid #000">
        <thead>
            <tr style="text-align: center; border: 1px solid #000">
                <td style="border: 1px solid #000">$igs[igs_id]</td>
                <td style="border: 1px solid #000" >$igs[igs_concepto] - $igs[igs_tipo]</td>
                <td style="border: 1px solid #000" >$igs_monto</td>
                <td style="border: 1px solid #000" >$igs[igs_fecha_registro]</td>
                <td style="border: 1px solid #000" >$igs[igs_usuario_registro]</td>
                <td style="border: 1px solid #000" >$igs[usr_nombre]</td>
            </tr>
            </thead>
        </table>
  
EOF;
        $pdf->writeHTMLCell(0, 0, '', '', $ingresos_efectivo_body, 0, 1, 0, true, '', true);
    }

    $igs_efectivo_r = 0;
    foreach ($igs_rc as $key => $igs) {
        # code...
        $igs_monto = number_format($igs['igs_monto'], 2);
        $igs_efectivo_r += $igs['igs_monto'];
        $ingresos_efectivo_body_r = <<<EOF

    <table style="border: 1px solid #000">
        <thead>
            <tr style="text-align: center; border: 1px solid #000">
                <td style="border: 1px solid #000">$igs[igs_id]</td>
                <td style="border: 1px solid #000" >$igs[igs_concepto] - $igs[igs_tipo]</td>
                <td style="border: 1px solid #000" >$igs_monto</td>
                <td style="border: 1px solid #000" >$igs[igs_fecha_registro]</td>
                <td style="border: 1px solid #000" >$igs[igs_usuario_registro]</td>
                <td style="border: 1px solid #000" >$igs[usr_nombre]</td>
            </tr>
            </thead>
        </table>
  
EOF;
        $pdf->writeHTMLCell(0, 0, '', '', $ingresos_efectivo_body_r, 0, 1, 0, true, '', true);
    }

    $igs_efectivo2 = $igs_efectivo + $igs_efectivo_r;
    $igs_efectivo2 = number_format($igs_efectivo2, 2);
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
        <p> <strong> $ $igs_efectivo2</strong></p> <strong></strong>
        </td>
    </tr>
            
        </thead>
    </table>
    
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $footer2, 0, 1, 0, true, '', true);


    $header6 = <<<EOF
    
    <table style="border: 1px solid #000">
        <thead>
        <tr>
        <td style="text-align: center;">
           
        <p><strong>ABONOS $cja_nombre</strong></p>
        
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
    
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $header6, 0, 1, 0, true, '', true);


    $ingresos_abonos_header = <<<EOF
    <table style="border: 1px solid #000">
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
    $pdf->writeHTMLCell(0, 0, '', '', $ingresos_abonos_header, 0, 1, 0, true, '', true);


    $igs_ab = 0;
    foreach ($igs_abonos as $key => $igs) {
        # code...
        $igs_monto = number_format($igs['igs_monto'], 2);
        $igs_ab += $igs['igs_monto'];
        $ingresos_abonos_body = <<<EOF

    <table style="border: 1px solid #000">
        <thead>
            <tr style="text-align: center; border: 1px solid #000">
                <td style="border: 1px solid #000">$igs[igs_id]</td>
                <td style="border: 1px solid #000" >$igs[igs_concepto]</td>
                <td style="border: 1px solid #000" >$igs_monto</td>
                <td style="border: 1px solid #000" >$igs[igs_fecha_registro]</td>
                <td style="border: 1px solid #000" >$igs[igs_usuario_registro]</td>
                <td style="border: 1px solid #000" >$igs[usr_nombre]</td>
            </tr>
            </thead>
        </table>
        
  
EOF;
        $pdf->writeHTMLCell(0, 0, '', '', $ingresos_abonos_body, 0, 1, 0, true, '', true);
    }

    $igs_abonos2 = number_format($igs_ab, 2);
    $footer6 = <<<EOF
    
    <table style="border: 1px solid #000">
        <thead>
        <tr>
        <td style="text-align: center;">
           
       
        
        </td>
        <td style="text-align: right;">
        <p><strong>TOTAL: </strong></p>
        </td>
        <td style="text-align: center;">
        <p> <strong> $ $igs_abonos2</strong></p> <strong></strong>
        </td>
    </tr>
            
        </thead>
    </table>
    
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $footer6, 0, 1, 0, true, '', true);

    $header2 = <<<EOF
    
    <table style="border: 1px solid #000">
        <thead>
        <tr>
        <td style="text-align: center;">
           
        <p><strong>INGRESOS (COBRANZA) $cja_nombre</strong></p>
        
        </td>
        <td style="text-align: center;">
        <p>TIPO DE PAGO: <strong>BANCO</strong></p> <strong></strong>
        </td>
        <td style="text-align: center;">
        <p>FECHA: <strong>$copn_fecha</strong></p> <strong></strong>
        </td>
    </tr>
            
        </thead>
    </table>
    
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $header2, 0, 1, 0, true, '', true);


    $ingresos_banco_header = <<<EOF
    <table style="border: 1px solid #000">
        <thead>
            <tr style="text-align: center;">
                <th style="border: 1px solid #000"><strong>#MOVIMIENTO</strong></th>
                <th style="border: 1px solid #000"><strong>CONCEPTO</strong></th>
                <th style="border: 1px solid #000"><strong>MONTO</strong></th>
                <th style="border: 1px solid #000"><strong>FECHA REGISTRO</strong></th>
                <th style="border: 1px solid #000"><strong>USUARIO REGISTRO</strong></th>
                <th style="border: 1px solid #000"><strong>REFERENICA</strong></th>
                <th style="border: 1px solid #000"><strong>BANCO</strong></th>
                <th style="border: 1px solid #000"><strong>COBRADOR</strong></th>
            </tr>
        </thead>
        </table>
 
EOF;
    $pdf->writeHTMLCell(0, 0, '', '', $ingresos_banco_header, 0, 1, 0, true, '', true);


    $igs_banco = 0;
    foreach ($igs_b as $key => $igs) {
        # code...
        $igs_monto = number_format($igs['igs_monto'], 2);
        $igs_banco += $igs['igs_monto'];
        $banco = CajasModelo::mdlConsultarCuentas($igs['igs_cuenta']);
        $ingresos_banco_body = <<<EOF

    <table style="border: 1px solid #000">
        <thead>
            <tr style="text-align: center; border: 1px solid #000">
                <td style="border: 1px solid #000">$igs[igs_id]</td>
                <td style="border: 1px solid #000" >$igs[igs_concepto]</td>
                <td style="border: 1px solid #000" >$igs_monto</td>
                <td style="border: 1px solid #000" >$igs[igs_fecha_registro]</td>
                <td style="border: 1px solid #000" >$igs[igs_usuario_registro]</td>
                <td style="border: 1px solid #000" >$igs[igs_referencia]</td>
                <td style="border: 1px solid #000" >$banco[cbco_nombre]</td>
                <td style="border: 1px solid #000" >$igs[usr_nombre]</td>
            </tr>
            </thead>
        </table>
        
  
EOF;
        $pdf->writeHTMLCell(0, 0, '', '', $ingresos_banco_body, 0, 1, 0, true, '', true);
    }

    $igs_banco2 = number_format($igs_banco, 2);
    $footer3 = <<<EOF
    
    <table style="border: 1px solid #000">
        <thead>
        <tr>
        <td style="text-align: center;">
           
       
        
        </td>
        <td style="text-align: right;">
        <p><strong>TOTAL: </strong></p>
        </td>
        <td style="text-align: center;">
        <p> <strong> $ $igs_banco2</strong></p> <strong></strong>
        </td>
    </tr>
            
        </thead>
    </table>
    
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $footer3, 0, 1, 0, true, '', true);
    $header3 = <<<EOF
    
    <table style="border: 1px solid #000">
        <thead>
        <tr>
        <td style="text-align: center;">
           
        <p><strong> GASTOS (COBRADORES) $cja_nombre</strong></p>
        
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
    
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $header3, 0, 1, 0, true, '', true);
    $gastos_efectivo_header = <<<EOF
    <table style="border: 1px solid #000">
        <thead>
            <tr style="text-align: center;">
                <th style="border: 1px solid #000"><strong>#MOVIMIENTO</strong></th>
                <th style="border: 1px solid #000"><strong>CONCEPTO</strong></th>
                <th style="border: 1px solid #000"><strong>MONTO</strong></th>
                <th style="border: 1px solid #000"><strong>FECHA REGISTRO</strong></th>
                <th style="border: 1px solid #000"><strong>USUARIO REGISTRO</strong></th>
                <th style="border: 1px solid #000"><strong>COBRADOR</strong></th>
            </tr>
        </thead>
        </table>
 
EOF;
    $pdf->writeHTMLCell(0, 0, '', '', $gastos_efectivo_header, 0, 1, 0, true, '', true);
    $gts_efectivo = 0;
    foreach ($gts_c as $key => $gts) {
        # code...
        $tgts_cantidad = number_format($gts['tgts_cantidad'], 2);
        $gts_efectivo += $gts['tgts_cantidad'];
        $gastos_efectivo_body = <<<EOF

    <table style="border: 1px solid #000">
        <thead>
            <tr style="text-align: center; border: 1px solid #000">
                <td style="border: 1px solid #000">$gts[tgts_id]</td>
                <td style="border: 1px solid #000" >$gts[tgts_concepto] - $gts[gts_nombre]</td>
                <td style="border: 1px solid #000" >$tgts_cantidad</td>
                <td style="border: 1px solid #000" >$gts[tgts_fecha_gasto]</td>
                <td style="border: 1px solid #000" >$gts[tgts_usuario_registro]</td>
                <td style="border: 1px solid #000" >$gts[usr_nombre]</td>
            </tr>
            </thead>
        </table>
        
  
EOF;
        $pdf->writeHTMLCell(0, 0, '', '', $gastos_efectivo_body, 0, 1, 0, true, '', true);
    }
    $gts_efectivo2 = number_format($gts_efectivo, 2);
    $footer4 = <<<EOF
    
    <table style="border: 1px solid #000">
        <thead>
        <tr>
        <td style="text-align: center;">
           
       
        
        </td>
        <td style="text-align: right;">
        <p><strong>TOTAL: </strong></p>
        </td>
        <td style="text-align: center;">
        <p> <strong> $ $gts_efectivo2</strong></p> <strong></strong>
        </td>
    </tr>
            
        </thead>
    </table>
    
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $footer4, 0, 1, 0, true, '', true);


    $header5 = <<<EOF
    
    <table style="border: 1px solid #000">
        <thead>
        <tr>
        <td style="text-align: center;">
           
        <p><strong> GASTOS DE $cja_nombre</strong></p>
        
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
    
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $header5, 0, 1, 0, true, '', true);
    $gastos_efectivo_header = <<<EOF
    <table style="border: 1px solid #000">
        <thead>
            <tr style="text-align: center;">
                <th style="border: 1px solid #000"><strong>#MOVIMIENTO</strong></th>
                <th style="border: 1px solid #000"><strong>CONCEPTO</strong></th>
                <th style="border: 1px solid #000"><strong>MONTO</strong></th>
                <th style="border: 1px solid #000"><strong>FECHA REGISTRO</strong></th>
                <th style="border: 1px solid #000"><strong>USUARIO REGISTRO</strong></th>
            </tr>
        </thead>
        </table>
 
EOF;
    $pdf->writeHTMLCell(0, 0, '', '', $gastos_efectivo_header, 0, 1, 0, true, '', true);
    $gts_v_efectivo = 0;
    foreach ($gts_v as $key => $gts) {
        # code...
        $tgts_cantidad = number_format($gts['tgts_cantidad'], 2);
        $gts_v_efectivo += $gts['tgts_cantidad'];
        $gastos_efectivo_body = <<<EOF

    <table style="border: 1px solid #000">
        <thead>
            <tr style="text-align: center; border: 1px solid #000">
                <td style="border: 1px solid #000">$gts[tgts_id]</td>
                <td style="border: 1px solid #000" >$gts[tgts_concepto] - $gts[gts_nombre]</td>
                <td style="border: 1px solid #000" >$tgts_cantidad</td>
                <td style="border: 1px solid #000" >$gts[tgts_fecha_gasto]</td>
                <td style="border: 1px solid #000" >$gts[tgts_usuario_registro]</td>
            </tr>
            </thead>
        </table>
        
  
EOF;
        $pdf->writeHTMLCell(0, 0, '', '', $gastos_efectivo_body, 0, 1, 0, true, '', true);
    }
    $gts_v_efectivo2 = number_format($gts_v_efectivo, 2);
    $footer5 = <<<EOF
    
    <table style="border: 1px solid #000">
        <thead>
        <tr>
        <td style="text-align: center;">
           
       
        
        </td>
        <td style="text-align: right;">
        <p><strong>TOTAL: </strong></p>
        </td>
        <td style="text-align: center;">
        <p> <strong> $ $gts_v_efectivo2</strong></p> <strong></strong>
        </td>
    </tr>
            
        </thead>
    </table>
    
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $footer5, 0, 1, 0, true, '', true);

    // Aqui termina footer5

    $header9 = <<<EOF
    
<table style="border: 1px solid #000">
    <thead>
    <tr>
    <td style="text-align: center;">
       
    <p><strong> PRESTAMOS $cja_nombre</strong></p>
    
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

EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $header9, 0, 1, 0, true, '', true);


    $prestamos_header = <<<EOF
<table style="border: 1px solid #000">
    <thead>
        <tr style="text-align: center;">
        <th style="border: 1px solid #000" ><strong>#MOVIMIENTO</strong></th>
        <th style="border: 1px solid #000" ><strong>CONCEPTO</strong></th>
        <th style="border: 1px solid #000" ><strong>MONTO</strong></th>
        <th style="border: 1px solid #000" ><strong>FECHA REGISTRO</strong></th>
        <th style="border: 1px solid #000" ><strong>USUARIO REGISTRO</strong></th>
        </tr>
    </thead>
    </table>

EOF;
    $pdf->writeHTMLCell(0, 0, '', '', $prestamos_header, 0, 1, 0, true, '', true);


    $gts_prestamos = 0;
    foreach ($gts_pres as $key => $gts) {
        # code...
        $tgts_cantidad = number_format($gts['tgts_cantidad'], 2);
        $gts_prestamos += $gts['tgts_cantidad'];
        $prestamos_body = <<<EOF

<table style="border: 1px solid #000">
    <thead>
        <tr style="text-align: center; border: 1px solid #000">
            <td style="border: 1px solid #000">$gts[tgts_id]</td>
            <td style="border: 1px solid #000" >$gts[tgts_concepto]</td>
            <td style="border: 1px solid #000" >$tgts_cantidad</td>
            <td style="border: 1px solid #000" >$gts[tgts_fecha_gasto]</td>
            <td style="border: 1px solid #000" >$gts[tgts_usuario_registro]</td>
        </tr>
        </thead>
    </table>
    

EOF;
        $pdf->writeHTMLCell(0, 0, '', '', $prestamos_body, 0, 1, 0, true, '', true);
    }

    $gts_prestamos2 = number_format($gts_prestamos, 2);
    $footer9 = <<<EOF

<table style="border: 1px solid #000">
    <thead>
    <tr>
    <td style="text-align: center;">
       
   
    
    </td>
    <td style="text-align: right;">
    <p><strong>TOTAL: </strong></p>
    </td>
    <td style="text-align: center;">
    <p> <strong> $ $gts_prestamos2</strong></p> <strong></strong>
    </td>
</tr>
        
    </thead>
</table>

EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $footer9, 0, 1, 0, true, '', true);


    $PDF = <<<EOF
    <table style="border: 1px solid #000">
        <thead>
        <tr>
            <td style="text-align: center;">

                <p style="color:#280898" ><strong>VENTAS CONTADO $cja_nombre</strong></p>
            
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
                <th style="border: 1px solid #000" ><strong>VENDEDOR</strong></th>
            </tr>
        </thead>
    </table>
   
EOF;

    // HEADER
    //$pdf->writeHTMLCell(0, 0, '', '', $PDF, 0, 1, 0, true, '', true);
    $igs_ventas_efectivo = 0;
    foreach ($igs_v_efectivo as $key => $igs) {
        # code...
        $monto = number_format($igs['igs_monto'], 2);
        $igs_ventas_efectivo += $igs['igs_monto'];
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
        //$pdf->writeHTMLCell(0, 0, '', '', $body, 0, 1, 0, true, '', true);
    }


    $igs_ventas_efectivo_2 = number_format($igs_ventas_efectivo, 2);
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
                    <p> <strong> $ $igs_ventas_efectivo_2</strong></p> <strong></strong>
                </td>
            </tr> 
        </thead>
    </table>
    
EOF;

    // Print text using writeHTMLCell()
    //$pdf->writeHTMLCell(0, 0, '', '', $footer2, 0, 1, 0, true, '', true);


    $PDF = <<<EOF
    <table style="border: 1px solid #000">
        <thead>
        <tr>
            <td style="text-align: center;">

                <p style="color:#280898" ><strong>VENTAS S/E $cja_nombre</strong></p>
            
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
                <th style="border: 1px solid #000" ><strong>VENDEDOR</strong></th>
            </tr>
        </thead>
    </table>
   
EOF;

    // HEADER
    //$pdf->writeHTMLCell(0, 0, '', '', $PDF, 0, 1, 0, true, '', true);
    $igs_ventas_se_efectivo = 0;
    foreach ($igs_vs_efectivo as $key => $igs) {
        # code...
        $monto = number_format($igs['igs_monto'], 2);
        $igs_ventas_se_efectivo += $igs['igs_monto'];
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
        // $pdf->writeHTMLCell(0, 0, '', '', $body, 0, 1, 0, true, '', true);
    }


    $igs_ventas_se_efectivo_2 = number_format($igs_ventas_se_efectivo, 2);
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
                    <p> <strong> $ $igs_ventas_se_efectivo_2</strong></p> <strong></strong>
                </td>
            </tr> 
        </thead>
    </table>
    
EOF;

    // Print text using writeHTMLCell()
    //$pdf->writeHTMLCell(0, 0, '', '', $footer2, 0, 1, 0, true, '', true);


    $header5 = <<<EOF
    
    <table style="border: 1px solid #000">
        <thead>
        <tr>
        <td style="text-align: center;">
           
        <p><strong> GASTOS VENTAS $cja_nombre</strong></p>
        
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
    
EOF;

    // Print text using writeHTMLCell()
    //$pdf->writeHTMLCell(0, 0, '', '', $header5, 0, 1, 0, true, '', true);
    $gastos_efectivo_header_ventas = <<<EOF
    <table style="border: 1px solid #000">
        <thead>
            <tr style="text-align: center;">
                <th style="border: 1px solid #000"><strong>#MOVIMIENTO</strong></th>
                <th style="border: 1px solid #000"><strong>CONCEPTO</strong></th>
                <th style="border: 1px solid #000"><strong>MONTO</strong></th>
                <th style="border: 1px solid #000"><strong>FECHA REGISTRO</strong></th>
                <th style="border: 1px solid #000"><strong>USUARIO REGISTRO</strong></th>
            </tr>
        </thead>
        </table>
 
EOF;
    //$pdf->writeHTMLCell(0, 0, '', '', $gastos_efectivo_header_ventas, 0, 1, 0, true, '', true);
    $gts_ventas_efectivo = 0;
    foreach ($gts_ventas as $key => $gts) {
        # code...
        $tgts_cantidad = number_format($gts['tgts_cantidad'], 2);
        $gts_ventas_efectivo += $gts['tgts_cantidad'];
        $gastos_efectivo_body = <<<EOF

    <table style="border: 1px solid #000">
        <thead>
            <tr style="text-align: center; border: 1px solid #000">
                <td style="border: 1px solid #000">$gts[tgts_id]</td>
                <td style="border: 1px solid #000" >$gts[tgts_concepto] - $gts[gts_nombre]</td>
                <td style="border: 1px solid #000" >$tgts_cantidad</td>
                <td style="border: 1px solid #000" >$gts[tgts_fecha_gasto]</td>
                <td style="border: 1px solid #000" >$gts[tgts_usuario_registro]</td>
            </tr>
            </thead>
        </table>
        
  
EOF;
        //   $pdf->writeHTMLCell(0, 0, '', '', $gastos_efectivo_body, 0, 1, 0, true, '', true);
    }
    $gts_ventas_efectivo_2 = number_format($gts_ventas_efectivo, 2);
    $footer5 = <<<EOF
    
    <table style="border: 1px solid #000">
        <thead>
        <tr>
        <td style="text-align: center;">
           
       
        
        </td>
        <td style="text-align: right;">
        <p><strong>TOTAL: </strong></p>
        </td>
        <td style="text-align: center;">
        <p> <strong> $ $gts_ventas_efectivo_2</strong></p> <strong></strong>
        </td>
    </tr>
            
        </thead>
    </table>
    
EOF;

    // Print text using writeHTMLCell()
    // $pdf->writeHTMLCell(0, 0, '', '', $footer5, 0, 1, 0, true, '', true);

    /////

    $header9 = <<<EOF
    
<table style="border: 1px solid #000">
    <thead>
    <tr>
    <td style="text-align: center;">
       
    <p><strong> COMISIONES $cja_nombre</strong></p>
    
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

EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $header9, 0, 1, 0, true, '', true);


    $prestamos_header = <<<EOF
<table style="border: 1px solid #000">
    <thead>
        <tr style="text-align: center;">
        <th style="border: 1px solid #000" ><strong>#MOVIMIENTO</strong></th>
        <th style="border: 1px solid #000" ><strong>CONCEPTO</strong></th>
        <th style="border: 1px solid #000" ><strong>MONTO</strong></th>
        <th style="border: 1px solid #000" ><strong>FECHA REGISTRO</strong></th>
        <th style="border: 1px solid #000" ><strong>USUARIO REGISTRO</strong></th>
        </tr>
    </thead>
    </table>

EOF;
    $pdf->writeHTMLCell(0, 0, '', '', $prestamos_header, 0, 1, 0, true, '', true);


    $gts_comisiones = 0;
    foreach ($gts_com as $key => $gts) {
        # code...
        $tgts_cantidad = number_format($gts['tgts_cantidad'], 2);
        $gts_comisiones += $gts['tgts_cantidad'];
        $prestamos_body = <<<EOF

<table style="border: 1px solid #000">
    <thead>
        <tr style="text-align: center; border: 1px solid #000">
            <td style="border: 1px solid #000">$gts[tgts_id]</td>
            <td style="border: 1px solid #000" >$gts[tgts_concepto]</td>
            <td style="border: 1px solid #000" >$tgts_cantidad</td>
            <td style="border: 1px solid #000" >$gts[tgts_fecha_gasto]</td>
            <td style="border: 1px solid #000" >$gts[tgts_usuario_registro]</td>
        </tr>
        </thead>
    </table>
    

EOF;
        $pdf->writeHTMLCell(0, 0, '', '', $prestamos_body, 0, 1, 0, true, '', true);
    }

    $gts_comisiones2 = number_format($gts_comisiones, 2);
    $footer9 = <<<EOF

<table style="border: 1px solid #000">
    <thead>
    <tr>
    <td style="text-align: center;">
       
   
    
    </td>
    <td style="text-align: right;">
    <p><strong>TOTAL: </strong></p>
    </td>
    <td style="text-align: center;">
    <p> <strong> $ $gts_comisiones2</strong></p> <strong></strong>
    </td>
</tr>
        
    </thead>
</table>

EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $footer9, 0, 1, 0, true, '', true);




    // SUELDOS EL


    $header10 = <<<EOF
    
<table style="border: 1px solid #000">
    <thead>
    <tr>
    <td style="text-align: center;">
       
    <p><strong> SUELDOS $cja_nombre</strong></p>
    
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

EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $header10, 0, 1, 0, true, '', true);


    $sueldos_header = <<<EOF
<table style="border: 1px solid #000">
    <thead>
        <tr style="text-align: center;">
        <th style="border: 1px solid #000" ><strong>#MOVIMIENTO</strong></th>
        <th style="border: 1px solid #000" ><strong>CONCEPTO</strong></th>
        <th style="border: 1px solid #000" ><strong>MONTO</strong></th>
        <th style="border: 1px solid #000" ><strong>FECHA REGISTRO</strong></th>
        <th style="border: 1px solid #000" ><strong>USUARIO REGISTRO</strong></th>
        </tr>
    </thead>
    </table>

EOF;
    $pdf->writeHTMLCell(0, 0, '', '', $sueldos_header, 0, 1, 0, true, '', true);


    $gts_sueldos = 0;
    foreach ($gts_sue as $key => $gts) {
        # code...
        $tgts_cantidad = number_format($gts['tgts_cantidad'], 2);
        $gts_sueldos += $gts['tgts_cantidad'];
        $sueldos_body = <<<EOF

<table style="border: 1px solid #000">
    <thead>
        <tr style="text-align: center; border: 1px solid #000">
            <td style="border: 1px solid #000">$gts[tgts_id]</td>
            <td style="border: 1px solid #000" >$gts[tgts_concepto]</td>
            <td style="border: 1px solid #000" >$tgts_cantidad</td>
            <td style="border: 1px solid #000" >$gts[tgts_fecha_gasto]</td>
            <td style="border: 1px solid #000" >$gts[tgts_usuario_registro]</td>
        </tr>
        </thead>
    </table>
    

EOF;
        $pdf->writeHTMLCell(0, 0, '', '', $sueldos_body, 0, 1, 0, true, '', true);
    }

    $gts_sueldos2 = number_format($gts_sueldos, 2);
    $footer9 = <<<EOF

<table style="border: 1px solid #000">
    <thead>
    <tr>
    <td style="text-align: center;">
       
   
    
    </td>
    <td style="text-align: right;">
    <p><strong>TOTAL: </strong></p>
    </td>
    <td style="text-align: center;">
    <p> <strong> $ $gts_sueldos2</strong></p> <strong></strong>
    </td>
</tr>
        
    </thead>
</table>

EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $footer9, 0, 1, 0, true, '', true);





    /// Auqi empieza las sumas 

    $igs_ventas_efectivo = number_format($igs_ventas_efectivo + $igs_ventas_se_efectivo - $gts_ventas_efectivo, 2);

    $cobranza_efectivo = $igs_efectivo + $igs_efectivo_r - $gts_efectivo;
    $cobranza_efectivo = number_format($cobranza_efectivo, 2);

    $cobranza_banco = number_format($igs_banco, 2);

    $ingreso_reportado = number_format($caja['copn_ingreso_efectivo'], 2);

    $gts_efectivo = number_format($gts_efectivo, 2);
    $gts_v_efectivo = number_format($gts_v_efectivo, 2);

    $pdf->writeHTMLCell(0, 0, '', '', '<br>', 0, 1, 0, true, '', true);
    $resumen = <<<EOF
    <div style="width:200px">
    <table style="width:400px">
        <thead>
        <tr>
            <td colspan="2" style="text-align: center;">
                <p><strong>RESUMEN</strong></p>
            </td>
        </tr>
        <tr> 
            <td  style="text-align: left;">
                <p><strong>CAJA </strong></p>
            </td>
            <td  style="text-align: center;">
                <p><strong> $ $inicio_caja </strong></p>
            </td>
        </tr>


        <tr> 
            <td  style="text-align: left;">
                <p><strong>COBRANZA EFECTIVO</strong></p>
            </td>
            <td  style="text-align: center;">
                <p><strong> $ $cobranza_efectivo</strong></p>
            </td>
        </tr>
        <tr> 
            <td  style="text-align: left;">
                <p><strong>COBRANZA BANCO </strong></p>
            </td>
            <td  style="text-align: center;">
                <p><strong> $ $cobranza_banco</strong></p>
            </td>
        </tr>  

        

        <tr> 
            <td  style="text-align: left;">
                <p><strong>ABONOS </strong></p>
            </td>
            <td  style="text-align: center;">
                <p><strong> $ $igs_abonos2</strong></p>
            </td>
        </tr> 
        <tr> 
            <td  style="text-align: left;">
                <p><strong>PRESTO  JEFE </strong></p>
            </td>
            <td  style="text-align: center;">
                <p><strong> $ $igs_prestamoCP[CP_SAMUEL]</strong></p>
            </td>
        </tr>   
        <tr> 
        <td colspan="2" style="text-align: center;">
          <hr>
        </td>
    </tr> 
        <tr> 
            <td  style="text-align: left;">
                <p><strong> GASTOS COBRADORES </strong></p>
            </td>
            <td  style="text-align: center;">
                <p><strong> $ $gts_efectivo</strong></p>
            </td>
        </tr>

        
        <tr> 
            <td  style="text-align: left;">
                <p><strong> COMISIONES </strong></p>
            </td>
            <td  style="text-align: center;">
                <p><strong> $ $gts_comisiones2</strong></p>
            </td>
        </tr>  
        
        <tr> 
            <td  style="text-align: left;">
                <p><strong> SUELDOS FIJOS </strong></p>
            </td>
            <td  style="text-align: center;">
                <p><strong> $ $gts_sueldos2 </strong></p>
            </td>
        </tr>  
        <tr> 
            <td  style="text-align: left;">
                <p><strong> GASTOS VARIOS </strong></p>
            </td>
            <td  style="text-align: center;">
                <p><strong> $ $gts_v_efectivo</strong></p>
            </td>
        </tr>
          
         
        <tr> 
            <td  style="text-align: left;">
                <p><strong> PRESTAMOS</strong></p>
            </td>
            <td  style="text-align: center;">
                <p><strong> $ $gts_prestamos2 </strong></p>
            </td>
        </tr> 
        <tr> 
            <td  style="text-align: left;">
                <p><strong> RETIRO DE CAJA </strong></p>
            </td>
            <td  style="text-align: center; color: blue;">
                <p><strong> $ $copn_retiro </strong></p>
            </td>
        </tr> 
        <tr> 
            <td  style="text-align: left;">
                <p><strong> SALDO EN CAJA </strong></p>
            </td>
            <td  style="text-align: center; ; color: red;">
                <p><strong> $ $copn_saldo</strong></p>
            </td>
        </tr> 
          
    </thead>
    </table>
    </div>
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $resumen, 0, 1, 0, true, '', true);


    $copn_tab_total = 0;

    $copn_tabulador_1000 = $copn_tabulador[0]['c_1000'];
    $copn_tabulador_500 = $copn_tabulador[0]['c_500'];
    $copn_tabulador_200 = $copn_tabulador[0]['c_200'];
    $copn_tabulador_100 = $copn_tabulador[0]['c_100'];
    $copn_tabulador_50 = $copn_tabulador[0]['c_50'];
    $copn_tabulador_20 = $copn_tabulador[0]['c_20'];
    $copn_tabulador_t_moneda = $copn_tabulador[0]['t_moneda'];

    $copn_tabulador_1000_t = $copn_tabulador_1000 *1000;
    $copn_tab_total += $copn_tabulador_1000_t;

    $copn_tabulador_500_t = $copn_tabulador_500 *500;
    $copn_tab_total += $copn_tabulador_500_t;

    $copn_tabulador_200_t = $copn_tabulador_200 *200;
    $copn_tab_total += $copn_tabulador_200_t;

    $copn_tabulador_100_t = $copn_tabulador_100 *100;
    $copn_tab_total += $copn_tabulador_100_t;

    $copn_tabulador_50_t = $copn_tabulador_50 *50;
    $copn_tab_total += $copn_tabulador_50_t;

    $copn_tabulador_20_t = $copn_tabulador_20 *20;
    $copn_tab_total += $copn_tabulador_20_t;

    $copn_tab_total += $copn_tabulador_t_moneda;


   

    $copn_tab_total = number_format($copn_tab_total,2);

    

    $firma = <<<EOF
    
    <table >
        <thead>
        <tr>
        <td style="text-align: center; width:33%;">
           
            <p style="border-top: 1px solid #000;">ENTREGA</p>
        
        </td>
        <td style="text-align: center; width:33%;">
           
            
        
        </td>
        <td style="text-align: center;width:33%;">
        <p style="border-top: 1px solid #000;">RECIBE</p>
        </td>
    </tr>
            
        </thead>
    </table>

    <table style=" width:400px">
        <thead>
            <tr>
                <td colspan="3" style="text-align: center;" ><strong>TABULADOR</strong></td>
            </tr>
            <tr>
                <td><strong>DENOMINACION</strong></td>
                <td><strong>CANTIDAD</strong></td>
                <td><strong>TOTAL</strong></td>
            </tr>
            <tr>
                <td><strong>1000</strong></td>
                <td><strong>$copn_tabulador_1000</strong></td>
                <td><strong>$copn_tabulador_1000_t</strong></td>
            </tr>
            <tr>
                <td><strong>500</strong></td>
                <td><strong>$copn_tabulador_500</strong></td>
                <td><strong>$copn_tabulador_500_t</strong></td>
            </tr>
            <tr>
                <td><strong>200</strong></td>
                <td><strong>$copn_tabulador_200</strong></td>
                <td><strong>$copn_tabulador_200_t</strong></td>
            </tr>
            <tr>
                <td><strong>100</strong></td>
                <td><strong>$copn_tabulador_100</strong></td>
                <td><strong>$copn_tabulador_100_t</strong></td>
            </tr>
            <tr>
                <td><strong>50</strong></td>
                <td><strong>$copn_tabulador_50</strong></td>
                <td><strong>$copn_tabulador_50_t</strong></td>
            </tr>
            <tr>
                <td><strong>20</strong></td>
                <td><strong>$copn_tabulador_20</strong></td>
                <td><strong>$copn_tabulador_20_t</strong></td>
            </tr>
            <tr>
                <td colspan="2" ><strong>Monedas</strong></td>
                <td><strong>$copn_tabulador_t_moneda</strong></td>
            </tr>
            <tr>
                <td colspan="2">TOTAL</td>
                <td> <strong>$copn_tab_total</strong></td>
            </tr>
            
        </thead>
    </table>

    
EOF;

    // Print text using writeHTMLCell()
    $pdf->writeHTMLCell(0, 0, '', '', $firma, 0, 1, 0, true, '', true);
    // Close and output PDF document
    // This method has several options, check the source code documentation for more information.

    ob_end_clean();

    $registro = str_replace(".", "", $caja['copn_registro']);
    $pdf->Output($registro . '.pdf', 'I');
}
