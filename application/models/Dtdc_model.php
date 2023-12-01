<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dtdc_model extends CI_Model
{
    private $table = 'lks_dtdc';


    public function __construct()
    {
        parent::__construct();
    }
    public function rules()
    {
        return [
            [
                'field' => 'nik',  //samakan dengan atribute name pada tags input
                'label' => 'Nik',  // label yang kan ditampilkan pada pesan error
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

    //menampilkan data mahasiswa berdasarkan id mahasiswa
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

    //menyimpan data mahasiswa
    public function save()
    {
        $data = [
            'nik'       => $this->input->post('nik'),
            'nama'      => $this->input->post('nama'),
            'alamat'    => $this->input->post('alamat'),
            'namakel' => $this->input->post('kelurahan'),
            'namakec' => $this->input->post('kecamatan'),
            'nohp'      => $this->input->post('nohp'),
            'tanggapan' => $this->input->post('tanggapan'),
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
            'namakel' => $this->input->post('kelurahan'),
            'namakec' => $this->input->post('kecamatan'),
            'nohp'      => $this->input->post('nohp'),
            'tanggapan' => $this->input->post('tanggapan'),
            'user_id'   => $this->session->userdata('user_id')
        ];
        return $this->db->update($this->table, $data, ['id' => $this->input->post('id')]);
    }

    //hapus data mahasiswa
    public function delete($id)
    {
        return $this->db->delete($this->table, ["id" => $id]);
    }
}
