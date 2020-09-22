<div class="container">

    <div class="row">

        <div class="col s12">

            <div class="col s4">
                <h4 class="header">Detalle del paquete</h4>
            </div>

        </div>

        <div class="col s3 offset-s10">

            <a class='dropdown-trigger btn' href="#" onclick="loadUrl('Crudpaquetes/')" data-target='dropdown1'>Regresar</a>

        </div>

        <div class="col s12">

            <div class="col s12 ">

                <div class="card-panel">

                    <div class="row">


                        <form id="formulario">

                            <div class="row">

                                <div class="input-field col s6">
                                    <input readonly="readonly" id="nombrePaquete" name="nombrePaquete" type="text" required>
                                    <label for="nombrePaquete">Nombre del paquete</label>
                                </div>
                                <div class="input-field col s6">
                                    <input readonly="readonly" id="nombrecortoP" name="nombrecortoP" type="text" required>
                                    <label for="nombrecortoP">Nombre corto del paquete</label>
                                </div>

                                <div class="input-field col s6">
                                    <!--<label for="descripcion"> Descripción</label>-->
                                    <textarea readonly="readonly" rows="4" id="descripcion" name="descripcion" class="materialize-textarea" placeholder="Descripción"></textarea><label for="textarea1">Descripción</label>
                                </div>
                                <div class="input-field col s6">
                                    <textarea readonly="readonly" rows="4" id="caracteristicas" name="caracteristicas" class="materialize-textarea" placeholder="Características"></textarea><label for="textarea1">Características</label>
                                </div>
                                <div class="input-field col s4">
                                    <input readonly="readonly" id="base" name="base" type="text" required>
                                    <label for="base">Salario base</label>
                                </div>
                                
                                <div class="input-field col s4">
                                    <input readonly="readonly" id="costoGestion" name="costoGestion" type="text" required>
                                    <label for="costoGestion">+Costo Gestión Nómina </label>
                                </div>
                                <div class="input-field col s4">
                                    <input readonly="readonly" id="costoCobro" name="costoCobro" type="text" required>
                                    <label for="costoCobro">+Costo Cobro Tarjeta (Comisión Banco)</label>
                                </div>
                                <div class="input-field col s3">
                                    <input   readonly="readonly" id="cargaSocial" name="cargaSocial" type="text" required>
                                    <label for="cargaSocial">+Carga social</label>
                                </div>
                                <div class="input-field col s3">
                                    <input readonly="readonly" id="precioMes" name="precioMes" type="text" required>
                                    <label for="precioMes">=Aportación Servicio Mes</label>
                                </div>
                                <div class="input-field col s3">
                                    <input readonly="readonly" id="iva" name="iva" type="text" required>
                                    <label for="iva">+IVA</label>
                                </div>
                                <div class="input-field col s3">
                                    <input readonly="readonly" id="totalFac" name="totalFac" type="text" required>
                                    <label for="totalFac">=Gran total</label>
                                </div>
                                <div class="row">
                                    <div class="col s12 text center">
                                        <h5>TOTAL QUE PERCIBE EL TRABAJADOR MENSUAL</h5>
                                    </div>
                                </div>
                                <div class="input-field col s4">
                                    <input readonly="readonly" id="baseMes" name="baseMes" type="text" required>
                                    <label for="baseMes">Sueldo integrado</label>
                                </div>
                                <div class="input-field col s4">
                                    <input readonly="readonly" id="deducciones" name="deducciones" type="text" required>
                                    <label for="deducciones">Deducciones</label>
                                </div>
                                <div class="input-field col s4">
                                    <input readonly="readonly" id="netoR" name="netoR" type="text" required>
                                    <label for="netoR">Neto a recibir</label>
                                </div>
                                <div class="input-field col s6">
                                    <input readonly="readonly" id="aforeM" name="aforeM" type="text" required>
                                    <label for="aforeM">Afore mensual</label>
                                </div>
                                <div class="input-field col s6">
                                    <input readonly="readonly" id="aguinaldoA" name="aguinaldoA" type="text" required>
                                    <label for="aguinaldoA">Aguinaldo anual</label>
                                </div>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        $(document).ready(function() {
            $("label").attr("class", "active");
            $.ajax({
                url: '<?= base_url('/index.php/Crudpaquetes/obtenerDetallePaquete/' . $idPaquete) ?>',
                dataType: 'JSON',
                type: 'POST',
                success: function(proyecto) {
                    $("#nombrePaquete").val(proyecto['nombre']);
                    $("#nombrecortoP").val(proyecto['nombreCortopaquete']);
                    $("#descripcion").val(proyecto['descripcion']);
                    $("#caracteristicas").val(proyecto['caracteristicas']);
                    $("#base").val(proyecto['base']);
                    $("#baseMes").val(proyecto['baseMes']);
                    $("#costoGestion").val(proyecto['costoGestionNomina']);
                    $("#costoCobro").val(proyecto['costoCobroTarjeta']);
                    $("#cargaSocial").val(proyecto['cargaSocial']);
                    $("#precioMes").val(proyecto['precioServMes']);
                    $("#iva").val(proyecto['iva']);
                    $("#totalFac").val(proyecto['totalFact']);
                    $("#deducciones").val(proyecto['deduccionesT']);
                    $("#netoR").val(proyecto['netoRecibir']);
                    $("#aforeM").val(proyecto['aforeMensual']);
                    $("#aguinaldoA").val(proyecto['aguinaldoAnual']);
                }

            });

        });
    </script>