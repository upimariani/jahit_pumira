<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mKelolaDataMaster extends CI_Model
{

    //kelola data user
    public function create_user($data)
    {
        $this->db->insert('user', $data);
    }
    public function select_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result();
    }
    public function edit_user($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user', $id);
        return $this->db->get()->row();
    }
    public function update_user($id, $data)
    {
        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }
    public function delete_user($id)
    {
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    //kelola data kategori produk
    public function select_kategori()
    {
        $this->db->select('*');
        $this->db->from('kategori');
        return $this->db->get()->result();
    }
    public function insert_kategori($data)
    {
        $this->db->insert('kategori', $data);
    }
    public function delete_kategori($id)
    {
        $this->db->where('id_kategori', $id);
        $this->db->delete('kategori');
    }
    public function update_kategori($id, $data)
    {
        $this->db->where('id_kategori', $id);
        $this->db->update('kategori', $data);
    }
}
                        
/* End of file KelolaDataMaster.php */
