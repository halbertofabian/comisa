
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
class InformesControlador
{
    public static function ctrInforme_1($ifs)
    {
        $informe_1 = InformesModelo::mdlInforme_1($ifs);
        $informe_1_sin_mod = $informe_1;

        // if ($informe_1 != false) {


        //     foreach ($informe_1 as $key => $ifs) {
        //         $dt_ficha = PagosModelo::mdlMostrarAbonosAlumno($ifs['ppg_ficha_pago']);

        //         $dt_incripcion = PagosModelo::mdlMostrarDatosFichaPago(array(
        //             'ppg_ficha_pago' => $dt_ficha['fpg_id'],
        //             'ppg_concepto' => $ifs['ppg_concepto'],
        //             'ppg_id_sucursal' => $_SESSION['session_suc']['scl_id']
        //         ));
        //         $dt_incripcion_adeudo = $dt_incripcion['ppg_adeudo_s'] == 0 ? $dt_ficha['fpg_inscripcion'] : $dt_ficha['fpg_inscripcion'] - $dt_incripcion['ppg_adeudo_s'];
        //         $informe_1[$key]['ppg_adeudo'] = $dt_incripcion_adeudo;
        //     }
        // }

        return $informe_1_sin_mod;
    }
}
