<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lapor extends CI_Controller
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
        $data['title'] = 'Lapor';
        $data['list'] = $this->db->query("SELECT * from tb_lapor order by id desc")->result();
        $this->template->load('template', 'admin/lapor', $data);
    }
    public function baca($id)
    {
        $data['title'] = 'Lapor';
        $data['lapor'] = $this->db->query("SELECT * from tb_lapor where id = ?", [$id])->row();
        if (!$data['lapor']) {
            show_404();
        }
        $this->db->update('tb_lapor', array('status' => 1), array('id' => $id));
        $this->template->load('template', 'admin/lapor_detail', $data);
    }
}
