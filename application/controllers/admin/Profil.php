<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
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
        $data['title'] = 'My Profil';
        $id = $this->session->userdata('id');
        $data['profil'] = $this->db->query("SELECT * from tb_user WHERE id = ?", [$id])->row();
        if (!$data['profil']) {
            show_404();
        }
        $this->template->load('template', 'admin/profil', $data);
    }
    public function update()
    {
        $id = $this->session->userdata('id');
        $username = $this->input->post('username');
        $data = [
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telp' => $this->input->post('telp'),
            'email' => $this->input->post('email'),
            'username' => $username,
        ];

        $existing_user = $this->db->get_where('tb_user', ['username' => $username, 'id !=' => $id])->row();
        if ($existing_user) {
            tampil_alert('error', 'Gagal', 'Username sudah digunakan. Silakan pilih username lain.');
            redirect(base_url('admin/profil'));
            return;
        }

        // Proses upload foto jika ada
        if (!empty($_FILES['foto']['name'])) {
            $config = [
                'upload_path' => './assets/img/user/',
                'allowed_types' => 'jpg|jpeg|png',
                'max_size' => '5048', // Maksimum ukuran 5 MB
                'file_name' => 'user_' . date('YmdHis'),
                'overwrite' => TRUE,
                'remove_spaces' => TRUE
            ];

            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('foto')) {
                // Jika upload berhasil, simpan nama file di database
                $data['foto'] = $this->upload->data('file_name');
            } else {
                tampil_alert('error', 'Gagal', $this->upload->display_errors());
                redirect(base_url('admin/profil'));
                return;
            }
        }

        // Update ke database
        if ($this->db->update('tb_user', $data, ['id' => $id])) {
            // Log aktivitas
            $profile_aktivitas = $this->session->userdata('nama');
            $log = [
                'user' => $profile_aktivitas,
                'aksi' => "Mengedit profil"
            ];
            $this->db->insert('tb_log', $log);

            tampil_alert('success', 'Berhasil', 'Data profil berhasil diperbarui.');
        } else {
            tampil_alert('error', 'Gagal', 'Terjadi kesalahan saat memperbarui data.');
        }

        redirect(base_url('admin/profil'));
    }
    public function change_password()
    {
        // Ambil input dari form
        $current_password = $this->input->post('current_password', true);
        $new_password = $this->input->post('new_password', true);
        $re_new_password = $this->input->post('re_new_password', true);

        // Ambil data pengguna dari session
        $user_id = $this->session->userdata('id');
        $user = $this->db->get_where('tb_user', ['id' => $user_id])->row();

        // Validasi password saat ini
        if (!password_verify($current_password, $user->password)) {
            tampil_alert('error', 'Gagal', 'Password saat ini salah.');
            redirect(base_url('admin/profil'));
            return;
        }

        // Validasi password baru dan konfirmasi
        if ($new_password !== $re_new_password) {
            tampil_alert('error', 'Gagal', 'Password baru dan konfirmasi tidak cocok.');
            redirect(base_url('admin/profil'));
            return;
        }

        if (strlen($new_password) < 4) {
            tampil_alert('error', 'Gagal', 'Password baru harus minimal 4 karakter.');
            redirect(base_url('admin/profil'));
            return;
        }

        // Hash password baru
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update password di database
        $this->db->update('tb_user', ['password' => $hashed_password], ['id' => $user_id]);

        // Log aktivitas
        $log = [
            'user' => $user->nama,
            'aksi' => 'Mengganti password',
        ];
        $this->db->insert('tb_log', $log);

        // Berikan pesan sukses
        tampil_alert('success', 'Berhasil', 'Password berhasil diperbarui.');
        redirect(base_url('admin/profil'));
    }
}
