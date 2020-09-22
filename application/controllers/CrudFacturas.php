<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CrudFacturas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *'); // permite CORS desde un dominio. Cambiar el * por el dominio.
		header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
		header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
		$this->load->model("Facturas");
		$this->load->model("clientes");
		$this->load->helper("download");
	}
	function index()
	{
		$data['Facturas'] = array();
		$fac = [];
		$idCliente = $this->clientes->getClienteByIdUsuario($this->session->userdata("iduser"));
		$idDatoFiscal = $this->Facturas->getDtosFiscales($idCliente['idCliente']);
		$num = count($idDatoFiscal);
		for ($i = 0; $i < $num; $i++) {
			$a = $this->Facturas->getFacturas($idDatoFiscal[$i]['idDatosFacturacion']);

			foreach ($a as $b) {
				// $data['Facturas']=$b;
				$fac[] = $b;
			}
		}
		$data['Facturas'] = $fac;
		print $this->load->view('viewTodoFacturas', $data, true);
	}
	function getfacturas($idDatosFacturacion, $idCliente)
	{
		$data['Facturas'] = $this->Facturas->getFacturas($idDatosFacturacion);
		$data['idCliente'] = $idCliente;
		print $this->load->view('viewTodoFacturas', $data, true);
	}
	function leerFacturas($xml)
	{
		$xmldata = simplexml_load_file($xml) or die("Failed to load"); //Se carga el XML
		$namespaces = $xmldata->getNameSpaces(true); //Se Obtienen los namespaces dentro del XML cfdi
		$cfdi = $xmldata->children($namespaces['cfdi']); //Se guardan los namespaces con el nombre cfdi
		$receptor = $cfdi->Receptor; //Se indica cual a cual de los nodos llamados cfdi se va a utilizar
		$atributos = $receptor->attributes(); //se obtien los atributos
		$rfc = $atributos['rfc']; //Se busca el atrubuto rfc dentro del nodo receptor

		return $this->Facturas->obtenerDatoFiscal($rfc); //Se busca el rfc en la base de datos
	}
	function obtenerperiodoFiscal($xml)
	{
		$xmldata = simplexml_load_file($xml) or die("Failed to load"); //Se carga el XML
		$namespaces = $xmldata->getNameSpaces(true); //Se Obtienen los namespaces dentro del XML cfdi
		$cfdi = $xmldata->children($namespaces['cfdi']); //Se guardan los namespaces con el nombre cfdi
		$Complemento = $cfdi->Complemento; //Se indica cual a cual de los nodos llamados cfdi se va a utilizar
		$tfd = $Complemento->children($namespaces['tfd']);
		$atributos = $tfd->attributes(); //se obtien los atributos
		$FechaTimbrado = $atributos['FechaTimbrado']; //Se busca el atrubuto rfc dentro del nodo receptor
		$mes = (string) $FechaTimbrado[0];
		return $periodo = substr($mes, 5, 2);
		//Se busca el rfc en la base de datos
	}

	function recibirDocumentos()
	{
		$this->load->model("Archivos");

		$numeroArchivos = $this->input->post("numeroArchivos");

		if (!is_numeric($numeroArchivos) && $numeroArchivos > 0 || $numeroArchivos == 0) {
			echo "Número de archivos invalido";
			http_response_code(400);
			die();
		}
		$numeroArchivos = $numeroArchivos / 2;
		for ($i = 0; $i < $numeroArchivos; $i++) {
			if (!$_FILES['archivo' . $i . 'xml']) {
				echo "Falta el archivo XML #" . ($i + 1);
				http_response_code(400);
				die();
			}
			if (!$_FILES['archivo' . $i . 'pdf']) {
				echo "Falta el archivo PDF #" . ($i + 1);
				http_response_code(400);
				die();
			}
			// leer el XML
			$periodo = ($this->obtenerperiodoFiscal($_FILES['archivo' . $i . 'xml']['tmp_name']));
			$cliente = ($this->leerFacturas($_FILES['archivo' . $i . 'xml']['tmp_name']));

			if (empty($periodo)) {
				echo "No se pudo leer el periodo " . $_FILES['archivo' . $i . 'xml']['name'];
				http_response_code(400);
				die();
			}
			if (empty($cliente)) {
				echo "No se pudo encontrar al cliente del archivo " . $_FILES['archivo' . $i . 'xml']['name'] . ". Por favor registre al cliente y sus datos fiscales e intente de nuevo";
				http_response_code(400);
				die();
			}

			$idDatoFiscal = $cliente['idDatosFacturacion'];
			$xml = $this->Archivos->subirArchivo('archivo' . $i . 'xml');
			$pdf = $this->Archivos->subirArchivo('archivo' . $i . 'pdf');

			$data = array(
				"idDatosFacturacion" => $idDatoFiscal,
				"periodoFiscal" => $periodo,
				"archivofacturaxml" => $xml['directorio'],
				"archivofacturapdf" => $pdf['directorio']
			);
			$this->Facturas->insertFactura($data);
		}
		echo "Todas las facturas fueron subidas";
		http_response_code(200);
	}

	function eliminarFactura($idFactura)
	{
		$this->Facturas->deletefactura($idFactura);
	}
	function descargaFactura($idFactura, $tipoArchivo)
	{
		$factura = $this->Facturas->obtenerFactura($idFactura);
		if (empty($factura)) {
			echo "La factura no existe";
			http_response_code(400);
			die();
		}
		if ($tipoArchivo == "pdf") {
			force_download($factura['archivofacturapdf'], null);
		} else if ($tipoArchivo == "xml") {
			force_download($factura['archivofacturaxml'], null);
		} else {
			echo "El tipo de archivo " . $tipoArchivo . " no es reconocido";
			http_response_code(400);
		}
	}
}
