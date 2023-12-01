<?php

use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');
class Soa_model extends CI_Model
{

    public function panakkukang()
    {
        $this->db->where('namakec', 'panakkukang');
        return  $this->db->get('soa')->result();
    }
    public function manggala()
    {
        $query = "SELECT namakec, namakel, count(DISTINCT rw) as jrw, 
        count(DISTINCT concat( namakel,rw,rt)) as jrt,
        COUNT(sex)as 'total', 
         COUNT(IF(sex = 'Lk',1,NULL)) AS 'Pria',
         COUNT(IF(sex = 'Pr',1,NULL)) AS 'Wanita'
         FROM (select idkec,namakec,namakel, rw, rt, sex from dpt)
          as dummy_table  where namakec = 'manggala' GROUP by namakel
        ";
        return  $this->db->query($query)->result();
    }
    public function biringkanaya()
    {
        $query = "SELECT namakec, namakel, count(DISTINCT rw) as jrw, 
        count(DISTINCT concat( namakel,rw,rt)) as jrt,
        COUNT(sex)as 'total', 
         COUNT(IF(sex = 'Lk',1,NULL)) AS 'Pria',
         COUNT(IF(sex = 'Pr',1,NULL)) AS 'Wanita'
         FROM (select idkec,namakec,namakel, rw, rt, sex from dpt)
          as dummy_table  where namakec = 'biringkanaya' GROUP by namakel
        ";
        return  $this->db->query($query)->result();
    }
    public function tamalanrea()
    {
        $query = "SELECT namakec, namakel, count(DISTINCT rw) as jrw, 
        count(DISTINCT concat( namakel,rw,rt)) as jrt,
        COUNT(sex)as 'total', 
         COUNT(IF(sex = 'Lk',1,NULL)) AS 'Pria',
         COUNT(IF(sex = 'Pr',1,NULL)) AS 'Wanita'
         FROM (select idkec,namakec,namakel, rw, rt, sex from dpt)
          as dummy_table  where namakec = 'tamalanrea' GROUP by namakel
        ";
        return  $this->db->query($query)->result();
    }
}
