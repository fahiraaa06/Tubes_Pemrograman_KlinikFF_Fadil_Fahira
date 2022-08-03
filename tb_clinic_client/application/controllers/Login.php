<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Login_model');
      $this->load->library('form_validation');
   }

   public function index()
   {
      $data['title'] = "Auth";
      $this->form_validation->set_rules('username', 'Username', 'trim|required');
      $this->form_validation->set_rules('password', 'Password', 'trim|required');

      if ($this->form_validation->run() == false) {
         $this->load->view('auth/login', $data);
      } else {
         $data = [
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'KEY' => "ulbi123"
         ];


         $insert = $this->Login_model->save($data);
         if ($insert['value'] == "berhasil") {
            $this->session->set_flashdata('flash', 'Kamu Sudah Login');
            redirect('dashboard');
         } elseif ($insert['value'] == "salah") {
            $this->session->set_flashdata('message', 'Username Atau Password Salah');
            redirect('login');
         } elseif ($insert['value'] == "kosong") {
            $this->session->set_flashdata('message', 'Ada yang kosong');
            redirect('login');
         } else {
            $this->session->set_flashdata('message', 'Gagal Login!');
            redirect('login');
         }
      }
   }
}
