<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_suplier extends CI_Model {

function all()
{
	return $this->db->get('tblsuplier')->result_object();
}

public function allsuplierbyid($id)
{
	$this->db->where('IDSuplier', $id);
	return $this->db->get('tblsuplier')->result_object();
}

public function insert($data)
{
	return $this->db->insert('tblsuplier', $data);
}	

public function delete($id)
{
	$this->db->where('IDSuplier', $id);
	return $this->db->delete('tblsuplier');
}

public function update($id,$data)
{
	$this->db->where('IDSuplier', $id);
	$this->db->update('tblsuplier', $data);
}



}

/* End of file M_suplier.php */
/* Location: ./application/models/M_suplier.php */