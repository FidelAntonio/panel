<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 * 
 */
class Correo extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->library("email");
    }
    function enviar($titulo, $destinatario, $mensaje)
    {
        try {
            $this->email->from("cointic.israel@gmail.com", "Grupo Parra");
            $this->email->reply_to("cointic.israel@gmail.com", "Grupo Parra");
            $this->email->to($destinatario);
            $this->email->subject($titulo);
            $this->email->message($mensaje);
            $this->email->set_mailtype('html');

            $resultado = FALSE;
            $resultado = $this->email->send();
        } catch (Exception $x) {
            $resultado = FALSE;
            $x->getMessage();
        }
        return $resultado;
    }
}
