<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medicine extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Medicine_model');
      $this->load->library('form_validation');
   }

   public function index()
   {
      $data['title'] = "List Data Medicine";

      $data['data_medicine'] = $this->Medicine_model->getAll();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('medicine/index', $data);
      $this->load->view('templates/footer');
   }

   public function detail($medicine_id)
   {
      $data['title'] = "Detail Data Medicine";

      $data['data_medicine'] = $this->Medicine_model->getById($medicine_id);

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('medicine/detail', $data);
      $this->load->view('templates/footer');
   }
   
   public function add()
   {
      $data['title'] = "Tambah Data Medicine";

      $this->form_validation->set_rules('medicine_id', 'Medicine ID', 'trim|required');
      $this->form_validation->set_rules('medicine_name', 'Medicine Name', 'trim|required');
      $this->form_validation->set_rules('medicine_category', 'Medicine Category', 'trim|required');
      $this->form_validation->set_rules('medicine_price', 'Medicine Price', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('medicine/add', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "medicine_id" => $this->input->post('medicine_id'),
            "medicine_name" => $this->input->post('medicine_name'),
            "medicine_category" => $this->input->post('medicine_category'),
            "medicine_price" => $this->input->post('medicine_price'),
            "KEY" => "ulbi123"
         ];

         $insert = $this->Medicine_model->save($data);
         if ($insert['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Ditambahkan');
            redirect('medicine');
         } elseif ($insert['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Data Duplikat');
            redirect('medicine');
         } else {
            $this->session->set_flashdata('message', 'Data Gagal!!');
            redirect('medicine');
         }
      }
   }

   public function edit($medicine_id)
   {
      $data['title'] = "Update Data Medicine";

      $data['data_medicine'] = $this->Medicine_model->getById($medicine_id);

      $this->form_validation->set_rules('medicine_id', 'Medicine ID', 'trim|required');
      $this->form_validation->set_rules('medicine_name', 'Medicine Name', 'trim|required');
      $this->form_validation->set_rules('medicine_category', 'Medicine Category', 'trim|required');
      $this->form_validation->set_rules('medicine_price', 'Medicine Price', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('medicine/edit', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "medicine_id" => $this->input->post('medicine_id'),
            "medicine_name" => $this->input->post('medicine_name'),
            "medicine_category" => $this->input->post('medicine_category'),
            "medicine_price" => $this->input->post('medicine_price'),
            "KEY" => "ulbi123"
         ];

         $update = $this->Medicine_model->update($data);
         if ($update['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('medicine');
         } elseif ($update['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Gagal');
            redirect('medicine');
         } else {
            $this->session->set_flashdata('message', 'Gagal!!');
            redirect('medicine');
         }
      }
   }

   public function delete($medicine_id)
   {
      $update = $this->Medicine_model->delete($medicine_id);
      if ($update['response_code'] === 200) {
         $this->session->set_flashdata('flash', 'Data Dihapus');
         redirect('medicine');
      } else {
         $this->session->set_flashdata('message', 'Gagal!!');
         redirect('medicine');
      }
   }
}
