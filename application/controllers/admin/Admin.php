<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/AdminModel');
		$this->load->library('upload');
		error_reporting(0);
		// cek_session();
	}

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

		$data['info']  = $this->AdminModel->read();
		$data['count'] = $this->AdminModel->count();
		$this->load->view('admin/civitas/admin/admin', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_user.email]');
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|max_length[100]');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|matches[password1]');
		$this->form_validation->set_rules('level', 'Jabatan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/civitas/admin/tambah');
		} else {
			$dataPost = array(
				'id'	=> '',
				'username'		=> $this->input->post('username'),
				'email'			=> $this->input->post('email'),
				'level'			=> $this->input->post('level'),
				'status'		=> 1,
				'password'		=> password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'created_at'	=> date('Y-m-d H:i:s'),
				'updated_at'	=> date('Y-m-d H:i:s')
			);
			if ($this->AdminModel->create($dataPost)) {
				$this->session->set_flashdata(
					'success_msg',
					'<div class="alert alert-success alert-dismissible fade show" role="alert">
							<span class="alert-icon"><i class="ni ni-check-bold"></i></span>
							<span class="alert-text"><strong>Selamat,</strong> data berhasil ditambahkan !</span>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
					</div>'
				);
				redirect('admin/Admin');
			} else {
				$this->session->set_flashdata(
					'error_msg',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<span class="alert-icon"><i class="ni ni-check-bold"></i></span>
							<span class="alert-text"><strong>Maaf,</strong> data gagal ditambahkan !</span>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
					</div>'
				);
				redirect('admin/Admin');
			}
		}
	}

	public function update($id = null)
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('level', 'Jabatan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data["info"]	 = $this->AdminModel->detail($id);
			$data['user']	 = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('admin/civitas/admin/edit', $data);
		} else {
			$update = $this->AdminModel->update(array(
				'id'			=> $this->input->post('id'),
				'username'		=> $this->input->post('username'),
				'email'			=> $this->input->post('email'),
				'level'			=> $this->input->post('level'),
				'status'		=> 1,
				'created_at'	=> $this->input->post('created_at'),
				'updated_at'	=> date('Y-m-d H:i:s')
			), $id);

			if ($update) {
				$this->session->set_flashdata(
					'success_msg',
					'<div class="alert alert-success alert-dismissible fade show" role="alert">
						<span class="alert-icon"><i class="ni ni-check-bold"></i></span>
						<span class="alert-text"><strong>Selamat,</strong> data berhasil diperbaharui !</span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
				);
				redirect('admin/Admin');
			} else {
				$this->session->set_flashdata(
					'error_msg',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<span class="alert-icon"><i class="ni ni-check-bold"></i></span>
						<span class="alert-text"><strong>Maaf,</strong> data gagal diperbaharui !</span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
				);
				redirect('admin/Admin');
			}
		}
	}

	public function upPass()
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

		$data['user']	= $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
		$email = $this->session->userdata('email');

		$this->form_validation->set_rules('pwlama', 'Password Lama', 'required|trim|min_length[6]');
		$this->form_validation->set_rules('pwbaru', 'Password Baru', 'required|trim|min_length[6]|max_length[100]');
		$this->form_validation->set_rules('konfirpwbaru', 'Konfirmasi Password', 'required|matches[pwbaru]');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/civitas/admin/edit', $data);
		} else {
			$pwLama = $this->input->post(htmlspecialchars('pwlama'));
			$pwbaru = $this->input->post(htmlspecialchars('pwbaru'));

			if (!password_verify($pwLama, $data['user']['password'])) {
				$this->session->set_flashdata(
					'error_msg',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
						<span class="alert-text"><strong>Gagal,</strong> password lama tidak sesuai !</span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
				);
				redirect('admin/Admin');
			} else {
				$cekpw = password_hash($pwbaru, PASSWORD_DEFAULT);
				$this->AdminModel->updatePw($cekpw, $email);
				$this->session->set_flashdata(
					'success_msg',
					'<div class="alert alert-success alert-dismissible fade show" role="alert">
						<span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
						<span class="alert-text"><strong>Selamat,</strong> password berhasil diperbaharui !</span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
				);
				redirect('admin/Admin');
			}
		}
	}

	public function detail($id)
	{
		$data['info'] = $this->AdminModel->detail($id);

		if (isset($_POST['aktif'])) {
			$this->AdminModel->active($id);
			$this->session->set_flashdata(
				'success_msg',
				'<div class="alert alert-success alert-dismissible fade show" role="alert">
					<span class="alert-icon"><i class="ni ni-check-bold"></i></span>
					<span class="alert-text"><strong>Selamat,</strong> akun berhasil di Aktifkan !</span>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('admin/Admin');
		} elseif (isset($_POST['mati'])) {
			$this->AdminModel->nonActive($id);
			$this->session->set_flashdata(
				'success_msg',
				'<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
					<span class="alert-text"><strong>Selamat,</strong> akun berhasil di Non - Aktifkan !</span>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('admin/Admin');
		}
		$this->load->view('admin/civitas/admin/detail', $data);
	}
}
