<?php
defined('BASEPATH') or exit('No direct script access allowed');

//import library dari Format dan RestController
require APPPATH . 'libraries/Format.php';
require APPPATH . 'libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Transaction extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transaction_model');
    }
//fungsi CRUD (GET, POST, PUT, DELETE) simpan di bawah sini
    public function trs_get()
    {
        $transaction_id = $this->get('transaction_id');
        $data=$this->Transaction_model->getDataTransaction($transaction_id);
        //jika variabel $data terdapat data di dalamnya
        if ($data){
            $this->response(
                [
                    'data' => $data,
                    'status' => 'success',
                    'response_code' => RestController::HTTP_OK
                ],
                RestController::HTTP_OK
            );
            //jika tidak ada data
        } else {
            $this->response(
                [
                    'data' => false,
                    'status' => 'Data Tidak Ada',
                    'response_code' => RestController::HTTP_NOT_FOUND
                ],
                RestController::HTTP_NOT_FOUND
            );
        }
    }

    function trs_post()
    {
        $data = array(
            'transaction_id' => $this->post('transaction_id'),
            'transaction_date' => $this->post('transaction_date'),
            'transaction_total' => $this->post('transaction_total'),
            'medical_id' => $this->post('medical_id'),
            'registry_id' => $this->post('registry_id'),
            'recipe_id' => $this->post('recipe_id')
        );

        $cek_data = $this->Transaction_model->getDataTransaction($this->post('transaction_id'));
        
        //Jika semua data wajib diisi
        if ($data['transaction_id'] == NULL || $data['transaction_date'] == NULL || $data['transaction_total']
        == NULL || $data['medical_id'] ==  NULL|| $data['registry_id'] == NULL || $data['recipe_id'] == NULL) {
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
        } elseif ($this->Transaction_model->insertTransaction($data) > 0) {
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

    function trs_put()
    {
        $transaction_id = $this->put('transaction_id');
        $data = array(
            'transaction_id' => $this->put('transaction_id'),
            'transaction_date' => $this->put('transaction_date'),
            'transaction_total' => $this->put('transaction_total'),
            'medical_id' => $this->put('medical_id'),
            'registry_id' => $this->put('registry_id'),
            'recipe_id' => $this->put('recipe_id')
        );

        //Jika field npm tidak diisi
        if ($transaction_id == NULL) {
            $this->response(
                [
                    'status' => $transaction_id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Jika data berhasil berubah
        } elseif ($this->Transaction_model->updateTransaction($data, $transaction_id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_CREATED,
                    'message' => 'Data transaction Dengan ID '.$transaction_id.' Berhasil Diubah',
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

    function trs_delete()
    {
        $transaction_id = $this->delete('transaction_id');

        //Jika field npm tidak diisi
        if ($transaction_id == NULL) {
            $this->response(
                [
                    'status' => $transaction_id,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data Tidak Boleh Kosong',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        //Kondisi ketika OK
        } elseif ($this->Transaction_model->deleteTransaction($transaction_id) > 0) {
            $this->response(
                [
                    'status' => true,
                    'response_code' => RestController::HTTP_OK,
                    'message' => 'Data transaction Dengan ID '.$transaction_id.' Berhasil Dihapus',
                ],
                RestController::HTTP_OK
            );
        //Kondisi gagal
        } else {
            $this->response(
                [
                    'status' => false,
                    'response_code' => RestController::HTTP_BAD_REQUEST,
                    'message' => 'Data transaction Dengan ID '.$transaction_id.' Tidak
                    Ditemukan',
                ],
                RestController::HTTP_BAD_REQUEST
            );
        }
    }
}