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

    //kelola data produk
    public function select_produk()
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        return $this->db->get()->result();
    }
    public function insert_produk($data)
    {
        $this->db->insert('produk', $data);
    }
    public function edit_produk($id)
    {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('id_produk', $id);
        return $this->db->get()->row();
    }
    public function update_produk($id, $data)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('produk', $data);
    }
    public function delete_produk($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('produk');
    }
    //kelola data size
    public function size($id)
    {
        $this->db->select('*');
        $this->db->from('size');
        $this->db->join('produk', 'size.id_produk = produk.id_produk', 'left');
        $this->db->where('produk.id_produk', $id);
        $data['size'] = $this->db->get()->result();
        $data['produk'] = $this->db->get_where('produk', array('id_produk' => $id))->row();
        return $data;
    }
    public function insert_size($data)
    {
        $this->db->insert('size', $data);
    }
    public function delete_size($id)
    {
        $this->db->where('id_size', $id);
        $this->db->delete('size');
    }
    public function edit_size($id)
    {
        $this->db->select('*');
        $this->db->from('size');
        $this->db->join('produk', 'size.id_produk = produk.id_produk', 'left');
        $this->db->where('size.id_size', $id);
        return $this->db->get()->row();
    }
    public function update_size($id, $data)
    {
        $this->db->where('id_size', $id);
        $this->db->update('size', $data);
    }
}
                        
/* End of file KelolaDataMaster.php */
