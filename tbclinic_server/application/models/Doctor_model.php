<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doctor_model extends CI_Model
{
    private $_table_doctor = 'doctor';

    //fungsi untuk mendapatkan data 
    public function getDataDoctor
($doctor_id)
    {
        //Menggunakan query builder
        if ($doctor_id) {
            $this->db->from($this->_table_doctor);
            $this->db->where('doctor_id', $doctor_id);
            $query =  $this->db->get()->row_array();
            return $query;
        } else {
            $this->db->from($this->_table_doctor);
            $query =  $this->db->get()->result_array();
            return $query;
        }
    }

    //fungsi untuk menambahkan data
    public function insertDoctor
($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_doctor, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateDoctor
($data, $doctor_id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_doctor, $data, ['doctor_id' => $doctor_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteDoctor
($doctor_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_doctor, ['doctor_id' => $doctor_id]);
        return $this->db->affected_rows();
        // return $query;
    }

}
