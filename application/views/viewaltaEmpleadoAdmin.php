<link rel="stylesheet" href="<?= base_url('assets/') ?>css/mstepper.css">
<style>
    .negritas {
        font-weight: bold;
    }
</style>
<div class="container">

    <div class="row">

        <div class="col s12">

            <div class="col s4">
                <h4 class="header">Registro de empleados</h4>
            </div>

        </div>

        <div class="col s12">

            <div class="col s12 ">

                <div class="card-panel">

                    <div class="row">
                        <form id="formulario">
                            <ul class="stepper horizontal">
                                <li class="step">
                                    <div class="step-title waves-effect waves-dark">Paso 1</div>
                                    <div class="step-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="card-title">Ingrese cuantos empleados va a registrar</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 offset-8">
                                                <div class="input-field col s12">

                                                    <input type="text" id="numeroEmpleados" name="numeroEmpleados" oninput="mostrarPaso2()" required />

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 " align="center">
                                            <button id="btnpaso2" name="btnpaso2" style="display:none" class="waves-effect waves-dark btn next-step" onclick="pintarFormulario()">Continuar</button>
                                        </div>
                                    </div>

                                </li>
                                <li class="step">
                                    <div class="step-title waves-effect waves-dark">Paso 2</div>
                                    <div class="step-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="card-title">Ingrese los datos de sus empleados</h4>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" id="empleados">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" align="center">
                                            <button class="waves-effect waves-dark btn next-step" style="display:none" id="btnpaso3" onclick="guardadoLocal()">Continuar</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="step">
                                    <div class="step-title waves-effect waves-dark">Paso 3</div>
                                    <div class="step-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="card-title">Resumen</h4>
                                            </div>
                                            <div class="row">
                                                <table class="table table-bordered table table-hover">
                                                    <thead class="table-primary">
                                                        <tr>
                                                            <th></th>
                                                            <th>Nombre del paquete</th>
                                                            <th>Sueldo</th>
                                                            <th>Nombre completo del empleado</th>
                                                            <th>Total con I.V.A.</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="Resumen" name="Resumen">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <div class="col-md-12" align="center">
                                            <button class="waves-effect waves-dark btn-flat previous-step">Regresar</button>
                                            <button class="waves-effect waves-dark btn next-step">Continuar</button>
                                        </div>
                                    </div>
                                </li>
                                <li class="step">
                                    <div class="step-title waves-effect waves-dark">Paso 4</div>
                                    <div class="step-content">

                                        <div class="row">
                                            <div class="col-md-12">

                                            </div>
                                            <div class="row" style="padding:20px;">
                                                <div class="col-12" style="height: 300px">
                                                    <p class="negritas ">CONTRATO DE ADHESIÓN DE PRESTACIÓN DE SERVICIO DE INTERMEDIACIÓN LABORAL QUE CELEBRAN POR UNA PARTE EL USUARIO DEL SITIO A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ “EL “USUARIO BENEFICIARIO”” Y POR LA OTRA “INFORMÁTICA ESPECIALIZADA DE LA PARRA, S.A. DE C.V.”, A QUIEN EN LO SUCESIVO SE LE DENOMINARÁ “INTERMEDIARIO”, QUIENES SE SUJETAN AL TENOR DE LO SIGUIENTE:</p>
                                                    <p class="negritas ">Declara el “INTERMEDIARIO” por conducto de su representante legal:</p>
                                                    <ul style="list-style: disclosure-closed; padding-left: 2em">
                                                        <li>Ser una sociedad mercantil que se encuentra legalmente constituida y registrada, conforme a las leyes mexicanas, con personalidad y capacidad legal para celebrar este contrato.</li>
                                                        <li>Tener su domicilio en Boulevard Valle Dorado 41-1, Valle Dorado, Tlalnepantla, Estado de México, C.P. 54020</li>
                                                        <li>Que, conforme a su objeto social, tiene la experiencia y conocimientos necesarios para ser “INTERMEDIARIO” de relaciones laborales para el servicio doméstico, de aseo, asistencia y demás propios e inherentes en hogares. Sin embargo, los bienes, así como los recursos financieros, económicos y materiales, provendrán, de manera anticipada, del “USUARIO BENEFICIARIO”.</li>
                                                    </ul>
                                                    <p class="negritas ">Acepta el “USUARIO BENEFICIARIO”:</p>
                                                    <p class="negritas " style="padding-left: 2em">
                                                        <span>1. </span><span style="text-decoration-line: underline">Condiciones del servicio contratado.</span>
                                                    </p>
                                                    <p>
                                                        Será obligación del “USUARIO BENEFICIARIO” pagar la Contraprestación y/o cargos correspondientes aplicables al servicio contratado y cumplir con los términos y condiciones del presente contrato, así como con toda la legislación aplicable.
                                                        Para el cumplimiento efectivo de este contrato, el “INTERMEDIARIO” observará las disposiciones de las Leyes Federal del Trabajo, del Seguro Social, del Instituto del Fondo Nacional de la Vivienda para los Trabajadores, del Impuesto sobre la Renta, sus Reglamentos y demás ordenamientos legales aplicables relacionados con el personal que utilizará para la prestación de los servicios contratados o con las actividades propias del servicio.
                                                    </p>
                                                    <p>
                                                        La vigencia del contrato será la que el “USUARIO BENEFICIARIO” elija dentro de las opciones que la plataforma muestre.
                                                    </p>

                                                    <p class="negritas " style="padding-left: 2em">
                                                        <span>2. </span><span style="text-decoration-line: underline">Información del servicio contratado.</span>
                                                    </p>
                                                    <p>
                                                        El servicio solicitado por el “USUARIO BENEFICIARIO” es precisamente el de Intermediación Laboral, de conformidad con lo dispuesto por la Ley Federal del Trabajo, de la o las personas que el beneficiario designe.
                                                    </p>
                                                    <p>
                                                        Bajo ese concepto, “INTERMEDIARIO” será definido para estos efectos como la persona que contrata o interviene en la contratación de otra u otras para que presten servicios a un patrón.
                                                    </p>
                                                    <p>
                                                        “USUARIO BENEFICIARIO” sería definido como el beneficiario de los servicios y propietario de los bienes materiales necesarios para cumplir con los fines para los cuales se solicita el presente servicio.
                                                    </p>
                                                    <p>
                                                        Bajo este supuesto, la contratación del personal que prestará los servicios al “USUARIO BENEFICIARIO”, correrá por cuenta del “INTERMEDIARIO”, pero con beneficio directo para el “USUARIO BENEFICIARIO”, por lo que en conjunto serán responsables de la relación laboral con el personal contratado hasta la medida en que la Ley Federal del Trabajo disponga. Queda entendido y así se expresa a ambas partes, que las personas que utilicen intermediarios para la contratación de trabajadores serán responsables de las obligaciones que deriven de esta ley y de los servicios prestados.
                                                    </p>
                                                    <p>
                                                        El presente servicio no tiene por objeto menoscabar prestación laboral alguna o disminuir cargas impositivas establecidas en la legislación, sino justamente facilitar la inscripción y registro de trabajadores domésticos al régimen formal.
                                                    </p>
                                                    <p>
                                                        Bajo ese concepto, el “INTERMEDIARIO” será el responsable de cumplir con los aspectos formales de la contratación así como la declaración y entero de impuestos, inscripción y cuotas de seguridad social o cualquiera otra que derive de la prestación del presente servicio.
                                                    </p>
                                                    <p>
                                                        Será responsabilidad del “USUARIO BENEFICIARIO” proporcionar datos ciertos y completos al momento de la contratación del servicio de intermediación, especialmente cuando se contraten servicios de intermediación sin servicio de reclutamiento.
                                                    </p>
                                                    <p class="negritas " style="padding-left: 2em">
                                                        <span>3. </span><span style="text-decoration-line: underline">Servicios Adicionales y servicios proporcionados por terceros.</span>
                                                    </p>
                                                    <p>
                                                        El personal del “INTERMEDIARIO” proporcionará todo el auxilio necesario durante el proceso de contratación y despejará cualquier duda que se le presente antes o incluso después de la contratación del servicio de intermediación, pero de ninguna manera será el “INTERMEDIARIO” responsable de cualquier incidente relacionado con la entrega de información incorrecta.
                                                    </p>
                                                    <p>
                                                        La prestación de servicios adicionales ofrecidos por el “INTERMEDIARIO” y que sean proporcionados por un tercero en la plataforma electrónica de contratación, se regirán conforme a los términos y condiciones de dicho tercero, mismos que se encuentran a la vista del “USUARIO BENEFICIARIO” en la página web de el “INTERMEDIARIO”. En este caso, el “INTERMEDIARIO” actuará exclusivamente como tercero intermediario, limitando su responsabilidad frente al “USUARIO BENEFICIARIO” a la establecida por ley y bajo el principio general de la buena fe.
                                                    </p>
                                                    <p class="negritas " style="padding-left: 2em">
                                                        <span>4. </span><span style="text-decoration-line: underline">Derechos del “USUARIO BENEFICIARIO”.</span>
                                                    </p>
                                                    <ol style="padding-left: 3em" class="listaParentesis">
                                                        <li>
                                                            La información proporcionada por el “USUARIO BENEFICIARIO” se hace de manera confidencial, por lo que no podrá difundirla o transmitirla el “INTERMEDIARIO”, salvo autorización expresa del propio “USUARIO BENEFICIARIO” o por requerimiento de autoridad facultada para ello;
                                                        </li>
                                                        <li>
                                                            La seguridad y confidencialidad de los datos proporcionados por el “USUARIO BENEFICIARIO” estarán a cargo de un tercero especialista en servicios informáticos, quienes se encargarán de la seguridad e inviolabilidad de la información recabada.
                                                        </li>
                                                        <li>
                                                            El “USUARIO BENEFICIARIO” tiene derecho a conocer los términos, condiciones, costos, cargos adicionales y en su caso, formas de pago de los bienes y servicios ofrecidos por el “INTERMEDIARIO”, para lo cual se estará a lo desplegado en la plataforma web de contratación;
                                                        </li>
                                                        <li>
                                                            EL “USUARIO BENEFICIARIO” tiene derecho a recibir los servicios contratados de manera puntual y en términos de calidad que se espera del servicio, siempre limitados a los términos que la legislación disponga.
                                                        </li>
                                                        <li>
                                                            El “USUARIO BENEFICIARIO” tiene derecho a rechazar el envío de publicidad o promociones propias del sitio; sin embargo, deberá recibir aquellas notificaciones propias del servicio de intermediación y que no representan servicios comerciales o de publicidad. Asimismo, el “INTERMEDIARIO” no utilizará estrategias de venta o publicitarias que no proporcionen al consumidor información clara y suficiente sobre los servicios ofrecidos.
                                                        </li>
                                                        <li>
                                                            El “USUARIO BENEFICIARIO” tiene derecho a recibir los recibos por los pagos de los servicios que realice.
                                                        </li>
                                                    </ol>
                                                    <p class="negritas " style="padding-left: 2em">
                                                        <span>5. </span><span style="text-decoration-line: underline">Impuestos y Cargos.</span>
                                                    </p>
                                                    <p>
                                                        Los impuestos, derechos y otros cargos que impongan los gobiernos federal, estatales o municipales, correrán a cargo del “USUARIO BENEFICIARIO”, quien deberá pagarlos íntegramente de manera anticipada, junto con la Contraprestación respectiva, en los términos en que dispongan las leyes, sirviendo únicamente el “INTERMEDIARIO” como agente recolector y responsable de su entero.
                                                    </p>
                                                    <p class="negritas " style="padding-left: 2em">
                                                        <span>6. </span><span style="text-decoration-line: underline">Contraprestación</span>
                                                    </p>
                                                    <p>
                                                        El “INTERMEDIARIO” podrá fijar y modificar libremente las contraprestaciones previo a la contratación del servicio. Una vez contratado el servicio, el “INTERMEDIARIO” respetará el precio pagado y entregará los servicios de intermediación contratados hasta el vencimiento del periodo mensual contratado.
                                                    </p>
                                                    <p>
                                                        Las contraprestaciones se aplicarán de manera no discriminatoria, en igualdad de condiciones para todos los “USUARIO BENEFICIARIO”. En términos de lo señalado en el párrafo anterior y para efecto de ofrecer mayores alternativas de servicios a los “USUARIO BENEFICIARIO”, se establecen 3 tipos de servicios, dependiendo de la necesidad del “USUARIO BENEFICIARIO”:
                                                    </p>
                                                    <ul style="padding-left: 3em">
                                                        <li>NIVEL 1</li>
                                                        <li>NIVEL 2</li>
                                                        <li>NIVEL 3</li>
                                                    </ul>
                                                    <p>
                                                        El “INTERMEDIARIO” pondrá a disposición del público en general las contraprestaciones correspondientes a los servicios que ofrece, tales como de intermediación, reclutamiento y selección, así como los cargos extras que pudieran aplicar, los cuales podrán ser consultados mediante su página de internet.
                                                    </p>
                                                    <p class="negritas " style="padding-left: 2em">
                                                        <span>7. </span><span style="text-decoration-line: underline">Devolución de la Contraprestación pagada</span>
                                                    </p>
                                                    <p>
                                                        El “USUARIO BENEFICIARIO” no podrá solicitar la devolución de la contraprestación pagada en caso de que decida no continuar con la prestación del servicio. Para estos efectos, el “USUARIO BENEFICIARIO” deberá notificar al “INTERMEDIARIO” por escrito la decisión de terminar la prestación del servicio de intermediación, a efecto de realizar los trámites legales que correspondan.
                                                    </p>
                                                    <p class="negritas " style="padding-left: 2em">
                                                        <span>8. </span><span style="text-decoration-line: underline">Denegación o Cancelación del Servicio. </span>
                                                    </p>
                                                    <p>
                                                        El “INTERMEDIARIO” podrá negar o cancelar el servicio de intermediación a aquellos “USUARIO BENEFICIARIO” que se ubiquen en los siguientes supuestos:
                                                    </p>
                                                    <ol style="padding-left: 3em; list-style: lower-alpha">
                                                        <li>
                                                            Por falta de pago de las cuotas mensuales o contraprestación que se deriven del presente contrato.
                                                        </li>
                                                        <li>
                                                            Cuando el “USUARIO BENEFICIARIO”, en cualquier momento profiera amenazas o insultos al personal del “INTERMEDIARIO”, incluyendo al personal contratado mediante intermediación, o cuando adopte una actitud claramente ofensiva.
                                                        </li>
                                                        <li>
                                                            Cuando la Contraprestación, impuestos, derechos y/o cargos aplicables se hubieran cubierto mediante medios fraudulentos o ilegales en perjuicio de el “INTERMEDIARIO”.
                                                        </li>
                                                        <li>
                                                            Por incumplimiento del “USUARIO BENEFICIARIO” a cualquiera de las obligaciones a su cargo que se desprenden del presente contrato, incluyendo la falta de entrega de documentación que sea requerida para el proceso de contratación del presente servicio.
                                                        </li>
                                                    </ol>
                                                    <p>
                                                        De configurarse cualquiera de los supuestos previstos anteriormente, el “INTERMEDIARIO” quedará exento de devolver, reembolsar o compensar la contraprestación pagada por el “USUARIO BENEFICIARIO”, así como de indemnizarlo en modo alguno. Asimismo, el “INTERMEDIARIO” quedará exento de cualquier tipo de responsabilidad por concepto de daños y perjuicios que resulten de la negativa o cancelación del servicio en términos de esta cláusula.
                                                    </p>
                                                    <p>
                                                        El “USUARIO BENEFICIARIO” podrá solicitar en cualquier momento la cancelación o baja del presente servicio de intermediación, para lo cual deberá de dar aviso por escrito al “INTERMEDIARIO” con al menos 5 días antes de los días 15 y último de cada mes. De no hacerse la baja o cancelación del servicio con la anticipación marcada, el “INTERMEDIARIO” no será responsable, y el “USUARIO BENEFICIARIO” deberá pagar, cualquier cantidad entregada en exceso al trabajador con motivo de la falta de aviso oportuno.
                                                    </p>
                                                    <p class="negritas " style="padding-left: 2em">
                                                        <span>9. </span><span style="text-decoration-line: underline">Documentación</span>
                                                    </p>
                                                    <p>
                                                        El “USUARIO BENEFICIARIO” deberá entregar toda la información que el “INTERMEDIARIO” necesite para la contratación del servicio de intermediación, a saber:
                                                    </p>
                                                    <p>
                                                        DEL EMPLEADO A CONTRATAR MEDIANTE SERVICIO DE INTERMEDIACIÓN:
                                                    </p>
                                                    <ol style="list-style: upper-roman; padding-left: 1em">
                                                        <li>Nombre, nacionalidad, edad, sexo, estado civil y domicilio del trabajador y del patrón;</li>
                                                        <li> Si la relación de trabajo es por obra o tiempo determinado;</li>
                                                        <li> El servicio o servicios que deban prestarse, los que se determinarán con la mayor precisión posible; IV. El lugar o los lugares donde debe prestarse el trabajo;</li>
                                                        <li> La duración de la jornada;</li>
                                                        <li> La forma y el monto del salario;</li>
                                                        <li> Otras condiciones de trabajo, tales como días de descanso, vacaciones.</li>
                                                    </ol>
                                                    <p>
                                                        DEL ”USUARIO BENEFICIARIO”
                                                    </p>
                                                    <ol style="padding-left: 3em" class="listaParentesis">
                                                        <li>Nombre(s), Apellido Paterno, Apellido Materno</li>
                                                        <li>Fecha Nacimiento</li>
                                                        <li>RFC</li>
                                                        <li>CURP</li>
                                                        <li>País de nacionalidad</li>
                                                        <li>Actividad económica</li>
                                                        <li>Código postal - Estado Municipio/Delegación - Colonia , Calle, avenida o vía - Número exterior, Número interior</li>
                                                        <li>Copia de identificación oficial</li>
                                                    </ol>
                                                    <p class="negritas " style="padding-left: 2em">
                                                        <span>10. </span><span style="text-decoration-line: underline">Validez del Contenido del Contrato.</span>
                                                    </p>
                                                    <p>
                                                        Aun cuando alguna disposición establecida en este instrumento pudiere quedar invalidada por resolución judicial, las demás disposiciones conservarán su validez y vigencia, y seguirán considerándose de observancia obligatoria para las partes.
                                                    </p>
                                                    <p class="negritas " style="padding-left: 2em">
                                                        <span>11. </span><span style="text-decoration-line: underline">Datos Personales e información confidencial.</span>
                                                    </p>
                                                    <p>
                                                        La información del “USUARIO BENEFICIARIO” que sea recabada por el “INTERMEDIARIO” será protegida y resguardada en estricto apego a la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, de conformidad y con el objeto señalado en el aviso de privacidad que se hace del conocimiento del “USUARIO BENEFICIARIO” al momento de la contratación del servicio y el cual está a disposición del público en general en la página web. Para cumplir con las finalidades previstas en el aviso de privacidad, serán recabados datos personales sensibles, mismos que serán tratados bajo las más estrictas medidas de seguridad que garantice su confidencialidad.
                                                    </p>
                                                    <p class="negritas " style="padding-left: 2em">
                                                        <span>12. </span><span style="text-decoration-line: underline">Objeto de la recolección y salvaguardia de Datos Personales e información confidencial.</span>
                                                    </p>
                                                    <p>
                                                        Sin perjuicio de lo que al respecto señale el aviso de privacidad de el “INTERMEDIARIO”, toda la información de los “USUARIO BENEFICIARIO” que sea recopilada por el “INTERMEDIARIO” sólo se utilizará para los siguientes fines:
                                                    </p>
                                                    <ol style="padding-left: 3em">
                                                        <li>Proporcionar los servicios y productos requeridos.</li>
                                                        <li>Informar al “USUARIO BENEFICIARIO” de cambios nuevos o potenciales en productos o servicios relacionados con los servicios contratados.</li>
                                                        <li>Cumplir nuestras obligaciones acordadas con el “USUARIO BENEFICIARIO”, autoridades y/o clientes.</li>
                                                        <li>Evaluar la calidad de nuestro servicio.</li>
                                                        <li>Realizar entrevistas y/o encuestas por teléfono y/o correo electrónico con el propósito de obtener información que ayude a mejorar el servicio.</li>
                                                        <li>El “USUARIO BENEFICIARIO” acepta y reconoce que, al momento de ingresar su información y utilizar el sitio web de el “INTERMEDIARIO” o de adquirir sus servicios, está aceptando la recopilación y el uso de la información recopilada de conformidad con las leyes aplicables, aviso de privacidad de el “INTERMEDIARIO” y para los fines indicados anteriormente.</li>
                                                    </ol>
                                                    <p class="negritas " style="padding-left: 2em">
                                                        <span>13. </span><span style="text-decoration-line: underline">Limitación de Responsabilidad.</span>
                                                    </p>
                                                    <p>
                                                        El “INTERMEDIARIO” se obliga a prestar al “USUARIO BENEFICIARIO” servicios legales y asistencia gratuita para la atención de cualquier conflicto de carácter laboral relacionado con el servicio de intermediación, hasta su debida conclusión y hasta por el importe correspondiente a 3 meses de sueldo del trabajador cuya contratación se solicitó a través del servicio de intermediación.
                                                    </p>
                                                    <p>
                                                        Sin embargo, el “USUARIO BENEFICIARIO” se obliga a sacar en paz y a salvo al “INTERMEDIARIO” en caso de cualquier reclamación, demanda, conflicto, requerimiento o acción de naturaleza mercantil, civil, penal o de alguna otra en que el “USUARIO BENEFICIARIO” se vea involucrado, con motivo de la ejecución de los servicios contratados con el “INTERMEDIARIO”, siempre que derive de actos u omisiones atribuibles al “USUARIO BENEFICIARIO”.
                                                    </p>
                                                    <p class="negritas " style="padding-left: 2em">
                                                        <span>14. </span><span style="text-decoration-line: underline">Jurisdicción y legislación Aplicables.</span>
                                                    </p>
                                                    <p>
                                                        La Procuraduría Federal del Consumidor es competente en la vía administrativa para resolver cualquier controversia que se suscite sobre la interpretación o cumplimiento del presente contrato. Sin perjuicio de lo anterior, las partes se someten a la jurisdicción de los Tribunales competentes en la Ciudad de México, renunciando expresamente a cualquier jurisdicción que pudiera corresponderles, por razón de sus domicilios presentes o futuros o por cualquier otra razón.
                                                    </p>
                                                    <p>
                                                        En todo lo no previsto por este instrumento, se estará a lo dispuesto por la legislación aplicable.
                                                    </p>
                                                    <br>
                                                    <br>
                                                    <div class="col-md-12 " align="center" style="position: relative; bottom:0px;">

                                                        <input type="checkbox" class="form-check-input" id="aceptarContrato" name="aceptarContrato" onclick="mostrarPaso5()" />
                                                        <label class="form-check-label" for="aceptarContrato">Estoy de acuerdo en adherirme a este contrato</label>

                                                        <br>
                                                        <br>
                                                        <div class="row">
                                                            <button class="waves-effect waves-dark btn next-step" id="btnpaso5" name="btnpaso5" style="display:none" onclick="cargaDatospago()">Continuar</button>
                                                            <button class="waves-effect waves-dark btn-flat previous-step">Regresar</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                        </div>
                                </li>
                                <li class="step">
                                    <div class="step-title waves-effect waves-dark">Paso 5</div>
                                    <div class="step-content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="card-title">Cargar método de pago</h4>
                                            </div>
                                            <div class="row" style="padding:20px;">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ultricies porta lacinia. Nunc vel orci sed ipsum ullamcorper imperdiet sit amet eget nibh. Nunc nibh eros, imperdiet vel condimentum eget, maximus non neque. Praesent faucibus, velit eu varius congue, nibh ligula feugiat ipsum, vitae pharetra dui turpis sed purus. Cras non justo enim. Sed in mauris a erat elementum posuere ut vel est. Donec ornare lobortis nibh, at viverra orci iaculis accumsan. Quisque viverra lobortis enim a cursus. Suspendisse sed mattis magna.</p>
                                                    </div>
                                                </div>
                                                <div class="row" align="center">
                                                    <div class="col-md-3">
                                                        <div class="table-responsive">
                                                            <table style="width:59%; ">
                                                                <tr>
                                                                    <th style="text-align:right">Importe:</th>
                                                                    <td id="Importe"></td>
                                                                    <th style="text-align:right">Fecha:</th>
                                                                    <td id="Fecha"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="text-align:right">Hora:</th>
                                                                    <td id="Hora"></td>
                                                                    <th style="text-align:right">Número de pedido: </th>
                                                                    <td id="npedido"></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="input-field col s6">
                                                        <input id="ntarjeta" name="ntarjeta" placeholder="Número de tarjeta" oninput="validarTarjeta()" required />

                                                        <!-- [formControl]="formulario.controls['numero']" nbInput fullWidth [status] = "(validarTarjeta())? 'basic': ((formulario.controls['numero'].pristine) ? 'basic': 'danger')" -->
                                                    </div>
                                                    <div class="input-field col s6">
                                                        <input id="nttarjeta" name="nttarjeta" placeholder="Nombre del titular de la tarjeta" required />

                                                        <!-- [formControl]="formulario.controls['titular']" nbInput fullWidth status="basic" -->
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field col s4">
                                                        <input id="Mes" name="Mes" placeholder="Mes" oninput="validarExpiracion()" required />

                                                        <!-- [formControl]="formulario.controls['mes']" [status] = "(validarExpiracion())? 'mes': ((formulario.controls['mes'].pristine) ? 'basic': 'danger')" nbInput fullWidth status="basic" -->
                                                    </div>
                                                    <div class="input-field col s4">
                                                        <input id="Anio" name="Anio" placeholder="Año" oninput="validarExpiracion()" required />

                                                        <!-- [formControl]="formulario.controls['anio']" [status] = "(validarExpiracion())? 'basic': ((formulario.controls['anio'].pristine) ? 'basic': 'danger')" nbInput fullWidth status="basic" -->
                                                    </div>
                                                    <div class="input-field col s4">
                                                        <input id="CVC" name="CVC" placeholder="CVC" oninput="validarCVC()" required />

                                                        <!-- [formControl]="formulario.controls['cvc']" [status] = "(validarCVC())? 'basic': ((formulario.controls['cvc'].pristine) ? 'basic': 'danger')" nbInput fullWidth status="basic" -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12" align="center">
                                            <button class="waves-effect waves-dark btn" type="submit" id="btnpagar">pagar</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </form>





                    </div>

                </div>

            </div>

        </div>

    </div>
    <script src="<?= base_url('assets/') ?>js/mstepper.js"></script>
    <script type="text/javascript" src="https://cdn.conekta.io/js/latest/conekta.js"></script>
    <!-- <script>
     
        
        function calcularEdad(fecha) {
            
            fecha = $(this).val();
            var hoy = new Date();
            var cumpleanos = new Date(fecha);
            var edad = hoy.getFullYear() - cumpleanos.getFullYear();
            var m = hoy.getMonth() - cumpleanos.getMonth();
            console.log(m)
            
            if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
                edad--;
            }
            if(edad <18){
                elert('menor de edad');
            }
            // $('#age').val(edad);
            return edad;
             console.log(edad);
        }
    </script> -->
    <script>
        //Deshabilitado de enter en formulario
        $(document).keypress(
            function(event) {
                if (event.which == '13') {
                    event.preventDefault();
                }
            });
        //Deshabilitado de enter en formulario

        //Inicio declaración variables
        tipousuario = <?= $this->session->userdata('tipo') ?>;
        var numEmpleados = $('#numeroEmpleados').val();
        var Grantotal = 0;
        var today = new Date();
        var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
        var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        var Empleados = [];
        var Registros = [];
        var datosPedido = [];
        var datosTarjeta = [];
        var npedido = crearUUID;

        //Codigo del para iniciar stepper
        var stepper = document.querySelector('.stepper');
        var stepperInstace = new MStepper(stepper, {
            // options
            firstActive: 0, // this is the default
            stepTitleNavigation: false
        })
        // fin codigo del stepper


        //Codigo de validaciones
        //---regla para validación de solo caracteres alfabeticos permitiendo solo espacios
        jQuery.validator.addMethod("lettersonly", function(value, element) {
            return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
        }, "Solo se permiten caracteres alfabéticos");
        //fin de regla
        //---regla para validación de solo caracteres alfanumericos permitiendo solo espacios
        jQuery.validator.addMethod("alphanumeric", function(value, element) {
            return this.optional(element) || /^[a-zA-Z 0-9]+$/i.test(value);
        }, "Solo se permiten caracteres alfanuméricos");
        //fin de regla
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
        //fin de regla
        $("#formulario").validate({
            rules: {
                numeroEmpleados: {
                    required: true,
                    digits: true
                },
                ntarjeta: {
                    required: true,
                    minlength: 16,
                    maxlength: 16,
                    digits: true
                },
                nttarjeta: {
                    required: true
                },
                Mes: {
                    required: true,
                    minlength: 2,
                    maxlength: 2,
                    digits: true
                },
                Año: {
                    required: true,
                    minlength: 2,
                    maxlength: 2,
                    digits: true

                },
                CVC: {
                    required: true,
                    minlength: 3,
                    maxlength: 3
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
        jQuery.validator.addClassRules({
            nombreEmpleado: {
                required: true,
                minlength: 3,
                lettersonly: true
            },
            apPaterno: {
                required: true,
                minlength: 3,
                lettersonly: true
            },
            apMaterno: {
                required: true,
                minlength: 3,
                lettersonly: true
            },
            fechaNac: {
                required: true,
                validarEdad: true
            },
            idPa: {
                required: true
            },
            idCl: {
                required: true
            },
            curp: {
                minlength: 18,
                maxlength: 18,
                alphanumeric: true
            },
            direccion: {
                required: true,
                minlength: 4
            },
            telefono: {
                required: true,
                minlength: 10
            },
            rfc: {
                required: true,
                alphanumeric: true,
                minlength: 12,
                maxlength: 13
            },
            seguroE: {
                digits: true,
                minlength: 11
            },
            correoE: {
                required: true,
                email: true
            },
            salarioB: {
                required: true,
                number: true
            },

        });

        //Codigo para mostrar botones
        function mostrarPaso2() {
            numEmpleados = $('#numeroEmpleados').val();
            var numEm = $("#numeroEmpleados");
            if (numEm.valid() == true) {
                $("#btnpaso2").show();
            } else {
                $("#btnpaso2").hide();
            }
        }

        function mostrarPaso3() {
            for (i = 0; i < numEmpleados; i++) {
                var nombreEmpleado = $('#nombreEmpleado' + i);
                var apPaterno = $('#apPaterno' + i);
                var apMaterno = $('#apMaterno' + i);
                var fechaNac = $('#fechaNac' + i);
                var idPa = $('#idPa' + i);
                var idCl = $('#idCl' + i);
                var curp = $('#curp' + i);
                var direccion = $('#direccion' + i);
                var telefono = $('#telefono' + i);
                var rfc = $('#rfc' + i);
                var correoE = $('#correoE' + i);
                var salarioB = $('#salarioB' + i);
            }

            if (
                nombreEmpleado.valid() == true &&
                apPaterno.valid() == true &&
                apMaterno.valid() == true &&
                fechaNac.valid() == true &&
                idPa.valid() == true &&
                idCl.valid() == true &&
                curp.valid() == true &&
                direccion.valid() == true &&
                telefono.valid() == true &&
                rfc.valid() == true &&
                correoE.valid() == true &&
                salarioB.valid() == true
            ) {
                $("#btnpaso3").show();
            } else {
                $("#btnpaso3").hide();
            }
        }

        function mostrarPaso5() {
            element = document.getElementById("btnpaso5");
            check = document.getElementById("aceptarContrato");
            if (check.checked) {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
        }

        //Fin del codigo para mostrar botones
        //validación tarjetas
        function validar() {
            return validarTarjeta() && validarExpiracion() && validarCVC();
        }

        function validarTarjeta() {
            return Conekta.card.validateNumber($('#ntarjeta').val());
        }

        function validarExpiracion() {
            return Conekta.card.validateExpirationDate($('#Mes').val(), $('#Anio').val());
        }

        function validarCVC() {
            return Conekta.card.validateCVC($('#CVC').val());
        }

        function getBrand() {
            const marca = Conekta.card.getBrand($('#ntarjeta').val());
            if (marca == 'unknown') {
                return '';
            }
            return marca;
        }

        //validación tarjetas
        //Fin del codigo de las validaciones


        //Inicio codigo autocompleta


        function establecerAutocomplete(idSeleccionado, elemento) {
            for (i = 0; i < numEmpleados; i++) {

                $("#" + $(elemento).attr("id-autoCompleta")).val(idSeleccionado).trigger('change');
            }
        }
        //Fin codigo autocompleta

        //Codigo check seguro
        function showContent() {
            for (i = 0; i < numEmpleados; i++) {
                element = document.getElementById("visualizarSeguro" + i);
                check = document.getElementById("check" + i);
                if (check.checked) {
                    element.style.display = 'block';
                } else {
                    element.style.display = 'none';
                }
            }
        }
        //Fin Codigo Seguro
        //Funcion Cargar seguro
        function cargarSueldo() {
            for (i = 0; i < numEmpleados; i++) {
                idpac = $('#idPa' + i).val();
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
                            $('#salarioB' + i).val(suel.toFixed(2));
                        }
                    }
                });
            }
        }
        //fin funcion cargar seguro

        //Funcion para pintar formularios 
        function pintarFormulario() {

            $("#empleados").html('');
            for (i = 0; i < numEmpleados; i++) {
                $('#empleados').append('<div class="container" id="Empleado' + i + '">' +
                    '' +

                    '<div class="row">' +

                    '<div class="input-field col s3">' +
                    '<input oninput="mostrarPaso3()" id="nombreEmpleado' + i + '" name="nombreEmpleado' + i + '" class="nombreEmpleado" type="text" required>' +
                    '<label for="nombreEmpleado' + i + '">Nombre del empleado</label>' +
                    '</div>' +
                    '<div class="input-field col s3">' +
                    '<input oninput="mostrarPaso3()" id="apPaterno' + i + '" name="apPaterno' + i + '" class="apPaterno" type="text" required>' +
                    '<label for="apPaterno' + i + '">Apellido paterno</label>' +
                    '</div>' +
                    '<div class="input-field col s3">' +
                    '<input oninput="mostrarPaso3()" id="apMaterno' + i + '" name="apMaterno' + i + '" class="apMaterno" type="text" required>' +
                    '<label for="apMaterno' + i + '">Apellido materno</label>' +
                    '</div>' +
                    '<div class="input-field col s3">' +
                    '<input oninput="mostrarPaso3()" id="fechaNac' + i + '" name="fechaNac' + i + '" type="date" class="fechaNac" required>' +
                    '<label for="fechaNac' + i + '" class="active">Fecha de nacimiento</label>' +
                    '</div>' +
                    '<div class="input-field col s4">' +
                    '<input oninput="mostrarPaso3()" id="curp' + i + '" name="curp' + i + '" type="text" class="curp" >' +
                    '<label for="curp' + i + '">CURP</label>' +
                    '</div>' +

                    '<div class="col s12 m4">' +
                    '<label for="idCl' + i + '">Cliente Ligado</label>' +
                    '<input type="hidden" id="idCl' + i + '" name="idCl' + i + '" onchange="mostrarPaso3()" required>' +
                    '<input type="text" id="nombreCliente' + i + '" id-autoCompleta="idCl' + i + '" >' +
                    '</div>' +

                    '<div class="col s12 m4">' +
                    '<label for="idPa' + i + '">Paquete</label>' +
                    '<select onchange="mostrarPaso3(),cargarSueldo()" class="browser-default" id="idPa' + i + '" name="idPa' + i + '" class="idPa" required>' +
                    '<option value="" disabled selected>Seleccione una opción</option>' +

                    '</select>' +
                    '</div>' +

                    '</div>' +
                    '<div class="row">' +

                    '<div class="input-field col s4">' +
                    '<input oninput="mostrarPaso3()" id="direccion' + i + '" name="direccion' + i + '" type="text" class="direccion" required>' +
                    '<label for="direccion' + i + '">Dirección</label>' +
                    '</div>' +

                    '<div class="input-field col s4">' +
                    '<input oninput="mostrarPaso3()" id="telefono' + i + '" name="telefono' + i + '" type="text" class="telefono" required>' +
                    '<label for="telefono' + i + '">Teléfono</label>' +
                    '</div>' +

                    '<div class="input-field col s4">' +
                    '<input oninput="mostrarPaso3()" id="salarioB' + i + '" name="salarioB' + i + '" type="text" class="salarioB" placeholder="Salario base" required readonly>' +
                    
                    '</div>' +

                    '<div class="form-check col s4">' +
                    '<div class="col offset">' +
                    '<br><input  type="checkbox" class="form-check-input" name="check' + i + '" id="check' + i + '" oninput="showContent(),mostrarPaso3()">' +
                    '<label class="form-check-label" for="check' + i + '">¿Cuenta con número social?</label><br />' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="input-field col s4" id="visualizarSeguro' + i + '" style="display: none;">' +
                    '<input oninput="mostrarPaso3()" id="seguroE' + i + '" name="seguroE' + i + '"  class="seguroE" type="text">' +
                    '<label for="seguroE' + i + '">Seguro social</label>' +
                    '</div>' +

                    '<div class="input-field col s4">' +
                    '<input oninput="mostrarPaso3()" id="correoE' + i + '" name="correoE' + i + '" type="text" class="correoE" required>' +
                    '<label for="correoE' + i + '">Correo electrónico</label>' +
                    '</div>' +

                    '<div class="input-field col s4">' +
                    '<input oninput="mostrarPaso3()" id="rfc' + i + '" name="rfc' + i + '" type="text" class="rfc" required>' +
                    '<label for="rfc' + i + '">RFC</label>' +
                    '</div>' +


                    '</div>' +


                    '<div class="row">' +

                    '<div class="row">' +

                    '<div class="input-field col s12">' +

                    '</div>' +

                    '</div>' +

                    '</div>' +

                    '' +
                    '</div>'
                );
                divider = parseInt(numEmpleados) - i;
                if (divider > 1) {
                    $('#empleados').append(' <div class="row">' +
                        '<div class="divider" style="background-color:black; margin-bottom:10px; height:3px;"></div></div>');
                }

            }
            $.ajax({
                url: "<?= base_url('index.php/Crudempleados/getPaquetes/') ?>",
                type: "post",
                dataType: "JSON",
                success: function(data) {
                    for (i = 0; i < numEmpleados; i++) {
                        $("#idPa" + i).html('');
                        $("#idPa" + i).append('<option value ="">Seleccione un Paquete</option>');
                        if (data.length > 0) {
                            for (ii = 0; ii < data.length; ii++) {
                                $("#idPa" + i).append(new Option(data[ii]['nombreCortopaquete'], data[ii]['idPaquete']));

                            }
                        }
                    }

                }

            })
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
                        for (ii = 0; ii < numEmpleados; ii++) {
                            $("#nombreCliente" + ii).autocomplete2({
                                data: data
                            });
                        }

                    }
                });
                $('input').attr("autocomplete", "new-password");

            });


        }
        //Fin Funcion para pintar Formularios


        //Funcion de guardado en localstorage

        function guardadoLocal() {
            document.getElementById("Resumen").innerHTML = "";
            Empleados = [];
            Registros = [];
            for (i = 0; i < numEmpleados; i++) {

                check = document.getElementById("check" + i);
                if (check.checked) {
                    cuentaSeguro = true;
                } else {
                    cuentaSeguro = false;
                }
                // idCliente:<= $this->session->userdata('idser')?>,
                Registros = {

                    idPaquete: $('#idPa' + i).val(),
                    nombre: $('#nombreEmpleado' + i).val(),
                    apellidoPaterno: $('#apPaterno' + i).val(),
                    apellidoMaterno: $('#apMaterno' + i).val(),
                    fechaNacimiento: $('#fechaNac' + i).val(),
                    cuentaSeguroSocial: cuentaSeguro,
                    curp: $('#curp' + i).val(),
                    idCliente: $('#idCl' + i).val(),
                    direccion: $('#direccion' + i).val(),
                    telefono: $('#telefono' + i).val(),
                    seguroE: $('#seguroE' + i).val(),
                    rfc: $('#rfc' + i).val(),
                    correoE: $('#correoE' + i).val(),
                    salarioB: $('#salarioB' + i).val()

                };
                Empleados.push(Registros);


            }

            // localStorage.setItem('empleados', JSON.stringify(Empleados));
            Grantotal = 0;
            
            Empleados.forEach(function(empleado, i) {

                $.ajax({
                    url: "<?= base_url('index.php/api/Api_Paquetes/getPaquete/') ?>",
                    data: {
                        'id': empleado['idPaquete']
                    },
                    type: "post",
                    dataType: "JSON",
                    async: false,
                    success: function(data) {
                        if (data) {
                            baseMes = parseFloat(data['baseMes']); // sueldo
                            base = parseFloat(data['base']);// salario base
                            costoGestionNomina = parseFloat(data['costoGestionNomina']);
                            costoCobroTarjeta = parseFloat(data['costoCobroTarjeta']);
                            cargaSocial = parseFloat(data['cargaSocial']);


                            // costoCobroTarjeta = parseFloat(data['costoCobroTarejeta']);
                            // cargaSocial = parseFloat(data['cargaSocial']);

                            precioUnitario = base + costoGestionNomina + costoCobroTarjeta+ cargaSocial; // igual a aportacion servicio mes
                            
                            iva = parseFloat(data['iva']);
                            costoTotal = precioUnitario + iva;
                            $('#Resumen').append('<tr id="item' + i + '" name="item' + i + '">' +
                                '<td style="text-align: center;padding: 10px 0px 10px 0px;">' +
                                '<button><i class="fa fa-times" style="color:red"></i></button>' +
                                '</td>' +
                                '<td>' + data['nombreCortopaquete'] + '</td>' +
                                '<td>' + '$ ' + baseMes.toFixed(2) + '</td>' +
                                '<td>' + empleado['nombre'] + ' ' + empleado['apellidoPaterno'] + ' ' + empleado['apellidoMaterno'] + '</td>' +
                                '<td class="text-right">' + '$ ' + costoTotal.toFixed(2) + '</td>' +
                                '</tr>');
                            Grantotal = costoTotal + Grantotal;
                            gT = parseInt(Empleados.length) - i;
                        }

                    }



                });
            });
            $('#Resumen').append("<tr id=\"granTotal\"name=\"granTotal\">" +
                "<td></td>" +
                "<td></td>" +
                "<td></td>" +
                "<th style=\"text-align: right;\">GRAN TOTAL</th>" +
                "<th style=\"text-align: left;\">" + '$ ' + Grantotal.toFixed(2) + "</th>" +
                "</tr>");
        }
        //Fin Funcion de guardado en localstorage
        //Inicio funciones quinto paso
        function crearUUID() {
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, (c) => {
                const r = Math.random() * 16 | 0,
                    v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }
        //Funcion de cargado de datos de pago
        function cargaDatospago() {
            $("#Importe").html('$ ' + Grantotal.toFixed(2));
            $("#Fecha").html(date);
            $("#Hora").html(time);
            $("#npedido").html(npedido);

        }

        //Fin de funcion de cargado de datos de pago
        //Fin funciones quinto Paso

        //inicio funciones Coneckta
        function successResponseHandler() {
            Empleados = [];
            Registros = [];

            // localStorage.removeItem('empleados');

            for (i = 0; i < numEmpleados; i++) {

                check = document.getElementById("check" + i);
                if (check.checked) {
                    cuentaSeguro = true;
                } else {
                    cuentaSeguro = false;
                }
                // idCliente:<= $this->session->userdata('iduser')?>,
                Registros = {

                    idPaquete: $('#idPa' + i).val(),
                    nombre: $('#nombreEmpleado' + i).val(),
                    apellidoPaterno: $('#apPaterno' + i).val(),
                    apellidoMaterno: $('#apMaterno' + i).val(),
                    fechaNacimiento: $('#fechaNac' + i).val(),
                    cuentaSeguroSocial: cuentaSeguro,
                    curp: $('#curp' + i).val(),
                    idCliente: $('#idCl' + i).val(),
                    direccion: $('#direccion' + i).val(),
                    telefono: $('#telefono' + i).val(),
                    seguroE: $('#seguroE' + i).val(),
                    rfc: $('#rfc' + i).val(),
                    correoE: $('#correoE' + i).val(),
                    salarioB: $('#salarioB' + i).val()

                };
                Empleados.push(Registros);
            }

            // localStorage.setItem('empleados', JSON.stringify(Empleados));
        }


        //Codigo Submit
        $("#formulario").submit(function(e) {

            //Config Coneckta
            Conekta.setPublicKey('key_ErForTEq3ryTUoq8ThUzYCg');
            Conekta.setLanguage("es");
            //Fin Config Coneckta
            e.preventDefault();
            $('#btnpagar').disabled = true;
            datosPedido = {
                Importe: Grantotal,
                Fecha: date,
                Hora: time,
                pedido: npedido
            }
            let contadorToken = 0;
            let Empleados = [];

            var successResponseHandler = function(token) {

                check = document.getElementById("check" + contadorToken);
                if (check.checked) {
                    cuentaSeguro = true;
                    CSeguro = 1;
                    valSeguro =$('#seguroE' + contadorToken).val();
                } else {
                    cuentaSeguro = false;
                    CSeguro = 0;
                    valSeguro= 0;
                }
                // idCliente:<= $this->session->userdata('iduser')?>,
                let Registros = {
                    idPaquete: $('#idPa' + contadorToken).val(),
                    nombre: $('#nombreEmpleado' + contadorToken).val(),
                    apellidoPaterno: $('#apPaterno' + contadorToken).val(),
                    apellidoMaterno: $('#apMaterno' + contadorToken).val(),
                    fechaNacimiento: $('#fechaNac' + contadorToken).val(),
                    cuentaSeguroSocial: CSeguro,
                    token: token['id'], // puede estar mal esto
                    curp: $('#curp' + contadorToken).val(),
                    Cliente_idCliente: $('#idCl' + contadorToken).val(),
                    direccionEmpleado: $('#direccion' + contadorToken).val(),
                    telefonoEmpleado: $('#telefono' + contadorToken).val(),
                    seguro: valSeguro,
                    rfc: $('#rfc' + contadorToken).val(),
                    correoEmpleado: $('#correoE' + contadorToken).val(),
                    salarioBase: $('#salarioB' + contadorToken).val()
                };

                Empleados.push(Registros);
                console.log(JSON.stringify(Empleados));
                contadorToken++;
                console.log(contadorToken);
                console.log(numEmpleados);
                if (contadorToken == numEmpleados) {
                    const formData = new FormData();
                    formData.append('empleados', JSON.stringify(Empleados));
                    formData.append('jwt', JWT);
                    formData.append('Admin', 1);
                    $.ajax({
                        url: '<?= base_url('index.php/api/ApiConekta/registrarEmpleados/') ?>',
                        data: formData,
                        contentType: false,
                        processData: false,
                        type: 'POST',
                        dataType: 'html',
                        success: function(data) {
                            Swal.fire({
                                title: 'Éxito',
                                html: data['message'],
                                icon: 'success'
                            })
                            loadUrl('Crudempleados')
                        }
                    });
                }



            };
            var errorResponseHandler = function(error) {
                // Do something on error
                console.log(JSON.stringify(error, null, 4));
                this.pagando = false;
            };
            const tokenParams = {
                card: {
                    number: $('#ntarjeta').val(),
                    name: $('#nttarjeta').val(),
                    exp_year: $('#Anio').val(),
                    exp_month: $('#Mes').val(),
                    cvc: $('#CVC').val()
                }
            };
            if (validar()) {
                for (i = 0; i < numEmpleados; i++) {
                    const formDataToken = new FormData();
                    formDataToken.append('idUsuario', $('#idCl' + i).val())
                    $.ajax({
                        url: '<?= base_url('index.php/Crudempleados/generarjtw/') ?>',
                        data: formDataToken,
                        contentType: false,
                        processData: false,
                        type: 'POST',
                        dataType: 'JSON',
                        success: function(data) {
                            JWT = data['jwt'];

                            Conekta.Token.create(tokenParams, successResponseHandler, errorResponseHandler);

                        }
                    });
                }
            }


        });

        // Fin Codigo Submit


        //Fin funciones Conekta
    </script>