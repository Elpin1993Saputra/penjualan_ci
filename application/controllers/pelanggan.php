<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->load->model('mpelanggan');
	}

	public function index()
	{
			$data['judul'] = "List Pelanggan";
			$data['content'] = "/pelanggan/list";
			$data['getData'] = $this->mpelanggan->getPelanggan()->result_array();

			$this->load->view('pages/home',$data);

	}

	public function form()
	{
		$data['judul'] = 'Form Input Pelanggan';
		$data['content'] = "/pelanggan/form_add";

		$this->load->view('pages/home', $data);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama', 'nama pelanggan','trim|required');
		$this->form_validation->set_rules('alamat', 'alamat pelanggan', 'trim|required');
		$this->form_validation->set_rules('nohp', 'nomor hp pelanggan', 'trim|required|numeric');
		
			$this->load->helper(array('form', 'url'));

             $this->load->library('form_validation');


		if($this->form_validation->run() == FALSE)
		{
			$data['judul'] = "Form Input Pelanggan";
			$data['content'] = "/pelanggan/form_add";
			$this->load->view('pages/home', $data);
		}else
		{
			$query = $this->mpelanggan->insert();
			$this->session->set_flashdata('info', 'Berhasil dimasukkan');
			redirect('/pelanggan');
		}


	}

	public function form_edit($id)
	{	
		$getId = $this->mpelanggan->getPelanggan("where id = '$id'")->result_array();

		// print_r($getId);
		$data = array(
				"id" => $getId[0]['id'],
				"nmpel" => $getId[0]['nmpel'],
				"alamat" => $getId[0]['alamat'],
				"nohp" => $getId[0]['nohp']

			);
		
		// $data["content"] = "";
		$data['content'] = "/pelanggan/form_edit";
		$data['judul'] = "Form Edit Pelanggan";

		$this->load->view('pages/home', $data);
	}

	public function do_edit(){

		$this->form_validation->set_rules('nama', 'nama pelanggan','trim|required');
		$this->form_validation->set_rules('alamat', 'alamat supplier', 'trim|required');
		$this->form_validation->set_rules('nohp', 'nomor hp supplier', 'trim|required|numeric');


			$this->load->helper(array('form', 'url'));

             $this->load->library('form_validation');


            if ($this->form_validation->run() == FALSE){
		        $data['judul'] = "Form Edit Pelanggan";
				$data['content'] ="/pelanggan/form_edit/";
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
					'nmpel' => $nama,
					'alamat' => $alamat,
					'nohp' => $nohp
					
				);

				$where = array ('id' => $id);
				$res = $this->mpelanggan->update('pelanggan', $data_update, $where);
				if($res>=1)
				{
					$this->session->set_flashdata('info', 'Data diubah');
					redirect('/pelanggan');
				}
			}
	}



	public function do_delete($id)
	{
		$where = array('id' => $id);
		$res = $this->mpelanggan->delete('pelanggan', $where);

		if($res >=1)
		{
			$this->session->set_flashdata('info', 'Data dihapus');
			redirect('/pelanggan');
		}
	}


}
