<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {
		function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('maininfo');
	
		if($this->session->userdata('status') != 'login'){
			redirect(base_url("login"));
		}
	}
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
		redirect(base_url('backend/wisata'));

	}

	public function wisata()
	{
		$data['wisatas'] = $this->maininfo->get_wisata();
		$this->load->view('backend/header');
		$this->load->view('backend/navbar');
		$this->load->view('backend/master-wisata',$data);
		$this->load->view('backend/footer');
	}

	
	public function create_wisata(){
		$data['kotas'] = $this->maininfo->get_kota();
		$this->load->view('backend/header');
		$this->load->view('backend/navbar');
		$this->load->view('backend/wisata/create-wisata',$data);
		$this->load->view('backend/footer');
	}
}
