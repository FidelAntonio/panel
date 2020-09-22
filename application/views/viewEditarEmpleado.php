<link rel="stylesheet" href="<?= base_url('assets/') ?>css/mstepper.css">
<div class="container">

    <div class="row">

        <div class="col s12">

            <div class="col s4">
                <h4 class="header">Editar empleado</h4>
            </div>

        </div>

        <div class="col s3 offset-s10">

            <a style='background-color: #023764' class='dropdown-trigger btn' href="#" onclick="loadUrl('Crudempleados/')" data-target='dropdown1'>Regresar</a>

        </div>

        <div class="col s12">
            <div class="col s12 ">
                <div class="card-panel">
                    <div class="row">
                        <form id="formulario">
                            <div class="row">
                                <div class="input-field col s3">
                                    <input id="nombreEmpleado" name="nombreEmpleado" type="text" required readonly>
                                    <label for="nombreEmpleado">Nombre del empleado</label>
                                </div>
                                <div class="input-field col s3">
                                    <input id="apPaterno" name="apPaterno" type="text" required readonly>
                                    <label for="apPaterno">Apellido paterno</label>
                                </div>
                                <div class="input-field col s3">
                                    <input id="apMaterno" name="apMaterno" type="text" required readonly>
                                    <label for="apMaterno">Apellido materno</label>
                                </div>
                                <div class="input-field col s3">
                                    <input type="hidden" id="idEmpleado" name="idEmpleado" value="<?php echo $idEmpleado; ?>">
                                    <input id="fechaNac" name="fechaNac" type="date" required>
                                    <label for="fechaNac" class="active">Fecha de nacimiento</label>
                                </div>
                                <div class="input-field col s4">
                                    <input id="curp" name="curp" type="text" readonly>
                                    <label for="curp">CURP</label>
                                </div>

                                <?php if ($this->session->userdata('tipo') == 1) { ?>
                                    <div class="col s12 m4">
                                        <label for="idCl">Cliente Ligado</label>
                                        <!-- <select class="browser-default" id="idCl" name="idCl" onchange="getPaquete()" required="">
                                        <option value="" selected="">Seleccione una opción</option>
                                        <php
                                        foreach ($clientes as $row) {
                                            $idCl = $row['idCliente'];
                                            $nomCliente = $row['nombre'];
                                            $apPaterno = $row['apPaterno'];
                                            $apMaterno = $row['apMaterno'];
                                            echo "<option value='$idCl'>$nomCliente $apPaterno $apMaterno</option>";
                                        }
                                        ?>
                                    </select> -->
                                        <input type="hidden" id="idCl" name="idCl" required readonly>
                                        <input type="text" id="nombreCliente" id-autoCompleta="idCl" readonly>
                                    </div>
                                <?php } ?>
                                <div class="col s12 m4">
                                    <label for="idCl">Paquetes</label>
                                    <select class="browser-default" id="idPq" name="idPq" required onchange="cargarSueldo()">
                                        <option value="" selected="">Seleccione una opción</option>
                                        <?php
                                        foreach ($allPaquetes as $key) {
                                            $idPa = $key['idPaquete'];
                                            $nomPaquete = $key['nombre'];
                                            echo "<option value='$idPa'>$nomPaquete</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4">
                                    <input id="direccion" name="direccion" type="text"  readonly>
                                    <label for="direccion">Dirección</label>
                                </div>

                                <div class="input-field col s4">

                                    <input id="telefono" name="telefono" type="text" required>
                                    <label for="telefono">Teléfono</label>
                                </div>
                                <div class="input-field col s4">
                                    <input id="salarioB" name="salarioB" type="text" required readonly>
                                    <label for="salarioB">Salario base</label>
                                </div>

                                <div class="form-check col s4" id="visualizarCheck">
                                    <div class="col offset">
                                        <br><input type="checkbox" class="form-check-input" id="check" name="check" onchange="showContent()">
                                        <label class="form-check-label" for="check">¿Cuenta con número social?</label><br />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col s4" id="visualizarSeguro" readonly>
                                    <input id="seguroE" name="seguroE" type="text" required>
                                    <label for="seguroE">Seguro social</label>
                                </div>
                                <div class="input-field col s4">
                                    <input id="correoE" name="correoE" type="text" required>
                                    <label for="correoE">Correo electrónico</label>
                                </div>

                                <div class="input-field col s4">
                                    <input id="rfc" name="rfc" type="text"  readonly>
                                    <label for="rfc">RFC</label>
                                </div>

                                <div class="row" id="visualizarActualiza" style="display: none;">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button style='background-color: #023764' form="otroForm" class="btn  waves-effect waves-light right" type="submit" name="action" id="enviar">Actualizar
                                                <i class="material-icons right">send</i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

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
<script src="<?= base_url('assets/') ?>js/mstepper.js"></script>
<script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
<script>

    $(document).ready(function() {
        //$('select').material_select();
        $("label").attr("class", "active");
        $.ajax({
            url: '<?= base_url('/index.php/Crudempleados/obtenerDatosEmpleado/' . $idEmpleado) ?>',
            dataType: 'JSON',
            type: 'POST',
            //data: { [csrfName]: csrfHash},
            success: function(proyecto) {
                if (proyecto == null) {
                    $("#visualizarGuardar").show();
                } else {
                    suel = parseFloat(proyecto['salarioBase']);
                    $("#nombreEmpleado").val(proyecto['nombre']);
                    $("#apPaterno").val(proyecto['apPaterno']);
                    $("#apMaterno").val(proyecto['apMaterno']);
                    $("#fechaNac").val(proyecto['nacimiento']);
                    $("#seguroE").val(proyecto['seguro']);
                    <?php if ($this->session->userdata('tipo') == 1) { ?>
                        $("#idCl").val(proyecto['Cliente_idCliente']);
                        $("#nombreCliente").val(proyecto['clientenombre'] + " " + proyecto['clientepaterno'] + " " + proyecto['clientematerno']);
                    <?php } ?>
                    $("#idPq").val(proyecto['Paquete_idPaquete']);
                    $("#curp").val(proyecto['curp']);
                    $("#direccion").val(proyecto['direccionEmpleado']);
                    $("#telefono").val(proyecto['telefonoEmpleado']);
                    $("#correoE").val(proyecto['correoEmpleado']);
                    $("#rfc").val(proyecto['rfc']);
                    $("#salarioB").val(suel.toFixed(2));


                    if (proyecto['checkSeguro'] == 1) {
                        $("#check").attr("checked", "checked");
                    } else {
                        $("#visualizarSeguro").hide();
                    }
                    <?php if ($this->session->userdata('tipo') == 1) { ?>
                        idC = proyecto['Cliente_idCliente'];
                    <?php } ?>
                    idP = proyecto['Paquete_idPaquete'];
                    seguro = proyecto['seguro'];
                    correo = proyecto['correoEmpleado'];
                    rfc = proyecto['rfc'];
                    //$("#codigPos").val(proyecto['cp']);
                    $("#visualizarActualiza").show();
                    rfc = proyecto['rfc'];
                }
            }
        });
    });
    jQuery.validator.addMethod(
            "validarEdad",
            function(value, element) {
                var from = value.split("-"); // DD MM YYYY 
                // var from = value.split("/"); // DD/MM/YYYY 

                var dia = from[2];
                var mes = from[1];
                var anio = from[0];
                var edad = 16;

                var mydate = new Date();
                mydate.setFullYear(anio, mes - 1, dia);
                // console.log(mydate);

                var fechaActual = new Date();
                var setDate = new Date();

                setDate.setFullYear(mydate.getFullYear() + edad, mes - 1, dia);

                if ((fechaActual - setDate) > 0) {
                    return true;
                } else {
                    return false;
                }
            },
            "La edad minima es de 16 años"
        );
    //Funcion Cargar seguro
    function cargarSueldo() {
        idpac = $('#idPq').val();
        $.ajax({
            url: "<?= base_url('index.php/api/Api_Paquetes/getPaquete/') ?>",
            data: {
                'id': idpac
            },
            type: "post",
            dataType: "JSON",
            async: false,
            success: function(data) {
                if (data) {
                    suel = parseFloat(data['base']);
                    $('#salarioB').val(suel.toFixed(2));
                }
            }
        });

    }
    //fin funcion cargar seguro

    var ajaxAutocomplete;

    $(function() {
        if (ajaxAutocomplete)
            ajaxAutocomplete.abort();
        ajaxAutocomplete = $.ajax({
            url: '<?= base_url('index.php/Crudclientes/getClientesAut') ?>',
            type: 'POST',
            dataType: 'JSON',
            data: {
                nombre: '',
            },
            success: function(datos) {
                const data = [];
                for (let i = 0; i < datos.length; i++) {
                    data.push({
                        id: datos[i]['idCliente'],
                        text: datos[i]['clientenombre'] + " " + datos[i]['clientepaterno'] + " " + datos[i]['clientematerno']
                    });
                }
                $("#nombreCliente").autocomplete2({
                    data: data
                });

            }
        });
        $('input').attr("autocomplete", "new-password");

    })

    function establecerAutocomplete(idSeleccionado, elemento) {

        $("#" + $(elemento).attr("id-autoCompleta")).val(idSeleccionado).trigger('change');
    }

    $("#telefono").focus();

    function validarFormulario() {
        $("#formulario").validate({
            rules: {
                fechaNac: {

                    validarEdad: true
                },

                telefono: {
                    required: true,
                    minlength: 10
                },
                correoE: {
                    required: true,
                    email: true
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
            },

        });
        $("#enviar").click(function() {
            var validado = $("#formulario").valid();
            if (validado) {
                var idE = $("#idEmpleado").val();
                var nombreEmpleado = $("#nombreEmpleado").val();
                <?php if ($this->session->userdata('tipo') == 1) { ?>
                    var idCl = $("#idCl").val();
                <?php } else { ?>
                    var idCl = <?= $this->session->userdata('iduser') ?>;
                <?php } ?>
                var apPaterno = $("#apPaterno").val();
                var apMaterno = $("#apMaterno").val();
                var fechaNac = $("#fechaNac").val();
                var seguroE = $("#seguroE").val();
                var curp = $("#curp").val();
                var direccion = $("#direccion").val();
                var telefono = $("#telefono").val();
                var correoE = $("#correoE").val();
                var rfc = $("#rfc").val();
                var salarioB = $("#salarioB").val();
                var paquete = $("#idPq").val();


                var parametros = {
                    "nombreEmpleado": nombreEmpleado,
                    "apPaterno": apPaterno,
                    "apMaterno": apMaterno,
                    "fechaNac": fechaNac,
                    "seguroE": seguroE,
                    "curp": curp,
                    "direccion": direccion,
                    "telefono": telefono,
                    "correoE": correoE,
                    "rfc": rfc,
                    "salarioB": salarioB,
                    "idE": idE,
                    "paquete": paquete,
                    "idCl": idCl
                }

                if (paquete != "") {

                    $.ajax({
                        url: '<?= base_url('/index.php/Crudempleados/actualizarDatosEmpleado/') ?>',
                        dataType: 'html',
                        type: 'POST',
                        data: parametros,
                        success: function(proyecto) {
                            Swal.fire({
                                title: 'Éxito',
                                html: 'Se actualizaron los datos del empleado',
                                icon: 'success'
                            });
                            loadUrl('Crudempleados/index/')
                        }

                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        html: 'Capture todos los datos por favor',
                        icon: 'error'
                    });

                }
            }
        });
    }
    $(document).ready(function() {
        validarFormulario();
    });

    function actualizaDatos() {
        var idE = $("#idEmpleado").val();
        var nombreEmpleado = $("#nombreEmpleado").val();
        <?php if ($this->session->userdata('tipo') == 1) { ?>
            var idCl = $("#idCl").val();
        <?php } else { ?>
            var idCl = <?= $this->session->userdata('iduser') ?>;
        <?php } ?>
        var apPaterno = $("#apPaterno").val();
        var apMaterno = $("#apMaterno").val();
        var fechaNac = $("#fechaNac").val();
        var seguroE = $("#seguroE").val();
        var curp = $("#curp").val();
        var direccion = $("#direccion").val();
        var telefono = $("#telefono").val();
        var correoE = $("#correoE").val();
        var rfc = $("#rfc").val();
        var salarioB = $("#salarioB").val();
        var paquete = $("#idPq").val();


        var parametros = {
            "nombreEmpleado": nombreEmpleado,
            "apPaterno": apPaterno,
            "apMaterno": apMaterno,
            "fechaNac": fechaNac,
            "seguroE": seguroE,
            "curp": curp,
            "direccion": direccion,
            "telefono": telefono,
            "correoE": correoE,
            "rfc": rfc,
            "salarioB": salarioB,
            "idE": idE,
            "paquete": paquete,
            "idCl": idCl
        }

        if (paquete != "") {

            $.ajax({
                url: '<?= base_url('/index.php/Crudempleados/actualizarDatosEmpleado/') ?>',
                dataType: 'html',
                type: 'POST',
                data: parametros,
                success: function(proyecto) {
                    Swal.fire({
                        title: 'Éxito',
                        html: 'Se actualizaron los datos del empleado',
                        icon: 'success'
                    });
                    loadUrl('Crudempleados/index/')
                }

            });
        } else {
            Swal.fire({
                title: 'Error',
                html: 'Capture todos los datos por favor',
                icon: 'error'
            });

        }
    }

    function getPaquete() {
        if ($("#idCl").val() != "") {
            $.ajax({
                url: '<?= base_url('/index.php/Crudempleados/getPaquete/') ?>' + $("#idCl").val(),
                type: "post",
                dataType: "JSON",
                success: function(data) {
                    $("#VisualizarPaquete").show();
                    $("#paquete").html('');
                    $("#paquete").append('<option value ="">Seleccione un paquete</option>');
                    if (data.length > 0) {
                        for (i = 0; i < data.length; i++) {
                            $("#paquete").append(new Option(data[i]['nombre'], data[i]['idPaquete']));
                        }
                    }
                }
            });
        } else {
            $("#VisualizarPaquete").hide();
        }
    }

    function showContent() {
        element = document.getElementById("visualizarSeguro");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }

    }
</script>