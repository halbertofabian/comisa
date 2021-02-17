<?php

if (isset($rutas[1]) && $rutas[1] == 'token' && isset($rutas[2]) && $rutas[2] != '') :
    $token = UsuariosModelo::mdlConsultarTokenAlumno($rutas[2]);
    if ($token == false) : ?>

        <body class="horizontal-layout horizontal-menu 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
            <!-- BEGIN: Content-->
            <div class="app-content content">
                <div class="content-overlay"></div>
                <div class="header-navbar-shadow"></div>
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <section class="row flexbox-container">
                            <div class="col-md-8 col-11  justify-content-center">
                                <div class="card bg-authentication rounded-0 mb-0">
                                    <div class="row m-0">
                                        <div class="col-md-6 d-md-block mt-1  text-center align-self-center px-1 py-0">
                                            <img src="<?php echo HTTP_HOST . 'app/' ?>assets/images/img-app/logo_sead_1.png" width="300" alt="branding logo">
                                        </div>
                                        <div class="col-md-6 col-12 p-0">
                                            <div class="card rounded-0 mb-0 px-2">
                                                <div class="card-header pb-1">
                                                    <div class="card-title">
                                                        <h4 class="mb-0">Tu enlace ya caduco</h4>
                                                    </div>
                                                </div>

                                                <div class="card-content">
                                                    <div class="card-body pt-1">
                                                        <div class="float-md-left d-block mb-1">
                                                            <a href="<?php echo HTTP_HOST . 'recuperar' ?>" class="btn btn-outline-primary btn-block px-75">Solicitar de nuevo</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <div class="login-footer">
                                            <div class="divider">
                                                <div class="divider-text">OR</div>
                                            </div>
                                            <div class="footer-btn d-inline">
                                                <a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                                                <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a>
                                                <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a>
                                                <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a>
                                            </div>
                                        </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>
            <!-- END: Content-->


            <!-- BEGIN: Vendor JS-->
            <script src="<?php echo HTTP_HOST . 'app/' ?>assets/vendors/js/vendors.min.js"></script>
            <!-- BEGIN Vendor JS-->

            <!-- BEGIN: Page Vendor JS-->
            <script src="<?php echo HTTP_HOST . 'app/' ?>assets/vendors/js/ui/jquery.sticky.js"></script>
            <!-- END: Page Vendor JS-->

            <!-- BEGIN: Theme JS-->
            <script src="<?php echo HTTP_HOST . 'app/' ?>assets/js/core/app-menu.js"></script>
            <script src="<?php echo HTTP_HOST . 'app/' ?>assets/js/core/app.js"></script>
            <script src="<?php echo HTTP_HOST . 'app/' ?>assets/js/scripts/components.js"></script>
            <!-- END: Theme JS-->

            <!-- BEGIN: Page JS-->
            <!-- END: Page JS-->

        </body>

    <?php else : ?>

        <body class="horizontal-layout horizontal-menu 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="hover" data-menu="horizontal-menu" data-col="1-column">
            <!-- BEGIN: Content-->
            <div class="app-content content">
                <div class="content-overlay"></div>
                <div class="header-navbar-shadow"></div>
                <div class="content-wrapper">
                    <div class="content-header row">
                    </div>
                    <div class="content-body">
                        <section class="row flexbox-container">
                            <div class="col-md-8 col-11  justify-content-center">
                                <div class="card bg-authentication rounded-0 mb-0">
                                    <div class="row m-0">
                                        <div class="col-md-6 d-md-block mt-1  text-center align-self-center px-1 py-0">
                                            <img src="<?php echo HTTP_HOST . 'app/' ?>assets/images/img-app/logo_sead_1.png" width="300" alt="branding logo">
                                        </div>
                                        <div class="col-md-6 col-12 p-0">
                                            <div class="card rounded-0 mb-0 px-2">
                                                <div class="card-header pb-1">
                                                    <div class="card-title">
                                                        <h5 class="mb-0">HOLA <span class="text-primary"><?php echo $token['usr_nombre'] ?></span></h5>
                                                    </div>
                                                </div>
                                                <p class="px-2">Cambia aquí tu contraseña</p>
                                                <div class="card-content">
                                                    <div class="card-body pt-1">
                                                        <form method="POST">
                                                            <div class="row">
                                                                <div class="col-12">

                                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                                        <input type="password" class="form-control" id="usr_clave" name="usr_clave" placeholder="Nueva contraseña" required>
                                                                        <div class="form-control-position">
                                                                            <i class="feather icon-lock"></i>
                                                                        </div>
                                                                        <label for="usr_clave">Nueva contraseña</label>
                                                                    </fieldset>

                                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                                        <input type="password" class="form-control" id="usr_clave_r" name="usr_clave_r" placeholder="Repite la nueva contraseña" required>
                                                                        <div class="form-control-position">
                                                                            <i class="feather icon-lock"></i>
                                                                        </div>
                                                                        <label for="usr_clave_r">Repite la nueva contraseña</label>
                                                                    </fieldset>
                                                                    <div class="form-group d-flex justify-content-between align-items-center">
                                                                        <!-- <div class="text-left">
                                                            <fieldset class="checkbox">
                                                                <div class="vs-checkbox-con vs-checkbox-primary">
                                                                    <input type="checkbox">
                                                                    <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                    <span class="">Remember me</span>
                                                                </div>
                                                            </fieldset>
                                                        </div> -->
                                                                        <!-- <div class="text-right"><a href="<?php echo HTTP_HOST . 'recuperar/' ?>" class="card-link">¿Olvidaste tu contraseña?</a></div> -->
                                                                    </div>
                                                                    <input type="hidden" name="usr_token" value="<?php echo $token['usr_token'] ?>">
                                                                    <input type="hidden" name="usr_id" value="<?php echo $token['usr_id'] ?>">
                                                                    <!-- <a href="auth-register.html" class="btn btn-outline-primary float-left btn-inline">Register</a> -->
                                                                    <button type="submit" class="btn btn-primary float-right btn-inline mb-5" name="btnCambiarContrasena">Cambiar contraseña</button>
                                                                    <?php
                                                                    $cambiarCalve = new UsuariosControlador();
                                                                    $cambiarCalve->ctrCambiarClaveAlumno();
                                                                    ?>
                                                                </div>

                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                                <!-- <div class="login-footer">
                                            <div class="divider">
                                                <div class="divider-text">OR</div>
                                            </div>
                                            <div class="footer-btn d-inline">
                                                <a href="#" class="btn btn-facebook"><span class="fa fa-facebook"></span></a>
                                                <a href="#" class="btn btn-twitter white"><span class="fa fa-twitter"></span></a>
                                                <a href="#" class="btn btn-google"><span class="fa fa-google"></span></a>
                                                <a href="#" class="btn btn-github"><span class="fa fa-github-alt"></span></a>
                                            </div>
                                        </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                    </div>
                </div>
            </div>


        </body>
    <?php endif; ?>
<?php else :

    echo '<script>
        document.location.href = "' . HTTP_HOST . '";
    </script>';

?>

<?php endif; ?>