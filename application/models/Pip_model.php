<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pip_model extends CI_Model
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     // $this->load->database();
    //     // $namakec = 'panakukkang';
    // }
    public function getPipKecamatan($limit, $start, $namakec, $keyword = null)
    {
        $this->db->where('kec_siswa', $namakec);

        if ($keyword) {
            $this->db->like('nama_siswa', $keyword);
            // $this->db->or_like('noktp', $keyword);
        }

        return $this->db->get('tbl_pip', $limit, $start)->result_array();
    }

    public function countAllPip($namakec, $keyword = null)
    {
        $this->db->where('kec_siswa', $namakec);

        if ($keyword) {
            $this->db->like('nama_siswa', $keyword);
            // $this->db->or_like('noktp', $keyword);
        }

        return $this->db->count_all_results('tbl_pip');
    }
}
