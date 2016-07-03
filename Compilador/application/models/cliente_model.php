<?php
	class cliente_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		
		function Nuevo(){
			$this->db->select_max('codcliente');
			$query = $this->db->get('cliente'); 
			return $query->result();
		}

		function Insertar($cod,$dni,$nom,$app,$apm,$direc,$correo,$cel,$sex,$est){
			$data = array(
	                'codcliente' => $cod,'dnicliente' => $dni,'nombre' => $nom,'appaterno' => $app,
	                'apmaterno' => $apm,'direccion' => $direc,'email' => $correo,'celular' => $cel,
	                'sexo' => $sex,'estado' => $est
	        );
			$this->db->insert("cliente",$data);
		}

		function Modificar($cod,$dni,$nom,$app,$apm,$direc,$correo,$cel,$sex){
			$data = array(
	            	'dnicliente' => $dni,'nombre' => $nom,'appaterno' => $app,'apmaterno' => $apm,
	                'direccion' => $direc,'email' => $correo,'celular' => $cel,'sexo' => $sex       
	        ); 
			$this->db->where('codcliente', $cod);
			$this->db->update('cliente', $data); 
		}
		
		function Eliminar($codigo){
			$data = array(
               'estado' => 0
            );
			$this->db->where('codcliente', $codigo);
			$this->db->update('cliente', $data);  
		}

		function MostrarClientes(){
			$query = $this->db->get_where('cliente', array('estado' => 1));
			return $query->result();
		}

		function MostrarCliente($cod){
			$query = $this->db->get_where('cliente', array('codcliente' => $cod));
			return $query->result();
		}
	}
?>