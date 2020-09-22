<div class="container">

    <div class="row">

        <div class="col s12">

            <div class="col s4">
                <h4 class="header">Alta de datos fiscales</h4>
            </div>

        </div>

        <div class="row">
            <div class="col s12 ">
                <div class="col s4">
                    <label for="tipoPer">Tipo de persona</label>
                    <select class="browser-default" form="formulario" id="tipoPer" name="tipoPer" onchange="mostrar(this.value)" required="">
                        <option value="">Seleccione tipo de persona</option>
                        <option value="1">Física</option>
                        <option value="2">Moral</option>
                    </select>
                </div>

                <div class="col s12 m6">
                    <div class="col s3 offset-s12">
                        <a class='dropdown-trigger btn right' href="#" onclick="loadUrl('Crudclientes/datosFiscalesCliente/<?php echo $idCliente; ?>')" data-target='dropdown1'>Regresar</a>

                    </div>
                </div>
            </div>

            <div class="col s12" id="contenedor" style="display: none;">
                <div class="col s12 ">
                    <div class="card-panel">
                        <div class="row">
                            <form id="formulario" method="POST" action="">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="RSocial" name="RSocial" type="text" required>
                                        <label for="RSocial">Razón social </label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="rfcSocial" name="rfcSocial" type="text" required>
                                        <label for="rfcSocial">RFC</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="caFiscal" name="caFiscal" type="text" required>
                                        <label for="caFiscal">Calle fiscal</label>
                                    </div>
                                    <div class="input-field col s3">
                                        <input id="numExte" name="numExte" type="text" required>
                                        <label for="numExte">Número Exterior</label>
                                    </div>
                                    <div class="input-field col s3">
                                        <input id="numInte" name="numInte" type="text">
                                        <label for="numInte">Número Interior</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m3">
                                        <label for="idEdos">Estado</label>
                                        <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $idCliente; ?>">
                                        <select class="browser-default" id="idEdos" name="idEdos" onchange="getMuncipio()" required="">
                                            <option value="" selected="">Seleccione un estado</option>
                                            <?php
                                            foreach ($estados as $key) {
                                                $idEdos = $key["id_Estado"];
                                                $nombreEstado = $key["nombreEstado"];
                                                echo "<option value='$idEdos'>$nombreEstado</option>";
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col s12 m3" id="visualizarMunic" style="display: none;">
                                        <label for="idEdos">Municipio</label>
                                        <select class="browser-default" id="municipioFis" name="municipioFis" onchange="getRegiones()" required="">
                                            <option value="" selected="">Seleccione un municipio</option>
                                        </select>
                                    </div>
                                    <div class="col s12 m3" id="visualizarCol" style="display: none;">
                                        <label for="idEdos">Colonia</label>
                                        <select class="browser-default" id="coloniaFis" name="coloniaFis" onchange="getCodigoPostal()" required="">
                                            <option value="" selected="">Seleccione una colonia</option>
                                        </select>
                                    </div>


                                    <div class="col s12 m3" id="ViisualizarPostal" style="display: none;">
                                        <label for="idEdos">Código postal</label>
                                        <select class="browser-default" id="codigPos" name="codigPos" required>
                                            <option value="" selected="">Seleccione un código postal</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s4">
                                        <input id="correoFiscal" name="correoFiscal" type="text" required>
                                        <label for="correoFiscal">Correo</label>
                                    </div>
                                    <div class="col s12 m4">
                                        <label for="idEdo">USO CFDI</label>
                                        <select class="browser-default" id="cfdi" name="cfdi" onchange="">
                                            <?php
                                            foreach ($catCFDI as $key) {
                                                $codigo = $key["codigo"];
                                                $descripcion = $key["descripcion"];
                                                if ($codigo == 'P01') {
                                                    echo "<option value='$codigo'selected >$descripcion</option>";
                                                } else {
                                                    echo "<option value='$codigo'>$descripcion</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="input-field col s4">
                                        <input id="telFiscal" name="telFiscal" type="text">
                                        <label for="telFiscal">Teléfono</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6" id="visualizarRepre" style="display: none;">
                                        <input id="representanteL" name="representanteL" type="text">
                                        <label for="representanteL">Representante legal</label>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn  waves-effect waves-light right" type="submit" name="action">Guardar
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
            $("#formulario").validate({
                rules: {
                    RSocial: {
                        required: true,
                        minlength: 3,
                        maxlength: 100
                    },
                    rfcSocial: {
                        required: true,
                        minlength: 12,
                        maxlength: 13


                    },
                    caFiscal: {
                        required: true

                    },
                    numExte: {
                        required: true
                    },
                    idEdo: {
                        required: true
                    },
                    municipioFis: {
                        required: true
                    },
                    coloniaFis: {
                        required: true
                    },
                    codigPos: {
                        required: true
                    },
                    correoFiscal: {
                        required: true
                    },
                    cfdi: {
                        required: true
                    },
                    telFiscal: {
                        minlength: 10
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
            $("#formulario").submit(function(e) {
                e.preventDefault();
                formData = new FormData(document.getElementById("formulario"));
                $.ajax({
                    url: '<?= base_url('index.php/Crudclientes/newDatos') ?>',
                    data: formData,
                    contentType: false,
                    processData: false,
                    type: 'POST',
                    dataType: 'html',
                    success: function(data) {
                        Swal.fire({
                            title: 'Éxito',
                            html: 'Se guardaron los datos de facturación',
                            icon: 'success'
                        });
                        loadUrl('Crudclientes/datosFiscalesCliente/<?= $idCliente ?>')
                        // loadUrl('Crudempleados')
                    },
                    error(jqXHR, status, error) {
                        console.log(jqXHR);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            html: jqXHR['responseText']
                        })
                    }
                });
            });



            function getMuncipio() {

                if ($("#idEdos").val() != "") {

                    $.ajax({
                        url: '<?= base_url('/index.php/Crudclientes/getMuni/') ?>' + $("#idEdos").val(),
                        type: "post",
                        dataType: "JSON",
                        success: function(data) {
                            $("#visualizarMunic").show();
                            $("#municipioFis").html('');
                            $("#coloniaFis").html('');
                            $("#codigPos").html('');
                            $("#municipioFis").append('<option value ="">Seleccione un Municipio</option>');
                            $("#coloniaFis").append('<option value ="">Seleccione un Municipio</option>');
                            $("#codigPos").append('<option value ="">Seleccione un colonia</option>');

                            if (data.length > 0) {
                                for (i = 0; i < data.length; i++) {
                                    $("#municipioFis").append(new Option(data[i]['nombreMunicipio'], data[i]['idMunicipio']));
                                }


                            }
                        }
                    });
                } else {
                    $("#visualizarMunic").hide();
                    $("#visualizarCol").hide();
                    $("#ViisualizarPostal").hide();
                }
            }

            function getRegiones() {

                if ($("#municipioFis").val() != "") {
                    $.ajax({
                        url: '<?= base_url('/index.php/Crudclientes/getColo/') ?>' + $("#municipioFis").val(),
                        type: "post",
                        dataType: "JSON",
                        success: function(data) {
                            $("#visualizarCol").show();
                            $("#coloniaFis").html('');
                            $("#codigPos").html('');
                            $("#coloniaFis").append('<option value ="">Seleccione una colonia</option>');
                            $("#codigPos").append('<option value ="">Seleccione un colonia</option>');
                            if (data.length > 0) {
                                for (i = 0; i < data.length; i++) {
                                    $("#coloniaFis").append(new Option(data[i]['nombreRegion'], data[i]['idRegiones']));
                                }

                            }
                        }
                    });
                } else {
                    $("#visualizarCol").hide();
                    $("#ViisualizarPostal").hide();
                }
            }

            function getCodigoPostal() {
                if ($("#coloniaFis").val() != "") {
                    $.ajax({
                        url: '<?= base_url('/index.php/Crudclientes/getCodigo/') ?>' + $("#coloniaFis").val(),
                        type: "post",
                        dataType: "JSON",
                        success: function(data) {
                            $("#ViisualizarPostal").show();
                            $("#codigPos").html('');
                            $("#codigPos").append('<option value ="">Seleccione un código postal</option>');

                            if (data.length > 0) {

                                for (i = 0; i < data.length; i++) {
                                    if (data[i]['cp'].length == 4) {
                                        $("#codigPos").append(new Option('0' + data[i]['cp'], '0' + data[i]['cp']));
                                    } else {
                                        for (i = 0; i < data.length; i++) {
                                            $("#codigPos").append(new Option(data[i]['cp'], data[i]['cp']));
                                        }

                                    }
                                }


                            }
                        }
                    });
                } else {
                    $("#ViisualizarPostal").hide();
                }
            }


            function mostrar(id) {
                if (id == "2") {
                    $("#contenedor").show();
                    $("#visualizarRepre").show();
                    $("#representanteL").prop("required", true);
                }
                if (id == "1") {
                    $("#contenedor").show();
                    $("#visualizarRepre").hide();
                    $("#representanteL").removeAttr("required");
                }

            }
        </script>