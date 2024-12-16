<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelembagaan extends CI_Controller
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
        $data['title'] = 'Kelembagaan';
        $this->template->load('template', 'admin/kelembagaan', $data);
    }
    public function dinas()
    {
        $data['title'] = 'Dinas';
        $data['list'] = $this->db->query("SELECT * from tb_kelembagaan where kategori = ? ORDER BY id desc", ["dinas"])->result();
        $this->template->load('template', 'admin/dinas', $data);
    }
    public function daerah()
    {
        $data['title'] = 'Sekretariat Daerah';
        $data['list'] = $this->db->query("SELECT * from tb_kelembagaan where kategori = ? ORDER BY id desc", ["daerah"])->result();
        $this->template->load('template', 'admin/daerah', $data);
    }
    public function kecamatan()
    {
        $data['title'] = 'kecamatan';
        $data['list'] = $this->db->query("SELECT * from tb_kelembagaan where kategori = ? ORDER BY id desc", ["kecamatan"])->result();

        $this->template->load('template', 'admin/kecamatan', $data);
    }
    public function kelurahan()
    {
        $data['title'] = 'kelurahan';
        $data['list'] = $this->db->query("SELECT * from tb_kelembagaan where kategori = ? ORDER BY id desc", ["kelurahan"])->result();
        $this->template->load('template', 'admin/kelurahan', $data);
    }
    public function desa()
    {
        $data['title'] = 'desa';
        $data['list'] = $this->db->query("SELECT * from tb_kelembagaan where kategori = ? ORDER BY id desc", ["desa"])->result();
        $this->template->load('template', 'admin/desa', $data);
    }
    public function baru()
    {
        // Validasi input form
        $pembuat = $this->session->userdata('nama');
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');
        $alamat = $this->input->post('alamat');
        $telp = $this->input->post('telp');
        $gambar = "";
        $config['upload_path'] = './assets/img/kelembagaan/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '100000';
        $config['file_name'] = 'kelembagaan_' . date('YmdHis');
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
                redirect(base_url('admin/Kelembagaan/' . $kategori));
                return;
            }
        }

        // Data untuk disimpan ke database
        $data = array(
            'nama' => $nama,
            'kategori' => $kategori,
            'foto' => $gambar,  // Bisa null jika tidak ada file
            'alamat' => $alamat,
            'telp' => $telp
        );

        // Simpan data ke tabel `tb_layanan`
        if ($this->db->insert('tb_kelembagaan', $data)) {
            $user_aktivitas = $this->session->userdata('nama');
            $log = array(
                'user' => $user_aktivitas,
                'aksi' => "Menambah data kelembagaan baru" . $kategori . $nama
            );
            $this->db->insert('tb_log', $log);
            tampil_alert('success', 'Berhasil', 'Data baru berhasil ditambahkan.');
        } else {
            tampil_alert('error', 'Gagal', 'Terjadi kesalahan saat menyimpan data.');
        }

        redirect(base_url('admin/Kelembagaan/' . $kategori));
    }
    public function hapus($id)
    {
        $query = $this->db->query("SELECT foto, kategori FROM tb_kelembagaan WHERE id = ?", array($id));
        $kategori = $query->row()->kategori;
        $old_foto = $query->row()->foto;
        if (!empty($old_foto)) {
            unlink('assets/img/kelembagaan/' . $old_foto);
        }
        $this->db->delete('tb_kelembagaan', ['id' => $id]);
        $user = $this->session->userdata('nama');
        $log = array(
            'user' => $user,
            'aksi' => "Menghapus data Kelembagaan." . $kategori
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menghapus data.');
        redirect(base_url('admin/Kelembagaan/' . $kategori));
    }
}
