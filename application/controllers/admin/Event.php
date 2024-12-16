<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
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
        $data['title'] = 'Event';
        $data['list'] = $this->db->query("SELECT * from tb_event order by id desc")->result();
        $this->template->load('template', 'admin/event', $data);
    }
    public function baru()
    {
        $event = $this->input->post('event');
        $deskripsi = $this->input->post('deskripsi');
        $jenis = $this->input->post('jenis');
        $link = $this->input->post('link');
        if ($jenis == "Link") {
            $data = array(
                'nama' => $event,
                'konten' => $deskripsi,
                'foto' => $link,
                'jenis' => 'Link'
            );

            $this->db->insert('tb_event', $data);
            $user_aktivitas = $this->session->userdata('nama');
            $log = array(
                'user' => $user_aktivitas,
                'aksi' => "Menambah data Event baru (Link)"
            );
            $this->db->insert('tb_log', $log);
            tampil_alert('success', 'Berhasil', 'Berhasil menambahkan data baru (Link).');
            redirect(base_url('admin/Event'));
        } elseif ($jenis == "media") {
            $config['upload_path'] = 'assets/img/event/';
            $config['allowed_types'] = 'jpg|jpeg|png|mp4';
            $config['max_size'] = '100000';
            $config['file_name'] = 'Event_' . date('Y-m-d-H-i-s');
            $config['overwrite'] = TRUE;
            $config['remove_spaces'] = TRUE;

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto')) {
                $error = $this->upload->display_errors();
                tampil_alert('error', 'Gagal', $error);
                redirect(base_url('admin/Event'));
            } else {
                $uploadData = $this->upload->data();
                $foto = $uploadData['file_name'];
                $mime_type = $uploadData['file_type'];

                if (strpos($mime_type, 'image') !== false) {
                    $jenis_konten = 'Foto';
                } elseif (strpos($mime_type, 'video') !== false) {
                    $jenis_konten = 'Video';
                } else {
                    $jenis_konten = 'Lainnya';
                }

                $data = array(
                    'nama' => $event,
                    'konten' => $deskripsi,
                    'foto' => $foto,
                    'jenis' => $jenis_konten,
                );

                $this->db->insert('tb_event', $data);
                $user_aktivitas = $this->session->userdata('nama');
                $log = array(
                    'user' => $user_aktivitas,
                    'aksi' => "Menambah data event baru (Media)"
                );
                $this->db->insert('tb_log', $log);
                tampil_alert('success', 'Berhasil', 'Berhasil menambahkan data baru (Media).');
                redirect(base_url('admin/Event'));
            }
        } else {
            // Jika jenis tidak valid
            tampil_alert('error', 'Gagal', 'Jenis event tidak valid.');
            redirect(base_url('admin/Event'));
        }
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis');
        $konten = $this->input->post('deskripsi');
        $foto = $this->input->post('foto');

        $data = [
            'nama' => $this->input->post('event'),
            'jenis' => $jenis,
            'konten' => $konten,
        ];

        if ($jenis === 'Link') {
            // Jika jenis adalah Link, simpan URL ke kolom konten
            $data['foto'] = $foto;
        } else {
            // Jika jenis adalah Foto atau Video, cek apakah ada file yang diunggah
            if (!empty($_FILES['file']['name'])) {
                $config = [
                    'upload_path' => 'assets/img/event/',
                    'allowed_types' => 'jpg|jpeg|png|mp4',
                    'max_size' => '5048',
                    'file_name' => 'Event_' . date('Y-m-d-H-i-s'),
                    'overwrite' => TRUE,
                    'remove_spaces' => TRUE
                ];

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    // Simpan nama file ke kolom konten
                    $data['foto'] = $this->upload->data('file_name');
                } else {
                    tampil_alert('error', 'Gagal', $this->upload->display_errors());
                    redirect(base_url('admin/Event'));
                    return;
                }
            } else {
                tampil_alert('error', 'Gagal', 'File tidak ditemukan. Harap unggah file baru atau gunakan URL untuk Link.');
                redirect(base_url('admin/Event'));
                return;
            }
        }

        // Update data di database
        $this->db->update('tb_event', $data, ['id' => $id]);

        // Log aktivitas
        $user_aktivitas = $this->session->userdata('nama');
        $log = [
            'user' => $user_aktivitas,
            'aksi' => "Mengedit data event"
        ];
        $this->db->insert('tb_log', $log);

        // Tampilkan notifikasi sukses
        tampil_alert('success', 'Berhasil', 'Berhasil memperbarui data.');
        redirect(base_url('admin/Event'));
    }
    public function hapus($id)
    {
        $query = $this->db->query("SELECT konten FROM tb_event WHERE id = ?", array($id));
        $old_foto = $query->row()->konten;
        if (!empty($old_foto)) {
            unlink('assets/img/event/' . $old_foto);
        }
        $this->db->delete('tb_event', ['id' => $id]);
        $user = $this->session->userdata('nama');
        $log = array(
            'user' => $user,
            'aksi' => "Menghapus data event."
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menghapus data.');
        redirect(base_url('admin/event'));
    }
}
