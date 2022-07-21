<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registry_model extends CI_Model
{
    private $_table_registry = 'registry';

    //fungsi untuk mendapatkan data 
    public function getDataRegistry
($registry_id)
    {
        $this->db->from($this->_table_registry);
        if ($registry_id) {
            $this->db->where('registry_id', $registry_id);
        }
        $this->db->join('patience', 'patience.patience_id = registry.patience_id');
        $this->db->join('doctor', 'doctor.doctor_id = registry.doctor_id');
        $this->db->select('registry_id, registry_date, registry_time, registry_price,patience.patience_id,
         patience.patience_name,doctor.doctor_id,doctor.doctor_name');
        $query = $this->db->get()->result_array();
        return $query;
    }

    //fungsi untuk menambahkan data
    public function insertRegistry
($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_registry, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateRegistry
($data, $registry_id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_registry, $data, ['registry_id' => $registry_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteRegistry
($registry_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_registry, ['registry_id' => $registry_id]);
        return $this->db->affected_rows();
        // return $query;
    }

}
