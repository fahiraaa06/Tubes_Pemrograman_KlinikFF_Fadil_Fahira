<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Recipe extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Recipe_model');
      $this->load->library('form_validation');
      $this->load->model('Medicine_model');
      $this->load->model('Medical_model');
   }

   public function index()
   {
      $data['title'] = "List Data Recipe";

      $data['data_recipe'] = $this->Recipe_model->getAll();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('recipe/index', $data);
      $this->load->view('templates/footer');
   }

   public function detail($recipe_id)
   {
      $data['title'] = "Detail Data Recipe";

      $data['data_recipe'] = $this->Recipe_model->getById($recipe_id);

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('recipe/detail', $data);
      $this->load->view('templates/footer');
   }
   
   public function add()
   {
      $data['title'] = "Tambah Data Recipe";
      
      $data['data_medicine'] = $this->Medicine_model->getAll();
      $data['data_medical'] = $this->Medical_model->getAll();
      

      $this->form_validation->set_rules('recipe_qty', 'Recipe qty', 'trim|required');
      $this->form_validation->set_rules('medicine_id', 'Medicine ID', 'trim|required');
      $this->form_validation->set_rules('medical_id', 'Medical ID', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('recipe/add', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "recipe_id" => $this->input->post('recipe_id'),
            "recipe_qty" => $this->input->post('recipe_qty'),
            "recipe_total" => $this->input->post('recipe_total'),
            "medicine_id" => $this->input->post('medicine_id'),
            "medical_id" => $this->input->post('medical_id'),
            "KEY" => "ulbi123"
         ];

         $insert = $this->Recipe_model->save($data);
         if ($insert['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Ditambahkan');
            redirect('recipe');
         } elseif ($insert['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Data Duplikat');
            redirect('recipe');
         } else {
            $this->session->set_flashdata('message', 'Data Gagal!!');
            redirect('recipe');
         }
      }
   }

   public function edit($recipe_id)
   {
      $data['title'] = "Update Data Recipe";

      $data['data_recipe'] = $this->Recipe_model->getById($recipe_id);
      $data['data_medicine'] = $this->Medicine_model->getAll();
      $data['data_medical'] = $this->Medical_model->getAll();

      $this->form_validation->set_rules('recipe_id', 'Recipe ID', 'trim|required');
      $this->form_validation->set_rules('recipe_qty', 'Recipe qty', 'trim|required');
      $this->form_validation->set_rules('recipe_total', 'Recipe Total', 'trim|required');
      $this->form_validation->set_rules('medicine_id', 'Medicine ID', 'trim|required');
      $this->form_validation->set_rules('medical_id', 'Medical ID', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('recipe/edit', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "recipe_id" => $this->input->post('recipe_id'),
            "recipe_qty" => $this->input->post('recipe_qty'),
            "recipe_total" => $this->input->post('recipe_total'),
            "medicine_id" => $this->input->post('medicine_id'),
            "medical_id" => $this->input->post('medical_id'),
            "KEY" => "ulbi123"
         ];

         $update = $this->Recipe_model->update($data);
         if ($update['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('recipe');
         } elseif ($update['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Gagal');
            redirect('recipe');
         } else {
            $this->session->set_flashdata('message', 'Gagal!!');
            redirect('recipe');
         }
      }
   }

   public function delete($recipe_id)
   {
      $update = $this->Recipe_model->delete($recipe_id);
      if ($update['response_code'] === 200) {
         $this->session->set_flashdata('flash', 'Data Dihapus');
         redirect('medical');
      } else {
         $this->session->set_flashdata('message', 'Gagal!!');
         redirect('medical');
      }
   }
}