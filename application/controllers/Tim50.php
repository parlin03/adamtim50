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
        $data['kecamatan'] = $this->m_tim50->getDataKec();

        $data['keyword'] = $this->input->post('keyword');
        $this->load->model('Tim50_model');
        if ($data['keyword'] == 0) {
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" role ="alert">Masukkan NIK dengan Benar</div>');
            $data['search_result'] = '';
        } else {
            $check = $this->db->get_where('lks_tim50', ['noktp' => $data['keyword']]);
            if ($check->num_rows() > 0) {
                $pic = $this->db->get_where('user', ['id' => $check->row()->user_id]);
                $this->session->set_flashdata('message1', '<div class="alert alert-danger" role ="alert">Data NIK <b>' . $data['keyword'] . '</b> Sudah Terdaftar oleh <b>' .  ucwords($pic->row()->name) . '</div>');

                $data['search_result'] = '';
            } else {
                $checkdpt = $this->db->get_where('dpt', ['noktp' => $data['keyword']]);
                if ($checkdpt->num_rows() > 0) {
                    $this->session->set_flashdata('message1', '<div class="alert alert-success" role ="alert">Data NIK <b>' . $data['keyword'] . '</b> Ditemukan. Tambahkan data </div>');
                    $data['search_result'] = $this->Tim50_model->search($data['keyword']);
                } else {
                    $this->session->set_flashdata('message1', '<div class="alert alert-danger" role ="alert">Data NIK <b>' . $data['keyword'] . '</b> Tidak Ditemukan. <a href="' . base_url('tim50/xdpt?id=') . $data['keyword'] . '" class="btn btn-warning btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><b>Tambahkan data ' . $data['keyword'] . '</b> </a></div>');
                    $data['search_result'] = '';
                }
            }
        }
        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tim50/index', $data);
        $this->load->view('templates/footer');
    }

    function xdpt()
    {
        $data['title'] = 'Jagai Maktim';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('user_id')])->row_array();
        $this->db->where('user_id', $this->session->userdata('user_id'));

        $this->session->set_flashdata('message1', '');
        $data['tim50'] = $this->m_tim50->getLksTim50(); //array banyak
        $data['kecamatan'] = $this->m_tim50->getDataKec();

        $data['keyword'] = $this->input->get('id');
        $this->load->model('Tim50_model');

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tim50/xdpt', $data);
        $this->load->view('templates/footer');
    }

    function xedit()
    {
        $data['title'] = 'Jagai Maktim';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('user_id')])->row_array();

        $this->session->set_flashdata('message1', '');
        $data['xedit'] = $this->m_tim50->getById($this->input->get('id'));
        $data['kecamatan'] = $this->m_tim50->getDataKec();
        $data['kelurahan'] = $this->m_tim50->getDataKel($data['xedit']->namakec);
        if ($this->input->get('fm') == null) {
            $data['update'] = 'tim50/update?id=';
        } else {
            $data['update'] = 'tim50/updatedetail?id=';
        }
        $this->load->model('Tim50_model');

        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tim50/xedit', $data);
        $this->load->view('templates/footer');
    }

    function details()
    {
        $data['title'] = 'Total Suara Terdaftar';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('user_id')])->row_array();

        $this->session->set_flashdata('message', '');

        $data['details'] = $this->m_tim50->getDataDetails();


        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('tim50/details', $data);
        $this->load->view('templates/footer');
    }
    public function save()
    {
        if ($this->m_tim50->save() == true) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">New data saved!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert">New data failed to save!</div>');
        }
        redirect('tim50');
    }


    public function update()
    {
        $id = $this->input->get('id');
        if ($this->m_tim50->update($id) == true) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Data has been updated! </div>');;
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert">New data failed to update!</div>');
        }
        redirect('tim50');
    }

    public function updatedetail()
    {
        $id = $this->input->get('id');
        if ($this->m_tim50->update($id) == true) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Data has been updated! </div>');;
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert">New data failed to update!</div>');
        }
        redirect('tim50/details');
    }

    public function delete($id = null)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert">Data Anda Gagal Di Hapus');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('lks_tim50');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">Data Berhasil Dihapus');
        }
        redirect('tim50');
    }

    public function deletedetail($id = null)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert">Data Anda Gagal Di Hapus');
        } else {
            $this->db->where('id', $id);
            $this->db->delete('lks_tim50');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">Data Berhasil Dihapus');
        }
        redirect('tim50/details');
    }

    public function listKelurahan()
    {
        // Ambil data ID Provinsi yang dikirim via ajax post
        $id_kecamatan = $this->input->post('id_kecamatan');

        $kelurahan = $this->m_tim50->getDataKel($id_kecamatan);

        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>Pilih</option>";

        foreach ($kelurahan as $data) {
            $lists .= "<option value='" . $data->namakel . "'>" . $data->namakel . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        $callback = array('list_kelurahan' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kelurahan

        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }
}
