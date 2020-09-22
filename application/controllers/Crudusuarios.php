<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Crudusuarios extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *'); // permite CORS desde un dominio. Cambiar el * por el dominio.
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
		header('Content-Type: application/json; charset=UTF-8'); // La API siempre responderá en JSON.
		$this->load->model("usuarios");
		$this->load->model("archivos");
		$this->load->model('Permisos');
		$this->load->library('session');
		$this->load->library('encryption');
		$this->key = bin2hex($this->encryption->create_key(16));
		$idUsuario = $this->session->userdata("iduser");
		if (empty($idUsuario)) {
			die($this->load->view("viewSesionCaducada", null, true));
		}
	}

	public function index()
	{
		$data['tamanoMaximo'] = $this->archivos->getMaximumFileUploadSize();
		$data['Usuario'] = $this->usuarios->getDatos();
		print $string = $this->load->view('viewTodoUsuarios', $data, TRUE);
	}

	function altaUsuarios()
	{
		$data['tamanoMaximo'] = $this->archivos->getMaximumFileUploadSize();
		print $this->load->view('formUsuarios', $data, TRUE);
	}

	function nuevoUser()
	{
		$buscarCorreo = $this->usuarios->validarCorreo($this->input->post('correo'));
		if (sizeof($buscarCorreo) == 1) {
			http_response_code(500);
			echo "Este correo ya esta registrado ";
			return;
		}
		$this->form_validation->set_rules('correo', 'correo', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('confirmasPass', 'confir mas Password', 'trim|required|min_length[3]');
		$this->form_validation->set_rules('idTip', 'tipo de usuario', 'required|numeric');
		if ($this->form_validation->run() == FALSE) {
			http_response_code(500);
			echo (validation_errors());
			return;
		}
		$password = $this->encryption->encrypt($this->input->post('password'));
		$correo = $this->input->post('correo');
		$idTip = $this->input->post('idTip');
		///Datos para la imagem
		$nombre_archivoima = $_FILES['fotoPerfil']['name'];
		$tipo_archivoima = $_FILES['fotoPerfil']['type'];
		$tamano_archivoima = $_FILES['fotoPerfil']['size'];
		$temp_archivoima = $_FILES['fotoPerfil']['tmp_name'];
		$ext = explode('.', basename($nombre_archivoima));
		$ext = array_pop($ext);
		$foto = DIRECTORY_SEPARATOR . md5(uniqid()) . "." . $ext;
		$ext = strtolower($ext);
		if ($this->archivos->verificarArchivo($ext, $tamano_archivoima)) {
			if (!file_exists("assets/images/fotoPerfilUsuarios/") && !is_dir("assets/images/fotoPerfilUsuarios/")) {
				mkdir("assets/images/fotoPerfilUsuarios/");
			}
			if ($nombre_archivoima == "") {
				$datos = array(
					'correo' => $correo,
					'password' => $password,
					'tipo' => $idTip,
					'status' => 0,
					'fecha' => date("Y-m-d")
				);
				$idUsuario = $this->usuarios->insertaDatos($datos);
				// Creado de permisos
				if ($idTip == 2) {
					$this->Permisos->validacionExistencia($idUsuario, 5); //Mis datos
					$this->Permisos->validacionExistencia($idUsuario, 6); //Mis Empleados
					$this->Permisos->validacionExistencia($idUsuario, 8); //Mis Facturas
				} else {
					$this->Permisos->validacionExistencia($idUsuario, 1); //Usuarios
					$this->Permisos->validacionExistencia($idUsuario, 2); //Clientes
					$this->Permisos->validacionExistencia($idUsuario, 3); //Paquetes
					$this->Permisos->validacionExistencia($idUsuario, 4); //Empleados
				}
			} else {
				$ruta = "assets/images/fotoPerfilUsuarios/" . $foto;
				$datos = array(
					'correo' => $correo,
					'password' => $password,
					'tipo' => $idTip,
					'fotoUsuario' => $foto,
					'status' => 0

				);

				$idUsuario = $this->usuarios->insertaDatos($datos);
				// Creado de permisos
				if ($idTip == 2) {
					$this->Permisos->validacionExistencia($idUsuario, 5); //Mis datos
					$this->Permisos->validacionExistencia($idUsuario, 6); //Mis Empleados
					$this->Permisos->validacionExistencia($idUsuario, 8); //Mis Facturas
				} else {
					$this->Permisos->validacionExistencia($idUsuario, 1); //Usuarios
					$this->Permisos->validacionExistencia($idUsuario, 2); //Clientes
					$this->Permisos->validacionExistencia($idUsuario, 3); //Paquetes
					$this->Permisos->validacionExistencia($idUsuario, 4); //Empleados
				}
				move_uploaded_file($temp_archivoima, $ruta);
			}
		} else {
			http_response_code(500);
			echo "Foto de perfil no válida";
			return;
		}
		//echo "password".$password."correo".$correo."tipo".$idTip;

	}

	function verificarStatus($idU)
	{
		$data = $this->usuarios->traerdatoStatus($idU);
		echo json_encode($data);
	}
	function editaFotoPerfil()
	{
		$idUser = $this->input->post('userIdf');
		$nombre_archivoima = $_FILES['fotoPerfil']['name'];
		$tipo_archivoima = $_FILES['fotoPerfil']['type'];
		$tamano_archivoima = $_FILES['fotoPerfil']['size'];
		$temp_archivoima = $_FILES['fotoPerfil']['tmp_name'];
		$ext = explode('.', basename($nombre_archivoima));
		$ext = array_pop($ext);
		$foto = DIRECTORY_SEPARATOR . md5(uniqid()) . "." . $ext;
		$ext = strtolower($ext);
		if ($this->archivos->verificarArchivoImagen($ext, $tamano_archivoima)) {
			if (!file_exists("assets/images/fotoPerfilUsuarios/") && !is_dir("assets/images/fotoPerfilUsuarios/")) {
				mkdir("assets/images/fotoPerfilUsuarios/");
			}

			$ruta = "assets/images/fotoPerfilUsuarios/" . $foto;
			$datos = array(
				'fotoUsuario' => $foto
			);

			$this->usuarios->update($idUser, $datos);
			move_uploaded_file($temp_archivoima, $ruta);
		} else {
			http_response_code(500);
			echo "Foto de perfil no válida";
			return;
		}
	}
	function editaPassword()
	{
		$idUser = $this->input->post('idUser');
		$password = $this->input->post('password');
		$nombreU = $this->input->post('nombreU');
		$tipo = $this->input->post('tipo');
		$st = $this->input->post('st');

		if ($st != 2) {
			$data = array(
				'status' => $st
			);
			$this->usuarios->update($idUser, $data);
		}

		if (!empty($password)) {
			$password = $this->encryption->encrypt($password);
			$data = array(
				'password' => $password
			);
			$this->usuarios->update($idUser, $data);
		}

		if (!empty($nombreU)) {

			$data = array(
				'correo' => $nombreU
			);
			$this->usuarios->update($idUser, $data);
		}

		if (!empty($tipo)) {

			$data = array(
				'tipo' => $tipo
			);
			$this->usuarios->update($idUser, $data);
		}
	}
	function eliminarUsuario($idUsuario)
	{
		$this->usuarios->borrarPaquete($idUsuario);
	}
}
