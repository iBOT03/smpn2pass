<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function index()
	{
		$this->load->view('berita');
	}
	
	public function detail()
	{
		$this->load->view('berita-detail');
	}
}