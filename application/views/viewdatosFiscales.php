<div class="container">

    <div class="row">

        <div class="col s12">

            <div class="col s4">
                <?php if ($this->session->userdata('tipo') == 2) { ?>
                    <h4 class="header">Edición de Datos Fiscales </h4>
                <?php } else { ?>
                    <h4 class="header">Edición de datos fiscales de: <?php echo $Nombre['clientenombre'] . ' ' . $Nombre['clientepaterno'] . ' ' . $Nombre['clientematerno'] ?> </h4>
                <?php } ?>
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

                <div class="col s3 offset-s10">

                    <a class='dropdown-trigger btn' href="#" onclick="loadUrl('Crudclientes/datosFiscalesCliente/<?php echo $idCliente; ?>')" data-target='dropdown1'>Regresar</a>

                </div>

                <div class="col s12">
                    <div class="col s12 ">
                        <div class="card-panel">
                            <div class="row">
                                <form id="formulario">
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
                                            <input type="hidden" id="idCliente" name="idCliente" value="<?php echo $idCliente; ?>">
                                            <input type="hidden" id="idDatosFacturacion" name="idDatosFacturacion" value="<?php echo $idDatosFacturacion; ?>">
                                            <input id="caFiscal" name="caFiscal" type="text" required>
                                            <label for="caFiscal">Calle fiscal</label>
                                        </div>
                                        <div class="input-field col s3">
                                            <input id="numExte" name="numExte" type="text" required>
                                            <label for="numExte">Número Exterior </label>
                                        </div>
                                        <div class="input-field col s3">
                                            <input id="numInte" name="numInte" type="text" required>
                                            <label for="numInte">Número Interior</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col s12 m3">
                                            <label for="idEdo">Estado</label>
                                            <select class="browser-default" id="idEdo" name="idEdo" onchange="getMuncipio()" required="">
                                                <option value="" selected="">Seleccione un estado</option>
                                                <?php
                                                foreach ($edo as $key) {
                                                    $idEdo = $key["id_Estado"];
                                                    $nombreEstado = $key["nombreEstado"];
                                                    echo "<option value='$idEdo'>$nombreEstado</option>";
                                                }

                                                ?>
                                            </select>
                                        </div>
                                        <div class="col s12 m3" id="visualizarMuni" style="display: none;">
                                            <label for="idEdo">Municipio</label>
                                            <select class="browser-default" id="municipioFis" name="municipioFis" onchange="getRegiones()" required="">
                                                <option value="" selected="">Seleccione un municipio</option>
                                            </select>
                                        </div>
                                        <div class="col s12 m3" id="visualizarColo" style="display: none;">
                                            <label for="idEdo">Colonia</label>
                                            <select class="browser-default" id="coloniaFis" name="coloniaFis" onchange="getCodigoPostal()" required="">
                                                <option value="" selected="">Seleccione una colonia</option>
                                            </select>
                                        </div>
                                        <div class="col s12 m3" id="ViisualizarPostal" style="display: none;">
                                            <label for="idEdo">Código postal</label>
                                            <select class="browser-default" id="codigPos" name="codigPos" required="">
                                                <option value="" selected="">Seleccione un código postal</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s4">
                                            <input id="correoFiscal" name="correoFiscal" type="text" required>
                                            <label for="correoFiscal">Correo</label>
                                        </div>
                                        <div class="input-field col  s4">
                                            <input id="telFiscal" name="telFiscal" type="text" required>
                                            <label for="telFiscal">Teléfono</label>
                                        </div>
                                        <div class="col  s4">
                                            <label for="cfdi">USO CFDI</label>
                                            <select class="browser-default" id="cfdi" name="cfdi" onchange="">
                                                
                                                <?php
                                                foreach ($catCFDI as $key) {
                                                    $codigo = $key["codigo"];
                                                    $descripcion = $key["descripcion"];
                                                    echo "<option value='$codigo' >$descripcion</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6" id="visualizarRepre">
                                            <input id="representanteL" name="representanteL" type="text">
                                            <label for="representanteL">Representante legal</label>
                                        </div>
                                    </div>

                                    <div class="row" id="visualizarActualiza">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button form="otroForm" class="btn  waves-effect waves-light right" type="submit" name="action" onclick="actualizaDatos()">Actualizar
                                                    <i class="material-icons right">send</i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="visualizarGuardar" style="display: none;">
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
                            minlength:3,
                            maxlength:100
                        },
                        rfcSocial: {
                            required: true,
                            minlength:12,
                            maxlength:13


                        },
                        caFiscal: {
                            required: true,
                            
                        },
                        numExte: {
                            required: true,
                        },
                        idEdo: {
                            required: true,
                            digits: true
                        },
                        municipioFis: {
                            required: true,
                            minlength: 3
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
                var idE = "";
                var idMu = "";
                var idColo = "";
                var cpp = "";
                $(document).ready(function() {
                    //$('select').material_select();
                    $("label").attr("class", "active");
                    $.ajax({
                        url: '<?= base_url('/index.php/Crudclientes/obtenerDatosFiscales/' . $idDatosFacturacion) ?>',
                        dataType: 'JSON',
                        type: 'POST',
                        //data: { [csrfName]: csrfHash},
                        success: function(proyecto) {
                            if (proyecto == null) {
                                $("#visualizarGuardar").show();
                            } else {
                                $("#tipoPer").val(proyecto['tipoPersona'])
                                $("#RSocial").val(proyecto['razonSocial']);
                                $("#rfcSocial").val(proyecto['rfc']);
                                $("#caFiscal").val(proyecto['calle']);
                                $("#numExte").val(proyecto['noExt']);
                                $("#numInte").val(proyecto['noInt']);
                                $("#idEdo").val(proyecto['id_Estado']);
                                $("#correoFiscal").val(proyecto['correoFiscal']);
                                $("#cfdi").val(proyecto['Usocfdi']);
                                $("#telFiscal").val(proyecto['telefonoFiscal']);
                                $("#representanteL").val(proyecto['representanteLegal']);
                                idE = proyecto['id_Estado'];
                                idMu = proyecto['municipio'];
                                idColo = proyecto['colonia'];
                                cpp = proyecto['cp'];
                                idtipop = proyecto['tipoPersona'];
                                //$("#codigPos").val(proyecto['cp']);
                                $("#visualizarActualiza").show();
                            }
                        },
                        complete: function() {
                            getMuncipioDos(idE);
                            getRegionesDo(idMu);
                            getCodigoPostalDos(idColo);
                            validar(idtipop);
                        },
                       

                    });
                });
                $("#formulario").validate({
                    rules: {
                        RSocial: {
                            required: true,
                            minlength:3,
                            maxlength:100
                        },
                        rfcSocial: {
                            required: true,
                            minlength:12,
                            maxlength:13
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
                            minlength:10
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

                function validar(tipop) {
                    if (tipop == 1) {
                        $('#visualizarRepre').hide();
                        $("#representanteL").removeAttr("required");
                    } else {
                        $('#visualizarRepre').show();
                        $("#representanteL").prop("required", true);
                    }

                }

                function actualizaDatos() {
                    var idCl = $("#idCliente").val();
                    var idDatosFacturacion = $("#idDatosFacturacion").val();
                    var tipoPer = $("#tipoPer").val();
                    var RSocial = $("#RSocial").val();
                    var rfcSocial = $("#rfcSocial").val();
                    var caFiscal = $("#caFiscal").val();
                    var numExte = $("#numExte").val();
                    var numInte = $("#numInte").val();
                    var coloniaFis = $("#coloniaFis").val();
                    var municipioFis = $("#municipioFis").val();
                    var codigPos = $("#codigPos").val();
                    var correoFiscal = $("#correoFiscal").val();
                    var cfdi = $("#cfdi").val();
                    var telFiscal = $("#telFiscal").val();
                    var representanteL = $("#representanteL").val();



                    var parametros = {
                        "tipoPer": tipoPer,
                        "RSocial": RSocial,
                        "rfcSocial": rfcSocial,
                        "caFiscal": caFiscal,
                        "numExte": numExte,
                        "numInte": numInte,
                        "coloniaFis": coloniaFis,
                        "municipioFis": municipioFis,
                        "codigPos": codigPos,
                        "correoFiscal": correoFiscal,
                        "cfdi": cfdi,
                        "telFiscal": telFiscal,
                        "representanteL": representanteL,
                        "idCl": idCl,
                        "idDatosFacturacion": idDatosFacturacion
                    }

                    if (coloniaFis != "" && municipioFis != "" && codigPos != "") {

                        $.ajax({
                            url: '<?= base_url('/index.php/Crudclientes/actualizarDatosFiscales/') ?>',
                            dataType: 'html',
                            type: 'POST',
                            data: parametros,
                            success: function(proyecto) {
                                Swal.fire({
                                    title: 'Éxito',
                                    html: 'Se guardaron los datos de facturación',
                                    icon: 'success'
                                });
                                loadUrl('Crudclientes/datosFiscalesCliente/<?= $idCliente ?>')
                            },
                            error (jqXHR, status, error) {
                    console.log(jqXHR);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        html: jqXHR['responseText']
                    })
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

                function getMuncipio() {
                    if ($("#idEdo").val() != "") {
                        $.ajax({
                            url: '<?= base_url('/index.php/Crudclientes/getMuni/') ?>' + $("#idEdo").val(),
                            type: "post",
                            dataType: "JSON",
                            success: function(data) {
                                $("#visualizarMuni").show();
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
                        $("#visualizarMuni").hide();
                        $("#visualizarColo").hide();
                        $("#ViisualizarPostal").hide();
                    }
                }

                function getMuncipioDos(idE) {

                    if (idE != "") {
                        $.ajax({
                            url: '<?= base_url('/index.php/Crudclientes/getMuni/') ?>' + idE,
                            type: "post",
                            dataType: "JSON",
                            success: function(data) {
                                $("#visualizarMuni").show();
                                $("#municipioFis").html('');
                                $("#municipioFis").append('<option value ="">Seleccione un Municipio</option>');
                                if (data.length > 0) {
                                    for (i = 0; i < data.length; i++) {
                                        $("#municipioFis").append(new Option(data[i]['nombreMunicipio'], data[i]['idMunicipio']));
                                    }
                                    $("#municipioFis").val(idMu);

                                }
                            }
                        });
                    } else {
                        $("#visualizarMuni").hide();
                    }
                }

                function getRegiones() {

                    if ($("#municipioFis").val() != "") {
                        $.ajax({
                            url: '<?= base_url('/index.php/Crudclientes/getColo/') ?>' + $("#municipioFis").val(),
                            type: "post",
                            dataType: "JSON",
                            success: function(data) {
                                $("#visualizarColo").show();
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
                        $("#visualizarColo").hide();
                        $("#ViisualizarPostal").hide();
                    }
                }

                function getRegionesDo(idMus) {

                    if (idMus != "") {
                        $.ajax({
                            url: '<?= base_url('/index.php/Crudclientes/getColo/') ?>' + idMus,
                            type: "post",
                            dataType: "JSON",
                            success: function(data) {
                                $("#visualizarColo").show();
                                $("#coloniaFis").html('');
                                $("#coloniaFis").append('<option value ="">Seleccione una colonia</option>');
                                if (data.length > 0) {
                                    for (i = 0; i < data.length; i++) {
                                        $("#coloniaFis").append(new Option(data[i]['nombreRegion'], data[i]['idRegiones']));
                                    }
                                    $("#coloniaFis").val(idColo);
                                }
                            }
                        });
                    } else {
                        $("#visualizarColo").hide();
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
                                        $("#codigPos").append(new Option(data[i]['cp'], data[i]['cp']));
                                    }
                                }
                            }
                        });
                    } else {
                        $("#ViisualizarPostal").hide();
                    }
                }

                function getCodigoPostalDos(idC) {
                    if (idC != "") {
                        $.ajax({
                            url: '<?= base_url('/index.php/Crudclientes/getCodigo/') ?>' + idC,
                            type: "post",
                            dataType: "JSON",
                            success: function(data) {
                                $("#ViisualizarPostal").show();
                                $("#codigPos").html('');
                                $("#codigPos").append('<option value ="">Seleccione una colonia</option>');
                                if (data.length > 0) {
                                    for (i = 0; i < data.length; i++) {
                                        $("#codigPos").append(new Option(data[i]['cp'], data[i]['cp']));
                                    }
                                    $("#codigPos").val(cpp);
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
                    }
                    if (id == "1") {
                        $("#contenedor").show();
                        $("#visualizarRepre").hide();
                    }
                }
                
            </script>