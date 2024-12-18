<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dokumen extends CI_Controller
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
        $data['title'] = 'dokumen';
        $data['list'] = $this->db->query("SELECT * from tb_dokumen order by id desc")->result();
        $this->template->load('template', 'admin/dokumen', $data);
    }
    public function tambah_baru()
    {
        $data['title'] = 'Buat dokumen';
        $this->template->load('template', 'admin/dokumen_add', $data);
    }
    public function detail($id)
    {
        $data['title'] = 'Detail dokumen';
        $data['dokumen'] = $this->db->query("SELECT * from tb_dokumen where id = ?", [$id])->row();
        if (!$data['dokumen']) {
            show_404();
        }
        $this->template->load('template', 'admin/dokumen_detail', $data);
    }
    public function baru()
    {
        // Validasi input form
        $pembuat = $this->session->userdata('nama');
        $judul = $this->input->post('judul');
        $kategori = $this->input->post('kategori');
        $isi = $this->input->post('isi');

        // Inisialisasi nilai default untuk file
        $file_name = "";
        $jenis = "";

        // Konfigurasi upload file
        $config['upload_path'] = './assets/img/dokumen/';
        $config['allowed_types'] = 'jpg|jpeg|png|mp4|pdf';
        $config['max_size'] = '100000'; // Maksimal 100 MB
        $config['file_name'] = 'dokumen_' . date('YmdHis');
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        // Periksa apakah ada file yang diunggah
        if (!empty($_FILES['foto']['name'])) {
            // Proses upload jika ada file
            if ($this->upload->do_upload('foto')) {
                $uploadData = $this->upload->data();
                $file_name = $uploadData['file_name'];
                $mime_type = $uploadData['file_type'];
                $jenis = strpos($mime_type, 'image') !== false ? 'Foto' : (strpos($mime_type, 'video') !== false ? 'Video' : 'Lainnya');
            } else {
                // Jika gagal upload, tampilkan error
                $error = $this->upload->display_errors();
                tampil_alert('error', 'Gagal Upload File', $error);
                redirect(base_url('admin/dokumen/tambah_baru'));
                return;
            }
        }

        // Data untuk disimpan ke database
        $data = array(
            'judul' => $judul,
            'kategori' => $kategori,
            'konten' => $isi,
            'file' => $file_name, // Bisa null jika tidak ada file
            'jenis' => $jenis,    // Bisa null jika tidak ada file
            'pembuat' => $pembuat
        );

        // Simpan data ke tabel `tb_dokumen`
        if ($this->db->insert('tb_dokumen', $data)) {
            $user_aktivitas = $this->session->userdata('nama');
            $log = array(
                'user' => $user_aktivitas,
                'aksi' => "Menambah data dokumen." . $judul
            );
            $this->db->insert('tb_log', $log);
            tampil_alert('success', 'Berhasil', 'dokumen baru berhasil ditambahkan.');
        } else {
            tampil_alert('error', 'Gagal', 'Terjadi kesalahan saat menyimpan data.');
        }

        redirect(base_url('admin/dokumen'));
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('dokumen')
        ];

        if (!empty($_FILES['foto']['name'])) {
            $config = [
                'upload_path' => 'assets/img/dokumen/',
                'allowed_types' => 'jpg|jpeg|png|mp4',
                'max_size' => '5048',
                'file_name' => 'dokumen_' . date('Y-m-d-H-i-s'),
                'overwrite' => TRUE,
                'remove_spaces' => TRUE
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto')) {
                $data['foto'] = $this->upload->data('file_name');
            } else {
                tampil_alert('error', 'Gagal', $this->upload->display_errors());
                redirect(base_url('admin/dokumen'));
                return;
            }
        }

        $this->db->update('tb_dokumen', $data, ['id' => $id]);
        $user_aktivitas = $this->session->userdata('nama');
        $log = array(
            'user' => $user_aktivitas,
            'aksi' => "Menedit data dokumen."
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil memperbarui data.');
        redirect(base_url('admin/dokumen'));
    }
    public function hapus($id)
    {
        $query = $this->db->query("SELECT konten FROM tb_dokumen WHERE id = ?", array($id));
        $old_foto = $query->row()->konten;
        if (!empty($old_foto)) {
            unlink('assets/img/dokumen/' . $old_foto);
        }
        $this->db->delete('tb_dokumen', ['id' => $id]);
        $user = $this->session->userdata('nama');
        $log = array(
            'user' => $user,
            'aksi' => "Menghapus data dokumen."
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menghapus data.');
        redirect(base_url('admin/dokumen'));
    }
}
