<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penjualan extends CI_Model {

	public function allpenjualan()
	{
		return $this->db->get('v_laporan_penjualan')->result_object();
	}

	public function penjualanbytanggal($tanggal)
	{
		$this->db->where('TglTransaksi', $tanggal);
		return $this->db->get('v_laporan_penjualan')->result_object();
	}

	public function namasuplier($idsuplier)
	{
		$this->db->select('NamaSuplier');
		$this->db->where('IDSuplier', $idsuplier);
		return $this->db->get('tblsuplier')->row()->NamaSuplier;
	}

	public function selectwherestatus($id,$status)
	{
		return $this->db->query("SELECT * from tbltransaksi where IDBarang ='$id' and Status = '$status'")->result_object();
	}

	public function sisabarang($idbarang)
	{
		$this->load->model('m_penjualan');
		 $hasilmasuk=0;
		 $hasilkeluar=0;
		 $hasilretur=0;

		 $querymasuk = $this->m_penjualan->selectwherestatus($idbarang,"masuk");
		 $querykeluar = $this->m_penjualan->selectwherestatus($idbarang,"keluar");
		 $queryretur = $this->m_penjualan->selectwherestatus($idbarang,"retur");
		foreach ($querymasuk as $key) 
		{
			$hasilmasuk=$hasilmasuk + $key->Jumlah;
		}
		foreach ($querykeluar as $key) 
		{
			$hasilkeluar=$hasilkeluar + $key->Jumlah;
		}
		foreach ($queryretur as $key) 
		{
			$hasilretur=$hasilretur + $key->Jumlah;
		}
			
		$hasil = $hasilmasuk-$hasilkeluar+$hasilretur;

		return $hasil;

		 
	} 

}

/* End of file m_penjualan.php */
/* Location: ./application/models/m_penjualan.php */