<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cina extends CI_Model {

	public function update($key,$data)
	{
		$this->db->where('id_cina',$key);
		$this->db->update('cina',$data);
	}

	public function insert($data)
	{
		$this->db->insert('cina',$data);
	}

	public function delete($key)
	{
		$this->db->where('id_cina',$key);
		$this->db->delete('cina');

	}
	
	public function tampilgps($key)
	{
		$this->db->where('id_gps',$key);
		$query = $this->db->get('gps');
		if($query->num_rows()>0)
		{
			foreach($query->result() as $row)
			{
				$hasil = $row->nama_gps;
			}
		}
		else
		{
			$hasil = '';
		}
		return $hasil;
	}

}

/* End of file model_gps.php */
/* Location: ./application/models/model_gps.php */