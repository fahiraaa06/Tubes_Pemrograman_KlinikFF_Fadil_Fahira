<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

   public function __construct()
   {
      parent::__construct();
      $this->load->model('Dashboard_model');
      $this->load->library('form_validation');
   }

   public function index()
   {
      $this->load->view('templates/header');
      $this->load->view('templates/menu');
      $this->load->view('dashboard/index');
      $this->load->view('templates/footer');
   }

}
