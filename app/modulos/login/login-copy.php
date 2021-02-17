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
                                    <img src="<?php echo HTTP_HOST . 'app/' ?>assets/images/img-app/comisa_logo.jpeg" width="300" alt="branding logo">
                                </div>
                                <div class="col-md-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Inicio de sesión</h4>
                                            </div>
                                        </div>
                                        <p class="px-2">Bienvenido(s) al sistema</p>
                                        <div class="card-content">
                                            <div class="card-body pt-1">
                                                <form method="POST">
                                                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                        <input type="text" class="form-control" id="usr_correo" name="usr_correo" placeholder="Correo o número telefónico" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-user"></i>
                                                        </div>
                                                        <label for="usr_correo">Usuario</label>
                                                    </fieldset>

                                                    <fieldset class="form-label-group position-relative has-icon-left">
                                                        <input type="password" class="form-control" id="usr_clave" name="usr_clave" placeholder="Contraseña" required>
                                                        <div class="form-control-position">
                                                            <i class="feather icon-lock"></i>
                                                        </div>
                                                        <label for="usr_clave">Contraseña</label>
                                                    </fieldset>
                                                    <div class="form-group d-flex justify-content-between align-items-center">

                                                        <div class="text-right"><a href="<?php echo HTTP_HOST . 'recuperar/' ?>" class="card-link">¿Olvidaste tu contraseña?</a></div>
                                                    </div>
                                                    <!-- <a href="auth-register.html" class="btn btn-outline-primary float-left btn-inline">Register</a> -->
                                                    <button type="submit" class="btn btn-primary float-right btn-inline mb-5" name="btnIniciarSesion">Entrar</button>
                                                    <?php
                                                    $login = new LoginControlador();
                                                    $login->ctrIniciarSesion();
                                                    ?>

                                                </form>
                                            </div>
                                        </div>
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