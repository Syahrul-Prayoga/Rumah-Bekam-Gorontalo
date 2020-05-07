<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_controller
{
	// harus di semua controller, kecuali controller login
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('username')) {
			$this->session->set_flashdata('danger', '<div class="alert alert-danger" role="alert"> Silahkan login terlebih dahulu!</div>');
			redirect('login');
		}
	}

	public function index()
	{
		$id_role =$this->db->get_where('user', ['username' => $this->session->userdata('id_role')])->row_array();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

        $data['barang'] = $this->m_barang->get_data();
        $data['icon'] = 'fas fa-user-tie';
        $data['judul'] = 'Daftar Barang';

        $this->load->view('templates/header', $data);
        $this->load->view('barang/index', $data);
        $this->load->view('templates/footer');
	}
	public function hapus($id_barang)
	{
		$where= array('id_brg' =>$id_barang);
		$this->m_barang->hapusData($where, 'tb_barang');
		$this->session->set_flashdata('hapus', '<div class="alert alert-success" role="alert"> Data Berhasil Dihapus</div>');
		redirect('barang');
	}

	public function tambahData()
	{
		$id_role =$this->db->get_where('user', ['username' => $this->session->userdata('id_role')])->row_array();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->model('m_barang');
        $data['barang'] = $this->m_barang->get_data();
        $data['icon'] = 'fas fa-user-tie';
        $data['judul'] = 'Daftar Barang';

        $this->load->view('templates/header', $data);
        $this->load->view('barang/tambah', $data);
        $this->load->view('templates/footer');
	}
	public function prosesTambahData()
	{
		$this->m_barang->prosesTambahData();
		$this->session->set_flashdata('tambah', '<div class="alert alert-success" role="alert"> Data Berhasil Ditambahkan</div>');
		redirect('barang');
	}
}