<!-- START WRAPPER -->
<script type="text/javascript">
    var listadoUsuarios='{<?php for ($i=0;$i<sizeof($usuarios);$i++) {
        echo " \"".$usuarios[$i]['idUsuario']."\": \" ".$usuarios[$i]['correo']." \"";

        if ($i!=sizeof($usuarios)-1) {
            echo ', ';
        }
    } ?>}'
</script>
<div class="wrapper">

    <section id="content">
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="">
            </div>

        </div>
        <!--breadcrumbs end-->
        <!--start container-->
        <div class="container">

            <div class="divider"></div>
            <!--editableTable-->
            <div id="editableTable" class="section">
                <div class="row">
                    <div class="col s11">
                        <h4 class="header">Clientes registrados</h4>

                    </div>
                    <div class="col s1">
                        <div class="col s8 offset-s2">
                            <a class="tooltipped js-video-button" data-video-id='Z90WBJMrias' data-position="left" data-delay="30" data-tooltip="¿Necesitas ayuda?" style="padding: 0px !important;"><i class="medium material-icons">ondemand_video</i></a>
                        </div>
                    </div>
                    <div align="center">
                        <a style="background-color: #023764" class='dropdown-trigger btn'  onclick="loadUrl('Crudclientes/altaCliente')" data-target='dropdown1'>Nuevo Cliente</a>
                    </div>
                    <div class="col s12">
                        <table id="mainTable" class="display">
                            <thead>
                            <tr>
                                <th style="display:none;">id</th>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>A. Paterno</th>
                                <th>A. Materno</th>
                                <th>Teléfono</th>
                                <th>Usuario</th>
                                <th>Datos Fiscales</th>
                                <th>Eliminar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $contador=1;
                            foreach ($Clientes as $kay ) {
                                $idCliente=$kay["idCliente"];
                                $nombreCliente=$kay["nombre"];
                                $apPaterno=$kay["apPaterno"];
                                $apMaterno=$kay["apMaterno"];
                                $telefono=$kay["telefono"];
                                $idU=$kay["Usuario_idUsuario"];
                                $cooreoUser=$kay["correo"];

                                echo "<tr>
										<td style='display:none;'>$idCliente</td>
										<td>$contador</td>
										<td>$nombreCliente</td>
										<td>$apPaterno</td>
										<td>$apMaterno</td>
										<td>$telefono</td>
										<td>$cooreoUser</td>
										<td><a style='background-color: #023764' class='dropdown-trigger btn' onclick=\"loadUrl('Crudclientes/datosFiscalesCliente/$idCliente');\">Ver</a></td>
										<td><a class='btn waves-effect waves-light red'  style='cursor:pointer;' onclick='deleteCliente($idCliente,$idU)'>eliminar</td>
										</tr>";
                                $contador++;
                            }

                            ?>

                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="divider"></div>
            </div>
        </div>
        <!--end container-->
    </section>
</div>
<!-- Modal Structure -->


<script type="text/javascript">
    $("#mainTable").DataTable({
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },   "drawCallback": function (settings) {    $("select[name$='_length']").addClass("browser-default");                   }

    });




    $('#mainTable').Tabledit({
        url: 'http://localhost/panel/index.php/Crudclientes/modificarCliente/',
        editButton: false,
        deleteButton: false,
        hideIdentifier: true,
        columns: {
            identifier: [0, 'idCliente'],
            editable: [[2, 'nombreC'], [3, 'paterno'], [4, 'materno'], [5, 'telefono'],[6, 'nombreUser',JSON.stringify(JSON.parse(listadoUsuarios)) ]]
        }, onFail(jqXHR, textStatus, errorThrown) {
            if(jqXHR['responseText']) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    html: jqXHR['responseText']
                })
            }

        }
    });

    function deleteCliente(idCl,idU)
    {
        Swal.fire({
            title: 'AVISO',
            text: "¿Realmente desea eliminar al cliente?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, deseo eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: '<?= base_url('index.php/Crudclientes/eliminarCliente/') ?>'+idCl+"/"+idU,
                    type:"post",
                    dataType: "HTML",
                    success:function(data){
                        loadUrl('Crudclientes')
                    }, error: function (jqXHR, status, error) {
                        if(jqXHR['responseText']){
                            Swal.fire({
                                'html':jqXHR['responseText'],
                                'title':'Error',
                                'icon':'error'
                            })
                        }
                    }
                })
            }
        })
    }

</script>	
	

	

	

