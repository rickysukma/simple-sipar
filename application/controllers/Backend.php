<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends CI_Controller {
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
		$count_wisata = $this->db->query('SELECT * FROM maininfo');
		$count_hotel = $this->db->query('SELECT * FROM info_ads WHERE idcat = 1');
		$count_kuliner = $this->db->query('SELECT * FROM info_ads WHERE idcat = 2');
		$count_event = $this->db->query('SELECT * FROM info_ads WHERE idcat = 3');
		$data['count_wisata'] = $count_wisata->num_rows();
		$data['count_hotel'] = $count_hotel->num_rows();
		$data['count_kuliner'] = $count_kuliner->num_rows();
		$data['count_event'] = $count_event->num_rows();
		$data['wisatas'] = $this->maininfo->get_wisata();
		$this->load->view('backend/header');
		$this->load->view('backend/navbar');
		$this->load->view('backend/konten-dashboard',$data);
		$this->load->view('backend/footer');

	}

	public function pariwisata()
	{
		$this->load->view('frontend/head');
		$this->load->view('frontend/nav');
		$this->load->view('frontend/list-wisata');
		$this->load->view('frontend/footer');
	}

}
