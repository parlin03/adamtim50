<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bpum_model extends CI_Model
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     // $this->load->database();
    //     // $namakec = 'panakukkang';
    // }
    public function getBpumKecamatan($limit, $start, $namakec, $keyword = null)
    {
        if ($namakec == 'panakkukang') {
            $this->db->where('kecamatan', $namakec);
            $this->db->or_where('kecamatan', 'panakukkang');
        } else {

            $this->db->where('kecamatan', $namakec);
        }

        if ($keyword) {
            $this->db->like('nama', $keyword);
            // $this->db->or_like('noktp', $keyword);
        }

        return $this->db->get('tbl_bpum', $limit, $start)->result_array();
    }

    public function countAllBpum($namakec, $keyword = null)
    {
        // $this->db->where('kecamatan', $namakec);
        if ($namakec == 'panakkukang') {
            $this->db->where('kecamatan', $namakec);
            $this->db->or_where('kecamatan', 'panakukkang');
        } else {

            $this->db->where('kecamatan', $namakec);
        }

        if ($keyword) {
            $this->db->like('nama', $keyword);
            // $this->db->or_like('noktp', $keyword);
        }

        return $this->db->count_all_results('tbl_bpum');
    }
}
