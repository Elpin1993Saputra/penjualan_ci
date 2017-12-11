<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mpembelian extends CI_Model
{

	public function index()
	{

	}

	public function getPembelian($cond = "")
	{


		$get = $this->db->query("select t1.id as id, nota, t2.id as kdsupplier, t2.nmsupplier, jumlahbeli, tgl, total from pembelian t1, supplier t2 where t1.kdsupplier=t2.id ". " $cond");

		return $get;
	}

	public function detailPembelian1($cond = "")
	{
		$query1 = "select t1.id as kode, t1.nota, t2.id, nmsupplier, jumlahbeli, tgl,total from pembelian t1, supplier t2 where t1.kdsupplier= t2.id ". "$cond";

		$get = $this->db->query($query1);

		return $get;
	}

	public function detailPembelian2($cond = "")
	{
		// $query2 = "select t1.id_pembelian as id_detail, t1.kd_barang as kd_barang,  t2.nmbrg, t2.satuan, t1.jumlah, t1.jml_bayar from detail_pembelian t1, barang t2, pembelian t3 where t1.id_pembelian=t3.id and t1.kd_barang=t2.id ". "$cond";

// 		SELECT 
// 	t1.id as id_pembelian, t1. nota, t1.jumlahbeli, t1.tgl, t1. total, 
//     t2.jumlah as jml_beli, t2.jml_bayar as total,
//     t3.nmbrg, t3.satuan, t3.harga, t3.jumlah as stok,
//     t4.nmsupplier
// FROM 
// 	pembelian t1,
//     detail_pembelian t2,
//     barang t3,
//     supplier t4
// where 
// 	t1.id = t2.id_pembelian and
//     t2.kd_barang = t3.id AND
//     t1.kdsupplier = t4.id and t1.id=1


		$query2 = "SELECT 
						t1.id as id_pembelian, t1. nota, t1.jumlahbeli, t1.tgl, t1. total, 
					    t2.jumlah as jml_beli, t2.jml_bayar as total,
					    t3.nmbrg, t3.satuan, t3.harga, t3.jumlah as stok,
					    t4.nmsupplier
					FROM 
						pembelian t1,
					    detail_pembelian t2,
					    barang t3,
					    supplier t4
					where 
						t1.id = t2.id_pembelian and
					    t2.kd_barang = t3.id AND
					    t1.kdsupplier = t4.id ". " $cond"	;	
		$get = $this->db->query($query2);

		return $get;

	}

	public function get_id()
	{
		$query = "select * from pembelian order by id desc limit 1";

		$get = $this->db->query($query);

		return $get;
	}

	public function insert($nota,$id_supplier, $qty, $tgl_beli , $bayar)
	{
		$now= date('Y-m-d');
		$data = array(
				'nota'       => $nota,
				'kdsupplier' => $id_supplier,
				'jumlahbeli' => $qty,
				'tgl' 		  => $tgl_beli,
				'total'		  => $bayar
			);

		$result = $this->db->insert('pembelian', $data);

		return $result;
	}

	public function delete($tabel, $where)
	{
		$res = $this->db->delete($tabel, $where);

		return $res;
	}





}
