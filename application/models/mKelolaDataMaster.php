<?php

defined('BASEPATH') or exit('No direct script access allowed');

class mKelolaDataMaster extends CI_Model
{

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
}
                        
/* End of file KelolaDataMaster.php */
