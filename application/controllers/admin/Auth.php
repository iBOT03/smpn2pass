<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

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

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/login', $data);
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

		if ($user) {
			if ($user['status'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'username'		=> $user['username'],
						'email'			=> $user['email'],
						'password'		=> $user['password'],
						'status' 		=> $user['status'],
						'level' 		=> $user['level'],
						'created_at'	=> $user['created_at'],
						'updated_at'	=> $user['updated_at']
					];
					$this->session->set_userdata($data);
					$this->session->set_flashdata(
						'success_msg',
						'<div class="alert alert-success alert-dismissible text-left fade show" role="alert">
							<span class="alert-icon"><i class="ni ni-satisfied"></i></span>
							<span class="alert-text"><strong>Selamat datang,</strong> ' . $this->session->userdata('username') . ' !</span>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>'
					);
					redirect('admin/Dashboard');
				} else {
					$this->session->set_flashdata(
						'error_msg',
						'<div class="alert alert-danger alert-dismissible text-left fade show" role="alert">
							<span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
							<span class="alert-text"><strong>Password Salah!</strong> Pastikan password anda benar dan tidak kurang dari 6 karakter!</span>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>'
					);
					redirect('admin/Auth');
				}
			} else {
				$this->session->set_flashdata(
					'error_msg',
					'<div class="alert alert-danger alert-dismissible text-left fade show" role="alert">
						<span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
						<span class="alert-text"><strong>Akun telah di Non-Aktifkan!</strong> Hubungi administrator untuk mengaktifkan akun anda!</span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
				);
				redirect('admin/Auth');
			}
		} else {
			$this->session->set_flashdata(
				'error_msg',
				'<div class="alert alert-danger alert-dismissible text-left fade show" role="alert">
					<span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
					<span class="alert-text"><strong>Akun belum terdaftar!</strong> Pastikan anda memiliki akun yang aktif serta terdaftar!</span>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect('admin/Auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('status');
		$this->session->unset_userdata('level');
		$this->session->unset_userdata('created_at');
		$this->session->unset_userdata('updated_at');
		$this->session->set_flashdata(
			'success_msg',
			'<div class="alert alert-success alert-dismissible text-left fade show" role="alert">
				<span class="alert-icon"><i class="ni ni-like-2"></i></span>
				<span class="alert-text"><strong>Anda berhasil keluar!</strong> Silahkan masuk kembali untuk melanjutkan!</span>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>'
		);
		redirect('admin/Auth');
	}
}
