<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inputpenjualan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->is_logged_in();
		$this->load->model('m_penjualan');
		$this->load->model('m_barang');
		$this->load->model('m_transaksi');
		
	}

	public function is_logged_in(){
	$is_logged_in=$this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)||$is_logged_in!= true) {
		redirect(base_url());
		} 
	}

	public function index()
	{
		if ($this->input->post('submit')) {
			# code...
		} 
		else
		{
			$today = date('Y-m-d');
			$datapenjualan = $this->m_penjualan->penjualanbytanggal($today);
			$databarang = $this->m_barang->all();
			$data=[
						'content' => "viewpenjualan/viewpenjualanbarang",
						'databarang' => $databarang
					];
			
			$this->load->view('template', $data);
		}

		
    }

    public function tambah()
    {
    	$today = date('Y-m-d');
    	if ($this->input->post('submit')) {

			$this->form_validation->set_rules('kodebarang', 'kode barang', 'trim|required');
			$this->form_validation->set_rules('jumlah', 'jumlah', 'trim|required');

			if ($this->form_validation->run()==FALSE) {
				$data['content']='viewpenjualan/viewpenjualanbarang';
				$this->load->view('template',$data);
			} else
			{
				$kodebarang = $this->input->post('kodebarang');
				$keterangan= $this->input->post('keterangan');
				$jumlah = $this->input->post('jumlah');

				if ($this->input->post('kodebarang')=="-") {
					$this->session->set_flashdata('info','tentukan barang yang dijual');
						redirect('penjualan/inputpenjualan');
				}
				else
				{
					$object =array(
						'IDBarang'=>$kodebarang ,
						'Keterangan' =>$keterangan , 
						'Jumlah' =>$jumlah,
						'Status' => "keluar",
						'TglTransaksi' => $today
						 );

						$query=	$this->db->insert('tbltransaksi', $object); //insert db dengan controller
					//insert db dengan model

					//$query = $this->m_suplier->insert($object);
					
					if ($query) {
						$this->session->set_flashdata('info','berhasil diinsert');
						redirect('penjualan/inputpenjualan');
					}
				}
				
			}

		} 
    }

    public function edit($id)
    {
    	if ($this->input->post('submit')) {
    		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

    		if ($this->form_validation->run() == FALSE) 
    		{
    			$dataidtransaksi= $this->db->get_where('tbltransaksi', array('IDTransaksi' => $id ))->row();
		    		$data =[
		    					'content' => "viewpenjualan/editpenjualan",
		    					'datatransaksi' => $dataidtransaksi
		    				];

		    				$this->load->view('template', $data);
    		} else 
    		{
    			$keterangan 	=$this->input->post('keterangan');
				$kodebarang 	=$this->input->post('kodebarang');
				$kodetransaksi 	=$this->input->post('kodetransaksi');
				$jumlah			=$this->input->post('jumlah');
				$tanggal		=$this->input->post('tanggal');
				$status			=$this->input->post('status');
				
				$object = array(
								'Keterangan' =>	$keterangan ,
								'IDBarang'	=>	$kodebarang,
								'IDTransaksi' =>$kodetransaksi,
								'Jumlah'	=>	$jumlah	,
								'TglTransaksi' =>	$tanggal,
								'Status' => $status	 
								);
				
				$this->m_transaksi->update($id,$object);

				if ($this->db->affected_rows()) {
						$this->session->set_flashdata('info', 'Sudah update');
						redirect('penjualan/inputpenjualan');
					}
					else
					{
						$this->session->set_flashdata('info', 'gagal update');
						redirect('penjualan/inputpenjualan');
					}
				
    		}
    	} else
    	{
    		$dataidtransaksi= $this->db->get_where('tbltransaksi', array('IDTransaksi' => $id ))->row();
    		$data =[
    					'content' => "viewpenjualan/editpenjualan",
    					'datatransaksi' => $dataidtransaksi
    				];

    				$this->load->view('template', $data);
    	}
    }


}

/* End of file inputpenjualan.php */
/* Location: ./application/controllers/penjualan/inputpenjualan.php */