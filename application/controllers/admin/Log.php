<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log extends CI_Controller
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
        $data['title'] = 'Histori';
        $data['list'] = $this->db->query("SELECT * from tb_log order by id desc limit 10")->result();
        $this->template->load('template', 'admin/histori', $data);
    }
    public function search()
    {
        // Ambil kata kunci pencarian dari input
        $keyword = $this->input->get('keyword');

        if (strlen($keyword) >= 3) {
            $this->db->like('user', $keyword);
            $this->db->or_like('aksi', $keyword);
            $this->db->or_like('tanggal', $keyword);
        }
        $this->db->order_by('id', 'desc')->limit(10);
        $result = $this->db->get('tb_log')->result();

        // Kembalikan data dalam format JSON
        echo json_encode($result);
    }
}
