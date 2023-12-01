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
}