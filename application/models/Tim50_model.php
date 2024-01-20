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
    public function existDpt()
    {
        $query = $this->db->query("SELECT EXISTS(SELECT noktp FROM `dpt` WHERE `noktp`= '7303011505860004') as EXIST;")->row();
        return $query->EXIST;
    }
    //menampilkan data mahasiswa berdasarkan id mahasiswa
    //menyimpan data mahasiswa
    public function save()
    {
        $data = [
            'nik'       => $this->input->post('nik'),
            'nama'      => $this->input->post('nama'),
            'alamat'    => $this->input->post('alamat'),
            'rt'    => $this->input->post('rt'),
            'rw'    => $this->input->post('rw'),
            'tps'    => $this->input->post('tps'),
            'namakel' => $this->input->post('kelurahan'),
            'namakec' => $this->input->post('kecamatan'),
            'nohp'      => $this->input->post('nohp'),
            'user_id'   => $this->session->userdata('user_id')
        ];
        return $this->db->insert($this->table, $data);
    }

    //edit data mahasiswa
    public function update()
    {
        $data = [
            'nik'       => $this->input->post('nik'),
            'nama'      => $this->input->post('nama'),
            'alamat'    => $this->input->post('alamat'),
            'rt'    => $this->input->post('rt'),
            'rw'    => $this->input->post('rw'),
            'tps'    => $this->input->post('tps'),
            'namakel' => $this->input->post('kelurahan'),
            'namakec' => $this->input->post('kecamatan'),
            'nohp'      => $this->input->post('nohp'),
            'user_id'   => $this->session->userdata('user_id')
        ];
        return $this->db->update($this->table, $data, ['id' => $this->input->post('id')]);
    }

    //hapus data mahasiswa
    public function delete($id)
    {
        return $this->db->delete($this->table, ["id" => $id]);
    }

    function getkec($searchTerm = "")
    {
        $this->db->select('idkec, namakec');
        $this->db->where("namakec like '%" . $searchTerm . "%' ");
        $this->db->order_by('idkec', 'asc');
        $fetched_records = $this->db->get('kec');
        $datakec = $fetched_records->result_array();

        $data = array();
        foreach ($datakec as $kec) {
            $data[] = array("id" => $kec['idkec'], "text" => $kec['namakec']);
        }
        return $data;
    }

    function getkel($idkec, $searchTerm = "")
    {
        $this->db->select('iddesa, namakel');
        $this->db->where('idkec', $idkec);
        $this->db->where("namakel like '%" . $searchTerm . "%' ");
        $this->db->order_by('iddesa', 'asc');
        $fetched_records = $this->db->get('kelupaten');
        $datakel = $fetched_records->result_array();

        $data = array();
        foreach ($datakel as $kel) {
            $data[] = array("id" => $kel['iddesa'], "text" => $kel['namakel']);
        }
        return $data;
    }
}
