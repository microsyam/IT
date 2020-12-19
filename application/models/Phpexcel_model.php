<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Phpexcel_model extends CI_Model {

    function get_users() {
        $query = $this->db->get('transactions');
        return $query->result_array();
    }




}

/* End of file blog_model.php */
    /* Location: ./application/models/blog_model.php */    