<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->API="http://localhost/klinik/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
        
    }

	public function index()
	{
        $this->load->view('v_header');
        $this->load->view('v_dashboard');
        $this->load->view('v_footer');
	}
}