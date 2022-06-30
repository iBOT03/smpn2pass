<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('admin/BeritaModel');
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

        $data['info']  = $this->BeritaModel->Rel();
        $data['count'] = $this->BeritaModel->count();
        $this->load->view('admin/berita/berita', $data);
    }

    public function tambah()
    {
        $this->form_validation->set_rules('judul', 'Judul Berita', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('foto', 'Foto Berita', 'trim');
        $this->form_validation->set_rules('link', 'Tautan pendukung');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/berita/tambah');
        } else {
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['quality'] = '75%';
            $config['upload_path'] = './uploads/berita/';

            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
                $dataPost = array(
                    'id_berita'     => '',
                    'judul'         => $this->input->post('judul'),
                    'deskripsi'     => $this->input->post('deskripsi'),
                    'link'          => $this->input->post('link'),
                    'foto'          => trim($foto),
                    'upload_by'     => $this->session->userdata('id'),
                    'created_at'    => date('Y-m-d H:i:s'),
                    'update_at'    => date('Y-m-d H:i:s')
                );
                if ($this->BeritaModel->create($dataPost)) {
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
                    redirect('admin/Berita');
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
                    redirect('admin/Berita');
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
                redirect('admin/Berita');
            }
        }
    }

    public function delete($id)
    {
        $delete = $this->BeritaModel->delete($id);
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
            redirect('admin/Berita');
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
            redirect('admin/Berita');
        }
    }

    public function update($id = null)
    {
        $this->form_validation->set_rules('judul', 'Judul Berita', 'required|trim|max_length[50]');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');
        $this->form_validation->set_rules('foto', 'Foto Berita', 'trim');
        $this->form_validation->set_rules('link', 'Tautan pendukung');

        if ($this->form_validation->run() == false) {
            $data['info']     = $this->BeritaModel->detail($id);
            $data['user']     = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
            $this->load->view('admin/berita/edit', $data);
        } else {
            $update = $this->BeritaModel->update(array(
                'id_berita'     => $this->input->post('id'),
                'judul'         => $this->input->post('judul'),
                'deskripsi'     => $this->input->post('deskripsi'),
                'link'          => $this->input->post('link'),
                'upload_by'     => $this->session->userdata('id'),
                'created_at'    => $this->input->post('created_at'),
                'update_at'    => date('Y-m-d H:i:s')
            ), $id);

            if ($update) {
                $ubahfoto = $_FILES['foto']['name'];
                if ($ubahfoto) {
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size']      = '2048';
                    $config['upload_path']   = './uploads/berita/';
                    $config['file_name']     = $ubahfoto;

                    $this->upload->initialize($config);

                    if ($this->upload->do_upload('foto')) {
                        $user = $this->db->get_where('tb_berita', ['id_berita' => $id])->row_array();
                        $fotolama = $user['foto'];
                        if ($fotolama) {
                            unlink(FCPATH . './uploads/berita/' . $fotolama);
                        }
                        $fotobaru = $this->upload->data('file_name');
                        $this->db->set('foto', $fotobaru);
                        $this->db->where('id_berita', $id);
                        $this->db->update('tb_berita');
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
                        redirect('admin/Berita');
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
                redirect('admin/Berita');
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
                redirect('admin/Berita');
            }
        }
    }
}
