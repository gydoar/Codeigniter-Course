<?php

class User_model extends CI_Model
{

    public function get_users()
    {

        $query = $this->db->get('users');

        return $query->result();
        // $config['hostname'] = "localhost";
        // $config['user'] = "root";
        // $config['password'] = "root";
        // $config['database'] = "ci_dev";

        // $connection = $this->load->database();
    }
}
