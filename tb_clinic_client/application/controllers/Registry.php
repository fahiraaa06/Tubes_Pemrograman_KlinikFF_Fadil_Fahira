<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registry extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Registry_model');
      $this->load->library('form_validation');
      $this->load->model('Patience_model');
      $this->load->model('Doctor_model');
   }

   public function index()
   {
      $data['title'] = "List Data Registry";

      $data['data_registry'] = $this->Registry_model->getAll();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('registry/index', $data);
      $this->load->view('templates/footer');
   }

   public function detail($registry_id)
   {
      $data['title'] = "Detail Data Registry";

      $data['data_registry'] = $this->Registry_model->getById($registry_id);

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('registry/detail', $data);
      $this->load->view('templates/footer');
   }
   
   public function add()
   {
      $data['title'] = "Tambah Data Registry";
      
      $data['data_patience'] = $this->Patience_model->getAll();
      $data['data_doctor'] = $this->Doctor_model->getAll();


      $this->form_validation->set_rules('registry_id', 'Registry ID', 'trim|required');
      $this->form_validation->set_rules('registry_date', 'Registry Date', 'trim|required');
      $this->form_validation->set_rules('registry_time', 'Registry Time', 'trim|required');
      $this->form_validation->set_rules('registry_price', 'Registry Price', 'trim|required');
      $this->form_validation->set_rules('patience_id', 'Patience ID', 'trim|required');
      $this->form_validation->set_rules('doctor_id', 'Doctor ID', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('registry/add', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "registry_id" => $this->input->post('registry_id'),
            "registry_date" => $this->input->post('registry_date'),
            "registry_time" => $this->input->post('registry_time'),
            "registry_price" => $this->input->post('registry_price'),
            "patience_id" => $this->input->post('patience_id'),
            "doctor_id" => $this->input->post('doctor_id'),
            "KEY" => "ulbi123"
         ];

         $insert = $this->Registry_model->save($data);
         if ($insert['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Ditambahkan');
            redirect('registry');
         } elseif ($insert['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Data Duplikat');
            redirect('registry');
         } else {
            $this->session->set_flashdata('message', 'Data Gagal!!');
            redirect('registry');
         }
      }
   }

   public function edit($registry_id)
   {
      $data['title'] = "Update Data Registry";

      $data['data_registry'] = $this->Registry_model->getById($registry_id);
      $data['data_patience'] = $this->Patience_model->getAll();
      $data['data_doctor'] = $this->Doctor_model->getAll();


      $this->form_validation->set_rules('registry_id', 'Registry ID', 'trim|required');
      $this->form_validation->set_rules('registry_date', 'Registry Date', 'trim|required');
      $this->form_validation->set_rules('registry_time', 'Registry Time', 'trim|required');
      $this->form_validation->set_rules('registry_price', 'Registry Price', 'trim|required');
      $this->form_validation->set_rules('patience_id', 'Patience ID', 'trim|required');
      $this->form_validation->set_rules('doctor_id', 'Doctor ID', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('registry/edit', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "registry_id" => $this->input->post('registry_id'),
            "registry_date" => $this->input->post('registry_date'),
            "registry_time" => $this->input->post('registry_time'),
            "registry_price" => $this->input->post('registry_price'),
            "patience_id" => $this->input->post('patience_id'),
            "doctor_id" => $this->input->post('doctor_id'),
            "KEY" => "ulbi123"
         ];

         $update = $this->Registry_model->update($data);
         if ($update['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('registry');
         } elseif ($update['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Gagal');
            redirect('registry');
         } else {
            $this->session->set_flashdata('message', 'Gagal!!');
            redirect('registry');
         }
      }
   }

   public function delete($registry_id)
   {
      $update = $this->Registry_model->delete($registry_id);
      if ($update['response_code'] === 200) {
         $this->session->set_flashdata('flash', 'Data Dihapus');
         redirect('registry');
      } else {
         $this->session->set_flashdata('message', 'Gagal!!');
         redirect('registry');
      }
   }
}
