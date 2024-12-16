<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
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
        $data['title'] = 'Berita';
        $data['list'] = $this->db->query("SELECT * from tb_berita order by id desc")->result();
        $this->template->load('template', 'admin/berita', $data);
    }
    public function tambah_baru()
    {
        $data['title'] = 'Buat Berita';
        $this->template->load('template', 'admin/berita_add', $data);
    }
    public function detail($id)
    {
        $data['title'] = 'Detail Berita';
        $data['berita'] = $this->db->query("SELECT * from tb_berita where id = ?", [$id])->row();
        if (!$data['berita']) {
            show_404();
        }
        $this->template->load('template', 'admin/berita_detail', $data);
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
        $config['upload_path'] = './assets/img/berita/';
        $config['allowed_types'] = 'jpg|jpeg|png|mp4';
        $config['max_size'] = '100000'; // Maksimal 100 MB
        $config['file_name'] = 'berita_' . date('YmdHis');
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
                redirect(base_url('admin/Berita/tambah_baru'));
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

        // Simpan data ke tabel `tb_berita`
        if ($this->db->insert('tb_berita', $data)) {
            $user_aktivitas = $this->session->userdata('nama');
            $log = array(
                'user' => $user_aktivitas,
                'aksi' => "Menambah Berita baru" . $judul
            );
            $this->db->insert('tb_log', $log);
            tampil_alert('success', 'Berhasil', 'Berita baru berhasil ditambahkan.');
        } else {
            tampil_alert('error', 'Gagal', 'Terjadi kesalahan saat menyimpan data.');
        }

        redirect(base_url('admin/berita'));
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('berita')
        ];

        if (!empty($_FILES['foto']['name'])) {
            $config = [
                'upload_path' => 'assets/img/berita/',
                'allowed_types' => 'jpg|jpeg|png|mp4',
                'max_size' => '5048',
                'file_name' => 'berita_' . date('Y-m-d-H-i-s'),
                'overwrite' => TRUE,
                'remove_spaces' => TRUE
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto')) {
                $data['foto'] = $this->upload->data('file_name');
            } else {
                tampil_alert('error', 'Gagal', $this->upload->display_errors());
                redirect(base_url('admin/berita'));
                return;
            }
        }

        $this->db->update('tb_berita', $data, ['id' => $id]);
        $user_aktivitas = $this->session->userdata('nama');
        $log = array(
            'user' => $user_aktivitas,
            'aksi' => "Mengedit data berita ."
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil memperbarui data.');
        redirect(base_url('admin/berita'));
    }
    public function hapus($id)
    {
        $query = $this->db->query("SELECT file FROM tb_berita WHERE id = ?", array($id));
        $old_foto = $query->row()->file;
        if (!empty($old_foto)) {
            unlink('assets/img/berita/' . $old_foto);
        }
        $this->db->delete('tb_berita', ['id' => $id]);
        $user = $this->session->userdata('nama');
        $log = array(
            'user' => $user,
            'aksi' => "Menghapus data berita."
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menghapus data.');
        redirect(base_url('admin/berita'));
    }
}
