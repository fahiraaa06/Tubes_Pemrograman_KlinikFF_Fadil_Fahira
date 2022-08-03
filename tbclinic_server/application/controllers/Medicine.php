<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Medicine extends RestController {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Medicine_model');
    }
 
//fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini
public function mdi_get()
{
    $medicine_id = $this->get('medicine_id');
    $data = $this->Medicine_model->getDataMedicine($medicine_id);
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

function mdi_post()
{
    $data = array(
        'medicine_id' => $this->post('medicine_id'),
        'medicine_name' => $this->post('medicine_name'),
        'medicine_category' => $this->post('medicine_category'),
        'medicine_price' => $this->post('medicine_price')
    );

    $cek_data = $this->Medicine_model->getDataMedicine($this->post('medicine_id'));

    //Jika semua data wajib diisi
    if (
        $data['medicine_id'] == NULL || $data['medicine_name'] == NULL || $data['medicine_category'] == NULL || $data['medicine_price']
        == NULL 
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
    } elseif ($this->Medicine_model->insertMedicine($data) > 0) {
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
function mdi_put()
{
    $medicine_id = $this->put('medicine_id');
    $data = array(
        'medicine_id' => $this->put('medicine_id'),
        'medicine_name' => $this->put('medicine_name'),
        'medicine_category' => $this->put('medicine_category'),
        'medicine_price' => $this->put('medicine_price')
    );
    //Jika field medicine_id tidak diisi
    if ($medicine_id == NULL) {
        $this->response(
            [
                'status' => $medicine_id,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Medicine Tidak Boleh Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );
        //Jika data berhasil berubah
    } elseif ($this->Medicine_model->updateMedicine($data, $medicine_id) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_CREATED,
                'message' => 'Data Medicine Dengan Id Medicine ' . $medicine_id . ' Berhasil Diubah',
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

function mdi_delete()
{
    $medicine_id = $this->delete('medicine_id');

    //Jika field id_obat tidak diisi
    if ($medicine_id == NULL) {
        $this->response(
            [
                'status' => $medicine_id,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Medicine Tidak Boleh Kosong',
            ],
            RestController::HTTP_BAD_REQUEST
        );
        //Kondisi ketika OK
    } elseif ($this->Medicine_model->deleteMedicine($medicine_id) > 0) {
        $this->response(
            [
                'status' => true,
                'response_code' => RestController::HTTP_OK,
                'message' => 'Data Medicine Dengan Id Medicine ' . $medicine_id . ' Berhasil Dihapus',
            ],
            RestController::HTTP_OK
        );
        //Kondisi gagal
    } else {
        $this->response(
            [
                'status' => false,
                'response_code' => RestController::HTTP_BAD_REQUEST,
                'message' => 'Data Medicine Dengan Medicine ' . $medicine_id . ' Tidak Ditemukan',
            ],
            RestController::HTTP_BAD_REQUEST
        );
    }
}

function getharga_get() {
    $medicine_id = $this->get('medicine_id');
    $data = $this->Medicine_model->getHarga($medicine_id);
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
 
}  
?>