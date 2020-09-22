<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Crudclientes extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model("clientes");
		$this->load->library('session');
		$this->load->library('encryption');
		$this->key = bin2hex($this->encryption->create_key(16));
		$idUsuario = $this->session->userdata("iduser");
		if (empty($idUsuario)) {
			die($this->load->view("viewSesionCaducada", null, true));
		}
	}

	function index()
	{
		$data['Clientes'] = $this->clientes->getClientes();
		$data['usuarios'] = $this->clientes->getUsuarios();
		print $string = $this->load->view('viewTodoClientes', $data, TRUE);
	}

	function eliminarDatoFiscal($idDatosFacturacion)
	{
		$this->clientes->deleteDatoFiscal($idDatosFacturacion);
	}
	function datosFiscales($idDatosFacturacion, $idCliente)
	{
		$data['idCliente'] = $idCliente;
		$data['Nombre'] = $this->clientes->getCliente($idCliente);
		$data['idDatosFacturacion'] = $idDatosFacturacion;
		$data['edo'] = $this->clientes->getEdos();
		$data['catCFDI'] = $this->clientes->getAllcfdi();
		print $string = $this->load->view('viewdatosFiscales', $data, TRUE);
	}


	function altaFactura($idCliente)
	{
		$data['idCliente'] = $idCliente;
		$data['estados'] = $this->clientes->getEdos();
		$data['catCFDI'] = $this->clientes->getAllcfdi();
		print $string = $this->load->view('viewaltaFactura', $data, true);
	}

	function datosFiscalesCliente($idCliente)
	{
		$data['idCliente'] = $idCliente;
		$data['Nombre'] = $this->clientes->getCliente($idCliente);
		$data['Facturacion'] = $this->clientes->getFacturacion($idCliente);
		print $string = $this->load->view('viewFiscalesClientes', $data, TRUE);
	}

	function altaCliente()
	{
		$data['usuarios'] = $this->clientes->getUsuarios();
		print $string = $this->load->view('viewaltaCliente', $data, true);
	}
	function newDatos()
	{
		$this->form_validation->set_rules('RSocial', 'razón social', 'trim|required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('rfcSocial', 'RFC', 'trim|required|min_length[12]|max_length[13]');
		$this->form_validation->set_rules('correoFiscal', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('caFiscal', 'calle', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('numExte', 'numero exterior', 'trim|required');
		$this->form_validation->set_rules('coloniaFis', 'colonia', 'trim|required|numeric');
		$this->form_validation->set_rules('municipioFis', 'municipio', 'trim|required|numeric');
		$this->form_validation->set_rules('codigPos', 'código Postal', 'trim|required|numeric');
		$this->form_validation->set_rules('cfdi', 'uso del CFDI', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('telFiscal', 'teléfono discal', 'trim|min_length[10]');
		if ($this->input->post('tipoPer') == 2) {
			$this->form_validation->set_rules('representanteL', 'Representante Legal', 'trim|min_length[2]|required');
		}
		$this->form_validation->set_rules('tipoPer', 'Tipo de Persona', 'trim|numeric|required');
		if ($this->form_validation->run() == FALSE) {
			http_response_code(500);
			echo (validation_errors());
			return;
		}


		$idC = $this->input->post('idCliente');
		$RSocial = $this->input->post('RSocial');
		$rfcSocial = $this->input->post('rfcSocial');
		$caFiscal = $this->input->post('caFiscal');
		$numExte = $this->input->post('numExte');
		$numInte = $this->input->post('numInte');
		$coloniaFis = $this->input->post('coloniaFis');
		$municipioFis = $this->input->post('municipioFis');
		$codigPos = $this->input->post('codigPos');
		$correoFiscal = $this->input->post('correoFiscal');
		$cfdi = $this->input->post('cfdi');
		$telFiscal = $this->input->post('telFiscal');
		$representanteL = $this->input->post('representanteL');
		$tipoPer = $this->input->post('tipoPer');

		$arreglo = array(
			'rfc' => $rfcSocial,
			'razonSocial' => $RSocial,
			'calle' => $caFiscal,
			'noExt' => $numExte,
			'noInt' => $numInte,
			'colonia' => $coloniaFis,
			'municipio' => $municipioFis,
			'cp' => $codigPos,
			'correoFiscal' => $correoFiscal,
			'Usocfdi' => $cfdi,
			'telefonoFiscal' => $telFiscal,
			'Cliente_idCliente' => $idC,
			'representanteLegal' => $representanteL,
			'tipoPersona' => $tipoPer,
			'representanteLegal' => $representanteL
		);
		$idF = $this->clientes->altaDatosFactura($arreglo);
		echo $idF;
		// redirect('Crudclientes/datosFiscalesCliente'/$idC);
	}

	function actualizarDatosFiscales()
	{
		$this->form_validation->set_rules('RSocial', 'razón social', 'trim|required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('rfcSocial', 'RFC', 'trim|required|min_length[12]|max_length[13]');
		$this->form_validation->set_rules('correoFiscal', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('caFiscal', 'calle', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('numExte', 'numero exterior', 'trim|required');
		$this->form_validation->set_rules('coloniaFis', 'colonia', 'trim|required|numeric');
		$this->form_validation->set_rules('municipioFis', 'municipio', 'trim|required|numeric');
		$this->form_validation->set_rules('codigPos', 'código Postal', 'trim|required|numeric');
		$this->form_validation->set_rules('cfdi', 'uso del CFDI', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('telFiscal', 'teléfono fiscal', 'trim|min_length[10]');
		if ($this->session->userdata('tipo') == 2) {
			$this->form_validation->set_rules('representanteL', 'Representante Legal', 'trim|min_length[2]|required');
		}
		$this->form_validation->set_rules('tipoPer', 'Tipo de Persona', 'trim|numeric|required');
		if ($this->form_validation->run() == FALSE) {
			http_response_code(500);
			echo (validation_errors());
			return;
		}
		$idC = $this->input->post('id');
		$tipoPer = $this->input->post('tipoPer');
		$RSocial = $this->input->post('RSocial');
		$rfcSocial = $this->input->post('rfcSocial');
		$caFiscal = $this->input->post('caFiscal');
		$numExte = $this->input->post('numExte');
		$numInte = $this->input->post('numInte');
		$coloniaFis = $this->input->post('coloniaFis');
		$municipioFis = $this->input->post('municipioFis');
		$codigPos = $this->input->post('codigPos');
		$correoFiscal = $this->input->post('correoFiscal');
		$cfdi = $this->input->post('cfdi');
		$telFiscal = $this->input->post('telFiscal');
		$representanteL = $this->input->post('representanteL');
		$idDatosFacturacion = $this->input->post('idDatosFacturacion');

		$arreglo = array(
			'rfc' => $rfcSocial,
			'razonSocial' => $RSocial,
			'calle' => $caFiscal,
			'noExt' => $numExte,
			'noInt' => $numInte,
			'colonia' => $coloniaFis,
			'municipio' => $municipioFis,
			'cp' => $codigPos,
			'tipoPersona' => $tipoPer,
			'correoFiscal' => $correoFiscal,
			'Usocfdi' => $cfdi,
			'telefonoFiscal' => $telFiscal,
			'representanteLegal' => $representanteL
		);
		$this->clientes->updateFacturacionDatos($arreglo, $idDatosFacturacion);
	}

	function newClientes()
	{
		$this->form_validation->set_rules('nombreCliente', 'nombre', 'trim|required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('apPaterno', 'apellido paterno', 'trim|required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('apMaterno', 'apellido materno', 'trim|required|min_length[3]|max_length[100]');
		$this->form_validation->set_rules('numTele', 'teléfono', 'trim|min_length[10]');
		$this->form_validation->set_rules('passwordClie', 'password', 'trim|required');
		$this->form_validation->set_rules('correoC', 'correo', 'trim|required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			http_response_code(500);
			echo (validation_errors());
			return;
		}

		$nombreCliente = $this->input->post('nombreCliente');
		$apPaterno = $this->input->post('apPaterno');
		$apMaterno = $this->input->post('apMaterno');
		$telefonoCliente = $this->input->post('numTele');

		$passwordClie = $this->input->post('passwordClie');
		$passwordClie = $this->encryption->encrypt($passwordClie);
		$correoC = $this->input->post('correoC');

		$datos = array(
			'correo' => $correoC,
			'password' => $passwordClie,
			'tipo' => 2
		);
		$idInsertado = $this->clientes->insertarDatosUser($datos);
		// Creado de permisos
        $this->load->model('Permisos');
        $this->Permisos->validacionExistencia($idInsertado,5);//Mis datos
        $this->Permisos->validacionExistencia($idInsertado,6);//Mis Empleados
        $this->Permisos->validacionExistencia($idInsertado,8);//Mis Facturas
		$datos = array(
			'nombre' => $nombreCliente,
			'apPaterno' => $apPaterno,
			'apMaterno' => $apMaterno,
			'telefono' => $telefonoCliente,
			'Usuario_idUsuario' => $idInsertado
		);
		$this->clientes->insertarDatos($datos);
	}


	function modificarCliente()
	{
		$idCliente = $this->input->post('idCliente');
		$nombreCliente = $this->input->post('nombreC');
		$apPaterno = $this->input->post('paterno');
		$apMaterno = $this->input->post('materno');
		$telefonoCliente = $this->input->post('telefono');

		$nombreUser = $this->input->post('nombreUser');


		if (!empty($nombreUser)) {
			$this->form_validation->set_rules('nombreUser', 'usuario', 'trim|required');
			$data = array(
				'Usuario_idUsuario' => $nombreUser
			);
		}

		if (!empty($nombreCliente)) {
			$this->form_validation->set_rules('nombreC', 'nombre', 'trim|required|min_length[3]|max_length[100]');

			$data = array(
				'nombre' => $nombreCliente
			);
		}

		if (!empty($apPaterno)) {
			$this->form_validation->set_rules('paterno', 'apellido paterno', 'trim|required|min_length[3]|max_length[100]');
			$data = array(
				'apPaterno' => $apPaterno
			);
		}

		if (!empty($apMaterno)) {
			$this->form_validation->set_rules('materno', 'apellido materno', 'trim|required|min_length[3]|max_length[100]');
			$data = array(
				'apMaterno' => $apMaterno
			);
		}

		if (!empty($telefonoCliente)) {
			$this->form_validation->set_rules('telefono', 'teléfono', 'trim|min_length[10]');
			$data = array(
				'telefono' => $telefonoCliente
			);
		}
		if ($this->form_validation->run() == FALSE) {
			http_response_code(500);
			$errores = validation_errors();
			if (empty($errores))
				$errores = "Debes proporcionar un dato";
			echo $errores;
			return;
		}
		$this->clientes->updateCliente($data, $idCliente);
	}

	function eliminarCliente($idCliente, $idU)
	{
		$this->clientes->borrarCliente($idCliente);
		$this->clientes->eliminarCliente($idU);
	}

	function obtenerDatosFiscales($idC)
	{
		print json_encode($this->clientes->getDtosFiscales($idC));
	}

	function getMuni($idEdo)
	{
		print json_encode($this->clientes->getMunicipios($idEdo));
	}

	function getColo($idM)
	{
		print json_encode($this->clientes->getColo($idM));
	}

	function getCodigo($idC)
	{
		print json_encode($this->clientes->getCodigoP($idC));
	}
	function getClientesAut()
	{
		$nombre = $this->input->post("nombre");
		echo json_encode($this->clientes->getClienteslike($nombre));
	}
}
