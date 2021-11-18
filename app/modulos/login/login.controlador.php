<?php
class LoginControlador
{
  public static function ctrIniciarSesion()
  {
    if (isset($_POST['btnIniciarSesion'])) {

      // Limpiar cadenas
      $_POST['usr_correo'] = trim($_POST['usr_correo']);
      $_POST['usr_correo'] = strtolower($_POST['usr_correo']);

      // Validar

      // Procesar

      $usr = LoginModelo::mdlIniciarSesion($_POST['usr_correo']);

      if (!$usr  || !password_verify($_POST['usr_clave'], $usr['usr_clave'])) {
        echo '
              <script>                                                                
                toastr.error("Usuario o contraseña incorrecto, intenta de nuevo", "Error")
              </script>';
        return;
      }

      $_SESSION['session'] = true;
      $_SESSION['session_usr'] = $usr;


      // Temporal
      $sucursal = SucursalesModelo::mdlMostrarSucursales(SUCURSAL_ID);
      $_SESSION['session_suc'] = $sucursal;

      $_SESSION['session_sus'] = array(
        'sus_id' => 'SUS_000001'
      );
      header('location:' . HTTP_HOST);
    }
  }
  public static function ctrIniciarSesionAutomatica($usr_id)
  {



    $usr_id = base64_decode($usr_id);

    // Limpiar cadenas
    // $_POST['usr_correo'] = trim($_POST['usr_correo']);
    // $_POST['usr_correo'] = strtolower($_POST['usr_correo']);

    // Validar

    // Procesar

    $usr = LoginModelo::mdlIniciarSesionAuto($usr_id);
    if (!$usr) {
      session_destroy();
      header('location:' . HTTP_HOST);
      return;
    }

    // if (!$usr  || !password_verify($_POST['usr_clave'], $usr['usr_clave'])) {
    //   echo '
    //           <script>                                                                
    //             toastr.error("Usuario o contraseña incorrecto, intenta de nuevo", "Error")
    //           </script>';
    //   return;
    // }

    $_SESSION['session'] = true;
    $_SESSION['session_usr'] = $usr;


    // Temporal
    $sucursal = SucursalesModelo::mdlMostrarSucursales(SUCURSAL_ID);
    $_SESSION['session_suc'] = $sucursal;

    $_SESSION['session_sus'] = array(
      'sus_id' => 'SUS_000001'
    );
    header('location:' . HTTP_HOST);
  }
}
