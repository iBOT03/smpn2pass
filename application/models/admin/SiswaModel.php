<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SiswaModel extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function read()
    {
        return $this->db->get('tb_siswa')->result();
    }

    public function create($data = array())
    {
        return $this->db->insert('tb_siswa', $data);
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_siswa', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tb_siswa');
    }

    public function detail($id)
    {
        $this->db->where('id', $id);
        return $this->db->get("tb_siswa")->result();
    }

    public function count()
    {
        $query = $this->db->get("tb_siswa");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}