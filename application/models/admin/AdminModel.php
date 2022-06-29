<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function read()
    {
        return $this->db->get('tb_user')->result();
    }

    public function create($data = array())
    {
        return $this->db->insert('tb_user', $data);
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_user', $data);
    }

    public function updatePw($cekpw, $email)
    {
        $this->db->set('password', $cekpw);
        $this->db->where('email', $email);
        $this->db->update('tb_user');
        return $this->db;
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tb_user');
    }

    public function detail($id)
    {
        $this->db->where('id', $id);
        return $this->db->get("tb_user")->result();
    }

    public function active($id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_user', ['status' => '1']);
    }

    public function nonActive($id)
    {
        $this->db->where('id', $id);
        $this->db->update('tb_user', ['status' => '0']);
    }

    public function count()
    {
        $query = $this->db->get("tb_user");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}