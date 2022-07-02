<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ptk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/PtkModel');
	}

	public function index()
	{
		$data['info']  = $this->PtkModel->Rel();
		$this->load->view('ptk', $data);
	}
}
