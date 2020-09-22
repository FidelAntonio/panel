<div class="container">

    <div class="row">

        <div class="col s12">

            <div class="col s4">
                <h4 class="header">Registrar nuevo cliente</h4>
            </div>

        </div>

        <div class="col s3 offset-s10">

            <a style="background-color: #023764" class='dropdown-trigger btn' href="#" onclick="loadUrl('Crudclientes/')" data-target='dropdown1'>Regresar</a>

        </div>

        <div class="col s12">
            <div class="col s12 ">
                <div class="card-panel">
                    <div class="row">
                        <form id="formulario">
                            <div class="row">
                                <div class="input-field col s3">
                                    <input id="nombreCliente" name="nombreCliente" type="text" required>
                                    <label for="nombreCliente">Nombre del cliente</label>
                                </div>
                                <div class="input-field col s3">
                                    <input id="apPaterno" name="apPaterno" type="text" required>
                                    <label for="apPaterno">Apellido paterno</label>
                                </div>
                                <div class="input-field col s3">
                                    <input id="apMaterno" name="apMaterno" type="text">
                                    <label for="apMaterno">Apellido materno</label>
                                </div>
                                <div class="input-field col s3">
                                    <input id="numTele" name="numTele" type="tel" required>
                                    <label for="numTele">Número de teléfono</label>
                                </div>
                            </div>
                            <div class="row">
                                <!-- <div class="col s12 m4">
                                    <label for="idTip">Usuario Ligado</label>
                                    <select class="browser-default" id="idUser" name="idUser" required>
                                        <option value=""  selected>Seleccione un usuario</option>
                                        <?php
                                foreach ($usuarios as $row) {
                                    $idUser = $row["idUsuario"];
                                    $correoUser = $row["correo"];
                                    echo "<option value='$idUser' >$correoUser</option>";
                                }

                                ?>
                                    </select>
                                </div> -->
                                <div class="input-field col s3">
                                    <input id="correoC" name="correoC" type="email" required>
                                    <label for="correoC">Correo</label>
                                </div>
                                <div class="input-field col s3">
                                    <input id="passwordClie" name="passwordClie" type="password" required>
                                    <label for="passwordClie">Contraseña</label>
                                </div>
                                <div class="input-field col s3">
                                    <input id="confirmarPass" name="confirmarPass" type="password" required>
                                    <label for="confirmarPass">Confirmar contraseña</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn  waves-effect waves-light right">Guardar
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
        $("#formulario").submit(function(e) {
            e.preventDefault();
            var p1 = document.getElementById("passwordClie").value;
            var p2 = document.getElementById("confirmarPass").value;
            if (p1 !== p2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Las contraseñas no coinciden!'
                });
                return;
            }
            const formData = new FormData(document.getElementById("formulario"));
            $.ajax({
                url: '<?= base_url('index.php/Crudclientes/newClientes') ?>',
                data: formData,
                contentType: false,
                processData: false,
                type: 'POST',
                dataType: 'html',
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Se guardó el nuevo cliente'
                    });
                    loadUrl('Crudclientes')
                }, error: function (jqXHR, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: jqXHR['responseText']
                    });
                }
            });
        });
        $("#formulario").validate({
            rules: {
                nombreCliente: {
                    required: true,
                    minlength:3,
                    maxlength:100
                },
                apPaterno: {
                    required: true,
                    minlength:3,
                    maxlength:100
                },
                apMaterno: {
                    required: true,
                    minlength:3,
                    maxlength:100
                },
                numTele: {
                    minlength:10,
                    maxlength:30
                },
                correoC: {
                    required: true,
                    email: true
                },
                passwordClie: {
                    required: true,
                    minLength: 3
                },
                confirmarPass: {
                    required: true,
                    minLength: 3
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
    </script>