<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Patience_model extends CI_Model
{
    private $_table_patience = 'patience';

    //fungsi untuk mendapatkan data 
    public function getDataPatience($patience_id)
    {
        //Menggunakan query builder
        if ($patience_id) {
            $this->db->from($this->_table_patience);
            $this->db->where('patience_id', $patience_id);
            $query =  $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_patience);
            $query =  $this->db->get()->result_array();
            return $query;
        }
    }

    //fungsi untuk menambahkan data
    public function insertPatience($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_patience, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updatePatience($data, $patience_id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_patience, $data, ['patience_id' => $patience_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deletePatience($patience_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_patience, ['patience_id' => $patience_id]);
        return $this->db->affected_rows();
        // return $query;
    }
}
