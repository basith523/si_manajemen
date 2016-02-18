<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inputsuplier extends CI_Controller {

	 public function __construct()
	{
		parent::__construct();
		$this->load->model('m_suplier');
		$this->is_logged_in();
	}

	public function is_logged_in(){
	$is_logged_in=$this->session->userdata('is_logged_in');
		if(!isset($is_logged_in)||$is_logged_in!= true) {
		redirect(base_url());
		} 
	}

	public function index()
	{
		$suplier = $this->m_suplier->all();
		$data2['content'] = "viewpembelian/viewinputsuplier";
		$data2['isi'] = $suplier;
		$data = [
					'content' => 'viewpembelian/viewinputsuplier',
					'isi' => $suplier
				];

			$this->load->view('template', $data2);
	}

	public function tambah()
	{
		if ($this->input->post('submit')) {

			$this->form_validation->set_rules('kodesuplier', 'kode suplier', 'trim|required');
			$this->form_validation->set_rules('namasuplier', 'nama suplier', 'trim|required');
			$this->form_validation->set_rules('alamatsuplier', 'alamat suplier', 'trim|required');
			$this->form_validation->set_rules('kontak', 'Kontak', 'trim|required');

			if ($this->form_validation->run()==FALSE) {
				$data['content']='viewpembelian/viewinputsuplier';
				$this->load->view('template',$data);
			} else
			{
				$kodesuplier = $this->input->post('kodesuplier');
				$namasuplier= $this->input->post('namasuplier');
				$alamatsuplier = $this->input->post('alamatsuplier');
				$kontak = $this->input->post('kontak');
				

				if ($this->m_suplier->allsuplierbyid($kodesuplier)) {

						$this->session->set_flashdata('info','terdapat kode yang sama');
						redirect('pembelian/inputsuplier');
				}
				else
				{
					$object =array(
						'IDSuplier'=>$kodesuplier ,
						'NamaSuplier' =>$namasuplier , 
						'AlamatSuplier' =>$alamatsuplier,
						'Telepon' => $kontak 
						 );

						$query=	$this->db->insert('tblsuplier', $object); //insert db dengan controller
					//insert db dengan model

					//$query = $this->m_suplier->insert($object);
					
					if ($query) {
						$this->session->set_flashdata('info','berhasil diinsert');
						redirect('pembelian/inputsuplier');
					}
				}
			}

		} else
		{
			$data['content']="viewpembelian/viewinputsuplier";
			$this->load->view('template', $data);
		}
	}

	public function hapus($id)
	{
		$this->m_suplier->delete($id);

			if ($this->db->affected_rows()) {
				$this->session->set_flashdata('info', 'berhasil dihapus');
				redirect('pembelian/inputsuplier');
			}
			else
			{
				$this->session->set_flashdata('info', 'gagal dihapus');
				redirect('pembelian/inputsuplier');
			}
	}

	public function edit($id)
	{
			if ($this->input->post('submit')) 
			{

				$this->form_validation->set_rules('id', 'kode suplier', 'trim|required');
				$this->form_validation->set_rules('namasuplier', 'nama suplier', 'trim|required');
				$this->form_validation->set_rules('alamatsuplier', 'alamat suplier', 'trim|required');
				$this->form_validation->set_rules('kontak', 'Kontak', 'trim|required');

				if ($this->form_validation->run()==FALSE) {
					$data['content'] = 'viewpembelian/vieweditsuplier';
					$data['editdata'] = $this->db->get_where('tblsuplier', array('IDSuplier' => $id ))->row();
					$this->load->view('template', $data);
				} else
				{
					$kodesuplier = $this->input->post('id');
					$namasuplier= $this->input->post('namasuplier');
					$alamatsuplier = $this->input->post('alamatsuplier');
					$kontak = $this->input->post('kontak');

					$object =array(
						'IDSuplier'=>$kodesuplier ,
						'NamaSuplier' =>$namasuplier , 
						'AlamatSuplier' =>$alamatsuplier,
						'Telepon' => $kontak 
						 );

					$this->m_suplier->update($id,$object);

					if ($this->db->affected_rows()) {
						$this->session->set_flashdata('info', 'Sudah update');
						redirect('pembelian/inputsuplier');
					}
					else
					{
						$this->session->set_flashdata('info', 'gagal update');
						redirect('pembelian/inputsuplier');
					}

				}

		} else
		{
			$data['content'] = 'viewpembelian/vieweditsuplier';
			$data['editdata'] = $this->db->get_where('tblsuplier', array('IDSuplier' => $id ))->row();
			$this->load->view('template', $data);
		}
	}

}

/* End of file Inputsuplier.php */
/* Location: ./application/controllers/pembelian/Inputsuplier.php */