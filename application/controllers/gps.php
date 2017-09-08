<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gps extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();
		$isi['content']		= 'gps/index';
		$isi['data']		= $this->db->get('gps');
		$isi['cari']		= '';
		$this->load->view('halaman_utama',$isi);
	}

	public function simpan()
	{
		$this->model_security->getsecurity();
		$key 				= $this->input->post('key');
		$id 			 	= $this->input->post('id');
		$data['nama_gps']	= $this->input->post('nama');

		if($key == 'update')
		{
			$this->model_gps->update($id,$data);
		}
		else
		{
			$this->model_gps->insert($data);
		}
		redirect(site_url().'/gps');

	}

	public function hapus($key)
	{
		$this->model_security->getsecurity();
		$key = $this->uri->segment(3);
		$this->db->where('id_gps',$key);
		$query = $this->db->get('gps');
		if($query->num_rows()>0)
		{
			$this->model_gps->delete($key);
		}
		redirect(site_url().'/gps');

	}

	public function edit()
	{
		$this->model_security->getsecurity();
		$isi['content']		= 'gps/form';

		$key = $this->uri->segment(3);
		$this->db->where('id_gps',$key);
		$query = $this->db->get('gps');
		foreach ($query->result() as $row) 
			{
				$isi['id']	 = $row->id_gps;
				$isi['nama'] = $row->nama_gps;
			}
		$this->load->view('halaman_utama',$isi);
	}


}

/* End of file gps.php */
/* Location: ./application/controllers/gps.php */