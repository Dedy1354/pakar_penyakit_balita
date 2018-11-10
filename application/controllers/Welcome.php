<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');

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
		$this->load->view('welcome_message');
	}
	public function register()
	{
		$this->load->view('user/register');
	}
	public function add_pasien(){

	  	$data['NAMA_PASIEN']= $this->input->post('NAMA_PASIEN');
		$data['USERNAME']= $this->input->post('USERNAME');
		$data['PASSWORD']= $this->input->post('PASSWORD');
		$data['UMUR_PASIEN']= $this->input->post('UMUR_PASIEN');
		$data['ALAMAT_PASIEN']= $this->input->post('ALAMAT_PASIEN');
		$data['GENDER_PASIEN']= $this->input->post('GENDER_PASIEN');
		$data['LEVEL_USER']= $this->input->post('LEVEL_USER');
		$this->Admin_model->input_data($data);
		redirect('login/login_pasien');

	
	}
}
