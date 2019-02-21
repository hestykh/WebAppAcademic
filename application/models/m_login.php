<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model {

	public function data_login($table,$where){		
		$this->db->select('*')
			->from($table)
			->join('role',$table.'.role = role.kode_role')
			->join('status',$table.'.status = status.kode_status')
			->where($where);
		return $this->db->get();
	}
	
	public function get_nama($kode_user,$table){
		return $this->db->query("select * from $table where kode_user = ".$kode_user);
	}
	
}