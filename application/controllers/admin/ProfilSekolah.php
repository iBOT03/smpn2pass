<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfilSekolah extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('admin/ProfilModel');
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

		$data['info'] = $this->ProfilModel->read();
		$data['count'] = $this->ProfilModel->count();
		$this->load->view('admin/profil-sekolah/profil-sekolah', $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('nama', 'Nama Sekolah', 'required|trim|max_length[50]');
		$this->form_validation->set_rules('slogan', 'Slogan', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[tb_profile.email]');
		$this->form_validation->set_rules('no_telpon', 'Contact person', 'required|min_length[11]|max_length[20]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('tentang', 'Tentang', 'required|trim');
		$this->form_validation->set_rules('foto', 'Foto Sekolah', 'trim');
		$this->form_validation->set_rules('link', 'Tautan', 'valid_url');

		if ($this->form_validation->run() == false) {
			$this->load->view('admin/profil-sekolah/tambah');
		} else {
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '2048';
			$config['quality'] = '75%';
			$config['upload_path'] = './uploads/foto_sekolah/';

			$this->upload->initialize($config);

			if ($this->upload->do_upload('foto')) {
				$foto = $this->upload->data('file_name');
				$dataPost = array(
					'id'			=> '',
					'nama'			=> $this->input->post('nama'),
					'slogan'		=> $this->input->post('slogan'),
					'email'			=> $this->input->post('email'),
					'telepon'		=> $this->input->post('no_telpon'),
					'alamat'		=> $this->input->post('alamat'),
					'about'			=> $this->input->post('tentang'),
					'foto'			=> trim($foto),
					'link'			=> $this->input->post('link'),
					'created_at'	=> date('Y-m-d H:i:s'),
					'updated_at'	=> date('Y-m-d H:i:s')
				);
				if ($this->ProfilModel->create($dataPost)) {
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
					redirect('admin/ProfilSekolah');
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
					redirect('admin/ProfilSekolah');
				}
			} else {
				$this->session->set_flashdata(
					'error_msg',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">'
						. $this->upload->display_errors() .
						'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
				);
				redirect('admin/ProfilSekolah');
			}
		}
	}

	public function update($id = null)
	{
		$this->form_validation->set_rules('nama', 'Nama Sekolah', 'required|trim|max_length[50]');
		$this->form_validation->set_rules('slogan', 'Slogan', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('no_telpon', 'Contact person', 'required|min_length[11]|max_length[20]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('tentang', 'Tentang', 'required|trim');
		$this->form_validation->set_rules('foto', 'Foto Sekolah', 'trim');
		$this->form_validation->set_rules('link', 'Tautan', 'valid_url');

		if ($this->form_validation->run() == false) {
			$data["info"]	 = $this->ProfilModel->detail($id);
			$data['user']	 = $this->db->get_where('tb_profile', ['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('admin/profil-sekolah/edit', $data);
		} else {
			$update = $this->ProfilModel->update(array(
				'id'			=> $this->input->post('id'),
				'nama'			=> $this->input->post('nama'),
				'slogan'		=> $this->input->post('slogan'),
				'email'			=> $this->input->post('email'),
				'telepon'		=> $this->input->post('no_telpon'),
				'alamat'		=> $this->input->post('alamat'),
				'about'			=> $this->input->post('tentang'),
				'link'			=> $this->input->post('link'),
				'created_at'	=> $this->input->post('created_at'),
				'updated_at'	=> date('Y-m-d H:i:s')
			), $id);

			if ($update) {
				$ubahfoto = $_FILES['foto']['name'];
				if ($ubahfoto) {
					$config['allowed_types'] = 'jpg|jpeg|png';
					$config['max_size']		 = '2048';
					$config['upload_path'] 	 = './uploads/foto_sekolah/';
					$config['file_name'] 	 = $ubahfoto;

					$this->upload->initialize($config);

					if ($this->upload->do_upload('foto')) {
						$user = $this->db->get_where('tb_profile', ['id' => $id])->row_array();
						$fotolama = $user['foto'];
						if ($fotolama) {
							unlink(FCPATH . './uploads/foto_sekolah/' . $fotolama);
						}
						$fotobaru = $this->upload->data('file_name');
						$this->db->set('foto', $fotobaru);
						$this->db->where('id', $id);
						$this->db->update('tb_profile');
					} else {
						$this->session->set_flashdata(
							'error_msg',
							'<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<span class="alert-icon"><i class="ni ni-check-bold"></i></span>
								' . $this->upload->display_errors() . '
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>'
						);
						redirect('admin/ProfilSekolah');
					}
				}
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
				redirect('admin/ProfilSekolah');
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
				redirect('admin/ProfilSekolah');
			}
		}
	}
}
