<?php

class M_pegawai extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('tb_pegawai')->result_array();
    }
}
