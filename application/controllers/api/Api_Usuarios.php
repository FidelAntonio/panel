<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_Usuarios extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        header('Access-Control-Allow-Origin: *'); // permite CORS desde un dominio. Cambiar el * por el dominio.
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
        header('Content-Type: application/json; charset=UTF-8'); // La API siempre responderá en JSON.
        $this->load->model("Usuarios");
        $this->load->library('encryption');
    }
    function autenticar()
    {
        $usuario = $this->input->post("usuario");
        $password = $this->input->post("password");

        $resultado = $this->Usuarios->login($usuario, $password);
        if (!empty($resultado)) {
            $this->load->model("WebToken");
            $jwt = $this->WebToken->generarJWT([
                'idUsuario' => $resultado->idUsuario,
                'idCliente' => $resultado->idCliente
            ]);
            echo json_encode([
                'jwt' => $jwt,
                'message' => 'Usuario autenticado exitosamente',
                'tipo' => $resultado->tipo
            ]);
        } else {
            http_response_code(403);
            echo "Credenciales de usuario no válidas";
        }
    }
    function registrarCliente()
    {
        $this->load->library("encryption");

        $tipo = 2;
        $fotoUsuario = "";
        $status = 0; // activo
        $nombre = $this->input->post("nombre");
        $apellidoP = $this->input->post("apellidoP");
        $apellidoM = $this->input->post("apellidoM");
        $numeroTel = $this->input->post("numeroTel");
        $correoE = $this->input->post("correoE");
        $contra = $this->input->post("contra");
        $confirmarC = $this->input->post("confirmarC");
        $tipoP = $this->input->post("tipoP");
        $representanteL = $this->input->post("representanteL");
        $rfc = $this->input->post("rfc");
        $razonSocial = $this->input->post("razonSocial");
        $calle = $this->input->post("calle");
        $numeroExterior = $this->input->post("numeroExterior");
        $numeroInterior = $this->input->post("numeroInterior");
        $pais = $this->input->post("pais");
        $estado = $this->input->post("estado");
        $municipio = $this->input->post("municipio");
        $colonias = $this->input->post("colonias");
        $region = $this->input->post("region");
        $codigoPo = $this->input->post("codigoPo");

        // registro de usuario
        $idUsuario = $this->Usuarios->insertaDatos([
            'correo' => $correoE,
            'password' => $this->encryption->encrypt($contra),
            'tipo' => $tipo,
            'fotoUsuario' => $fotoUsuario,
            'status' => $status,
            'fecha' => date("Y-m-d")
        ]);
        // Creado de permisos
        $this->load->model('Permisos');
        $this->Permisos->validacionExistencia($idUsuario,5);//Mis datos
        $this->Permisos->validacionExistencia($idUsuario,6);//Mis Empleados
        $this->Permisos->validacionExistencia($idUsuario,8);//Mis Facturas

        // registro de cliente
        $this->load->model("Clientes");
        $idCliente = $this->Clientes->insertarDatos([
            'nombre' => $nombre,
            'apPaterno'  => $apellidoP,
            'apMaterno'  => $apellidoM,
            'telefono' => $numeroTel,
            'Usuario_idUsuario' => $idUsuario
        ]);
        // registro de datos de facturación
        $idDatoFiscal = $this->Clientes->altaDatosFactura([
            'rfc' => $rfc,
            'razonSocial' => $razonSocial,
            'calle' => $calle,
            'noExt' => $numeroExterior,
            'noInt' => $numeroInterior,
            'colonia' => $region,
            'municipio' => $municipio,
            'cp' => $codigoPo,
            'Cliente_idCliente' => $idCliente,
            'tipoPersona' => $tipoP,
            'representanteLegal' => $representanteL,
            'correoFiscal' => $correoE,
            'Usocfdi' => 0,
            'telefonoFiscal' => $numeroTel
        ]);
        $this->load->model("WebToken");
        echo json_encode([
            'message' => "Cliente registrado con éxito",
            'jwt' => $this->WebToken->generarJWT([
                'idUsuario' => $idUsuario,
                'idCliente' => $idCliente,
                'tipo' => $tipo
            ])
        ]);
    }
    function recuperarPassword()
	{

		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$email = $this->input->post("email");
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		if ($this->form_validation->run() == FALSE) {
			http_response_code(500);
			echo json_encode(array(
				'message' =>  validation_errors()
			));
			return;
		} else {
			$usuario = $this->Usuarios->getUsuarioByEmail($this->input->post("email"));
			if (!empty($usuario)) {
				$this->load->model("Correo");

				$datos = [
					'idUsuario' => $usuario['idUsuario'],
					'fecha' => date("Y-m-d H:i:s"),
					'salt' => md5(uniqid()) // para que nadie pueda descifrar estos tokens se le agrega salt. De esta manera el atacante necesitaria esta semilla única para descifrar el encriptado
				];
				$datos = json_encode($datos);
				$datos = $this->encryption->encrypt($datos);
				$datos = strtr($datos, array('+' => '.', '=' => '-', '/' => '~')); // esto es para poderlo colocar en la URL

				$url = $this->config->item('angular_front');
				$url .= "cambiarContra/" . $datos;

				$correo = $this->load->view("emailBasico", [
					'titulo' => "Recuperación de contraseña",
					'encabezado' => "Se ha solicitado un correo para recuperar su contraseña",
					'cuerpo' =>

					"
					Por favor, entra a la siguiente dirección para establecer una nueva contraseña.
					<p style='text-align: center'><a href='" . $url . "'>" . $url . "</a></p>
					Este enlace solo estará disponible durante 15 días.
					",
				], TRUE);
				$this->Correo->enviar("Recuperación de contraseña", $this->input->post("email"), $correo);
				echo json_encode(array(
					'message' => "Se ha enviado un correo de recuperación al email proporcionado"
				));
			} else {
				http_response_code(500);
				echo json_encode(array(
					'message' =>  "La cuenta de correo proporcionada no esta registrada en el sistema."
				));
				return;
			}
		}
	}
	function resetPassword()
	{
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]');
		$this->form_validation->set_rules('confirmacion', 'confirmación de password', 'trim|required|min_length[8]|matches[password]');
		$this->form_validation->set_rules('datos', 'encriptado', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			http_response_code(500);
			echo json_encode(array(
				'message' => validation_errors()
			));
			exit();
		} else {
			$this->load->library("encryption");
			// devuelve el valor original del encriptado
			$encriptado = strtr($this->input->post("datos"), array('.' => '+', '-' => '=', '~' => '/'));
			$encriptado = $this->encryption->decrypt($encriptado);
			if ($encriptado) {
    				$encriptado = json_decode($encriptado, true); // { idUsuario: 1, fecha: '2020-01-20 10:19:00' }

				$fechaEmision = $encriptado['fecha'];
				$fechaHoy = date("Y-m-d H:i:s");
				$fechaLimite = date("Y-m-d H:i:s", strtotime($fechaEmision . " +15 days"));
				if (strtotime($fechaHoy) < strtotime($fechaLimite)) {
					// por el momento no toma en cuenta la fecha en la que fue emitido este encriptado.
					if ($encriptado['idUsuario']) {
						$this->Usuarios->update($encriptado['idUsuario'], array(
							'password' => $this->encryption->encrypt($this->input->post("password"))
						));
						echo json_encode(array(
							'message' => "La contraseña ha sido reestablecida"
						));
					}
				} else {
					http_response_code(403);
					echo json_encode(array(
						'message' => "Han pasado más de 15 dias desde la generación de este token. Por seguridad, vuelve a generar un correo de recuperación de contraseña o contacta con el administrador."
					));
					exit();
				}
			} else {
				http_response_code(500);
				echo json_encode(array(
					'message' => "Los datos del usuario no son válidos"
				));
				exit();
			}
		}
	}
}
