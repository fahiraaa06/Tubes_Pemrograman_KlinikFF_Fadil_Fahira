<?php
Class Dokter extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/klinik/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    // menampilkan data dokter
    function index(){
        $data['title'] = "Manajemen Data Dokter";

        $data['datadokter'] = json_decode($this->curl->simple_get($this->API.'/dokter'));

        $this->load->view('v_header');
        $this->load->view('dokter/v_data', $data);
        $this->load->view('v_footer');
    }
    
    // insert data dokter
    function create(){
        $data['title'] = "Manajemen Data Dokter";
      
        if(isset($_POST['submit'])){
            $data = array(
                'id_dokter'       =>  $this->input->post('id_dokter'),
                'nama_dokter'      =>  $this->input->post('nama_dokter'),
                'spesialis'                 =>  $this->input->post('spesialis'));
            $insert =  $this->curl->simple_post($this->API.'/dokter', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('dokter');
        }else{
            $this->load->view('v_header');
            $this->load->view('dokter/create', $data);
            $this->load->view('v_footer');
        }
    }
    
    // edit data dokter
    function edit(){
        $data['title'] = "Manajemen Data Dokter";

        if(isset($_POST['submit'])){
            $data = array(
                'id_dokter'       =>  $this->input->post('id_dokter'),
                'nama_dokter'      =>  $this->input->post('nama_dokter'),
                'spesialis'                 =>  $this->input->post('spesialis'));
            $update =  $this->curl->simple_put($this->API.'/dokter', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('dokter');
        }else{
            $params = array('id_dokter'=>  $this->uri->segment(3));
            $data['datadokter'] = json_decode($this->curl->simple_get($this->API.'/dokter',$params));
            
            $this->load->view('v_header');
            $this->load->view('dokter/edit',$data);
            $this->load->view('v_footer');
        }
    }
    
    // delete data dokter
    function delete($id){
        if(empty($id)){
            redirect('dokter');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/dokter', array('id_dokter'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('dokter');
        }
    }
}