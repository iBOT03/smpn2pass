<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BeritaModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function read()
    {
        return $this->db->get('tb_berita')->result();
    }

    public function create($data = array())
    {
        return $this->db->insert('tb_berita', $data);
    }

    public function update($data, $id)
    {
        $this->db->where('id_berita', $id);
        return $this->db->update('tb_berita', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_berita', $id);
        return $this->db->delete('tb_berita');
    }

    public function detail($id)
    {
        $this->db->where('id_berita', $id);
        return $this->db->get("tb_berita")->result();
    }

    public function count()
    {
        $query = $this->db->get("tb_berita");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Rel()
    {
        return $this->db->query("SELECT * FROM tb_berita, tb_user WHERE tb_berita.upload_by = tb_user.id")->result();
    }
}