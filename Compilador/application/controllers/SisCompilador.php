<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SisCompilador extends CI_Controller {
	public function index(){
		$this->load->database('default');
		$this->load->model('Datosmaestros_model');

		$this->load->view("SisCompilador/index.php");
	}
}