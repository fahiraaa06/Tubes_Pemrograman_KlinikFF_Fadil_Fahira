<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Doctor extends RestController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Doctor_model');
    }
 
//fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini
public function dct_get()
{
    $doctor_id = $this->get('doctor_id');
    $data = $this->Doctor_model->getDataDoctor($doctor_id);
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

function dct_post()
{
    $data = array(
        'doctor_id' => $this->post('doctor_id'),
        'doctor_name' => $this->post('doctor_name'),
        'doctor_address' => $this->post('doctor_address'),
        'doctor_gender' => $this->post('doctor_gender'),
        'doctor_phone' => $this->post('doctor_phone')
    );

    $cek_data = $this->Doctor_model->getDataDoctor($this->post('doctor_id'));

    //Jika semua data wajib diisi
    if (
        $data['doctor_id'] == NULL || $data['doctor_name'] == NULL || $data['doctor_address'] == NULL || $data['doctor_gender'] == NULL || $data['doctor_phone'] == NULL  
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
    } elseif ($this->Doctor_model->insertDoctor($data) > 0) {
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
function dct_put()
{
    $doctor_id = $this->put('doctor_id');
    $data = array(
        'doctor_id' => $this->put('doctor_id'),
        'doctor_name' => $this->put('doctor_name'),
        'doctor_address' => $this->put('doctor_address'),
        'doctor_gender' => $this->put('doctor_gender'),
        'doctor_phone' => $this->put('doctor_phone')
    );
    //Jika field doctor_id tidak diisi
    if ($doctor_id == NULL) {
        $this->response(
            [
                'status' => $doctor_id,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Doctor Tidak Boleh Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );
        //Jika data berhasil berubah
    } elseif ($this->Doctor_model->updateDoctor($data, $doctor_id) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_CREATED,
                'message' => 'Data Doctor Dengan Id Doctor ' . $doctor_id . ' Berhasil Diubah',
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

function dct_delete()
{
    $doctor_id = $this->delete('doctor_id');

    //Jika field Doctor_id tidak diisi
    if ($doctor_id == NULL) {
        $this->response(
            [
                'status' => $doctor_id,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Doctor Tidak Boleh Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );
        //Kondisi ketika OK
    } elseif ($this->Doctor_model->deleteDoctor($doctor_id) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_OK,
                'message' => 'Data Doctor Dengan Id Doctor ' . $doctor_id . ' Berhasil Dihapus',
            ],
            RestController::HTTP_OK
        );
        //Kondisi gagal
    } else {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Doctor Dengan Doctor ' . $doctor_id . ' Tidak Ditemukan',
            ],
            RestController::HTTP_BAD_REQUEST
        );
    }
} 
}  
?>