
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 17/01/2021 22:11
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
require_once DOCUMENT_ROOT . "app/modulos/conexion/conexion.php";

class InformesModelo
{
    public static function mdlInforme_1($ifs)
    {
        //SELECT * FROM tbl_paquetes_pagos_ppg
        try {
            //code...
            $sql = " SELECT * FROM tbl_paquetes_pagos_ppg WHERE ppg_id_sucursal = ? AND ppg_concepto LIKE '%$ifs[ifs_concepto]%' AND ppg_fecha_registro BETWEEN '$ifs[ifs_fecha_inicio] 00:00:00' AND '$ifs[ifs_fecha_fin] 23:59:59' AND ppg_estado_pagado = 'PAGADO' ";
            $con = Conexion::conectar();
            $pps = $con->prepare($sql);
            $pps->bindValue(1, $ifs['ifs_sucursal']);
            $pps->execute();
            return $pps->fetchAll();
        } catch (PDOException $th) {
            //throw $th;
        } finally {
            $pps = null;
            $con = null;
        }
    }
}
