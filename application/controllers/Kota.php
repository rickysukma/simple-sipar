<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kota extends CI_Controller {
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
		redirect(base_url('backend/kota'));

	}


	
	public function create_kota(){
		$this->load->view('backend/header');
		$this->load->view('backend/navbar');
		$this->load->view('backend/kota/create-kota');
		$this->load->view('backend/footer');
	}

	public function edit($id){
		if (!$id) {
			redirect(base_url('wisata'));
		} else {
			$data['kotas'] = $this->maininfo->getkota_by($id);
			$this->load->view('backend/header');
			$this->load->view('backend/navbar');
			$this->load->view('backend/kota/edit-kota',$data);
			$this->load->view('backend/footer');
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
			if($this->maininfo->hapus_kota($where)){
				$this->session->set_flashdata('notif','Berhasil menghapus data');
      			redirect(base_url('backend/kota'));
			} else {
				$this->session->set_flashdata('notif','Berhasil menghapus data');
      			redirect(base_url('backend/kota'));
			}
		}
	}



	public function simpan(){
		$kota = $this->input->post('kota');
		$data = array('city' => $kota);
		if ($this->maininfo->tambah_kota($data)) {
			$this->session->set_flashdata('notif','Berhasil menambahkan data');
      		redirect(base_url('kota/create_kota'));
      		
		}else{
			$this->session->set_flashdata('gagal','Gagal menambahkan data');
      		redirect(base_url('kota/create_kota'));
		}
	}
}
