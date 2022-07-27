<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Transaction_model');
      $this->load->library('form_validation');
      $this->load->model('Medical_model');
      $this->load->model('Registry_model');
      $this->load->model('Recipe_model');
   }

   public function index()
   {
      $data['title'] = "List Data Transaction";

      $data['data_transaction'] = $this->Transaction_model->getAll();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('transaction/index', $data);
      $this->load->view('templates/footer');
   }

   public function detail($transaction_id)
   {
      $data['title'] = "Detail Data Transaction";

      $data['data_transaction'] = $this->Transaction_model->getById($transaction_id);

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('transaction/detail', $data);
      $this->load->view('templates/footer');
   }
   
   public function add()
   {
      $data['title'] = "Tambah Data Transaction";
      
      $data['data_medical'] = $this->Medical_model->getAll();
      $data['data_recipe'] = $this->Recipe_model->getAll();
      $data['data_registry'] = $this->Registry_model->getAll();


      $this->form_validation->set_rules('transaction_id', 'Transaction ID', 'trim|required');
      $this->form_validation->set_rules('transaction_date', 'Transaction Name', 'trim|required');
      $this->form_validation->set_rules('transaction_total', 'Transaction Address', 'trim|required');
      $this->form_validation->set_rules('medical_id', 'Medical ID', 'trim|required');
      $this->form_validation->set_rules('registry_id', 'Registry ID', 'trim|required');
      $this->form_validation->set_rules('recipe_id', 'Recipe ID', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('transaction/add', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "transaction_id" => $this->input->post('transaction_id'),
            "transaction_date" => $this->input->post('transaction_date'),
            "transaction_total" => $this->input->post('transaction_total'),
            "medical_id" => $this->input->post('medical_id'),
            "registry_id" => $this->input->post('registry_id'),
            "recipe_id" => $this->input->post('recipe_id'),
            "KEY" => "ulbi123"
         ];

         $insert = $this->Transaction_model->save($data);
         if ($insert['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Ditambahkan');
            redirect('transaction');
         } elseif ($insert['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Data Duplikat');
            redirect('transaction');
         } else {
            $this->session->set_flashdata('message', 'Data Gagal!!');
            redirect('transaction');
         }
      }
   }

   public function edit($transaction_id)
   {
      $data['title'] = "Update Data Transaction";

      $data['data_transaction'] = $this->Transaction_model->getById($transaction_id);
      $data['data_medical'] = $this->Medical_model->getAll();
      $data['data_recipe'] = $this->Recipe_model->getAll();
      $data['data_registry'] = $this->Registry_model->getAll();

      $this->form_validation->set_rules('transaction_id', 'Transaction ID', 'trim|required');
      $this->form_validation->set_rules('transaction_date', 'Transaction Name', 'trim|required');
      $this->form_validation->set_rules('transaction_total', 'Transaction Address', 'trim|required');
      $this->form_validation->set_rules('medical_id', 'Medical ID', 'trim|required');
      $this->form_validation->set_rules('registry_id', 'Registry ID', 'trim|required');
      $this->form_validation->set_rules('recipe_id', 'Recipe ID', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('transaction/edit', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "transaction_id" => $this->input->post('transaction_id'),
            "transaction_date" => $this->input->post('transaction_date'),
            "transaction_total" => $this->input->post('transaction_total'),
            "medical_id" => $this->input->post('medical_id'),
            "registry_id" => $this->input->post('registry_id'),
            "recipe_id" => $this->input->post('recipe_id'),
            "KEY" => "ulbi123"
         ];

         $update = $this->Transaction_model->update($data);
         if ($update['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('transaction');
         } elseif ($update['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Gagal');
            redirect('transaction');
         } else {
            $this->session->set_flashdata('message', 'Gagal!!');
            redirect('transaction');
         }
      }
   }

   public function delete($transaction_id)
   {
      $update = $this->Transaction_model->delete($transaction_id);
      if ($update['response_code'] === 200) {
         $this->session->set_flashdata('flash', 'Data Dihapus');
         redirect('transaction');
      } else {
         $this->session->set_flashdata('message', 'Gagal!!');
         redirect('transaction');
      }
   }
}
