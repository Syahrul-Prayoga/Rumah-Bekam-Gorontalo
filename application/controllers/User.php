<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_controller
{
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
        $data['using'] = $this->m_user->get_user();
        $data['icon'] = 'fas fa-user-tie';
        $data['judul'] = 'Daftar User';

        $this->load->view('templates/header', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
	}

	public function hapus($id_user)
    {
        $where= array('id_user' =>$id_user);
        $this->m_user->hapusData($where, 'user');
        $this->session->set_flashdata('hapus', '<div class="alert alert-success" role="alert"> Data Berhasil Dihapus</div>');
        redirect('user');
    }

    public function tambahData()
	{
		// validasi data register

	// validasi nama
		$this->form_validation->set_rules('NamaLengkap', 'Nama Lengkap', 'required|trim');
	// validasi username
		$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]',[
				'is_unique' => 'Username sudah pernah digunakan'
			]);
	// validasi password
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
				'matches' => 'Konfirmasi password salah!',
				'min_length' => 'Password minimal harus 3 karakter'
			]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

	// jika data tidak valid
		if ($this->form_validation->run() == false) {
			$id_role =$this->db->get_where('user', ['username' => $this->session->userdata('id_role')])->row_array();
	       	$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
			$data['judul'] = 'Tambah User';
			$this->load->view('templates/header', $data);
			$this->load->view('user/tambah', $data);
			$this->load->view('templates/footer');
		}else
		{
	// jika data valid
			// pengambilan data dari inputan
			$data = [
				'NamaLengkap' => htmlspecialchars($this->input->post('NamaLengkap', true)),
				'username' => htmlspecialchars($this->input->post('username', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'id_role' => 2,
				'is_aktiv' =>1
			];
			// memasukkan data inputan ke database
			$this->db->insert('user', $data);
			$this->session->set_flashdata('tambah', '<div class="alert alert-success" role="alert"> Akun baru berhasil ditambahkan</div>');
			redirect('user');
		}
	}

	public function ubah_Data($id_user)
    {
     // tampilan ubah data
        $where = array('id_user' => $id_user);
            
        $data['using'] = $this->m_user->ubahData($where, 'user')->result();
        $id_role =$this->db->get_where('user', ['username' => $this->session->userdata('id_role')])->row_array();
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['icon'] = 'fas fa-user-tie';
        $data['judul'] = 'Ubah User';

        $this->load->view('templates/header', $data);
        $this->load->view('user/ubah', $data);
        $this->load->view('templates/footer');
    }

	// public function prosesUbahData()
	// {
	// 	// validasi data register

	// // validasi nama
	// 	$this->form_validation->set_rules('NamaLengkap', 'Nama Lengkap', 'required|trim');
	// // validasi username
	// 	$this->form_validation->set_rules('username', 'Username', 'required|trim'
	// 		);
	// // validasi password
	// 	$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
	// 			'matches' => 'Konfirmasi password salah!',
	// 			'min_length' => 'Password minimal harus 3 karakter'
	// 		]);
	// 	$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

	// // jika data tidak valid
	// 	if ($this->form_validation->run() == false) {
	// 		$id_role =$this->db->get_where('user', ['username' => $this->session->userdata('id_role')])->row_array();
	//        	$data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
	// 		$data['judul'] = 'Tambah User';
	// 		$this->load->view('templates/header', $data);
	// 		$this->load->view('user/tambah', $data);
	// 		$this->load->view('templates/footer');
	// 	}else
	// 	{
	// // jika data valid
	// 		// pengambilan data dari inputan
	// 		$id_user = $this->input->post('id_user');
	//         $id_role = $this->input->post('id_role');
	//         $is_aktiv = $this->input->post('is_aktiv');
	//         $NamaLengkap = $this->input->post('NamaLengkap');
	//         $username = $this->input->post('username');
	//         $password = $this->input->post('password1');
	// 		$data = array(
	// 			'id_user' =>$id_user,
	// 			'NamaLengkap' => $NamaLengkap,
	// 			'username' => $username,
	// 			'password' => $password,
	// 			'id_role' => $id_role,
	// 			'is_aktiv' => $is_aktiv
	// 		);

	// 		$where = ['id_user' => $id_user];
	// 		// memasukkan data inputan ke database
	// 		$this->m_user->prosesUbahData($where, $data, 'user');
	// 		$this->session->set_flashdata('ubah', '<div class="alert alert-success" role="alert"> Akun berhasil di ubah</div>');
	// 		redirect('user');
	// 	}
	// }
}
