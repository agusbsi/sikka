<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $status = $this->session->userdata('status');
        if ($status != "login") {
            tampil_alert('error', 'SESSION EXPIRED', 'Sesi anda habis, silahkan login kembali.');
            redirect(base_url(''));
        }
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['log'] = $this->db->query("SELECT * from tb_log order by id desc LIMIT 10")->result();
        $this->template->load('template', 'admin/dashboard', $data);
    }
}
