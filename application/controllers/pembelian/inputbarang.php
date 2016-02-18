<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inputbarang extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_barang');
		$this->load->model('m_suplier');
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
			if ($this->input->post('cari')) {
				$this->form_validation->set_rules('kode_suplier', 'kode suplier', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['content'] = "pembelian/viewdatabarang";
					$this->load->view('template');
				} else
				{
					if ($this->input->post('all')) {
						$dbarang = $this->m_barang->all();	
						$dsuplier = $this->m_suplier->all();
						$data =[
								'content' => "viewpembelian/viewdatabarang" ,
								'databarang' => $dbarang,
								'datasuplier' => $dsuplier
							];

						$this->load->view('template', $data);
					}
					else
					{
						$kode_suplier = $this->input->post('kode_suplier');
						$all = $this->m_suplier->all();
						$listBarangSuplier = $this->m_barang->allbarangbysuplier($kode_suplier);
						$data=[
								'content' => "viewpembelian/viewdatabarang",
								'databarang' => $listBarangSuplier,
								'datasuplier' => $all
						];
						$this->load->view('template', $data);
					}
					
				} 
			}
			else
			{
				$dbarang = $this->m_barang->all();	
				$dsuplier = $this->m_suplier->all();
				$data =[
						'content' => "viewpembelian/viewdatabarang" ,
						'databarang' => $dbarang,
						'datasuplier' => $dsuplier
					];

				$this->load->view('template', $data);

			}
	}

	public function tambah()
	{
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('kodebarang', 'kode barang', 'trim|required');
			$this->form_validation->set_rules('kodesuplier', 'kode suplier', 'trim|required');
			$this->form_validation->set_rules('namabarang', 'nama barang', 'trim|required');
			$this->form_validation->set_rules('jenisbarang', 'alamat barang', 'trim|required');
			$this->form_validation->set_rules('harga', 'harga', 'trim|required');
			$this->form_validation->set_rules('jmlmax', 'jumlah maksimum', 'trim|required');
			$this->form_validation->set_rules('jmlmin', 'jumlah minimum', 'trim|required');

			if ($this->form_validation->run()==FALSE) {
				$data['content']='viewpembelian/viewinputbarang';
				$this->load->view('template',$data);
			} else
			{

				$kodebarang = $this->input->post('kodebarang');
				$kodesuplier = $this->input->post('kodesuplier');
				$namabarang= $this->input->post('namabarang');
				$jenisbarang = $this->input->post('jenisbarang');
				$harga = $this->input->post('harga');
				$jmlmax = $this->input->post('jmlmax');
				$jmlmin = $this->input->post('jmlmin');

				if ($this->m_barang->allbarangbyid($kodebarang)) 
				{
					$this->session->set_flashdata('info','terdapat kode yang sama');
					redirect('pembelian/inputbarang/tambah');
				} 
				else
				{
					$object =array(
						'IDBarang' => $kodebarang,
						'IDSuplier'=>$kodesuplier ,
						'NamaBarang' =>$namabarang , 
						'Jenis' =>$jenisbarang,
						'Harga' => $harga,
						'Jml_max' =>$jmlmax,
						'Jml_min' => $jmlmin
						 );

				$query=	$this->db->insert('tblbarang', $object); //insert db dengan controller
					//insert db dengan model

					//$query = $this->m_suplier->insert($object);
					
					if ($query) {
						$this->session->set_flashdata('info','berhasil diinsert');
						redirect('pembelian/inputbarang');
					}
				}
			}

		} else
		{
			$data['content']="viewpembelian/viewinputbarang";
			$data['kodesuplier'] = $this->m_suplier->all();
			$data['kodebarang'] = $this->m_barang->all();
			$this->load->view('template', $data);
		}
	}

	public function edit($id)
	{
		if ($this->input->post('submit')) 
			{
				$this->form_validation->set_rules('id', 'kode barang', 'trim|required');
				$this->form_validation->set_rules('kodesuplier', 'kode suplier', 'trim|required');
				$this->form_validation->set_rules('namabarang', 'nama barang', 'trim|required');
				$this->form_validation->set_rules('jenisbarang', 'alamat barang', 'trim|required');
				$this->form_validation->set_rules('harga', 'harga', 'trim|required');
				$this->form_validation->set_rules('jmlmax', 'jumlah maksimum', 'trim|required');
				$this->form_validation->set_rules('jmlmin', 'jumlah minimum', 'trim|required');

				if ($this->form_validation->run()==FALSE) {
					$data['content'] = 'viewpembelian/vieweditbarang';
					$data['editdata'] = $this->db->get_where('tblbarang', array('IDBarang' => $id ))->row();
					$suplierbarang = $this->db->get_where('v_barang_suplier', array('IDBarang' => $id))->row();
					$data['editdatasuplier'] = $suplierbarang;
					$data['datasuplier'] = $this->m_suplier->all();
					$this->load->view('template', $data);
				} else
				{
					$kodebarang = $this->input->post('id');
					$kodesuplier = $this->input->post('kodesuplier');
					$namabarang= $this->input->post('namabarang');
					$jenisbarang = $this->input->post('jenisbarang');
					$harga = $this->input->post('harga');
					$jmlmax = $this->input->post('jmlmax');
					$jmlmin = $this->input->post('jmlmin');

					$object =array(
						'IDBarang' => $kodebarang,
						'IDSuplier'=>$kodesuplier ,
						'NamaBarang' =>$namabarang , 
						'Jenis' =>$jenisbarang,
						'Harga' => $harga,
						'Jml_max' =>$jmlmax,
						'Jml_min' => $jmlmin
						 );

					$this->m_barang->update($id,$object);

					if ($this->db->affected_rows()) {
						$this->session->set_flashdata('info', 'Sudah update');
						redirect('pembelian/inputbarang');
					}
					else
					{
						$this->session->set_flashdata('info', 'gagal update');
						redirect('pembelian/inputbarang');
					}

						}

		} else
		{
			$data['content'] = 'viewpembelian/vieweditbarang';
			$data['editdata'] = $this->db->get_where('tblbarang', array('IDBarang' => $id ))->row();
			$suplierbarang = $this->db->get_where('v_barang_suplier', array('IDBarang' => $id))->row();
			$data['editdatasuplier'] = $suplierbarang;
			$data['datasuplier'] = $this->m_suplier->all();
			$this->load->view('template', $data);
		}
	}

	public function hapus($id)
	{
		$this->m_barang->delete($id);

			if ($this->db->affected_rows()) {
				$this->session->set_flashdata('info', 'berhasil dihapus');
				redirect('pembelian/inputbarang');
			}
			else
			{
				$this->session->set_flashdata('info', 'gagal dihapus');
				redirect('pembelian/inputbarang');
			}
	}
}

/* End of file inputbarang.php */
/* Location: ./application/controllers/pembelian/inputbarang.php */