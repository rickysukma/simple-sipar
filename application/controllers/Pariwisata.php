<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pariwisata extends CI_Controller {
	function __construct(){
  parent::__construct();
  $this->load->model('maininfo');
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

		$data['pariwisatas'] = $this->maininfo->get_wisata();
		$this->load->view('frontend/head');
		$this->load->view('frontend/nav');
		$this->load->view('frontend/list-wisata',$data);
		$this->load->view('frontend/footer');
	}

	public function detail_wisata($id){
		if (!$id) {
			redirect(base_url());
		} else {

		
		$data['events'] = $this->maininfo->getevent_by($id);
		$data['kuliners'] = $this->maininfo->getkuliner_by($id);
		$data['hotels'] = $this->maininfo->gethotel_by($id);
		$data['wisatas'] = $this->maininfo->get_wisata_byid($id);
		$this->load->view('frontend/head');
		$this->load->view('frontend/nav');
		$this->load->view('frontend/detail-wisata',$data);
		$this->load->view('frontend/footer');

		}
	}

	public function tes($id){
		$data['hotels'] = $this->maininfo->gethotel_by($id);
		// $data['wisatas'] = $this->maininfo->get_wisata_byid($id);
		// $this->load->view('frontend/head');
		// $this->load->view('frontend/nav');
		$this->load->view('tes',$data);
		// $this->load->view('frontend/footer');	
	}
}
