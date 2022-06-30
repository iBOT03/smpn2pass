<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jabatan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/JabatanModel');
		$this->load->library('upload');
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

		$data['info']  = $this->JabatanModel->read();
		$data['count'] = $this->JabatanModel->count();
		$this->load->view('admin/jabatan/jabatan', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/jabatan/tambah');
		} else {
			$dataPost = array(
				'id'	        => '',
				'jabatan'		=> $this->input->post('jabatan'),
				'created_at'	=> date('Y-m-d H:i:s'),
				'updated_at'	=> date('Y-m-d H:i:s')
			);
			if ($this->JabatanModel->create($dataPost)) {
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
				redirect('admin/Jabatan');
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
				redirect('admin/Jabatan');
			}
		}
	}

	public function update($id = null)
	{
		$this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data["info"]	 = $this->JabatanModel->detail($id);
			$this->load->view('admin/jabatan/edit', $data);
		} else {
			$update = $this->JabatanModel->update(array(
				'id'			=> $this->input->post('id'),
				'jabatan'	    => $this->input->post('jabatan'),
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
				redirect('admin/Jabatan');
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
				redirect('admin/Jabatan');
			}
		}
	}

	public function delete($id)
    {
        $delete = $this->JabatanModel->delete($id);
        if ($delete) {
            $this->session->set_flashdata(
                'success_msg',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<span class="alert-icon"><i class="ni ni-check-bold"></i></span>
					<span class="alert-text"><strong>Selamat,</strong> data berhasil dihapus !</span>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
            );
            redirect('admin/Jabatan');
        } else {
            $this->session->set_flashdata(
                'error_msg',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<span class="alert-icon"><i class="ni ni-check-bold"></i></span>
					<span class="alert-text"><strong>Maaf,</strong> data gagal dihapus !</span>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
            );
            redirect('admin/Jabatan');
        }
    }
}
