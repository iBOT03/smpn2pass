<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Civitas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/SiswaModel');
		$this->load->model('admin/AlumniModel');
	}

	public function index()
	{
		$data['info']  = $this->SiswaModel->kelas7();
		$this->load->view('civitas/siswa7', $data);
	}
	
    public function kelas8()
	{
		$data['info']  = $this->SiswaModel->kelas8();
		$this->load->view('civitas/siswa8', $data);
	}

    public function kelas9()
	{
		$data['info']  = $this->SiswaModel->kelas9();
		$this->load->view('civitas/siswa9', $data);
	}

    public function alumni()
	{
		$data['info']  = $this->AlumniModel->read();
		$this->load->view('civitas/alumni', $data);
	}
}
