<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}

	public function getlogin()
	{
		$u = $this->input->post('username');
		$p = $this->input->post('password');
		$this->model_login->getlogin($u,$p);
	}

	public function home()
	{
		$this->model_security->getsecurity();
		$isi['content']		= 'content_utama';
		$this->load->view('halaman_utama',$isi);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(site_url('/welcome'));
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */