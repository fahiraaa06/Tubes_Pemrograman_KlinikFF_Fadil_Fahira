<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doctor extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Doctor_model');
      $this->load->library('form_validation');
   }

   public function index()
   {
      $data['title'] = "List Data Doctor";

      $data['data_doctor'] = $this->Doctor_model->getAll();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('doctor/index', $data);
      $this->load->view('templates/footer');
   }

   public function detail($doctor_id)
   {
      $data['title'] = "Detail Data Doctor";

      $data['data_doctor'] = $this->Doctor_model->getById($doctor_id);

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('doctor/detail', $data);
      $this->load->view('templates/footer');
   }
   
   public function add()
   {
      $data['title'] = "Tambah Data Doctor";

      $this->form_validation->set_rules('doctor_id', 'Doctor ID', 'trim|required');
      $this->form_validation->set_rules('doctor_name', 'Doctor Name', 'trim|required');
      $this->form_validation->set_rules('doctor_address', 'Doctor Address', 'trim|required');
      $this->form_validation->set_rules('doctor_gender', 'Doctor Gender', 'trim|required');
      $this->form_validation->set_rules('doctor_phone', 'Doctor Phone', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('doctor/add', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "doctor_id" => $this->input->post('doctor_id'),
            "doctor_name" => $this->input->post('doctor_name'),
            "doctor_address" => $this->input->post('doctor_address'),
            "doctor_gender" => $this->input->post('doctor_gender'),
            "doctor_phone" => $this->input->post('doctor_phone'),
            "KEY" => "ulbi123"
         ];

         $insert = $this->Doctor_model->save($data);
         if ($insert['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Ditambahkan');
            redirect('doctor');
         } elseif ($insert['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Data Duplikat');
            redirect('doctor');
         } else {
            $this->session->set_flashdata('message', 'Data Gagal!!');
            redirect('doctor');
         }
      }
   }

   public function edit($doctor_id)
   {
      $data['title'] = "Update Data Doctor";

      $data['data_doctor'] = $this->Doctor_model->getById($doctor_id);

      $this->form_validation->set_rules('doctor_id', 'Doctor ID', 'trim|required');
      $this->form_validation->set_rules('doctor_name', 'Doctor Name', 'trim|required');
      $this->form_validation->set_rules('doctor_address', 'Doctor Address', 'trim|required');
      $this->form_validation->set_rules('doctor_gender', 'Doctor Gender', 'trim|required');
      $this->form_validation->set_rules('doctor_phone', 'Doctor Phone', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('doctor/edit', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "doctor_id" => $this->input->post('doctor_id'),
            "doctor_name" => $this->input->post('doctor_name'),
            "doctor_address" => $this->input->post('doctor_address'),
            "doctor_gender" => $this->input->post('doctor_gender'),
            "doctor_phone" => $this->input->post('doctor_phone'),
            "KEY" => "ulbi123"
         ];

         $update = $this->Doctor_model->update($data);
         if ($update['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('doctor');
         } elseif ($update['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Gagal');
            redirect('doctor');
         } else {
            $this->session->set_flashdata('message', 'Gagal!!');
            redirect('doctor');
         }
      }
   }

   public function delete($doctor_id)
   {
      $update = $this->Doctor_model->delete($doctor_id);
      if ($update['response_code'] === 200) {
         $this->session->set_flashdata('flash', 'Data Dihapus');
         redirect('doctor');
      } else {
         $this->session->set_flashdata('message', 'Gagal!!');
         redirect('doctor');
      }
   }
}
