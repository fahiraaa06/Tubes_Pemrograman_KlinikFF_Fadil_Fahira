<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medical extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Medical_model');
      $this->load->library('form_validation');
   }

   public function index()
   {
      $data['title'] = "List Data Medical";

      $data['data_medical'] = $this->Medical_model->getAll();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('medical/index', $data);
      $this->load->view('templates/footer');
   }

   public function detail($medical_id)
   {
      $data['title'] = "Detail Data Medical";

      $data['data_medical'] = $this->Medical_model->getById($medical_id);

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('medical/detail', $data);
      $this->load->view('templates/footer');
   }
   
   public function add()
   {
      $data['title'] = "Tambah Data Medical";

      $this->form_validation->set_rules('medical_id', 'Medical ID', 'trim|required');
      $this->form_validation->set_rules('medical_date', 'Medical Name', 'trim|required');
      $this->form_validation->set_rules('medical_diagnose', 'Medical Address', 'trim|required');
      $this->form_validation->set_rules('medical_temperature', 'Medical Blood', 'trim|required');
      $this->form_validation->set_rules('medical_blood_pressure', 'Medical Age', 'trim|required');
      $this->form_validation->set_rules('medical_price', 'Medical Gender', 'trim|required');
      $this->form_validation->set_rules('medical_status', 'Medical Phone', 'trim|required');
      $this->form_validation->set_rules('patience_id', 'Medical Phone', 'trim|required');
      $this->form_validation->set_rules('doctor_id', 'Medical Phone', 'trim|required');
      $this->form_validation->set_rules('action_id', 'Medical Phone', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('medical/add', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "medical_id" => $this->input->post('medical_id'),
            "medical_date" => $this->input->post('medical_date'),
            "medical_diagnose" => $this->input->post('medical_diagnose'),
            "medical_temperature" => $this->input->post('medical_temperature'),
            "medical_blood_pressure" => $this->input->post('medical_blood_pressure'),
            "medical_price" => $this->input->post('medical_price'),
            "medical_status" => $this->input->post('medical_status'),
            "patience_id" => $this->input->post('patience_id'),
            "doctor_id" => $this->input->post('doctor_id'),
            "action_id" => $this->input->post('action_id'),
            "KEY" => "ulbi123"
         ];

         $insert = $this->Medical_model->save($data);
         if ($insert['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Ditambahkan');
            redirect('medical');
         } elseif ($insert['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Data Duplikat');
            redirect('medical');
         } else {
            $this->session->set_flashdata('message', 'Data Gagal!!');
            redirect('medical');
         }
      }
   }

   public function edit($medical_id)
   {
      $data['title'] = "Update Data Medical";

      $data['data_medical'] = $this->Medical_model->getById($medical_id);

      $this->form_validation->set_rules('medical_id', 'Medical ID', 'trim|required');
      $this->form_validation->set_rules('medical_date', 'Medical Name', 'trim|required');
      $this->form_validation->set_rules('medical_diagnose', 'Medical Address', 'trim|required');
      $this->form_validation->set_rules('medical_temperature', 'Medical Blood', 'trim|required');
      $this->form_validation->set_rules('medical_blood_pressure', 'Medical Age', 'trim|required');
      $this->form_validation->set_rules('medical_price', 'Medical Gender', 'trim|required');
      $this->form_validation->set_rules('medical_status', 'Medical Phone', 'trim|required');
      $this->form_validation->set_rules('patience_id', 'Medical Phone', 'trim|required');
      $this->form_validation->set_rules('doctor_id', 'Medical Phone', 'trim|required');
      $this->form_validation->set_rules('action_id', 'Medical Phone', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('medical/edit', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "medical_id" => $this->input->post('medical_id'),
            "medical_date" => $this->input->post('medical_date'),
            "medical_diagnose" => $this->input->post('medical_diagnose'),
            "medical_temperature" => $this->input->post('medical_temperature'),
            "medical_blood_pressure" => $this->input->post('medical_blood_pressure'),
            "medical_price" => $this->input->post('medical_price'),
            "medical_status" => $this->input->post('medical_status'),
            "patience_id" => $this->input->post('patience_id'),
            "doctor_id" => $this->input->post('doctor_id'),
            "action_id" => $this->input->post('action_id'),
            "KEY" => "ulbi123"
         ];

         $update = $this->Medical_model->update($data);
         if ($update['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('medical');
         } elseif ($update['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Gagal');
            redirect('medical');
         } else {
            $this->session->set_flashdata('message', 'Gagal!!');
            redirect('medical');
         }
      }
   }

   public function delete($medical_id)
   {
      $update = $this->Medical_model->delete($medical_id);
      if ($update['response_code'] === 200) {
         $this->session->set_flashdata('flash', 'Data Dihapus');
         redirect('medical');
      } else {
         $this->session->set_flashdata('message', 'Gagal!!');
         redirect('medical');
      }
   }
}
