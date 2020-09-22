<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Sistema de Outsourcing">
    <meta name="keywords" content="Sistema de Outsourcing">
    <meta http-equiv="Cache-control" content="public">
    <title>Sistema de Gestión DLP</title>
    <!-- Favicons-->
    <link rel="icon" href="<?= base_url('assets/images/favicon/favicon.ico') ?>">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="<?= base_url('assets/images/favicon/favicon-32x32.png') ?>../../images/favicon/apple-touch-icon-152x152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <!-- CORE CSS-->
    <link href="<?= base_url('assets/css/themes/collapsible-menu/materialize.css') ?>" type="text/css" rel="stylesheet">
    <link href="<?= base_url('assets/css/themes/collapsible-menu/style.css') ?>" type="text/css" rel="stylesheet">
    <!-- Custome CSS-->
    <link href="<?= base_url('assets/css/custom/custom.css') ?>" type="text/css" rel="stylesheet">
    <link href="<?= base_url('assets/css/layouts/page-center.css') ?>" type="text/css" rel="stylesheet">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') ?>" type="text/css" rel="stylesheet">
    <style type="text/css">
        .imaLogiF {
            background: url(<?= base_url('assets/images/logo/imagenFondo.png') ?>);
            background-size: cover;
            background-position: center;
        }
    </style>
</head>

<body class="imaLogiF">
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->
    <div id="login-page" class="row" align="center">
        <div class="col s12 z-depth-4 card-panel" style="background-color: #ffffffcf;">
            <?= form_open(base_url(), 'method="POST" class="login-form" id="formularioLogin"') ?>


            <div class="row">
                <div class="input-field col s12 center">
                    <img src="<?= base_url('assets/images/logo/dna2_logo.png') ?>" alt="" class="responsive-img valign ">
                    <strong style="font-weight: bold;">
                        <p class="center login-form-text" style="color: #013762;font-size: 17px;">Sistema de Gestión DLP</p>
                    </strong>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12" style="display: flex;">
                    <!-- <i class="material-icons prefix pt-5" style="color: rgb(249, 181, 34);">person_outline</i> -->
                    <div class="input-field col s2">
                        <img src="<?= base_url('assets/images/icon/1.png') ?>">
                    </div>
                    <style>
                        .color-placeholder::placeholder {
                            color: gray;
                        }

                        .color-placeholder::-webkit-input-placeholder {
                            color: gray;
                        }

                        .color-placeholder::-moz-placeholder {
                            color: gray;
                        }

                        .color-placeholder:-ms-input-placeholder {
                            color: gray;
                        }
                    </style>
                    <input id="username" name="username" type="text" placeholder="Correo Electrónico" class="color-placeholder" required>
                    <label for="username" class="center-align"></label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12" style="display: flex;">
                    <!-- <i class="material-icons prefix pt-5" style="color: rgb(249, 181, 34);">lock_outline</i> -->
                    <div class="input-field col s2">
                        <img src="<?= base_url('assets/images/icon/2.png') ?>">
                    </div>
                    <input id="password" name="password" type="password" placeholder="Password" class="color-placeholder" required>
                    <label for="password"></label>
                </div>
            </div>
            <!-- <div class="row">
              <div class="col s12 m12 l12 ml-2 mt-3">
                <input type="checkbox" id="remember-me" />
                <label for="remember-me">Remember me</label>
              </div>
            </div> -->
            <div class="row margin">
                <div class="input-field col s12">
                    <div class="g-recaptcha" data-sitekey="6LfXGtEUAAAAAHU_nOrb8w7Q5fAKAiG4x7-gkcpv"></div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input style="background-color:#023764" type="submit" class="btn waves-effect-input " value="Entrar">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <span>¿Ha olvidado su contraseña? De click </span><a onclick="cambiarContrasena()">aquí</a>
                    <!-- <input type="submit" class="btn waves-effect-input waves-light" value="Entrar"> -->
                </div>
            </div>
            <!-- <div class="row">
              <div class="input-field col s6 m6 l6">
                <p class="margin medium-small"><a href="page-register.html">Register Now!</a></p>
              </div>
              <div class="input-field col s6 m6 l6">
                <p class="margin right-align medium-small"><a href="page-forgot-password.html">Forgot password ?</a></p>
              </div>
            </div> -->
            </form>
        </div>
    </div>

    <!-- Modal Structure -->
    <div id="contraseñaOlvidada" class="modal" align="center">
        <div class="modal-content">
            <h5>Ingrese su correo para recuperar su contraseña</h5>


            <div class="row">
                <div class="input-field col-md-9">
                    <input type="text" id="correo" name="correo">
                </div>
            </div>


            <div class="modal-footer">
                <button class="btn waves-effect waves-light right" onclick="modContrasena()">Enviar

                    <i class="material-icons right">send</i>

                </button>
            </div>
        </div>
    </div>
    <!-- ================================================
Scripts
================================================ -->
    <!-- jQuery Library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script type="text/javascript" src="<?= base_url('assets/vendors/jquery-3.2.1.min.js') ?>"></script>
    <!--materialize js-->
    <script type="text/javascript" src="<?= base_url('assets/js/materialize.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>js/additional-methods.min.js"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?= base_url('assets/js/plugins.js') ?>"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<?= base_url('assets/js/custom-script.js') ?>"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LdpHNEUAAAAAPLgwLUNemhb3lVCDhPFeczC3Ml7"></script>



    <script>
        $("formularioLogin").validate({
            rules: {
                username: {
                    required: true,
                    minlength: 3
                },
                password: {
                    required: true,
                    minlength: 3
                }
            },
            errorElement: 'div',
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            }
        });
        $("#formularioLogin").submit(function(e) {
            e.preventDefault();
            grecaptcha.execute('6LdpHNEUAAAAAPLgwLUNemhb3lVCDhPFeczC3Ml7', {
                action: 'homepage'
            }).then(function(token) {
                $.ajax({
                    url: "<?php echo site_url("Login/") ?>",
                    type: "POST",
                    data: {
                        token: token,
                        username: $("#username").val(),
                        password: $("#password").val()
                    },
                    dataType: 'HTML',
                    success: function() {
                        location.href = "<?= site_url('Tablero') ?>";
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert(jqXHR.responseText);
                    }

                });
            });
        });
        $('.modal').modal();
        $("#formularioActualizar").validate({
            rules: {
                correo: {
                    required: true,
                    email: true
                }
            },
            errorElement: 'div',
            errorPlacement: function(error, element) {
                var placement = $(element).data('error');
                if (placement) {
                    $(placement).append(error)
                } else {
                    error.insertAfter(element);
                }
            }
        });

        function cambiarContrasena() {
            $('#contraseñaOlvidada').modal("open");
            $("#correo").val("");
        }

        function modContrasena() {
            $.ajax({
                url: '<?= site_url('Contra/recuperarPassword') ?>',
                data: {
                    correo: $("#correo").val()
                },
                type: 'POST',
                dataType: 'HTML',
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Se ha enviado un correo con la dirección para reestablecer su contraseña'
                    })
                },
                error: function(jqXHR, status, error) {
                    if (jqXHR['responseText']) {
                        Swal.fire({
                            title: 'Error',
                            html: jqXHR['responseText'],
                            icon: 'error'
                        });
                    }
                }
            });
            return false;
        }
    </script>
</body>

</html>