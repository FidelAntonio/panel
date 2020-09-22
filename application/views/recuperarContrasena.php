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
    <link rel="icon" href="<?=base_url('assets/images/favicon/favicon.ico')?>">
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
           <form method="POST" class="login-form" id="formRecuperarContrasena">

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
                        <img src="<?= base_url('assets/images/icon/2.png')?>">
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
                    <input id="password" name="password" type="password" placeholder="Contraseña" class="color-placeholder" required>
                    <label for="password" class="center-align"></label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12" style="display: flex;">
                    <!-- <i class="material-icons prefix pt-5" style="color: rgb(249, 181, 34);">lock_outline</i> -->
                    <div class="input-field col s2">
                        <img src="<?= base_url('assets/images/icon/2.png')?>">
                    </div>
                    <input id="passwordConfirm" name="passwordConfirm" type="password" placeholder="Confirmación de contraseña" class="color-placeholder" required>
                    <label for="passwordConfirm"></label>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <!-- <div class="g-recaptcha" data-sitekey="6LfXGtEUAAAAAHU_nOrb8w7Q5fAKAiG4x7-gkcpv"></div> -->
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <input type="submit" class="btn waves-effect-input waves-light" value="Recuperar">
                </div>
            </div>
           

            </form>
        </div>
    </div>

    <!-- ================================================
Scripts
================================================ -->
    <!-- jQuery Library -->
    <script type="text/javascript" src="<?= base_url('assets/vendors/jquery-3.2.1.min.js') ?>"></script>
    <!--materialize js-->
    <script type="text/javascript" src="<?= base_url('assets/js/materialize.min.js') ?>"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?= base_url('assets/') ?>js/additional-methods.min.js"></script>
    <!--scrollbar-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script type="text/javascript" src="<?= base_url('assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') ?>"></script>
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="<?= base_url('assets/js/plugins.js') ?>"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="<?= base_url('assets/js/custom-script.js') ?>"></script>
    <!-- <script src="https://www.google.com/recaptcha/api.js?render=6LdpHNEUAAAAAPLgwLUNemhb3lVCDhPFeczC3Ml7"></script> -->



    <script>
        $("#formRecuperarContrasena").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 3
                },
                passwordConfirm: {
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
      

        $("#formRecuperarContrasena").submit(function(e) {
            e.preventDefault();
            var password = $("#password").val();
				var passConfirm = $("#passwordConfirm").val();
				var parametros = {
					password: password,
                    passConfirm: passConfirm,
                    datos:'<?=$datos?>',
				};
				if (password != "" && passConfirm != "") {
					if (password == passConfirm) {
						if (password.length >= 8) {
							$.ajax({
								url: '<?= base_url('index.php/Contra/resetPassword') ?>',
								data:parametros,
								type: 'POST',
								dataType: 'HTML',
								success: function(data) {
									Swal.fire({
										icon: 'success',
										title: 'Éxito',
										text: 'La contraseña ha sido actualizada'
									})
                                    location.href = "<?= site_url('Login') ?>";
								}
							});
						} else {
							Swal.fire({
								icon: 'warning',
								title: 'Oops...',
								text: 'Las contraseñas deben tener 8 caracteres como mínimo'
							})
							return;
						}

					} else {
						Swal.fire({
							icon: 'warning',
							title: 'Oops...',
							text: 'Las contraseñas no coinciden!'
						})
						return;

					}
				} else {
					Swal.fire({
						icon: 'warning',
						title: 'Oops...',
						text: 'Por favor llene el formulario vacio!'
					})
					return;
				}

			});

    </script>
</body>

</html>