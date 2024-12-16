<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Backup extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $status = $this->session->userdata('status');
        if ($status != "login") {
            tampil_alert('error', 'SESSION EXPIRED', 'Sesi anda habis, silahkan Login kembali.');
            redirect(base_url(''));
        }
    }
    public function index()
    {
        $data['title'] = 'Backup Database';
        $this->template->load('template', 'admin/backup', $data);
    }
    public function backup()
    {
        $date = date('d-m-Y');
        $this->load->dbutil();

        // Membuat backup database
        $backup = $this->dbutil->backup();

        // Menyimpan file ke server
        $this->load->helper('file');
        $file_path = './assets/excel/data_' . $date . '.sql';
        write_file($file_path, $backup);

        // Mendownload file ke user
        $this->load->helper('download');
        force_download('data_' . $date . '.sql', $backup);
    }
}
