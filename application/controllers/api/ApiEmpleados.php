<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApiEmpleados extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        header('Access-Control-Allow-Origin: *'); // permite CORS desde un dominio. Cambiar el * por el dominio.
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Content-Type: application/json; charset=UTF-8'); // La API siempre responderá en JSON.
        $this->load->model("Empleados");
    }
    function registrarEmpleados()
    {
        $jwt = $this->input->post("jwt");
        $this->load->model("WebToken");
        $jwt = $this->WebToken->decodificarJWT($jwt);
        $idCliente = $jwt->idCliente;
        $idPaquete = $this->input->post("idPaquete");
        $numeroEmpleados = $this->input->post("numeroEmpleados");
        for ($i = 0; $i < $numeroEmpleados; $i++) {
            $nombre = $this->input->post("_nombre" . $i);
            $apellidoPaterno = $this->input->post("_apellidoPaterno" . $i);
            $apellidoMaterno = $this->input->post("_apellidoMaterno" . $i);
            $fechaNacimiento = $this->input->post("_fechaNacimiento" . $i);
            $cuentaSeguroSocial = $this->input->post("_cuentaSeguroSocial" . $i);

            $this->Empleados->insertarDatos([
                'nombre' => $nombre,
                'apPaterno' => $apellidoPaterno,
                'apMaterno' => $apellidoMaterno,
                'nacimiento' => $fechaNacimiento,
                'checkSeguro' => $cuentaSeguroSocial,
                'Cliente_idCliente' => $idCliente,
                'Paquete_idPaquete' => $idPaquete
            ]);
        }
        echo json_encode([
            'message' => 'Los empleados han sido registrados'
        ]);
    }
}
