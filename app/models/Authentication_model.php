<?php

    /******************************************
    *     CI-MVC Pattern         *
    *   Developer  :  David Obele obeledavid26@gmail.com   *
    *        Copyright © 2018 David Obele        *
    *******************************************/

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Authentication_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model("authentication_model");
    }


    function validate_user($postData){

        $this->db->select('*');
        $this->db->where('username', $postData['username']);
        $this->db->where('password', md5($postData['password']));
        $this->db->from('users');
        $query=$this->db->get();
        if ($query->num_rows() == 0)
            return false;
        else
            return $query->result();
    }

}

/* End of file  */
