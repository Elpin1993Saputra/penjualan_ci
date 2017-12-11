<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mbarang extends CI_Model
{
	public function index()
	{

	}

	public function getBarang($where = " ")
	{
		$get = $this->db->query("select t1.id as id, t1.nmbrg as nmbrg, t1.id_kategori as id_kategori, t1.satuan, t1.harga as harga, t1.jumlah as jumlah, t2.nm_kategori   from barang t1, kategori t2 where t1.id_kategori=t2.id ". " $where");

		return $get;
	}

	// public function getKategori($where = " ")
	// {
	// 	$get = $this->db->query("select * from kategori". "$where");

	// 	return $get;
	// }

	public function insert()
	{
		$b = $this->input->post('nama');
		$c = $this->input->post('satuan');
		$d = $this->input->post('jumlah');
		$e = $this->input->post('harga');
		$f = $this->input->post('kategori');

		$object = array(
				'nmbrg' => $b,
				'satuan'=> $c,
				'jumlah'=> $d,
				'harga' => $e,
				'id_kategori' => $f
			);
		$id = $this->db->insert('barang', $object);
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

	function cari_kode($keyword='', $registered='')
	{

		$sql = "
			SELECT 
				`id`, `nmbrg`, `jumlah`, `harga` 
			FROM 
				`barang` 
			WHERE 
				`jumlah` > 0 
				AND ( 
					`id` LIKE '%".$this->db->escape_like_str($keyword)."%' 
					OR `nmbrg` LIKE '%".$this->db->escape_like_str($keyword)."%' 
				) 
		";

		return $this->db->query($sql);
	}

	function get_stok($kode)
	{
		return $this->db
			->select('nmbrg, jumlah')
			->where('id', $kode)
			->limit(1)
			->get('barang');
	}

	function update_stok($id_barang, $jumlah_beli)
	{
		$sql = "Update barang set jumlah = jumlah +".$jumlah_beli." where id =' ".$id_barang."'";

		return $this->db->query($sql);
	}


}
