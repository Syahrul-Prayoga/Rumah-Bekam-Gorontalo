<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
		$id_role = $this->db->get_where('user', ['username' => $this->session->userdata('id_role')])->row_array();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();

		$data['barang'] = $this->m_barang->get_data();
		$data['icon'] = 'fas fa-cubes';
		$data['judul'] = 'Daftar Barang';

		$this->load->view('templates/header', $data);
		$this->load->view('barang/index', $data);
		$this->load->view('templates/footer');
	}
	public function hapus($id_barang)
	{
		$where = array('id_brg' => $id_barang);
		$this->m_barang->hapusData($where, 'tb_barang');
		$this->session->set_flashdata('hapus', '<div class="alert alert-success" role="alert"> Data Berhasil Dihapus</div>');
		redirect('barang');
	}

	public function tambahData()
	{
		$id_role = $this->db->get_where('user', ['username' => $this->session->userdata('id_role')])->row_array();
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

	public function ubahData($id_barang)
	{
		// tampilan ubah data
		$where = array('id_brg' => $id_barang);

		$data['barang'] = $this->m_barang->ubahData($where, 'tb_barang')->result();
		$id_role = $this->db->get_where('user', ['username' => $this->session->userdata('id_role')])->row_array();
		$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
		$data['icon'] = 'fas fa-user-tie';
		$data['judul'] = 'Daftar barang';

		$this->load->view('templates/header', $data);
		$this->load->view('barang/ubah', $data);
		$this->load->view('templates/footer');
	}

	public function prosesUbahData()
	{
		$id_barang = $this->input->post('id_brg');
		$nama_barang = $this->input->post('nama_brg');
		$hrg_pokok = $this->input->post('hrg_pokok');
		$hrg_jual = $this->input->post('hrg_jual');
		$tgl_exp = $this->input->post('tgl_exp');
		$stok = $this->input->post('stok');
		$ket = $this->input->post('ket');
		$kategori = $this->input->post('kategori');

		$data = array(
			'id_brg' => $id_barang,
			'nama_brg' => $nama_barang,
			'hrg_pokok' => $hrg_pokok,
			'hrg_jual' => $hrg_jual,
			'tgl_exp' => $tgl_exp,
			'stok' => $stok,
			'ket' => $ket,
			'kategori' => $kategori

		);
		$where = ['id_brg' => $id_barang];
		$this->m_barang->prosesUbahData($where, $data, 'tb_barang');
		$this->session->set_flashdata('ubah', '<div class="alert alert-success" role="alert"> Data Berhasil Diubah</div>');
		redirect('barang');
	}
}
