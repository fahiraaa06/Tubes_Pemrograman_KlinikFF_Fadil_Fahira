<?php
Class Pasien extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/klinik/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    // menampilkan data pasien
    function index(){
        $data['title'] = "Manajemen Data Pasien";

        $data['datapasien'] = json_decode($this->curl->simple_get($this->API.'/pasien'));

        $this->load->view('v_header');
        $this->load->view('pasien/v_data', $data);
        $this->load->view('v_footer');
    }
    
    // insert data pasien
    function create(){
        $data['title'] = "Manajemen Data Pasien";
      
        if(isset($_POST['submit'])){
            $data = array(
                'id_pasien'       =>  $this->input->post('id_pasien'),
                'nama_pasien'      =>  $this->input->post('nama_pasien'),
                'jenis_kelamin'      =>  $this->input->post('jenis_kelamin'),
                'umur'                 =>  $this->input->post('umur'));
            $insert =  $this->curl->simple_post($this->API.'/pasien', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('pasien');
        }else{
            $this->load->view('v_header');
            $this->load->view('pasien/create', $data);
            $this->load->view('v_footer');
        }
    }
    
    // edit data pasien
    function edit(){
        $data['title'] = "Manajemen Data Pasien";

        if(isset($_POST['submit'])){
            $data = array(
                'id_pasien'       =>  $this->input->post('id_pasien'),
                'nama_pasien'      =>  $this->input->post('nama_pasien'),
                'jenis_kelamin'      =>  $this->input->post('jenis_kelamin'),
                'umur'                 =>  $this->input->post('umur'));
            $update =  $this->curl->simple_put($this->API.'/pasien', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('pasien');
        }else{
            $params = array('id_pasien'=>  $this->uri->segment(3));
            $data['datapasien'] = json_decode($this->curl->simple_get($this->API.'/pasien',$params));
            
            $this->load->view('v_header');
            $this->load->view('pasien/edit',$data);
            $this->load->view('v_footer');
        }
    }
    
    // delete data pasien
    function delete($id){
        if(empty($id)){
            redirect('pasien');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/pasien', array('id_pasien'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('pasien');
        }
    }
}