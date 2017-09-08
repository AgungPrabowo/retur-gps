<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur extends CI_Controller {

	public function index()
	{
		$this->model_security->getsecurity();
		$isi['content']		= 'return/index';
		$isi['data']		= $this->db->get('retur');
		$isi['data1']		= $this->db->get('gps');
		$this->load->view('halaman_utama',$isi);
	}

	// public function getdata(){
	//    $dt=$this->db->get('retur')->result();
	//    $arr_data=array();
	//    $i=0;
	//    foreach($dt as $r)

	//    		{
	// 		    $arr_data[$i]['nama']			= $r->nama;
	// 		    $arr_data[$i]['gps']			= $this->model_retur->tampilgps($r->id_retur);
	// 		    $arr_data[$i]['tgl_datang']		= $r->tgl_datang;
	// 		    $arr_data[$i]['tgl_kembali']	= $r->tgl_kembali;
	// 		    $arr_data[$i]['tgl_pembelian']	= $r->tgl_pembelian;
	// 		    $arr_data[$i]['imei']			= $r->imei;
	// 		    $arr_data[$i]['ket']			= $r->ket;
	// 		    $i++;
	//    		}
 //   		echo json_encode($arr_data);
	// }

	public function edit()
	{
		$this->model_security->getsecurity();
		$isi['content']		= 'return/form';

		$key = $this->uri->segment(3);
		$this->db->where('id_retur',$key);
		$query = $this->db->get('retur');
		foreach ($query->result() as $row) 
			{
				$isi['key']			= $row->id_retur;
				$isi['nama']			= $row->nama;
				$isi['gps']				= $row->id_gps;
				$isi['tgl_kembali']		= $row->tgl_kembali;
				$isi['tgl_datang']		= $row->tgl_datang;
				$isi['tgl_pembelian']	= $row->tgl_pembelian;
				$isi['imei']			= $row->imei;
				$isi['ket']				= $row->ket;
				$isi['data']			= $this->db->get('gps');
			}
		$this->load->view('halaman_utama',$isi);
	}

		public function simpan()
	{
		$this->model_security->getsecurity();
		$key 					= $this->input->post('id_retur');
		$data['id_retur'] 		= $this->input->post('id_retur');
		$data['nama']			= $this->input->post('nama');
		$data['id_gps']			= $this->input->post('gps');
		$data['tgl_kembali']	= $this->input->post('tgl_kembali');
		$data['tgl_datang']		= $this->input->post('tgl_datang');
		$data['tgl_pembelian']	= $this->input->post('tgl_pembelian');
		$data['imei']			= $this->input->post('imei');
		$data['ket']			= $this->input->post('ket');

		$query = $this->model_retur->data($key);
		if($query->num_rows()>0)
		{
			$this->model_retur->update($key,$data);
		}
		else
		{
			$this->model_retur->insert($data);
		}
		redirect(site_url().'/retur');

	}

	public function hapus($key)
	{
		$this->model_security->getsecurity();
		$key = $this->uri->segment(3);
		$this->db->where('id_retur',$key);
		$query = $this->db->get('retur');
		if($query->num_rows()>0)
		{
			$this->model_retur->delete($key);
		}
		redirect(site_url().'/retur');

	}

	public function excel()
    {
    			$this->model_security->getsecurity();
                $this->excel->setActiveSheetIndex(0);
                //name the worksheet
                $this->excel->getActiveSheet()->setTitle('Laporan Daftar Return GPS');
                //set cell A1 content with some text
                $this->excel->getActiveSheet()->setCellValue('A1', 'Daftar Return GPS Tracker');
                $this->excel->getActiveSheet()->setCellValue('A3', 'NO');
                $this->excel->getActiveSheet()->setCellValue('B3', 'Nama Customer');
                $this->excel->getActiveSheet()->setCellValue('C3', 'Type GPS');
                $this->excel->getActiveSheet()->setCellValue('D3', 'Tanggal Datang');
                $this->excel->getActiveSheet()->setCellValue('E3', 'Tanggal Kembali');
                $this->excel->getActiveSheet()->setCellValue('F3', 'IMEI');
                $this->excel->getActiveSheet()->setCellValue('G3', 'Tanggal Pembelian');
                $this->excel->getActiveSheet()->setCellValue('H3', 'Keterangan');
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
                $rs = $this->db->query('SELECT id_retur, nama, nama_gps, tgl_datang, tgl_kembali, imei, tgl_pembelian, ket FROM retur, gps WHERE retur.id_gps=gps.id_gps ');
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

                redirect(site_url().'/retur');
                 
    }

}

/* End of file return.php */
/* Location: ./application/controllers/return.php */