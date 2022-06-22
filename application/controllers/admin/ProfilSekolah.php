<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProfilSekolah extends CI_Controller {

	public function index()
	{
		$data = array();

		//Flashdata
		if ($this->session->userdata('success_msg')) {
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if ($this->session->userdata('error_msg')) {
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}

		$this->load->view('admin/profil-sekolah/profil-sekolah', $data);
	}
}
