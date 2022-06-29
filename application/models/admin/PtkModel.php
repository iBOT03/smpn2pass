<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PtkModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function read()
    {
        return $this->db->get('tb_ptk')->result();
    }

    public function create($data = array())
    {
        return $this->db->insert('tb_ptk', $data);
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_ptk', $data);
    }

    public function updatePw($cekpw, $email)
    {
        $this->db->set('password', $cekpw);
        $this->db->where('email', $email);
        $this->db->update('tb_ptk');
        return $this->db;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tb_ptk');
    }

    public function detail($id)
    {
        $this->db->where('id', $id);
        return $this->db->get("tb_ptk")->result();
    }

    public function count()
    {
        $query = $this->db->get("tb_ptk");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function Rel()
    {
        return $this->db->query("SELECT * FROM tb_jabatan, tb_ptk WHERE tb_jabatan.id = tb_ptk.jabatan_id")->result();
    }

    public function getJabatan()
    {
        return $this->db->get('tb_jabatan')->result();
    }

    public function getJab()
    {
        $query = $this->db->get('tb_jabatan');
        return $query->result_array();
    }

    public function getDetail($id)
    {
        $query = $this->db->query("SELECT * FROM tb_ptk, tb_jabatan WHERE tb_ptk.jabatan_id = tb_jabatan.id AND tb_ptk.id = '$id'")->result();
        return $query;
    }
}