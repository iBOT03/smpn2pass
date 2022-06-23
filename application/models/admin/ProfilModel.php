<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfilModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function read()
    {
        return $this->db->get('tb_profile')->result();
    }

    public function create($data = array())
    {
        return $this->db->insert('tb_profile', $data);
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_profile', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tb_profile');
    }

    public function detail($id)
    {
        $this->db->where('id', $id);
        return $this->db->get("tb_profile")->result();
    }
}