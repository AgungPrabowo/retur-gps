<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function getlogin($u,$p)
	{
		$pwd 	= md5($p);
		$query 	= $this->db->where('user',$u)
						   ->where('pass',$pwd)
						   ->get('user');
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$sess = array('user'	=> $row->user,
							  'pass'	=> $row->pass
							  );
				$this->session->set_userdata($sess);
				redirect(site_url('/welcome/home'));
			}
		}
		else
		{
				$this->session->set_flashdata('info','Username atau Password salah');
				redirect(site_url('/welcome'));
		}
		
	}

}

/* End of file model_login.php */
/* Location: ./application/models/model_login.php */