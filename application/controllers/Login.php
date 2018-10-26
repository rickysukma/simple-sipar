<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
		function __construct(){
		parent::__construct();		
		$this->load->model('m_login');
		$this->load->library('session');
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
		if ($this->session->userdata('status') == 'login') {
			redirect(base_url('admin'));
		}else{
			$this->load->view('backend/login');
		}
		
	}

	public function go_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');


		$where = array('username' => $username,
						'password' => $password,
						'status' => '0');

		$hasil = $this->m_login->cek_login('user',$where)->num_rows();

		if ($hasil> 0) {
			$sesi = $this->m_login->s_userdata('user',$where);
			foreach ($sesi as $sess) {
				$data_session['iduser'] = $sess->iduser;
				$data_session['status'] = "login";
				$data_session['type'] = $sess->type;
			}
			$this->session->set_userdata($data_session);
			redirect(base_url('admin'));
		}else{
			$this->session->set_flashdata('notif','Username atau password salah, silahkan masukan kembali dengan benar');
			redirect('login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
