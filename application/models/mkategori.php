<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkategori extends CI_Model
{
	public function index()
	{

	}

	public function code_otomatis(){
        $this->db->select('Right(kategori.kd_kategori,6) as kode ',false);
            $this->db->order_by('id', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('kategori');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }

            $date = date('Ymd');
            // $kode .=$date;
            $kodemax = str_pad($kode,6,"0",STR_PAD_LEFT);
            $konik  = "KTGR".$date.$kodemax;
            
            return $konik;

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
		$c = $this->input->post('kode');

		$object = array(
				'nm_kategori' => $a,
				'keterangan'  => $b,
				'kd_kategori' => $c
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
