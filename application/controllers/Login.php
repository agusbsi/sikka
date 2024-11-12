<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$data['token_generate'] = $this->token_generate();
		$this->session->set_userdata($data);
		$this->load->view('login', $data);
	}

	public function token_generate()
	{
		return $tokens = md5(uniqid(rand(), true));
	}

	public function proses_login()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == TRUE) {
			$username = $this->input->post('username', TRUE);
			$password = $this->input->post('password', TRUE);
			if ($this->session->userdata('token_generate') === $this->input->post('token')) {
				$cek = $this->db->query("SELECT * from tb_user where username = ?", $username);
				if ($cek->num_rows() != 1) {
					tampil_alert('info', 'Information', 'Username belum terdaftar silahkan hubungi Administrator!');
					redirect(base_url('Login'));
				} else if ($cek->row()->status != 1) {
					tampil_alert('error', 'Information', 'Akun Anda telah di Non-Aktifkan!');
					redirect(base_url('Login'));
				} else {
					$isi = $cek->row();
					if (password_verify($password, $isi->password) === TRUE) {
						$data_session = array(
							'id' => $isi->id,
							'username' => $username,
							'nama' => $isi->nama,
							'status' => 'login',
							'role' => $isi->role
						);
						$this->session->set_userdata($data_session);
						tampil_alert('success', 'Berhasil', 'Anda Berhasil Login !');
						redirect(base_url('admin/dashboard'));
					} else {
						tampil_alert('error', 'Gagal', 'username dan password salah!');
						redirect(base_url('Login'));
					}
				}
			}
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
