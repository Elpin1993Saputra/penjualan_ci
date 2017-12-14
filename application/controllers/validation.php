<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validation extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		// echo "Ini form validation";
		$data['judul'] = "Form Validation";
		$data['content'] = "/coba";

		$this->load->view('pages/home',$data);
	}

	public function validate()
	{
		$this->form_validation->set_rules(
			'firstname', '', 'required', array("required"=>"First name is required")
		);

		$this->form_validation->set_rules(
			'secondname', '', 'required', array("required"=>"Second name is required")
		);

		$this->form_validation->set_rules('gender', '', 'required', array("required"=>'Please choose the gender')
		);

		$this->form_validation->set_rules('how_did_you_here[]','', 'required',array("required"=>"Please select the How did you here about us field")
		 );
		$this->form_validation->set_rules('preferred_contact_type','', 'required',array("required"=>"Please select the preferrd contact type field")
		 );
		$this->form_validation->set_rules('message','', 'required',array("required"=>"Please enter something into message box")
		 );

		if($this->form_validation->run() == FALSE)
		{
			$data['judul'] = "Form Validation";
			$data['content'] = "/coba";

			$this->load->view('pages/home',$data); 
		}


	}

}
