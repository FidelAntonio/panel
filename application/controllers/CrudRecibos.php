<?php
defined('BASEPATH') or exit('No direct script access allowed');
class CrudRecibos extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		header('Access-Control-Allow-Origin: *'); // permite CORS desde un dominio. Cambiar el * por el dominio.
        header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
		$this->load->model("Recibos");
		$this->load->helper("download");
	}
	function index()
	{
		$data['Recibos'] = $this->Recibos->getRecibos(null);
		print $this->load->view('viewTodoRecibos', $data, true);
	}
	function getRecibos($idEmpleado){
		$data['Recibos'] = $this->Recibos->getRecibos($idEmpleado);
		print $this->load->view('viewTodoRecibos', $data, true);
	}
	function leerRecibo($xml)
	{
		$xmldata = simplexml_load_file($xml) or die("Failed to load"); //Se carga el XML
		$namespaces = $xmldata->getNameSpaces(true); //Se Obtienen los namespaces dentro del XML cfdi
		$cfdi = $xmldata->children($namespaces['cfdi']); //Se guardan los namespaces con el nombre cfdi
		$receptor = $cfdi->Receptor; //Se indica cual a cual de los nodos llamados cfdi se va a utilizar
		$atributos = $receptor->attributes(); //se obtien los atributos
		$rfc = $atributos['rfc']; //Se busca el atrubuto rfc dentro del nodo receptor
		
		return $this->Recibos->obtenerEmpleado($rfc); //Se busca el rfc en la base de datos
	}
	function obtenerperiodoFiscal($xml)
	{
		$xmldata = simplexml_load_file($xml) or die("Failed to load"); //Se carga el XML
		$namespaces = $xmldata->getNameSpaces(true); //Se Obtienen los namespaces dentro del XML cfdi
		$cfdi = $xmldata->children($namespaces['cfdi']); //Se guardan los namespaces con el nombre cfdi
		$Complemento = $cfdi->Complemento; //Se indica cual a cual de los nodos llamados cfdi se va a utilizar
		$tfd=$Complemento->children($namespaces['tfd']);
		$atributos = $tfd->attributes(); //se obtien los atributos
		$FechaTimbrado = $atributos['FechaTimbrado']; //Se busca el atrubuto rfc dentro del nodo receptor
		$mes=(string)$FechaTimbrado[0];
		return $periodo=substr($mes,5, 2); 
		 //Se busca el rfc en la base de datos
	}

	function recibirDocumentos()
	{
		$this->load->model("Archivos");
		
		$numeroArchivos = $this->input->post("numeroArchivos");
	
		if (!is_numeric($numeroArchivos) && $numeroArchivos > 0||$numeroArchivos==0) {
			echo "Número de archivos invalido";
			http_response_code(400);
			die();
		}
		$numeroArchivos=$numeroArchivos/2;
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
			$empleado = ($this->leerRecibo($_FILES['archivo' . $i . 'xml']['tmp_name']));
			
			if(empty($periodo))
			{
				echo "No se pudo leer el periodo ".$_FILES['archivo' . $i . 'xml']['name'];
				http_response_code(400);
				die();
			}
			if(empty($empleado))
			{
				echo "No se pudo encontrar al empleado del archivo ".$_FILES['archivo' . $i . 'xml']['name'].". Por favor registre al cliente y sus datos fiscales e intente de nuevo";
				http_response_code(400);
				die();
			}
			
			$idEmpleado = $empleado['idEmpleado'];
			$xml = $this->Archivos->subirArchivo('archivo' . $i . 'xml');
			$pdf = $this->Archivos->subirArchivo('archivo' . $i . 'pdf');
			
			$data=array(
				"idEmpleado"=> $idEmpleado,
				"periodoFiscal"=>$periodo,
				"archivoReciboxml" => $xml['directorio'],
				"archivoReciboPDF" => $pdf['directorio']
			);
			$this->Recibos->insertRecibo($data);
		}
		echo "Todos los recibos fueron subidos";
		http_response_code(200);
	}

	function eliminarRecibo($idRecibo)
	{
		$this->Recibos->deleteRecibo($idRecibo);
	}
	function descargaRecibo($idRecibo,$tipoArchivo){
		$recibo = $this->Recibos->obtenerRecibo($idRecibo);
		if(empty($recibo)){
			echo "El recibo no existe";
			http_response_code(400);
			die();
		}
		if($tipoArchivo == "pdf") {
			force_download($recibo['archivoReciboPDF'],null);
		}else if($tipoArchivo == "xml"){
			force_download($recibo['archivoReciboxml'],null);
		}
		else{
			echo "El tipo de archivo ". $tipoArchivo ." no es reconocido";
			http_response_code(400);
		}
		}
}
