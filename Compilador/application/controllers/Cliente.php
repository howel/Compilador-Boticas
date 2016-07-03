<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente extends CI_Controller {
	
	public function index(){		
		$this->load->database('default');
		$this->load->model('Cliente_model');

		$Clientes = $this->Cliente_model->MostrarClientes();
		$this->load->view("Cliente/index.php",compact("Clientes"));
	}

	public function Nuevo(){
		$this->load->database('default');
		$this->load->model('Cliente_model');

		$NuevoCliente = $this->Cliente_model->Nuevo();
		echo json_encode($NuevoCliente);
	}

	public function Guardar(){
		$this->load->database('default');
		$this->load->model('Cliente_model');

		$NuevoCliente= $this->Cliente_model->Insertar($this->input->post("codcliente"),$this->input->post("dni"),
			$this->input->post("nombre"),$this->input->post("apellidop"),$this->input->post("apellidom"),
			$this->input->post("direccion"),$this->input->post("email"),$this->input->post("celular"),
			$this->input->post("sexo"),1);
		echo "<center><span class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span> <b> Cliente Registrado Correctamente </b> </center>";
	}

	public function Modificando(){
		$this->load->database('default');
		$this->load->model('Cliente_model');

		$Cliente= $this->Cliente_model->MostrarCliente($this->input->post("modificar"));
		echo json_encode($Cliente);
	}

	public function Modificar(){
		$this->load->database('default');
		$this->load->model('Cliente_model');

		$NuevoCliente= $this->Cliente_model->Modificar($this->input->post("codcliente"),$this->input->post("dni"),
			$this->input->post("nombre"),$this->input->post("apellidop"),$this->input->post("apellidom"),
			$this->input->post("direccion"),$this->input->post("email"),$this->input->post("celular"),
			$this->input->post("sexo"));
		echo "<center><span class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span> <b> Cliente Modificado Correctamente </b> </center>";
	}

	public function Eliminar(){
		$this->load->database('default');
		$this->load->model('Cliente_model');
		
		$NuevoCliente= $this->Cliente_model->Eliminar($this->input->post("eliminar"));
		echo "<center> <span class='glyphicon glyphicon-warning-sign' aria-hidden='true'></span> <b> Cliente Eliminado Correctamente </b> </center>";	
	}
}