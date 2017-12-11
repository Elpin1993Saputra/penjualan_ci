<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mdetail_pembelian extends CI_Model
{
	function insert_detail($id_master, $id_barang, $jumlah_beli,$subtotal)
	{
		$data = array(
				'id_pembelian'=>$id_master,
				'kd_barang'   =>$id_barang,
				'jumlah'      =>$jumlah_beli,
				'jml_bayar'   =>$subtotal

			);

		$get = $this->db->insert('detail_pembelian', $data);

		return $get;
	}
}
