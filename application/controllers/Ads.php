<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads extends CI_Controller {
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
		redirect(base_url('backend/ads'));

	}


	
	public function create_ads(){
		$data['wisatas'] = $this->maininfo->get_wisata();
		$data['kategoris'] = $this->maininfo->getkat();
		$this->load->view('backend/header');
		$this->load->view('backend/navbar');
		$this->load->view('backend/ads/create-ads',$data);
		$this->load->view('backend/footer');
	}

	public function edit($id){
		if (!$id) {
			redirect(base_url('wisata'));
		} else {
			$data['iklans'] = $this->maininfo->getinfoads_by($id);
			$data['wisatas'] = $this->maininfo->get_wisata();
			$data['kategoris'] = $this->maininfo->getkat();
			$this->load->view('backend/header');
			$this->load->view('backend/navbar');
			$this->load->view('backend/ads/edit-ads',$data);
			$this->load->view('backend/footer');
		}
	}

	public function update_gambar($id){

      $config['upload_path'] = './assets/img/iklan/';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['gambar']['name'];
      	
      	$this->upload->initialize($config);

      if (!empty($_FILES['gambar']['name'])) {

      		if($this->upload->do_upload('gambar')){

      				$foto = $this->upload->data();

      			$data = array('image' => $foto['file_name']);

      		$this->maininfo->update_gambar_ads($data,$id);
      		$this->session->set_flashdata('notif','Berhasil mengedit foto');
      		redirect(base_url('ads/edit/'.$id));
      		}else{
      			 $errors = array("error" => $this->upload->display_errors());
      			 $this->session->set_flashdata('gagal',$errors['error']);

      			redirect(base_url('ads/edit/'.$id));
      		}
      	}else{
      		$errors = array("error" => $this->upload->display_errors());
      			 $this->session->set_flashdata('gagal',$errors['error']);

      			redirect(base_url('ads/edit/'.$id));
      	}

    }

	public function update($id){
		if (!$id) {
			redirect(base_url('wisata'));
		} else {
			$where = $id;
			$data = array('city' => $this->input->post('kota'));
			if($this->maininfo->update_kota($data,$where)){
				$this->session->set_flashdata('notif','Berhasil mengedit data');
      			redirect(base_url('kota/edit/'.$id));
			} else {
				$this->session->set_flashdata('gagal','Gagal mengedit data');
      		redirect(base_url('kota/create_kota'));
			}
		}
	}

	public function delete($id){
		if (!$id) {
			redirect(base_url('wisata'));
		} else {
			$where = $id;
			if($this->maininfo->hapus_iklan($where)){
				$this->session->set_flashdata('notif','Berhasil menghapus data');
      			redirect(base_url('backend/ads'));
			} else {
				$this->session->set_flashdata('notif','Berhasil menghapus data');
      			redirect(base_url('backend/ads'));
			}
		}
	}



	public function simpan(){
		$title = $this->input->post('title');
		$idmaininfo = $this->input->post('idmaininfo');
		$idcat = $this->input->post('kategori');
		$desc = $this->input->post('desc');
		$address = $this->input->post('alamat');
		$price = $this->input->post('tiket');
		$weekend = $this->input->post('weekend');
		$telp = $this->input->post('notelp');
		$link = $this->input->post('link');

	  $config['upload_path'] = './assets/img/iklan/';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['gambar']['name'];


      	$this->upload->initialize($config);

      if (!empty($_FILES['gambar']['name'])) {

      		if($this->upload->do_upload('gambar')){

      				$foto = $this->upload->data();

      			$data = array('idmaininfo' => $idmaininfo,
      						  'title' => $title,
      						  'desc' => $desc,
      						  'idcat' => $idcat,
      						  'address' => $address,
      						  'price' => $price,
      						  'telp' => $telp,
      						  'link' => $link,
      						  'image' => $foto['file_name']);

      		$this->maininfo->tambah_ads($data);
      		$this->session->set_flashdata('notif','Berhasil menambahkan data');
      		redirect(base_url('ads/create_ads'));
      		}else{
      			 $errors = array("error" => $this->upload->display_errors());
      			 $this->session->set_flashdata('gagal',$errors['error']);

      			redirect(base_url('ads/create_ads'));
      		}
      	}else{
      		$errors = array("error" => $this->upload->display_errors());
      			 $this->session->set_flashdata('gagal',$errors['error']);

      			redirect(base_url('ads/create_ads'));
      	}

	}
}

