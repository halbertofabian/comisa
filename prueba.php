<?php
include_once 'config.php';

require_once 'app/modulos/contratos/contratos.controlador.php';
require_once 'app/modulos/contratos/contratos.modelo.php';

$contratos = ContratosModelo::mdlObtenerFotosContrato($_GET['ctr_id']);


$cts_fotos = json_decode($contratos['ctr_fotos'], 2);
$clts_fotos_fiador = json_decode($contratos['clts_fotos_fiador'], 2);


$ctr_data = array(
    'ctr_fotos' => json_encode(array(
        // Fotos  cliente
        'img_cliente' =>  ContratosControlador::ctrGuardarImagenesContrato($cts_fotos['fotoCliente'], $contratos["ctr_folio"], 'img_cliente'),
        'img_cred_fro' =>  ContratosControlador::ctrGuardarImagenesContrato($cts_fotos["fotoCredencialFrontal"], $contratos["ctr_folio"], 'img_cred_fro'),
        'img_cred_tra' =>  ContratosControlador::ctrGuardarImagenesContrato($cts_fotos["fotoCredencialTrasera"], $contratos["ctr_folio"], 'img_cred_tra'),
        'img_pagare' =>  ContratosControlador::ctrGuardarImagenesContrato($cts_fotos["fotoPagare"], $contratos["ctr_folio"], 'img_pagare'),
        'img_fachada' =>  ContratosControlador::ctrGuardarImagenesContrato($cts_fotos["fotoFachada"], $contratos["ctr_folio"], 'img_fachada'),
        'img_comprobante' => ContratosControlador::ctrGuardarImagenesContrato($cts_fotos["comprobanteDomicilio"], $contratos["ctr_folio"], 'img_comprobante'),
    ), true),
    'clts_fotos_fiador' => json_encode(array(
        'img_cred_fro' =>  ContratosControlador::ctrGuardarImagenesContrato($clts_fotos_fiador["clts_fc_elector_fiador"], $contratos["ctr_folio"], 'img_cred_fro_fiador'),
        'img_cred_tra' =>  ContratosControlador::ctrGuardarImagenesContrato($clts_fotos_fiador["clts_tc_elector_fiador"], $contratos["ctr_folio"], 'img_cred_tra_fiador'),
        'img_comprobante' =>  ContratosControlador::ctrGuardarImagenesContrato($clts_fotos_fiador["clts_comprobante_fiador"], $contratos["ctr_folio"], 'img_comprobante_fiador'),
        'img_pagare' =>  ContratosControlador::ctrGuardarImagenesContrato($clts_fotos_fiador["clts_pagare_fiador"], $contratos["ctr_folio"], 'img_pagare_fiador'),
    ), true),
    'ctr_id' => $contratos['ctr_id']
);

$res = ContratosModelo::mdlActualizarFotosContrato($ctr_data);
preArray($res);
