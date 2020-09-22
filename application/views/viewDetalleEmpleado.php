<div class="container">

    <div class="row">

        <div class="col s12">

            <div class="col s4"><h4 class="header">Detalle empleado</h4></div>

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
                                <input id="fechaNac" name="fechaNac" type="date" required readonly>
                                <label for="fechaNac" class="active">Fecha de nacimiento</label>
                            </div>
                             <div class="input-field col s4">
                                <input id="curp" name="curp" type="text" required readonly>
                                <label for="curp">CURP</label>
                            </div>
                             <div class="input-field col s4">
                                <input id="cliente" name="cliente" type="text" required readonly>
                                <label for="cliente">Cliente ligado</label>
                            </div>
                             <div class="input-field col s4">
                                <input id="paquete" name="paquete" type="text" required readonly>
                                <label for="paquete">Paquete</label>
                            </div>                                                        
                            <div class="input-field col s4">
                                <input id="direccion" name="direccion" type="text" required readonly>
                                <label for="direccion">Dirección</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="telefono" name="telefono" type="text" required readonly>
                                <label for="telefono">Teléfono</label>
                            </div>
                            <div class="input-field col s4">
                                <input id="salarioB" name="salarioB" type="text" required readonly>
                                <label for="salarioB">Salario base</label>
                            </div>     
                             <div class="input-field col s4" id="visualizarSeguro">
                                <input id="seguroE" name="seguroE" type="text" required readonly>
                                <label for="seguroE">Seguro</label>
                            </div>
                             <div class="input-field col s4" id="visualizarCorreo">
                                <input id="correoE" name="correoE" type="text" required readonly>
                                <label for="correoE">Correo electrónico</label>
                            </div>

                            <div class="input-field col s4" id="visualizarRfc">
                                <input id="rfc" name="rfc" type="text" required readonly>
                                <label for="rfc">RFC</label>
                            </div>                                                 

                        </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        
	$(document).ready(function(){
        $("label").attr("class","active");
        $.ajax({
            url:'<?=base_url('/index.php/Crudempleados/obtenerDetalleEmpleado/'.$idEmpleado)?>',
            dataType: 'JSON',
            type: 'POST',
            success: function(proyecto)
             {
                   if (proyecto==null)
                    {
                        $("#visualizarGuardar").show();
                    }else{
                suel=parseFloat(proyecto['salarioBase']);
                $("#nombreEmpleado").val(proyecto['nombre']);
                $("#apPaterno").val(proyecto['apPaterno']);
                $("#apMaterno").val(proyecto['apMaterno']);
                $("#fechaNac").val(proyecto['nacimiento']);
                $("#seguroE").val(proyecto['seguro']);
                $("#cliente").val(proyecto['nombreCliente']);
                $("#paquete").val(proyecto['nombrePaquete']);
                $("#curp").val(proyecto['curp']);
                $("#direccion").val(proyecto['direccionEmpleado']);
                $("#telefono").val(proyecto['telefonoEmpleado']);
                $("#correoE").val(proyecto['correoEmpleado']);
                $("#rfc").val(proyecto['rfc']);
                $("#salarioB").val(suel.toFixed(2));
                seguro=proyecto['seguro'];
                correo=proyecto['correoEmpleado'];
                rfc=proyecto['rfc'];
            }
        }, complete:function(){
                    validarSeguro(seguro);
                    validarCorreo(correo);
                    validarRfc(rfc);
                }

        });

    });

    function validarSeguro(seguro) {
  if (seguro.length==0) {
    $('#visualizarSeguro').hide();
  }else{
    $('#visualizarSeguro').show();
  }

}

 function validarCorreo(correo) {

  if (correo.length==0) {
    $('#visualizarCorreo').hide();
  }else{
    $('#visualizarCorreo').show();
  }

}

function validarRfc(rfc) {
  if (rfc.length==0) {
    $('#visualizarRfc').hide();
  }else{
    $('#visualizarRfc').show();
  }

}        
    </script>



