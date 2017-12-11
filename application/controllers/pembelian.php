<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mpembelian');
		$this->load->model('mdetail_pembelian');
		$this->load->model('mbarang');
		$this->load->model('msupplier');
	}

	public function index()
	{
		$data['judul'] = "List Pembelian";
		$data['content'] = "/pembelian/list";
		$data['getData'] = $this->mpembelian->getPembelian()->result_array();

		$this->load->view('pages/home', $data);
	}

	public function detail_pembelian($id="")
	{
		$cond1 = "and t1.id = '".$id."'";
		
		$id_pembelian = $this->mpembelian->get_id()->row()->id;

		// print_r($id_pembelian);
		// die();

		$getPembelian = $this->mpembelian->detailPembelian1($cond1)->result_array();
		$data = array(
				'nota' => $getPembelian[0]['nota'],
				'nm_sup'=> $getPembelian[0]['nmsupplier'],
				'jml_beli' => $getPembelian[0]['jumlahbeli'],
				'tgl' => $getPembelian[0]['tgl'],
				'total' => $getPembelian[0]['total']
			);
		$cond2 = "and t1.id_pembelian = '".$id."'";
		$data['judul'] = "Detail Pembelian";
		$data['content'] = "/pembelian/detail_pembelian";
		$data['getData2'] = $this->mpembelian->detailPembelian2($cond2)->result_array();


		$this->load->view('pages/home', $data);
	}

	public function form()
	{
		$data['judul'] = "Form Input Pembelian";
		$data['content'] = "/pembelian/form_add";
		
		$data['getSupplier'] = $this->msupplier->getSupplier()->result_array();
		$data['idBeli'] = $this->mpembelian->get_id()->row()->id;	

		$this->load->view('pages/home', $data);
	}

	public function ajax_kode()
	{
		if($this->input->is_ajax_request())
		{
			$keyword 	= $this->input->post('keyword');
			$registered	= $this->input->post('registered');

			
			$barang = $this->mbarang->cari_kode($keyword, $registered);

			if($barang->num_rows() > 0)
			{
				$json['status'] 	= 1;
				$json['datanya'] 	= "<ul id='daftar-autocomplete'>";
				foreach($barang->result() as $b)
				{
					$json['datanya'] .= "
						<li>
							<b>Kode</b> : 
							<span id='kodenya'>".$b->id."</span> <br />
							<span id='barangnya'>".$b->nmbrg."</span>
							<span id='stoknya'>".$b->jumlah."</span>
							<span id='harganya' style='display:none;'>".$b->harga."</span>
						</li>
					";
				}
				$json['datanya'] .= "</ul>";
			}
			else
			{
				$json['status'] 	= 0;
			}

			echo json_encode($json);
		}
	}

	public function add()
	{
		if($_POST)
		{

			$id_pembelian = $this->mpembelian->get_id()->row()->id;	

			
			
			$tgl_pembelian = $_POST['tgl_beli'];
			$id_supplier = $_POST['supplier'];
			$nota_beli = $_POST['nota'];

			$inserted=0;
			// $no_array = 0;
			// echo "<pre>";
			$totalBeli=0;
			$totalBayar=0;

			$jml=count($_POST['jumlah_beli']);
			echo $jml;//counter for

			for($a=0;$a<$jml;$a++) 
			{	
				$id_barang = $_POST['id_barang'][$a];

				$jml_beli = $_POST['jumlah_beli'][$a];

				$subtotal = $_POST['sub_total'][$a];
				$totalBayar+=$subtotal;
				$totalBeli +=$jml_beli;

				$insert_detail=$this->mdetail_pembelian->insert_detail($id_pembelian, $id_barang, $jml_beli, $subtotal);

					if($insert_detail)
					{
						$this->mbarang->update_stok($id_barang, $jml_beli);

						$inserted++;
					}
					// print_r($key);
			}	


			

			$query = $this->mpembelian->insert($nota_beli,$id_supplier,$totalBeli, $tgl_pembelian,$totalBayar);;
				// if($query)
				// {
					$this->session->set_flashdata('info', 'Berhasil dimasukkan');
			redirect('/pembelian');
	
		 }

	}

	public function do_delete($id)
	{
		$where = array ('id' => $id);
		$res   = $this->mpembelian->delete('pembelian', $where);

		if($res >=1)
		{
			$this->session->set_flashdata('info', 'Data dihapus');

			redirect('/pembelian');
		}
	}


}
