<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkategori extends CI_Model
{
	public function index()
	{

	}

	public function getKategori($where = " ")
	{
		$get = $this->db->query("select * from kategori". "$where");

		return $get;
	}

	public function insert()
	{
		$a = $this->input->post('nama');
		$b = $this->input->post('keterangan');

		$object = array(
				'nm_kategori' => $a,
				'keterangan'  => $b
			);
		$id = $this->db->insert('kategori', $object);

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
