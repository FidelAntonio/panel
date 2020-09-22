<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

/**
 *
 */
class Crudempleados extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("empleados");
        $this->load->model("Clientes");
        $this->load->model("WebToken");
        $this->load->library("session");
        $idUsuario=$this->session->userdata("iduser");
        if (empty($idUsuario)){
            die($this->load->view("viewSesionCaducada", null, true));
        }
    }

    function index()
    {
        if($this->session->userdata('tipo')==2)
        {
            $this->load->model('clientes');
            $idCliente=$this->clientes->getClienteByIdUsuario($this->session->userdata("iduser"));
            $data['Empleados']=$this->empleados->getEmpleados($idCliente);}
        else{$data['Empleados']=$this->empleados->getEmpleados(null);}
        $data['clientes']=$this->empleados->getClientes();
        $data['paquetes']=$this->empleados->getPaquetes();
        print $string=$this->load->view('viewTodoEmpleados',$data, TRUE);

    }
    // inseguro
    function generarjtw(){
        $iduser=$this->input->post('idUsuario');
        print json_encode([
            'jwt' => $this->WebToken->generarJWT(['idUsuario' => $iduser])
        ]);
    }

    function actualizarDatosEmpleado()
    {
        $this->form_validation->set_rules('telefono', 'Telefóno', 'trim');
        $this->form_validation->set_rules('telefono', 'Telefóno', 'trim');
        if ($this->form_validation->run() == FALSE) {
			http_response_code(500);
			echo (validation_errors());
			return;
		}

        $idEmp =$this->input->post('idE');
        $nombreEmpleado =$this->input->post('nombreEmpleado');
        $apPaterno =$this->input->post('apPaterno');
        $apMaterno =$this->input->post('apMaterno');
        $fechaNac =$this->input->post('fechaNac');
        $seguroE =$this->input->post('seguroE');
        $curp =$this->input->post('curp');
        $direccion =$this->input->post('direccion');
        $telefono =$this->input->post('telefono');
        $correoE =$this->input->post('correoE');
        $rfc =$this->input->post('rfc');
        $salarioB =$this->input->post('salarioB');
        $paquete =$this->input->post('paquete');
        if($this->session->userdata('tipo')==1) {
            $idCl =$this->Clientes->getClienteByIdCliente($this->input->post('idCl'));
    } else {
        $idCl =$this->Clientes->getClienteByIdUsuario($this->input->post('idCl'));
    }
        //echo "que vergas ";
        $arreglo=array(
            'nombre'=>$nombreEmpleado,
            'apPaterno'=>$apPaterno,
            'apMaterno'=>$apMaterno,
            'nacimiento'=>$fechaNac,
            'seguro'=>$seguroE,
            'curp'=>$curp,
            'direccionEmpleado'=>$direccion,
            'telefonoEmpleado'=>$telefono,
            'correoEmpleado'=>$correoE,
            'rfc'=>$rfc,
            'salarioBase'=>$salarioB,
            'Paquete_idPaquete'=>$paquete,
            'Cliente_idCliente'=>$idCl['idCliente']
        );
        $this->empleados->updateEmpleado($arreglo,$idEmp);

    }


    function modificarEmpleado()
    {
        $idEmpleado=$this->input->post('idEmpleado');
        $nombreE=$this->input->post('nombreE');
        $apPaterno=$this->input->post('paterno');
        $apMaterno=$this->input->post('materno');
        $nacimiento=$this->input->post('nacimiento');
        $seguro=$this->input->post('seguro');
        $nomCliente=$this->input->post('nomCliente');
        $nomPaquete=$this->input->post('nomPaquete');

        if(!empty($nombreE)){
            $data=array(
                'nombre'=>$nombreE);
            $this->empleados->updateEmpleado($data,$idEmpleado);
        }

        if(!empty($apPaterno)){
            $data=array(
                'apPaterno'=>$apPaterno);
            $this->empleados->updateEmpleado($data,$idEmpleado);
        }

        if(!empty($apMaterno)){
            $data=array(
                'apMaterno'=>$apMaterno);
            $this->empleados->updateEmpleado($data,$idEmpleado);
        }

        if(!empty($nacimiento)){
            $data=array(
                'nacimiento'=>$nacimiento);
            $this->empleados->updateEmpleado($data,$idEmpleado);
        }

        if(!empty($seguro)){
            $data=array(
                'seguro'=>$seguro);
            $this->empleados->updateEmpleado($data,$idEmpleado);
        }

        if(!empty($nomCliente)){
            $data=array(
                'Cliente_idCliente'=>$nomCliente);
            $this->empleados->updateEmpleado($data,$idEmpleado);
        }

        if(!empty($nomPaquete)){
            $data=array(
                'Paquete_idPaquete'=>$nomPaquete);
            $this->empleados->updateEmpleado($data,$idEmpleado);
        }


    }

    function editarEmpleado($idEmpleado)
    {
        $datos['idEmpleado']=$idEmpleado;
        $datos['clientes']= $this->empleados->getDatosCl();
        $datos['allPaquetes']=$this->empleados->getPaquetes();
        print $string=$this->load->view('viewEditarEmpleado',$datos, TRUE);
    }

    function detalleEmpleado($idEmpleado)
    {
        $datos['idEmpleado']=$idEmpleado;
        print $string=$this->load->view('viewDetalleEmpleado',$datos, TRUE);
    }
    function obtenerDetalleEmpleado($idE)
    {
        print json_encode($this->empleados->getDetalleEmpleado($idE));
    }
    function obtenerDatosEmpleado($idEpo)
    {
        print json_encode($this->empleados->getDtosEmpleado($idEpo));
    }

    function altaEmpleado()
    {
        
        $data['clientes']=$this->empleados->getClientes();
        $data['paquetes']=$this->empleados->getPaquetes();
        print $string=$this->load->view('viewaltaEmpleado', $data, true);
    }

    function altaEmpleadoAdmin()
    {
        $data['clientes']=$this->empleados->getClientes();
        $data['paquetes']=$this->empleados->getPaquetes();
        print $string=$this->load->view('viewaltaEmpleadoAdmin', $data, true);
    }

    function newEmpleado()
    {
        $numEmpleados=$this->input->post('datosPedido'['numeroEmpleados']);
        for($i=0;$i<$numEmpleados; $i++){
        $this->form_validation->set_rules('nombreEmpleado'.$i, 'Nombre del empleado', 'trim|required||min_length[2]');
		$this->form_validation->set_rules('apPaterno'.$i, 'Apellido paterno', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('apMaterno'.$i, 'Apellido materno', 'trim|required|min_length[2]');
        $this->form_validation->set_rules('fechaNac'.$i, 'fechaNac', 'trim|required');
        if($this->session->userdata('tipo')==1) {
        $this->form_validation->set_rules('idCl'.$i, 'Cliente', 'trim|required');
        } 

        $this->form_validation->set_rules('idPa'.$i, 'Paquete', 'trim|required');
        $this->form_validation->set_rules('curp'.$i, 'CURP', 'trim|alpha_numeric');
        $this->form_validation->set_rules('direccion'.$i, 'Direccion', 'trim|required');
        $this->form_validation->set_rules('telefono'.$i, 'Telefóno', 'trim');
        $this->form_validation->set_rules('rfc'.$i, 'RFC', 'trim|min_length[12]|max_length[13]|alpha_numeric');
        $this->form_validation->set_rules('salarioB'.$i, 'Telefóno', 'trim');
        $this->form_validation->set_rules('seguroE'.$i, 'Numero del Seguro Social', 'trim');
        $this->form_validation->set_rules('correoE'.$i, 'Correo Electrónico', 'trim|required|valid_email');
        $this->form_validation->set_rules('check'.$i, 'Seguro', 'trim');
        if ($this->form_validation->run() == FALSE) {
			http_response_code(500);
			echo (validation_errors());
			return;
		}
        $nombreEmpleado =$this->input->post( 'empleados'['nombreEmpleado']);
        $apPaterno =$this->input->post('empleados'['apPaterno']);
        $apMaterno =$this->input->post('empleados'['apMaterno']);
        $fechaNac =$this->input->post('empleados'['fechaNac']);
        $seguroE =$this->input->post('empleados'['seguroE']);
        if($this->session->userdata('tipo')==1) {
        $idCl =$this->input->post('empleados'['idCl']);
        }
        else{
            $idCl =$this->Clientes->getClienteByIdUsuario($this->session->userdata('iduser'));
        }
        $idPa =$this->input->post('empleados'['idPa']);
        $curp =$this->input->post('empleados'['curp']);
        $direccion =$this->input->post('empleados'['direccion']);
        $telefono =$this->input->post('empleados'['telefono']);
        $correoE =$this->input->post('empleados'['correoE']);
        $rfc =$this->input->post('empleados'['rfc']);
        $salarioB =$this->input->post('empleados'['salarioB']);
        $check=$this->input->post('empleados'['check']);
        
        $ch=0;
        if ($check=="on") {
            $ch=1;
        }
        $datos= array(
            'nombre'=>$nombreEmpleado,
            'apPaterno'=>$apPaterno,
            'apMaterno'=>$apMaterno,
            'nacimiento'=>$fechaNac,
            'seguro'=>$seguroE,
            'Cliente_idCliente'=>$idCl,
            'Paquete_idPaquete'=>$idPa,
            'curp'=>$curp,
            'direccionEmpleado'=>$direccion,
            'telefonoEmpleado'=>$telefono,
            'correoEmpleado'=>$correoE,
            'rfc'=>$rfc,
            'salarioBase'=>$salarioB,
            'checkSeguro'=>$ch
        );
        $this->empleados->insertarDatos($datos);
    }
    }

    function eliminarEmpleado($idEmpleado)
    {
        $this->empleados->borrarEmpleado($idEmpleado);
    }

    function getPaquetes(){
        print json_encode($this->empleados->getPaquetes());
    }


}

?>