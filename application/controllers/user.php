<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();
		$isi['content']		= 'user/index';
		$isi['data']		= $this->db->get('user');
		$isi['cari']		= '';
		$this->load->view('halaman_utama',$isi);
	}

	public function simpan()
	{
		$this->model_security->getsecurity();
		$key 				= $this->input->post('key');
		$id 			 	= $this->input->post('id');
		$re_pass			= md5($this->input->post('re-pass'));
		$old_pass			= md5($this->input->post('pass'));
		$tambah['user']		= $this->input->post('user');
		$tambah['pass']		= md5($this->input->post('pass'));
		$update['user']		= $this->input->post('user');
		$update['pass']		= md5($this->input->post('new-pass'));

		$query 				= $this->db->where('id_user',$id)
						  			   ->get('user');
		$row   				= $query->row();
		$oldpass 			= $row->pass;

		if($key == 'update')
		{
			if($update['pass'] != $re_pass)
			{
				$this->session->set_flashdata('info','Password tidak sama');
				redirect(site_url('/user/edit/'.$id));
			}
			elseif($old_pass != $oldpass)
			{
				$this->session->set_flashdata('info','Password Lama tidak sama');
				redirect(site_url('/user/edit/'.$id));	
			}
			else
			{
				$this->model_user->update($id,$update);
			}
		}
		else
		{
			if($data['pass'] != $re_pass)
			{
				$this->session->set_flashdata('info','Password tidak sama');
			}
			else
			{
				$this->model_user->insert($tambah);

			}
		}
		redirect(site_url('/user'));

	}

	public function hapus($key)
	{
		$this->model_security->getsecurity();
		$key = $this->uri->segment(3);
		$this->db->where('id_user',$key);
		$query = $this->db->get('user');
		if($query->num_rows()>0)
		{
			$this->model_user->delete($key);
		}
		redirect(site_url('/user'));

	}

	public function edit()
	{
		$this->model_security->getsecurity();
		$isi['content']		= 'user/form';

		$key = $this->uri->segment(3);
		$this->db->where('id_user',$key);
		$query = $this->db->get('user');
		foreach ($query->result() as $row) 
			{
				$isi['id']	 = $row->id_user;
				$isi['user'] = $row->user;
			}
		$this->load->view('halaman_utama',$isi);
	}


}

/* End of file user.php */
/* Location: ./application/controllers/gps.php */