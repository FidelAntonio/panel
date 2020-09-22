<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="col s4">
                <h4 class="header">Nuevo paquete</h4>
            </div>
        </div>
        <div class="col s3 offset-s10">
            <a class='btn' onclick="loadUrl('Crudpaquetes/')">Regresar</a>
        </div>
        <div class="col s12">
            <div class="col s12 ">
                <div class="card-panel">
                    <div class="row sum">
                        <form id="formulario">
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="nombrePaquete" name="nombrePaquete" type="text" required>
                                    <label for="nombrePaquete">Nombre completo del paquete</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="nombrecortoP" name="nombrecortoP" type="text" required>
                                    <label for="nombrecortoP">Nombre corto del paquete</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <textarea rows="4" id="descripcion" name="descripcion" class="materialize-textarea"></textarea><label for="descripcion">Descripción</label>
                                </div>
                                <div class="input-field col s6">
                                    <textarea rows="4" id="caracteristicas" name="caracteristicas" class="materialize-textarea"></textarea><label for="caracteristicas">Características</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4 ">
                                    <input id="base" class="monto" onkeyup="sumar()" name="base" type="text" required>
                                    <label for="base">Salario base</label>
                                </div>
                                <div class="input-field col s4">
                                    <input id="costoGestion" class="monto" onkeyup="sumar()" name="costoGestion" type="text" required>
                                    <label for="costoGestion">+Costo gestión nómina</label>
                                </div>
                                <div class="input-field col s4">
                                    <input id="costoCobro" class="monto" onkeyup="sumar()" name="costoCobro" type="text" required>
                                    <label for="costoCobro">+Costo Cobro Tarjeta (Comisión Banco)</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s3">
                                    <input id="cargaSocial" class="monto" onkeyup="sumar()" name="cargaSocial" type="text" required>
                                    <label for="cargaSocial">+Carga social</label>
                                </div>
                                <div class="col s3">
                                    <label for="precioMes">=Aportación servicio mes</label>
                                    <input id="precioMes" name="precioMes" class="granTotal" onkeyup="sumar()" type="text" required readonly>
                                </div>
                                <div class="input-field col s3">
                                    <input type="text" id="iva" class="granTotal" onkeyup="sumar()" name="iva" required>
                                    <label for="iva">+IVA</label>
                                </div>
                                <div class="col s3">
                                    <label for="totalFac">=Gran total</label>
                                    <input id="totalFac" name="totalFac" type="text" placeholder="" required readonly>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 text center">
                                    <h5>TOTAL QUE PERCIBE EL TRABAJADOR MENSUAL</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s4">
                                    <input id="baseMes" name="baseMes" type="text" required>
                                    <label for="baseMes">Sueldo integrado</label>
                                </div>
                                <div class="input-field col s4">
                                    <input id="deducciones" name="deducciones" type="text" required>
                                    <label for="deducciones">Deducciones</label>
                                </div>
                                <div class="input-field col s4">
                                    <input id="netoR" name="netoR" type="text" required>
                                    <label for="netoR">Neto a recibir</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="aforeM" name="aforeM" type="text" required>
                                    <label for="aforeM">Afore mensual</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="aguinaldoA" name="aguinaldoA" type="text" required>
                                    <label for="aguinaldoA">Aguinaldo anual</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn  waves-effect waves-light right" type="submit" name="action">Guardar
                                        <i class="material-icons right">send</i>
                                    </button>
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
                nombrePaquete: {
                    required: true,
                    minlength: 3,
                    maxlength: 100
                },
                nombrecortoP: {
                    required: true,
                    minlength: 2,
                    maxlength: 100
                },
                descripcion: {
                    minlength: 3
                },
                caracteristicas: {
                    minlength: 3
                },
                base: {
                    required: true,
                    number: true,
                    min: 0.01
                },
                baseMes: {
                    required: true,
                    number: true,
                    min: 0.01
                },
                costoGestion: {
                    required: true,
                    number: true,
                    min: 0.01
                },
                costoCobro: {
                    required: true,
                    number: true,
                    min: 0.01
                },
                cargaSocial: {
                    required: true,
                    number: true,
                    min: 0.01
                },
                precioMes: {
                    required: true,
                    number: true,
                    min: 0.01
                },
                iva: {
                    required: true,
                    number: true,
                    min: 0.01
                },
                totalFac: {
                    required: true,
                    number: true,
                    min: 0.01
                },
                deducciones: {
                    required: true,
                    number: true,

                },
                netoR: {
                    required: true,
                    number: true,
                    min: 0.01
                },
                aforeM: {
                    required: true,
                    number: true,
                    min: 0.01
                },
                aguinaldoA: {
                    required: true,
                    number: true,
                    min: 0.01
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
            formData = new FormData(document.getElementById("formulario"));
            $.ajax({
                url: '<?= base_url('index.php/Crudpaquetes/newPaquetes') ?>',
                data: formData,
                contentType: false,
                processData: false,
                type: 'POST',
                dataType: 'html',
                success: function(data) {
                    Swal.fire({
                        title: 'Éxito',
                        html: 'Se guardó el paquete',
                        icon: 'success'
                    });
                    loadUrl('Crudpaquetes')
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
        });
    </script>
    <script>
        function sumar() {

            var total = 0;
            var granTotal = 0;

            $(".monto").each(function() {

                if (isNaN(parseFloat($(this).val()))) {

                    total += 0;

                } else {

                    total += parseFloat($(this).val());

                }

            });
            $("#precioMes").val(total);
            $(".granTotal").each(function() {
                if (isNaN(parseFloat($(this).val()))) {
                    granTotal += 0;
                } else {
                    granTotal += parseFloat($(this).val());
                }
            });
            $("#totalFac").val(granTotal);


            //alert(total);
            // document.getElementById('totalFac').innerHTML = total;

        }
    </script>