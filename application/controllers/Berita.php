<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/BeritaModel');
	}

	public function index()
	{
		$data['info']  = $this->BeritaModel->Rel();
		$this->load->view('berita', $data);
	}

	public function detail()
	{
		$data['info']     = $this->BeritaModel->rel();
		$this->load->view('berita-detail', $data);
	}
}
