<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['title'] = 'user';
        $data['list'] = $this->db->query("SELECT * from tb_user order by id desc")->result();
        $this->template->load('template', 'admin/user', $data);
    }
    public function baru()
    {
        // Ambil input dari form
        $nama = $this->input->post('nama');
        $telp = $this->input->post('telp');
        $username = $this->input->post('username');
        $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
        $role = $this->input->post('role');

        // Konfigurasi upload foto
        $config['upload_path'] = './assets/img/user/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = '5048';
        $config['file_name'] = 'user_' . date('YmdHis');
        $config['overwrite'] = TRUE;
        $config['remove_spaces'] = TRUE;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        $foto = ""; // Default jika foto tidak diupload
        if (!empty($_FILES['foto']['name'])) {
            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            } else {
                $error = $this->upload->display_errors();
                tampil_alert('error', 'Gagal', $error);
                redirect(base_url('admin/user'));
            }
        }

        // Data untuk disimpan ke database
        $data = array(
            'nama' => $nama,
            'foto' => $foto,
            'telp' => $telp,
            'username' => $username,
            'password' => $password,
            'role' => $role
        );

        // Simpan data ke tabel `tb_user`
        if ($this->db->insert('tb_user', $data)) {
            tampil_alert('success', 'Berhasil', 'User baru berhasil ditambahkan.');
        } else {
            tampil_alert('error', 'Gagal', 'Terjadi kesalahan saat menyimpan data.');
        }

        redirect(base_url('admin/user'));
    }

    public function edit()
    {
        $id = $this->input->post('id');
        $data = [
            'nama' => $this->input->post('nama'),
            'telp' => $this->input->post('telp'),
            'username' => $this->input->post('username'),
            'status' => $this->input->post('status'),
            'role' => $this->input->post('role')
        ];

        // Jika ada input file foto
        if (!empty($_FILES['foto']['name'])) {
            $config = [
                'upload_path' => 'assets/img/user/',
                'allowed_types' => 'jpg|jpeg|png',
                'max_size' => '5048',
                'file_name' => 'user_' . date('YmdHis'),
                'overwrite' => TRUE,
                'remove_spaces' => TRUE
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto')) {
                $data['foto'] = $this->upload->data('file_name');
            } else {
                tampil_alert('error', 'Gagal', $this->upload->display_errors());
                redirect(base_url('admin/user'));
                return;
            }
        }

        // Update ke database
        $this->db->update('tb_user', $data, ['id' => $id]);
        tampil_alert('success', 'Berhasil', 'Data user berhasil diperbarui.');
        redirect(base_url('admin/user'));
    }

    public function hapus($id)
    {
        $query = $this->db->query("SELECT foto FROM tb_user WHERE id = ?", array($id));
        $old_foto = $query->row()->foto;
        if (!empty($old_foto)) {
            unlink('assets/img/user/' . $old_foto);
        }
        $this->db->delete('tb_user', ['id' => $id]);
        $user = $this->session->userdata('nama');
        $log = array(
            'user' => $user,
            'aksi' => "Menghapus data user."
        );
        $this->db->insert('tb_log', $log);
        tampil_alert('success', 'Berhasil', 'Berhasil menghapus data.');
        redirect(base_url('admin/user'));
    }
}
