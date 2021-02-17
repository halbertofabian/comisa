<body class="login" style="background-color: #fff;">
    <div class="wrapper wrapper-login wrapper-login-full p-0">
        <div class="login-aside w-50 d-flex flex-column align-items-center justify-content-center text-center bg-dark">
            <h1 class="title fw-bold text-white mb-3"><?php echo TITULO_APP ?></h1>
            <p class="subtitle text-white op-7">Bienvenido al sistema de <?php echo TITULO_APP ?></p>
        </div>
        <div class="login-aside w-50 d-flex align-items-center justify-content-center bg-white">
            <div class="container container-login container-transparent animated fadeIn">
                <div class="text-center">
                    <img src="<?php echo LOGO_C ?>" width="150" alt="">
                </div>

                <form action="" method="post">
                    <div class="login-form">
                        <div class="form-group">
                            <label for="usr_correo" class="placeholder"><b>Usuario</b></label>
                            <input id="usr_correo" name="usr_correo" type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="usr_clave" class="placeholder"><b>Contraseña</b></label>
                            <!-- <a href="#" class="link float-right">Forget Password ?</a> -->
                            <div class="position-relative">
                                <input id="usr_clave" name="usr_clave" type="password" class="form-control" required>
                                <div class="show-password">
                                    <i class="icon-eye"></i>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="form-group form-action-d-flex mb-3"> -->
                        <!-- <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="rememberme">
                                <label class="custom-control-label m-0" for="rememberme">Remember Me</label>
                            </div> -->

                        <button type="submit" class="btn btn-dark col-md-5 float-right mt-3 mt-sm-0 fw-bold" name="btnIniciarSesion">Iniciar sesión</button>

                        <!-- </div> -->
                        <!-- <div class="login-account">
                            <span class="msg">Don't have an account yet ?</span>
                            <a href="#" id="show-signup" class="link">Sign Up</a>
                        </div> -->
                    </div>
                    <?php
                    $login = new LoginControlador();
                    $login->ctrIniciarSesion();
                    ?>
                </form>
            </div>

            <div class="container container-signup container-transparent animated fadeIn">
                <h3 class="text-center">Sign Up</h3>
                <div class="login-form">
                    <div class="form-group">
                        <label for="fullname" class="placeholder"><b>Fullname</b></label>
                        <input id="fullname" name="fullname" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email" class="placeholder"><b>Email</b></label>
                        <input id="email" name="email" type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="passwordsignin" class="placeholder"><b>Password</b></label>
                        <div class="position-relative">
                            <input id="passwordsignin" name="passwordsignin" type="password" class="form-control" required>
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="confirmpassword" class="placeholder"><b>Confirm Password</b></label>
                        <div class="position-relative">
                            <input id="confirmpassword" name="confirmpassword" type="password" class="form-control" required>
                            <div class="show-password">
                                <i class="icon-eye"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row form-sub m-0">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="agree" id="agree">
                            <label class="custom-control-label" for="agree">I Agree the terms and conditions.</label>
                        </div>
                    </div>
                    <div class="row form-action">
                        <div class="col-md-6">
                            <a href="#" id="show-signin" class="btn btn-danger btn-link w-100 fw-bold">Cancel</a>
                        </div>
                        <div class="col-md-6">
                            <a href="#" class="btn btn-danger w-100 fw-bold">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/core/popper.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/core/bootstrap.min.js"></script>
    <script src="<?php echo HTTP_HOST . 'app/'  ?>assets/js/atlantis.min.js"></script>
</body>