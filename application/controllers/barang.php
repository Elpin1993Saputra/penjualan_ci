<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mbarang');
		$this->load->model('mkategori');
		// $this->load->library('form_validation');
	}

	public function index()
	{
        //echo "Ini function index controller Barang";
        $data['judul'] = "List Barang";
		$data['content'] = "/barang/list_barang";
		$data['getData'] = $this->mbarang->getBarang()->result_array();

		// $this->load->view('pages/home');
        $this->load->view('pages/home',$data);
	}
	public function form()
	{
        $data['judul'] = "Form Input Barang";
		$data['content'] = "/barang/form_add";
		$data['getKategori'] = $this->mkategori->getKategori()->result_array();
		$data['kode'] = $this->mbarang->code_otomatis();
		$data['kategori'] = "";

		$this->load->view('pages/home', $data);
	}

	public function add()
	{

		
			$this->form_validation->set_rules('kode','kode_barang','trim|required');
			$this->form_validation->set_rules('nama', 'nama barang', 'trim|required');
			$this->form_validation->set_rules('satuan', 'satuan barang', 'trim|required');
			$this->form_validation->set_rules('jumlah', 'jumlah barang', 'trim|required|numeric');
			$this->form_validation->set_rules('harga', 'harga barang', 'trim|required|numeric');
			$this->form_validation->set_rules('kategori', 'kategori barang', 'required');
			$this->form_validation->set_rules('keterangan', 'keterangan kategori', 'trim|required');


			$this->load->helper(array('form', 'url'));

             $this->load->library('form_validation');

            if ($this->form_validation->run() == FALSE){
		        $data['judul'] = "Form Input Barang";
				$data['content'] = '/barang/form_add';
				$data['kode'] = $_POST['kode'];
				$data['getKategori'] = $this->mkategori->getKategori()->result_array();
				$data['kategori'] = $_POST['kategori'];

				$this->load->view('pages/home', $data);
			}
			else
			{
				$query = $this->mbarang->insert();
				// if($query)
				// {
					$this->session->set_flashdata('info', 'Berhasil dimasukkan');
					redirect('/barang');
				// }
			}
		
		// else
		// {
		// 	$data['content'] = 'barang/add';
		// 	$this->load->view('utama', $data);
		// }

		// $data['content'] = "barang/add";
		// $this->load->view('utama', $data);

	}


	public function form_edit($id)
	{	
		$getId = $this->mbarang->getBarang("and t1.id = '$id'")->result_array();

		// print_r($getId);
		$data = array(
				"id" => $getId[0]['id'],
				"nama" => $getId[0]['nmbrg'],
				"satuan" => $getId[0]['satuan'],
				"jumlah" => $getId[0]['jumlah'],
				"harga" => $getId[0]['harga'],
				"kategori" => $getId[0]['id_kategori'],
				"kode" => $getId[0]['kdbrg'],
				"keterangan" => $getId[0]['keterangan']

			);
		$data['getKategori'] = $this->mkategori->getKategori()->result_array();

		// $data["content"] = "";
		$data['content'] = "/barang/form_edit";
		$data['judul'] = "Form Edit Barang";

		$this->load->view('pages/home', $data);
	}


	public function do_edit(){

		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";

		// die();

			$this->form_validation->set_rules('kode','kode_barang','trim|required');
			$this->form_validation->set_rules('nama', 'nama barang', 'trim|required');
			$this->form_validation->set_rules('satuan', 'satuan barang', 'trim|required');
			$this->form_validation->set_rules('jumlah', 'jumlah barang', 'trim|required|numeric');
			$this->form_validation->set_rules('harga', 'harga barang', 'trim|required|numeric');
			$this->form_validation->set_rules('kategori', 'kategori barang', 'required');
			$this->form_validation->set_rules('keterangan', 'keterangan kategori', 'trim|required');



			$this->load->helper(array('form', 'url'));

             $this->load->library('form_validation');


            if ($this->form_validation->run() == FALSE){
		        $data['judul'] = "Form Edit Barang";
				$data['content'] ="/barang/form_edit";
				$data['getKategori'] = $this->mkategori->getKategori()->result_array();
				$data['id'] = $_POST['id'];
				$data['kode'] = $_POST['kode'];
				$data['nama'] = $_POST['nama'];
				$data['satuan'] = $_POST['satuan'];
				$data['harga'] = $_POST['harga'];
				$data['jumlah'] = $_POST['jumlah'];
				$data['keterangan'] = $_POST['keterangan'];
				$data['kategori'] = $_POST['kategori'];

				$this->load->view('pages/home', $data);
			}
			else
			{
				// print_r($_POST);
				$id = $_POST['id'];
				$nama = $_POST['nama'];
				$satuan = $_POST['satuan'];
				$jumlah = $_POST['jumlah'];
				$harga = $_POST['harga'];
				$kategori = $_POST['kategori'];
				
				$data_update = array(
					'nmbrg' => $nama,
					'satuan' => $satuan,
					'jumlah' => $jumlah,
					'harga' => $harga,
					'id_kategori' => $kategori
				);

				$where = array ('id' => $id);
				$res = $this->mbarang->update('barang', $data_update, $where);
				if($res>=1)
				{
					$this->session->set_flashdata('info', 'Data diubah');
					redirect('/barang');
				}
			}
	}

	public function do_delete($id)
	{
		$where = array('id' => $id);
		$res = $this->mbarang->delete('barang', $where);

		if($res >=1)
		{
			$this->session->set_flashdata('info', 'Data dihapus');
			redirect('/barang');
		}
	}

	public function getKetKategori()
	{
		$id = $this->input->post('id');
		$response = $this->db->query("SELECT * FROM `kategori` where id='".$id."'")->row();
		if(empty($id))
		{   
			$response = array("keterangan" => "");
			echo json_encode($response);

		}else{
			echo json_encode($response);
		}
		/*$where = "where id = '".$id."'";
		$data=$this->mbarang->getKategori($where)->result_row();
		echo json_encode($data);*/

	}

	public function cek_stok()
	{
		if($this->input->is_ajax_request())
		{
			$this->load->model('mbarang');
			$kode = $this->input->post('kode_barang');
			$stok = $this->input->post('stok');

			$get_stok = $this->mbarang->get_stok($kode);
			// if($stok > $get_stok->row()->jumlah)
			if(($get_stok->row()->jumlah)+$stok >50)
			{
				echo json_encode(array('status' => 0, 'pesan' => "Stok untuk <b>".$get_stok->row()->nmbrg."</b> saat ini sudah ada <b>".$get_stok->row()->jumlah."</b> !"));
			}
			else
			{
				echo json_encode(array('status' => 1));
			}
		}
	}

}
