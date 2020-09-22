<?php


class ApiConekta extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        header('Access-Control-Allow-Origin: *'); // permite CORS desde un dominio. Cambiar el * por el dominio.
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Content-Type: application/json; charset=UTF-8'); // La API siempre responderá en JSON.
        $this->load->model("ConektaBridge");
    }
    function registrarEmpleados() {
        $this->load->model("WebToken");
        $this->load->model("Empleados");
        $this->load->model("Usuarios");
        $this->load->model("Clientes");
        $this->load->model("Paquetes");
        $this->load->model("Empleados");

        $Admin=$this->input->post("Admin");
        $jwt = $this->input->post("jwt");
        $jwt = $this->WebToken->decodificarJWT($jwt);
        
        if($Admin==0){
        $idUsuario = $jwt->idUsuario;
        $cliente = $this->Clientes->getClienteByIdUsuario($idUsuario);
        $idCliente=$cliente['idCliente'];
        }
        else{
            $idCliente = $jwt->idUsuario;
            $cliente = $this->Clientes->getClienteByIdCliente($idCliente);
            $idUsuario=$cliente['Usuario_idUsuario'];
        }
        $empleados = json_decode($this->input->post("empleados"), true);
        
        /*
         * Empleados:
         * [
         *  {
         *      "idPaquete":1,
         *      "nombre":"asd",
         *      "apellidoPaterno":"asd",
         *      "apellidoMaterno":"sss",
         *      "fechaNacimiento":"1995-07-07",
         *      "cuentaSeguroSocial":false,
         *      "token": "123123asdasd123"
         *  }
         * ]"
         * */
        //print_r($idCliente);
        if ($empleados) {
            // crea una subscripción por cada empleado
            foreach ($empleados as $empleado) {
                $token = $empleado['token'];
                $empleado['Cliente_idCliente'] = $idCliente;
                $empleado['idUsuario'] = $idUsuario;
                $empleado['apPaterno'] = $empleado['apellidoPaterno'];
                $empleado['apMaterno'] = $empleado['apellidoMaterno'];
                $empleado['nacimiento'] = $empleado['fechaNacimiento'];
                $empleado['checkSeguro'] = $empleado['cuentaSeguroSocial'];
                unset($empleado['apellidoPaterno']);
                unset($empleado['apellidoMaterno']);
                unset($empleado['fechaNacimiento']);
                unset($empleado['cuentaSeguroSocial']);
                unset($empleado['token']);

                $this->Empleados->insertarDatos($empleado, $token);
            }
        }
        echo json_encode([
            'message' => "Pago realizado con éxito"
        ]);
    }
    function pausarSubscripcion() {
        $body = @file_get_contents('php://input');
        $data = json_decode($body);

        if ($data->type == 'subscription.canceled'){
            $msg = "Tu pago ha sido comprobado.";
            mail("fulanito@conekta.com","Pago confirmado",$msg);
            http_response_code(200); // Return 200 OK
        } else if ($data->type == 'subscription.paid'){
            /*
             * Ejemplo de lo que enviará conekta:
             {
              "data": {
                  "object": {
                      "id": "sub_2jmmQDQ12YYhvE6Ep",
                      "status": "active",
                      "object": "subscription",
                      "charge_id": "5511d4ce2412294cf6000081",
                      "created_at": 1583759841,
                      "subscription_start": 1544682691,
                      "canceled_at": null,
                      "paused_at": null,
                      "billing_cycle_start": 1557729081,
                      "billing_cycle_end": 1560407481,
                      "trial_start": null,
                      "trial_end": null,
                      "plan_id": "mutant_course",
                      "customer_id": "cus_yyDRajnSHe61Ebd7b",
                      "card_id": "card_2s1BpzjePT2nxipt"
                  },
                  "previous_attributes": {}
              },
              "livemode": false,
              "webhook_status": "pending",
              "id": "5522c1ee19ce883fbf000030",
              "object": "event",
              "type": "subscription.paid",
              "created_at": 1583759841,
              "webhook_logs": [{
                  "id": "webhl_xtwgFC2EhrSTNKQ",
                  "url": "http://requestb.in/1467d141",
                  "failed_attempts": 0,
                  "last_http_response_status": -1,
                  "object": "webhook_log",
                  "last_attempted_at": 0
              }]
            }
             * */



            http_response_code(200); // Return 200 OK
        }

    }
}