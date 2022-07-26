<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Action extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Action_model');
      $this->load->library('form_validation');
   }

   public function index()
   {
      $data['title'] = "List Data Action";

      $data['data_action'] = $this->Action_model->getAll();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('action/index', $data);
      $this->load->view('templates/footer');
   }

   public function detail($action_id)
   {
      $data['title'] = "Detail Data Action";

      $data['data_action'] = $this->Action_model->getById($action_id);

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('action/detail', $data);
      $this->load->view('templates/footer');
   }
   
   public function add()
   {
      $data['title'] = "Tambah Data Action";

      $this->form_validation->set_rules('action_id', 'Action ID', 'trim|required');
      $this->form_validation->set_rules('action_name', 'Action Name', 'trim|required');
      $this->form_validation->set_rules('action_price', 'Action Price', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('action/add', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "action_id" => $this->input->post('action_id'),
            "action_name" => $this->input->post('action_name'),
            "action_price" => $this->input->post('action_price'),
            "KEY" => "ulbi123"
         ];

         $insert = $this->Action_model->save($data);
         if ($insert['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Ditambahkan');
            redirect('action');
         } elseif ($insert['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Data Duplikat');
            redirect('action');
         } else {
            $this->session->set_flashdata('message', 'Data Gagal!!');
            redirect('action');
         }
      }
   }

   public function edit($action_id)
   {
      $data['title'] = "Update Data Action";

      $data['data_action'] = $this->Action_model->getById($action_id);

      $this->form_validation->set_rules('action_id', 'Action ID', 'trim|required');
      $this->form_validation->set_rules('action_name', 'Nama Action', 'trim|required');
      $this->form_validation->set_rules('action_price', 'Action Price', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('action/edit', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "action_id" => $this->input->post('action_id'),
            "action_name" => $this->input->post('action_name'),
            "action_price" => $this->input->post('action_price'),
            "KEY" => "ulbi123"
         ];

         $update = $this->Action_model->update($data);
         if ($update['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('action');
         } elseif ($update['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Gagal');
            redirect('action');
         } else {
            $this->session->set_flashdata('message', 'Gagal!!');
            redirect('action');
         }
      }
   }

   public function delete($action_id)
   {
      $update = $this->Action_model->delete($action_id);
      if ($update['response_code'] === 200) {
         $this->session->set_flashdata('flash', 'Data Dihapus');
         redirect('action');
      } else {
         $this->session->set_flashdata('message', 'Gagal!!');
         redirect('action');
      }
   }
}
