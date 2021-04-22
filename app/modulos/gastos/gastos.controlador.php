<?php

class GastosControlador
{
    public static function ctrCrearCategoria($categoria)
    {



        $crearCategoria = GastosModelo::mdlCrearCategoria(array(
            'gts_nombre' => $categoria['gts_nombre'],
            'gts_presupuesto' => str_replace(",", "", $categoria['gts_presupuesto'])
        ));


        if ($crearCategoria) {
            return array(
                'status' => true,
                'mensaje' => 'Registro creado con éxito'
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Ocurrio un error, es probable que ya exista este registro'
            );
        }
    }

    public static  function ctrCrearGasto()
    {
        if (isset($_POST['btnGuardarGasto'])) {

            $tgts_id_corte2 = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);
            if ($tgts_id_corte2['usr_caja'] == 0) {
                return array(
                    'status' => false,
                    'mensaje' => 'Necesitas abrir caja para recibir, intente de nuevo'
                );
            }
            $tgts_id_corte = CortesControlador::ctrConsultarUltimoCorteByUsuario($_POST['tgts_usuario_responsable']);
            if ($tgts_id_corte['usr_caja'] == 0) {
                return array(
                    'status' => false,
                    'mensaje' => 'Para poder hacer un cargo a este usuario, necesita sincronizarse a una caja o cargar cartera'
                );
            }
            $_POST['tgts_id_corte'] = $tgts_id_corte['usr_caja'];
            $_POST['tgts_id_corte2'] = $tgts_id_corte2['usr_caja'];

            $_POST['tgts_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
            $_POST['tgts_id_sucursal'] = $_SESSION['session_suc']['scl_id'];




            $_POST['tgts_cantidad'] = str_replace(",", "", $_POST['tgts_cantidad']);
            $_POST['tgts_fecha_gasto'] = FECHA;

            $crearGasto = GastosModelo::mdlCrearGasto($_POST);

            if ($crearGasto) {
                return array(
                    'status' => true,
                    'mensaje' => 'Gasto registrado con exito'
                );
            } else {
                return array(
                    'status' => false,
                    'mensaje' => 'Gasto no registrado, intenta de nuevo'
                );
            }
        }
    }

    public static function ctrEliminarGasto($tgts_id)
    {

        $eliminarGasto = GastosModelo::mdlEliminarGasto($tgts_id);


        if ($eliminarGasto) {
            return array(
                'status' => true,
                'mensaje' => 'Gasto eliminado con éxito',
                'pagina' => 'listar-gastos'
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Ocurrio un error, vuelve a intentarlo',
                'pagina' => 'listar-gastos'

            );
        }
    }

    public static function ctrEliminarCategoria($gts_id)
    {

        $eliminarCategoria = GastosModelo::mdlEliminarCategoria($gts_id);


        if ($eliminarCategoria) {
            return array(
                'status' => true,
                'mensaje' => 'Gasto eliminado con éxito',
                'pagina' => 'categorias'
            );
        } else {
            return array(
                'status' => false,
                'mensaje' => 'Esta categoría  esta relzacionada con algún gasto, primero elimine el gasto.',
                'pagina' => 'listar-gastos'

            );
        }
    }

    public  function ctrEditarNota($tabla, $campo, $valor, $pagina)
    {
        if (isset($_POST['btnEditarNota'])) {

            $actualizarNota = GastosModelo::mdlEditarNota($tabla, $campo, $_POST['nota'], $valor, $_POST['id']);

            if ($actualizarNota) {
                AppControlador::msj('success', 'Muy bien', 'Nota actualizada con éxito', $pagina);
            } else {
            }
        }
    }

    public static function ctrAgregarGastoGasVendedor()
    {
        if (isset($_POST['btnGuardarGastoGas'])) {
            $_POST['gtsg_usuario_registro'] = $_SESSION['session_usr']['usr_id'];
            $_POST['gtsg_usuario_responsable'] = $_POST['gtsg_usuario_responsable'];
            $_POST[' gtsg_vehiculo_placas'] = $_POST['gtsg_vehiculo_placas'];
            $_POST['gtsg_precio_litro'] = $_POST['gtsg_precio_litro'];
            $_POST['gtsg_cantidad_litros'] = str_replace(",", "", $_POST['gtsg_cantidad_litros']);
            $_POST['gtsg_monto'] = $_POST['gtsg_monto'];
            $_POST['gtsg_fecha_registro'] = FECHA;
            $_POST['gtsg_kilometraje'] = $_POST['gtsg_kilometraje'];

            $_POST['gtsg_copn_id'] = $_SESSION['session_usr']['usr_caja'];

            
            $guardar = GastosModelo::mdlAgregarGastoGasEmpleado($_POST);


            if ($guardar) {
                // Cargar el prestamo a caja principal

                $tgts_id_corte2 = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);
                if ($tgts_id_corte2['usr_caja'] == 0) {
                    return array(
                        'status' => false,
                        'mensaje' => 'Necesitas abrir caja para recibir, intente de nuevo'
                    );
                }
                $tgts_id_corte = CortesControlador::ctrConsultarUltimoCorteByUsuario($_SESSION['session_usr']['usr_id']);
                if ($tgts_id_corte['usr_caja'] == 0) {
                    return array(
                        'status' => false,
                        'mensaje' => 'Para poder hacer un cargo a este usuario, necesita sincronizarse a una caja o cargar cartera'
                    );
                }
                $_POST['tgts_id_corte'] = $tgts_id_corte['usr_caja'];
                $_POST['tgts_id_corte2'] = $tgts_id_corte2['usr_caja'];

                $_POST['tgts_usuario_registro'] = $_SESSION['session_usr']['usr_nombre'];
                $_POST['tgts_id_sucursal'] = $_SESSION['session_suc']['scl_id'];




                $_POST['tgts_cantidad'] =   str_replace(",", "", $_POST['gtsg_monto']);
                $_POST['tgts_fecha_gasto'] = FECHA;


                $_POST['tgts_ruta'] = "";
                $_POST['tgts_usuario_responsable'] = $_SESSION['session_usr']['usr_id'];
                $_POST['tgts_categoria'] = CATEGORIA_GASTOS_GASOLINA;

                $empleado = UsuariosModelo::mdlMostrarUsuarios($_POST['gtsg_usuario_responsable']);

                $_POST['tgts_concepto'] = "del empleado <strong>" . $empleado['usr_nombre'] . '</strong>';

                $_POST['tgts_mp'] = "EFECTIVO";
                $_POST['tgts_nota'] = "";
                $_POST['tgts_tipo'] = "GASTO DE GASOLINA";

                $crearGasto = GastosModelo::mdlCrearGasto($_POST);

                if ($crearGasto) {


                    return array(
                        'status' => true,
                        'mensaje' => 'Se guardo correctamente el gasto de gasolina'
                    );
                } else {
                    return array(
                        'status' => false,
                        'mensaje' => 'No se registro el gasto de gasolina'
                    );
                }
            } else {

                return array(
                    'status' => false,
                    'mensaje' => 'Se produjo un error, intente de nuevo'
                );
            }
        }
    }
}
