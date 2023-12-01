<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kip_model extends CI_Model
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     // $this->load->database();
    //     // $namakec = 'panakukkang';
    // }
    public function getKipKecamatan($limit, $start, $namakec, $keyword = null)
    {
        if ($namakec == 'panakkukang') {
            $this->db->where('namakec', $namakec);
            $this->db->or_where('namakec', 'panakukkang');
        } else {

            $this->db->where('namakec', $namakec);
        }
        if ($keyword) {
            $this->db->like('nama', $keyword);
            // $this->db->or_like('noktp', $keyword);
        }
        $this->db->order_by('angkatan', 'DESC');

        return $this->db->get('tbl_kip', $limit, $start)->result_array();
    }

    public function countAllKip($namakec, $keyword = null)
    {
        // $this->db->where('kecamatan', $namakec);
        if ($namakec == 'panakkukang') {
            $this->db->where('namakec', $namakec);
            $this->db->or_where('namakec', 'panakukkang');
        } else {

            $this->db->where('namakec', $namakec);
        }

        if ($keyword) {
            $this->db->like('nama', $keyword);
            // $this->db->or_like('noktp', $keyword);
        }

        return $this->db->count_all_results('tbl_kip');
    }
}
