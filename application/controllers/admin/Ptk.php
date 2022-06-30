<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ptk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/PtkModel');
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

        $data['info']  = $this->PtkModel->Rel();
        $data['count'] = $this->PtkModel->count();
        $this->load->view('admin/civitas/ptk/ptk', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama', 'Nama Pengajar/Tenaga kerja', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('nip', 'Nip', 'required|trim|max_length[30]|is_unique[tb_ptk.nip]');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('foto', 'Foto Sekolah', 'trim');

        if ($this->form_validation->run() == false) {
            $data['jabatan'] = $this->PtkModel->getJabatan();
            $this->load->view('admin/civitas/ptk/tambah', $data);
        } else {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['quality'] = '75%';
            $config['upload_path'] = './uploads/ptk/';

            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
                $dataPost = array(
                    'id'            => '',
                    'nama'            => $this->input->post('nama'),
                    'nip'            => $this->input->post('nip'),
                    'jabatan_id'    => $this->input->post('jabatan'),
                    'foto'            => trim($foto),
                    'created_at'    => date('Y-m-d H:i:s'),
                    'updated_at'    => date('Y-m-d H:i:s')
                );
                if ($this->PtkModel->create($dataPost)) {
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
                    redirect('admin/Ptk');
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
                    redirect('admin/Ptk');
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
                redirect('admin/Ptk');
            }
        }
    }

    public function delete($id)
    {
        $delete = $this->PtkModel->delete($id);
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
            redirect('admin/Ptk');
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
            redirect('admin/Ptk');
        }
    }

    public function update($id = null)
    {
        $this->form_validation->set_rules('nama', 'Nama Pengajar/Tenaga kerja', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('nip', 'Nip', 'required|trim|max_length[30]');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('foto', 'Foto Sekolah', 'trim');

        if ($this->form_validation->run() == false) {
            $data["bagian"]     = $this->PtkModel->detail($id);
            $data["row"]     = $this->PtkModel->getJab($id);
            $data["data"]     = $this->PtkModel->getDetail($id);
            $data['user']	 = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/civitas/ptk/edit', $data);
        } else {
            $update = $this->PtkModel->update(array(
                'id'            => $this->input->post('id'),
                'nama'          => $this->input->post('nama'),
                'nip'           => $this->input->post('nip'),
                'jabatan_id'    => $this->input->post('jabatan'),
                'created_at'    => $this->input->post('created_at'),
                'updated_at'    => date('Y-m-d H:i:s')
            ), $id);

            if ($update) {
                $ubahfoto = $_FILES['foto']['name'];
                if ($ubahfoto) {
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size']         = '2048';
                    $config['upload_path']      = './uploads/ptk/';
                    $config['file_name']      = $ubahfoto;

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('foto')) {
                        $user = $this->db->get_where('tb_ptk', ['id' => $id])->row_array();
                        $fotolama = $user['foto'];
                        if ($fotolama) {
                            unlink(FCPATH . './uploads/ptk/' . $fotolama);
                        }
                        $fotobaru = $this->upload->data('file_name');
                        $this->db->set('foto', $fotobaru);
                        $this->db->where('id', $id);
                        $this->db->update('tb_ptk');
                    } else {
                        $this->session->set_flashdata(
                            'pesan',
                            '<div class="alert alert-danger alert-dismissible fade show" role="alert">
								<span class="alert-icon"><i class="ni ni-check-bold"></i></span>
								' . $this->upload->display_errors() . '
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>'
                        );
                        redirect('admin/Ptk');
                    }
                }
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
						<span class="alert-icon"><i class="ni ni-check-bold"></i></span>
						<span class="alert-text"><strong>Selamat,</strong> data berhasil diperbaharui !</span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
                );
                redirect('admin/Ptk');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<span class="alert-icon"><i class="ni ni-check-bold"></i></span>
						<span class="alert-text"><strong>Maaf,</strong> data gagal diperbaharui !</span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
                );
                redirect('admin/Ptk');
            }
        }
    }
}
