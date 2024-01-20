<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getMainGraph()
    {
        $this->db->select('count(id) as total, date_created');
        $this->db->from('lks_tim50');
        $this->db->where('lks_tim50.user_id', $this->session->userdata('user_id'));
        $this->db->group_by('date_created');
        $this->db->order_by('date_created', 'ASC');

        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    public function getTotalDaftar()
    {
        $this->db->select('count(lks_tim50.noktp) as totaldaftar');
        $this->db->from('lks_tim50');
        $this->db->where('lks_tim50.user_id', $this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getTotalDpt()
    {
        $this->db->select('count(id) as totaldpt');
        $this->db->from('dpt');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getPencapaian()
    {
        $this->db->select('lks_tim50.id, noktp, nama, alamat, namakel, namakec, rt, rw, tps, count(lks_tim50.noktp) as total');
        $this->db->from('lks_tim50');
        $this->db->where('lks_tim50.user_id', $this->session->userdata('user_id'));
        $this->db->group_by('namakec');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getLksTim50()
    {
        $this->db->select('lks_tim50.id, noktp, nama, alamat, namakel, namakec, rt, rw, tps, lks_tim50.status, lks_tim50.nohp');
        $this->db->from('lks_tim50');
        $this->db->where('lks_tim50.user_id', $this->session->userdata('user_id'));
        $this->db->order_by('lks_tim50.id', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        return $query->result_array();
    }
}
