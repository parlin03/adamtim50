<?php

use Symfony\Component\Yaml\Dumper;

defined('BASEPATH') or exit('No direct script access allowed');

class Tim50_model extends CI_Model
{
    private $table = 'lks_tim50';
    private $tbl_dpt = 'dpt';


    public function __construct()
    {
        parent::__construct();
    }



    public function rules()
    {
        return [
            [
                'field' => 'noktp',  //samakan dengan atribute name pada tags input
                'label' => 'Noktp',  // label yang kan ditampilkan pada pesan error
                'rules' => 'trim|required' //rules validasi
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'alamat',
                'label' => 'Alamat',
                'rules' => 'trim|required'
            ]
        ];
    }

    public function getById($id)
    {
        return $this->db->get_where($this->table, ["id" => $id])->row();
        //query diatas seperti halnya query pada mysql 
        //select * from mahasiswa where IdMhsw='$id'
    }

    //menampilkan semua data mahasiswa
    public function getAll()
    {
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->from($this->table);
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
        return $query->result();
        //fungsi diatas seperti halnya query 
        //select * from mahasiswa order by IdMhsw desc
    }

    public function getLksTim50()
    {
        $this->db->select('id, noktp, nama, alamat, namakel, namakec, rt, rw, tps, status, nohp');
        $this->db->from('lks_tim50');
        $this->db->where('lks_tim50.user_id', $this->session->userdata('user_id'));
        $this->db->order_by('lks_tim50.id', 'DESC');
        $this->db->limit(5);
        $query = $this->db->get();
        // var_dump($this->db->last_query());
        // die;
        return $query->result_array();
    }

    public function search($keyword)
    {
        if (!$keyword) {
            return null;
        }
        $this->db->like('noktp', $keyword);
        $query = $this->db->get($this->tbl_dpt);

        return $query->result_array();
    }

    function getDataDetails()
    {

        $this->db->select('lks_tim50.id, status, noktp, nama, alamat, namakel, namakec, rt, rw, tps,  lks_tim50.nohp');
        $this->db->from('lks_tim50');
        $this->db->where('lks_tim50.user_id', $this->session->userdata('user_id'));
        $this->db->order_by('lks_tim50.id', 'DESC');
        $query = $this->db->get();
        // var_dump($query);
        // die;
        return $query->result_array();
    }
    // public function existDpt()
    // {
    //     $query = $this->db->query("SELECT EXISTS(SELECT noktp FROM `dpt` WHERE `noktp`= '7303011505860004') as EXIST;")->row();
    //     return $query->EXIST;
    // }
    //menampilkan data mahasiswa berdasarkan id mahasiswa
    //menyimpan data mahasiswa
    public function save()
    {
        $this->db->trans_start();

        $data = [
            'dpt_id'    => $this->input->post('dpt_id'),
            'noktp'     => $this->input->post('noktp'),
            'nama'      => $this->input->post('nama'),
            'alamat'    => $this->input->post('alamat'),
            'rt'        => $this->input->post('rt'),
            'rw'        => $this->input->post('rw'),
            'namakel'   => $this->input->post('kelurahan'),
            'namakec'   => $this->input->post('kecamatan'),
            'tps'       => $this->input->post('tps'),
            'status'    => $this->input->post('status'),
            'nohp'    => $this->input->post('nohp'),
            'user_id'   => $this->session->userdata('user_id'),
            'date_created'   => date("Y-m-d")

        ];
        $this->db->insert($this->table, $data);

        $this->db->trans_complete();
        // was there any update or error?
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            // any trans error?
            if ($this->db->trans_status() === FALSE) {
                return false;
            }
            return true;
        }
    }


    public function update($id)
    {
        $this->db->trans_start();

        $data = [
            'dpt_id'    => $this->input->post('dpt_id'),
            'noktp'     => $this->input->post('noktp'),
            'nama'      => $this->input->post('nama'),
            'alamat'    => $this->input->post('alamat'),
            'rt'        => $this->input->post('rt'),
            'rw'        => $this->input->post('rw'),
            'namakel'   => $this->input->post('kelurahan'),
            'namakec'   => $this->input->post('kecamatan'),
            'tps'       => $this->input->post('tps'),
            'status'    => $this->input->post('status'),
            'nohp'    => $this->input->post('nohp'),
            'user_id'   => $this->session->userdata('user_id')
        ];

        $this->db->where('id', $id);
        $this->db->update($this->table, $data);

        $this->db->trans_complete();
        // was there any update or error?
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        } else {
            // any trans error?
            if ($this->db->trans_status() === FALSE) {
                return false;
            }
            return true;
        }
    }

    //hapus data mahasiswa
    public function delete($id)
    {
        return $this->db->delete($this->table, ["id" => $id]);
    }

    public function getDataKec()
    {
        return $this->db->get('kec')->result(); // Tampilkan semua data yang ada di tabel provinsi
    }

    public function getDataKel($id_kecamatan)
    {
        $this->db->where('namakec', $id_kecamatan);
        $result = $this->db->get('kel')->result(); // Tampilkan semua data kelurahan berdasarkan id kecamtan

        return $result;
    }
}
