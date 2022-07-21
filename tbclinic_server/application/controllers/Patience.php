<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Patience extends RestController {

 public function __construct()
 {
     parent::__construct();
     $this->load->model('Patience_model');
 }
 
//fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini
public function ptc_get()
{
    $patience_id = $this->get('patience_id');
    $data = $this->Patience_model->getDatapatience($patience_id);
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

function ptc_post()
{
    $data = array(
            'patience_id' => $this->post('patience_id'),
            'patience_name' => $this->post('patience_name'),
            'patience_address' => $this->post('patience_address'),
            'patience_blood' => $this->post('patience_blood'),
            'patience_age' => $this->post('patience_age'),
            'patience_gender' => $this->post('patience_gender'),
            'patience_phone' => $this->post('patience_phone')
        );
    $cek_data = $this->Patience_model->getDataPatience($this->post('patience_id'));

    //Jika semua data wajib diisi
    if (
        $data['patience_id'] == NULL || $data['patience_name'] == NULL || $data['patience_address']
        == NULL || $data['patience_blood'] == NULL || $data['patience_age'] == NULL || $data['patience_gender'] ==
        NULL || $data['patience_phone'] == NULL 
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
    } elseif ($this->Patience_model->insertPatience($data) > 0) {
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
function ptc_put()
{
    $patience_id = $this->put('patience_id');
    $data = array(
        'patience_id' => $this->put('patience_id'),
        'patience_name' => $this->put('patience_name'),
        'patience_address' => $this->put('patience_address'),
        'patience_blood' => $this->put('patience_blood'),
        'patience_age' => $this->put('patience_age'),
        'patience_gender' => $this->put('patience_gender'),
        'patience_phone' => $this->put('patience_phone')
    );
    //Jika field patience_id tidak diisi
    if ($patience_id == NULL) {
        $this->response(
            [
                'status' => $patience_id,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'id pasien Tidak Boleh Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );
        //Jika data berhasil berubah
    } elseif ($this->Patience_model->updatePatience($data, $patience_id) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_CREATED,
                'message' => 'Data Patience Dengan id Patience' . $patience_id . ' Berhasil Diubah',
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

function ptc_delete()
{
    $patience_id = $this->delete('patience_id');

    //Jika field patience_id tidak diisi
    if ($patience_id == NULL) {
        $this->response(
            [
                'status' => $patience_id,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'id Patience Tidak Boleh Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );
        //Kondisi ketika OK
    } elseif ($this->Patience_model->deletePatience($patience_id) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_OK,
                'message' => 'Data Patience Dengan id Patience' . $patience_id . ' Berhasil
        Dihapus',
            ],
            RestController::HTTP_OK
        );
        //Kondisi gagal
    } else {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Patience Dengan id Patience' . $patience_id . ' Tidak
Ditemukan',
            ],
            RestController::HTTP_BAD_REQUEST
        );
    }
}
 
}
