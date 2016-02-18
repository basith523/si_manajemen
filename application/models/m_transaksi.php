<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_transaksi extends CI_Model {

function all()
{
	return $this->db->get('tbltransaksi')->result_object();
}

public function alltransaksibytanggal($tanggal)
{
	$this->db->where('TglTransaksi', $tanggal);
	return $this->db->get('v_laporan_pembelian')->result_object();
}

public function allbarangbyid($id)
{
	$this->db->where('IDBarang', $id);
	return $this->db->get('tblbarang')->result_object();
}

public function insert($data)
{
	return $this->db->insert('tbltransaksi', $data);
}	

public function delete($id)
{
	$this->db->where('IDTransaksi', $id);
	return $this->db->delete('tbltransaksi');
}

public function update($id,$data)
{
	$this->db->where('IDTransaksi', $id);
	return $this->db->update('tbltransaksi', $data);
}


}

/* End of file m_transaksi.php */
/* Location: ./application/models/m_transaksi.php */
