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
                    <div class="col-xl-7 col-md-9 col-10 d-flex justify-content-center px-0">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block text-center mt-1 align-self-center">
                                    <img src="<?php echo HTTP_HOST . 'app/' ?>assets/images/img-app/logo_sead_1.png" width="300" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 px-2 py-1">
                                        <div class="card-header pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Recupera tu contraseña</h4>
                                            </div>
                                        </div>
                                        <p class="px-2 mb-0">Ingrese su dirección de correo electrónico y le enviaremos instrucciones sobre cómo restablecer su contraseña.</p>
                                        <div class="card-content">
                                            <div class="card-body">
                                                <form method="post">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-label-group">
                                                                <input type="email" id="usr_correo" name="usr_correo" class="form-control" placeholder="Correo electrónico">
                                                                <label for="usr_correo">Correo electrónico</label>
                                                            </div>
                                                            <div class="float-md-left d-block mb-1">
                                                                <a href="<?php echo HTTP_HOST ?>" class="btn btn-outline-primary btn-block px-75">Regresar</a>
                                                            </div>
                                                            <div class="float-md-right d-block mb-1">
                                                                <button type="submit" class="btn btn-primary btn-block px-75" name="btnRecuperarClave">Recuperar contraseña</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <?php
                                                            $recupera = new UsuariosControlador();
                                                            $recupera->ctrRecuprarClaveUsuarioViaEmail();
                                                            ?>
                                                        </div>

                                                    </div>
                                                </form>

                                            </div>
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
    <script src="<?php HTTP_HOST . 'app/assets/' ?>vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?php HTTP_HOST . 'app/assets/' ?>vendors/js/ui/jquery.sticky.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?php HTTP_HOST . 'app/assets/' ?>js/core/app-menu.js"></script>
    <script src="<?php HTTP_HOST . 'app/assets/' ?>js/core/app.js"></script>
    <script src="<?php HTTP_HOST . 'app/assets/' ?>js/scripts/components.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

</body>