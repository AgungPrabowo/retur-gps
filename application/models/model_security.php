<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_security extends CI_Model {

	public function getsecurity()
	{
		$username = $this->session->userdata('user');
		if(empty($username))
		{
			$this->session->sess_destroy();
			redirect(site_url('/welcome'));
		}
	}

}

/* End of file model_security.php */
/* Location: ./application/models/model_security.php */