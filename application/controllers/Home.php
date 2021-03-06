<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Gejala_model');
		$this->load->model('Kondisi_model');
		$this->load->model('Pengetahuan_model');
		$this->load->model('Penyakit_model');
		$this->load->model('Hasil_model');
	}

	public function index()
	{
		$data['title'] = 'Sispak';
		$data['menu'] = "beranda";
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('template/user/user_header', $data);
		$this->load->view('user/user', $data);
		$this->load->view('template/user/user_footer');
	}
}
