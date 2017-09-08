<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cina extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();
		$isi['content']		= 'cina/index';
		$isi['data']		= $this->db->get('gps');
		$isi['data1']		= $this->db->get('cina');
		$isi['cari']		= '';
		$this->load->view('halaman_utama',$isi);
	}

	public function simpan()
	{
		$this->model_security->getsecurity();
		$key 			= $this->input->post('key');
		$id 			= $this->input->post('id');
		$data['id_gps']		= $this->input->post('gps');
		$data['imei']		= $this->input->post('imei');
		$data['damage']		= $this->input->post('damage');
		$data['ket']		= $this->input->post('ket');

		if($key == 'update')
		{
			$this->model_cina->update($id,$data);
		}
		else
		{
			$this->model_cina->insert($data);
		}
		redirect(site_url().'/cina');

	}

	public function hapus($key)
	{
		$this->model_security->getsecurity();
		$key = $this->uri->segment(3);
		$this->db->where('id_cina',$key);
		$query = $this->db->get('cina');
		if($query->num_rows()>0)
		{
			$this->model_cina->delete($key);
		}
		redirect(site_url().'/cina');

	}

	public function edit()
	{
		$this->model_security->getsecurity();
		$isi['content']		= 'cina/form';

		$key = $this->uri->segment(3);
		$this->db->where('id_cina',$key);
		$query = $this->db->get('cina');
		foreach ($query->result() as $row) 
			{
				$isi['id']	 	= $row->id_cina;
				$isi['gps']	 	= $row->id_gps;
				$isi['imei'] 	= $row->imei;
				$isi['damage'] 	= $row->damage;
				$isi['ket']	 	= $row->ket;
				$isi['data']	= $this->db->get('gps');
			}
		$this->load->view('halaman_utama',$isi);
	}

	public function excel()
    {
    			$this->model_security->getsecurity();
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('Laporan Daftar Return ke Cina');
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A1', 'Daftar Return GPS Tracker');
                $this->excel->getActiveSheet()->setCellValue('A3', 'NO');
                $this->excel->getActiveSheet()->setCellValue('B3', 'IMEI');
                $this->excel->getActiveSheet()->setCellValue('C3', 'Damage');
                $this->excel->getActiveSheet()->setCellValue('E3', 'Keterangan');
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A1:C1');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
       for($col = ord('A'); $col <= ord('C'); $col++){
                //set column dimension
                $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
                 
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
                $rs = $this->db->query('SELECT id_cina, imei, nama_gps, damage, ket FROM cina, gps WHERE cina.id_gps=gps.id_gps');
                $exceldata="";
        foreach ($rs->result_array() as $row){
                $exceldata[] = $row;
        }
                //Fill data 
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A4');
                 
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                 
                $filename='PHPExcelDemo.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
 
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');

                redirect(site_url().'/cina');
                 
    }

}

/* End of file gps.php */
/* Location: ./application/controllers/gps.php */
