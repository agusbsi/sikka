<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Layanan extends CI_Controller
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
        $data['title'] = 'layanan';
        $data['list'] = $this->db->query("SELECT * from tb_layanan order by id desc")->result();
        $this->template->load('template', 'admin/layanan', $data);
    }
    public function detail($id)
    {
        $data['title'] = 'Detail layanan';
        $data['layanan'] = $this->db->query("SELECT * from tb_layanan where id = ?", [$id])->row();
        if (!$data['layanan']) {
            show_404();
        }
        $this->template->load('template', 'admin/layanan_detail', $data);
    }
    public function baru()
    {
        // Validasi input form
        $pembuat = $this->session->userdata('nama');
        $layanan = $this->input->post('layanan');
        $link = $this->input->post('link');
        $gambar = "";
        $config['upload_path'] = './assets/img/layanan/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '100000';
        $config['file_name'] = 'layanan_' . date('YmdHis');
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        // Periksa apakah ada file yang diunggah
        if (!empty($_FILES['foto']['name'])) {
            // Proses upload jika ada file
            if ($this->upload->do_upload('foto')) {
                $uploadData = $this->upload->data();
                $gambar = $uploadData['file_name'];
            } else {
                // Jika gagal upload, tampilkan error
                $error = $this->upload->display_errors();
                tampil_alert('error', 'Gagal Upload File', $error);
                redirect(base_url('admin/layanan'));
                return;
            }
        }

        // Data untuk disimpan ke database
        $data = array(
            'layanan' => $layanan,
            'link' => $link,
            'gambar' => $gambar,  // Bisa null jika tidak ada file
            'pembuat' => $pembuat
        );

        // Simpan data ke tabel `tb_layanan`
        if ($this->db->insert('tb_layanan', $data)) {
            $user_aktivitas = $this->session->userdata('nama');
            $log = array(
                'user' => $user_aktivitas,
                'aksi' => "Menambah data Layanan." . $layanan
            );
            $this->db->insert('tb_log', $log);
            tampil_alert('success', 'Berhasil', 'layanan baru berhasil ditambahkan.');
        } else {
            tampil_alert('error', 'Gagal', 'Terjadi kesalahan saat menyimpan data.');
        }

        redirect(base_url('admin/layanan'));
    }

    public function hapus($id)
    {
        $query = $this->db->query("SELECT gambar FROM tb_layanan WHERE id = ?", array($id));
        $old_foto = $query->row()->gambar;
        if (!empty($old_foto)) {
            unlink('assets/img/layanan/' . $old_foto);
        }
        $this->db->delete('tb_layanan', ['id' => $id]);
        $user = $this->session->userdata('nama');
        $log = array(
            'user' => $user,
            'aksi' => "Menghapus data layanan."
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menghapus data.');
        redirect(base_url('admin/layanan'));
    }
}
