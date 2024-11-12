<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Wisata extends CI_Controller
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
        $data['title'] = 'Wisata';
        $data['list'] = $this->db->query("SELECT * from tb_wisata order by id desc")->result();
        $this->template->load('template', 'admin/wisata', $data);
    }
    public function baru()
    {
        $wisata = $this->input->post('wisata');
        $config['upload_path'] = 'assets/img/wisata/';
        $config['allowed_types'] = 'jpg|jpeg|png|mp4';
        $config['max_size'] = '100000';
        $config['file_name'] = 'Wisata_' . date('Y-m-d-H-i-s');
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('foto')) {
            $error = $this->upload->display_errors();
            tampil_alert('error', 'Gagal', $error);
            redirect(base_url('admin/Wisata'));
        } else {
            $uploadData = $this->upload->data();
            $foto = $uploadData['file_name'];
            $mime_type = $uploadData['file_type'];
            if (strpos($mime_type, 'image') !== false) {
                $jenis = 'Foto';
            } elseif (strpos($mime_type, 'video') !== false) {
                $jenis = 'Video';
            } else {
                $jenis = 'Lainnya';
            }

            $data = array(
                'nama' => $wisata,
                'konten' => $foto,
                'jenis' => $jenis
            );

            $this->db->insert('tb_wisata', $data);
            tampil_alert('success', 'Berhasil', 'Berhasil menambahkan data baru.');
            redirect(base_url('admin/Wisata'));
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('wisata')
        ];

        if (!empty($_FILES['foto']['name'])) {
            $config = [
                'upload_path' => 'assets/img/Wisata/',
                'allowed_types' => 'jpg|jpeg|png|mp4',
                'max_size' => '5048',
                'file_name' => 'Wisata_' . date('Y-m-d-H-i-s'),
                'overwrite' => TRUE,
                'remove_spaces' => TRUE
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto')) {
                $data['foto'] = $this->upload->data('file_name');
            } else {
                tampil_alert('error', 'Gagal', $this->upload->display_errors());
                redirect(base_url('admin/Wisata'));
                return;
            }
        }

        $this->db->update('tb_wisata', $data, ['id' => $id]);
        tampil_alert('success', 'Berhasil', 'Berhasil memperbarui data.');
        redirect(base_url('admin/Wisata'));
    }
    public function hapus($id)
    {
        $query = $this->db->query("SELECT konten FROM tb_wisata WHERE id = ?", array($id));
        $old_foto = $query->row()->konten;
        if (!empty($old_foto)) {
            unlink('assets/img/wisata/' . $old_foto);
        }
        $this->db->delete('tb_wisata', ['id' => $id]);
        $user = $this->session->userdata('nama');
        $log = array(
            'user' => $user,
            'aksi' => "Menghapus data Wisata."
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menghapus data.');
        redirect(base_url('admin/Wisata'));
    }
}
