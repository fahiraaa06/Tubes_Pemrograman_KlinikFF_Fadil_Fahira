<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    private $_table_action = 'action';

    //fungsi untuk mendapatkan data 
    public function getDataAction
($action_id)
    {
        //Menggunakan query builder
        if ($action_id) {
            $this->db->from($this->_table_action);
            $this->db->where('action_id', $action_id);
            $query =  $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_action);
            $query =  $this->db->get()->result_array();
            return $query;
        }
    }



}
