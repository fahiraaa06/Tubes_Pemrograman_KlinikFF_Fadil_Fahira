<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Registry extends RestController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Registry_model');
    }
 
//fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini
public function rgs_get()
{
    $registry_id = $this->get('registry_id');
    $data = $this->Registry_model->getDataRegistry($registry_id);
    //jika variabel $data terdapat data didalamnya 
    if ($data) {
        $this->response(
            [
                'data' => $data,
                'status' => 'success',
                'response_code' => RestController::HTTP_OK
            ],
            RestController::HTTP_OK
        );
        //jika data tidak ada
    } else {
        $this->response(
            [
                'status' => false,
                'message' => 'Data Tidak Ada',
                'response_code' => RestController::HTTP_NOT_FOUND
            ],
            RestController::HTTP_OK
        );
    }
}

function rgs_post()
{
    $data = array(
        'registry_id' => $this->post('registry_id'),
        'registry_date' => $this->post('registry_date'),
        'registry_time' => $this->post('registry_time'),
        'registry_price' => $this->post('registry_price'),
        'patience_id' => $this->post('patience_id'),
        'doctor_id' => $this->post('doctor_id')
    );

    $cek_data = $this->Registry_model->getDataRegistry($this->post('registry_id'));

    //Jika semua data wajib diisi
    if (
        $data['registry_id'] == NULL || $data['registry_date'] == NULL || $data['registry_time'] == NULL  || $data['registry_price'] == NULL  || $data['patience_id'] == NULL  || $data['doctor_id'] == NULL  
    ) {

        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Yang Dikirim Tidak Boleh Ada Yang Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );
        //Jika data duplikat
    } else if ($cek_data) {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Duplikat',
            ],
            RestController::HTTP_BAD_REQUEST
        );
        //Jika data tersimpan
    } elseif ($this->Registry_model->insertRegistry($data) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_CREATED,
                'message' => 'Data Berhasil Ditambahkan',
            ],
            RestController::HTTP_CREATED
        );
    } else {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Gagal Menambahkan Data',
            ],
            RestController::HTTP_BAD_REQUEST
        );
    }
}
function rgs_put()
{
    $registry_id = $this->put('registry_id');
    $data = array(
        'registry_id' => $this->put('registry_id'),
        'registry_date' => $this->put('registry_date'),
        'registry_time' => $this->put('registry_time'),
        'registry_price' => $this->put('registry_price'),
        'patience_id' => $this->put('patience_id'),
        'doctor_id' => $this->put('doctor_id')
    );
    //Jika field registry_id tidak diisi
    if ($registry_id == NULL) {
        $this->response(
            [
                'status' => $registry_id,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'registry Tidak Boleh Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );
        //Jika data berhasil berubah
    } elseif ($this->Registry_model->updateRegistry($data, $registry_id) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_CREATED,
                'message' => 'Data registry Dengan Id registry ' . $registry_id . ' Berhasil Diubah',
            ],
            RestController::HTTP_CREATED
        );
    } else {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Gagal Mengubah Data',
            ],
            RestController::HTTP_BAD_REQUEST
        );
    }
}

function rgs_delete()
{
    $registry_id = $this->delete('registry_id');

    //Jika field registry_id tidak diisi
    if ($registry_id == NULL) {
        $this->response(
            [
                'status' => $registry_id,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'registry Tidak Boleh Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );
        //Kondisi ketika OK
    } elseif ($this->Registry_model->deleteRegistry($registry_id) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_OK,
                'message' => 'Data registry Dengan Id registry ' . $registry_id . ' Berhasil Dihapus',
            ],
            RestController::HTTP_OK
        );
        //Kondisi gagal
    } else {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data registry Dengan registry ' . $registry_id . ' Tidak Ditemukan',
            ],
            RestController::HTTP_BAD_REQUEST
        );
    }
} 
}  
?>