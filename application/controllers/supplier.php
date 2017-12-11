<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('msupplier');

	}


	public function index()
	{


		$data['judul'] = "List Supplier";
		$data['content'] = "/supplier/list";
		$data['getData'] = $this->msupplier->getSupplier()->result_array();

		$this->load->view('pages/home', $data);


	}

	public function form()
	{
		$data['judul'] = "Form Input Supplier";
		$data['content'] = "/supplier/form_add";

		$this->load->view('pages/home', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama', 'nama supplier','trim|required');
		$this->form_validation->set_rules('alamat', 'alamat supplier', 'trim|required');
		$this->form_validation->set_rules('nohp', 'nomor hp supplier', 'trim|required|numeric');
		
			$this->load->helper(array('form', 'url'));

             $this->load->library('form_validation');


		if($this->form_validation->run() == FALSE)
		{
			$data['judul'] = "Form Input Barang";
			$data['content'] = "/supplier/form_add";
			$this->load->view('pages/home', $data);
		}else
		{
			$query = $this->msupplier->insert();
			$this->session->set_flashdata('info', 'Berhasil dimasukkan');
			redirect('/supplier');
		}
	}

	public function form_edit($id)
	{	
		$getId = $this->msupplier->getSupplier("where id = '$id'")->result_array();

		// print_r($getId);
		$data = array(
				"id" => $getId[0]['id'],
				"nm_supplier" => $getId[0]['nmsupplier'],
				"alamat" => $getId[0]['alamat'],
				"nohp" => $getId[0]['nohp']

			);
		
		// $data["content"] = "";
		$data['content'] = "/supplier/form_edit";
		$data['judul'] = "Form Edit Barang";

		$this->load->view('pages/home', $data);
	}

	public function do_edit(){

		$this->form_validation->set_rules('nama', 'nama supplier','trim|required');
		$this->form_validation->set_rules('alamat', 'alamat supplier', 'trim|required');
		$this->form_validation->set_rules('nohp', 'nomor hp supplier', 'trim|required|numeric');


			$this->load->helper(array('form', 'url'));

             $this->load->library('form_validation');


            if ($this->form_validation->run() == FALSE){
		        $data['judul'] = "Form Edit Supplier";
				$data['content'] ="/supplier/form_edit/";
				$this->load->view('pages/home', $data);
			}
			else
			{
				// print_r($_POST);
				$id = $_POST['id'];
				$nama = $_POST['nama'];
				$alamat = $_POST['alamat'];
				$nohp = $_POST['nohp'];
				
				$data_update = array(
					'nmsupplier' => $nama,
					'alamat' => $alamat,
					'nohp' => $nohp
					
				);

				$where = array ('id' => $id);
				$res = $this->msupplier->update('supplier', $data_update, $where);
				if($res>=1)
				{
					$this->session->set_flashdata('info', 'Data diubah');
					redirect('/supplier');
				}
			}
	}

	public function do_delete($id)
	{
		$where = array('id' => $id);
		$res = $this->msupplier->delete('supplier', $where);

		if($res >=1)
		{
			$this->session->set_flashdata('info', 'Data dihapus');
			redirect('/supplier');
		}
	}

	public function detail_supplier($id="")
	{

		$getId = $this->msupplier->getSupplier("where id = '$id'")->result_array();

		// print_r($getId);
		$data = array(
				"id" => $getId[0]['id'],
				"nm_supplier" => $getId[0]['nmsupplier'],
				"alamat" => $getId[0]['alamat'],
				"nohp" => $getId[0]['nohp']

			);
		        $data['judul'] = "";
				$data['content'] ="/supplier/detail_supplier";
				$this->load->view('pages/home', $data);


		// $this->load->view("detail_supplier",$data);
	}


}
