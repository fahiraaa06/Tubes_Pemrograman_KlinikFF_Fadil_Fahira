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
        $this->db->join('registry', 'registry.registry_id = transaction.registry_id');
        $this->db->join('recipe', 'recipe.recipe_id = transaction.recipe_id');
        $this->db->join('medical_record', 'medical_record.medical_id = transaction.medical_id');
        $this->db->select('transaction_id, transaction_date, transaction_total, medical_record.medical_id,
         registry.registry_id,recipe.recipe_id');
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
