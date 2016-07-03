<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Entrar extends CI_Controller {

	public function index(){
		$this->load->database('default');
		$this->load->model('entrar_model');

		$this->load->view("Entrar/index.php");
	}

	public function login(){
		$this->load->database('default');
		$this->load->model('entrar_model');

		$usuario= $this->entrar_model->logear($this->input->post("nombre"),$this->input->post("contra"));

		if(count($usuario) == 1){			
			$_SESSION['usuario']=$usuario[0]['usuario'];
			$_SESSION['idempleado']=$usuario[0]['codempleado'];
            $_SESSION['codcargo'] = $usuario[0]['codcargo'];
			redirect(base_url().'SisCompilador','refresh');
		}else{
			redirect(base_url(),'refresh');
		}
	}

	public function cerrarsession(){
		session_destroy();
		redirect(base_url(),'refresh');
	}
}
