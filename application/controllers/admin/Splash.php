<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Splash extends CI_Controller
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
        $data['title'] = 'Splash';
        $data['list'] = $this->db->query("SELECT * from tb_splash order by id desc")->result();
        $this->template->load('template', 'admin/splash', $data);
    }
    public function baru()
    {
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $gambar = "";
        $config['upload_path'] = './assets/img/splash/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '100000';
        $config['file_name'] = 'Splash_' . date('YmdHis');
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        // Periksa apakah ada file yang diunggah
        if (!empty($_FILES['gambar']['name'])) {
            // Proses upload jika ada file
            if ($this->upload->do_upload('gambar')) {
                $uploadData = $this->upload->data();
                $gambar = $uploadData['file_name'];
            } else {
                // Jika gagal upload, tampilkan error
                $error = $this->upload->display_errors();
                tampil_alert('error', 'Gagal Upload File', $error);
                redirect(base_url('admin/Splash'));
                return;
            }
        }

        // Data untuk disimpan ke database
        $data = array(
            'nama' => $nama,
            'status' => $status,
            'gambar' => $gambar,
        );

        // Simpan data ke tabel `tb_layanan`
        if ($this->db->insert('tb_splash', $data)) {
            $user_aktivitas = $this->session->userdata('nama');
            $log = array(
                'user' => $user_aktivitas,
                'aksi' => "Menambah data Splash." . $nama
            );
            $this->db->insert('tb_log', $log);
            tampil_alert('success', 'Berhasil', 'Splash baru berhasil ditambahkan.');
        } else {
            tampil_alert('error', 'Gagal', 'Terjadi kesalahan saat menyimpan data.');
        }
        redirect(base_url('admin/Splash'));
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('splash'),
            'status' => $this->input->post('status')
        ];

        if (!empty($_FILES['foto']['name'])) {
            $config = [
                'upload_path' => 'assets/img/splash/',
                'allowed_types' => 'jpg|jpeg|png',
                'max_size' => '5048',
                'file_name' => 'Splash_' . date('Y-m-d-H-i-s'),
                'overwrite' => TRUE,
                'remove_spaces' => TRUE
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('gambar')) {
                $data['foto'] = $this->upload->data('file_name');
            } else {
                tampil_alert('error', 'Gagal', $this->upload->display_errors());
                redirect(base_url('admin/Splash'));
                return;
            }
        }

        $this->db->update('tb_splash', $data, ['id' => $id]);
        $user_aktivitas = $this->session->userdata('nama');
        $log = array(
            'user' => $user_aktivitas,
            'aksi' => "Mengedit data Splash."
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil memperbarui data.');
        redirect(base_url('admin/Splash'));
    }
    public function hapus($id)
    {
        $query = $this->db->query("SELECT gambar FROM tb_splash WHERE id = ?", array($id));
        $old_foto = $query->row()->konten;
        if (!empty($old_foto)) {
            unlink('assets/img/splash/' . $old_foto);
        }
        $this->db->delete('tb_splash', ['id' => $id]);
        $user = $this->session->userdata('nama');
        $log = array(
            'user' => $user,
            'aksi' => "Menghapus data Splash."
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menghapus data.');
        redirect(base_url('admin/Splash'));
    }
}
