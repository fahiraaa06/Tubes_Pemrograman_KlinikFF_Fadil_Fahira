<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaksi_model'); //load model transaction
        $this->load->model('Obat_model'); //load model transaction
        $this->load->model('Pasien_model'); //load model transaction
        $this->load->library('form_validation'); //load fom validation
    }

    public function index()
    {
        $data['title'] = "List Data Transaksi";

        $data['data_transaksi'] = $this->Transaksi_model->getAll();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('transaksi/index', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id_transaksi)
    {
        $data['title'] = "Detail Data transaksi";

        $data['data_transaksi'] = $this->Transaksi_model->getById($id_transaksi);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/menu');
        $this->load->view('transaksi/detail', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = "Tambah Data Transaksi";

        $data['nama_obat'] = $this->Obat_model->getAll();
        $data['nama_pasien'] = $this->Pasien_model->getAll();

        $this->form_validation->set_rules('id_transaksi', 'Id Transaksi', 'trim|required|numeric');
        $this->form_validation->set_rules('id_obat', 'Id Obat', 'trim|required');
        $this->form_validation->set_rules('id_pasien', 'Id Pasien', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('qty', 'QTY', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('total', 'Total', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('transaksi/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_transaksi' => $this->input->post('id_transaksi'),
                'id_obat' => $this->input->post('id_obat'),
                'id_pasien' => $this->input->post('id_pasien'),
                'tanggal' => $this->input->post('tanggal'),
                'qty' => $this->input->post('qty'),
                'status' => $this->input->post('status'),
                'total' => $this->input->post('total'),
                "KEY" => "ulbi123"
            ];

            $insert = $this->Transaksi_model->save($data);
            if ($insert['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('transaksi');
            } elseif ($insert['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat');
                redirect('transaksi');
            } else {
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('transaksi');
            }
        }
    }

    public function update($id_transaksi)
    {
        $data['title'] = "Ubah Data transaksi";
        $data['data_transaksi'] = $this->Transaksi_model->getById($id_transaksi);

        $this->form_validation->set_rules('id_transaksi', 'Id Transaksi', 'trim|required|numeric');
        $this->form_validation->set_rules('id_obat', 'Id Obat', 'trim|required');
        $this->form_validation->set_rules('id_pasien', 'Id Pasien', 'trim|required');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');
        $this->form_validation->set_rules('qty', 'QTY', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('total', 'Total', 'trim|required]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/menu');
            $this->load->view('transaksi/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_transaksi' => $this->input->post('transaksi_id'),
                'id_obat' => $this->input->post('id_obat'),
                'id_pasien' => $this->input->post('id_pasien'),
                'tanggal' => $this->input->post('transaksi'),
                'qty' => $this->input->post('qty'),
                'status' => $this->input->post('status'),
                'total' => $this->input->post('total'),
                "KEY" => "ulbi123"
            ];

            $update = $this->Transaksi_model->update($data);
            if ($update['response_code'] === 201) {
                $this->session->set_flashdata('flash', 'Data Ditambahkan');
                redirect('transaksi');
            } elseif ($update['response_code'] === 400) {
                $this->session->set_flashdata('message', 'Data Duplikat');
                redirect('transaksi');
            } else {
                $this->session->set_flashdata('message', 'Gagal!!');
                redirect('transaksi');
            }
        }
    }

    public function delete($id_transaksi)
    {
        $update = $this->Transaksi_model->delete($id_transaksi);
        if ($update['response_code'] === 200) {
            $this->session->set_flashdata('flash', 'Dihapus');
            redirect('transaksi');
        } else {
            $this->session->set_flashdata('message', 'Gagal!!');
            redirect('transaksi');
        }
    }
}
