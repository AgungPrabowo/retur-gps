<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_gps extends CI_Model {

	public function data($key)
	{
		$this->db->where('id_gps',$key);
		$hasil = $this->db->get('gps');
		return $hasil;
	}

	public function update($key,$data)
	{
		$this->db->where('id_gps',$key);
		$this->db->update('gps',$data);
	}

	public function insert($data)
	{
		$this->db->insert('gps',$data);
	}

	public function delete($key)
	{
		$this->db->where('id_gps',$key);
		$this->db->delete('gps');

	}

}

/* End of file model_gps.php */
/* Location: ./application/models/model_gps.php */