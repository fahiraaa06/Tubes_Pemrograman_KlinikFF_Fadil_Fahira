<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medical_model extends CI_Model
{
    private $_table_medical = 'medical_record';

    //fungsi untuk mendapatkan data 
    public function getDataMedical
($medical_id)
    {
        $this->db->from($this->_table_medical);
        if ($medical_id) {
            $this->db->where('medical_id', $medical_id);
        }
        $this->db->join('patience', 'patience.patience_id = medical_record.patience_id');
        $this->db->join('doctor', 'doctor.doctor_id = medical_record.doctor_id');
        $this->db->join('action', 'action.action_id = medical_record.action_id');
        $this->db->select('medical_id, medical_date, medical_diagnose, medical_temperature,
         medical_blood_pressure,medical_price,medical_status,patience.patience_id,
         patience.patience_name,doctor.doctor_id,doctor.doctor_name,action.action_id,action.action_name,action.action_price');
        $query = $this->db->get()->result_array();
        return $query;
    }

    //fungsi untuk menambahkan data
    public function insertMedical
($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_medical, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateMedical
($data, $medical_id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_medical, $data, ['medical_id' => $medical_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteMedical
($medical_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_medical, ['medical_id' => $medical_id]);
        return $this->db->affected_rows();
        // return $query;
    }

}
