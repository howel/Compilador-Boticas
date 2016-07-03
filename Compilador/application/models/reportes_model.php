<?php
	class reportes_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function Clientes(){
			$this->db->select('*');
			$this->db->where('cliente.estado',1);
			$this->db->from('cliente');

			$query = $this->db->get();
			return $query->result();
		}

		function Clientes1(){
			$this->db->select('*');
			$this->db->where('cliente.estado',1);
			$this->db->from('cliente');

			$query = $this->db->get();
			return $query->result_array();
		}
	}
?>