<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Gender_model extends CI_Model
{

  public function getGender()
  {
    $query = "SELECT idkec, namakec, COUNT(sex)as 'total', 
              COUNT(DISTINCT concat(namakel,rw)) as jrw, 
              COUNT(DISTINCT concat( namakel,rw,rt)) as jrt, 
              COUNT(IF(sex = 'Lk',1,NULL)) AS 'Pria',
              COUNT(IF(sex = 'Pr',1,NULL)) AS 'Wanita'
              FROM (SELECT idkec,namakec,namakel, rw, rt, sex 
              FROM dpt) as dummy_table  GROUP by namakec 
              ORDER BY `dummy_table`.`idkec` ASC
        ";
    //  return  $this->db->query($query)->result_array();
    //  return $query->result();
    return  $this->db->query($query)->result();
  }
  public function getGenderKecamatan($namakec)
  {
    $query = "SELECT iddesa, namakec, namakel, COUNT(DISTINCT rw) as jrw, 
        COUNT(DISTINCT concat( namakel,rw,rt)) as jrt,
        COUNT(sex)as 'total', 
         COUNT(IF(sex = 'Lk',1,NULL)) AS 'Pria',
         COUNT(IF(sex = 'Pr',1,NULL)) AS 'Wanita'
         FROM (select idkec, iddesa, namakec, namakel, rw, rt, sex from dpt)
          as dummy_table  where namakec = '$namakec' GROUP by namakel
          ORDER BY `dummy_table`.`iddesa` ASC
        ";
    return  $this->db->query($query)->result();
  }
}
