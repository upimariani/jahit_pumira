<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAuth extends CI_Model
{
    public function login($username, $password)
    {
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where(array(
            'username' => $username,
            'password' => $password
        ));
        return $this->db->get()->row();
    }
    public function register($data)
    {
        $this->db->insert('customer', $data);
    }
}

/* End of file mAuth.php */
