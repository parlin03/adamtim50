<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bedahrumah_model extends CI_Model
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     // $this->load->database();
    //     // $namakec = 'panakukkang';
    // }
    public function getBedahrumahKecamatan($limit, $start, $namakec, $keyword = null)
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

        return $this->db->get('tbl_bedahrumah', $limit, $start)->result_array();
    }

    public function countAllBedahrumah($namakec, $keyword = null)
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

        return $this->db->count_all_results('tbl_bedahrumah');
    }
}
