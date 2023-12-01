<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Dtdc extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('user_id'))) {
            redirect(site_url(), 'refresh');
        }
        $this->load->model('Dtdc_model', 'm_dtdc');
        // is_logged_in();
    }
    function index()
    {
        $data['title'] = 'Door to Door Campaign';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('user_id')])->row_array();
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->order_by('id', 'ASC');
        $data['dtdc'] = $this->db->get('lks_dtdc')->result_array(); //array banyak

        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tanggapan', 'Tanggapan', 'required');

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dtdc', $data);
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

        //     $this->db->insert('lks_dtdc', $data);
        //     $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">New DTDC added!</div>');
        //     redirect('dtdc');
        // }
    }
    public function add()
    {
        $data['title'] = 'Door to Door Campaign';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('user_id')])->row_array();
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->order_by('id', 'ASC');
        $data['dtdc'] = $this->db->get('lks_dtdc')->result_array(); //array banyak

        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', "Data Gagal Di Tambahkan");
            redirect('dtdc');
        } else {
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

            $this->db->insert('lks_dtdc', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">New DTDC added!</div>');
            redirect('dtdc');
        }
    }

    public function edit($id = null)
    {
        // var_dump($id);
        // die;
        if (!isset($id)) redirect('dtdc');
        $data['title'] = 'Door to Door Campaign';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('user_id')])->row_array();
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->order_by('id', 'ASC');
        $data['dtdc'] = $this->db->get('lks_dtdc')->result_array(); //array banyak

        $this->form_validation->set_rules('nik', 'Nik', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', "Data Gagal Di Tambahkan");
            redirect('dtdc');
        } else {
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
            $this->db->where('id', $id);
            $this->db->update('lks_dtdc', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">DTDC data edited!</div>');
            redirect('dtdc');
        }
    }

    public function delete($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert">Data Anda Gagal Di Hapus');
            redirect('dtdc');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('lks_dtdc');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">Data Berhasil Dihapus');
            redirect('dtdc');
        }
    }
}
