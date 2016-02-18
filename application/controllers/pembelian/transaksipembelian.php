<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksipembelian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_suplier');
		$this->load->model('m_barang');
		$this->load->model('m_transaksi');
		$this->is_logged_in();
	}


	public function is_logged_in()
	{
	$is_logged_in=$this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)||$is_logged_in!= true) {
		redirect(base_url());
		} 
	}

	public function index()
	{
		if ($this->input->post('submit')) {
			$tanggalbeli =$this->input->post('tanggaltransaksi');
			$datatransaksi= $this->m_transaksi->alltransaksibytanggal($tanggalbeli);
			$data=[
					'content' => "viewpembelian/viewpembelianbarang",
					'tanggal' => $tanggalbeli,
					'databarang' => $this->m_barang->all(),
					'datatransaksi' => $datatransaksi
					];
					
					$this->load->view('template', $data);
		}
		else
		{
			$data['content'] = "viewpembelian/viewpilihtanggal";
			$this->load->view('template', $data);
		}
		
	}

	public function tambah()
	{

		if ($this->input->post('submit')) {
			$this->form_validation->set_rules('kodebarang', 'kode barang', 'trim|required');
			$this->form_validation->set_rules('jumlah', 'jumlah barang', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$databarang=$this->m_barang->all();
				$tanggalbeli = $this->input->post('tanggalbeli');
				$dataransaksi= $this->m_transaksi->alltransaksibytanggal($tanggalbeli);
				$data =[
						'content' => "viewpembelian/viewpembelianbarang",
						'databarang' => $databarang,
						'tanggal' => $tanggalbeli,
						'datatransaksi' => $datatransaksi
				];
				$this->load->view('template', $data);
			} 
			else 
			{
				$kodebarang = $this->input->post('kodebarang');
				$jumlah = $this->input->post('jumlah');
				$keterangan = $this->input->post('keterangan');
				$tanggal = $this->input->post('tanggalbeli');
				$status = $this->input->post('status');
				$object = array(
								'IDBarang' => $kodebarang ,
								'Jumlah' => $jumlah,
								'Keterangan' => $keterangan,
								'TglTransaksi' =>$tanggal,
								'Status' => $status
								);

				$query = $this->m_transaksi->insert($object);

				if ($query) {
					$this->session->set_flashdata('info', 'berhasil dimasukkan');
					redirect('pembelian/transaksipembelian/');

				} 
				else
				{
					$this->session->set_flashdata('info', 'gagal dimasukkan');
					redirect('pembelian/transaksipembelian');
				}

			}
		}
		else
		{
			$databarang=$this->m_barang->all();
			$tanggalbeli = $this->input->post('tanggalbeli');
			$dataransaksi= $this->m_transaksi->alltransaksibytanggal($tanggalbeli);
			$data =[
					'content' => "viewpembelian/viewpembelianbarang",
					'databarang' => $databarang,
					'tanggal' => $tanggalbeli
			];
			$data['datatransaksi'] = $datatransaksi;
			$this->load->view('template', $data);
		}
	}

	public function hapus($id)
	{
		$this->m_transaksi->delete($id);

			if ($this->db->affected_rows()) {
				$this->session->set_flashdata('info', 'berhasil dihapus');
				redirect('pembelian/transaksipembelian/');
			}
			else
			{
				$this->session->set_flashdata('info', 'gagal dihapus');
				redirect('pembelian/transaksipembelian/');
			}
	}

}

/* End of file transaksipembelian.php */
/* Location: ./application/controllers/pembelian/transaksipembelian.php */