<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Utama extends CI_Controller
{
	public function index()
	{
		$this->load->view('utama');
	}
	public function eror_404()
	{
		$this->load->view('errors/html/error_404');
	}
}
