<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function mainGraph()
    {
        // $query ="SELECT namakec, sum(total) as total FROM dpt group by namakec order by iddesa"
        $query = "SELECT `namakec`, count(idkec) as total FROM dpt group by `namakec` order by `iddesa`";

        return $this->db->query($query)->result_array();
    }
    public function graphPanakukkang()
    {
        // $query ="SELECT namakel, sum(total) as total FROM age where namakec='panakukkang' group by namakel order by iddesa""
        $query    = "SELECT namakel, count(iddesa) as total FROM dpt where namakec='panakukkang' group by namakel order by iddesa";

        return $this->db->query($query)->result_array();
    }
    public function getTotalDaftar()
    {
        $this->db->select('count(lks_dtdc.noktp) as totaldaftar');
        $this->db->from('lks_dtdc');
        $this->db->where('lks_dtdc.user_id', $this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getTotalDpt()
    {
        $this->db->select('count(dpt.id) as totaldpt');
        $this->db->from('dpt');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function getPencapaian()
    {
        $this->db->select('lks_dtdc.id, dpt.noktp, dpt.nama, dpt.alamat, namakel, namakec, rt, rw, tps, count(lks_dtdc.noktp) as total');
        $this->db->from('dpt');
        $this->db->join('lks_dtdc', 'lks_dtdc.dpt_id = dpt.id');
        $this->db->where('lks_dtdc.user_id', $this->session->userdata('user_id'));
        $this->db->group_by('namakec');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLksDtdc()
    {
        $this->db->select('lks_dtdc.id, dpt.noktp, dpt.nama, dpt.alamat, namakel, namakec, rt, rw, tps, lks_dtdc.nohp, image');
        $this->db->from('dpt');
        $this->db->join('lks_dtdc', 'lks_dtdc.dpt_id = dpt.id');
        $this->db->where('lks_dtdc.user_id', $this->session->userdata('user_id'));
        $this->db->order_by('lks_dtdc.id', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }
}
