<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/ProfilModel');
	}

	public function index()
	{
		$data['info'] 		= $this->ProfilModel->read();
		$data['alumni'] 	= $this->ProfilModel->alumni();
		$data['siswa'] 		= $this->ProfilModel->siswa();
		$data['ptk'] 		= $this->ProfilModel->ptk();
		$data['feedback'] 	= $this->ProfilModel->feedback();
		$this->load->view('beranda', $data);
	}
}
