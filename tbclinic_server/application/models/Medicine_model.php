<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medicine_model extends CI_Model
{
    private $_table_medicine = 'medicine';

    //fungsi untuk mendapatkan data 
    public function getDataMedicine
($medicine_id)
    {
        //Menggunakan query builder
        if ($medicine_id) {
            $this->db->from($this->_table_medicine);
            $this->db->where('medicine_id', $medicine_id);
            $query =  $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_medicine);
            $query =  $this->db->get()->result_array();
            return $query;
        }
    }

    //fungsi untuk menambahkan data
    public function insertMedicine
($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_medicine, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateMedicine
($data, $medicine_id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_medicine, $data, ['medicine_id' => $medicine_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteMedicine
($medicine_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_medicine, ['medicine_id' => $medicine_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    public function getHarga($medicine_id) {
        $this->db->from('medicine');
        $this->db->select('medicine_price, medicine_name');
        $this->db->where('medicine_id', $medicine_id);
        $query = $this->db->get()->row_array();
        return $query;
    }
}
