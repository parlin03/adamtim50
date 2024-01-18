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
        $data['title'] = 'Jagai Maktim';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('user_id')])->row_array();
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $data['dtdc'] = $this->m_dtdc->getLksDtdc(); //array banyak

        $data['keyword'] = $this->input->post('keyword');
        $this->load->model('Dtdc_model');
        if ($data['keyword'] == 0) {
            $this->session->set_flashdata('message1', '<div class="alert alert-warning" role ="alert">Masukkan NIK dengan Benar</div>');
            $data['search_result'] = '';
        } else {
            $check = $this->db->get_where('lks_dtdc', ['noktp' => $data['keyword']]);
            if ($check->num_rows() > 0) {
                $pic = $this->db->get_where('user', ['id' => $check->row()->user_id]);
                $this->session->set_flashdata('message1', '<div class="alert alert-danger" role ="alert">Data NIK <b>' . $data['keyword'] . '</b> Sudah Terdaftar oleh <b>' .  ucwords($pic->row()->name) . '</b></div>');

                $data['search_result'] = '';
            } else {
                $checkdpt = $this->db->get_where('dpt', ['noktp' => $data['keyword']]);
                if ($checkdpt->num_rows() > 0) {
                    $this->session->set_flashdata('message1', '<div class="alert alert-success" role ="alert">Data NIK <b>' . $data['keyword'] . '</b> Ditemukan. Segera Perbaharui Data</div>');
                    $data['search_result'] = $this->Dtdc_model->search($data['keyword']);
                } else {
                    $this->session->set_flashdata('message1', '<div class="alert alert-danger" role ="alert">Data NIK <b>' . $data['keyword'] . '</b> Tidak Ditemukan. Segera daftarkan NIK <b>' . $data['keyword'] . '</b> ke KPU untuk mendapatkan nomor TPS</div>');
                    $data['search_result'] = '';
                }
            }
        }
        $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dtdc', $data);
        $this->load->view('templates/footer');
    }
    public function add()
    {
        $data['title'] = 'Door to Door Campaign';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('user_id')])->row_array();
        $this->db->where('user_id', $this->session->userdata('user_id'));
        $this->db->order_by('id', 'ASC');
        $data['dtdc'] = $this->db->get('lks_dtdc')->result_array(); //array banyak

        $this->form_validation->set_rules('dpt_id', 'Dpt_id', 'required|is_unique[user.email]', [
            'is_unique' => 'This NIK has already registered'
        ]);

        // var_dump($this->input->post('program'));

        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $new_name                = $data['user']['id'] . time() . $_FILES["image"]['name'];
            $config['file_name']     = $new_name;
            $config['allowed_types'] = 'bmp|gif|jpeg|jpg|png|tiff|tiff|webp';
            $config['max_size']      = '8192';
            $config['upload_path']   = './assets/img/dtdc/';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                // $old_image = $data['user']['image'];
                // if ($old_image != 'default.jpg') {
                //     unlink(FCPATH . 'assets/img/dtdc/' . $old_image);
                // }

                $datanew = [
                    'dpt_id'       => $this->input->post('dpt_id'),
                    'noktp'       => $this->input->post('noktp'),
                    'nohp'      => $this->input->post('nohp'),
                    'program'      => $this->input->post('program'),
                    'image' =>  $this->upload->data('file_name'),
                    'user_id'   => $this->session->userdata('user_id'),
                    'date_created'   => date("Y-m-d")

                ];
                $this->db->insert('lks_dtdc', $datanew);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">New DTDC added!</div>');
                redirect('dtdc');
                // $new_image = $this->upload->data('file_name');
                // $this->db->set('image', $new_image);
            } else {
                echo $this->upload->display_errors();
            }
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

        $program = $this->input->post('program');
        $nohp = $this->input->post('nohp');
        $old_image = $this->input->post('oldimage');

        // $dpt_id = $this->input->post('dpt_id');

        // cek jika da gambar yang akan diupload
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $new_name                = $data['user']['id'] . time() . $_FILES["image"]['name'];
            $config['file_name']     = $new_name;
            $config['allowed_types'] = 'bmp|gif|jpeg|jpg|png|tiff|tiff|webp';
            $config['max_size']      = '8192';
            $config['upload_path']   = './assets/img/dtdc/';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/dtdc/' . $old_image);
                }

                $this->db->set('image', $this->upload->data('file_name'));
            } else {
                echo $this->upload->display_errors();
            }
        }

        $this->db->set('nohp', $nohp);
        $this->db->where('id', $id);
        $this->db->update('lks_dtdc');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Data has been updated! </div>');
        redirect('dtdc');
    }

    public function delete($id = null, $image = null)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role ="alert">Data Anda Gagal Di Hapus');
            redirect('dtdc');
        } else {
            unlink(FCPATH . 'assets/img/dtdc/' . $image);
            $this->db->where('id', $id);
            $this->db->delete('lks_dtdc');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role ="alert">Data Berhasil Dihapus');
            redirect('dtdc');
        }
    }
}
