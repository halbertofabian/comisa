
<?php
/**
 *  Desarrollador: ifixitmor
 *  Fecha de creación: 09/11/2020 13:08
 *  Desarrollado por: Softmor
 *  Software de Morelos SA.DE.CV 
 *  Sitio web: https://softmor.com
 *  Facebook:  https://www.facebook.com/softmor/
 *  Instagram: http://instagram.com/softmormx
 *  Twitter: https://twitter.com/softmormx
 */
class IngresosControlador
{
    public static function ctrAgregarIngresos()
    {
        if (isset($_POST['btnAgregarIngreso'])) {

            $igs_id_corte2 = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);
            if ($igs_id_corte2['usr_caja'] == 0) {
                return array(
                    'status' => false,
                    'mensaje' => 'Necesitas abrir caja para recibir, intente de nuevo'
                );
            }

            $igs_id_corte = CortesControlador::ctrConsultarUltimoCorteByUsuario($_POST['igs_usuario_responsable']);
            if ($igs_id_corte['usr_caja'] == 0) {

                return array(
                    'status' => false,
                    'mensaje' => 'Para poder hacer un cargo a este usuario, necesita sincronizarse a una caja o cargar cartera'
                );
            }


            if ($_POST['igs_mp'] != 'EFECTIVO') {

                // Validar que no vengan vacios los campos 

                if ($_POST['igs_referencia'] == "") {
                    return array(
                        'status' => false,
                        'mensaje' => 'El método de pago es vía ' . $_POST['igs_mp'] . ', complete el campo de referencía'
                    );
                }

                if ($_POST['igs_cuenta'] == "") {
                    return array(
                        'status' => false,
                        'mensaje' => 'El método de pago es vía ' . $_POST['igs_mp'] . ', seleccione una cuenta destino'
                    );
                }
                // validar que no se repita la referencia



            } else {
                $_POST['igs_referencia'] = "";
                $_POST['igs_cuenta'] = "";
            }

            $_POST['igs_id_corte'] = $igs_id_corte['usr_caja'];

            $_POST['igs_id_corte_2'] = $igs_id_corte2['usr_caja'];


            $_POST['igs_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['igs_id_sucursal'] = $_SESSION['session_suc']['scl_id'];
            // $_POST['igs_id_corte'] = CortesControlador::crtConsultarUltimoCorte();

            $_POST['igs_monto'] = str_replace(",", "", $_POST['igs_monto']);
            
            $_POST['igs_fecha_registro'] = FECHA;

            $crearIngreso = IngresosModelo::mdlAgregarIngresos($_POST);

            if ($crearIngreso) {
                $bandera = true;
                if ($_POST['igs_mp'] != 'EFECTIVO') {
                    $bandera = CuentasModelo::mdlActualizarSaldoCuenta($_POST['igs_cuenta'], $_POST['igs_monto']);
                }

                if ($bandera) {
                    return array(
                        'status' => true,
                        'mensaje' => 'Ingreso registrado con exito'
                    );
                } else {
                    return array(
                        'status' => false,
                        'mensaje' => 'Ingreso no registrado, intenta de nuevo'
                    );
                }
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'Ingreso no registrado, intenta de nuevo'
                );
            }
        }
    }
    public function ctrAgregarIngresosCaja()
    {
        if (isset($_POST['btnAgregarIngresoCaja'])) {
            $_POST['igs_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['igs_monto'] = str_replace(",", "", $_POST['igs_monto']);
            $_POST['igs_concepto'] = "BANCO A CAJA";
            $_POST['igs_mp'] = "Efectivo";

            $crearGasto = GastosModelo::mdlCrearGasto(
                array(
                    'tgts_categoria' => 2,
                    'tgts_concepto' =>  $_POST['igs_concepto'],
                    'tgts_fecha_gasto' =>  $_POST['igs_fecha_registro'],
                    'tgts_cantidad' => $_POST['igs_monto'],
                    'tgts_mp' => 'Transferencia',
                    'tgts_nota' => "",
                    'tgts_usuario_registro' => $_POST['igs_usuario_registro'],
                )
            );

            if ($crearGasto) {
                $crearIngreso = IngresosModelo::mdlAgregarIngresos($_POST);

                if ($crearIngreso) {
                    AppControlador::msj('success', 'Muy bien', 'Ingreso registrado con exito', HTTP_HOST . 'ingresos');
                } else {
                    AppControlador::msj('error', 'Error', 'Error no esperado, registre un ingreso');
                }
            } else {
                AppControlador::msj('error', 'Error', 'Ingreso no registrado, intenta de nuevo');
            }
        }
    }
    public function ctrActualizarIngresos()
    {
        if(isset($_POST)){
            $actDato=IngresosModelo::mdlActualizarIngresos($_POST['igs_id'],$_POST['campo'],$_POST['valor']);
            if ($actDato) {
                return array(
                    'status' => true,
                    'mensaje' => 'El dato se actualizo correctamente',
                    
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'No se pudo actualizar el dato', 
                );
            }
        }
    }
    public function ctrMostrarIngresos()
    {
    }
    public static function ctrEliminarIngresos()
    {
        if ($_POST['btnEliminarIngreso']) {
            $eliminarIngreso = IngresosModelo::mdlEliminarIngresos($_POST['igs_id']);

            if ($eliminarIngreso) {
                return array(
                    'status' => true,
                    'mensaje' => 'Ingreso eliminado con éxito',
                    'pagina' => HTTP_HOST . 'ingresos'
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'No se pudo eliminar este ingreso, intente de  nuevo',
                    'pagina' => HTTP_HOST . 'ingresos'
                );
            }
        }
    }
}
