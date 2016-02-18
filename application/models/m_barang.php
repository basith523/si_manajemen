<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

	function all()
{
	return $this->db->get('tblbarang')->result_object();
}

public function allbarangbysuplier($id)
{
	$this->db->where('IDSuplier', $id);
	return $this->db->get('tblbarang')->result_object();
}

public function allbarangbyid($id)
{
	$this->db->where('IDBarang', $id);
	return $this->db->get('tblbarang')->result_object();
}

public function insert($data)
{
	return $this->db->insert('tblbarang', $data);
}	

public function delete($id)
{
	$this->db->where('IDBarang', $id);
	return $this->db->delete('tblbarang');
}

public function update($id,$data)
{
	$this->db->where('IDBarang', $id);
	return $this->db->update('tblbarang', $data);
}

}

/* End of file m_barang.php */
/* Location: ./application/models/m_barang.php */