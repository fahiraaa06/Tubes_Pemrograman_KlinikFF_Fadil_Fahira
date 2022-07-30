<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recipe_model extends CI_Model
{
    private $_table_recipe = 'recipe';

    //fungsi untuk mendapatkan data 
    public function getDataRecipe
($recipe_id)
    {
        $this->db->from($this->_table_recipe);
        if ($recipe_id) {
            $this->db->where('recipe_id', $recipe_id);
        }
          //medical ka recipe
          $this->db->join('medical_record', 'medical_record.medical_id = recipe.medical_id');
          //registry ka medical 
          $this->db->join('registry', 'registry.registry_id = medical_record.registry_id');
          //patience ka registry
          $this->db->join('patience', 'patience.patience_id = registry.patience_id');
          //doctor ka registry
          $this->db->join('doctor', 'doctor.doctor_id = registry.doctor_id');
          //action ka medical
          $this->db->join('action', 'action.action_id = medical_record.action_id');
          //medicine ka recipe
          $this->db->join('medicine', 'medicine.medicine_id = recipe.medicine_id');
          $this->db->select('recipe_id, recipe_qty, recipe_total,registry.registry_id,patience.patience_id,
           patience.patience_name,doctor.doctor_id,doctor.doctor_name,medical_record.medical_id,medical_record.medical_diagnose,
           action.action_id,action.action_name,action.action_price, medicine.medicine_id, medicine.medicine_name, medicine.medicine_price');
          $query = $this->db->get()->result_array();
          return $query;
    }

    //fungsi untuk menambahkan data
    public function insertRecipe
($data)
    {
        //Menggunakan Query Builder
        $this->db->insert($this->_table_recipe, $data);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk mengubah data
    public function updateRecipe
($data, $recipe_id)
    {
        //Menggunakan Query Builder
        $this->db->update($this->_table_recipe, $data, ['recipe_id' => $recipe_id]);
        return $this->db->affected_rows();
        // return $query;
    }

    //fungsi untuk menghapus data
    public function deleteRecipe
($recipe_id)
    {
        //Menggunakan Query Builder
        $this->db->delete($this->_table_recipe, ['recipe_id' => $recipe_id]);
        return $this->db->affected_rows();
        // return $query;
    }

}
