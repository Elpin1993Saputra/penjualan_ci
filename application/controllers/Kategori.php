<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mkategori');
		$this->load->library('form_validation');
	}

	public function index()
	{
		// $this->load->view('welcome_message');
		$data['judul'] = "List Kategori";
		$data['content'] = "kategori/list";
		$data['getKategori'] = $this->mkategori->getKategori()->result_array();

		$this->load->view('pages/home', $data);

	}

	public function form(){
		$data['judul'] = "Form Input Kategori";
		$data['content'] = "/kategori/form_add";
		$data['konik'] = $this->mkategori->code_otomatis();

		$this->load->view('pages/home', $data);
	}

	public function add(){

		$this->form_validation->set_rules('kode', 'kode kategori', 'trim|required');
		$this->form_validation->set_rules('nama', 'nama kategori', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		if($this->form_validation->run() == FALSE){
			$data['judul'] = "Form Input Kategori";
			$data['content'] = "/kategori/form_add";
			$data['konik'] = $_POST['kode'];
			$this->load->view('pages/home', $data);
		}
		else
		{
			$query = $this->mkategori->insert();

			$this->session->set_flashdata('info', 'Data Kategori Berhasil Disimpan');
			redirect('/kategori');
		}


	}

	public function form_edit($id)
	{
		$getId = $this->mkategori->getKategori(" where id= '$id'")->result_array();

		$data = array(
				"id" =>$getId[0]['id'],
				"nama" => $getId[0]['nm_kategori'],
				"keterangan" => $getId[0]['keterangan'],
				"kode"       => $getId[0]['kd_kategori']

			);

		// print_r($data);
		$data['content'] = "/kategori/form_edit";
		$data['judul']   = "Form Edit Kategori";

		$this->load->view('pages/home', $data);
	}

	public function do_edit(){

		$this->form_validation->set_rules('kode', 'kode kategori', 'trim|required');
		$this->form_validation->set_rules('nama', 'nama kategori', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'trim|required');

		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		if($this->form_validation->run() == FALSE){
			$data['judul'] = "Form Edit Kategori";
			$data['content'] = "/kategori/form_edit";
			$data['id']   = $_POST['id'];
			$data['kode'] = $_POST['kode'];
			$data['nama'] = $_POST['nama'];
			$data['keterangan'] = $_POST['keterangan'];


			$this->load->view('pages/home', $data);
		}
		else
		{
			$id = $_POST['id'];
			$nama = $_POST['nama'];
			$keterangan = $_POST['keterangan'];

			$data_update = array(
					'nm_kategori' =>$nama,
					'keterangan'  =>$keterangan
				);
			$where = array ('id'=>$id);
			$res = $this->mkategori->update('kategori', $data_update, $where);

			if($res>=1)
			{
				$this->session->set_flashdata('info', 'Data Diubah');

				redirect('/kategori');
			}

		}

	}


	public function do_delete($id)
		{
			$where = array('id' => $id);
			$res = $this->mkategori->delete('kategori', $where);

			if($res >= 1)
			{
				$this->session->set_flashdata('info', 'Data dihapus');

				redirect('/kategori');
			}
	}

	

}
