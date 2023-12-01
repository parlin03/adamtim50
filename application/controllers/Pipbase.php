<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Pipbase extends MY_Controller
{

    /*
    |-------------------------------------------------------------------
    | Construct
    |-------------------------------------------------------------------
    | 
    */
    function __construct()
    {
        parent::__construct();
        $this->load->model('pipbase_model', 'pip_model');
    }

    /*
    |-------------------------------------------------------------------
    | Index
    |-------------------------------------------------------------------
    |
    */
    function index()
    {
        $data['title'] = 'Pip';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); //arraynya sebaris

        $data['pip_list'] = $this->pip_model->fetch_pips();


        $this->load->helper('url');       //pointer sidebar
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('jaring/pip/content', $data);
        // $this->load->view('jaring/pip/footer', $data);

        $this->load->view('templates/footer');
    }

    /*
    |-------------------------------------------------------------------
    | Import Excel
    |-------------------------------------------------------------------
    |
    */
    function import_excel()
    {
        $this->load->helper('file');

        /* Allowed MIME(s) File */
        $file_mimes = array(
            'application/octet-stream',
            'application/vnd.ms-excel',
            'application/x-csv',
            'text/x-csv',
            'text/csv',
            'application/csv',
            'application/excel',
            'application/vnd.msexcel',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        );

        if (isset($_FILES['uploadFile']['name']) && in_array($_FILES['uploadFile']['type'], $file_mimes)) {

            $array_file = explode('.', $_FILES['uploadFile']['name']);
            $extension  = end($array_file);

            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['uploadFile']['tmp_name']);
            $sheet_data  = $spreadsheet->getActiveSheet(0)->toArray();
            $array_data  = [];

            for ($i = 1; $i < count($sheet_data); $i++) {
                $data = array(
                    'nama_siswa'    => $sheet_data[$i]['1'],
                    'nisn'          => $sheet_data[$i]['2'],
                    'sekolah'       => $sheet_data[$i]['3'],
                    'nama_sekolah'  => $sheet_data[$i]['4'],
                    'kec_sekolah'   => $sheet_data[$i]['5'],
                    'kelas'         => $sheet_data[$i]['6'],
                    'nama_ibu'      => $sheet_data[$i]['7'],
                    'nama_ayah'     => $sheet_data[$i]['8'],
                    'tgl_lahir'     => $sheet_data[$i]['9'],
                    'alamat_siswa'  => $sheet_data[$i]['10'],
                    'kel_siswa'     => $sheet_data[$i]['11'],
                    'kec_siswa'     => $sheet_data[$i]['12'],
                    'telp'          => $sheet_data[$i]['13'],
                    'nik_ortu'      => $sheet_data[$i]['14']
                );
                $array_data[] = $data;
            }

            if ($array_data != '') {
                $this->pip_model->insert_pip_batch($array_data);
            }
            $this->modal_feedback('success', 'Success', 'Data Imported', 'OK');
        } else {
            $this->modal_feedback('error', 'Error', 'Import failed', 'Try again');
        }
        redirect('/pip');
    }

    /*
    |-------------------------------------------------------------------
    | Export Excel
    |-------------------------------------------------------------------
    |
    */
    function export_excel()
    {
        /* Data */
        $data = $this->pip_model->fetch_pips();

        /* Spreadsheet Init */
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getActiveSheet()->getStyle('1')->getFont()->setName('Calibri (Body)');
        $spreadsheet->getActiveSheet()->getStyle('1')->getFont()->setSize(11);
        $spreadsheet->getActiveSheet()->getStyle('1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $spreadsheet->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('D')->setWidth(12);
        $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('F')->setWidth(27);
        $spreadsheet->getActiveSheet()->getColumnDimension('G')->setWidth(9);
        $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('I')->setWidth(14);
        $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('L')->setWidth(22);
        $spreadsheet->getActiveSheet()->getColumnDimension('M')->setWidth(27);
        $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
        $spreadsheet->getActiveSheet()->getStyle('O')->getNumberFormat()->setFormatCode('0000');

        $sheet = $spreadsheet->getActiveSheet();

        /* Excel Header */
        $sheet->setCellValue('A1', '#');
        $sheet->setCellValue('B1', 'NAMA SISWA');
        $sheet->setCellValue('C1', 'NISN');
        $sheet->setCellValue('D1', 'SEKOLAH');
        $sheet->setCellValue('E1', 'NAMA SEKOLAH');
        $sheet->setCellValue('F1', 'KECAMATAN SEKOLAH');
        $sheet->setCellValue('G1', 'KELAS');
        $sheet->setCellValue('H1', 'NAMA IBU');
        $sheet->setCellValue('I1', 'NAMA AYAH');
        $sheet->setCellValue('J1', 'TGL LAHIR SISWA');
        $sheet->setCellValue('K1', 'ALAMAT SISWA');
        $sheet->setCellValue('L1', 'KELURAHAN SISWA');
        $sheet->setCellValue('M1', 'KECAMATAN SISWA');
        $sheet->setCellValue('N1', 'NO TELPON');
        $sheet->setCellValue('O1', 'NIK ORANG TUA');

        /* Excel Data */
        $row_number = 2;
        foreach ($data as $key => $row) {
            $sheet->setCellValue('A' . $row_number, $key + 1);
            $sheet->setCellValue('B' . $row_number, $row['nama_siswa']);
            $sheet->setCellValue('C' . $row_number, $row['nisn']);
            $sheet->setCellValue('D' . $row_number, $row['sekolah']);
            $sheet->setCellValue('E' . $row_number, $row['nama_sekolah']);
            $sheet->setCellValue('F' . $row_number, $row['kec_sekolah']);
            $sheet->setCellValue('G' . $row_number, $row['kelas']);
            $sheet->setCellValue('H' . $row_number, $row['nama_ibu']);
            $sheet->setCellValue('I' . $row_number, $row['nama_ayah']);
            $sheet->setCellValue('J' . $row_number, $row['tgl_lahir']);
            $sheet->setCellValue('K' . $row_number, $row['alamat_siswa']);
            $sheet->setCellValue('L' . $row_number, $row['kel_siswa']);
            $sheet->setCellValue('M' . $row_number, $row['kec_siswa']);
            $sheet->setCellValue('N' . $row_number, $row['telp']);
            $sheet->setCellValue('O' . $row_number, $row['nik_ortu']);

            $row_number++;
        }

        /* Excel File Format */
        $writer = new Xlsx($spreadsheet);
        /* Filter */
        $filter = $this->input->post('filter');
        $filename = 'All Data';
        if ($filter == 1) {
            $filename = $this->input->post('filter-sekolah');
        }
        // var_dump($fkec);

        // $filename = 'excel-report';
        // $filename = $fkec;
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '-report.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save('php://output');
    }
}
