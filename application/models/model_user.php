<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model {

	public function data($key)
	{
		$this->db->where('id_user',$key);
		$hasil = $this->db->get('user');
		return $hasil;
	}

	public function update($key,$data)
	{
		$this->db->where('id_user',$key);
		$this->db->update('user',$data);
	}

	public function insert($data)
	{
		$this->db->insert('user',$data);
	}

	public function delete($key)
	{
		$this->db->where('id_user',$key);
		$this->db->delete('user');

	}

}

/* End of file model_user.php */
/* Location: ./application/models/model_user.php */