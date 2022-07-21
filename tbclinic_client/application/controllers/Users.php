<?php
Class Users extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/restserver_uts_fahira/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    // menampilkan data users
    function index(){
        $data['title'] = "Manajemen Data Users";

        $data['datausers'] = json_decode($this->curl->simple_get($this->API.'/users'));

        $this->load->view('v_header');
        $this->load->view('users/v_data', $data);
        $this->load->view('v_footer');
    }
    
    // insert data users
    function create(){
        $data['title'] = "Manajemen Data Users";
        if(isset($_POST['submit'])){
            $data = array(
                'id'       =>  $this->input->post('id'),
                'username'      =>  $this->input->post('username'),
                'password'      =>  $this->input->post('password'),
                'nama_lengkap'                 =>  $this->input->post('nama_lengkap'));
            $insert =  $this->curl->simple_post($this->API.'/users', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('users');
        }else{
            $this->load->view('v_header');
            $this->load->view('users/create', $data);
            $this->load->view('v_footer');
        }
    }
    
    // edit data users
    function edit(){
        $data['title'] = "Manajemen Data Users";
        
        if(isset($_POST['submit'])){
            $data = array(
                'id'       =>  $this->input->post('id'),
                'username'      =>  $this->input->post('username'),
                'password'      =>  $this->input->post('password'),
                'nama_lengkap'                 =>  $this->input->post('nama_lengkap'));
            $update =  $this->curl->simple_put($this->API.'/users', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('users');
        }else{
            $params = array('id'=>  $this->uri->segment(3));
            $data['datausers'] = json_decode($this->curl->simple_get($this->API.'/users',$params));
            
            $this->load->view('v_header');
            $this->load->view('users/edit',$data);
            $this->load->view('v_footer');
        }
    }
    
    // delete data users
    function delete($id){
        if(empty($id)){
            redirect('users');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/users', array('id'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('users');
        }
    }
}