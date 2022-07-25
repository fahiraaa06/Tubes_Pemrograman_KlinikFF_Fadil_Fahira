<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Obat extends CI_Controller
{
    
    public function __construct()
     {
        parent::__construct();
        $this->load->model('Obat_model');
        $this->load->library('form_validation'); 
     }

     public function index()
     {
        $data['title'] = "List Data Obat";

        $data['data_obat'] = $this->Obat_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('Obat/index', $data);
        $this->load->view('templates/footer');
     }

     public function detail($id_obat)
     {
        $data['title'] = "Detail Data Obat";

        $data['data_obat'] = $this->Obat_model->getById($id_obat);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('Obat/detail', $data);
        $this->load->view('templates/footer');
     }

     public function add()
     {
        $data['title'] = "Tambah Data Obat";

        $this->form_validation->set_rules('id_obat', 'Id Obat', 'trim|required|numeric');
        $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required');
        $this->form_validation->set_rules('pembuat_obat', 'Pembuat Obat', 'trim|required');
        $this->form_validation->set_rules('stok_obat', 'Stok Obat', 'trim|required');
        $this->form_validation->set_rules('tanggal_kadaluarsa', 'Tanggal Kadaluarsa', 'trim|required');

        if ($this->form_validation->run() == false) {
         $this->load->view('templates/header', $data);
         $this->load->view('templates/menu');
         $this->load->view('Obat/add', $data);
         $this->load->view('templates/footer');
        }else {
         $data = [
            "id_obat" => $this->input->post('id_obat'),
            "nama_obat" => $this->input->post('nama_obat'),
            "pembuat_obat" => $this->input->post('pembuat_obat'),
            "stok_obat" => $this->input->post('stok_obat'),
            "tanggal_kadaluarsa" => $this->input->post('tanggal_kadaluarsa'),
            "KEY" => "ulbi123"
        ];

         $insert = $this->Obat_model->save($data);
         if($insert['response_code'] === 201){
            $this->session->set_flashdata('flash', 'Data Ditambahkan');
            redirect('Obat');
         }elseif ($insert['response_code'] === 400){
            $this->session->set_flashdata('message', 'Data Duplikat');
            redirect('Obat');
        }else {
            $this->session->set_flashdata('message', 'Data Gagal!!');
            redirect('Obat');
        }
      }
   }

   public function edit($id_obat)
   {
       $data['title'] = "Ubah Data Obat";
       $data['data_obat'] = $this->Obat_model->getById($id_obat);

       $this->form_validation->set_rules('id_obat', 'Id Obat', 'trim|required|numeric');
       $this->form_validation->set_rules('nama_obat', 'Nama Obat', 'trim|required');
       $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required');
       $this->form_validation->set_rules('pembuat_obat', 'Pembuat Obat', 'trim|required');
       $this->form_validation->set_rules('stok_obat', 'Stok Obat', 'trim|required');
       $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
       $this->form_validation->set_rules('tanggal_kadaluarsa', 'Tanggal Kadaluarsa', 'trim|required');

       if ($this->form_validation->run() == false) {
           $this->load->view('templates/header', $data);
           $this->load->view('templates/menu');
           $this->load->view('obat/edit', $data);
           $this->load->view('templates/footer');
       } else {
           $data = [
            "id_obat" => $this->input->post('id_obat'),
            "nama_obat" => $this->input->post('nama_obat'),
            "deskripsi" => $this->input->post('deskripsi'),
            "pembuat_obat" => $this->input->post('pembuat_obat'),
            "stok_obat" => $this->input->post('stok_obat'),
            "harga" => $this->input->post('harga'),
            "tanggal_kadaluarsa" => $this->input->post('tanggal_kadaluarsa'),
            "KEY" => "ulbi123"
           ];

           $update = $this->Obat_model->update($data);
           if ($update['response_code'] === 201) {
               $this->session->set_flashdata('flash', 'Data Diubah');
               redirect('obat');
           } elseif ($update['response_code'] === 400) {
               $this->session->set_flashdata('message', 'Data Duplikat');
               redirect('obat');
           } else {
               $this->session->set_flashdata('message', 'Gagal!!');
               redirect('obat');
           }
       }
   }
     
     public function delete($id_obat)
     {
      $update = $this->Obat_model->delete($id_obat);
         if($update['response_code'] === 200){
            $this->session->set_flashdata('flash', 'Data Dihapus');
            redirect('Obat');
         }else {
            $this->session->set_flashdata('message', 'Gagal!!');
            redirect('Obat');
        }    
   }
}
