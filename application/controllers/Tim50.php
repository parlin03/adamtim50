<?php

use LDAP\Result;

defined('BASEPATH') or exit('No direct script access allowed');

class Tim50 extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (empty($this->session->userdata('user_id'))) {
            redirect(site_url(), 'refresh');
        }
        $this->load->model('Tim50_model', 'm_tim50');
        // is_logged_in();
    }
    function index()
    {
        $data['title'] = 'Jagai Maktim';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('user_id')])->row_array();
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $data['tim50'] = $this->m_tim50->getLksTim50(); //array banyak

        $data['keyword'] = $this->input->post('keyword');
        $this->load->model('Tim50_model');
        if ($data['keyword'] == 0) {
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" role ="alert">Masukkan NIK dengan Benar</div>');
            $data['search_result'] = '';
        } else {
            $check = $this->db->get_where('lks_tim50', ['noktp' => $data['keyword']]);
            if ($check->num_rows() > 0) {
                $pic = $this->db->get_where('user', ['id' => $check->row()->user_id]);
                $this->session->set_flashdata('message1', '<div class="alert alert-danger" role ="alert">Data NIK <b>' . $data['keyword'] . '</b> Sudah Terdaftar oleh <b>' .  ucwords($pic->row()->name) . '</b> Program <b>' . ($check->row()->program) . '</div>');

                $data['search_result'] = '';
            } else {
                $checkdpt = $this->db->get_where('dpt', ['noktp' => $data['keyword']]);
                if ($checkdpt->num_rows() > 0) {
                    $this->session->set_flashdata('message1', '<div class="alert alert-success" role ="alert">Data NIK <b>' . $data['keyword'] . '</b> Ditemukan. Tambahkan data manual </div>');
                    $data['search_result'] = $this->Tim50_model->search($data['keyword']);
                } else {
                    $this->session->set_flashdata('message1', '<div class="alert alert-danger" role ="alert">Data NIK <b>' . $data['keyword'] . '</b> Tidak Ditemukan. <a data-toggle="modal" data-target="#add" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><b>Tambahkan data ' . $data['keyword'] . '</b> </a></div>');
                    $data['search_result'] = '';
                }
            }
        }
        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tim50', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {
        $data['title'] = 'Door to Door Campaign';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('user_id')])->row_array();
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->order_by('id', 'ASC');
        $data['tim50'] = $this->db->get('lks_tim50')->result_array(); //array banyak

        $this->form_validation->set_rules('dpt_id', 'Dpt_id', 'required|is_unique[user.email]', [
            'is_unique' => 'This NIK has already registered'
        ]);

        // var_dump($this->input->post('program'));
        $datanew = [
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
        $this->db->insert('lks_tim50', $datanew);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">New data added!</div>');
        redirect('tim50');
    }

    public function edit($id = null)
    {
        // var_dump($id);
        // die;
        if (!isset($id)) redirect('tim50');
        $data['title'] = 'Door to Door Campaign';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('user_id')])->row_array();
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->order_by('id', 'ASC');
        $data['tim50'] = $this->db->get('lks_tim50')->result_array(); //array banyak

        $nohp = $this->input->post('nohp');

        // $dpt_id = $this->input->post('dpt_id');

        // cek jika da gambar yang akan diupload


        $this->db->set('nohp', $nohp);
        $this->db->where('id', $id);
        $this->db->update('lks_tim50');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Data has been updated! </div>');
        redirect('tim50');
    }

    public function delete($id = null, $image = null)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert">Data Anda Gagal Di Hapus');
            redirect('tim50');
        } else {
            unlink(FCPATH . 'assets/img/tim50/' . $image);
            $this->db->where('id', $id);
            $this->db->delete('lks_tim50');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">Data Berhasil Dihapus');
            redirect('tim50');
        }
    }

    public function getdatakec()
    {
        $searchTerm = $this->input->post('searchTerm');
        $response   = $this->m_tim50->getkec($searchTerm);
        echo json_encode($response);
    }

    // Kabupaten
    public function getdatakab($idkec)
    {
        $searchTerm = $this->input->post('searchTerm');
        $response   = $this->m_tim50->getkab($idkec, $searchTerm);
        echo json_encode($response);
    }
}
