<div class="container">

    <div class="row">

        <div class="col s12">

            <div class="col s4">
                <h4 class="header">Registrar Nuevo usuario</h4>
            </div>

        </div>

        <div class="col s3 offset-s10">

            <a style="background-color: #023764" class='dropdown-trigger btn' href="#" onclick="loadUrl('Crudusuarios/')" data-target='dropdown1'>Regresar</a>

        </div>

        <div class="col s12">

            <div class="col s12 ">

                <div class="card-panel">

                    <div class="row">


                        <form id="formulario">

                            <div class="row">

                                <div class="input-field col s3">
                                    <input id="correo" name="correo" type="text" required>
                                    <label for="name">Correo</label>
                                </div>
                                <div class="input-field col s3">
                                    <input id="password" name="password" type="password" required>
                                    <label for="password">Contraseña</label>
                                </div>
                                <div class="input-field col s3">
                                    <input id="confirmasPass" name="confirmasPass" type="password" required>
                                    <label for="confirmasPass">Confirmar contraseña</label>
                                </div>

                                <div class=" col s3">
                                    <label for="idTip">Tipo</label>
                                    <select class="browser-default" id="idTip" name="idTip" required>
                                        <option value="" disabled selected>Seleccione una opción</option>
                                        <option value="1">Administrador</option>;
                                    </select>
                                </div>

                            </div>

                            <div class="row">
                                <div class="input-field col offset-s3 s6">

                                    <input class="dropify" id="fotoPerfil" name="fotoPerfil" style="padding-top: 20px;" type="file">

                                    <label for="name" class="active">Foto de perfil</label>

                                </div>
                            </div>

                            <div class="row">

                                <div class="row">

                                    <div class="input-field col s12">

                                        <button style="background-color: #023764" class="btn  waves-effect waves-light right">Guardar

                                            <i class="material-icons right">send</i>

                                        </button>

                                    </div>

                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        $(".dropify").dropify({
            messages: {
                'default': 'Arrastra y suelta un archivo o haz clic (<?= $tamanoMaximo ?>)',
                'replace': 'Arrastra y suelta un archivo o haz clic para reemplazar (<?= $tamanoMaximo ?>)',
                'remove': 'Remover',
                'error': 'Ooops, ocurrió un error.'
            }
        });
        $("#formulario").validate({
                    rules: {
                        correo: {
                            required: true,
                            email:true,
                        },
                        password: {
                            required: true,
                            minlength:3,
                        },
                        confirmasPass: {
                            required: true,
                            
                        },
                        idTip: {
                            required: true,
                        },
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

        $("#formulario").submit(function(e) {
            e.preventDefault();
            var p1 = document.getElementById("password").value;
            var p2 = document.getElementById("confirmasPass").value;
            if (p1 != p2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Las contraseñas no coinciden!'
                })
                return;
            }
            formData = new FormData(document.getElementById("formulario"));
            $.ajax({
                url: '<?= base_url('index.php/Crudusuarios/nuevoUser') ?>',
                data: formData,
                contentType: false,
                processData: false,
                type: 'POST',
                dataType: 'html',
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'El usuario ha sido registrado'
                    })
                    loadUrl('Crudusuarios')
                }, error (jqXHR, status, error) {
                    console.log(jqXHR);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: jqXHR['responseText']
                    })
                }
            });
        });
    </script>