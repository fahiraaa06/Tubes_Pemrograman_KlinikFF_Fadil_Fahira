<?php
Class Obat extends CI_Controller{
    
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="http://localhost/klinik/index.php";
        $this->load->library('session');
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');
    }
    
    // menampilkan data obat
    function index(){
        $data['title'] = "Manajemen Data Obat";

        $data['dataobat'] = json_decode($this->curl->simple_get($this->API.'/obat'));

        $this->load->view('v_header');
        $this->load->view('obat/v_data', $data);
        $this->load->view('v_footer');
    }
    
    // insert data obat
    function create(){
        $data['title'] = "Manajemen Data Obat";
      
        if(isset($_POST['submit'])){
            $data = array(
                'id_obat'       =>  $this->input->post('id_obat'),
                'nama_obat'      =>  $this->input->post('nama_obat'),
                'harga'                 =>  $this->input->post('harga'));
            $insert =  $this->curl->simple_post($this->API.'/obat', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($insert)
            {
                $this->session->set_flashdata('hasil','Insert Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Insert Data Gagal');
            }
            redirect('obat');
        }else{
            $this->load->view('v_header');
            $this->load->view('obat/create', $data);
            $this->load->view('v_footer');
        }
    }
    
    // edit data obat
    function edit(){
        $data['title'] = "Manajemen Data obat";

        if(isset($_POST['submit'])){
            $data = array(
                'id_obat'       =>  $this->input->post('id_obat'),
                'nama_obat'      =>  $this->input->post('nama_obat'),
                'harga'                 =>  $this->input->post('harga'));
            $update =  $this->curl->simple_put($this->API.'/obat', $data, array(CURLOPT_BUFFERSIZE => 10)); 
            if($update)
            {
                $this->session->set_flashdata('hasil','Update Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Update Data Gagal');
            }
            redirect('obat');
        }else{
            $params = array('id_obat'=>  $this->uri->segment(3));
            $data['dataobat'] = json_decode($this->curl->simple_get($this->API.'/obat',$params));
            
            $this->load->view('v_header');
            $this->load->view('obat/edit',$data);
            $this->load->view('v_footer');
        }
    }
    
    // delete data obat
    function delete($id){
        if(empty($id)){
            redirect('obat');
        }else{
            $delete =  $this->curl->simple_delete($this->API.'/obat', array('id_obat'=>$id), array(CURLOPT_BUFFERSIZE => 10)); 
            if($delete)
            {
                $this->session->set_flashdata('hasil','Delete Data Berhasil');
            }else
            {
               $this->session->set_flashdata('hasil','Delete Data Gagal');
            }
            redirect('obat');
        }
    }
}