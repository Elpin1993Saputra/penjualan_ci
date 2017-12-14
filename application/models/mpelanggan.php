<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpelanggan extends CI_Model
{

	public function getPelanggan($where= "")
	{
		$get = $this->db->query("select * from pelanggan "." $where");

		return $get;
	}

	public function code_otomatis(){
        $this->db->select('Right(kd_pelanggan,6) as kode ',false);
            $this->db->order_by('id', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('pelanggan');
            if($query->num_rows()<>0){
                $data = $query->row();
                $kode = intval($data->kode)+1;
            }else{
                $kode = 1;

            }

            $date = date('Ymd');
            // $kode .=$date;
            $kodemax = str_pad($kode,6,"0",STR_PAD_LEFT);
            $konik  = "PLGN".$date.$kodemax;
            
            return $konik;

    }

	public function insert()
	{
		$a = $this->input->post('nama');
		$b = $this->input->post('alamat');
		$c = $this->input->post('nohp');
		$d = $this->input->post('kode');

		$object = array(
				'nmpel' => $a,
				'alamat'     => $b,
				'nohp'       => $c,
				'kd_pelanggan' =>$d
			);
		$id = $this->db->insert('pelanggan', $object);
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
