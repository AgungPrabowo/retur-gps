<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_retur extends CI_Model {

	public function data($key)
	{
		$this->db->where('id_retur',$key);
		$hasil = $this->db->get('retur');
		return $hasil;
	}

	public function update($key,$data)
	{
		$this->db->where('id_retur',$key);
		$this->db->update('retur',$data);
	}

	public function insert($data)
	{
		$this->db->insert('retur',$data);
	}

	public function delete($key)
	{
		$this->db->where('id_retur',$key);
		$this->db->delete('retur');

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

/* End of file model_retur.php */
/* Location: ./application/models/model_retur.php */