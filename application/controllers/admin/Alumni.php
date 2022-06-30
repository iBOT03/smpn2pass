<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alumni extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/AlumniModel');
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

		$data['info']  = $this->AlumniModel->read();
		$data['count'] = $this->AlumniModel->count();
		$this->load->view('admin/civitas/alumni/alumni', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama', 'Nama lengkap', 'required|trim|max_length[50]');
		$this->form_validation->set_rules('tahun', 'Tahun lulus', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/civitas/alumni/tambah');
		} else {
			$dataPost = array(
				'id'	        => '',
				'nama'		    => $this->input->post('nama'),
				'tahun_lulus'	=> $this->input->post('tahun'),
				'created_at'	=> date('Y-m-d H:i:s'),
				'updated_at'	=> date('Y-m-d H:i:s')
			);
			if ($this->AlumniModel->create($dataPost)) {
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
				redirect('admin/Alumni');
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
				redirect('admin/Alumni');
			}
		}
	}

	public function update($id = null)
	{
		$this->form_validation->set_rules('nama', 'Nama lengkap', 'required|trim|max_length[50]');
		$this->form_validation->set_rules('tahun', 'Tahun lulus', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data["info"]	 = $this->AlumniModel->detail($id);
			$this->load->view('admin/civitas/alumni/edit', $data);
		} else {
			$update = $this->AlumniModel->update(array(
				'id'			=> $this->input->post('id'),
				'nama'		    => $this->input->post('nama'),
				'tahun_lulus'	=> $this->input->post('tahun'),
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
				redirect('admin/Alumni');
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
				redirect('admin/Alumni');
			}
		}
	}

	public function delete($id)
    {
        $delete = $this->AlumniModel->delete($id);
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
            redirect('admin/Alumni');
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
            redirect('admin/Alumni');
        }
    }
}
