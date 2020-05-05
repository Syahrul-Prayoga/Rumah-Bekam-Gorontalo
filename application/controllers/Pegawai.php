<?php

class Pegawai extends CI_Controller
{

    public function index()
    {
        $data['icon'] = 'fas fa-user-tie';
        $data['judul'] = 'Daftar Pegawai';
        // $data['pegawai'] = $this->model('Pegawai_model')->getAllPegawai();
        $this->load->model('m_pegawai');
        $data['pegawai'] = $this->m_pegawai->get_data();
        $this->load->view('templates/header', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer');
    }

    // public function tambah()
    // {
    //     if ($this->model('Pegawai_model')->tambahDataPegawai($_POST) > 0) {
    //         Flasher::setFlash('Data Pegawai', 'BERHASIL', 'Ditambahkan', 'success');
    //         header('location: ' . BASEURL . '/pegawai');
    //         exit;
    //     } else {
    //         Flasher::setFlash('Data Pegawai',  'GAGAL', 'Ditambahkan', 'danger');
    //         header('location: ' . BASEURL . '/pegawai');
    //         exit;
    //     }
    // }

    // public function hapus($id_pegawai)
    // {
    //     if ($this->model('Pegawai_model')->hapusDataPegawai($id_pegawai) > 0) {
    //         Flasher::setFlash('Data Pegawai', 'BERHASIL', 'Dihapus', 'success');
    //         header('location: ' . BASEURL . '/pegawai');
    //         exit;
    //     } else {
    //         Flasher::setFlash('Data Pegawai',  'GAGAL', 'Dihapus', 'danger');
    //         header('location: ' . BASEURL . '/pegawai');
    //         exit;
    //     }
    // }

    // public function getUbah()
    // {
    //     echo json_encode($this->model('Pegawai_model')->getPegawaiById($_POST['id_pegawai']));
    // }

    // public function ubah()
    // {
    //     if ($this->model('Pegawai_model')->ubahDataPegawai($_POST) > 0) {
    //         Flasher::setFlash('Data Pegawai', 'Berhasil', 'Diubah', 'success');
    //         header('Location: ' . BASEURL . '/pegawai');
    //         exit;
    //     } else {
    //         Flasher::setFlash('Data Pegawai', 'Gagal', 'Diubah', 'danger');
    //         header('Location: ' . BASEURL . '/pegawai');
    //         exit;
    //     }
    // }

    // public function cari()
    // {
    //     $data['icon'] = 'fas fa-user-tie';
    //     $data['judul'] = 'Daftar Pegawai';
    //     $data['pegawai'] = $this->model('Pegawai_model')->cariDataPegawai();
    //     $this->view('templates/header', $data);
    //     $this->view('pegawai/index', $data);
    //     $this->view('templates/footer');
    // }
}
