<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Contacto extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
    }
    function contactar()
    {

        // validacion del captcha
        $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
        $recaptcha_secret = '6Lf2ftEUAAAAAH-ev-6ooP9ZjjeVC6i0hgXC0p0X';
        $recaptcha_response = $this->input->post("token");
        $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
        $recaptcha = json_decode($recaptcha);
        if ($recaptcha->success == true) {
            // datos de entrada
            $nombre = $this->input->post("nombre");
            $correo = $this->input->post("email");
            $telefono = $this->input->post("telefono");
            $asunto = $this->input->post("asunto");
            $comentarios = $this->input->post("comentarios");
            $token = $this->input->post("token");
            $this->load->model("Correo");

            $email= $this->load->view("correoContacto", [
                'nombre' => $nombre,
                'correo' => $correo,
                'telefono' => $telefono,
                'asunto' => $asunto,
                'comentarios' => $comentarios
                
            ], true);
            if($this->Correo->enviar("Nuevo contacto", "cointic.israel@gmail.com", $email)) {
                $email= $this->load->view("correoAgradecimiento", [
                    'nombre' => $nombre,
                    'correo' => $correo,
                    'telefono' => $telefono
                    
                ], true);
                if($this->Correo->enviar("Gracias por registrarte", $correo, $email)) {
                    echo '<script>
                    alert("El mensaje se envío correctamente");
                    window.history.go(-1);
                </script>';
                } else{
                    echo "Hubo un error al enviar el mensaje";
    
                }

            } else{
                echo "Hubo un error al enviar el mensaje";

            }
        }  else {
            echo '  <script>
                        alert("Error al validar el captcha");
                        window.history.go(-1);
                    </script>';
        }
    }
}
