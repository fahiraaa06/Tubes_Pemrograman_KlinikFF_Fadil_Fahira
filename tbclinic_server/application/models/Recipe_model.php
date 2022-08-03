<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recipe_model extends CI_Model
{
    private $_table_recipe = 'recipe';

    //fungsi untuk mendapatkan data 
    public function getDataRecipe
    ($id_recipe)
    {
        $this->db->from($this->_table_recipe);
        if ($id_recipe){
            $this->db->where('recipe_id',$id_recipe);
        }
        $this->db->join('medicine','medicine.medicine_id = recipe.medicine_id');
        $this->db->join('medical_record','medical_record.medical_id = recipe.medical_id');
        $this->db->select('recipe_id,medical_record.medical_id, recipe_qty, recipe_total, medicine.medicine_name, 
        medicine.medicine_price');
        $query = $this->db->get()->result_array();
        return $query;
    }

    //fungsi untuk menambahkan data
    public function insertRecipe($data)
    {
        $this->db->insert($this->_table_recipe, [
            'recipe_id' => '',
            'recipe_qty' => $data['recipe_qty'],
            'recipe_total' => $data['recipe_total'],
            'medicine_id' => $data['medicine_id'],
            'medical_id' => $data['medical_id']
        ]);

        $idNewInsert = $this->db->insert_id();
        
        $this->db->from('recipe');
        $this->db->where('recipe.recipe_id', $idNewInsert);
        $this->db->select('recipe.recipe_total , recipe.recipe_qty as resep_qty');
        $resepTotal = $this->db->get()->row();

        $this->db->from('medicine');
        $this->db->where('medicine.medicine_id', $data['medicine_id']);
        $this->db->select('medicine.medicine_price as harga_obat');
        $obatHarga = $this->db->get()->row();
        
        $sumTotal = intval($resepTotal->resep_qty) * intval($obatHarga->harga_obat);

        $this->db->update('recipe', [
            'recipe_total' => $sumTotal
        ], ['recipe_id' => $idNewInsert]);

        return 1;
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
