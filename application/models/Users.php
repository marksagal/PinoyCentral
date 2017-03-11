<?php
class Users extends CI_Model
{
    public function userInfo($sUsername)
    {
        $this->db->select('uid, username, password');
        $this->db->where('username', $sUsername);

        return $this->db->get('users')->result_array();
    }
}
