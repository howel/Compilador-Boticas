<?php
	class entrar_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}

		function logear($user,$clave){
			$this->db->where('usuario',$user);
			$this->db->where('clave',$clave);
			$this->db->from('empleado');
			$query = $this->db->get();
			return $query->result_array();
		}
	}
?>