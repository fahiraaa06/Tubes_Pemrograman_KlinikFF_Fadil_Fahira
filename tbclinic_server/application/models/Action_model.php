<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action_model extends CI_Model
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

    //fungsi untuk menambahkan data
    public function insertAction
($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_action, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateAction
($data, $action_id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_action, $data, ['action_id' => $action_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteAction
($action_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_action, ['action_id' => $action_id]);
        return $this->db->affected_rows();
        // return $query;
    }
    public function getHarga($action_id)
    {
       $this->db->from('action');
       $this->db->select('action_price');
       $this->db->where('action_id', $action_id);
       $query = $this->db->get()->row_array();
       return $query;
   }
}