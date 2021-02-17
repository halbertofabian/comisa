
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 01/12/2020 12:00
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class PagosControlador
{
    public static function ctrAgregarPagos()
    {
        if (isset($_POST['btnRegistrarAbono'])) {
            $_POST['ppg_monto'] = str_replace(",", "", $_POST['ppg_monto']);
            $_POST['ppg_adeudo'] =  str_replace(",", "", $_POST['ppg_adeudo'])  -  $_POST['ppg_monto'];
            $_POST['ppg_fecha_registro']  = FECHA;
            $_POST['ppg_usuario_registro']  = $_SESSION['session_usr']['usr_nombre'];
            $_POST['ppg_id_sucursal'] = SUCURSAL_ID;
            $_POST['ppg_ficha_pago'] = $_POST['fpg_id'];

            if ($_POST['ppg_monto'] <= 0) {
                return array(
                    'status' => false,
                    'mensaje' => 'El monto no puede ser menor a 0 debe estar comprendido entre 1 a ' + $_POST['ppg_adeudo']
                );
            }

            // if ($_POST['ppg_monto'] > $_POST['ppg_adeudo']) {
            //     return array(
            //         'status' => false,
            //         'mensaje' => 'El monto no puede ser superior al adeudo'
            //     );
            // }


            if ($_POST['ppg_adeudo'] == 0) {
                $_POST['ppg_estado_pagado'] = 'PAGADO';
                $_POST['ppg_fecha_pagado'] = FECHA;
            } else {
                $_POST['ppg_estado_pagado'] = 'PENDIENTE';
                $_POST['ppg_fecha_pagado'] = '';
            }
            $crearPago = PagosModelo::mdlAgregarPagos($_POST);
            if ($crearPago) {
                return array(
                    'status' => true,
                    'mensaje' => 'Pago registrado con éxito'
                );
                // AppControlador::msj('success', '¡Muy bien!', 'Pago registrado con éxito', HTTP_HOST . 'pagos/new');
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'El pago no se efectuo, intente de nuevo'
                );
                //AppControlador::msj('error', 'Error!', 'El pago no se efectuo, intente de nuevo');
            }
        }
    }
    public function ctrActualizarPagos()
    {
    }
    public function ctrMostrarPagos()
    {
    }
    public function ctrEliminarPagos()
    {
    }

    public static function ctrMostrarPagosAlumnos()
    {
        if (isset($_POST['btnRevisarPagos'])) {

            $_POST['usr_matricula'] =  SUB_FIJO . $_POST['usr_matricula'];
            // Consultar si existe el alumno
            $alumno_pgo = UsuariosModelo::mdlMostrarUsuarios('', '', true, $_POST['usr_matricula']);
            if ($alumno_pgo == null) {
                return array(
                    'status' => false,
                    'mensaje' => 'El alumno con matricula ' . $_POST['usr_matricula'] . ' no se encuentra en la base de datos, verifique la información'
                );
            }

            $datos = PagosModelo::mdlMostrarPagosAlumnos($alumno_pgo['usr_id']);
            return array(
                'status' => true,
                'data' => $datos,
                'alumno' => $alumno_pgo['usr_nombre']
            );
        }
    }
    public static function ctrMostrarDatosFichaPago()
    {
        $dt_ficha = PagosModelo::mdlMostrarAbonosAlumno($_POST['fpg_id']);

        $dt_incripcion = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_INSCRIPCION',
            'ppg_id_sucursal' => SUCURSAL_ID
        ));
        $dt_incripcion_adeudo = $dt_incripcion['ppg_adeudo'] == "" ? $dt_ficha['fpg_inscripcion'] : $dt_incripcion['ppg_adeudo'];

        $dt_examen = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_EXAMEN',
            'ppg_id_sucursal' => SUCURSAL_ID
        ));
        $dt_examen_adeudo = $dt_examen['ppg_adeudo'] == "" ? $dt_ficha['fpg_examen'] : $dt_examen['ppg_adeudo'];

        $dt_guia = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_GUIA',
            'ppg_id_sucursal' => SUCURSAL_ID
        ));
        $dt_guia_adeudo = $dt_guia['ppg_adeudo'] == "" ? $dt_ficha['fpg_guia'] : $dt_guia['ppg_adeudo'];

        $dt_incorporacion = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_INCORPORACION',
            'ppg_id_sucursal' => SUCURSAL_ID
        ));
        $dt_incorporacion_adeudo = $dt_incorporacion['ppg_adeudo'] == "" ? $dt_ficha['fpg_incorporacion'] : $dt_incorporacion['ppg_adeudo'];

        $dt_certificado = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_CERTIFICADO',
            'ppg_id_sucursal' => SUCURSAL_ID
        ));
        $dt_certificado_adeudo = $dt_certificado['ppg_adeudo'] == "" ? $dt_ficha['fpg_certificado'] : $dt_certificado['ppg_adeudo'];

        $dt_semanal = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => 'PPG_SEMANAL',
            'ppg_id_sucursal' => SUCURSAL_ID
        ));
        $dt_semanal_adeudo = $dt_semanal['ppg_adeudo'] == "" ? $dt_ficha['fpg_semana'] * $dt_ficha['fpg_numero_semana'] : $dt_semanal['ppg_adeudo'];


        return array(
            'PPG_INSCRIPCION' => array(
                'total' => $dt_ficha['fpg_inscripcion'],
                'adeudo' => $dt_incripcion_adeudo
            ),
            'PPG_EXAMEN' => array(
                'total' => $dt_ficha['fpg_examen'],
                'adeudo' => $dt_examen_adeudo
            ),
            'PPG_GUIA' => array(
                'total' => $dt_ficha['fpg_guia'],
                'adeudo' => $dt_guia_adeudo
            ),
            'PPG_INCORPORACION' => array(
                'total' => $dt_ficha['fpg_incorporacion'],
                'adeudo' => $dt_incorporacion_adeudo
            ),

            'PPG_CERTIFICADO' => array(
                'total' => $dt_ficha['fpg_certificado'],
                'adeudo' => $dt_certificado_adeudo
            ),
            'PPG_SEMANAL' => array(
                'total' => $dt_ficha['fpg_semana'] * $dt_ficha['fpg_numero_semana'],
                'adeudo' => $dt_semanal_adeudo,
                'pago_semanal' => $dt_ficha['fpg_semana']
            ),
        );
    }

    public static function ctrMostrarDatosFichaPago2()
    {
        $dt_ficha = PagosModelo::mdlMostrarAbonosAlumno($_POST['fpg_id']);

        $dt_incripcion = PagosModelo::mdlMostrarDatosFichaPago(array(
            'ppg_ficha_pago' => $dt_ficha['fpg_id'],
            'ppg_concepto' => $_POST['ppg_concepto'],
            'ppg_id_sucursal' => SUCURSAL_ID
        ));
        if ($_POST['ppg_concepto'] == '') {
            $dt_incripcion_adeudo = $dt_incripcion['ppg_adeudo'] == "" ? $dt_ficha['fpg_inscripcion'] : $dt_incripcion['ppg_adeudo'];
        }
    }

    public static function ctrMostrarAbonosAlumnoConcepto()
    {
        return PagosModelo::mdlMostrarAbonosAlumnoConcepto($_POST['fpg_id'], $_POST['ppg_concepto']);
    }
}
