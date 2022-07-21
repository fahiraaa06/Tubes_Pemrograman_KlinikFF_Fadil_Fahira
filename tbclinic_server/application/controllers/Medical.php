<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Medical extends RestController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Medical_model');
    }
 
//fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini
public function mdc_get()
{
    $medical_id = $this->get('medical_id');
    $data = $this->Medical_model->getDataMedical($medical_id);
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

function mdc_post()
{
    $data = array(
        'medical_id' => $this->post('medical_id'),
        'medical_date' => $this->post('medical_date'),
        'medical_diagnose' => $this->post('medical_diagnose'),
        'medical_temperature' => $this->post('medical_temperature'),
        'medical_blood_pressure' => $this->post('medical_blood_pressure'),
        'medical_price' => $this->post('medical_price'),
        'medical_status' => $this->post('medical_status'),
        'patience_id' => $this->post('patience_id'),
        'doctor_id' => $this->post('doctor_id'),
        'action_id' => $this->post('action_id')
    );

    $cek_data = $this->Medical_model->getDataMedical($this->post('medical_id'));

    //Jika semua data wajib diisi
    if (
        $data['medical_id'] == NULL  || $data['medical_date'] == NULL  || $data['medical_diagnose'] == NULL
        || $data['medical_temperature'] == NULL || $data['medical_blood_pressure'] == NULL || $data['medical_price'] == NULL || 
        $data['medical_status'] == NULL || $data['patience_id'] == NULL || $data['doctor_id'] == NULL || $data['action_id'] == NULL
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
    } elseif ($this->Medical_model->insertMedical($data) > 0) {
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
function mdc_put()
{
    $medical_id = $this->put('medical_id');
    $data = array(
        'medical_id' => $this->put('medical_id'),
        'medical_date' => $this->put('medical_date'),
        'medical_diagnose' => $this->put('medical_diagnose'),
        'medical_temperature' => $this->put('medical_temperature'),
        'medical_blood_pressure' => $this->put('medical_blood_pressure'),
        'medical_price' => $this->put('medical_price'),
        'medical_status' => $this->put('medical_status'),
        'patience_id' => $this->put('patience_id'),
        'doctor_id' => $this->put('doctor_id'),
        'action_id' => $this->put('action_id')
    );
    //Jika field medical_id tidak diisi
    if ($medical_id == NULL) {
        $this->response(
            [
                'status' => $medical_id,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Medical Tidak Boleh Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );
        //Jika data berhasil berubah
    } elseif ($this->Medical_model->updateMedical($data, $medical_id) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_CREATED,
                'message' => 'Data Medical Dengan Id Medical' . $medical_id . 'Berhasil Diubah',
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

function mdc_delete()
{
    $medical_id = $this->delete('medical_id');

    //Jika field medical_id tidak diisi
    if ($medical_id == NULL) {
        $this->response(
            [
                'status' => $medical_id,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Medical Tidak Boleh Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );
        //Kondisi ketika OK
    } elseif ($this->Medical_model->deleteMedical($medical_id) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_OK,
                'message' => 'Data Medical Dengan Id Medical ' . $medical_id . ' Berhasil Dihapus',
            ],
            RestController::HTTP_OK
        );
        //Kondisi gagal
    } else {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Medical Dengan Medical ' . $medical_id . ' Tidak Ditemukan',
            ],
            RestController::HTTP_BAD_REQUEST
        );
    }
} 
}  
?>