<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barang extends CI_model
{
	public function get_data()
	{
		return $this->db->get('tb_barang')->result_array();
	}

	public function prosesTambahData()
	{
		$data = [
			'nama_brg' => $this->input->post('nama_brg'),
			'hrg_pokok' => $this->input->post('hrg_pokok'),
			'hrg_jual' => $this->input->post('hrg_jual'),
			'tgl_exp' => $this->input->post('tgl_exp'),
			'stok' => $this->input->post('stok'),
			'ket' => $this->input->post('ket'),
			'kategori' => $this->input->post('kategori')
		];

		$this->db->insert('tb_barang', $data);
	}

	public function hapusData($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function ubahData($where, $table)
	{
		return $this->db->get_where($table, $where);
	}

	public function prosesUbahData($where, $data, $table)
	{
		$this->db->where($where);

		$this->db->update($table, $data);
	}
}
