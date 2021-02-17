<body class="fixed-left">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div class="accountbg"></div>
    <!-- <div class="home-btn d-none d-sm-block">
        <a href="index.html" class="text-white"><i class="mdi mdi-home h1"></i></a>
    </div> -->
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">

                <div class="p-3">
                    <div class="float-right text-right">
                        <h4 class="font-18 mt-3 m-b-5">¡BIENVENIDO!</h4>
                        <p class="text-muted">Inicia sesión para acceder al sistema.</p>
                    </div>
                    <a href="" class="logo-admin"><img src="<?php echo HTTP_HOST . 'app/' ?>assets/images/sistema/comisa_logo.jpg" height="110" alt="logo"></a>
                </div>

                <div class="p-3">

                    <form method="POST" class="form-horizontal m-t-10">

                        <div class="form-group">
                            <label for="usr_correo">Correo o número telefónico</label>
                            <input type="text" class="form-control" id="usr_correo" name="usr_correo" placeholder="Correo o número telefónico" required>
                        </div>

                        <div class="form-group">
                            <label for="userpassword">Contraseña</label>
                            <input type="password" class="form-control" id="usr_clave" name="usr_clave" placeholder="Contraseña" required>

                        </div>



                        <div class="form-group d-flex justify-content-between align-items-center">

                            <!-- <div class="text-right"><a href="<?php echo HTTP_HOST . 'recuperar/' ?>" class="card-link">¿Olvidaste tu contraseña?</a></div> -->
                        </div>
                        <!-- <a href="auth-register.html" class="btn btn-outline-primary float-left btn-inline">Register</a> -->
                        <button type="submit" class="btn btn-primary float-right btn-inline mb-5" name="btnIniciarSesion">Iniciar sessión</button>
                        <?php
                        $login = new LoginControlador();
                        $login->ctrIniciarSesion();
                        ?>



                    </form>
                </div>

            </div>
        </div>

        <div class="m-t-40 text-center text-white-50">
            <!-- <p>Don't have an account ? <a href="pages-register.html" class="font-600 text-white"> Signup Now </a> </p> -->
            <p>© 2021 - Comisa. Creado with <i class="mdi mdi-heart text-white"></i> by Softmor</p>
        </div>


    </div>
    <div class="row">
        <div class="container">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center">
                        Descarga la App para <a href="http://comisa.softmor.com/comisa.apk" >Android <i class="fa fa-android" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end wrapper-page -->

    <!-- jQuery  -->
    <!-- <script src="<?php echo HTTP_HOST . 'app/' ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/' ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/' ?>assets/js/modernizr.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/' ?>assets/js/metisMenu.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/' ?>assets/js/jquery.slimscroll.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/' ?>assets/js/waves.js"></script> -->

    <!-- App js -->
    <!-- <script src="<?php echo HTTP_HOST . 'app/' ?>assets/js/app.js"></script> -->

</body>