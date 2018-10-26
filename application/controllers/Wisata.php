<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wisata extends CI_Controller {
		function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('maininfo');
		$this->load->helper(array('form', 'url'));
		$this->load->library('upload');
	
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

	public function edit($id){
		if (!$id) {
			redirect(base_url('wisata'));
		} else {

		$data['wisatas'] = $this->maininfo->get_wisata_byid($id);
		$data['kotas'] = $this->maininfo->get_kota();
		$this->load->view('backend/header');
		$this->load->view('backend/navbar');
		$this->load->view('backend/wisata/edit-wisata',$data);
		$this->load->view('backend/footer');
	}
	}

	public function simpan(){
		$title = $this->input->post('title');
		$kota = $this->input->post('kota');
		$desc = $this->input->post('desc');
		$address = $this->input->post('alamat');
		$weekday = $this->input->post('weekday');
		$weekend = $this->input->post('weekend');
		$telp = $this->input->post('notelp');
		$link = $this->input->post('link');

	  $config1['upload_path'] = './assets/img/pariwisata/';
      $config1['allowed_types'] = 'jpg|png|jpeg|gif';
      $config1['max_size'] = '2048';  //2MB max
      $config1['max_width'] = '4480'; // pixel
      $config1['max_height'] = '4480'; // pixel
      $config1['file_name'] = $_FILES['gambar']['name'];

      $config2['upload_path'] = './assets/img/pariwisata/';
      $config2['allowed_types'] = 'jpg|png|jpeg|gif';
      $config2['max_size'] = '2048';  //2MB max
      $config2['max_width'] = '4480'; // pixel
      $config2['max_height'] = '4480'; // pixel
      $config2['file_name'] = $_FILES['gambar1']['name'];

      $config3['upload_path'] = './assets/img/pariwisata/';
      $config3['allowed_types'] = 'jpg|png|jpeg|gif';
      $config3['max_size'] = '2048';  //2MB max
      $config3['max_width'] = '4480'; // pixel
      $config3['max_height'] = '4480'; // pixel
      $config3['file_name'] = $_FILES['gambar2']['name'];

      	$this->upload->initialize($config1);
      	$this->upload->initialize($config2);
      	$this->upload->initialize($config3);

      if (!empty($_FILES['gambar']['name'])) {

      		if($this->upload->do_upload('gambar')){

      				$foto1 = $this->upload->data();
      				$foto2 = $this->upload->data();
      				$foto3 = $this->upload->data();

      			$data = array('idcity' => $kota,
      						  'title' => $title,
      						  'desc' => $desc,
      						  'address' => $address,
      						  'weekday' => $weekday,
      						  'weekend' => $weekend,
      						  'telp' => $telp,
      						  'link' => $link,
      						  'image' => $foto1['file_name'],
      						  'image1' => $foto2['file_name'],
      						  'image2' => $foto3['file_name'],
      						  'image3' => '',
      						  'image4' => '',
      						  'image5' => '');

      		$this->maininfo->tambah_maininfo($data);
      		$this->session->set_flashdata('notif','Berhasil menambahkan data');
      		redirect(base_url('wisata/create_wisata'));
      		}else{
      			 $errors = array("error" => $this->upload->display_errors());
      			 $this->session->set_flashdata('gagal',$errors['error']);

      			redirect(base_url('wisata/create_wisata'));
      		}
      	}else{
      		$errors = array("error" => $this->upload->display_errors());
      			 $this->session->set_flashdata('gagal',$errors['error']);

      			redirect(base_url('wisata/create_wisata'));
      	}

	}
}
