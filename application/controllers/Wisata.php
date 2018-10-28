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

	public function delete($id){
		if (!$id) {
			redirect(base_url('wisata'));
		} else {
			$where = $id;
			if($this->maininfo->hapus_wisata($where)){
				$this->session->set_flashdata('notif','Berhasil menghapus data');
      			redirect(base_url('backend/wisata'));
			} else {
				$this->session->set_flashdata('notif','Berhasil menghapus data');
      			redirect(base_url('backend/wisata'));
			}
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

	  $config['upload_path'] = './assets/img/pariwisata/';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['gambar']['name'];
      	
      	$this->upload->initialize($config);

      if (!empty($_FILES['gambar']['name'])) {

      		if($this->upload->do_upload('gambar')){

      				$foto = $this->upload->data();

      			$data = array('idcity' => $kota,
      						  'title' => $title,
      						  'desc' => $desc,
      						  'address' => $address,
      						  'weekday' => $weekday,
      						  'weekend' => $weekend,
      						  'telp' => $telp,
      						  'link' => $link,
      						  'image' => $foto['file_name'],
      						  'image1' => '',
      						  'image2' => '',
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

	public function update($id){
		$title = $this->input->post('title');
		$kota = $this->input->post('kota');
		$desc = $this->input->post('desc');
		$address = $this->input->post('alamat');
		$weekday = $this->input->post('weekday');
		$weekend = $this->input->post('weekend');
		$telp = $this->input->post('notelp');
		$link = $this->input->post('link');


      			$data = array('idcity' => $kota,
      						  'title' => $title,
      						  'desc' => $desc,
      						  'address' => $address,
      						  'weekday' => $weekday,
      						  'weekend' => $weekend,
      						  'telp' => $telp,
      						  'link' => $link);

      		if($this->maininfo->update_wisata($data,$id)){
      			$this->session->set_flashdata('notif','Berhasil mengedit data');
      			redirect(base_url('wisata/edit/'.$id));
      		}else{
      			 $errors = array("error" => $this->upload->display_errors());
      			 $this->session->set_flashdata('gagal',$errors['error']);

      			redirect(base_url('wisata/edit/'.$id));
      		}
      	}

    public function update_gambar($id){

      $config['upload_path'] = './assets/img/pariwisata/';
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

      		$this->maininfo->update_gambar($data,$id);
      		$this->session->set_flashdata('notif','Berhasil mengedit foto');
      		redirect(base_url('wisata/edit/'.$id));
      		}else{
      			 $errors = array("error" => $this->upload->display_errors());
      			 $this->session->set_flashdata('gagal',$errors['error']);

      			redirect(base_url('wisata/edit/'.$id));
      		}
      	}else{
      		$errors = array("error" => $this->upload->display_errors());
      			 $this->session->set_flashdata('gagal',$errors['error']);

      			redirect(base_url('wisata/edit/'.$id));
      	}

    }


    public function update_gambar1($id){

      $config['upload_path'] = './assets/img/pariwisata/';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['gambar1']['name'];
      	
      	$this->upload->initialize($config);

      if (!empty($_FILES['gambar1']['name'])) {

      		if($this->upload->do_upload('gambar1')){

      				$foto = $this->upload->data();

      			$data = array('image1' => $foto['file_name']);

      		$this->maininfo->update_gambar($data,$id);
      		$this->session->set_flashdata('notif','Berhasil mengedit foto');
      		redirect(base_url('wisata/edit/'.$id));
      		}else{
      			 $errors = array("error" => $this->upload->display_errors());
      			 $this->session->set_flashdata('gagal',$errors['error']);

      			redirect(base_url('wisata/edit/'.$id));
      		}
      	}else{
      		$errors = array("error" => $this->upload->display_errors());
      			 $this->session->set_flashdata('gagal',$errors['error']);

      			redirect(base_url('wisata/edit/'.$id));
      	}

    }


    public function update_gambar2($id){

      $config['upload_path'] = './assets/img/pariwisata/';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['gambar2']['name'];
      	
      	$this->upload->initialize($config);

      if (!empty($_FILES['gambar2']['name'])) {

      		if($this->upload->do_upload('gambar2')){

      				$foto = $this->upload->data();

      			$data = array('image2' => $foto['file_name']);

      		$this->maininfo->update_gambar($data,$id);
      		$this->session->set_flashdata('notif','Berhasil mengedit foto');
      		redirect(base_url('wisata/edit/'.$id));
      		}else{
      			 $errors = array("error" => $this->upload->display_errors());
      			 $this->session->set_flashdata('gagal',$errors['error']);

      			redirect(base_url('wisata/edit/'.$id));
      		}
      	}else{
      		$errors = array("error" => $this->upload->display_errors());
      			 $this->session->set_flashdata('gagal',$errors['error']);

      			redirect(base_url('wisata/edit/'.$id));
      	}

    }


}
