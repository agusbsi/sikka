<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Bupati extends CI_Controller
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
        $data['title'] = 'Bupati';
        $data['list'] = $this->db->query("SELECT * from tb_bupati order by id desc")->result();
        $this->template->load('template', 'admin/bupati', $data);
    }
    public function baru()
    {
        $bupati = $this->input->post('bupati');
        $jabatan = $this->input->post('jabatan');
        $deskripsi = $this->input->post('deskripsi');
        $config['upload_path'] = 'assets/img/bupati/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '5048';
        $config['file_name'] = 'bupati_' . date('Y-m-d');
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            tampil_alert('error', 'Gagal', $error);
            redirect(base_url('admin/Bupati'));
        } else {
            $foto = $this->upload->data('file_name');
            $data = array(
                'nama' => $bupati,
                'jabatan' => $jabatan,
                'foto' => $foto,
                'deskripsi' => $deskripsi
            );
            $this->db->insert('tb_bupati', $data);
            tampil_alert('success', 'Berhasil', 'Berhasil menambahkan data baru.');
            redirect(base_url('admin/Bupati'));
        }
    }
    public function edit()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('bupati'),
            'jabatan' => $this->input->post('jabatan'),
            'deskripsi' => $this->input->post('deskripsi')
        ];

        if (!empty($_FILES['foto']['name'])) {
            $config = [
                'upload_path' => 'assets/img/bupati/',
                'allowed_types' => 'jpg|jpeg|png',
                'max_size' => '5048',
                'file_name' => 'bupati_' . date('Y-m-d'),
                'overwrite' => TRUE,
                'remove_spaces' => TRUE
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto')) {
                $data['foto'] = $this->upload->data('file_name');
            } else {
                tampil_alert('error', 'Gagal', $this->upload->display_errors());
                redirect(base_url('admin/Bupati'));
                return;
            }
        }

        $this->db->update('tb_bupati', $data, ['id' => $id]);
        tampil_alert('success', 'Berhasil', 'Berhasil memperbarui data.');
        redirect(base_url('admin/Bupati'));
    }
    public function hapus($id)
    {
        $query = $this->db->query("SELECT foto FROM tb_bupati WHERE id = ?", array($id));
        $old_foto = $query->row()->foto;
        if (!empty($old_foto)) {
            unlink('assets/img/bupati/' . $old_foto);
        }
        $this->db->delete('tb_bupati', ['id' => $id]);
        $user = $this->session->userdata('nama');
        $log = array(
            'user' => $user,
            'aksi' => "Menghapus data bupati."
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menghapus data.');
        redirect(base_url('admin/Bupati'));
    }
}
