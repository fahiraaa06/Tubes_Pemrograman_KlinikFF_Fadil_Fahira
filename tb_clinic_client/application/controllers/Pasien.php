<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pasien extends CI_Controller
{
    
    public function __construct()
     {
        parent::__construct();
        $this->load->model('Pasien_model');
        $this->load->library('form_validation'); 
     }

     public function index()
     {
        $data['title'] = "List Data Pasien";

        $data['data_pasien'] = $this->Pasien_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('Pasien/index', $data);
        $this->load->view('templates/footer');
     }

     public function detail($id_pasien)
     {
        $data['title'] = "Detail Data Pasien";

        $data['data_pasien'] = $this->Pasien_model->getById($id_pasien);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('Pasien/detail', $data);
        $this->load->view('templates/footer');
     }

     public function add()
     {
        $data['title'] = "Tambah Data Pasien";

        $this->form_validation->set_rules('id_pasien', 'Id Pasien', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_pasien', 'Nama_Pasien', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('umur', 'Umur', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'trim|required');

        if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('Pasien/add', $data);
         $this->load->view('templates/footer');
        }else {
         $data = [
            "id_pasien" => $this->input->post('id_pasien'),
           " nama_pasien" => $this->input->post('nama_pasien'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            "umur" => $this->input->post('umur'),
            "alamat" => $this->input->post('alamat'),
            "no_telp" => $this->input->post('no_telp'),
            "KEY" => "ulbi123"
        ];

         $insert = $this->Pasien_model->save($data);
         if($insert['response_code'] === 201){
            $this->session->set_flashdata('flash', 'Data Ditambahkan');
            redirect('Pasien');
         }elseif ($insert['response_code'] === 400){
            $this->session->set_flashdata('message', 'Data Duplikat');
            redirect('Pasien');
        }else {
            $this->session->set_flashdata('message', 'Data Gagal!!');
            redirect('Pasien');
        }
      }
   }

     public function edit($id_pasien)
     {
        $data['title'] = "Update Data Pasien";
         
        $data['data_pasien'] = $this->Pasien_model->getById($id_pasien);

        $this->form_validation->set_rules('id_pasien', 'Id Pasien', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'trim|required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'trim|required');
        $this->form_validation->set_rules('umur', 'Umur', 'trim|required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'trim|required');

        if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('pasien/edit', $data);
         $this->load->view('templates/footer');
        }else {
         $data = [
            "id_pasien" => $this->input->post('id_pasien'),
            "nama_pasien" => $this->input->post('nama_pasien'),
            "jenis_kelamin" => $this->input->post('jenis_kelamin'),
            "umur" => $this->input->post('umur'),
            "alamat" => $this->input->post('alamat'),
            "no_telp" => $this->input->post('no_telp'),
            "KEY" => "ulbi123"
        ];

         $update = $this->Pasien_model->update($data);
         if($update['response_code'] === 201){
            $this->session->set_flashdata('flash', 'Data Berhasil Diubah');
            redirect('pasien');
         }elseif ($update['response_code'] === 400){
            $this->session->set_flashdata('message', 'Gagal');
            redirect('pasien');
        }else {
            $this->session->set_flashdata('message', 'Gagal!!');
            redirect('pasien');
        }
      }   
     }
     
     public function delete($id_pasien)
     {
      $update = $this->Pasien_model->delete($id_pasien);
         if($update['response_code'] === 200){
            $this->session->set_flashdata('flash', 'Data Dihapus');
            redirect('pasien');
         }else {
            $this->session->set_flashdata('message', 'Gagal!!');
            redirect('pasien');
        }    
   }
}
