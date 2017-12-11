<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msupplier extends CI_Model
{
	public function index()
	{

	}

	public function getSupplier($where= ""){
		$get = $this->db->query("select * from supplier ". " $where");

		return $get;
	}

	public function insert()
	{
		$a = $this->input->post('nama');
		$b = $this->input->post('alamat');
		$c = $this->input->post('nohp');

		$object = array(
				'nmsupplier' => $a,
				'alamat'     => $b,
				'nohp'       => $c
			);
		$id = $this->db->insert('supplier', $object);
		return $id;
	}

	public function delete($tabel, $where)
	{
		$id = $this->db->delete($tabel, $where);

		return $id;
	}

	public function update($tabel, $data, $where)
	{
		$res = $this->db->update($tabel, $data, $where);
		return $res;
	}


}
