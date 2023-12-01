<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Verifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('user_id'))) {
            redirect(site_url(), 'refresh');
        }
        $this->load->model('Verifikasi_model', 'verifikasi_model');
        // is_logged_in();
    }
    function index()
    {
        $data['title'] = 'Verifikasi Jaring Program';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('user_id')])->row_array();


        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->order_by('lks_vjp.id', 'ASC');
        $query = $this->db->get('lks_vjp');

        $data['vjp'] = $query->result_array(); //array banyak
        $data['kec'] = $this->verifikasi_model->getKecamatan();

        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('program', 'Program', 'required');
        $this->form_validation->set_rules('tanggapan', 'Tanggapan', 'required');

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('verifikasi/index', $data);
        $this->load->view('templates/footer');


        // if ($this->form_validation->run() == false) {
        // } else {
        //     $data = [
        //         'nik'       => $this->input->post('nik'),
        //         'nama'      => $this->input->post('nama'),
        //         'alamat'    => $this->input->post('alamat'),
        //         'namakel' => $this->input->post('kelurahan'),
        //         'namakec' => $this->input->post('kecamatan'),
        //         'nohp'      => $this->input->post('nohp'),
        //         'tanggapan' => $this->input->post('tanggapan'),
        //         'user_id'   => $this->session->userdata('user_id')
        //     ];

        //     $this->db->insert('lks_vjp', $data);
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">New vjp added!</div>');
        //     redirect('vjp');
        // }
    }

    function getKelurahanList()
    {
        // $idkec = $this->input->post('id', TRUE);
        // $postData = $this->input->post();
        // var_dump($postData);
        // die;
        // $data = $this->verifikasi_model->getKelurahan($postData);
        // echo json_encode($data);

        if ($this->input->post('idkec')) {
            echo $this->verifikasi_model->getKelurahan($this->input->post('idkec'));
        }
    }

    public function add()
    {
        $data['title'] = 'Verifikasi Jaring Program';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('user_id')])->row_array();
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->order_by('id', 'ASC');
        $data['vjp'] = $this->db->get('lks_vjp')->result_array(); //array banyak

        $data['kec'] = $this->verifikasi_model->getKecamatan();


        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('program', 'Program', 'required');
        $this->form_validation->set_rules('tanggapan', 'Tanggapan', 'required');
        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('verifikasi/add', $data);
        $this->load->view('templates/footer');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', "Data Gagal Di Tambahkan");
            // redirect('verifikasi');
        } else {
            $data = [
                'nik'       => $this->input->post('nik'),
                'nama'      => $this->input->post('nama'),
                'alamat'    => $this->input->post('alamat'),
                'namakel' => $this->input->post('kelurahan'),
                'namakec' => $this->input->post('kecamatan'),
                'nohp'      => $this->input->post('nohp'),
                'program'   => $this->input->post('program'),
                'tanggapan' => $this->input->post('tanggapan'),
                'user_id'   => $this->session->userdata('user_id')
            ];

            $this->db->insert('lks_vjp', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">New Verifikasi added!</div>');
            redirect('verifikasi');
        }
    }

    public function edit($id)
    {
        // var_dump($id);
        // die;
        if (!isset($id)) redirect('verifikasi');
        $data['title'] = 'Verifikasi Jaring Program';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('user_id')])->row_array();
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->order_by('id', 'ASC');
        // $data['vjp'] = $this->db->get('lks_vjp')->result_array(); //array banyak


        $data = [
            'nik'       => $this->input->post('nik'),
            'nama'      => $this->input->post('nama'),
            'alamat'    => $this->input->post('alamat'),
            'namakel' => $this->input->post('kelurahan'),
            'namakec' => $this->input->post('kecamatan'),
            'nohp'      => $this->input->post('nohp'),
            'program'   => $this->input->post('program'),
            'tanggapan' => $this->input->post('tanggapan'),
            'user_id'   => $this->session->userdata('user_id')
        ];
        $this->db->where('id', $id);
        $this->db->update('lks_vjp', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">verifikasi data edited!</div>');
        redirect('verifikasi');
    }

    public function delete($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert">Data Anda Gagal Di Hapus');
            redirect('verifikasi');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('lks_vjp');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">Data Berhasil Dihapus');
            redirect('verifikasi');
        }
    }
}
