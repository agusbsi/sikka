<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
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
        $data['title'] = 'Tentang';
        $data['tentang'] = $this->db->query("SELECT * from tb_pengaturan where id = ?", ['1'])->row();
        $data['bupati'] = $this->db->query("SELECT * from tb_bupati WHERE kategori = ? order by id desc", [0])->result();
        $data['wakil'] = $this->db->query("SELECT * from tb_bupati WHERE kategori = ? order by id desc", [1])->result();
        if (!$data['tentang']) {
            show_404();
        }
        $this->template->load('template', 'admin/tentang', $data);
    }
    public function tentang_edit()
    {
        $data['title'] = 'Tentang';
        $pembuat = $this->session->userdata('nama');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $email = $this->input->post('email');
        $fb = $this->input->post('fb');
        $ig = $this->input->post('ig');
        $x = $this->input->post('x');
        $telp = $this->input->post('telp');
        $wa = $this->input->post('wa');
        $bupati = $this->input->post('bupati');
        $wakil = $this->input->post('wakil');
        $data = array(
            'nama' => $nama,
            'alamat' => $alamat,
            'email' => $email,
            'fb' => $fb,
            'ig' => $ig,
            'x' => $x,
            'telp' => $telp,
            'wa' => $wa,
            'bupati_id' => $bupati,
            'wakil_id' => $wakil
        );
        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '10000';
        $config['file_name'] = 'Logo_' . date('YmdHis');
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        // Periksa apakah ada file yang diunggah
        if (!empty($_FILES['logo']['name'])) {
            // Proses upload jika ada file
            if ($this->upload->do_upload('logo')) {
                $uploadData = $this->upload->data();
                $logo = $uploadData['file_name'];
                $data = array(
                    'logo' => $logo,
                );
            } else {
                // Jika gagal upload, tampilkan error
                $error = $this->upload->display_errors();
                tampil_alert('error', 'Gagal Upload File', $error);
                redirect(base_url('admin/Tentang'));
                return;
            }
        }

        if ($this->db->update('tb_pengaturan', $data, ['id' => '1'])) {
            $user_aktivitas = $this->session->userdata('nama');
            $log = array(
                'user' => $user_aktivitas,
                'aksi' => "Mengedit data pengaturan umum."
            );
            $this->db->insert('tb_log', $log);
            tampil_alert('success', 'Berhasil', 'Pengaturan berhasil di perbarui');
        } else {
            tampil_alert('error', 'Gagal', 'Terjadi kesalahan saat menyimpan data.');
        }

        redirect(base_url('admin/Tentang'));
    }
    public function sejarah()
    {
        $data['title'] = 'Sejarah';
        $data['sejarah'] = $this->db->query("SELECT * from tb_sejarah order by id desc")->result();
        $this->template->load('template', 'admin/sejarah', $data);
    }
    public function sejarah_baru()
    {
        $data['title'] = 'Sejarah';
        $pembuat = $this->session->userdata('nama');
        $periode = $this->input->post('periode');
        $konten = $this->input->post('konten');
        $judul = $this->input->post('judul');
        $data = array(
            'periode' => $periode,
            'judul' => $judul,
            'konten' => $konten,   // Bisa null jika tidak ada file
            'pembuat' => $pembuat
        );

        // Simpan data ke tabel `tb_berita`
        if ($this->db->insert('tb_sejarah', $data)) {
            $user_aktivitas = $this->session->userdata('nama');
            $log = array(
                'user' => $user_aktivitas,
                'aksi' => "menambah data sejarah."
            );
            $this->db->insert('tb_log', $log);
            tampil_alert('success', 'Berhasil', 'Sejarah baru berhasil ditambahkan.');
        } else {
            tampil_alert('error', 'Gagal', 'Terjadi kesalahan saat menyimpan data.');
        }

        redirect(base_url('admin/Tentang/sejarah'));
    }
    public function sejarah_hapus($id)
    {
        $this->db->delete('tb_sejarah', ['id' => $id]);
        $user = $this->session->userdata('nama');
        $log = array(
            'user' => $user,
            'aksi' => "Menghapus data Sejarah."
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menghapus data.');
        redirect(base_url('admin/Tentang/sejarah'));
    }
    public function lambang()
    {
        $data['title'] = 'lambang';
        $data['lambang'] = $this->db->query("SELECT * from tb_lambang order by id desc")->result();
        $this->template->load('template', 'admin/lambang', $data);
    }
    public function lambang_baru()
    {
        $data['title'] = 'lambang';
        $pembuat = $this->session->userdata('nama');
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');
        $data = array(
            'judul' => $judul,
            'deskripsi' => $deskripsi,   // Bisa null jika tidak ada file
            'pembuat' => $pembuat
        );

        // Simpan data ke tabel `tb_berita`
        if ($this->db->insert('tb_lambang', $data)) {
            $user_aktivitas = $this->session->userdata('nama');
            $log = array(
                'user' => $user_aktivitas,
                'aksi' => "menambah data lambang baru."
            );
            $this->db->insert('tb_log', $log);
            tampil_alert('success', 'Berhasil', 'Lambang baru berhasil ditambahkan.');
        } else {
            tampil_alert('error', 'Gagal', 'Terjadi kesalahan saat menyimpan data.');
        }

        redirect(base_url('admin/Tentang/lambang'));
    }
    public function lambang_hapus($id)
    {
        $this->db->delete('tb_lambang', ['id' => $id]);
        $user = $this->session->userdata('nama');
        $log = array(
            'user' => $user,
            'aksi' => "Menghapus data Lambang."
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menghapus data.');
        redirect(base_url('admin/Tentang/lambang'));
    }
    public function visi()
    {
        $data['title'] = 'visi';
        $data['visi'] = $this->db->query("SELECT * from tb_visi where id = ?", ['1'])->row();
        if (!$data['visi']) {
            show_404();
        }
        $this->template->load('template', 'admin/visi', $data);
    }
    public function visi_edit()
    {
        $data['title'] = 'visi';
        $pembuat = $this->session->userdata('nama');
        $visi = $this->input->post('visi');
        $misi = $this->input->post('misi');
        $data = array(
            'visi' => $visi,
            'misi' => $misi,
            'pembuat' => $pembuat
        );
        if ($this->db->update('tb_visi', $data, ['id' => '1'])) {
            $user_aktivitas = $this->session->userdata('nama');
            $log = array(
                'user' => $user_aktivitas,
                'aksi' => "Mengedit data visi & misi."
            );
            $this->db->insert('tb_log', $log);
            tampil_alert('success', 'Berhasil', 'Visi & misi berhasil di perbarui');
        } else {
            tampil_alert('error', 'Gagal', 'Terjadi kesalahan saat menyimpan data.');
        }

        redirect(base_url('admin/Tentang/visi'));
    }
}
