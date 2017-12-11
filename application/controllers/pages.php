<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	
	public function index()
	{
		$data['content'] = "/pages/content";
		$this->load->view('pages/home',$data);
	}
}
