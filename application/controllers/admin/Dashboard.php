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
        $data['log'] = $this->db->query("SELECT * from tb_log order by id desc LIMIT 5")->result();
        $data['t_wisata'] = $this->db->query("SELECT COUNT(id) as total from tb_wisata")->row();
        $data['t_event'] = $this->db->query("SELECT COUNT(id) as total from tb_event")->row();
        $data['t_berita'] = $this->db->query("SELECT COUNT(id) as total from tb_berita")->row();
        $data['t_pengumuman'] = $this->db->query("SELECT COUNT(id) as total from tb_pengumuman")->row();
        $data['t_dokumen'] = $this->db->query("SELECT COUNT(id) as total from tb_dokumen")->row();
        $data['t_user'] = $this->db->query("SELECT COUNT(id) as total from tb_user")->row();
        $data['bupati'] = $this->db->query("SELECT tb.nama as bupati, tb.foto from tb_pengaturan tp
        LEFT JOIN tb_bupati tb on tp.bupati_id = tb.id
        where tp.id = ?", ["1"])->row();
        $this->template->load('template', 'admin/dashboard', $data);
    }
}
