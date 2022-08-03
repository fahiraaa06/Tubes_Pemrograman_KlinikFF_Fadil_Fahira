<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_model extends CI_Model
{
    private $_table_transaction = 'transaction';

    //fungsi untuk mendapatkan data
    public function getDataTransaction($transaction_id)
    {
        $this->db->from($this->_table_transaction);
        if ($transaction_id) {
            $this->db->where('transaction_id', $transaction_id);
        }
        //registry ka transaction
        $this->db->join('registry', 'registry.registry_id = transaction.registry_id');
        //medical ka registry
        $this->db->join('medical_record', 'medical_record.medical_id = medical_record.registry_id');
        //action ka medical
        $this->db->join('action', 'action.action_id = medical_record.action_id');
        //recipe ka medical
        $this->db->join('recipe', 'medical_record.medical_id = recipe.medical_id');
        //medicine ka recipe
        $this->db->join('medicine', 'medicine.medicine_id = recipe.medicine_id');
        $this->db->select('transaction_id, transaction_date,registry.registry_price,medical_record.medical_price,action.action_price,
        sum(recipe.recipe_qty * medicine.medicine_price) as medicine_price_total, (sum(recipe.recipe_qty * medicine.medicine_price) + 
        registry.registry_price + medical_record.medical_price + action.action_price) 
        as transaction_total');
        $query = $this->db->get()->result_array();
        return $query;
    }

    //fungsi untuk menambahkan data
    public function insertTransaction($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_transaction, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateTransaction($data, $transaction_id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_transaction, $data, ['transaction_id' => $transaction_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteTransaction($transaction_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_transaction, ['transaction_id' => $transaction_id]);
        return $this->db->affected_rows();
        // return $query;
    }
}
