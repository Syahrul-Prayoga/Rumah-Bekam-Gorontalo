<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_model
{

	public function get_user()
	{
		return $this->db->get('user')->result_array();
	}

	public function hapusData($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function ubahData($where,$table)
	{
		return $this->db->get_where($table,$where);
	}

	// public function prosesUbahData($where, $data, $table)
	// {
	// 	$this->db->where($where);

	// 	$this->db->update($table, $data);
	// }
}