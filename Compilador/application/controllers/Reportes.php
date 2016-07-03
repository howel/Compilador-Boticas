<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."/third_party/fpdf/fpdf.php";

class Reportes extends CI_Controller {

	public function clientes(){	
		$this->load->database('default');
		$this->load->model('Reportes_model');

		$Clientes = $this->Reportes_model->Clientes();
		$this->load->view("Reportes/ReporteClientes.php",compact("Clientes"));
	}

	public function buscar(){
		//$default = $CI->load->database('default', TRUE);

		$this->dbdefault = $this->load->database('default', TRUE);
		$this->dbmysql = $this->load->database('mysql', TRUE);

		//$this->load->database('default');
	    $result = $this->dbdefault->get_where('cliente', array($_POST["c"] => strtoupper($_POST["p"])));
	    $resultadopostgres = $result->result();


	    $result2 = $this->dbmysql->get_where('cliente', array($_POST["c"] => $_POST["p"]));
	    $resultadomysql = $result2->result();

	    $arrayresult = array();
	    $arrayresult =  array_merge($resultadopostgres, $resultadomysql);

	    print json_encode($arrayresult);
	} 	

	public function ImprimirClientes($c,$p){		

		$this->dbdefault = $this->load->database('default', TRUE);
		$this->dbmysql = $this->load->database('mysql', TRUE);

		//$this->load->database('default');
	    $result = $this->dbdefault->get_where('cliente', array($c => strtoupper($p)));
	    $resultadopostgres = $result->result_array();
	 
	    $result2 = $this->dbmysql->get_where('cliente', array($c => $p));
	    $resultadomysql = $result2->result_array();

	  	$Clientes =  array_merge($resultadopostgres, $resultadomysql);
		$this->load->view("Reportes/ImprimirClientes.php",compact("Clientes"));
	} 
}