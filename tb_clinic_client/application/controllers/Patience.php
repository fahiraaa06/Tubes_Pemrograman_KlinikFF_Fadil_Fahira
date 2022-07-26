<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Patience extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Patience_model');
      $this->load->library('form_validation');
   }

   public function index()
   {
      $data['title'] = "List Data Patience";

      $data['data_patience'] = $this->Patience_model->getAll();

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('patience/index', $data);
      $this->load->view('templates/footer');
   }

   public function detail($patience_id)
   {
      $data['title'] = "Detail Data Patience";

      $data['data_patience'] = $this->Patience_model->getById($patience_id);

      $this->load->view('templates/header', $data);
      $this->load->view('templates/menu');
      $this->load->view('patience/detail', $data);
      $this->load->view('templates/footer');
   }
   
   public function add()
   {
      $data['title'] = "Tambah Data Patience";

      $this->form_validation->set_rules('patience_id', 'Patience ID', 'trim|required');
      $this->form_validation->set_rules('patience_name', 'Patience Name', 'trim|required');
      $this->form_validation->set_rules('patience_address', 'Patience Address', 'trim|required');
      $this->form_validation->set_rules('patience_blood', 'Patience Blood', 'trim|required');
      $this->form_validation->set_rules('patience_age', 'Patience Age', 'trim|required');
      $this->form_validation->set_rules('patience_gender', 'Patience Gender', 'trim|required');
      $this->form_validation->set_rules('patience_phone', 'Patience Phone', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('patience/add', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "patience_id" => $this->input->post('patience_id'),
            "patience_name" => $this->input->post('patience_name'),
            "patience_address" => $this->input->post('patience_address'),
            "patience_blood" => $this->input->post('patience_blood'),
            "patience_age" => $this->input->post('patience_age'),
            "patience_gender" => $this->input->post('patience_gender'),
            "patience_phone" => $this->input->post('patience_phone'),
            "KEY" => "ulbi123"
         ];

         $insert = $this->Patience_model->save($data);
         if ($insert['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Ditambahkan');
            redirect('patience');
         } elseif ($insert['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Data Duplikat');
            redirect('patience');
         } else {
            $this->session->set_flashdata('message', 'Data Gagal!!');
            redirect('patience');
         }
      }
   }

   public function edit($patience_id)
   {
      $data['title'] = "Update Data Patience";

      $data['data_patience'] = $this->Patience_model->getById($patience_id);

      $this->form_validation->set_rules('patience_id', 'Patience ID', 'trim|required');
      $this->form_validation->set_rules('patience_name', 'Patience Name', 'trim|required');
      $this->form_validation->set_rules('patience_address', 'Patience Address', 'trim|required');
      $this->form_validation->set_rules('patience_blood', 'Patience Blood', 'trim|required');
      $this->form_validation->set_rules('patience_age', 'Patience Age', 'trim|required');
      $this->form_validation->set_rules('patience_gender', 'Patience Gender', 'trim|required');
      $this->form_validation->set_rules('patience_phone', 'Patience Phone', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('patience/edit', $data);
         $this->load->view('templates/footer');
      } else {
         $data = [
            "patience_id" => $this->input->post('patience_id'),
            "patience_name" => $this->input->post('patience_name'),
            "patience_address" => $this->input->post('patience_address'),
            "patience_blood" => $this->input->post('patience_blood'),
            "patience_age" => $this->input->post('patience_age'),
            "patience_gender" => $this->input->post('patience_gender'),
            "patience_phone" => $this->input->post('patience_phone'),
            "KEY" => "ulbi123"
         ];

         $update = $this->Patience_model->update($data);
         if ($update['response_code'] === 201) {
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('patience');
         } elseif ($update['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Gagal');
            redirect('patience');
         } else {
            $this->session->set_flashdata('message', 'Gagal!!');
            redirect('patience');
         }
      }
   }

   public function delete($patience_id)
   {
      $update = $this->Patience_model->delete($patience_id);
      if ($update['response_code'] === 200) {
         $this->session->set_flashdata('flash', 'Data Dihapus');
         redirect('patience');
      } else {
         $this->session->set_flashdata('message', 'Gagal!!');
         redirect('patience');
      }
   }
}
