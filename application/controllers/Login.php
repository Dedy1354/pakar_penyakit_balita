<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login');
	}
	
	public function index()
	{
		$this->load->view('login');
	}

	public function login_pasien()
	{
		$this->load->view('login_pasien');
	}
	public function cek_login_pasien() {

		$data = array('USERNAME' => $this->input->post('USERNAME', TRUE),
					  'PASSWORD' => $this->input->post('PASSWORD', TRUE),
		);
		$hasil = $this->M_login->cek_pasien($data);

		if ($hasil->num_rows() > 0) {
			
			foreach ($hasil->result() as $sess) {
				$sess_data['USERNAME'] = $sess->USERNAME;
				$sess_data['PASSWORD'] = $sess->PASSWORD;
				$sess_data['LEVEL_USER'] = $sess->LEVEL_USER;
			}
			$this->session->set_userdata($sess_data);
			
			if ($this->session->userdata('LEVEL_USER')=='admin') {
				redirect('/Admin/','refresh');
			}
			else if ($this->session->userdata('LEVEL_USER')=='pasien') {
				redirect('/User/','refresh');
			}

			print_r($this->session->userdata('LEVEL_USER'));	
		}else {
			$this->session->set_flashdata('gagal_login','
			 	<p class="text-danger text-center" >
			 		Password Atau User name Salah,
			 	</p>
			 	');
			redirect('Welcome','refresh');
		}
	}


	public function logout (){
		$this->session->unset_userdata('LEVEL_USER');
		session_destroy();
		redirect('Welcome','refresh');
	}
}