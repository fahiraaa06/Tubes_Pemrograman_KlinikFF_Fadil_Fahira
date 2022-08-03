<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Register_model');
      $this->load->library('form_validation');
   }

   public function index()
   {
      $data['title'] = "Auth";
      $this->form_validation->set_rules('username', 'Username', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');
      $this->form_validation->set_rules('no_hp', 'No Hp', 'trim|required');
      // $this->form_validation->set_rules('user_id', 'User Id', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('auth/register', $data);
      } else {
         $data = [

            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'no_hp' => $this->input->post('no_hp'),
            'KEY' => "ulbi123"
         ];
         $insert = $this->Register_model->save($data);
         if ($insert['response_code'] === 201) {
            $this->session->set_flashdata('berhasil', 'Berhasil Sudah Register ! Yuk Login');
            redirect('login');
         } elseif ($insert['response_code'] === 400) {
            $this->session->set_flashdata('message', 'Username Atau Password Sudah Di Pakai!');
            redirect('register');
         } else {
            $this->session->set_flashdata('message', 'Gagal Register!');
            redirect('register');
         }
      }
   }
}
