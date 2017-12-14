<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Msupplier extends CI_Model
{
	public function index()
	{

	}

	public function code_otomatis(){
		$this->db->select('right(supplier.kd_supplier,6) as kode',false);
		$this->db->order_by('id', 'desc');
		$this->db->limit(1);
		$query = $this->db->get('supplier');
		if($query->num_rows()<>0)
		{
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 1;
		}

		$date = date('Ymd');
		$kodemax = str_pad($kode,6,"0",STR_PAD_LEFT);
		$konik = "SPLR".$date.$kodemax;

		return $konik;
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
		$d = $this->input->post('kode');

		$object = array(
				'nmsupplier' => $a,
				'alamat'     => $b,
				'nohp'       => $c,
				'kd_supplier'=> $d
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
